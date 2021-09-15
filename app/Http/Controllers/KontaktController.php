<?php

namespace App\Http\Controllers;

use App\Http\Requests\pytanieRequest;
use App\Mail\Zapytanie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KontaktController extends Controller
{
    public function index()
    {
        return view('kontakt');
    }
    public function create(pytanieRequest $request)
    {
        $tytul = $request->input('title');
        Mail::to( config('MAIL_FROM_ADDRESS', 'Huge.picc@gmail.com') )->send(new Zapytanie($request,$tytul));
        return back()->with([
            'status' => [
                'type' => 'secondary',
                'content' => 'Dziękujemy za wysłanie wiadomości!'
            ]
        ]);
    }
}
