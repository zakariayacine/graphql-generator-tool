<?php

namespace App\Http\Controllers;

use App\Models\Column;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $table = Table::find($id);
        return view("table.index", compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('table.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $table = new Table();
        $table->table_name = $request->table;
        $table->project_id = $id;
        $table->save();

        for ($i = 0; $i < count($request->columns); $i++) {
            $col = new Column();
            $col->column_name = $request->columns[$i];
            $col->column_type = $request->type[$i];
            $col->table_id = $table->id;
            $col->save();
        }
        return response()->json([
            "status"=> "success",
            "message"=>"columns saved",
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Table::find($id);
        return view("table.index", compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Table::find($id);
        $table->delete();
        return redirect('/project');
    }
}
