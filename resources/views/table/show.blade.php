@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a class="btn btn-success" href="/project/model/create/{{$id}}"><b><i class="fa-solid fa-file-plus"></i> Create new Scheema</b></a></div> 
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
                            <th scope="row"><h5>{{$model->table_name}}</h5></th>
                            <td>
                              <a class="btn btn-primary" href="/project/model/show/{{$model->id}}">Show</a>
                              <a class="btn btn-danger" href="/project/model/destroy/{{$model->id}}">Delete</a>
                            </td>
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
