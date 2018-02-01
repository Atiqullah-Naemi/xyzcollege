@extends ('layouts.app')

@section ('content')

<br>
<div class="row main-content">
	<div class="col-md-6">
		<h1>All Courses</h1>
	</div>
	<div class="col-md-6">
		<a href="{{ route('courses.create') }}" class="btn btn-primary btn-lg top-spacing pull-right">
		<i class="fa fa-pencil"></i> Create New Course</a>
	</div>
</div>
<br>


<div class="row">
	<div class="col-md-10 md-offset-1">
		<table class="table table-hover" id="myTable">
			<thead>
				<tr>
					<th>#</th>
					<th>Course Name</th>
					<th>Course Duration</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($courses as $course)
				<tr>
					<td> {{ $course->id }} </td>
					<td> {{ $course->name }} </td>
					<td> {{ $course->duration }} </td>
					<td>
						<div class="row">
							<div class="cold-md-6">
								<a href="{{ route('courses.edit', $course->id) }}" class="btn btn-default">
									<i class="fa fa-edit"></i> Edit
								</a>
							</div>
							<div class="cold-md-6">
								{!! Form::open(['route' => ['courses.destroy', $course->id], 'method' => 'DELETE']) !!}
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
