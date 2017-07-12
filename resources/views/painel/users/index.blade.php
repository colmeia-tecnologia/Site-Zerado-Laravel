@extends('painel.layout.layout')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>Usuários</h1>
    </div>

    <div class='col-md-12 text-center'>
        <a href='{{route('users.create')}}' alt='Cadastrar' title='Cadastrar' class='btn btn-default'>
            Cadastrar
        </a>
        <br/>
        <br/>
    </div>

    <table class="table table-responsive table-striped table-bordered table-hovered">
        <thead>
            <tr>
                <th width="100px">Ações</th>
                <th width="100px">ID</th>
                <th>Nome</th>
                <th>Perfil</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete', 'style' => 'display: inline']) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    <a href='users/{{$user->id}}/edit' class='btn btn-info'>
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </td>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role}}</td>
            </tr>
            @empty
            <tr>
                <td colspan='3' class='text-center'>
                    Nenhuma Categoria de Post cadastrada
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class='col-md-12 text-center'>
        {{$users->render()}}
    </div>
@endsection
