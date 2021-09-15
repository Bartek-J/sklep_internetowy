<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateSettings;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('settings');
    }
    
    public function update(UpdateSettings $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $data = $request->all(); 
        if(isset($data['aktualne-haslo']))
        {
        if(!\Hash::check($data['aktualne-haslo'], auth()->user()->password)){
             return back()->with('error','You have entered wrong password');
        }else{
        $user->password = Hash::make($data['haslo']);

        }
        }
        
        $user->name = $request->input('nazwa');
        $user->save();
        return back()->with([
            'status' => [ 'type' => 'success',
            'content' => 'Zmiany zostały zapisane']
        ]);
    }
    
}
