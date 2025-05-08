<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Departement;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_employees' => User::count(),
            'total_departments' => Departement::count(),
        ];
        return view('home', compact('stats'));
    }
}
