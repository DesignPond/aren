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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
