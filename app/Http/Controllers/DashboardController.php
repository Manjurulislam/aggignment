<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Service\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $items = app(EmployeeService::class)->querySchema($request);
        return view('backend.emp.index', compact('items'));
    }
}
