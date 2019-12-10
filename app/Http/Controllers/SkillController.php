<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
class SkillController extends Controller
{
    public function index()
    {
        $skill = Skill::all();
        if(!empty($skill))
        {
            return response()->json(['message' => 'Retrieved successfully', 'data' => $skill], 200);
        }
        else
        {
            return response()->json(['message' => 'No data found.'], 200);
        }
    }

    public function show($candidateId)
    {
        if(!empty($candidateId))
        {
            $skill = Skill::where(['candidate_id' => $candidateId])->get();
            if(!empty($skill))
            {
                return response()->json(['message' => 'Retrieved successfully', 'data' => $skill], 200);
            }
            else
            {
                return response()->json(['message' => 'Unable to retrieve. No historical data found.'], 200);
            }
        }
        else
        {
            return response()->json(['message' => 'Unable to retrieve data successfully.'], 400);
        }
    }

    public function add(Request $request)
    {
        if(!empty($request))
        {
            $skill = Skill::create($request->all());
            if($skill)
            {
                return response()->json(['message' => 'Created successfully.', 'data' => $skill], 201);
            }
            else
            {
                return response()->json(['message' => 'Unable to be created.'], 500);
            }
        }
        else
        {
            return response()->json(['message' => 'No data passed along the request.'], 400);
        }
    }

    public function edit($candidateId, $id, Request $request)
    {
        if(!empty($candidateId) && !empty($id))
        {
            $conditions = ['candidate_id' => $candidateId, 'id' => $id];
            $skill = Skill::where($conditions)->get();
            $skill->name = $request->name;
            $skill->description = $request->description;
            $skill->duration = $request->duration;
            $skill->year = $request->year;
            $skill->save();
            return response()->json(['message' => 'Edited successfully', 'data' => $skill], 200);
        }
        else
        {
            return response()->json(['message' => 'Unable to update the data. Ensure the request object is correct.'], 400);
        }
    }

    public function delete($candidateId)
    {
        if(!empty($candidateId))
        {
            $conditions = ['candidate_id' => $candidateId];
            $skill = Skill::where($conditions)->delete();
            if($skill)
            {
                return response()->json(['message' => 'Deleted successfully'], 200);
            }
            else
            {
                return response()->json(['message' => 'Unable to delete. No historical data found'], 500);

            }
        }
        else
        {
            return response()->json(['message' => 'No Id passed along the request. Please ensure to add required arguments'], 400);
        }
    }
}
