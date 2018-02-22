<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $committeeDocument->id !!}</p>
</div>

<!-- Session Id Field -->
<div class="form-group">
    {!! Form::label('session_id', 'Session Id:') !!}
    <p>{!! $committeeDocument->session_id !!}</p>
</div>

<!-- Committee Doc Category Field -->
<div class="form-group">
    {!! Form::label('committee_doc_category', 'Committee Doc Category:') !!}
    <p>{!! $committeeDocument->committee_doc_category !!}</p>
</div>

<!-- Committee Field -->
<div class="form-group">
    {!! Form::label('committee', 'Committee:') !!}
    <p>{!! $committeeDocument->committee !!}</p>
</div>

<!-- Document Path Field -->
<div class="form-group">
    {!! Form::label('document_path', 'Document Path:') !!}
    <p>{!! $committeeDocument->document_path !!}</p>
</div>

<!-- Upload Date Field -->
<div class="form-group">
    {!! Form::label('upload_date', 'Upload Date:') !!}
    <p>{!! $committeeDocument->upload_date !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $committeeDocument->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $committeeDocument->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $committeeDocument->deleted_at !!}</p>
</div>

