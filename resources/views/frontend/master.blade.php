<!DOCTYPE html>
<html lang="en">

<head>
  @include('frontend.includes.style')
</head>

<body class="index-page">

  @include('frontend.includes.navbar')

  	<main class="main">
		@yield('content')
	</main>
  
  @include('frontend.includes.footer')
  @include('frontend.includes.script')
 

</body>

</html>
