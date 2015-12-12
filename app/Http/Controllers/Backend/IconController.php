<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Aren\Icon\Repo\IconInterface;
use App\Http\Requests\CreateIcon;
use App\Http\Requests\UpdateIcon;
use App\Service\UploadWorker;

class IconController extends Controller
{
    protected $icon;
    protected $upload;

    public function __construct(IconInterface $icon, UploadWorker $upload)
    {
        $this->icon   = $icon;
        $this->upload = $upload;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icons = $this->icon->getAll();

        return view('backend.icons.index')->with(['icons' => $icons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.icons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateIcon $request)
    {

        $data = $request->except('file');
        $file = $this->upload->upload( $request->file('file') , 'frontend/icons' , 'icon');

        $data['image'] = $file['name'];

        $icon = $this->icon->create( $data );

        return redirect('admin/icon/'.$icon->id)->with(array('status' => 'success' , 'message' => 'L\'icone a été crée' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $icon  = $this->icon->find($id);

        return view('backend.icons.show')->with(array( 'icon' => $icon));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UpdateIcon $request)
    {
        $data = $request->except('file');

        $file = $request->file('file', null);

        if($file)
        {
            $file = $this->upload->upload( $request->file('file') , 'frontend/icons' , 'icon');
            $data['image'] = $file['name'];
        }

        $icon = $this->icon->update($data);

        return redirect('admin/icon/'.$icon->id)->with( array('status' => 'success' , 'message' => 'L\'icone a été mise à jour' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->icon->delete($id);

        return redirect('admin/icon')->with(array('status' => 'success' , 'message' => 'L\'icone  a été supprimé' ));
    }

}
