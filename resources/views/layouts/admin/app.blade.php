<!DOCTYPE html>
<html lang="en">

@include('layouts.admin.head')

<body>

  <!-- ======= Header ======= -->
  @include('layouts.admin.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts.admin.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">
      @if($title)
        <div class="pagetitle">
          <h1>{{$title}}</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </nav>
        </div>
      @endif
        @yield('content')


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts.admin.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('layouts.admin.scripts')

</body>

</html>