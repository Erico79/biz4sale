@extends('layouts.datatables')
@section('title', 'Category')

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
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
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
                                                <a href="#" class="btn btn-simple btn-info btn-icon like">
                                                    <i class="material-icons">edit</i></a>
                                                <a href="#" class="btn btn-simple btn-danger btn-icon remove">
                                                    <i class="material-icons">close</i></a>
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
@endsection