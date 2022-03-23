@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Show User</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <hr/>
    </br>

    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <h3><strong>Id:</strong>
                {{ $product->id }}</h3>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h3><strong>Username:</strong>
                {{ $product->loginotp }}</h3>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <h3><strong>Password:</strong>
                {{ $product->password }}</h3>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <h3><strong>Booth:</strong>
                {{ $product->booth }}</h3>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <h3><strong>Language:</strong>
                {{ $product->lang }}</h3>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <h3><strong>Welcome Text:</strong>
                {{ $product->welcometext }}</h3>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <h3><strong>Created at:</strong>
                {{ $product->created_at }}</h3>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <h3><strong>Last updated:</strong>
                {{ $product->updated_at }}</h3>
            </div>
        </div>
    </div>
    <hr/>
</div>    
@endsection