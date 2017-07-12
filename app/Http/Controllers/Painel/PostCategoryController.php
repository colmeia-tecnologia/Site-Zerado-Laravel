<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\PostCategoryRequest;
use App\Repositories\PostCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;

class PostCategoryController extends Controller
{
    private $repository;

    public function __construct(PostCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCategories = $this->repository->paginate();

        return view('painel.post_categories.index', compact('postCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.post_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCategoryRequest $request)
    {
        $data = $request->all();

        $this->repository->create($data);

        //Grava Log
        Activity::all()->last();

        Session::flash('message', ['Categoria de Post salva com sucesso!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->route('post_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postCategory = $this->repository->find($id);

        return view('painel.post_categories.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategoryRequest $request, $id)
    {
        $data = $request->all();

        $this->repository->update($data, $id);

        //Grava Log
        Activity::all()->last();

        Session::flash('message', ['Categoria de Post alterada com sucesso!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->route('post_categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        //Grava Log
        Activity::all()->last();

        return redirect()->route('post_categories.index');
    }
}
