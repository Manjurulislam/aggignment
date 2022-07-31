<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $items = Employee::orderBy('id', 'desc')->paginate(20);
        return view('backend.emp.index', compact('items'));
    }
}
