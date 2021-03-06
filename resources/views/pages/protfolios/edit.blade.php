@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        <form action="{{route('admin.protfolios.update',$protfolios->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-3 mt-3">
                    <h3>Big Image</h3>
                <img style="height: 30vh" src="{{url($protfolios->big_img)}}" class="img-thumbnail">
                    <input class="mt-3" type="file" name="big_img">
                </div>
                <div class="form-group col-md-3 mt-3">
                    <h3>Small Image</h3>
                    <img style="height: 20vh" src="{{url($protfolios->sm_img)}}" class="img-thumbnail">
                    <input class="mt-3" type="file" name="sm_img">
                </div>
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for="title"><h4>Title</h4></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{($protfolios->title)}}">
                    </div>
                    <div class="mb-5">
                        <label for="sub_title"><h4>Sub Title</h4></label>
                        <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{($protfolios->sub_title)}}">
                    </div>
                </div>
                <div class="form-group col-md-6 mt-3">
                    <h3>Description</h3>
                    <textarea class="form-control" name="description" rows="5">{{($protfolios->description)}}</textarea>
                </div>
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for="client"><h4>Client</h4></label>
                    <input type="text" class="form-control" id="client" name="client" value="{{($protfolios->client)}}">
                    </div>
                    <div class="mb-5">
                        <label for="category"><h4>Category</h4></label>
                        <input type="text" class="form-control" id="category" name="category" value="{{($protfolios->category)}}">
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-primary my-5">
        </div>
        </form>

</main>
@endsection
                
               