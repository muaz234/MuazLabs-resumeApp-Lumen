<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;
use App\Certificate;
class CertificateController extends Controller
{
    //
    public function index()
    {
        $certificate = Certificate::all();
        if(!empty($certificate))
        {
            return response()->json(['message' => 'Retrieved successfully', 'data' => $certificate], 200);
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
            $certificate = Certificate::where(['candidate_id' => $candidateId])->get();
            if(!empty($certificate))
            {
                return response()->json(['message' => 'Retrieved successfully', 'data' => $certificate], 200);
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
            $certificate = Candidate::create($request->all());
            if($certificate)
            {
                return response()->json(['message' => 'Created successfully.', 'data' => $certificate], 201);
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
            $certificate = Candidate::where($conditions)->get();
            $certificate->name = $request->name;
            $certificate->description = $request->description;
            $certificate->duration = $request->duration;
            $certificate->year = $request->year;
            $certificate->save();
            return response()->json(['message' => 'Edited successfully', 'data' => $certificate], 200);
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
            $certificate = Certificate::where($conditions)->delete();
            if($certificate)
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
