<!-- Navbar -->
<div id="overlay" class="overlay"></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="btn btn-outline-light ml-2" id="sidebarToggle">
        <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="#">Inventory</a>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="fas fa-home"></i> Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">
              <i class="fas fa-sign-out-alt"></i> Logout </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
    <!-- Close Button -->
      <button id="closeSidebar" class="btn btn-light close-btn">
        <i class="fa fa-times"></i> <!-- Close icon -->
    </button> 
      <ul class="list-unstyled">
        <li>
          <a href="{{ route('dashboard') }}">
            <i class="fas fa-home"></i> Dashboard </a>
        </li>
        <li>
          <a href="{{ route('computer-list') }}">
          <i class="fa fa-th-list"></i> Computer Names </a>
        </li>
        <li>
          <a href="{{ route('all-list') }}">
            <i class="fas fa-desktop"></i> Computer list </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-file"></i> Generate Report </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-cog"></i> Settings </a>
        </li>
        <li>
          <a href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt"></i> Logout </a>
        </li>
      </ul>
    </div>