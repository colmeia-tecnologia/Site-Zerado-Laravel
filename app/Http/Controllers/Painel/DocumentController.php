<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Util\FileController;
use App\Http\Requests\Painel\DocumentStoreRequest;
use App\Http\Requests\Painel\DocumentUpdateRequest;
use App\Repositories\DocumentRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;

class DocumentController extends Controller
{
    private $repository;

    public function __construct(DocumentRepository $repository)
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
        if(Gate::denies('view-documents'))
            return redirect('/');

        $documents = $this->repository->paginate();

        return view('painel.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('create-documents'))
            return redirect('/');

        return view('painel.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentStoreRequest $request)
    {
        if(Gate::denies('create-documents'))
            return redirect('/');

        $data = $request->all();

        $file = $data['file'];
        $data['file'] = $this->upload($file);

        $this->repository->create($data);

        //Grava Log
        Activity::all()->last();

        Session::flash('message', ['Documento salvo com sucesso!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect('/documents');
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
        if(Gate::denies('update-documents'))
            return redirect('/');

        $document = $this->repository->find($id);

        return view('painel.documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentUpdateRequest $request, $id)
    {
        if(Gate::denies('update-documents'))
            return redirect('/');

        $data = $request->all();

        if(isset($data['file'])) {
            $file = $data['file'];
            $data['file'] = $this->upload($file);
        }

        $this->repository->update($data, $id);

        //Grava Log
        Activity::all()->last();

        Session::flash('message', ['Documento alterado com sucesso!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->route('documents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('delete-documents'))
            return redirect('/');

        $this->repository->delete($id);

        //Grava Log
        Activity::all()->last();

        return redirect()->route('documents.index');
    }

    private function upload(UploadedFile $file)
    {
        $name = $this->fileExists($file);

        Storage::putFileAs('/docs', $file, $name);

        return env('APP_URL').'/docs/'.$name;
    }

    private function fileExists($file)
    {
        $name           = $file->getClientOriginalName();
        $name           = str_replace(' ', '-', $name);

        $nameExtension  = FileController::nameExtension($name);
        $fileExists     = public_path('/docs/'.implode('', $nameExtension));

        while(File::exists($fileExists)) {
            $nameExtension[0].= '_1';
            $fileExists = public_path('/docs/'.implode('', $nameExtension));
        }

        return $nameExtension[0].$nameExtension[1];
    }
}
