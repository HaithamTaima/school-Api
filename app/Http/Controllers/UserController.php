<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function index()
    {
        return response()->json(['users'=>DB::table('users')->get()]);
    }

    public function profile($id)
    {
        try {
            $user = User::with('courses')->find($id);





            return response()->json(['user'=>$user]);
//            return [
//                'name' => $user->name,
//                'date' => Carbon::parse($user->created_at)
//                    ->format('Y-m-d H:i:s jS F Y'),
////                'courses' => $user->courses->map(function ($course) use($id,$user) {
////                    return [
////                        'content' => $course->title,
////                        'date' => Carbon::parse($course->updated_at)->format('Y-m-d H:i:s jS F Y')
////                    ];
////                })
//            ];
        } catch (\Exception $exception) {
            Log::error('UserController[profile]' . $exception->getMessage());
        }
    }
}
