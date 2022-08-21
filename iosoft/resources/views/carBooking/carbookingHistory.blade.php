@extends('layouts.app')

@section('content')
<section>
    <div class="dashboard-area pt-150 pb-100">
        <div class="container">
            <div class="row">
              
                <div class="col-lg-9">
                    <div class="main-container">
                        <div class="header-section">
                            <h4>{{ __('BOOKING REQUESTS') }}</h4>
                        </div>
                         @if (Session::has('success'))
                           <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ __('Track your booking progress') }}</h5>
                            </div>
                           
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">{{ __('Name') }}</th>
                                        <th>{{ __('Booked Car') }}</th>
                                        <th>{{ __('Duration') }}</th>
                                        <th>{{ __('Phone Number') }}</th>
                                        <th>{{ __('Charge' ) }}</th>
                                        <th>{{ __('Status' ) }}</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookedCars as $row)
                                    
                                      <tr>
                                        <td>{{ucwords(Auth::user()->name) }}</td>
                                        <td>{{ ucwords($row->model) }}</td>
                                        <td>{{ $row->number_of_days. __(' Days') }}</td>
                                        <td>{{ $row->phone_number }}</td>
                                        <td>{{ __('KES '). $row->charge }}</td>
                                        
                                        
                                        @if($row->status == 1)
                                        <td>
                                            <span class="badge bg-info">{{ __('Request Pending') }}</span>
                                        </td>
                                  
                                        
                                        @endif
                                        @if($row->status == 2)
                                        <td>
                                            <span class="badge bg-success">{{ __('Approved') }}</span>
                                        </td>
                                        @endif
                                        @if($row->status == 0)
                                        <td>
                                            <span class="badge bg-danger">{{ __('Rejected') }}</span>
                                        </td>
                                        @endif


                                         

                                       
                                        
                                        
                                         <!-- Modal -->
                                    
                                        
                                        <!--END-->
                                        
                                        
                                       
                                        
                                       
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                                <div class="button-btn" style="margin: 10px;">
                                    <a href={{ route('user.book.car') }}>
                                    @if($bookedCars)
                                    <button id="basictr"   class="btn btn-success btn-md center-block" Style="width: 200px;">{{ __('Book Again') }}</button>
                                    @else
                                    <button id="basictr"   class="btn btn-success btn-md center-block" Style="width: 200px;">{{ __('Book Car') }}</button>
                                    @endif
                                    </a>
                                </div>
                                <div class="float-right">
                                    {{ $bookedCars->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
