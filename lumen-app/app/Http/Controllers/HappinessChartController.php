<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Department;
use Illuminate\Http\Response;


class HappinessChartController extends BaseController
{
    public function getAllDepartmentsHappiness() {
        $departments = Department::all();
        // var_dump($departments);
        return response()->json($departments);
    }
}
