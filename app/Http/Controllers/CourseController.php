<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Course::create([
            'title' => $request->get('title'),
        ]);

        return response()->json('success added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::with('users')->find($id);

        return response()->json(['course'=>$course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $users = json_decode($request->get('users',[]),true);

        $course = Course::where('id',$course->id)
            ->first();
        if (isset($course)) {
            $course->users()->sync($users);
            Course::where('id','=',$course->id)
                ->update([
                    'title' => $request->get('title')
                ]);
            return response()->json('updated success');
        } else {
            return response()->json('fail updated, course not found');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user_id = $request->user()->id;
       $course = Course::where('id','=',$id)->first();
       if (isset($course)) {
       //    $course->users()->detach();
          Course::where('id','=',$id)
              ->delete();

           return response()->json('deleted success');
       } else {
           return response()->json('fail deleted, course not found');
       }
    }
}
