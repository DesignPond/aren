<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreatePrestation;
use App\Http\Controllers\Controller;
use App\Aren\Prestation\Repo\PrestationInterface;

class PrestationController extends Controller
{
    protected $prestation;

    public function __construct(PrestationInterface $prestation)
    {
        $this->prestation = $prestation;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreatePrestation $request)
    {
        $prestation = $this->prestation->create($request->all());

        return redirect()->back()->with(array('status' => 'success' , 'message' => 'La prestation a été crée' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, CreatePrestation $request)
    {
        $prestation = $this->prestation->update($request->all());

        return redirect()->back()->with( array('status' => 'success' , 'message' => 'La prestation a été mise à jour' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->prestation->delete($id);

        return redirect()->back()->with(array('status' => 'success' , 'message' => 'Le prestation a été supprimé' ));
    }

}
