<?php

namespace App\Http\Controllers\Conge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeCongeController extends Controller
{
    public function create()
    {
        return view('employee-views.conges.create');
    }
}
