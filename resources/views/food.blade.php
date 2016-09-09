@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add a food</div>

                <div class="panel-body">
                   

                <form action="/users/19/meals" method="POST">
                <input type="hidden" name="_token" value="ja05e48U1pdidIQrzIbyxYMu6PF4U146aaaiAdoa">
    


                <div class="form-group row">
                    <label for="name" class="col-sm-2 form-control-label">Food name</label>
                    <div class="col-sm-10">
                        <input name="name" 
                        type="text" 
                        class="form-control" 
                        placeholder="Food Name"
                        required
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 form-control-label">Protein</label>
                        <div class="col-sm-10">
                        <input name="protein" 
                        type="number" 
                        class="form-control" 
                        placeholder="Protein/g"
                        required
                        >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 form-control-label">Carbohydrates</label>
                    <div class="col-sm-10">
                        <input name="carbohydrates" 
                        type="number" 
                        class="form-control" 
                        placeholder="Carbohydrates/g"
                        required
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 form-control-label">Fat</label>
                    <div class="col-sm-10">
                        <input name="fat" 
                        type="number" 
                        class="form-control" 
                        placeholder="Fat"
                        required
                        >
                    </div>
                </div>

                <div class="col-sm-2">
                    <button type="submit" value="submit" class="btn btn-primary">
                    Submit
                    </button>
                </div>
        

        </form>   <!-- form -->





                </div>  <!-- panel-body -->
            </div>  <!-- panel -->
        </div>  <!-- col-md-10 -->
    </div>  <!-- row -->
</div>  <!-- container -->
@endsection
