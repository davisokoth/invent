<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
@section('head')
@include('head')
@show
</head>

<body data-offset="40">
<div class="container">
@include('header')

<!-- ========================================================================================================== -->
<div class="row">
	<div class="span3">
		
	</div>
	<div class="span7">
		@yield('body')
	</div>
</div>
<!-- Footer
      ================================================== -->
	  @section('footer')
	  @include('footer')
	  @show
	</style>
  </body>
</html>