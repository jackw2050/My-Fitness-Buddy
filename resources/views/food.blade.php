@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add a food</div>

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

                <form action="{{ url('/food') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group row">
                        <label for="meal_id" class="col-sm-2 form-control-label">Meal</label>
                        <div class="col-sm-10">
                            <select name="meal_id" class="form-control" required>
                                <option value="">-- Select a Meal --</option>
                                @if(isset($meals))
                                    @foreach($meals as $meal)
                                        <option value="{{ $meal->id }}">{{ $meal->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="food_name" class="col-sm-2 form-control-label">Food name</label>
                        <div class="col-sm-10">
                            <input name="food_name"
                            type="text"
                            class="form-control"
                            placeholder="Food Name"
                            required
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="protein" class="col-sm-2 form-control-label">Protein</label>
                        <div class="col-sm-10">
                            <input name="protein"
                            type="number"
                            step="0.01"
                            class="form-control"
                            placeholder="Protein/g"
                            required
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="carbs" class="col-sm-2 form-control-label">Carbohydrates</label>
                        <div class="col-sm-10">
                            <input name="carbs"
                            type="number"
                            step="0.01"
                            class="form-control"
                            placeholder="Carbohydrates/g"
                            required
                            >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fat" class="col-sm-2 form-control-label">Fat</label>
                        <div class="col-sm-10">
                            <input name="fat"
                            type="number"
                            step="0.01"
                            class="form-control"
                            placeholder="Fat/g"
                            required
                            >
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <button type="submit" value="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>

                </form>

                </div>  <!-- panel-body -->
            </div>  <!-- panel -->

            @if(isset($meals))
                @foreach($meals as $meal)
                    @if($meal->foods->count() > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $meal->name }} - Foods</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Food</th>
                                        <th>Protein (g)</th>
                                        <th>Carbs (g)</th>
                                        <th>Fat (g)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($meal->foods as $food)
                                    <tr>
                                        <td>{{ $food->food_name }}</td>
                                        <td>{{ $food->protein }}</td>
                                        <td>{{ $food->carbs }}</td>
                                        <td>{{ $food->fat }}</td>
                                        <td>
                                            <form action="{{ url('/food/' . $food->id) }}" method="POST" style="display:inline;">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif

        </div>  <!-- col-md-10 -->
    </div>  <!-- row -->
</div>  <!-- container -->
@endsection
