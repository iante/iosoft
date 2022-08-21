@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-lg-6">
                  <h4 style="color: darkblue">{{ __('CAR HIRE SERVICE REQUESTS') }}</h4>
                </div>
                
            </div>
            @if (Session::has('message'))
              <div class="alert alert-success">{{ Session::get('message') }}</div>
              @elseif(Session::has('error'))
              <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <div class="card">
              <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-2">
                  <thead>
                    <tr>
                      
                      <th>{{ __('Client') }}</th>
                      <th>{{ __('Booked Car') }}</th>
                      <th>{{ __('Duration') }}</th>
                      <th>{{ __('Phone Number') }}</th>
                      <th>{{ __('Charge' ) }}</th>
                      <th>{{ __('Status' ) }}</th>
                      <th>{{ __('Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bookedCars as $car)
                    <tr>
                      <td>{{ ucwords($car->user->name) }}</td>
                      <td>{{ ucwords($car->model) }}</td>
                      <td>{{ $car->number_of_days. __(' Days') }}</td>
                      <td>{{ $car->phone_number }}</td>
                      <td>{{ __('KES '). $car->charge }}</td>
                      @if($car->status == 1)
                                        <td>
                                            <span class="badge bg-info">{{ __('Request Pending') }}</span>
                                        </td>
                                  
                                        
                                        @endif
                                        @if($car->status == 2)
                                        <td>
                                            <span class="badge bg-success">{{ __('Approved') }}</span>
                                        </td>
                                        @endif
                                        @if($car->status == 0)
                                        <td>
                                            <span class="badge bg-danger">{{ __('Rejected') }}</span>
                                        </td>
                                        @endif

                      <td>
                        <div class="dropdown d-inline">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('Action') }}
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item has-icon" href="{{ route('admin.approve.booking.service', $car->id) }}"><i class="fa fa-edit"></i>{{ __('Approve') }}</a>
                            <a class="dropdown-item has-icon delete-confirm" href="{{ route('admin.reject.booking.service', $car->id) }}" ><i class="fa fa-trash"></i>{{ __('Reject') }}</a>
                            <a class="dropdown-item has-icon delete-confirm" href="{{ route('admin.delete.booking.service', $car->id) }}" ><i class="fa fa-trash"></i>{{ __('Delete') }}</a>
        
                            
                          </div>
                        </div>
                      </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
</div>


@endsection
