@extends('layouts.app')
@section('content')

<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
<section class="section dashboard">
      <div class="row">


          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title">Check in <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-p-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $currentCheckInToday }}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

             <!-- Sales Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">


                <div class="card-body">
                  <h5 class="card-title">Check out <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bag-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $currentCheckOutToday}}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

             <!-- revenue Card -->
             <div class="col-12">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cash"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $formattedCurrentRevenue}}</h6>
                      <span class="text-success small pt-1 fw-bold">{{ $formattedPercentageChange}}</span> <span class="text-muted small pt-2 ps-1">increase last month</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End revenue Card -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">


                <div class="card-body">
                  <h5 class="card-title">Recent Check in <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                      <th scope="col">#</th>
                      <th scope="col">PLATE</th>
                      <th scope="col">CHECK IN DATE</th>
                      <th scope="col">CHECK OUT TIME</th>
                      <th scope="col">STATUS</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if ($lastRecord)
                      <tr>
                        <td>{{ $lastRecord->id}}</td>
                        <td>{{ strtoupper($lastRecord->plate)}}</td>
                        <td>{{ date('d M, Y', strtotime($lastRecord->checkindate))}}</td>
                        <td>{{ date('g:i A', strtotime($lastRecord->checkintime))}}</td>
                        <td>
                          @if ( $lastRecord->status === 0)
                            <p class="badge text-bg-danger text-wrap text-center">Checked In</p>
                            @else
                            <p class="badge text-bg-warning text-wrap text-center">UNDEFINED</p>
                          @endif
                        </td>
                        </tr>
                      @endif
                        
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->


          </div>
    </section>
@endsection