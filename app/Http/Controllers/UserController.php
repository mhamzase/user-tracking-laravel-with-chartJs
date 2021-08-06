<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        $usersCount = [];

        for($i = 0 ; $i < 7 ; $i++){
            $usersCount[$i] = User::whereDate('created_at',Carbon::now()->subDays($i))->count();
        }
        
        return view('users',compact('users'))->with('usersCount',json_encode($usersCount,JSON_NUMERIC_CHECK));
        
    }
}
