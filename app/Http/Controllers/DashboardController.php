<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_employees' => \App\Models\User::count(),
            'total_departments' => \App\Models\Departement::count(),

        ];
        return view('home', compact('stats'));
    }
}
