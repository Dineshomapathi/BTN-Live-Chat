@extends('layouts.app')

@section('style')
    <style>
    span.relative.z-0.inline-flex.shadow-sm.rounded-md{
        display: none;
    }
    </style>
@endsection

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="float-left">
                <h2>List of Moderators</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create</a>
            </div>
            </br>  
            <hr/>
        </div>


        <div class="table-responsive-lg">   
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>    
                    @foreach ($moderators as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->loginotp }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form action="{{ route('products.destroy',$user->id) }}" method="POST">
            
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
            {!! $moderators->links() !!}
        </div>

        <div class="col-md-12">
            <div class="float-left">
                <h2>List of Operators</h2>
            </div>
            </br>  
            <hr/>
        </div>   
       
        <div class="table-responsive-lg">   
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Booth</th>
                        <th>Lang</th>
                        <th>Project</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>    
                    @foreach ($operators as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->loginotp }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->booth }}</td>
                        <td>{{ $user->lang }}</td>
                        <td>{{ $user->project }}</td>
                        <td>
                            <form action="{{ route('products.destroy',$user->id) }}" method="POST">
            
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
            {!! $operators->links() !!}
        </div>


        <div class="col-md-12">
            <div class="float-left">
                <h2>List of Users</h2>
            </div>
            </br>  
            <hr/>
        </div>

        <div class="table-responsive-lg">   
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>    
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->loginotp }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            <form action="{{ route('products.destroy',$user->id) }}" method="POST">
            
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
            {!! $users->links() !!}
        </div>

    </div>
</div>
@endsection