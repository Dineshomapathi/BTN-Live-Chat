@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h2>Add new user</h2>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf  
                        <br>

                        <div class="form-group row">
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

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="booth" class="col-md-4 col-form-label text-md-right">{{ __('Booth') }}</label>

                            <div class="col-md-6">
                                <input id="booth" type="text" class="form-control{{ $errors->has('booth') ? ' is-invalid' : '' }}" name="booth">

                                @if ($errors->has('booth'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('booth') }}</strong>
                                    </span>
                                @endif  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lang" class="col-md-4 col-form-label text-md-right">{{ __('Lang') }}</label>

                            <div class="col-md-6">
                                <select id="lang" class="form-control" name="lang" required>
                                    <!-- <option selected>ID</option>
                                    <option selected>VI</option>
                                    <option selected>MY</option> -->
                                    <option selected>EN</option>
                                </select>    
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="project" class="col-md-4 col-form-label text-md-right">{{ __('Project') }}</label>

                            <div class="col-md-6">
                                <input id="project" type="text" class="form-control{{ $errors->has('project') ? ' is-invalid' : '' }}" name="project">

                                @if ($errors->has('project'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('project') }}</strong>
                                    </span>
                                @endif  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control" name="role" required>
                                    <!-- <option selected>user</option> -->
                                    <option selected>operator</option>
                                    <!-- <option selected>moderator</option> -->
                                </select>    
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="welcometext" class="col-md-4 col-form-label text-md-right">{{ __('Welcome Text') }}</label>

                            <div class="col-md-6">
                                <input id="welcometext" type="text" class="form-control{{ $errors->has('welcometext') ? ' is-invalid' : '' }}" name="welcometext">

                                @if ($errors->has('welcometext'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('welcometext') }}</strong>
                                    </span>
                                @endif  
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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