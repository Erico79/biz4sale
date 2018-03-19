@if(session()->has('info'))
    <div class="alert alert-info">
        <button class="close" data-dismiss="alert">&times;</button>
        <small>{{ session('info') }}</small>
    </div>
@endif