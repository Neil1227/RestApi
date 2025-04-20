<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  </head>

  <body>
  <!-- *********************************routes for breadcrumbs*********************************** -->
  @include('layouts.navbar') <!-- Include the Navbar -->
  @include ('layouts.add-modal')
  @include ('layouts.delete-modal')

  @if (!View::hasSection('dashboard') && !View::hasSection('computer-list'))
    @include('layouts.breadcrumbs')
@endif



    
    <!-- Main Content -->
    <div class="main-content" id="main-content">
      <div class="centered-container">
          @yield('dashboard') 
          @yield('computer-list')
          @yield('all-list')
          @yield('p1adminBldg')
          @yield('p1BldgA')
          @yield('p1prod')
          @yield('p1whBldg')
          @yield('p2')
          @yield('p3')
          @yield('p5')
          @yield('p6')

      </div>
    </div>
<!-- Add this before </body> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Load jQuery first -->
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script> <!-- Then load DataTables -->

<!-- DO NOT REMOVE -->

<script src="{{ asset('js/fetch-data-tables.js') }}"></script> 
<script src="{{ asset('js/fetch-computer-list.js') }}"></script> 
<script src="{{ asset('js/fetch-all-computer.js') }}"></script> 
<script src="{{ asset('js/recordsearch.js') }}"></script> 
<script src="{{ asset('js/insertrecord.js') }}"></script> 
<script src="{{ asset('js/deleterecord.js') }}"></script>

<script src="{{ asset('js/pie.js') }}"></script> 
<script src="{{ asset('js/breadcrumbs.js') }}"></script> 
<script src="{{ asset('js/sidebar.js') }}"></script> 
<!--/-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </body>
  

</html>