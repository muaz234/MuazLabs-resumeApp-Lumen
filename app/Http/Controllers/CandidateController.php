<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use COM;

class CandidateController extends Controller
{
    //

    public function add(Request $request)
    {
        if(!empty($request))
        {
            $data = Candidate::create($request->all());
            return response()->json(['message' => 'Added successfully', 'data' => $data], 201);
        }
        else
        {
            return response()->json(['message' => 'Failed to add. No data is added'], 400);
        }
    }

    public function index()
    {
        $data = Candidate::all();
        if(!empty($data))
        {
            return response()->json(['message'=> 'Sucessfully retrieved.', 'data' => $data], 201);
        }
        else
        {
            return response()->json(['message' => 'No data received.'], 400);
        }
    }

    public function edit($id, Request $request)
    {
        if(!empty($id))
        {
            $data = Candidate::findOrFail($id);
            if(!empty($data))
            {
                $data->fullname = $request->fullname;
                $data->job_title = $request->job_title;
                $data->address = $request->address;
                $data->contact_no = $request->contact_no;
                $data->email = $request->email;
                $data->website = $request->website;
                $data->save();
                return response()->json(['message' => 'Updated successfully', 'data' => $data], 201);
            }
        }
        else
        {
            return response()->json(['message' => 'No ID is passed into the URL'], 400);
        }
    }

    public function show($id)
    {

        if(!empty($id))
        {
            $data = Candidate::findOrFail($id);
            if(!empty($data))
            {
                return response()->json(['message' => 'Retrieved successfully', 'data' => $data], 201);
            }
            else
            {
                return response()->json(['message' => 'Failed to retrieved successfully. No data was found'], 201);
            }
        }
        else
        {
            return response()->json(['message' => 'No ID was passed. Please ensure you check the URL'],  401);
        }
        
    }

    public function delete($id)
    {
        if(!empty($id))
        {
            $candidate = Candidate::destroy($id);
            if($candidate)
            {
                return response()->json(['message' => 'Deleted successfully'], 201);
            }
            else
            {
                return response()->json(['message' => 'Delete operation unsuccessful']. 201);
            }
        }
        else
        {
            return response()->json(['message' => 'Failed to retrieve. No ID was passed to the URL.'], 400);
        }
    }
}
