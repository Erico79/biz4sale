@if(session()->has('success'))
    <div class="alert alert-success">
        <button class="close" data-dismiss="alert">&times;</button>
        {{ session('success') }}
    </div>
@endif