@extends('layouts.app')

@section('content')

    <form method="post" action="{{route('register')}}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column align-items-center justify-content-center mt-3">
            <div class="col-md-4 col-12">
                <div class="card  ">
                    <div class="card-header bg-dark h5 text-center text-white">
                        {{__('Register')}}
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="name" class="form-label">{{__('Name')}}</label>
                            <input type="hidden" class="form-control" id="referral_user_link" name="referral_user_link"
                                   value="{{$referral}}">
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                            @error('name')
                            <div class="text-danger text-sm">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

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

                        <div class="mb-3">
                            <label for="phone" class="form-label">{{__('Phone Number')}}</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
                            @error('phone')
                            <div class="text-danger text-sm">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="birthdate" class="form-label">{{__('Birthdate')}}</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate"
                                   value="{{old('birthdate')}}">
                            @error('birthdate')
                            <div class="text-danger text-sm">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">{{__('Your Image')}}</label>
                            <input type="file" class="form-control" accept="image/*" id="image" name="image">
                            @error('image')
                            <div class="text-danger text-sm">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-2 text-center">
                            <div class="text-start my-3">
                                <span> {{__('Already have account ?')}} </span>
                                <a href="{{route('login')}}" class="text-decoration-none ">{{__('Login')}}</a>
                            </div>
                            <button type="submit" class=" btn btn-dark">{{__('Register')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
