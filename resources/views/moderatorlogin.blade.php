@extends('layouts.appclean')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Moderator Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('post-moderator-login')}}">
                        @csrf
                        <br>

                        <div class="form-group row" style="margin-left:5px; margin-right:5px;">
                            <label for="loginotp" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>

                            <div class="col-md-6">
                                <input id="loginotp" type="text" class="form-control{{ $errors->has('loginotp') ? ' is-invalid' : '' }}" name="loginotp" required>

                                @if ($errors->has('loginotp'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('loginotp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>									
										

                        <div class="form-group row" style="margin-left:5px; margin-right:5px;">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password"  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value='btn_moderator' name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="margin-left:5px; margin-right:5px;">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection