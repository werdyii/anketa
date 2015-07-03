<?php

namespace App\Http\Controllers;
use Validator;
use App\Proposal;
use App\Poll;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProposalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($poll)
    {
        $poll = Poll::findOrFail($poll);
        $proposals = $poll->proposals();

        return view('proposals.index',compact('proposals','poll'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        dd($request);

        $validator = Validator::make($request->all(), ['proposal' => 'required|unique:posts|max:255']);

        Proposal::create($request->all());
        
        return redirect()->action('ProposalsController@index', [$request->poll_id()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
