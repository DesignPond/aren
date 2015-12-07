<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Aren\Troncon\Repo\TronconInterface;
use App\Aren\Troncon\Worker\TronconWorkerInterface;
use App\Service\UploadWorker;

class TronconController extends Controller
{
    protected $troncon;
    protected $worker;
    protected $upload;

    public function __construct(TronconInterface $troncon, TronconWorkerInterface $worker, UploadWorker $upload)
    {
        $this->troncon = $troncon;
        $this->worker  = $worker;
        $this->upload  = $upload;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $troncons = $this->troncon->getAll(false);

        return view('backend.troncons.index')->with(['troncons' => $troncons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $troncon = $this->troncon->find($id);

        return view('backend.troncons.show')->with(['troncon' => $troncon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('kml');
        $kml  = $request->file('kml',null);

        if($kml)
        {
            $kml = $this->upload->upload($kml, 'kml');
            $data['kml'] = $kml['name'];
            $this->worker->convert('kml/'.$data['kml'], $data['color']);
        }

        $troncon = $this->troncon->update($data);

        return redirect()->back()->with(array('status' => 'success' , 'message' => 'Le tronçon a été mis à jour' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}