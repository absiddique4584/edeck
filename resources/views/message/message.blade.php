


@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger fade in">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ $error }}
        </div>
    @endforeach
@endif

@if(session()->has('message'))
    <div class="alert bg-{{ session('type') }} fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ session('message') }}
    </div>
@endif
