<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Aren\News\Repo\NewsInterface;
use App\Http\Requests\CreateNews;

class NewsController extends Controller
{
    protected $news;

    public function __construct(NewsInterface $news)
    {
        $this->news = $news;

        setlocale(LC_ALL, 'fr_FR.UTF-8');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->news->getAll();

        return view('backend.news.index')->with(['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateNews $request)
    {
        $news = $this->news->create($request->all());

        return redirect('admin/news/'.$news->id)->with(array('status' => 'success' , 'message' => 'La news a été crée' ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $news = $this->news->find($id);

        return view('backend.news.show')->with(array('news' => $news));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, CreateNews $request)
    {
        $news = $this->news->update($request->all());

        return redirect('admin/news/'.$news->id)->with( array('status' => 'success' , 'message' => 'La news a été mise à jour' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->news->delete($id);

        return redirect('admin/news')->with(array('status' => 'success' , 'message' => 'La news a été supprimé' ));
    }

}
