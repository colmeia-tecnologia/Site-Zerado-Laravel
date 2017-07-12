<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\User\UserCreateRequest;
use App\Http\Requests\Painel\User\UserUpdateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;

class UserController extends Controller
{
    private $repository;

    public function __construct(UserRepository $repository)
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
        $users = $this->repository->paginate();

        return view('painel.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = [
            'Simples' => 'Simples', 
            'Administrador' => 'Administrador'
        ];

        return view('painel.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $this->repository->create($data);

        //Grava Log
        Activity::all()->last();

        Session::flash('message', ['Usuário salvo com sucesso!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect('/users');
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
        /*if(Auth::user()->id != $id)
            $id = Auth::user()->id;*/

        $roles = [
            'Simples' => 'Simples', 
            'Administrador' => 'Administrador'
        ];

        $user = $this->repository->find($id);

        return view('painel.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $data = $request->all();

        if(isset($data['password']))
            $data['password'] = bcrypt($data['password']);
        else 
            unset($data['password']);


        if($data['email'] == Auth::user()->email)
            unset($data['email']);

        $this->repository->update($data, $id);

        //Grava Log
        Activity::all()->last();

        //Faz Login Novamente
        $user = $this->repository->find($id);
        Auth::login($user);

        Session::flash('message', ['Usuário alterado com sucesso!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->route('users.index');
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

        return redirect()->route('users.index');
    }
}
