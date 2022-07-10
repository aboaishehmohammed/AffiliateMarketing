<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function referrals()
    {
        $users = auth()->user()->referralUsers()
            ->with(['referralUsers', 'user'])
            ->get();

        return view('wallet.referrals', compact('users'));
    }

    public function chartsData()
    {

        $data = auth()->user()->referralUsers()->
        select(
            DB::raw("(count(*)) as total"),
            DB::raw("created_at")
        )->with(['referralUsers', 'user'])->where('created_at', '>=', date('Y-m-d H:m:s', strtotime("-2 weeks")))
            ->groupBy(DB::raw('DAY(created_at)'))->get();


        $dates = [];
        for ($i=0;$i<14;$i++){
            if ($i) {
                $dates[] = date('m-d', strtotime("-{$i} days"));
            }
            else {
                $dates[] = date('m-d');
            }
        }
        $datas=[];
        foreach ($data as $d) {
            $datas[] = [date('m-d', strtotime($d->created_at)), $d->total];
        }
        foreach ($dates as $date){
            foreach ($datas as $d) {
                if ($d[0] == $date)
                    continue 2;
            }
            $datas[] = [$date,0];
        }
        sort($datas);

        $result = [
            array_column($datas, '0'),
            array_column($datas, '1')
        ];
        return response()->json($result);
    }
}
