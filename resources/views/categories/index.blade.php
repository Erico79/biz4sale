@extends('layouts.datatables')
@section('title', 'Category')

@push('js')
    @if($edit)
    <script>
        $(function(){
            $('#category-modal').modal('show');

            $('.remove-cat').on('click', function() {
                if (confirm('Are you sure you want to delete the selected category?')){
                    $(this).next().submit();
                } else {
                    return false;
                }
            });
        });
    </script>
    @endif
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">DataTables.net</h4>
                    <div class="toolbar">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#category-modal">
                            <i class="fa fa-plus"></i> Add Category</button>
                    </div>
                    <div class="material-datatables">
                        @include('common.success')
                        @include('common.warnings')
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                            <tr>
                                <th>Category#</th>
                                <th>Category Name</th>
                                <th>Parent Category</th>
                                <th class="disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Category#</th>
                                <th>Category Name</th>
                                <th>Parent Category</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>
                                @if(count($categories))
                                    @foreach($categories as $category)
                                        @php
                                            $parent_category = '';
                                            if ($parent_cat = $category->parent_category_id)
                                                $parent_category = \App\Category::find($parent_cat)->name;
                                        @endphp
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $parent_category }}</td>
                                            <td class="text-right">
                                                <a href="{{ url('categories/'. $category->id .'/edit') }}"
                                                   data-toggle="tooltip" title="Edit Category"
                                                   class="btn btn-simple btn-info btn-icon">
                                                    <i class="material-icons">edit</i></a>
                                                <a href="#"
                                                   data-toggle="tooltip" title="Delete Category"
                                                   class="btn btn-simple btn-danger btn-icon remove-cat">
                                                    <i class="material-icons">close</i></a>
                                                <form action="{{ url('categories/' . $category->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
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

    {{--modal--}}
    <div class="modal fade" id="category-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Category</h4>
                </div>
                <div class="modal-body" >

                    <form action="{{ $url }}" method="post" id="cat-form">
                        {{ csrf_field() }}

                        @if(request()->has('id'))
                            {{ method_field('PUT') }}
                        @endif

                        <div class="form-group">
                            <label class="control-label" for="category_name">Category Name</label>
                            <input type="text" value="{{ ($edit) ? $category->name : old('category_name') }}" id="category_name" name="name"
                                   class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="parent_category_id">Attach to</label>
                            <select name="parent_category_id" id="parent_category_id" class="form-control" required>
                                <option value="">--Select--</option>
                                <option value="NONE">None</option>
                                @if(count($categories))
                                    @foreach($categories as $category)
                                        @if($edit)
                                            <option value="{{ $category->id }}" {{ ($category->id == $cat->parent_category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        {{--hidden fields--}}
                        <div class="form-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="material-icons">close</i> Close</button>
                            <button class="btn btn-success"><i class="material-icons">save</i> Save</button>
                        </div>
                    </form>

                </div>

                <!--<div class="modal-footer">-->
                <!---->
                <!--</div>-->
            </div>
        </div>
    </div>
@endsection