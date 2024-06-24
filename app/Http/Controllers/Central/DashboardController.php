<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Identify the current tenant
        $tenant = \App\Models\Tenant::find(auth()->user()->id);

        // Switch to the tenant's database
        tenancy()->initialize($tenant);

        // Query the tenant's database
        $user_count = \App\Models\User::all()->count();
        $views = \App\Models\Views::all();

        $view_count = $views->count();

        $visit_count = \App\Models\Views::sum('visit_count');

        // Optionally, revert back to the central database
        tenancy()->end();

        return view('dashboard.index', compact(['view_count', 'visit_count', 'user_count']));
    }
}
