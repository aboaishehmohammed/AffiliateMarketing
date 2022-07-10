<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::notAdmin()
            ->with(['wallet' , 'wallet.incomeTransactions' , 'wallet.expensesTransactions','referralUsers'])
            ->get();

        return view('admin.index', compact('users'));
    }
}
