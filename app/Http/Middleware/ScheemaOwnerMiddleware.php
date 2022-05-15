<?php

namespace App\Http\Middleware;

use App\Models\Column;
use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheemaOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->id) { 
            $table = Column::findOrFail($request->id)->table()->first();
            $project = Project::findOrFail($table->project_id);
            if ($project) {
                if ($project->user_id === Auth::id()) {
                    return $next($request);
                };
                return abort('403');
            };
        };
    }
}
