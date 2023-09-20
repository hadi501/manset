<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;
use App\Models\Production;
use App\Models\Order;

class Controller extends BaseController
{
    // use AuthorizesRequests, ValidatesRequests;
    public function homeView(){
        return view('home');
    }

    public function getSize($size1, $size2)
    {
        if($size2 == null){
            $size   = $size1;
        }else{
            $size   = $size1."x".$size2;
        }
        return $size;
    }

    public function getAmount($amount, $unit)
    {
        if($unit == "0"){
            $amount = $amount * 12;
        }
        return $amount;
    }

    public function getShift(){
        $now = Carbon::now();

        $sixAM = Carbon::today()->setTime(6, 0, 0);
        $twoPM = Carbon::today()->setTime(14, 0, 0);
        $tenPM = Carbon::today()->setTime(22, 0, 0);
        $midnight = Carbon::today()->setTime(0, 0, 0);

        if ($now->between($sixAM, $twoPM)) {
            $shift = "0";
        } elseif ($now->between($twoPM, $tenPM)) {
            $shift = "1";
        } else {
            if ($now->greaterThanOrEqualTo($midnight) && $now->lessThan($sixAM)) {
                $shift = "2";
                $now->subDay();
            } else {
                $shift = "2";
            }
        }

        $dateFormatted = $now->format('Y-m-d');
        
        return [$shift, $dateFormatted];
    }

    public function coba(){
        
        $orders = Order::with('production')->get();

        return $orders[0]->production->sum('amount');
    
    }

}
