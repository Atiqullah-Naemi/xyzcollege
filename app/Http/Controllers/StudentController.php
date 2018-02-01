<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Student;

class StudentController extends Controller
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
        $students = Student::all();        
        return view('students.index')->withStudents($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
                'firstname'           => 'required|max:255',
                'lastname'           => 'required|max:255',
                'student_email'           => 'required',
            ));

        $student = new Student;

        $student->firstname        = $request->firstname;
        $student->lastname        = $request->lastname;
        $student->student_email        = $request->student_email;
        $student->phone_number        = $request->phone_number;
        $student->date_of_birth        = $request->date_of_birth;


        $student->save();
        Session::flash('success', 'New student created successfully!');
        return redirect()->route('students.index');
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
        $student = Student::find($id);

        return view('students.edit')->withStudent($student);
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
        $student = Student::find($id);

        $this->validate($request, array(
                'firstname'       => 'required|max:255',
                'lastname' => 'required|max:255',
                'student_email'        => 'required',
        ));

        $student->firstname        = $request->firstname;
        $student->lastname        = $request->lastname;
        $student->student_email        = $request->student_email;
        $student->phone_number        = $request->phone_number;
        $student->date_of_birth        = $request->date_of_birth;

        $student->save();

        Session::flash('success', 'One studnet updated successfully!');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();
        Session::flash('success', 'One student Deleted Successfully!');
        return redirect()->route('students.index');
    }
}
