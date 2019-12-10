<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reference;
class ReferenceController extends Controller
{
    //
    public function index()
    {
        $reference = Reference::all();
        if(!empty($reference))
        {
            return response()->json(['message' => 'Retrived successfully', 'data' => $reference],200);
        }
        else
        {
            return response()->json(['message' => 'Unable to fulfill the request.'], 200);
        }
    }

    public function show($candidateId)
    {
        if(!empty($candidateId))
        {
            $condition = ['candidate_id' => $candidateId];
            $reference = Reference::where($condition)->get();
            if(!empty($reference))
            {
                return response()->json(['message' => 'Retrieved successfully', 'data' => $reference], 200);
            }
            else
            {
                return response()->json(['message' => 'Unable to retrieve data from remote server. No historical data is found'], 200);
            }
        }
        else
        {
            return response()->json(['message' => 'Required parameter is not passed in the request. Ensure to include the required parameter.'], 400);
        }
    }

    public function add(Request $request)
    {
        if(!empty($request))
        {
            $reference = Reference::create($request->all());
            if($reference)
            {
                return response()->json(['message' => 'Created successfully', 'data' => $reference], 201);
            }
            else
            {
                return response()->json(['message' => 'Unable to be created. Ensure to check your request object.'], 200);            
            }
        }
    }

    public function edit($candidateId, $id, Request $request)
    {
        if(!empty($candidateId) && !empty($id))
        {
            $conditions = ['candidate_id' => $candidateId, 'id' => $id];
            $reference = Reference::where($conditions)->get();
            if(!empty($reference))
            {
                $reference->name = $request->name;
                $reference->designation = $request->designation;
                $reference->year_known = $request->year_known;
                $reference->company_name = $request->company_name;
                $reference->email = $request->email;
                $reference->contact_number = $request->contact_number;
                $reference->save();
                return response()->json(['message' => 'Updated successfully', 'data' => $reference], 200);
            }
            else
            {
                return response()->json(['message' => 'No historical data found. Please use another parameter to try.'], 200);
            }
        }
        else
        {
            return response()->json(['message' => 'Required parameters is not passed along the request.'], 400);
        }

    }

    public function delete($candidateId)
    {
        if(!empty($candidateId))
        {
            $condition = ['candidate_id' => $candidateId];
            $reference = Reference::where($condition)->delete();
            if($reference)
            {
                return response()->json(['message' => 'Deleted successfully'], 200);
            }
            else
            {
                return response()->json(['message' => 'Unable to perform deletion request'], 400);
            }
        }
        else
        {
            return response(['message' => 'Requred parameters is not included in the request URL'], 400);
        }
    }

}
