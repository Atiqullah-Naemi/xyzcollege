@extends('layouts.app')

@section('content')

<div class="row main-content">
	<div class="col-md-8 md-offset-2">
		<h1>Edit Course</h1>
		<hr>
		{!! Form::model($course, ['route' => ['courses.update', $course->id], 'method' => 'PUT']) !!}

		{{ Form::label('name', 'Course Name: ') }}
		{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
		<span id="nameerror"></span><br>

		{{ Form::label('duration', 'Course Duration: ') }}
		{{ Form::text('duration', null, ['class' => 'form-control', 'id' => 'duration']) }}
		<span id="durationerror"></span><br>

		{{ Form::label('student_id', 'Assigng to: ') }}
		<select name="student_id" class="form-control">
			@foreach ($students as $student)
			<option value="{{ $student->id }}"> {{ $student->firstname . ' ' . $student->lastname }} </option>
			@endforeach
		</select>
		<span id="siderror"></span><br>
		
		{{ Form::submit('Update Course', ['class' => 'btn btn-primary pull-right']) }}

		{!! Form::close() !!}
	</div>
</div>

@endsection
