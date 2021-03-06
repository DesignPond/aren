@extends('frontend.layouts.master')
@section('content')

<section class="contenu">

    @include('frontend.partials.message')

    <div class="eightcol">

        <!-- form start -->
        <form data-validate-parsley action="{{ url('sendMessage') }}" method="POST" class="myForm" id="formContact">
            {!! csrf_field() !!}
            
            {!! Honeypot::generate('my_name', 'my_time') !!}

        <fieldset>
            <h1>Nous contacter</h1>

            <p><label for="societe">Société <em> &nbsp;(facultatif)</em></label>
                <input type="text" name="societe" value="<?php echo old('societe'); ?>" />
            </p>

            <p><label for="nom">Nom et prénom</label>
                <input type="text" required name="nom" value="<?php echo old('nom'); ?>" />
            </p>

            <p><label for="email">Email</label>
                <input type="text" class="email" required name="email" value="<?php echo old('email'); ?>"  />
            </p>

            <p><label for="telephone">Téléphone</label>
                <input type="text" required name="telephone" value="<?php echo old('telephone'); ?>"  />
            </p>

            <p><label for="message">Votre Message</label>
                <textarea rows="17" required cols="70" name="remarque"><?php echo old('remarque'); ?></textarea>
            </p>

            <input type="submit" value="Envoyer le message" name="submit" class="btnSubmit" />
        </fieldset><!--end user-details-->

        <div style="display: none;"><input name="hello" type="text" /></div><!-- honeypot -->

        </form>
    </div>
    <div class="fourcol last polaroids">
        @include('frontend.partials.illustration')
    </div>
    <hr/>

</section>
@stop