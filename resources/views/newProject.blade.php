@extends('layouts.index')
@section('content')

@yield('content')

    <div class="row">
        <div class="text-center co-md-12">
            <form action="{{ url('/projects') }}" method="POST">
                @csrf
                <div class="input-group">
                    <span class="input-group-addon">Project Name</span>
                    <input type="text" class="form-control" name="name">
                </div>
                <br>
                <div class="input-group">
                    
                    <input type="submit" class="btn btn-info" value="ADD" />
                </div>
            </form>
        </div>
    </div>

@endsection 