@if(session()->has('error'))
    <div class="alert alert-danger">
        <button class="close" data-dismiss="alert">&times;</button>
        <small>{{ session('error') }}</small>
    </div>
@endif