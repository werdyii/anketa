<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use Request;

use App\Voter;
use App\Poll;
use App\Http\Requests;
use App\Http\Requests\VoterRequest;
use App\Http\Controllers\Controller;

class VotersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //return "Vrat všetkých voličov";
        $voters = Voter::all();

        return view('voters.index',compact('voters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('voters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(VoterRequest $request)
    {
                
        //$poll = Poll::findOrFail($request->poll_id);
        
        //Voter::create(Request::all());
        Voter::create($request->all());
        //return $request->all();
        
        return redirect('voters');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $voter = Voter::findOrFail($id);

        return view('voters.show',compact('voter'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $voter = Voter::findOrFail($id);

        return view('voters.edit',compact('voter')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, VoterRequest $request)
    {
        $voter = Voter::findOrFail($id);
        
        $voter->update($request->all());
        
        return redirect('voters');
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
