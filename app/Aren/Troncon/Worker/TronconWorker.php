<?php
namespace App\Aren\Troncon\Worker;

use App\Aren\Troncon\Repo\TronconInterface;
use App\Aren\Icon\Repo\IconInterface;
use App\Service\UploadWorker;

class TronconWorker implements TronconWorkerInterface{

    protected $troncon;
    protected $icon;
    protected $upload;
    protected $arraytoxml;

    public function __construct(TronconInterface $troncon, UploadWorker $upload, IconInterface $icon)
    {
        $this->troncon    = $troncon;
        $this->icon       = $icon;
        $this->upload     = $upload;
        $this->arraytoxml = new \App\Helper\Simplexml();
    }

    /**
     * KML-formatted color as \#aabbggrr where aa=alpha (00 to ff), bb=blue (00 to ff), gg=green (00 to ff), rr=red (00 to ff).
     * HTML Hexadecimal color (RRGGBB)
     * KML color (AABBGGRR)
     */
    public function colorToKml($color,$alpha  = "ff")
    {
        // sanitize
        $color  = str_replace('#','',$color);

        // split in pairs RRGGBB
        $colors = str_split($color, 2);

        // add alpha
        $new  = $alpha;

        // put color in place
        $new .= $colors[2].$colors[1].$colors[0];

        return $new;
    }

    public function colorToRgb($color)
    {
        // split in pairs AABBGGRR
        $colors = str_split($color, 2);

        $colors[0] = '#';

        // put color in place
        $new = $colors[0].$colors[3].$colors[2].$colors[1];

        return $new;
    }

    public function upload($kml,$color)
    {

    }

    public function read($kml)
    {

    }

    public function prepare($kml, $type, $color = null)
    {

        if($type == 'troncon')
        {
            $this->convert($kml, $color);
        }

        if($type == 'poi')
        {

            $xmlData    = simplexml_load_file($kml);
            $placemarks = $xmlData->Document->Folder;

            $icons = $this->icon->getAll();
            $icons_title = $icons->lists('style','titre')->all();

            foreach($icons as $index => $icon)
            {
                $style = $xmlData->Document->addChild('Style');
                $style->addAttribute("id", $icon->style);
                $IconStyle = $style->addChild('IconStyle');
                $Icon = $IconStyle->addChild('Icon');
                $Icon->addChild('href',asset('frontend/icons/'.$icon->image));
            }

            foreach($placemarks->Placemark as $placemark)
            {
                $description = (string) $placemark->ExtendedData->SchemaData->SimpleData;
                $description = (isset($icons_title[$description]) ? $icons_title[$description] : '');
                $placemark->addChild('styleUrl','#'.$description);
            }

            \File::put($kml, $xmlData->asXML());
        }
    }

    public function prepareIcons()
    {
        $icons = $this->icon->getAll();

        $xmlStyle = '';

        foreach($icons as $icon)
        {
            $xmlStyle .= '<Style id="'.$icon->style.'">
                <IconStyle>
                    <Icon>
                        <href>'.asset('frontend/icons/'.$icon->image).'</href>
                    </Icon>
                </IconStyle>
            </Style>';
        }

        return $xmlStyle;
    }

    public function convert($kml,$color)
    {
        $xmlData    = simplexml_load_file($kml);
        $placemarks = $xmlData->Document->Folder;

        foreach($placemarks->Placemark as $placemark)
        {
            $placemark->Style->LineStyle->color = $this->colorToKml($color);
            $placemark->Style->LineStyle->width = '1.41732';
        }

        $xmlData->Document->Folder->Placemark;

        \File::put($kml, $xmlData->asXML());
    }

    public function write($prestataires,$kml)
    {
        $output = $this->prestataires($prestataires, false);

        \File::put(public_path('kml/'.$kml.'.kml'), $output);
    }

    public function prestataires($data, $file = true, $filename = null)
    {
        $output = '<?xml version="1.0" encoding="UTF-8"?><kml xmlns="http://www.opengis.net/kml/2.2"><Document>
                    <name>Data+BalloonStyle</name>
                    <Style id="pin">
                       <IconStyle>
                          <Icon><href>http://www.aren.ch/frontend/images/icons/pin.png</href></Icon>
                       </IconStyle>
				    </Style>
				    <Style id="baloon">
                       <BalloonStyle>
                          <bgColor>ffffffbb</bgColor>
                          <text>$[description]</text>
                       </BalloonStyle>
				    </Style>
				    <name>Prestataires</name>';

        foreach($data as $point)
        {
            $output .= '<Placemark>
                            <name></name>
                            <styleUrl>#pin</styleUrl>
                            <description>Num&#233;ro '.$point->noParticipant.' <br/>'.$point->barn_title.' <br/> '.$point->link.'</description>
                            <ExtendedData>
                                <Data name="Nom"><value>'.$point->barn_title.'</value></Data>
                                <Data name="Num&#233;ro"><value>'.$point->noParticipant.'</value></Data>
                            </ExtendedData>
                            <Point>
                                <coordinates>'.$point->map->longitude.','.$point->map->latitude.',0</coordinates>
                            </Point>
                        </Placemark>';
        }

        $output .= '</Document></kml>';

        if($file)
        {
            header("Content-type: octet/stream");
            header("Content-disposition: attachment; filename=".$filename.";");
            print $output;
            exit;
        }
        else
        {
            return $output;
        }
    }

}