@extends('painel.layout.layout')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>Funcionários</h1>
    </div>

    @can('create-employees')
        <div class='col-md-12 text-center'>
            <a href='{{route('employees.create')}}' alt='Cadastrar' title='Cadastrar' class='btn btn-default'>
                Cadastrar
            </a>
            <br/>
            <br/>
        </div>
    @endcan

    <table class="table table-responsive table-striped table-bordered table-hovered">
        <thead>
            <tr>
                <th width="100px">Ações</th>
                <th width="100px">ID</th>
                <th>Nome</th>
                <th>Função</th>
                <th width="100px">Imagem</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
            <tr>
                <td>
                    @can('delete-employees')
                        {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete', 'style' => 'display: inline']) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan

                    @can('update-employees')
                        <a href='employees/{{$employee->id}}/edit' class='btn btn-info'>
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    @endcan
                </td>
                <td>{{$employee->id}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->function}}</td>
                <td>
                    <img src='{{$employee->image}}' class='img-responsive'>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan='5' class='text-center'>
                    Nenhum Funcionário cadastrado
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class='col-md-12 text-center'>
        {{$employees->render()}}
    </div>
@endsection
