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
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $page;
    protected $helper;
    protected $bloc;
    protected $prestataire;
    protected $titre;
    protected $table;

    public function __construct(PageInterface $page, BlocInterface $bloc, PrestataireInterface $prestataire, TitreInterface $titre, TableInterface $table)
    {
        $this->page        = $page;
        $this->bloc        = $bloc;
        $this->prestataire = $prestataire;
        $this->titre       = $titre;
        $this->table       = $table;

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

        $participant = $this->prestataire->getAll(true,true)->random();

        return view('frontend.accueil')->with([ 'page' => $page, 'parent' => $parent,'blocs' => $blocs, 'participant' => $participant]);
    }

    public function participant($id){

        $participant = $this->prestataire->find($id);
        $titres      = $this->titre->getAll()->lists('titre','id')->all();
        $tables      = $this->table->getAll();

        return view('frontend.participant')->with(['participant' => $participant, 'titres' => $titres, 'tables' => $tables]);
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

        $data = array('email' => $request->email, 'nom' => $request->nom, 'remarque' => $request->remarque , 'telephone' => $request->telephone, 'societe' => $request->societe);

        Mail::send('emails.contact', $data, function ($message) use ($data) {

            $message->from($data['email'], $data['nom']);

            $message->to('info@aren.ch')->subject('Message depuis le site www.aren.ch');
        });

        return redirect()->back()->with(array('status' => 'success', 'message' => '<strong>Merci pour votre message</strong><br/>Nous vous contacterons dès que possible.'));

    }
}
