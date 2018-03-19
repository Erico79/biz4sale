@if (count($errors->all()))
    <div class="alert alert-warning">
        <button class="close" data-dismiss="alert">&times;</button>
        <h5>Errors</h5>
        <ul>
            @foreach($errors->all() as $error)
                <li><small>{{ $error }}</small></li>
            @endforeach
        </ul>
    </div>
@endif
