<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkExperience;
class WorkExperienceController extends Controller
{
    //

    public function index()
    {
        $experience = WorkExperience::all();
        if(!empty($experience))
        {
            return response()->json(['message' => 'Retrieved successfully', 'data' => $experience], 200);
        }
        else
        {
            return response()->json(['message' => 'No data is available'], 400);
        }
    }

    public function show($candidateId)
    {
        if(!empty($candidateId))
        {
            
        }
        else
        {
            return response()->json(['message' => 'Required parameter is not passed.'], 400);
        }
    }

    public function add(Request $request)
    {
        if(!empty($request))
        {
            $experience = WorkExperience::create($request->all());
            if($experience)
            {
                return response()->json(['message' => 'Created successfully', 'data' => $experience], 201);
            }
            else
            {
                return response()->json(['message' => 'Unable to create'], 500);
            }
        }
        else
        {
            return response()->json(['message' => 'Empty response are send. Please check your input.'], 400);
        }
    }

    public function edit($candidateId, $id, Request $request)
    {
        if(!empty($candidateId) && !empty($id))
        {
            $conditions = ['candidate_id' => $candidateId, 'id' => $id];
            $experience = WorkExperience::where($conditions)->get();
            if(!empty($experience))
            {
                $experience->company_name = $request->company_name;
                $experience->position = $request->position;
                $experience->duration = $request->duration;
                $experience->description = $request->description;
                $experience->location = $request->location;
                return response()->json(['message' => 'Updated successfully.', 'data' => $experience], 200);
            }
            else
            {
                return response()->json(['message' => 'No historical data found.'], 400);
            }
        }
        else
        {
            return response()->json(['message' => 'Required parameters is not included in the requesting URL. Please check your URL and make another request'], 400);
        }
    }

    public function delete($candidateId)
    {
        if(!empty($candidateId))
        {
            $condition = ['candidate_id' => $candidateId];
            $experience = WorkExperience::where($condition)->delete();
            if($experience)
            {
                return response()->json(['message' => 'Deleted successfully'], 200);
            }
            else
            {
                return response()->json(['message' => 'Unable to delete'], 500);
            }
        }
        else
        {
            return response()->json(['message' => 'Required parameter is not passed into the URL.'], 400);
        }
    }
}
