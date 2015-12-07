<?php
namespace App\Aren\Troncon\Worker;

interface TronconWorkerInterface{

    public function colorToKml($color,$alpha = "ff");
    public function colorToRgb($color);
    public function read($kml);
    public function write($kml,$config);

}