@extends('painel.layout.layout')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>Documentos</h1>
    </div>

    @can('create-documents')
        <div class='col-md-12 text-center'>
            <a href='{{route('documents.create')}}' alt='Cadastrar' title='Cadastrar' class='btn btn-default'>
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
                <th>Titulo</th>
                <th width="100px">Documento</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($documents as $document)
            <tr>
                <td>
                    @can('delete-documents')
                        {!! Form::open(['route' => ['documents.destroy', $document->id], 'method' => 'delete', 'style' => 'display: inline']) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['type' => 'submit', 'class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan

                    @can('update-documents')
                        <a href='documents/{{$document->id}}/edit' class='btn btn-info'>
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    @endcan
                </td>
                <td>{{$document->id}}</td>
                <td>{{$document->title}}</td>
                <td class='text-center'>
                    <a href='{{$document->file}}' title='Arquivo' class='btn btn-info' target='_blank'>
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan='4' class='text-center'>
                    Nenhum Documento cadastrado
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class='col-md-12 text-center'>
        {{$documents->render()}}
    </div>
@endsection
