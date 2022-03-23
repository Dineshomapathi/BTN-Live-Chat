@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="table-responsive-lg">   
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Booth</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>    
                    @foreach ($products as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->access }}</td>
                        <td>{{ $user->booth }}</td>
                        <td>
                            <form action="{{ route('products.destroy',$user->id) }}" method="POST">

                                <a class="btn btn-success" href="{{ route('products.create') }}"> Create</a>
            
                                <a class="btn btn-info" href="{{ route('products.show',$user->id) }}">Show</a>
                
                                <a class="btn btn-primary" href="{{ route('products.edit',$user->id) }}">Edit</a>
            
                                @csrf
                                @method('DELETE')
                
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>    
            </table>
            {!! $products->links() !!}
        </div>
    </div>
</div>
@endsection