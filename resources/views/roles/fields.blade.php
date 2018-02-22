<!-- Name Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('name', 'Name',['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('code', 'Code',['class' => 'control-label']) !!}
    {!! Form::text('code', null, ['class' => 'form-control','required'=>'required']) !!}
</div>
