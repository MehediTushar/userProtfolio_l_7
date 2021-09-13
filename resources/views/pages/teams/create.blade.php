@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create Team</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <form action="{{route('admin.teams.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT')}}
            <div class="row">
                <div class="form-group col-md-3 mt-3">
                    <h3>Image</h3>
                <img style="height: 30vh" src="{{ asset('assets/img/big_img.png') }}" class="img-thumbnail">
                    <input class="mt-3" type="file" name="user_img">
                </div>
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for="user_name"><h4>Name</h4></label>
                    <input type="text" class="form-control" id="user_name" name="user_name" value="">
                    </div>
                    <div class="mb-5">
                        <label for="designation"><h4>Designation</h4></label>
                        <input type="text" class="form-control" id="designation" name="designation" value="">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary my-5">
        </div>
        </form>

</main>
@endsection
                
               