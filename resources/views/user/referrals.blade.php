@extends('layouts.app')

@section('content')

    <div class="row gap-4 gap-md-0 d-flex justify-content-center ">
        <x-card-users title="Number Of Users" :value="$users->count()" class="text-dark"></x-card-users>
        <x-card-users title="Number Of Link Views " :value="auth()->user()->views" class="text-dark"></x-card-users>

    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card   ">
                <div class="card-header bg-dark h5 text-white">{{__('register users')}}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 10%">#</th>
                                <th scope="col" style="width: 25%">{{__('name')}}</th>
                                <th scope="col" style="width: 25%">{{__('phone')}}</th>
                                <th scope="col" style="width: 25%">{{__('registration Date')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $key=>$user)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <th>
                                        {{ucfirst($user->user->name)}}
                                    </th>
                                    <td>{{ucfirst($user->user->phone)}}</td>
                                    <td>{{$user->user->created_at->toDateTimeString()}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger"> {{__('No Users !')}}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
