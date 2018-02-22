<!-- User Group Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('user_group', 'User Group',['class' => 'control-label']) !!}
    {!! Form::number('user_group', null, ['class' => 'form-control']) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>

<!-- Broadcast Type Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('broadcast_type', 'Broadcast Type',['class' => 'control-label']) !!}
    {!! Form::number('broadcast_type', null, ['class' => 'form-control']) !!}
</div>


