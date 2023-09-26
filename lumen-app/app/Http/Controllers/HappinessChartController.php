<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Department;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class HappinessChartController extends BaseController
{
    public function getAllDepartmentsHappiness() {
        $departments = Department::all();
        return response()->json($departments);
    }

    public function postAllDepartmentsHappiness(Request $request) {
        $jsonData = $request->json()->all();
        $graphData = $jsonData['graph'];

        // Define the validation rules
        $validator = Validator::make($jsonData, [
            'graph.*.id' => 'required|exists:happiness_chart,id', 
            'graph.*.very_happy' => 'required|numeric|min:0',
            'graph.*.happy' => 'required|numeric|min:0',
            'graph.*.content' => 'required|numeric|min:0',
            'graph.*.unhappy' => 'required|numeric|min:0',
            'graph.*.very_unhappy' => 'required|numeric|min:0',
        ]);

        // If the validation fails, return a JSON response with the errors
        if ($validator->fails()) {
            throw new ValidationException($validator);
            // return response()->json(['status' => 'failed']);
        }

        foreach($graphData as $deparment) {
            $department = Department::findOrFail($deparment['id']);
            $data = $request->only([
                'very_happy', 'happy', 'content', 'unhappy', 'very_unhappy'
            ]);
            $department->update($deparment);
        }

        Log::info('Received Data:', $graphData);

        return response()->json(['status' => 'success']);

    }
}
