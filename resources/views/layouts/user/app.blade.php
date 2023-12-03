<!DOCTYPE html>
<html lang="en">

    @include('layouts.user.head')
	<body data-plugin-page-transition>
		<div class="body">

            @include('layouts.user.header')
            
            @yield('content')
            <br>
            @include('layouts.user.footer')
		</div>
        
        @include('layouts.user.script')

	</body>
</html>
