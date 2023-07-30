@extends('layouts.app')
@section('content')

<div class="pagetitle">
      <h1>Check in</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Home</a></li>
          <li class="breadcrumb-item">List of Check in and Check out</li>
          <li class="breadcrumb-item active">Check in</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              


     <!-- Table with stripped rows -->
     <table class="table datatable">
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
                  @foreach ($data as $check)
                  <tr>
                  <td>{{ $check->id}}</td>
                  <td>{{ strtoupper($check->plate)}}</td>
                  <td>{{ date('d M, Y', strtotime($check->checkindate))}}</td>
                  <td>{{ date('g:i A', strtotime($check->checkintime))}}</td>
                  <td>
                    @if ( $check->status === 0)
                      <p class="badge text-bg-danger text-wrap text-center">Checked In</p>
                      @else
                      <p class="badge text-bg-warning text-wrap text-center">UNDEFINED</p>
                    @endif
                  </td>
                  </tr> 
                  @endforeach
                   

                  
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              </div>
          </div>

        </div>
      </div>
    </section>


@endsection