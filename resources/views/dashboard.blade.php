
  @extends('layouts.app')

  @section('title', 'SPI Inventory System')

  @section('dashboard')
    <!-- Main Content -->

        <div class="row justify-content-start ">
          <h2 class="dashboard">Dashboard</h2>
        </div>
        <hr>
  @include('summary', ['counts' => $counts])  


        <!-- row below -->
        <div class="centered-content">
          <div class="row p-5">
            <!-- first Column: 1 Card with Toal number of computer -->
            <div class="col-md-6">
              <div class="row g-3">
                <div class="col-md-6 p-0">
                  <div class="total-card1 p-3">
                    <h2 class="card-title" style="color:#0097A7;">{{ $company_counts['spi'] }}</h2>
                    <p class="card-text">Superl Philippines Inc.</p>
                  </div>
                </div>
                <div class="col-md-6 p-0">
                  <div class="total-card2 p-3">
                    <h2 class="card-title" style="color:#C2185B;">{{ $company_counts['aal'] }}</h2>
                    <p class="card-text">Angeles Alliance Leatherware</p>
                  </div>
                </div>
                <div class="col-md-6 p-0">
                  <div class="total-card3 p-3">
                    <h2 class="card-title" style="color:#F57C00;">{{ $company_counts['siglo'] }}</h2>
                    <p class="card-text">Siglo Inc.</p>
                  </div>
                </div>
                <div class="col-md-6 p-0">
                  <div class="total-card4 p-3">
                    <h2 class="card-title" style="color:#2c3e50;">{{ $company_counts['total'] }}</h2>
                    <p class="card-text">Total Numbers of Computers</p>
                  </div>
                </div>
              </div>
            </div>



            <!-- third Column: 1 Card with Pie Chart -->
            <div class="col-md-5 pie-chart-box">
              <div class="card">
                <canvas id="myPieChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        
    @endsection