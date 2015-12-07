<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ColorTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testColor()
    {
        $worker = \App::make('App\Aren\Troncon\Worker\TronconWorkerInterface');

        $color = $worker->colorToKml('#0055ff');

        $this->assertEquals('ffff5500', $color);
    }

    public function testColorBack()
    {
        $worker = \App::make('App\Aren\Troncon\Worker\TronconWorkerInterface');

        $color = $worker->colorToRgb('ffff5500');

        $this->assertEquals('#0055ff', $color);
    }

}
