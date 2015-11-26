<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Requests\SendMessage;
use App\Aren\Page\Repo\PageInterface;
use App\Aren\Bloc\Repo\BlocInterface;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $page;
    protected $helper;
    protected $bloc;

    public function __construct(PageInterface $page, BlocInterface $bloc)
    {
        $this->page      = $page;
        $this->bloc      = $bloc;
        $this->helper    = new \App\Helper\Helper;
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

        return view('frontend.accueil')->with([ 'page' => $page, 'parent' => $parent,'blocs' => $blocs]);
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
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return Response
     */
    public function page($slug)
    {
        $page = $this->page->getBySlug($slug);

        return view('frontend.page')->with(['page' => $page]);
    }

    /**
     * Send contact message
     *
     * @return Response
     */
    public function sendMessage(SendMessage $request){

        $data = array('email' => $request->email, 'name' => $request->name, 'remarque' => $request->remarque );

        Mail::send('emails.contact', $data, function ($message) use ($data) {

            $message->from($data['email'], $data['name']);

            $message->to('info@aren.ch')->subject('Message depuis le site www.aren.ch');
        });

        return redirect('/')->with(array('status' => 'success', 'message' => '<strong>Merci pour votre message</strong><br/>Nous vous contacterons dès que possible.'));

    }
}
