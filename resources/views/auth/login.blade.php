@extends('layouts.app')

@section('content')

    {{-- Login Form --}}
    <form method="post" action="{{route('login')}}">
        @csrf
        <div class="d-flex flex-column align-items-center justify-content-center mt-3">
            <div class="col-md-4 col-12">
                <div class="card  ">
                    <div class="card-header bg-dark text-white h5 text-center">
                        {{__('Login')}}
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="email" class="form-label">{{__('Email')}}</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                            @error('email')
                            <div class="text-danger text-sm">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{__('Password')}}</label>
                            <input type="password" class="form-control" id="password" name="password">

                            @error('password')
                            <div class="text-danger text-sm">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-2 text-center">
                            <div class="text-start my-3">
                                <span> {{__('Don\'t have account ?')}} </span>
                                <a href="{{route('register')}}" class=" text-decoration-none text-success">{{__('Register')}}</a>
                            </div>
                            <button type="submit" class="btn btn-dark">{{__('Login')}}</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
