@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">New Meal</div>
                <div class="panel-body">

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('/meal') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="name" class="col-sm-1 form-control-label">Name</label>
                            <div class="col-sm-9">
                                <input name="name" type="text" class="form-control" placeholder="Meal Name" required>
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" value="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if(isset($meals) && count($meals) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">Your Meals</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Meal Name</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($meals as $meal)
                            <tr>
                                <td>{{ $meal->name }}</td>
                                <td>{{ $meal->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ url('/food') }}" class="btn btn-success btn-xs">Add Food</a>
                                    <form action="{{ url('/meal/' . $meal->id) }}" method="POST" style="display:inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Delete this meal and all its foods?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
