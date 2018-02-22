@extends('layouts.dt-1')
@section('title','Committees')
@section('content')
       <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="purple">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Committees</h4>
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
                                @include('committees.table')
                            </div>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            {{--<i class="material-icons">assignment</i>--}}
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Committee members</h4>
                            <div class="toolbar">
                             <div class="row">
                                <div class="col-md-12">
                                    <a href="#create-modal" committee-id="" id="add-member-btn"  class="btn btn-rose pull-right" style="margin-top: -10px;margin-bottom: 5px;" >Add Member</a>
                                </div>
                                </div>
                                {{--@include('flash::message')--}}
                                {{--@include('adminlte-templates::common.errors')--}}
                            </div>
                            <div class="material-datatables">
                                <input type="hidden" value="{{url('getCommitteeMembers')}}" id="com-table-data">
                                <table class="table table-hover" id="committee-members-tbl">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th style="width: 80px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
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
                        <h4 class="modal-title" style="margin-bottom: 10px">Delete Committees</h4>
                    </div>
                    <div class="modal-body">
                         <p>Are you sure you want to delete this Committees?</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-simple btn-success">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete-m-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="remove-com-member" method="post">
                        <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="material-icons">clear</i>
                        </button>
                        <h4 class="modal-title" style="margin-bottom: 10px">Remove member</h4>
                    </div>
                    <div class="modal-body">
                         <p>Are you sure you want to remove this member from this committee?</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-simple btn-success">Yes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        {{--modal for add --}}
        <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           {!! Form::open(['route' => 'committees.store']) !!}
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                           <h4 class="modal-title">Create Committees</h4>
                       </div>
                       <div class="modal-body">
                           @include('committees.fields')
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-simple btn-danger" data-dismiss="modal">Cancel</button>
                           <button type="submit" class="btn btn-simple btn-success">Save</button>
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
                        <h4 class="modal-title">Edit Committees</h4>
                    </div>
                    <div class="modal-body">
                        @include('committees.fields')

                    </div>
                    <div class="modal-footer">
                         <input type="hidden" id="editDetails" value="{{ url("/committees") }}">
                        <button type="button" class="btn btn-simple btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-simple btn-success">Save</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            </form>
        </div>

       <div class="modal fade" id="add-committee-mb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           {!! Form::open(['route' => 'committeeMembers.store','id'=>'committees-form']) !!}
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                       <h4 class="modal-title">Add Members</h4>
                   </div>
                   <div class="modal-body">
                        <table class="table" id="add-members-tb">
                            <thead>
                            <tr>
                                <th>Select</th>
                                <th>Member</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($members))
                                @foreach($members as $member)
                                    <tr>
                                        <td><input type="checkbox" value="{{ $member->id }}" class="member-id"></td>
                                        <td>{{ $member->surname.' '.$member->firstname.' '.$member->middlename }}</td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                   </div>
                   <div class="modal-footer">
                       <input type="hidden" id="comId">
                       <button type="button" class="btn btn-simple btn-danger" data-dismiss="modal">Cancel</button>
                       <button type="submit" class="btn btn-simple btn-success">Save</button>
                   </div>
               </div>
               <!-- /.modal-content -->
           </div>
           <!-- /.modal-dialog -->
           {!! Form::close() !!}
       </div>
@endsection
@push('js')
    <script src="{{ asset('js/committees/committees.js') }}"></script>
@endpush
