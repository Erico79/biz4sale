<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role Id:') !!}
    {!! Form::number('role_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Masterfile Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('masterfile_id', 'Masterfile Id:') !!}
    {!! Form::number('masterfile_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Changed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password_changed', 'Password Changed:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('password_changed', false) !!}
        {!! Form::checkbox('password_changed', '1', null) !!} 1
    </label>
</div>

<!-- Email Confirmed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_confirmed', 'Email Confirmed:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('email_confirmed', false) !!}
        {!! Form::checkbox('email_confirmed', '1', null) !!} 1
    </label>
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', false) !!}
        {!! Form::checkbox('status', '1', null) !!} 1
    </label>
</div>

<!-- Remember Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
