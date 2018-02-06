<?php

namespace App\Http\Controllers;

use App\Student;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student');
    }

    /**
     * Display a listing of the data.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        return Student::orderBy('firstname', 'ASC')->get();
    }

    /**
     * Display a listing of the courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function listCourse()
    {
        return Course::orderBy('name', 'ASC')->get();
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

        $pb = new Student;

        $pb->firstname = $request->firstname;
        $pb->lastname = $request->lastname;
        $pb->phone = $request->phone;
        $pb->email = $request->email;
        $pb->date_of_birth = $request->date_of_birth;

        $pb->save();

        return $pb;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pb = Student::find($request->id);

        $pb->firstname = $request->firstname;
        $pb->lastname = $request->lastname;
        $pb->phone = $request->phone;
        $pb->email = $request->email;
        $pb->date_of_birth = $request->date_of_birth;

        $pb->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::where('id', $Student->id)->delete();
    }
}
