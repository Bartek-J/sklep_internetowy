<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Mail\Newsletter;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class NewsController extends Controller
{
    public function index()
    {
        return view('news');
    }
    public function mail(NewsletterRequest $request)
    {
        $emails = DB::table('users')->select('email')->distinct()->get();

        $dane = array();
        $tytul = $_POST['title'];
        $dane['header'] = $_POST['header'];
        $dane['main'] = $_POST['main'];
        if (isset($_POST['przycisk'])) {
            $dane['przycisk'] = 1;
            $dane['przyciskopis'] = $_POST['przyciskopis'];
            $dane['link'] = $_POST['link'];
        } else {
            $dane['przycisk'] = 0;
        }

        Mail::to($emails)->send(new Newsletter($dane,$tytul));
        return back()->with([
            'status' => [
                'type' => 'success',
                'content' => 'Wysłano wiadomość email do wszystkich użytkowników'
            ]
        ]);
    }
}
