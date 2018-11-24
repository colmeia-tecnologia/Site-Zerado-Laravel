@extends('painel.layout.layout')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>Novo Funcionário</h1>
    </div>

    @include('painel.layout.errors')

    {!! Form::open(['route' => 'employees.store']) !!}
        @include('painel.employees._form')
    {!! Form::close() !!}
@endsection
