<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Aren\Prestation\Repo\RemarqueInterface;

class RemarqueController extends Controller
{
    protected $remarque;

    public function __construct(RemarqueInterface $remarque)
    {
        $this->remarque = $remarque;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $remarque = $this->remarque->create($request->all());

        return redirect()->back()->with(array('status' => 'success' , 'message' => 'La remarque a été crée' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $remarque = $this->remarque->update($request->all());

        return redirect()->back()->with( array('status' => 'success' , 'message' => 'La remarque a été mise à jour' ));
    }
}
