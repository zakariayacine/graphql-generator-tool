@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new scheema</div>
                <a class="btn btn-success" href="/project/model/create/{{$id}}"><b> new project</b></a>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Model Name</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                          <tr>
                            <th scope="row">{{$model->table_name}}</th>
                            <td><a class="btn btn-success" href="/project/model/show/{{$model->id}}">Show</a></td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
