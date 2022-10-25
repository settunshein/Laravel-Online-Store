<!DOCTYPE html>
<html lang="en">
@include('layouts.frontend.partials.head')

<body>
	@include('layouts.frontend.partials.header')
	
	@isset($slider)
		@include('layouts.frontend.partials.slider')
	@endisset
	
	@yield('content')
	
	@include('layouts.frontend.partials.footer')
  
    @include('layouts.frontend.partials.scripts')
</body>
</html>