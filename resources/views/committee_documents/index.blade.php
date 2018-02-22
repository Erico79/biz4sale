
@extends('layouts.dt-1')
@section('title','Documents')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Committee Documents</h4>
                        <div class="toolbar">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#create-modal" data-toggle="modal" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px;" >Add New</a>
                                </div>
                            </div>
                            @include('flash::message')
                            @include('adminlte-templates::common.errors')
                        </div>
                        <div class="material-datatables">
                            @include('committee_documents.table')
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>

    {{--delete-modal--}}
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="delete-form" method="post">
                    <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                        <h4 class="modal-title" style="margin-bottom: 10px">Delete documents</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this committee document?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-success btn-simple">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--modal for add --}}
    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        {!! Form::open(['route' => 'committeeDocuments.store','files'=>true]) !!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 style="" class="modal-title">Committee documents</h4>
                </div>
                <div class="modal-body" style="padding-top: 0;">
                    <!-- Session Id Field -->
                    <div class="form-group col-sm-12 is-empty" style="margin-top: 0;padding-bottom: 0;">
                        {!! Form::label('session_id', 'Session',['class' => 'control-label']) !!}
                        <select name="session_id" class="form-control" required>
                            @if(count($sessions))
                                @foreach($sessions as $session)
                                    <option value="{{ $session->id }}">{{ $session->session_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-12 is-empty" style="margin-top: 0;padding-bottom: 0;">
                        <label class="control-label">Committee</label>
                        <select class="form-control" required name="committee">
                            <option value="">Select committee</option>
                            @if(count($committees))
                                @foreach($committees as $committee)
                                    <option value="{{ $committee->id }}">{{ $committee->name }}</option>
                                    @endforeach
                                @endif
                        </select>
                    </div>
                    <div class="form-group col-md-12 is-empty" style="margin-top: 0;padding-bottom: 0;">
                        <label class="control-label">Document type</label>
                        <select class="form-control" name="committee_doc_category" required name="committee">
                            @if(count($types))
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                @endif
                        </select>
                    </div>
                    <div class="form-group col-sm-12  is-empty" required style="margin-top: 0;padding-bottom: 0;">
                        {!! Form::label('upload_date', 'Upload Date',['class' => 'control-label']) !!}
                        {!! Form::date('upload_date', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-12  is-empty" style="margin-top: 0;">
                        {!! Form::label('document_path', 'Document',['class' => 'control-label']) !!}
                        {{--{!! Form::text('document_path', null, ['class' => 'form-control']) !!}--}}
                        <button class="btn btn-block btn-success" ><span id="select-doc-btn">Select file</span>
                            <input type="file" name="document_path" required></button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-simple">upload</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        {!! Form::close() !!}
    </div>
@endsection
@push('js')
    <script>
        $(function () {
            $('input[type="file"]').change(function() {
//                if ($(this).val()) {
//                    var filename = $(this);
                $("#select-doc-btn").html($(this)[0].files[0].name);
//                }
//                return true;
            });
            return true;
        })

    </script>
@endpush



