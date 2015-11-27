<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Aren\Page\Worker\PageWorker;
use App\Aren\Page\Repo\PageInterface;
use App\Aren\News\Repo\NewsInterface;
use App\Aren\Prestataire\Repo\PrestataireInterface;

class PageController extends Controller
{
    protected $page;
    protected $worker;
    protected $helper;
    protected $news;
    protected $prestataire;

    public function __construct(PageWorker $worker, PageInterface $page, NewsInterface $news, PrestataireInterface $prestataire)
    {
        $this->page        = $page;
        $this->worker      = $worker;
        $this->news        = $news;
        $this->prestataire = $prestataire;

        $this->helper = new \App\Helper\Helper();

        setlocale(LC_ALL, 'fr_FR.UTF-8');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $page       = $this->page->getBySlug($id);
        $parent     = $page->getAncestorsAndSelf()->toHierarchy();

        $template   = $page->template;

        $data['page']   = $page;
        $data['id']     = $id;
        $data['parent'] = $parent;

        if($id == 'news')
        {
            $data['news'] = $this->news->getAll();
        }

        if($id == 'prestataires')
        {
            $data['prestataires'] = $this->prestataire->getAll(true,true);
        }

        return view('frontend.'.$template)->with($data);
    }

}
