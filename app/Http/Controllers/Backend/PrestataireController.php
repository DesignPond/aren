<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreatePrestataire;
use App\Http\Controllers\Controller;
use App\Aren\Prestataire\Repo\PrestataireInterface;
use App\Aren\Prestation\Repo\TitreInterface;
use App\Aren\Prestation\Repo\TableInterface;

class PrestataireController extends Controller
{
    protected $prestataire;
    protected $titre;
    protected $table;

    public function __construct(PrestataireInterface $prestataire, TitreInterface $titre, TableInterface $table)
    {
        $this->prestataire = $prestataire;
        $this->titre       = $titre;
        $this->table       = $table;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestataires = $this->prestataire->getAll();

        return view('backend.prestataires.index')->with(['prestataires' => $prestataires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.prestataires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreatePrestataire $request)
    {
        $prestataire = $this->prestataire->create($request->all());

        return redirect('admin/prestataire/'.$prestataire->id)->with(array('status' => 'success' , 'message' => 'Le prestataire a été crée' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $prestataire  = $this->prestataire->find($id);
        $titres       = $this->titre->getAll()->lists('titre','id')->all();
        $tables       = $this->table->getAll();

        return view('backend.prestataires.show')->with(['prestataire' => $prestataire, 'titres' => $titres, 'tables' => $tables]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, CreatePrestataire $request)
    {
        $prestataire = $this->prestataire->update($request->all());

        return redirect('admin/prestataire/'.$prestataire->id)->with( array('status' => 'success' , 'message' => 'Le prestataire a été mise à jour' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->prestataire->delete($id);

        return redirect('admin/prestataire')->with(array('status' => 'success' , 'message' => 'Le prestataire a été supprimé' ));
    }

}
