<div class='col-md-4'>
    <a data-toggle="modal" href="/upload" data-target="#uploadModal">
        @if(!isset($post))
            <img 
                src='{{ asset('img/template/painel/sem-imagem.jpg') }}' 
                alt='Clique para selecionar a imagem' 
                title='Clique para selecionar a imagem' 
                class='img-responsive'
                id='image-uploaded'
            >
            {!! Form::input('hidden', 'image', null, ['id' => 'image']) !!}
        @else
            <img 
                src='{{$post->image}}' 
                alt='Clique para selecionar a imagem' 
                title='Clique para selecionar a imagem' 
                class='img-responsive'
                id='image-uploaded'
            >
            {!! Form::input('hidden', 'image', null, ['id' => 'image']) !!}
        @endif
    </a>

    @include('painel.upload.modal')
</div>

<div class='col-md-8'>
    <div class="input-group">
        <span class="input-group-addon" id="titulo">Titulo</span>
        {!! Form::input('text', 'title', null, ['class' => 'form-control', 'aria-describedby' => 'titulo']) !!}
    </div>
</div>

<div class='col-md-8 margin-top'>
    <div class="input-group">
        <span class="input-group-addon" id="post_category_id">Categoria</span>
        {!! Form::select('post_category_id', $postCategories, null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class='col-md-8 margin-top'>
    <div class="input-group">
        <span class="input-group-addon" id="descrição">Descrição</span>
        {!! Form::input('text', 'description', null, ['class' => 'form-control', 'aria-describedby' => 'descrição']) !!}
    </div>
</div>

<div class='col-md-8 margin-top'>
    <label for='text'>Texto</label>
    <textarea name="text" id='text'class='tinymce'>{{$post->text or ''}}</textarea>
    <a data-toggle="modal" href="/upload/tinymce" data-target="#uploadModalTinyMce" id="tinyMceImageModalLink"></a>

    <div class="modal fade" id="uploadModalTinyMce" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>
</div>

<div class='clearfix'></div>

<div class='col-md-12 text-center margin-top'>
    {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Salvar&nbsp;', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
</div>

@section('scripts')
    {!! Html::script('/js/painel/tinymce/tinymce.min.js') !!}
    {!! Html::script('/js/painel/upload.min.js') !!}

    <script>
        $('#uploadModalTinyMce').on('hide.bs.modal', function (e) {
            var name = $('#selectedImage').val();

            if(name != '')
                name = name.split('://painel.').join('://');

            $('#mceu_33-inp').val(name);
        });
    </script>
@endsection