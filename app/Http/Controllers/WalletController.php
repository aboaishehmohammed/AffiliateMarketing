<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function show()
    {
        if (Auth::check()) {

            $wallet = auth()->user()->wallet()
                ->with(['latestTransactions', 'transactions.category'])
                ->first();

            $totalIncome = $wallet->transactions->where('type', 'income')->sum('amount');

            $totalExpenses = $wallet->transactions->where('type', 'expenses')->sum('amount');

            return view('wallet.show', compact('wallet', 'totalIncome', 'totalExpenses'));
        }

        return redirect(route('login'));
    }


    public function chart()
    {
       $token= auth()->user()->createToken('auth_token')->plainTextToken;
        return view('user.chart',compact('token'));
    }



}
