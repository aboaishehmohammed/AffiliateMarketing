@extends('layouts.app')

@section('content')

    <div class="row gap-4 gap-md-0 ">

        <x-card  title="Balance" :value="$wallet->balance" class="text-dark"></x-card>

        <x-card  title="Total Income" :value="$totalIncome" class="text-dark"></x-card>

        <x-card  title="Total Expenses" :value="$totalExpenses" class="text-dark"></x-card>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="card   ">
                <div class="card-header bg-dark h5 text-white">{{__('Wallet Transactions')}}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 10%">#</th>
                                <th scope="col" style="width: 25%">{{__('Type')}}</th>
                                <th scope="col" style="width: 25%">{{__('Category')}}</th>
                                <th scope="col" style="width: 15%">{{__('Amount')}}</th>
                                <th scope="col" style="width: 25%">{{__('Created At')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($wallet->latestTransactions as $transaction)
                                <tr>
                                    <th scope="row">{{$transaction->id}}</th>
                                    <th class="text-dark text-capitalize" >
                                        {{$transaction->type}}
                                    </th>
                                    <td class="text-dark text-capitalize">{{$transaction->category->name}}</td>
                                    <td class="text-dark">
                                       {{$transaction->amount}}
                                    </td>
                                    <td>{{$transaction->created_at->toDateTimeString()}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger"> {{__('No Transactions !')}}</td>
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
