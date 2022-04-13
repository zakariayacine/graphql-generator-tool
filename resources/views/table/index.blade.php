@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <p style="color: green"> <b>1- Pour la table : {{$table->table_name }} veuillez executez
                                        en premier
                                        :</p>
                                <hr>
                                <span style="color: blue">php artisan</span> lighthous:query {{$table->table_name
                                }}Query --full<br>
                                <span style="color: blue">php artisan</span> lighthous:mutation {{$table->table_name
                                }}Mutation --full<br>
                                <hr>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="3" style="color: green"> 2- Pour la validation il
                                                faut crée les inputs suivant avec
                                                les commande suivante :</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" colspan="3">commande
                                                exemple:<code> <span style="color: blue">php artisan</span> lighthous:validator "modelName".Validator</code><br>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="row"><code><span style="color: blue">php artisan</span> lighthous:validator
                                            {{$table->table_name}}FilterInputValidator<br></code></th>
                                            <td><code><span style="color: blue">php artisan</span> lighthous:validator
                                                {{$table->table_name}}InputValidator<br></code></td>
                                            <td><code><span style="color: blue">php artisan</span> lighthous:validator
                                            {{$table->table_name}}DeleteInputValidator<br></code></td>

                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <code>
                                                <span style="color: blue">return</span> [<br>
                                                @foreach ($table->columns as $column)
                                                "{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}"=>[<br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"sometimes",<br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"{{$column->column_type}}",<br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"max:100",<br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"min:1",<br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;],<br>
                                                @endforeach
                                                ]; <br>
                                            </code>
                                            </th>
                                            <td>
                                                <code>
                                            <span style="color: blue">return</span> [<br>
                                            @foreach ($table->columns as $column)
                                            "{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}"=>[<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Required",<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"{{$column->column_type}}",<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"max:100",<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"min:1",<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;],<br>
                                            @endforeach
                                            ]; <br>
                                            </td>
                                        </code>
                                            <td>
                                                <code>
                                            <span style="color: blue">return</span> [<br>
                                            @foreach ($table->columns as $column)
                                            "{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}"=>[<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Required",<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"{{$column->column_type}}",<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"min:1",<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;],<br>
                                            @endforeach
                                            ]; <br>
                                            </td>
                                        </code>
                                        </tr>
                                    </tbody>
                                </table></b>




                                <hr>
                                <p style="color: green"> <b>3- Dans le ficher ./graphql/schema.graphql veuillez coller
                                        ceci :</b></p>
                                <pre><code class="code">
                            <span style="color: green"> <b>"A datetime string with format `Y-m-d H:i:s`, e.g. `2018-05-23 13:43:32`."</b></span>
                            <span style="color: blue">scalar</span> Date @scalar(class: "Nuwave\\Lighthouse\\Schema\\Types\\Scalars\\Date")
                            <span style="color: green"> <b>"Indicates what fields are available at the top level of a query operation."</b></span>
                            <span style="color: blue">type</span> <span style="color: green">Query</span>
                            <span style="color: blue">type</span> <span style="color: green">Mutation</span>

                            <span style="color: green"></span>#import {{$table->table_name }}.graphql</span>
                        </code></pre>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <p style="color: green"> <b>Crée un fichier </p> <code>{{$table->table_name }}.graphql</code> <p style="color: green">dans </p><code>"./graphql/"</code> <p style="color: green">est collé le code suivant :</p></b>
                                
                                <hr>
                                <pre><code class="code">
                            <span style="color: blue">extend type</span> Query {
                               <span style="color: green"> "{{$table->table_name }} list" </span>
                                {{$table->table_name }}Liste(filter: {{ucfirst($table->table_name)}}FilterInput): [{{ucfirst($table->table_name)}}]
                                    @paginate(
                                        builder: "App\\GraphQL\\Queries\\{{ucfirst($table->table_name) }}Query@liste"
                                        defaultCount: 10
                                    )
                            }
                            
                            <span style="color: blue"> extend type </span>Mutation </span>{
                                create{{ucfirst($table->table_name)}}(data: {{ucfirst($table->table_name) }}Input): {{ucfirst($table->table_name)}}!
                                    @field(resolver: "App\\GraphQL\\Mutations\\{{ucfirst($table->table_name) }}Mutation@create")
                                update{{ucfirst($table->table_name)}}(data: Update{{ucfirst($table->table_name) }}Input): {{ucfirst($table->table_name)}}!
                                    @field(resolver: "App\\GraphQL\\Mutations\\{{ucfirst($table->table_name) }}Mutation@update")
                                delete{{ucfirst($table->table_name) }}(
                                    delete: Delete{{ucfirst($table->table_name) }}Input): DeletedMessage!
                                    @field(resolver: "App\\GraphQL\\Mutations\\{{ucfirst($table->table_name) }}Mutation@delete")
                            }
                            <span style="color: green"> "get {{$table->table_name }} informations" </span>
                          <span style="color: blue">  type   </span>{{ucfirst($table->table_name)}}</span> {
                                @foreach ($table->columns as $column)
                                {{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}: {{$column->column_type}}  @if(strpos($column->column_name, "_"))@rename(attribute: "{{$column->column_name}}")@endif 
                                @endforeach  
                            }
                           <span style="color: green">  "{{$table->table_name }} input" </span>
                           <span style="color: blue"> input  </span>{{ucfirst($table->table_name)}}Input </span>@validator {
                                @foreach ($table->columns as $column)
                                {{$column->column_name}}: {{$column->column_type}}!
                                @endforeach
                            }

                            <span style="color: green"> "{{$table->table_name }} update input" </span>
                           <span style="color: blue">  input </span>Update{{ucfirst($table->table_name)}}Input </span>@validator {
                                @foreach ($table->columns as $column)
                                {{$column->column_name}}: {{$column->column_type}} 
                                @endforeach
                            }
                            
                           <span style="color: green">  "{{$table->table_name }} Filter input" </span>
                            <span style="color: blue">input  </span>{{ucfirst($table->table_name)}}FilterInput </span>@validator {
                                @foreach ($table->columns as $column)
                                {{$column->column_name}}: {{$column->column_type}} 
                                @endforeach
                            }
                            
                            <span style="color: green"> "Delete {{$table->table_name }} Input" </span>
                           <span style="color: blue"> input  </span>Delete{{ucfirst($table->table_name)}}Input </span>@validator{
                                {{$table->table_id }}: {{$column->column_type}} 
                            }
                            
                           <span style="color: blue"> type </span>DeletedMessage </span>{
                                message: String
                            }

                            </code></pre>
                            </div>
                        </div>
                    </div>
                </div>
</div>
@endsection
