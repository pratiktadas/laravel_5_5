<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;
use Mail;
use App\Jobs\SendWelcomeMail AS SendWelcomeEmail;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function send()
    {
        /*Log::info("Request cycle without Queues started");
        Mail::send('email.welcome', ['data'=>'data'], function ($message) {

            $message->from('pratiktadas70@gmail.com', 'Christian Nwmaba');

            $message->to('pratiktadas70@gmail.com');

        });
        Log::info("Request cycle without Queues finished");*/


        Log::info("Request Cycle with Queues Begins");
            $this->dispatch(new \App\Jobs\SendWelcomeMail());
        Log::info("Request Cycle with Queues Ends");


        /*Log::info("Request Cycle with Queues Begins");
            dispatch(new \App\Jobs\SendWelcomeMail());
        Log::info("Request Cycle with Queues Ends");*/

        /*$emailJob = (new \App\Jobs\SendWelcomeMail())->delay(Carbon::now()->addSeconds(3));
        dispatch($emailJob);*/

        dd("done");

    }

}
