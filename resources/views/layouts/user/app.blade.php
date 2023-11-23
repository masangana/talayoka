<!DOCTYPE html>
<html lang="en">

    @include('layouts.user.head')
	<body>
		<div class="body">

            @include('layouts.user.header')
            
            @yield('content')

            @include('layouts.user.footer')
		</div>

        @include('layouts.user.script')

	</body>
</html>
