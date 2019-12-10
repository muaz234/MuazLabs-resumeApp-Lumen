<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
class PortfolioController extends Controller
{
    //
    public function index()
    {
        $portfolio = Portfolio::all();
        if(!empty($portfolio))
        {
            return response()->json(['message' => 'Retrieved successfully', 'data' => $portfolio], 200);
        }
        else
        {
            return response()->json(['message' => 'No data found.'], 400);
        }

    }

    public function show($candidateId)
    {
        if(!empty($candidateId))
        {
            $portfolio = Portfolio::where(['candidate_id' => $candidateId])->get();
            if(!empty($portfolio))
            {
                return response()->json(['message' => 'Retrieved successfully', 'data' => $portfolio], 200);
            }
            else
            {
                return response()->json(['message' => 'Unable to retrieve. No historical data found.'], 400);
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
            $portfolio = Portfolio::create($request->all());
            if($portfolio)
            {
                return response()->json(['message' => 'Created successfully.', 'data' => $portfolio], 201);
            }
            else
            {
                return response()->json(['message' => 'Unable to be created.'], 400);
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
            $portfolio = Portfolio::where($conditions)->get();
            $portfolio->name = $request->name;
            $portfolio->description = $request->description;
            $portfolio->duration = $request->duration;
            $portfolio->year = $request->year;
            $portfolio->save();
            return response()->json(['message' => 'Edited successfully', 'data' => $portfolio], 200);
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
            $portfolio = Portfolio::where($conditions)->delete();
            if($portfolio)
            {
                return response()->json(['message' => 'Deleted successfully']);
            }
            else
            {
                return response()->json(['message' => 'Unable to delete. No historical data found']);

            }
        }
        else
        {
            return response()->json(['message' => 'No Id passed along the request. Please ensure to add required arguments'], 400);
        }
    }

}
