@extends('painel.layout.layout')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>
            Alterar Documento: {{$document->title}}  - ID: {{$document->id}}
        </h1>
    </div>

    <div class='col-md-12'>
        @include('painel.layout.errors')
    </div>

    {!! Form::model($document, ['route' => ['documents.update', $document->id], 'method' => 'put', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
        @include('painel.documents._form')
    {!! Form::close() !!}
@endsection