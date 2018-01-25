@extends('painel.layout.layout')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>Novo Documento</h1>
    </div>

    @include('painel.layout.errors')

    {!! Form::open(['route' => 'documents.store', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
        @include('painel.documents._form')
    {!! Form::close() !!}
@endsection
