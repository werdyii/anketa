<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Poll;
use App\Http\Requests;
use App\Http\Requests\PollRequest;
use App\Http\Controllers\Controller;

class PollsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //return "Vrat všetkých voličov";
        $polls = Poll::all();

        return view('admin.polls.index',compact('polls'));
        //return view('admin.polls.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.polls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PollRequest $request)
    {
        //Poll::create(Request::all());
        Poll::create($request->all());
        //return $request->all();
        
        return redirect('admin/polls');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $poll = Poll::findOrFail($id);

        //dd($poll->published_at);

        return view('admin.polls.show',compact('poll')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $poll = Poll::findOrFail($id);
        
        //dd($poll);

        return view('admin.polls.edit',compact('poll')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, PollRequest $request)
    {
        $poll = Poll::findOrFail($id);
        
        $poll->update($request->all());
        
        return redirect('admin/polls');
        
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
