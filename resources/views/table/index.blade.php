@extends('layouts.app')

@section('content')
<style>
        .inverter{
    filter: invert(100%);
    background-color: rgba(0, 0, 0, 0.795);
}
    body,
    table {
        font-weight: bold;
    }
</style>
<div class="container invert">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <p style="color: green"> 1- execute at first those commands below "for the model
                        {{$table->table_name }}":</p>
                    <hr>
                    <span style="color: blue">php artisan</span> lighthous:query {{ucfirst($table->table_name)
                    }}Query --full<br>
                    <span style="color: blue">php artisan</span> lighthous:mutation {{ucfirst($table->table_name
                    )}}Mutation --full<br>
                    <hr>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3" style="color: green"> 2- For validation it must create the
                                    following inputs with the following commands :</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" colspan="4">command example
                                    :<code> <span style="color: blue">php artisan</span> lighthous:validator "modelName".Validator</code><br>
                                </th>
                            </tr>
                            <tr>
                                <th scope="row"><code><span style="color: blue">php artisan</span> lighthous:validator
                                            {{ucfirst($table->table_name)}}FilterInputValidator<br></code></th>
                                <td><code><span style="color: blue">php artisan</span> lighthous:validator
                                            {{ucfirst($table->table_name)}}InputValidator<br></code></td>
                                <td><code><span style="color: blue">php artisan</span> lighthous:validator
                                           {{ucfirst($table->table_name)}}UpdateInputValidator<br></code></td>
                                <td><code><span style="color: blue">php artisan</span> lighthous:validator
                                            {{ucfirst($table->table_name)}}DeleteInputValidator<br></code></td>
                                            
                            </tr>
                            <tr>
                                <th scope="row">
                                    <code>
                                        <span style="color: green">Past this starting code in :</span><code> "App\GraphQL\Validator\{{$table->table_name}}Validator"</code>
                                    - this is only a starter code !
                                    <hr>
                                    <span style="color: blue">return</span> [<br>
                                    @foreach ($table->columns as $column)
                                    @if($column->column_type === 'String' || $column->column_type === 'Date' ||
                                    $column->column_type === 'Str')
                                    "{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}"=>[<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"sometimes",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"{{$column->column_type}}",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"max:100",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"min:1",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;],<br>
                                    @else
                                    @endif
                                    @endforeach
                                    ]; <br>
                                    </code>
                                </th>
                                <td>
                                    <code>
                                        <span style="color: green">Past this starting code in :</span><code> "App\GraphQL\Validator\{{$table->table_name}}Validator"</code>
                                    - this is only a starter code !
                                    <hr>
                                    <span style="color: blue">return</span> [<br>
                                    @foreach ($table->columns as $column)
                                    @if($column->column_type === 'String' || $column->column_type === 'Date' ||
                                    $column->column_type === 'Str')
                                    "{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}"=>[<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Required",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"{{$column->column_type}}",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"max:100",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"min:1",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;],<br>
                                    @else
                                    @endif
                                    @endforeach
                                    ]; <br>
                                </td>
                                </code>
                                <td>
                                    <code>
                                        <span style="color: green">Past this starting code in :</span><code> "App\GraphQL\Validator\{{$table->table_name}}Validator"</code>
                                    - this is only a starter code !
                                    <hr>
                                    <span style="color: blue">return</span> [<br>
                                    @foreach ($table->columns as $column)
                                    @if($column->column_type === 'String' || $column->column_type === 'Date' ||
                                    $column->column_type === 'Str')
                                    "{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}"=>[<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Required",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"{{$column->column_type}}",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"max:100",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"min:1",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;],<br>
                                    @else
                                    @endif
                                    @endforeach
                                    ]; <br>
                                </td>
                                <td>
                                    <code>
                                        <span style="color: green">Past this starting code in :</span><code> "App\GraphQL\Validator\{{$table->table_name}}Validator"</code>
                                    - this is only a starter code !
                                    <hr>
                                    <span style="color: blue">return</span> [<br>
                                    @foreach ($table->columns as $column)
                                    @if($column->column_type === 'String' || $column->column_type === 'Date' ||
                                    $column->column_type === 'Str')
                                    "{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}"=>[<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Required",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"{{$column->column_type}}",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"min:1",<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;],<br>
                                    @else
                                    @endif
                                    @endforeach
                                    ]; <br>
                                </td>
                                </code>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <p style="color: green"> 3- Past this starting code in ./graphql/schema.graphql:</p>
                    <pre style="margin-left:-150px "><code class="code">
                            <span style="color: green"> "A datetime string with format `Y-m-d H:i:s`, e.g. `2018-05-23 13:43:32`."</span>
                            <span style="color: blue">scalar</span> Date @scalar(class: "Nuwave\\Lighthouse\\Schema\\Types\\Scalars\\Date")
                            <span style="color: green"> "Indicates what fields are available at the top level of a query operation."</span>
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
                    <span style="color: green"> create a file in
                        <code>"./graphql/{{$table->table_name }}.graphql"</code></span>
                    <span style="color: green">then past this starting code :</span>

                    <hr>
                    <pre style="margin-left:-150px "><code class="code">
                            <span style="color: blue">extend type</span> Query {
                               <span style="color: green"> "{{$table->table_name }} list" </span>
                                {{$table->table_name }}List(filter: {{ucfirst($table->table_name)}}FilterInput): [{{ucfirst($table->table_name)}}]
                                    @paginate(
                                        builder: "App\\GraphQL\\Queries\\{{ucfirst($table->table_name) }}Query@list"
                                        defaultCount: 10
                                    )
                            }
                            
                            <span style="color: blue"> extend type </span>Mutation </span>{
                                {{$table->table_name}}Create(data: {{ucfirst($table->table_name) }}Input): {{ucfirst($table->table_name)}}!
                                    @field(resolver: "App\\GraphQL\\Mutations\\{{ucfirst($table->table_name) }}Mutation@create")
                               {{$table->table_name}}Update(data: {{ucfirst($table->table_name)}}UpdateInput): {{ucfirst($table->table_name)}}!
                                    @field(resolver: "App\\GraphQL\\Mutations\\{{ucfirst($table->table_name) }}Mutation@update")
                                {{$table->table_name}}Delete(
                                    delete: {{ucfirst($table->table_name)}}DeleteInput): DeletedMessage!
                                    @field(resolver: "App\\GraphQL\\Mutations\\{{ucfirst($table->table_name) }}Mutation@delete")
                            }
                            <span style="color: green"> "get {{$table->table_name }} informations" </span>
                          <span style="color: blue">  type   </span>{{ucfirst($table->table_name)}}</span> {
                                @foreach ($table->columns as $column)
                                <span style="margin-left:-150px ">   {{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}: {{$column->column_type}}  @if(strpos($column->column_name, "_"))@rename(attribute: "{{$column->column_name}}")@endif </span>
                                @endforeach  
                            }
                           <span style="color: green">  "{{$table->table_name }} input" </span>
                           <span style="color: blue"> input  </span>{{ucfirst($table->table_name)}}Input </span>@validator {
                                @foreach ($table->columns as $column)
                                @if($column->column_name == 'id') @elseif($column->column_type === 'String' || $column->column_type === 'Int' || $column->column_type === 'Date')<span style="margin-left:-150px "> {{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}: {{$column->column_type}}!@else <span style="margin-left:-150px ">{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}Id: Int! @endif</span>
                                @endforeach
                            }

                            <span style="color: green"> "{{$table->table_name }} update input" </span>
                           <span style="color: blue">  input </span>{{ucfirst($table->table_name)}}UpdateInput </span>@validator {
                                @foreach ($table->columns as $column)
                                @if($column->column_type === 'String' || $column->column_type === 'Int' || $column->column_type === 'Date')<span style="margin-left:-150px "> {{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}: {{$column->column_type}}!@else<span style="margin-left:-150px "> {{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}Id: Int!@endif</span>
                                @endforeach
                            }
                            
                           <span style="color: green">  "{{$table->table_name }} Filter input" </span>
                            <span style="color: blue">input  </span>{{ucfirst($table->table_name)}}FilterInput </span>@validator {
                                @foreach ($table->columns as $column)
                                @if($column->column_type === 'String' || $column->column_type === 'Int' || $column->column_type === 'Date')<span style="margin-left:-150px "> {{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}: {{$column->column_type}}!@else<span style="margin-left:-150px "> {{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}Id: Int!@endif</span>
                                @endforeach
                            }
                            
                            <span style="color: green"> "{{$table->table_name }} Delete Input" </span>
                           <span style="color: blue"> input  </span>{{ucfirst($table->table_name)}}DeleteInput </span>@validator{
                                id: Int!
                            }
                            
                           <span style="color: blue"> type </span>DeletedMessage </span>{
                                message: String
                            }

                            </code></pre>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <span style="color: green">Past this starting code in
                        :</span><code> "App\GraphQL\Query\{{$table->table_name}}Query"</code> - this is only a starter
                    code !
                    <hr>
                    <pre>
                                    <code class="code">
                                        <span style="color: blue">public function</span> <span style="color: rgb(216, 104, 0)">List($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)</span>{
                                            <span style="color: blue">${{lcfirst($table->table_name)}}</span> =  <span style="color: rgb(20, 100, 0)">{{ucfirst($table->table_name)}}</span><span style="color: rgb(148, 27, 5)">::query()</span>;
                                        @foreach ($table->columns as $column)
                                        @if($column->column_type === 'String' || $column->column_type === 'Int' || $column->column_type === 'Date')
                                        <span style="color: blue; margin-left:-300px;">if</span>(Arr::get($args,<span style="color: rgb(202, 55, 18)">'filter.{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}'</span>)){
                                            <span style="color: blue"> ${{lcfirst($table->table_name)}}</span>->where('{{$column->column_name}}',Arr::get($args,'filter.{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}'));
                                        }@else
                                        <span style="color: blue; margin-left:-300px;">if</span>(Arr::get($args,<span style="color: rgb(202, 55, 18)">'filter.{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}Id'</span>)){
                                            <span style="color: blue"> ${{lcfirst($table->table_name)}}</span>->where('{{$column->column_name}}_id',Arr::get($args,'filter.{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}Id'));
                                        }
                                        @endif
                                        @endforeach
                                        <span style="color: rgb(255, 0, 0); margin-left:-300px;">return</span> <span style="color: blue">${{lcfirst($table->table_name)}};</span>
                                        }
                                    </code>
                                </pre>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <span style="color: green">Past this starting code in
                        :</span><code> "App\GraphQL\Mutation\{{$table->table_name}}Mutation"</code> - this is only a
                    starter code !
                    <hr>
                    <pre style="margin-left:-150px">
                        <code class="code">
                            public function create($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
                            {
                                ${{lcfirst($table->table_name)}} = new {{ucfirst($table->table_name)}}();
                                @foreach ($table->columns as $column)
                                @if($column->column_type === 'String' || $column->column_type === 'Int' || $column->column_type === 'Date')<span style="color: blue; margin-left:-200px;">  ${{lcfirst($table->table_name)}}->{{$column->column_name}} </span>= Arr::get($args, 'data.{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}');@else <span style="color: blue; margin-left:-200px;">  ${{lcfirst($table->table_name)}}->{{$column->column_name}}_id </span>= Arr::get($args, 'data.{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}Id');@endif</span>
                                
                                @endForeach
                                <span style="color: blue; margin-left:-185px;">${{lcfirst($table->table_name)}}</span>->save();
                                return ${{lcfirst($table->table_name)}};
                            }
                            public function update($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
                            {
                                ${{lcfirst($table->table_name)}} = {{ucfirst($table->table_name)}}::find(Arr::get($args, 'data.identifier')); //replace indentifier
                                @foreach ($table->columns as $column)
                                @if($column->column_type === 'String' || $column->column_type === 'Int' || $column->column_type === 'Date')
                                <span style="color: blue; margin-left:-200px;">if </span>(Arr::get($args, 'data.{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}')){
                                    ${{lcfirst($table->table_name)}}->{{$column->column_name}} = Arr::get($args, 'data.{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}');}
                                @else
                                <span style="color: blue; margin-left:-200px;">if </span>(Arr::get($args, 'data.{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}Id')){
                                    ${{lcfirst($table->table_name)}}->{{$column->column_name}}_id = Arr::get($args, 'data.{{ lcfirst(str_replace('_', '', ucwords($column->column_name, '_')))}}Id');}
                                @endif
                                @endForeach
                                <span style="color: blue; margin-left:-200px;">${{lcfirst($table->table_name)}}</span>->save();
                                return ${{lcfirst($table->table_name)}};
                            }
                        
                            public function delete($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
                            {
                                ${{lcfirst($table->table_name)}} = {{ucfirst($table->table_name)}}::find(Arr::get($args, 'data.id'));
                                <span style="color: blue;"> if </span>(${{lcfirst($table->table_name)}}) {
                                    ${{lcfirst($table->table_name)}}->delete();
                                    ${{lcfirst($table->table_name)}}->message = "deleted";
                                    return ${{lcfirst($table->table_name)}};
                                }
                                ${{lcfirst($table->table_name)}} = new {{ucfirst($table->table_name)}}();
                                ${{lcfirst($table->table_name)}}->message = "dont exist";
                                return ${{lcfirst($table->table_name)}};
                            }
                        </code>
                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection