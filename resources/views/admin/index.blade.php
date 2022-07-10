@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card  ">
                <div class="card-header text-white bg-dark">
                    {{__('Registered User Information')}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 5%">#</th>
                                <th scope="col" style="width: 10%">{{__('Name')}}</th>
                                <th scope="col" style="width: 15%">{{__('Email')}}</th>
                                <th scope="col" style="width: 10%">{{__('Phone')}}</th>
                                <th scope="col" style="width: 10%">{{__('Birthdate')}}</th>
                                <th scope="col" style="width: 10%">{{__('Total Expenses')}}</th>
                                <th scope="col" style="width: 10%">{{__('Total Income')}}</th>
                                <th scope="col" style="width: 10%">{{__('Wallet Balance')}}</th>
                                <th scope="col" style="width: 15%">{{__('Number Of referrals')}}</th>
                                <th scope="col" style="width: 15%">{{__('Registered Date')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->birthdate}}</td>
                                <td>{{$user->wallet->expensesTransactions->sum('amount')}}</td>
                                <td>{{$user->wallet->incomeTransactions->sum('amount')}}</td>
                                <td>{{$user->wallet->balance}}</td>
                                <td>{{$user->referralUsers->count()}}</td>
                                <td>{{$user->created_at->toDateString()}}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="9"  class="text-center text-danger"> {{__('No Users !')}}</td>
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
