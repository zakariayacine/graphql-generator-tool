<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .center {
            text-align: center;
            border: 3px solid rgb(0, 0, 0);
        }

        .card {
            color: rgb(0, 65, 65) !important;
        }
        code{
            display: block;
            background-color: #EFEFEF;  
        }
        .code {
            padding: -40px;
            margin-left: -200px;
        }
       
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GraphQL Scheema Lighthouse Creator</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/create">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Show liste</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-3">
            <div class="container">
                <ul class="list-group">
                    <li class="list-group-item">Liste des tables model genéré</li>
                    @foreach ($listes as $liste)
                    <li class="list-group-item">
                        <div class="d-grid gap-2">
                            <a class="btn btn-success" href="/show/{{$liste->id}}">Model: {{$liste->table_name}}</a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-9">
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
                                                "{{$column->column_name}}"=>[<br>
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
                                            "{{$column->column_name}}"=>[<br>
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
                                            "{{$column->column_name}}"=>[<br>
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
        </div>
    </div>

</body>

</html>