<!-- Masterfile Id Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('masterfile_id', 'Masterfile Id',['class' => 'control-label']) !!}
    {!! Form::number('masterfile_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Document Id Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('document_id', 'Document Id',['class' => 'control-label']) !!}
    {!! Form::number('document_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Broadcast Id Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('broadcast_id', 'Broadcast Id',['class' => 'control-label']) !!}
    {!! Form::number('broadcast_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Broadcast Type Field -->
<div class="form-group col-sm-12 label-floating is-empty">
    {!! Form::label('broadcast_type', 'Broadcast Type',['class' => 'control-label']) !!}
    {!! Form::number('broadcast_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Sent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sent', 'Sent:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('sent', false) !!}
        {!! Form::checkbox('sent', '1', null) !!} 1
    </label>
</div>

<!-- Received Field -->
<div class="form-group col-sm-6">
    {!! Form::label('received', 'Received:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('received', false) !!}
        {!! Form::checkbox('received', '1', null) !!} 1
    </label>
</div>


