<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>xyzCollege</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
 </head>
<body>

	<div id="app">
		<Appheader></Appheader>
		<div class="container">
			<router-view></router-view>
		</div>
		<Appfooter></Appfooter>
	</div>
	

	<script src="{{asset('js/app.js')}}"></script>
</body>
</html>