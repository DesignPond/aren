<?php
namespace App\Aren\Troncon\Worker;

use App\Aren\Troncon\Repo\TronconInterface;

class TronconWorker implements TronconWorkerInterface{

    protected $troncon;

    public function __construct(TronconInterface $troncon)
    {
        $this->troncon = $troncon;
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

    public function read($kml)
    {

        $contents = \File::get($kml);
        $parsed   = \Parser::xml($contents);

        $document   = $parsed['Document'];



/*        $style      = $document['Style'];
        $folder     = $document['Folder'];
        $placemarks = $folder['Placemark'];

        $placemarks = collect($placemarks);
        $styles     = collect($style);

        $icons = $styles->lists('IconStyle.Icon','@attributes.id');*/

        echo '<pre>';
        print_r($parsed);
        echo '</pre>';exit;
        
    }

    public function convert($kml,$color)
    {
        $contents = \File::get($kml);
        $parsed   = \Parser::xml($contents);

        $placemarks = $parsed['Document']['Folder']['Placemark'];

        foreach($placemarks as &$placemark)
        {
            $placemark['Style']['LineStyle']['color'] = $color;
            $placemark['Style']['LineStyle']['width'] = '1.41732';
        }

        $parsed['Document']['Folder']['Placemark'] = $placemarks;

        \File::put($kml, $parsed);
    }

    public function write($kml,$config)
    {

        $output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
                     <kml xmlns=\"http://www.opengis.net/kml/2.2\">
                     <Document>
                     <Folder>
                     <name>Troncon</name>";

        $output .= "</Folder>
                    </Document>
                    </kml>";
    }

    public function placemark($data)
    {
        $placemark = '<Placemark>
            <Style><LineStyle><color>FF0055ff</color><width>1.41732</width></LineStyle><PolyStyle><fill>0</fill></PolyStyle></Style>
            <ExtendedData><SchemaData schemaUrl="#troncon1_270815">
                <SimpleData name="SOUS-TYPE">Réseau</SimpleData>
                <SimpleData name="LONGUEUR">190.631310</SimpleData>
                <SimpleData name="SURFACE">0.000000</SimpleData>
                <SimpleData name="ANGLE">0.000000</SimpleData>
                <SimpleData name="NOM">premier tronéon</SimpleData>
                <SimpleData name="ETAT_VALID">En consultation</SimpleData>
            </SchemaData></ExtendedData>
              <LineString>
                <altitudeMode>relativeToGround</altitudeMode>
                <coordinates>6.891922878606126,47.054747676644908 6.892492576149263,47.054381591257474 6.89302887923308,47.054707975271043 6.893357634237832,47.054736526731283 6.893672037035667,47.05488194668785 6.893657134549398,47.055052784766396 6.893696435139358,47.055070962204546</coordinates>
              </LineString>
          </Placemark>';

    }

    public function prestataires($data, $file = true, $filename)
    {
        $output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?><kml xmlns=\"http://www.opengis.net/kml/2.2\">
				 <Document>
				 <Style id=\"pin\">
					<IconStyle>
						<Icon> <href>http://www.aren.ch/images/icons/pin.png</href> </Icon>
						<BalloonStyle>
					      <bgColor>ffffffbb</bgColor>
					      <text> $[description]</text>
					    </BalloonStyle>
					</IconStyle>
				</Style>
				<Folder>
				<name>Troncon</name>";

        foreach($data as $point)
        {
            $name        = $point['name'];
            $description = $point['description'];
            $coordinates = $point['coordinates'];
            $numero      = $point['numero'];
            $link        = $point['link'];

            $output .= '<Placemark>
			          <name></name>
			           <description><p>Num&#233;ro '.$numero.' <br/>'.$description.' <br/> '.$link.'</p></description>
			          <ExtendedData>
			            <Data name="Nom"><value>'.$name.'</value></Data>
			            <Data name="Num&#233;ro"><value>'.$numero.'</value></Data>
			          </ExtendedData>
			          <styleUrl>#pin</styleUrl>
			          <Point><coordinates>'.$coordinates.',0</coordinates></Point>
			        </Placemark>';
        }

        $output .= "</Folder>
					 </Document>
					   </kml>";

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