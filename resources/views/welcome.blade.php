@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome {{ Auth::user()->name }} </div>

                <div class="panel-body">
                    Please select your meal
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
