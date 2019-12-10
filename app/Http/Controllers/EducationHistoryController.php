<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EducationHistory;
class EducationHistoryController extends Controller
{
    //
    public function index()
    {
        $education = EducationHistory::all();
        if(!empty($education))
        {
            return response()->json(['message' => 'Retrieved successfully', 'data' => $education], 201);
        }
        else
        {
            return response()->json(['message' => 'No data were found.'], 204);
        }
    }

    public function add(Request $request)
    {
        if(!empty($request))
        {
            $education = EducationHistory::create($request->all());
            return response()->json(['message' => 'Added successfully', 'data' => $education], 201);
        }
        else
        {
            return response()->json(['message' => 'No data was passed. Ensure all data are correct or make another request..'], 204);
        }
    }

    public function edit($candidateId, $id, Request $request)
    {
        if(!empty($candidateId && $id))
        {
            $conditions = ['candidate_id' => $candidateId, 'id' => $id];
            $education = EducationHistory::where($conditions)->get();
                if(!empty($education))
                {
                    $education->qualification = $request->qualification;
                    $education->major = $request->major;
                    $education->name = $request->name;
                    $education->year = $request->year;
                    $education->final_score = $request->final_score;
                    $education->description = $request->description;
                    $education->institution = $request->institution;
                    $education->save();
                    return response()->json(['message' => 'Updated successfully', 'data' => $education], 200);
                }
                else
                {
                    return response()->json(['message' => 'Unable to update. No history data found.'], 204);
                }
        }
        else
        {
            return response()->json(['message' => 'No id is passed along the request'], 400);
        }
    }

    public function delete($candidateId, $id)
    {
        if(!empty($candidateId && $id))
        {
            $conditions = ['candidate_id' => $candidateId, 'id' => $id];
            $education = EducationHistory::where($conditions)->delete();
            if($education)
            {
                return response()->json(['message' => 'Deleted successfully.'], 200);
            }
            else
            {
                return response()->json(['message' => 'Unable to delete.'], 500);
            }
        }
        else
        {
            return response()->json(['message'=>'No Id was passed in the request. Please ensure correct parameter is passed.'], 400);
        }
    }

    public function show($candidateId)
    {
        if(!empty($candidateId))
        {
            $education = EducationHistory::where('candidate_id', $candidateId)->get();
            if(!empty($education))
            {
                return response()->json(['message' => 'Data retrieved successfully.', 'data' => $education], 200);
            }
            else
            {
                return response()->json(['message' => 'No history data was found.'], 204);
            }
        }
        else
        {
            return response()->json(['message' => 'No candidate ID was passed. Ensure to check your request URL'], 400);
        }
    }
}
