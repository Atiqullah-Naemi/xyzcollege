@extends ('layouts.app')

@section ('content')

<br>
<div class="row main-content">
	<div class="col-md-12">
		{!! Form::open(['route' => 'students.index', 'method' => 'GET']) !!}
			<div class="input-group">
				{!! Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search Students']) !!}
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit">Search</button>
				</span>
			</div>
		{!! Form::close() !!}
	</div>
</div>
<br>

<div class="row main-content">
	<div class="col-md-6">
		<h1>All Students</h1>
	</div>
	<div class="col-md-6">
		<a href="{{ route('students.create') }}" class="btn btn-primary btn-lg top-spacing pull-right">
		<i class="fa fa-pencil"></i> Create New Student</a>
	</div>
</div>
<br>


<div class="row">
	<div class="col-md-10 md-offset-1">
		<table class="table table-hover" id="myTable">
			<thead>
				<tr>
					<th>#</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email Address</th>
					<th>Phone Number</th>
					<th>Date of Birth</th>
					<th>Courses</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($students as $student)
				<tr>
					<td> {{ $student->id }} </td>
					<td> {{ $student->firstname }} </td>
					<td> {{ $student->lastname }} </td>
					<td> {{ $student->student_email }} </td>
					<td> {{ $student->phone_number }} </td>
					<td> {{ date('jS M Y', strtotime($student->date_of_birth)) }} </td>
					<td>
						<div class="tags">
							@foreach ($student->courses as $course)
							<label class="label label-default"> {{ $course->name }} </label>
							&nbsp;
							@endforeach
						</div>
					</td>
					<td>
						<div class="row">
							<div class="cold-md-6">
								<a href="{{ route('students.edit', $student->id) }}" class="btn btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
							</div>
							<div class="cold-md-6">
								{!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'DELETE']) !!}
									{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
								{!! Form::close() !!}
							</div>
						</div>
						
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection
