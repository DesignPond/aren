<?php
namespace App\Aren\Troncon\Worker;

interface TronconWorkerInterface{

    public function colorToKml($color,$alpha = "ff");
    public function colorToRgb($color);
    public function upload($kml,$color);
    public function read($kml);
    public function write($prestataires,$kml);
    public function prepareIcons();
    public function convert($kml,$color);
    public function prepare($kml, $type, $color = null);
    public function prestataires($data, $file = true, $filename = null);
}