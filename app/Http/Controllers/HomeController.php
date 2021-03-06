<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Requests\SendMessage;
use App\Aren\Page\Repo\PageInterface;
use App\Aren\Bloc\Repo\BlocInterface;
use App\Aren\Prestataire\Repo\PrestataireInterface;
use App\Aren\Prestation\Repo\TitreInterface;
use App\Aren\Prestation\Repo\TableInterface;
use App\Aren\Troncon\Repo\TronconInterface;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $page;
    protected $helper;
    protected $bloc;
    protected $prestataire;
    protected $titre;
    protected $table;
    protected $troncon;

    public function __construct(PageInterface $page, BlocInterface $bloc, PrestataireInterface $prestataire, TitreInterface $titre, TableInterface $table,TronconInterface $troncon)
    {
        $this->page        = $page;
        $this->bloc        = $bloc;
        $this->prestataire = $prestataire;
        $this->titre       = $titre;
        $this->table       = $table;
        $this->troncon     = $troncon;

        $this->helper      = new \App\Helper\Helper;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function accueil()
    {
        $page   = $this->page->getBySlug('accueil');
        $blocs  = $this->bloc->getAll();
        $parent = $page->getAncestorsAndSelf()->toHierarchy();
        $cartes = $this->troncon->getAll(null);

        $participant = $this->prestataire->getAll(true,true)->random();

        return view('frontend.accueil')->with([ 'page' => $page, 'parent' => $parent,'blocs' => $blocs, 'participant' => $participant, 'cartes' => $cartes]);
    }

    public function participant($id){

        $participant = $this->prestataire->find($id);
        $titres      = $this->titre->getAll()->lists('titre','id')->all();
        $tables      = $this->table->getAll();
        $cartes      = $this->troncon->getAll(null);

        $tables_options = [
            1 => ['places','prix'],
            2 => ['places','prix'],
            3 => ['option_id'],
            4 => ['option_id','prix'],
            5 => ['option_id','remarque']
        ];

        return view('frontend.participant')->with(['participant' => $participant, 'titres' => $titres, 'tables' => $tables, 'tables_options' => $tables_options, 'cartes' => $cartes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function contact()
    {
        return view('frontend.contact');
    }

    /**
     * Send contact message
     *
     * @return Response
     */
    public function sendMessage(SendMessage $request){

        $hello = $request->input('hello',null);

        if($hello)
        {
            return redirect()->back();
        }

        $data = array('email' => $request->email, 'nom' => $request->nom, 'remarque' => $request->remarque , 'telephone' => $request->telephone, 'societe' => $request->societe);

  /*      Mail::send('emails.contact', $data, function ($message) use ($data) {

            $message->from($data['email'], $data['nom']);
            $message->to('info@aren.ch')->subject('Message depuis le site www.aren.ch');
        });*/

        $html = '<!DOCTYPE html>
                    <html lang="fr-FR"><head><meta charset="utf-8"></head>
                    <body><h2>Message depuis le site www.aren.ch</h2>';

        if(isset($societe))
        {
           $html .= '<h4>'.$data['societe'].'</h4>';
        }

        $html .= '<p>'.$data['nom'].'</p>
                  <p>E-mail: '.$data['email'].'</p>
                  <p>T&eacute;l. : '.$data['telephone'].'</p>
                  <div>'.$data['remarque'].'</div>
                  <p><a style="color: #444; font-size: 13px;" href="http://www.aren.ch">www.aren.ch</a></p>
                  </body>
                  </html>';

        $sujet        = 'Message depuis le site www.aren.ch';
        $message      = $html;
        $destinataire = 'info@aren.ch';

        $headers      = "Reply-To: info@aren.ch\n";
        $headers     .= "From: info@aren.ch\n";
        $headers     .= "Content-Type: text/plain; charset=\"utf-8\"";

        if(mail($destinataire,$sujet,$message,$headers))
        {
            return redirect()->back()->with(array('status' => 'success', 'message' => '<strong>Merci pour votre message</strong><br/>Nous vous contacterons dès que possible.'));
        }
        else
        {
            echo "Une erreur c'est produite lors de l'envois de l'email.";
        }

    }
}
