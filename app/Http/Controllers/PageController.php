<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Aren\Page\Worker\PageWorker;
use App\Aren\Page\Repo\PageInterface;

class PageController extends Controller
{
    protected $page;
    protected $worker;
    protected $helper;

    public function __construct(PageWorker $worker, PageInterface $page)
    {
        $this->page      = $page;
        $this->worker    = $worker;

        $this->helper    = new \App\Helper\Helper();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('backend.schemas.index');
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

        return view('frontend.'.$template)->with([ 'page' => $page, 'id' => $id, 'parent' => $parent]);
    }

}
