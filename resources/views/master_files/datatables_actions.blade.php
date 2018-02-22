
{{--<td class="td-actions text-right">--}}
<td class="text-right">
   {{--<a href="#" rel="tooltip" title="show" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">favorite</i></a>--}}
   <a href="#edit-modal" data-toggle="modal" e-id="{{ $id}}" hint="{!! url('/masterFiles/'.$id) !!}" rel="tooltip" title="edit" class="btn btn-simple btn-warning btn-icon mf-common-edit"><i class="material-icons">edit</i></a>
   <a href="#delete-modal" data-toggle="modal"  action="{!! url('masterFiles/'.$id) !!}"  rel="tooltip" title="delete" class="btn btn-simple btn-danger btn-icon remove common-delete"><i class="material-icons">close</i></a>
</td>
{{--</td>--}}