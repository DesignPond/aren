<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateImage;

use App\Http\Controllers\Controller;
use App\Aren\Image\Repo\ImageInterface;
use App\Aren\Page\Repo\PageInterface;
use App\Service\UploadInterface;

class ImageController extends Controller
{
    protected $image;
    protected $page;
    protected $upload;

    public function __construct(ImageInterface $image, PageInterface $page, UploadInterface $upload)
    {
        $this->image  = $image;
        $this->page   = $page;
        $this->upload = $upload;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = $this->image->getAll();

        return view('backend.images.index')->with(['images' => $images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = $this->page->getAll()->whereLoose('illustration', 1);

        return view('backend.images.create')->with(['pages' => $pages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateImage $request)
    {
        $data = $request->except('file');
        $_file = $request->file('file', null);

        if($_file)
        {
            $file = $this->upload->upload( $_file , 'files' , 'image');

            $data['image'] = $file['name'];
        }

        $image = $this->image->create($data);

        return redirect('admin/image/'.$image->id)->with(array('status' => 'success' , 'message' => 'Le bloc postit/polaroid a été crée' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $image = $this->image->find($id);
        $pages = $this->page->getAll()->whereLoose('illustration', 1);

        return view('backend.images.show')->with(['image' => $image, 'pages' => $pages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, CreateImage $request)
    {
        $data  = $request->except('file');
        $_file = $request->file('file', null);

        if($_file)
        {
            $file = $this->upload->upload( $_file , 'files' , 'image');

            $data['image'] = $file['name'];
        }

        $image = $this->image->update($data);

        return redirect('admin/image/'.$image->id)->with(['status' => 'success' , 'message' => 'Le bloc postit/polaroid a été mise à jour' ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->image->delete($id);

        return redirect('admin/image')->with(array('status' => 'success' , 'message' => 'Le bloc postit/polaroid a été supprimé' ));
    }

}
