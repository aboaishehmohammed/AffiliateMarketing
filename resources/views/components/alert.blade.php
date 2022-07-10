<div class="row justify-content-center">
    @foreach (['error', 'success'] as $message)
        @if(session()->has($message))
            <div class="col-md-6 mt-3 alert  {{$message == 'success' ? 'alert-success' : 'alert-danger'}}  alert-dismissible fade show" role="alert">
                {{session($message)}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endforeach
</div>


