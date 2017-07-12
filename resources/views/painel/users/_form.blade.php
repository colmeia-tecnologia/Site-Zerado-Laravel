<div class='col-md-6'>
    <div class="input-group">
        <span class="input-group-addon" id="name">Nome</span>
        {!! Form::input('text', 'name', null, ['class' => 'form-control', 'aria-describedby' => 'name']) !!}
    </div>
</div>

<div class='col-md-6'>
    <div class="input-group">
        <span class="input-group-addon" id="email">E-mail</span>
        {!! Form::input('email', 'email', null, ['class' => 'form-control', 'aria-describedby' => 'email']) !!}
    </div>
</div>

<div class='col-md-6 margin-top'>
    <div class="input-group">
        <span class="input-group-addon" id="password">Senha</span>
        {!! Form::input('password', 'password', null, ['class' => 'form-control', 'aria-describedby' => 'password']) !!}
    </div>
</div>

<div class='col-md-6 margin-top'>
    <div class="input-group">
        <span class="input-group-addon" id="confirmation">Confirmação</span>
        {!! Form::input('password', 'confirmation', null, ['class' => 'form-control', 'aria-describedby' => 'confirmation']) !!}
    </div>
</div>

{{--@if(\Route::current()->getName() == 'users.create')--}}
    <div class='col-md-6 margin-top'>
        <div class="input-group">
            <span class="input-group-addon" id="role">Perfil</span>
            {!! Form::select('role', $roles, null, ['class' => 'form-control', 'aria-describedby' => 'role']) !!}
        </div>
    </div>
{{--@endif--}}

<div class='col-md-12 text-center margin-top'>
    {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Salvar&nbsp;', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
</div>