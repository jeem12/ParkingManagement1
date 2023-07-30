@extends('layouts.app')
@section('content')
<div class="pagetitle">
      <h1>Check In and Out</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ session('home')}}">Home</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="mt-4 mb-4">
                 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Entry</button>
              </div>


              <div class="modal" id="addModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Entry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>      
      <form action="{{ route('manager.submit.form')}}" method="POST">
      @csrf
      <div class="modal-body">
      <div class="col-md-12">


                  <div class="form-floating">
                    <input type="text" name="plate" class="form-control" id="floatingName" placeholder="Please enter plate no.">
                    <label for="floatingName">{{ __('Plate No.') }}</label>
                  </div>

                </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">ADD</button>
      </div>
      </form>
    </div>
  </div>
</div>



             


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">PLATE</th>
                    <th scope="col">CHECK IN DATE</th>
                    <th scope="col">CHECK OUT TIME</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($checksData['checkin'] as $check)
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
                  <td>
                    <form action="{{ route('manager.checkout', ['id' => $check->id]) }}" method="POST">
                      @csrf
                    <button type="submit" class="badge text-bg-success">Check Out</button>
                    </form>
                  </td>
                  </tr> 
                  @endforeach
                   

                  
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->



                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">PLATE</th>
                    <th scope="col">CHECK IN DATE</th>
                    <th scope="col">CHECK OUT TIME</th>
                    <th>CHECK OUT DATE</th>
                    <th>CHECK OUT TIME</th>
                    <th>STATUS</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($checksData['checkout'] as $check)
                  <tr>
                  <td>{{ $check->id}}</td>
                  <td>{{ strtoupper($check->plate)}}</td>
                  <td>{{ date('d M, Y', strtotime($check->checkindate))}}</td>
                  <td>{{ date('g:i A', strtotime($check->checkintime))}}</td>
                  <td>{{ date('d M, Y', strtotime($check->checkoutdate))}}</td>
                  <td>{{ date('g:i A', strtotime($check->checkouttime))}}</td>
                  <td> 
                    @if ( $check->status === 1)
                      <p class="badge text-bg-success text-wrap text-center">Checked Out</p>
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