@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="d-grid gap-2">
            <a class="btn btn-success" href="/project/create"><b> new project</b></a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Project Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                  <tr>
                    <th scope="row">{{strtoupper($project->project_name)}}</th>
                    <td>
                        <div class="d-grid gap-2">
                            <form action="/table/show" method="post">
                                <input type="hidden" value="{{$project->id}}" name="id">
                                @csrf
                                <button class="btn btn-success">Show</button>
                                </form>
                        </div>
                        </td>
                        <td>
                            <div class="d-grid gap-2">
                                <form action="/table/destroy" method="post">
                                    <input type="hidden" value="{{$project->id}}" name="id">
                                    @csrf
                                    <button class="btn btn-danger">delete</button>
                                    </form>
                            </div>
                            </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
            <hr>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="modal-title">Modal title</h3>
                    @if($table)
                    <a href="/model/create/{{$table->project_id}}" class="btn btn-outline-light"> Create new scheema</a>
                    @endif
                </div>
                <div class="card-body">
                    @if($table)
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Table name</th>
                            <th scope="col">show scheema</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $table)
                          <tr>
                            <th scope="row">{{$table->table_name}}</th>
                            <td>
                                <td><a class="btn btn-success" href="/show/{{$table->id}}">Show</a></td>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @else
                    <h1>selectionnez un projet ou crée un nouveau projet</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
