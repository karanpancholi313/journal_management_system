<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FetchDropdownController extends Controller
{
    public function getDropDowns(Request $request)
    {
        $term = $request->input('q');
        $modal = $request->input('type');
        $modal = ucfirst($modal);
        
        // Construct the fully qualified class name
        $fullyQualifiedClassName = 'App\\Models\\' . $modal;
        
        // Check if the class exists before proceeding
        if (!class_exists($fullyQualifiedClassName)) {
            return response()->json(['error' => 'Invalid Dropdown Code.'], 400);
        }

        // if $modal is user 
        if ($modal == 'Jmsuser') {
            $data = \App\Models\Jmsuser::where('name', 'LIKE', '%' . $term . '%')->where('roles','2')->get();
            $results = [];
            foreach ($data as $key => $v) {
                $results[] = ['id' => $v->id, 'text' => $v->name];
            }
            return response()->json($results);
        }
      
        // Use the fully qualified class name to retrieve data
        $className = 'App\Models\\' . $modal;
        $data = $className::where('title', 'LIKE', '%' . $term . '%')->get();

        $results = [];
        foreach ($data as $key => $v) {
            $results[] = ['id' => $v->id, 'text' => $v->title];
        }
        return response()->json($results);
    }
}
