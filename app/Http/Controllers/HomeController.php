<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        if($request){
            $table = Table::where('project_id',$request->id)->get();
            $table->project_id = $request->id;
        }else{
            $table = '';
            dd($table);
        }
        $projects = Project::where('user_id',Auth::id())->get();
        return view('home', compact('projects','table'));
    }
}
