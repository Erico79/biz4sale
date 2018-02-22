<!-- Name Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('name', 'Name',['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('code', 'Code',['class' => 'control-label']) !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>


