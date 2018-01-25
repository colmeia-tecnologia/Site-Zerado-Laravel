<div class='col-md-6'>
    <div class="input-group">
        <span class="input-group-addon" id="titulo">Titulo</span>
        {!! Form::input('text', 'title', null, ['class' => 'form-control', 'aria-describedby' => 'titulo']) !!}
    </div>
</div>

<div class='col-md-6'>
    <div class='input-group'>
        <span class="input-group-addon" id="descricao">Descrição</span>
        {!! Form::input('text', 'description', null, ['class' => 'form-control', 'aria-describedby' => 'descricao']) !!}
    </div>
</div>

<div class='col-md-6 margin-top'>
    <div class='input-group'>
        <span class="input-group-addon" id="file">Documento</span>
        {!! Form::input('file', 'file', null, ['aria-describedby' => 'file', 'accept' => 'application/pdf']) !!}
    </div>
</div>

<div class='col-md-12 text-center margin-top'>
    {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Salvar&nbsp;', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
</div>

@section('scripts')
    {!! Html::script('/js/painel/tinymce/tinymce.min.js') !!}
    {!! Html::script('/js/painel/upload.min.js') !!}
@endsection