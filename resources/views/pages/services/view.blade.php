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
                <th scope="col">Icon</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if (count($service)>0)
                
                    @foreach ($service as $serv)
                        <tr>
                            <th scope="row">{{ $serv->id }}</th>
                            <td>{{ $serv->icon }}</td>
                            <td>{{ $serv->title }}</td>
                            <td>{{Str::limit(strip_tags($serv->description),40)}}</td>
                            <td>
                                <div class="class row">
                                    <div class="class col sm 2">
                                        <a href="{{route('admin.services.edit',$serv->id)}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="class col sm 2">
                                        <form action="{{route('admin.services.destroy', $serv->id)}}" method="post">
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
                
               