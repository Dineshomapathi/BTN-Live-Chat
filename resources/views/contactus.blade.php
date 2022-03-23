@extends('layouts.appclean')

@push('styles')
    <style>
      .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: red;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <div >
        <div class="col-md-12 float-left">
          </br>
          <h1>Register Interest</h2>
        </div>
        <div class="col-md-12 float-left">
          </br>
          <h4>Contact Details*</h2>
          <hr/>
        </div>
    
        <form method="post" action="contactus">
             {{csrf_field()}}
        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label" style="font-weight: bold;">{{ __('Name') }}</label>

            <div class="col-md-8">
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Name" required>

              @if ($errors->has('name'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label" style="font-weight: bold;">{{ __('Email') }}</label>

            <div class="col-md-8">
              <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" required>

              @if ($errors->has('email'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="phone_number" class="col-md-4 col-form-label" style="font-weight: bold;">{{ __('Phone Number') }}</label>
            <div class="col-md-2">
              <select id="select" name="select" class="custom-select">
                <option value="+60">Malaysia (+60)</option>
                <option value="+62">Indonesia (+62)</option>
              </select>
            </div>
            <div class="col-md-6">
              <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" placeholder="Phone Number" required>

              @if ($errors->has('phone_number'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('phone_number') }}</strong>
                </span>
              @endif
          </div>
        </div>

        
        <div class="col-md-12 float-left">
          </br>
          <h4>Privacy Notice*</h2>
          <hr/>
          <h6>By clicking “Submit”, you agree to PropertyGuru Group and its event partners contacting you by email and/or telephone to respond to your enquiry and to 
            provide you marketing, advertising and promotional information about their products and services. You acknowledge that you have read and understood PropertyGuru's 
            <a onclick='window.open("https://www.propertyguru.com.sg/customer-service/privacy")' style="cursor: pointer;color: rgb(0,255,0)"><font color="0000FF">Privacy Policy</font></a> 
            and <a onclick='window.open("https://www.propertyguru.com.sg/customer-service/terms-of-service")' style="cursor: pointer;color: rgb(0,255,0)"><font color="0000FF">Terms of Service</font></a>
            and consent to the collection, use, disclosure and processing of your personal information in accordance with our 
            <a onclick='window.open("https://www.propertyguru.com.sg/customer-service/privacy")' style="cursor: pointer;color: rgb(0,255,0)"><font color="0000FF">Privacy Policy</font></a> 
            and <a onclick='window.open("https://www.propertyguru.com.sg/customer-service/terms-of-service")' style="cursor: pointer;color: rgb(0,255,0)"><font color="0000FF">Terms of Service</font></a>. 
            You may unsubscribe at any time via the links provided in the promotional materials or withdraw your consent by following the steps set out in PropertyGuru's Privacy Policy.<h6>
          <div class="form-group row">
            <div class="col-12">
              <div class="custom-control custom-checkbox custom-control-inline">
                <input name="checkbox" id="checkbox_0" type="checkbox" checked="checked" class="custom-control-input" value="" required="required"> 
                <label for="checkbox_0" class="custom-control-label" style="line-height: 2em;">I have read, agreed and accepted the disclaimer and privacy notices.</label>
              </div>
            </div>
          </div>
          </br>
        </div>
        

        <div class="form-group row">
          <div class="col-md-12 offset-md-12"> 
            <button type="submit" class="btn btn-danger" style="width: 200px;">
              {{ __('Send') }}
            </button>
          </div>
        </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
  <script>

  </script>
@endsection




