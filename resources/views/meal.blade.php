@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">New Meal</div>
                <div class="panel-body">
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
                    <ul class="list-group">
                        @foreach($meals as $meal)
                            <li class="list-group-item">{{ $meal->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
