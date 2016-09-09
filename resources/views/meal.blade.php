@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">New Meal</div>
                <div class="panel-body">
                    <form action="/users/19/meals" method="POST">
                        <input type="hidden" name="_token" value="ja05e48U1pdidIQrzIbyxYMu6PF4U146aaaiAdoa">
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
        </div>
    </div>
</div>
@endsection
