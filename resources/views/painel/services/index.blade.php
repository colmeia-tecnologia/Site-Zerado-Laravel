@extends('painel.layout.layout')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>Serviços</h1>
    </div>

    <div class='col-md-12 text-center'>
        <a href='{{route('services.create')}}' alt='Cadastrar' title='Cadastrar' class='btn btn-default'>
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
                <th width="150px">Icone</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
            <tr>
                <td>
                    {!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'delete', 'style' => 'display: inline']) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    <a href='services/{{$service->id}}/edit' class='btn btn-info'>
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                </td>
                <td>{{$service->id}}</td>
                <td>{{$service->name}}</td>
                <td>{!!$service->icon!!}</i></td>
            </tr>
            @empty
            <tr>
                <td colspan='4' class='text-center'>
                    Nenhum Serviço cadastrado
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class='col-md-12 text-center'>
        {{$services->render()}}
    </div>
@endsection
