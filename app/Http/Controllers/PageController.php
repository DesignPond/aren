<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Aren\Page\Worker\PageWorker;
use App\Aren\Page\Repo\PageInterface;
use App\Aren\News\Repo\NewsInterface;
use App\Aren\Prestataire\Repo\PrestataireInterface;
use App\Aren\Troncon\Repo\TronconInterface;
use App\Aren\Icon\Repo\IconInterface;

class PageController extends Controller
{
    protected $page;
    protected $worker;
    protected $helper;
    protected $news;
    protected $prestataire;
    protected $troncon;
    protected $icon;

    public function __construct(PageWorker $worker, PageInterface $page, NewsInterface $news, PrestataireInterface $prestataire, TronconInterface $troncon, IconInterface $icon)
    {
        $this->page        = $page;
        $this->worker      = $worker;
        $this->news        = $news;
        $this->prestataire = $prestataire;
        $this->troncon     = $troncon;
        $this->icon        = $icon;

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

        if($id == 'carte')
        {
            $data['icons']  = $this->icon->getAll();
            $data['cartes'] = $this->troncon->getAll(null);
        }

        return view('frontend.'.$template)->with($data);
    }

}
