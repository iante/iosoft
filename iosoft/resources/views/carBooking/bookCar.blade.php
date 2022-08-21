@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book Car') }}</div>

                <div class="card-body">
                    @if (session('message'))
<div class="alert alert-danger"> {{ session('message') }}
</div>
@endif
                      @if($errors->any())
                      @foreach($errors->all() as $error)
                      <ul>
                          <li class="alert alert-danger">
                              {{ $error }}
                          </li>
                      </ul>
                      @endforeach
                      @endif
               
                    <form action="{{ route('user.process.booking')}}" method="POST" id="payment-form" class="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            
                            <div class="form-group col-md-12 col-lg-12 col-sm-12" style="margin-bottom: 10px;">
                                <label for="" class="col-md-12 col-lg-12 col-sm-12">{{ __('Choose Car Model') }}</label>
                                 <select  required name="car_model" class="form-select">
                                        <option value="">{{ __('Choose Option .....') }}</option>
                                       
                                             <option value="bmw">{{ __('BMW') }}</option>
                                            <option value="mercedes">{{ __('Mercedes S Class') }}</option>
                                             <option value="mazda">{{ __('Mazda Demio') }}</option>
                                             <option value="toyota">{{ __('Toyota Prado') }}</option>
                                             <option value="toyota">{{ __('Toyota Axios') }}</option>
                                             <option value="range">{{ __('Range Rover Vougue') }}</option>
                                             <option value="toyota">{{ __('Toyota Belta') }}</option>
                                             
                                    </select>
                                    
                            </div>
                          
                            
                              <div class="form-group col-md-12 col-lg-12 col-sm-12" >
                                <label for="" class="col-md-12 col-lg-12 col-sm-12">{{ __('How long do you intend to hire this car ? ') }}</label>
                                <select  required name="car_duration" class="form-select">
                                    <option value="">{{ __('Choose Option .....') }}</option>
                                   
                                         <option value="1">{{ __('1 Day') }}</option>
                                        <option value="2">{{ __('2 Days') }}</option>
                                         <option value="3">{{ __('3 Days') }}</option>
                                         <option value="4">{{ __('4 Days') }}</option>
                                         <option value="5">{{ __('5 Days') }}</option>
                                         <option value="6">{{ __('6 Days') }}</option>
                                         <option value="7">{{ __('7 Days') }}</option>
                                         
                                </select>
                               
                            </div>
                            
                            <div class="form-group col-md-12 col-lg-12 col-sm-12" style="margin-bottom: 10px;">
                                <label for="" class="col-md-12 col-lg-12 col-sm-12">{{ __('Choose your preferred mode of payment') }}</label>
                                <select  required name="car_mode_payment" class="form-select">
                                    <option value="">{{ __('Choose Option .....') }}</option>
                                   
                                         <option value="mpesa">{{ __('MPESA') }}</option>
                                        <option value="cash">{{ __('Cash') }}</option>
                                         <option value="bank_transfer">{{ __('Bank Transfer') }}</option>
                                         <option value="credit_card">{{ __('Credit Card') }}</option>
                                         
                                         
                                </select>
                             </div>
              
                            <div class="form-group col-md-12 col-lg-12 col-sm-12" style="margin-bottom: 10px;">
                                
                               <label for="" class="col-md-12 col-lg-12 col-sm-12">{{ __('Phone Number') }}</label>
                                <input type ="text" required name="phone_number" placeholder="Enter Phone Number" 
                                class="form-control" />

                            </div>

                            
                        </div>
                         <div class="form-group col-md-12 col-lg-12 col-sm-12">
                        <div class="button-btn">
                             
                           <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 text-center mt-3">
                            <div class="button-btn">
                                <button id="basictr"  type="submit" class="btn btn-success btn-md center-block" Style="width: 200px;">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </div>
                        </div>
                        </div>
                       
                    </form>
                </div>
        </div>
    </div>
</div>

<script>

    $(document ).ready(function() {
       $('form').on('submit', function (e) {
         $('button[type=submit], input[type=submit]', $(this)).blur().addClass('disabled is-submited');
          
         $('#basictr').html('Processing your booking....');
    });
    
    $(document).on('click', 'button[type=submit].is-submited, input[type=submit].is-submited', function(e) {
        e.preventDefault();
    });
       
    });
    
    </script>
@endsection
