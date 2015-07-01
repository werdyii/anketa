<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Poll;
use App\Research;

use App\Http\Requests;
use App\Http\Requests\VoterRequest;
use App\Http\Controllers\Controller;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $polls = Poll::all();

        return view('polls.index',compact('polls'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function step1($id)
    {
        $poll = Poll::findOrFail($id);

        return view('polls.step1',compact('poll'));
    }

    public function storeStep1(VoterRequest $request)
    {
        Voter::create($request->all());
        
        return redirect('step2');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function step2($id)
    {
        $poll = Poll::findOrFail($id);

        return view('polls.step2',compact('poll'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function step3($id)
    {
        $poll = Poll::findOrFail($id);

        return view('polls.step3',compact('poll'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function thanks($id)
    {
        $poll = Poll::findOrFail($id);

        return view('polls.thanks',compact('poll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
