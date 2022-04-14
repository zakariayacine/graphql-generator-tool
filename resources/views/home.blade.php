@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset("images/bg.png")}}" class="img-fluid">
                    <div class="d-grid gap-2">
                    <a class="btn btn-success" href="/project"><b> projects liste</b></a>
                    <a class="btn btn-success" href="/project/create"><b> new project</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
