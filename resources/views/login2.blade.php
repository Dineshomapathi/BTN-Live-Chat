@extends('layouts.appclean')

@section('content')
<div class="container" style="display:none"> <!--  style="display:none" -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('post-login')}}">
                        @csrf
                        <br>
                        <div class="form-group row" style="visibility:hidden; margin-left:5px; margin-right:5px;">
                            <label for="booth" class="col-md-4 col-form-label text-md-right">{{ __('Booth') }}</label>
                            <div class="col-md-6">
                                <input disabled="disable" type="text" id="booth" class="form-control{{ $errors->has('booth') ? ' is-invalid' : '' }}" value="{{ Request::get('booth') }}" name="booth" required>

                                @if ($errors->has('booth'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('booth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row" style="margin-left:5px; margin-right:5px;">
                            <label for="loginotp" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>

                            <div class="col-md-6">
                                <input id="loginotp" type="text" class="form-control{{ $errors->has('loginotp') ? ' is-invalid' : '' }}" name="loginotp" value="{{ Request::get('user') }}" required>

                                @if ($errors->has('loginotp'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('loginotp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>										

                        <!-- <div class="form-group row">
                            <div class="col-md-6">
                                <input id="region" type="hidden" class="form-control{{ $errors->has('region') ? ' is-invalid' : '' }}" value="{{ Request::get('region') }}" name="region" required>

                                @if ($errors->has('region'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('region') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <!-- <div class="form-group row">
                            <label for="inputAccess" class="col-md-4 col-form-label text-md-right">{{ __('Access') }}</label>
                            <div class="col-md-6">
                                <select id="inputAccess" class="form-control" type="text" name="access" required>
                                    <option selected>User</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="form-group row mb-0" style="margin-left:5px; margin-right:5px;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="startchat" class="btn btn-primary"> 
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row" style="visibility:hidden; margin-left:5px; margin-right:5px;">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value='pga' name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- <br> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
 	<script>
        window.onload=function(){
            //localStorage.setItem("avpe_user_stg", Date.now());
            //document.getElementById("loginotp").value = localStorage.getItem("avpe_user_stg"); --> enable ones go stg in 3dvista
            document.getElementById("startchat").click(); //--> enable ones go stg in 3dvista
            };
    </script>
@endsection