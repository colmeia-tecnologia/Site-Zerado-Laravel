@extends('painel.layout.layout')

@section('content')
    <div class='col-md-12 text-center'>
        <h1>
            Alterar Funcionário: {{$employee->title}}  - ID: {{$employee->id}}
        </h1>
    </div>

    <div class='col-md-12'>
        @include('painel.layout.errors')
    </div>

    {!! Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'put']) !!}
        @include('painel.employees._form')
    {!! Form::close() !!}
@endsection