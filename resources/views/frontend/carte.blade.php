@extends('frontend.layouts.master')
@section('content')

<section class="contenu">

    <h1>Carte</h1>

    <table cellpadding="0" width="100%" cellspacing="0" border="0" style="border:none;">
        <tr>
            <td width="250"><p class="legende legendeIcon squareRed"><i></i>Tronçon T1</p></td>
            <td width="250"><p class="legende legendeIcon prestataireIcon"><i></i>Prestataire</p></td>
            <td width="250"><p class="legende legendeIcon squareYellow"><i></i>Buvette</p></td>
            <td width="250"><p class="legende legendeIcon losangeViolet"><i></i><span>Place de pique-nique</span></p></td>
        </tr>
        <tr>
            <td width="250"><p class="legende legendeIcon squarePink"><i></i>Tronçon T2 en consultation</p></td>
            <td width="250"><p class="legende legendeIcon squareBlue"><i></i>Tronçon T3 en consultation</p></td>
            <td width="250"><p class="legende legendeIcon triangleViolet"><i></i>Visite</p></td>
            <td width="250"><p class="legende legendeIcon losangeGreen"><i></i><span>Autre</span></p></td>
            <td width="250"><p class="legende legendeIcon parkingIcon"><i></i><span>Parking</span></p></td>
        </tr>
    </table>

    <br/>
    <div class="map-wrapper">
        <div id="map-canvas" data-latitude="47.012724" data-longitude="6.731005" data-zoom="10" style="height: 500px;"></div>
    </div>

</section>
@stop