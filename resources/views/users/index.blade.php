@extends('layouts.dt-1')
@section('title','Users')
@section('content')
       <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="purple">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Users</h4>
                            <div class="toolbar">
                                @include('flash::message')
                                @include('adminlte-templates::common.errors')
                            </div>
                            <div class="material-datatables">
                                @include('users.table')
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
                        <h4 class="modal-title" style="margin-bottom: 10px">Delete masterfile</h4>
                    </div>
                    <div class="modal-body">
                         <p>Are you sure you want to delete this masterfile?</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-simple">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        {{--modal for add --}}
        <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           {!! Form::open(['route' => 'users.store']) !!}
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                           <h4 class="modal-title">Create Users</h4>
                       </div>
                       <div class="modal-body">
                           @include('users.fields')
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-simple" data-dismiss="modal">Cancel</button>
                           <button type="submit" class="btn btn-simple">Save</button>
                       </div>
                   </div>
                   <!-- /.modal-content -->
               </div>
               <!-- /.modal-dialog -->
           {!! Form::close() !!}
        </div>

        {{--modal for add --}}
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <form method="post" id="edit-form">
              {{ csrf_field() }}
            <input name="_method" type="hidden" value="PATCH">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Edit Users</h4>
                    </div>
                    <div class="modal-body">
                        @include('users.fields')

                    </div>
                    <div class="modal-footer">
                         <input type="hidden" id="editDetails" value="{{ url("/users") }}">
                        <button type="button" class="btn btn-simple" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-simple">Save</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            </form>
        </div>
@endsection
@push('js')
    <script src="{{ asset('js/users/users.js') }}"></script>
    @endpush

