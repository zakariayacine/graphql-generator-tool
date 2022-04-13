@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new project</div>
                <div class="card-body">
                    <form action="/project/store" method="post">
                    @csrf
                    <label class="form-label">Prject name</label>
                    <input type="text" class="form-control" name="projectName">
                    <br>
                    <div class="d-grid gap-2">
                    <button class="btn btn-success">Create</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
