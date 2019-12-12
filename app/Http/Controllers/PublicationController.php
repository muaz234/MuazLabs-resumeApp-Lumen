<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use Illuminate\Support\Facades\Auth;

class PublicationController extends Controller
{
    public function index()
    {
        $publication = Publication::all();
        if(!empty($publication))
        {
            return response()->json(['message' => 'Retrieved successfully', 'data' => $publication], 200);
        }
        else
        {
            return response()->json(['message' => 'No data available.'], 200);
        }
    }

    public function show($candidateId)
    {
        if(!empty($candidateId))
        {
            $condition = ['candidate_id' => $candidateId];
            $publication = Publication::where($condition)->get();
            if(!empty($publication))
            {
                return response()->json(['message' => 'Retrieved successfully.', 'data' => $publication], 200);
            }
            else
            {
                return response()->json(['message' => 'No historical data found.'], 200);
            }
        }
        else
        {
            return response()->json(['message' => 'No Candidate ID was passed along the request. Please ensure your request and try again.'], 400);
        }
    }

    public function add(Request $request)
    {
        if(!empty($request))
        {
            $publication = Publication::create([
        'title' => $request->title,
        'authors' => $request->authors,
        'year_published' => $request->year_published,
        'conference_presented' => $request->conference_presented,
        'description' => $request->description,
        'published_at' => $request->published_at,
        'candidate_id' => Auth::id()
            ]);
            if($publication)
            {
                return response()->json(['message' => 'Created successfully', 'data' => $publication], 201);
            } 
            else
            {
                return response()->json(['message' => 'Unable to be created'], 500);
            }
        }
    }

    public function edit($candidateId, $id, Request $request)
    {
        if(!empty($candidateId) && !empty($id))
        {
        $conditions = ['candidate_id' => $candidateId, 'id' => $id];
        $publication = Publication::where($conditions)->get();
        $publication->title = $request->title;
        $publication->authors = $request->authors;
        $publication->year_published = $request->year_published;
        $publication->conference_presented = $request->conference_presented;
        $publication->description = $request->description;
        $publication->published_at = $request->published_at;
        $publication->save();
        return response()->json(['message' => 'Updated successfully. ', 'data' => $publication], 200);
        }
        else
        {
            return response()->json(['message' => 'Parameters are not passed correctly. Ensure to insert the Id before making the request. '], 400);
        }
    }

    public function delete($candidateId)
    {
        if(!empty($candidateId))
        {
            $condition = ['candidate_id' => $candidateId];
            $publication = Publication::where($condition)->delete();
            if($publication)
            {
                 return response()->json(['message' => 'Deleted successfully.'], 200);
            }
            else
            {
                return response()->json(['message' => 'Unable to delete due to not having historical data'], 400);
            }
        }
        else
        {
            return response()->json(['message' => 'Insufficient parameters received. Ensure correct parameters is send in the request URL.'], 400);
        }
    }
}
