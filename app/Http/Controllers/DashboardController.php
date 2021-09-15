<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count= array();
        $count['user'] = User::count();
        $count['product'] =Product::active()->count();
        $count['order'] = Order::count();


        return view('dashboard',compact('count'));
    }
    public function users()
    {
        $admins = User::where('role','admin')->get();
        $users = User::where('role','user')->get();
        return view('users', compact('users','admins'));
    }
    public function nadaj($user_id, Request $request)
    {
        $user=User::findOrFail($user_id);
        $me= Auth()->user()->id;
        if($me == $user->id)
        {
            return back()->with([
                'status' => [ 'type' => 'danger',
                'content' => 'Nie można odebrać uprawnień samemu sobie']
            ]);
        }
        else
        {
        $user-> role = $request->input('rola');
        $user->save();
        return back()->with([
            'status' => [ 'type' => 'success',
            'content' => 'Zmieniono uprawnienia wybranemu użytkownikowi']
        ]);
        }
    }
   
}
