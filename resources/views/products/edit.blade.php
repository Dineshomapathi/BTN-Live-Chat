@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h2>Edit Operator</h2>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('products.update',$product->id) }}" method="POST">
                        @csrf
                        @method('PUT')  
                        <br>

                        <div class="form-group row">
                            <label for="loginotp" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>

                            <div class="col-md-6">
                                <input id="loginotp" type="text" class="form-control{{ $errors->has('loginotp') ? ' is-invalid' : '' }}" name="loginotp" value="{{ $product->loginotp }}" required>

                                @if ($errors->has('loginotp'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('loginotp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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