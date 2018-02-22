   {{--<a href="#" rel="tooltip" title="show" show-id="" class="btn btn-simple btn-info btn-icon common-show"><i class="material-icons">favorite</i></a>--}}
   <a href="#edit-modal" rel="tooltip" title="edit" data-toggle="modal" e-id="{{ $id}}" hint="{!! url('/audits/'.$id) !!}"  class="btn btn-simple btn-warning btn-icon common-edit"><i class="material-icons">edit</i></a>
   <a href="#delete-modal" rel="tooltip" title="delete" data-toggle="modal" action="{!! url('/audits/'.$id) !!}" class="btn btn-simple btn-danger btn-icon common-delete"><i class="material-icons">close</i></a>
