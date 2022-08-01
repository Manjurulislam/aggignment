<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $currentPage = $request->get('page', 1);
        $items       = Cache::remember('emp_' . $currentPage, 10, function () {
            return DB::table('employees')->orderBy('id', 'desc')->paginate(20);
        });

//        $items = Employee::orderBy('id', 'desc')->paginate(20);
        return view('backend.emp.index', compact('items'));
    }
}
