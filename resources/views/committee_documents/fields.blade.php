<!-- Session Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('session_id', 'Session Id:') !!}
    {!! Form::number('session_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Committee Doc Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('committee_doc_category', 'Committee Doc Category:') !!}
    {!! Form::number('committee_doc_category', null, ['class' => 'form-control']) !!}
</div>

<!-- Committee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('committee', 'Committee:') !!}
    {!! Form::number('committee', null, ['class' => 'form-control']) !!}
</div>

<!-- Document Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_path', 'Document Path:') !!}
    {!! Form::text('document_path', null, ['class' => 'form-control']) !!}
</div>

<!-- Upload Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('upload_date', 'Upload Date:') !!}
    {!! Form::date('upload_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('committeeDocuments.index') !!}" class="btn btn-default">Cancel</a>
</div>
