@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <script>
                        alert("You are logged in");
                    </script>

                    {{ __('You are logged in!') }}
                </div>
                <div class="container">
                    <table class="table table-border table-striped table-responsive ">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Mobile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer as $item)

                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->dob}}</td>
                                    <td>{{$item->mobile}}</td>
                                    
                                    
                                    <td>
                                      <a href="{{route('customer.edit', ['id'=> $item->id])}}" class="btn btn-primary">Edit</a>
                                      <a href="{{route('customer.delete', ['id'=> $item->id])}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
