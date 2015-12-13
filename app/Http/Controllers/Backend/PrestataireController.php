<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreatePrestataire;
use App\Http\Controllers\Controller;
use App\Aren\Prestataire\Repo\PrestataireInterface;
use App\Aren\Prestation\Repo\TitreInterface;
use App\Aren\Prestation\Repo\TableInterface;
use App\Aren\Prestation\Repo\OptionInterface;
use App\Aren\Prestation\Repo\RemarqueInterface;
use App\Aren\Troncon\Worker\TronconWorkerInterface;

class PrestataireController extends Controller
{
    protected $prestataire;
    protected $titre;
    protected $table;
    protected $option;
    protected $remarque;
    protected $worker;

    public function __construct(PrestataireInterface $prestataire, TitreInterface $titre, TableInterface $table, OptionInterface $option, RemarqueInterface $remarque, TronconWorkerInterface $worker)
    {
        $this->prestataire = $prestataire;
        $this->titre       = $titre;
        $this->table       = $table;
        $this->option      = $option;
        $this->remarque    = $remarque;
        $this->worker      = $worker;
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

        $prestataires = $this->prestataire->getAll(true,true);
        $this->worker->write($prestataires, 'prestataires');

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
        $titres       = $this->titre->getAll()->groupBy('table_id');
        $options      = $this->option->getAll()->lists('titre','id')->all();
        $tables       = $this->table->getAll();

        $tables_options = [
            1 => ['places','prix'],
            2 => ['places','prix'],
            3 => ['option_id'],
            4 => ['option_id','prix'],
            5 => ['option_id','remarque']
        ];

        return view('backend.prestataires.show')->with(['prestataire' => $prestataire, 'titres' => $titres, 'tables' => $tables, 'options' => $options, 'tables_options' => $tables_options]);
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

        $prestataires = $this->prestataire->getAll(true,true);
        $this->worker->write($prestataires, 'prestataires');

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
