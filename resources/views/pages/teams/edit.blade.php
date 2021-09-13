@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <form action="{{route('admin.teams.update',$teams->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-3 mt-3">
                    <h3>Image</h3>
                <img style="height: 30vh" src="{{url($teams->user_img)}}" class="img-thumbnail">
                    <input class="mt-3" type="file" name="user_img">
                </div>
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for="user_name"><h4>Name</h4></label>
                    <input type="text" class="form-control" id="user_name" name="user_name" value="{{($teams->user_name)}}">
                    </div>
                    <div class="mb-5">
                        <label for="designation"><h4>Designation</h4></label>
                        <input type="text" class="form-control" id="designation" name="designation" value="{{($teams->designation)}}">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary my-5">
        </div>
        </form>

</main>
@endsection
                
               