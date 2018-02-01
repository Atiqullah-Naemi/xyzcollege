@extends('layouts.app')

@section('content')

<div class="row main-content">
	<div class="col-md-8 md-offset-2">
		<h1>Edit Student</h1>
		<hr>
		{!! Form::model($student, ['route' => ['students.update', $student->id], 'method' => 'PUT']) !!}

		{{ Form::label('firstname', 'First Name: ') }}
		{{ Form::text('firstname', null, ['class' => 'form-control', 'id' => 'firstname']) }}
		<span id="firstnameerror"></span><br>

		{{ Form::label('lastname', 'Last Name: ') }}
		{{ Form::text('lastname', null, ['class' => 'form-control', 'id' => 'lastname']) }}
		<span id="lastnameerror"></span><br>

		{{ Form::label('student_email', 'Email: ') }}
		{{ Form::text('student_email', null, ['class' => 'form-control', 'id' => 'student_email']) }}
		<span id="emailerror"></span><br>

		{{ Form::label('phone_number', 'Phone Number: ') }}
		{{ Form::text('phone_number', null, ['class' => 'form-control', 'id' => 'phone_number']) }}
		<span id="pherror"></span><br>

		{{ Form::label('dob', 'Date of Birth: ') }}
		{{ Form::text('date_of_birth', null, ['class' => 'form-control', 'id' => 'dob']) }}
		<span id="doberror"></span><br>
		
		{{ Form::submit('Update Student', ['class' => 'btn btn-primary pull-right']) }}

		{!! Form::close() !!}
	</div>
</div>

@endsection
