<?php

namespace App\Http\Controllers;

use App\Service\EmployeeService;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $items = app(EmployeeService::class)->querySchema($request);
        return view('backend.emp.index', compact('items'));
    }
}
