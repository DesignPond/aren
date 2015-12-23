<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Aren\Page\Repo\PageInterface;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $page;

    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    /**
     *
     * @return Response
     */
    public function index()
    {
        $pages = $this->page->getAll();

        return view('backend.index');
    }

}
