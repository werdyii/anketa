<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Poll;
use App\Research;
use App\Voter;
use App\Http\Requests;
use App\Http\Requests\VoterRequest;
use App\Http\Controllers\Controller;

class ResearchController extends Controller
{
    /**
     * Zobraz všetky ankety a vymaž session.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $polls_preview  = Poll::preview()->get();
        $polls_run      = Poll::run()->get();
        $polls_end      = Poll::end()->get();
        //dd($polls_end);
        $request->session()->flush();
        return view('polls.index',compact('polls_preview', 'polls_run', 'polls_end'));
    }

    /**
     * Zobraz otázky v ankete ak ešte nebeží anketa je možné tu pridať otázku
     *
     * @return Response
     */
    public function step1($id, Request $request)
    {
        if( is_numeric($id)){
            $poll = Poll::findOrFail($id);
            $request->session()->put('poll_id', $id);
            return view('polls.step1',compact('poll'));
        }else{
            return redirect()->action('ResearchController@index');
        }
    }


    public function storeStep1(VoterRequest $request)
    {

        //return $request->all();
        //dd($request->name);
        
        //$request->session()->put('poll_id', $request->poll_id);
        $request->session()->put('voter', $request->all());
        //$request->session()->put('sex', $request->sex);

        // $voter = new Voter($request->all());
        // $voter->save();

         //dd($request->session()->all());
        // $data = array('poll_id'=>$request->poll_id, 'voter_id'=>$voter->id );

        return redirect()->action('ResearchController@step2');

    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function step2(Request $request)
    {
        if (($request->session()->has('poll_id'))and(($request->session()->has('voter')))) {
            // Ulož research 
            // 
            // 
            // $poll = Poll::findOrFail($poll_id);
            // $voter = Voter::findOrFail($voter_id);
            // $proposals = $poll->proposals;
            
            $voter      = $request->session()->get('voter');
            $poll_id    = $request->session()->get('poll_id');
            $poll       = Poll::findOrFail($poll_id);
            $proposals  = $poll->proposals;
            $proposals_select = $request->session()->get('proposals');
            //dd($voter);

            return view('polls.step2',compact('poll','proposals','voter', 'proposals_select'));
        
        }else{
            return redirect()->action('ResearchController@index');
        }
    }

    public function storeStep2(Request $request)
    {

        $request->session()->put('proposals', $request->proposals);
        
        return redirect()->action('ResearchController@step3' );

    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function step3(Request $request)
    {

        if ($request->session()->has('proposals')) {
            
            $data       = $request->session()->all();
            $proposals_select = $request->session()->get('proposals');
            $proposals  = DB::table('proposals')
                        ->whereIn('id', $proposals_select)
                        ->get();
            $data['proposals'] = $proposals;

            //dd($data);
            return view('polls.step3',$data);
            
         }else{
            return redirect()->action('ResearchController@index');
         }

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function storeStep3(Request $request)
    {

        //dd($request->session()->all());
        //$poll = Poll::findOrFail($request->poll_id);

        //dd($request->session()->get('voter'));
         if (($request->session()->has('poll_id'))and($request->session()->has('voter'))) {
            $voter = new Voter($request->session()->get('voter'));
            $voter->save();
            //$request->session()->put('voter', $voter->id);
            //dd($voter);

            $research = new Research;
            $research->poll_id  = $request->session()->get('poll_id');
            $research->voter_id = $voter->id;
            $research->save();
            $request->session()->put('research', $research->id);
            $ratios = $request->ratio;

            foreach ($ratios as $proposal_id => $ratio)
            { 
                $research->proposals()->attach($proposal_id,['ratio' => $ratio]);
                //$user->roles()->attach($roleId, ['expires' => $expires]);
                //$research->ratio        = $ratio;
                //dd($research);
            };
            
            return redirect()->action('ResearchController@thanks' );
        }else{
            return redirect()->action('ResearchController@index');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function thanks(Request $request)
    {

        //dd($request->session()->all());
        if ($request->session()->has('research')) {
            $research   = Research::findOrFail($request->session()->get('research'));
            $poll       = $research->poll;
            return view('polls.thanks',compact('research','poll'));
        }else{
            return redirect()->action('ResearchController@index');
        }
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
