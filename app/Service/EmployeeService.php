<?php

namespace App\Service;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EmployeeService
{

    public function querySchema(Request $request)
    {
        $year     = $request->get('year');
        $month    = $request->get('month');
        $row      = $request->get('page', 1);
        $cacheKey = "page_{$row}_" . $year . $month;

        return Cache::remember($cacheKey, 60, function () use ($year, $month) {
            $query = Employee::query();

            if (!blank($year)) {
                $query->whereYear('dob', $year);
            }

            if (!blank($month)) {
                $query->whereYear('dob', $month);
            }
            return $query->orderBy('id', 'desc')->paginate(20);
        });
    }


}
