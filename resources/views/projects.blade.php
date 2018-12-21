{{-- @extends('laouts.index')
@section('content')

@yield('content')

    content

@endsection --}}

@extends('layouts.index')
@section('content')

@yield('content')

        <div class="row">
            <h1>All Projects</h1>
            <div class="col-md-offset-3 co-md-9">
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Tasks</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($projects as $project)
                        <tr>
                            <td>{{$project->id}}</td>
                            <td>{{$project->name}}</td>
                            <td>{{$project->tasks->count()}}</td>
                            <td>
                            <a href="{{ url('/projects') }}"></a>        
                            </td>
                            <td>
                                <form action="{{url('/projects/')}}/{{ $project->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">del</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                </table>
            </div>
            </div>
        </div>
   

@endsection