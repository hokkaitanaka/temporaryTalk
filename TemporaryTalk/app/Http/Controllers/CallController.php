<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Call;
use Illuminate\Support\Str;
use App\Traits\ZoomJWT;
use DateTime;
use Illuminate\Support\Facades\Validator;

class CallController extends Controller
{
    use ZoomJWT;
    
    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function call()
    {
        if (session()->has('id')) {
            $id = session()->get('id');
                
            $user = DB::table('users')
            ->where('id', $id)
            ->get();

            return view('mypage', ['user' => $user,],);
        }

        return view('login');
    }

    public function postCall(Request $request)
    {
        if ($request->session()->has('id')) {
            $id = session()->get('id');
            $users = DB::table('users')
            //->where('id', $id)
            ->get();

            DB::table('users')
            ->where('id', $id)
            ->update(['url' => '']);

            $calls = DB::table('calls')
            ->get();

            //dd($calls);

            //dd($calls);
            if($request->filled('wanting')){
                if(count($calls) > 0){
                
                    $date = new DateTime();
                    $date = $date->format('Y-m-d H:i:s');
    
                    $path = 'users/me/meetings';
                    $response = $this->zoomPost($path, [
                    'type' => self::MEETING_TYPE_SCHEDULE,
                    'start_time' => $this->toZoomTimeFormat($date),
                    'duration' => 30,
                    'settings' => [
                        'host_video' => false,
                        'participant_video' => false,
                        'waiting_room' => true,
                    ]
                    ]);
                
                    $message = json_decode($response->body(), true);
                    $message = $message['start_url'];
                    
                    $calls = DB::table('calls')
                    ->get();

                    $callId = $calls[0]->user_id;
                    //dd($callId);

                    DB::table('calls')
                    ->where('user_id', $callId)
                    ->delete();

                    DB::table('users')
                    ->where('id', $callId)
                    ->update(['url' => $message]);

                    DB::table('users')
                    ->where('id', $callId)
                    ->update(['is_wanting' => false]);
    
                    DB::table('users')
                    ->where('id', $id)
                    ->update(['url' => $message]);

                }else{
                    $calls= new Call();
                    $calls->create([
                        'user_id' => $id,
                    ]);
                    DB::table('users')
                    ->where('id', $id)
                    ->update(['is_wanting' => true]);
                }
            }

            if($request->filled('not_wanting')){
                DB::table('users')
                ->where('id', $id)
                ->update(['is_wanting' => false]);

                DB::table('calls')
                ->where('user_id', $id)
                ->delete();
            }

            $user = DB::table('users')
            ->where('id', $id)
            ->get();

            return view('mypage', ['user' => $user,],);
            
        }else{
            return view('login');
        }
    }
    

    
}