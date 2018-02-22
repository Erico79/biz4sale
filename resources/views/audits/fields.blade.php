<!-- User Id Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('user_id', 'User Id',['class' => 'control-label']) !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Event Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('event', 'Event',['class' => 'control-label']) !!}
    {!! Form::text('event', null, ['class' => 'form-control']) !!}
</div>

<!-- Auditable Id Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('auditable_id', 'Auditable Id',['class' => 'control-label']) !!}
    {!! Form::number('auditable_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Auditable Type Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('auditable_type', 'Auditable Type',['class' => 'control-label']) !!}
    {!! Form::text('auditable_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Old Values Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('old_values', 'Old Values:') !!}
    {!! Form::textarea('old_values', null, ['class' => 'form-control']) !!}
</div>

<!-- New Values Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('new_values', 'New Values:') !!}
    {!! Form::textarea('new_values', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::textarea('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Ip Address Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('ip_address', 'Ip Address',['class' => 'control-label']) !!}
    {!! Form::text('ip_address', null, ['class' => 'form-control']) !!}
</div>

<!-- User Agent Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('user_agent', 'User Agent',['class' => 'control-label']) !!}
    {!! Form::text('user_agent', null, ['class' => 'form-control']) !!}
</div>


