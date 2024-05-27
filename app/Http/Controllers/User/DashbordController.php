<?php

namespace App\Http\Controllers\user;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashbordController extends Controller
{
    public function index() {
        $myPanding = auth()->user()->transaction->where('status', 'panding')->count();
        $mySettlement = auth()->user()->transaction->where('status', 'settlement')->count();
        $myExpired = auth()->user()->transaction->where('status', 'expired')->count();
        $mySuccess = auth()->user()->transaction->where('status', 'success')->count();
        
        return view('pages.user.index', compact(
            'myPanding',
            'mySettlement',
            'myExpired',
            'mySuccess'
        ));
        }
}
