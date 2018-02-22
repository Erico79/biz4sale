@extends('layouts.dt-1')
@section('title', 'Manage Committees')

@push('js')
    <script src="{{ asset('js/config/committees.js') }}"></script>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">supervisor_account</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">@yield('title')</h4>
                        <div class="toolbar">
                            <button class="btn btn-primary btn-sm" id="add-com" data-toggle="modal" data-target="#add-modal">
                                <i class="fa fa-plus"></i> Add Committee
                            </button>
                        </div>

                        <div class="material-datatables">
                            @include('layouts.common.success')
                            @include('layouts.common.warnings')
                            <table id="committees-dt" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Commitee#</th>
                                    <th>Name</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($committees))
                                    @foreach($committees as $committee)
                                    <tr>
                                        <td>{{ $committee->id }}</td>
                                        <td>{{ $committee->name }}</td>
                                        <td class="text-right">
                                            <a href="#" data-source="{{ url('config/committee/' . $committee->id) }}"
                                               title="Edit Committee" class="btn btn-simple btn-icon btn-warning edit-com">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="#" com-id="{{ $committee->id }}" title="Delete Committee" class="btn btn-simple btn-icon btn-danger remove-com">
                                                <i class="material-icons">close</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Commitee#</th>
                                    <th>Name</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                                </tfoot>
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

    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                    <h4 class="modal-title">New Committee</h4>
                </div>
                <form action="{{ url('config/committee') }}" method="post" class="form-horizontal" id="com-modal">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    <div class="modal-body">
                        <div class="form-group label-floating">
                            <label class="control-label">Committee Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>
                    {{--hidden fields--}}
                    <input type="hidden" name="id"/>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Save</button>
                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                </div>
                <form action="{{ url('config/committee') }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body text-center">
                        <h5>Are you sure you want to delete the committee? </h5>
                    </div>
                    {{--hidden fields--}}
                    <input type="hidden" name="del_id" id="del-id"/>
                    <div class="modal-footer text-center">
                        <button class="btn btn-success btn-simple">Yes</button>
                        <button type="button" class="btn btn-simple" data-dismiss="modal">Never mind</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection