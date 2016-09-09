@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add a meal</div>
                <div class="panel-body">
                    Meals
                    <form action="/users/19/meals" method="POST">
                        <input type="hidden" name="_token" value="ja05e48U1pdidIQrzIbyxYMu6PF4U146aaaiAdoa">

                        <div class="form-group row">
                            <label for="name" class="col-sm-1 form-control-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" placeholder="Meal Name" required>
                            </div>  <!-- col-sm-10 -->
                            <div class="col-sm-1">
                                <button type="submit" value="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>  <!-- col-sm-1 -->
                        </div>  <!-- form-group  -->
                    </form>  <!-- form -->
                </div>  <!-- panel-body -->
            </div>  <!-- panel  -->
        </div>  <!-- col -->
    </div>  <!-- row -->
</div>  <!-- container -->
@endsection