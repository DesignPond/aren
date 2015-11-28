<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Aren\Bloc\Repo\BlocInterface;
use App\Http\Requests\CreateBloc;

class BlocController extends Controller
{
    protected $bloc;

    public function __construct(BlocInterface $bloc)
    {
        $this->bloc = $bloc;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocs = $this->bloc->getAll();

        return view('backend.blocs.index')->with(['blocs' => $blocs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blocs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateBloc $request)
    {
        $bloc = $this->bloc->create($request->all());

        return redirect('admin/bloc/'.$bloc->id)->with(array('status' => 'success' , 'message' => 'Le bloc a été crée' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $bloc  = $this->bloc->find($id);

        return view('backend.blocs.show')->with(array( 'bloc' => $bloc));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, CreateBloc $request)
    {
        $bloc = $this->bloc->update($request->all());

        return redirect('admin/bloc/'.$bloc->id)->with( array('status' => 'success' , 'message' => 'Le bloc a été mise à jour' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->bloc->delete($id);

        return redirect('admin/bloc')->with(array('status' => 'success' , 'message' => 'Le bloc a été supprimé' ));
    }

}
