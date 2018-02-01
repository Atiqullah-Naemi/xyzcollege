<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Course;
use App\Student;

class CourseController extends Controller
{
    /* Use Auth middleware for this controller */
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index')->withCourses($courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('courses.create')->withStudents($students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
                'name'           => 'required|max:255',
            ));

        $course = new Course;

        $course->name        = $request->name;
        $course->duration        = $request->duration;
        $course->student_id = $request->student_id;

        $course->save();
        Session::flash('success', 'New course created successfully!');
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);

        $students = Student::all();

        return view('courses.edit')->withCourse($course)->withStudents($students);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        $this->validate($request, array(
                'name'       => 'required|max:255',
        ));

        $course->name        = $request->name;
        $course->duration        = $request->duration;

        $course->save();

        Session::flash('success', 'One studnet updated successfully!');
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        $course->delete();
        Session::flash('success', 'One course Deleted Successfully!');
        return redirect()->route('courses.index');
    }
}
