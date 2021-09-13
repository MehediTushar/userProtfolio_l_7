@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">View</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">View All Data</li>
        </ol>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Sub Title</th>
                <th scope="col">Big Image</th>
                <th scope="col">Small Image</th>
                <th scope="col">Description</th>
                <th scope="col">Client</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if (count($protfolios)>0)
                
                    @foreach ($protfolios as $prot)
                        <tr>
                            <th scope="row">{{ $prot->id }}</th>
                            <td>{{ $prot->title }}</td>
                            <td>{{ $prot->sub_title }}</td>
                            <td><img style="height: 10vh" src="{{url($prot->big_img)}}" alt="big_image"></td>
                            <td><img style="height: 10vh" src="{{url($prot->sm_img)}}" alt="big_image"></td>
                            <td>{{Str::limit(strip_tags($prot->description),40)}}</td>
                            <td>{{ $prot->client }}</td>
                            <td>{{ $prot->category }}</td>
                            <td>
                                <div class="class row">
                                    <div class="class col sm 2">
                                        <a href="{{route('admin.protfolios.edit',$prot->id)}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="class col sm 2">
                                        <form action="{{route('admin.protfolios.destroy', $prot->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                        </form>
        
                                    </div>
                                </div>
                            </td>
                          </tr>
                    
                        
                    @endforeach
                
                    
                @endif
            </tbody>
          </table>

</main>
@endsection
                
               