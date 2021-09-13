@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">View Team</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">View All Data</li>
        </ol>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Designation</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if (count($teams)>0)
                
                    @foreach ($teams as $team)
                        <tr>
                            <th scope="row">{{ $team->id }}</th>
                            <td>{{ $team->user_name }}</td>
                            <td>{{ $team->designation }}</td>
                            <td><img style="height: 10vh" src="{{url($team->user_img)}}" alt="big_image"></td>
                            <td>
                                <div class="class row">
                                    <div class="class col sm 2">
                                        <a href="{{route('admin.teams.edit',$team->id)}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="class col sm 2">
                                        <form action="{{route('admin.teams.destroy', $team->id)}}" method="post">
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
                
               