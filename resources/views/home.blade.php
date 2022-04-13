@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <a class="btn btn-success" href="/project"><b> projects liste</b></a>
                    <a class="btn btn-success" href="/project/create"><b> new project</b></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
