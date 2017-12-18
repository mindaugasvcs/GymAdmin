<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = \App\Visit::orderBy('created_at', 'desc')->paginate(15);
        $message = NULL;
        return view('visits', ['visits' => $visits, 'message' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

// Tikrina ar lankytojo kortele galioja ir iraso i duomenu baze lankymo lentele
    public function validateMembership()
    {
        $search = \Request::get('search');
        $members = \App\Member::where('card_id', 'like', '%'.$search.'%')->orderBy('id')->get();
        $visits = \App\Visit::orderBy('id', 'desc')->paginate(15);

// dd($members[0]);
        if (!isset($members[0])) {
            $message = 'Kortelės numerio '.$search.' tarp sporto klubo narių rasti nepavyko';
            // dd($error);
        } else {

            $expiry_date = strtotime($members[0]['expiry_date']);
            $today = strtotime(date('Y-m-d'));

            if ($expiry_date < $today)
            {
                $message = 'Kortelės '.$search.' galiojimas pasibaigė '.$members[0]['expiry_date'];
            } else {
                $visit = new \App\Visit();
                $visit->card_id = $members[0]['card_id'];
                $visit->member_id = $members[0]['id'];
                $visit->save();
                $message = NULL;
            };
        }
            return view('visits', ['visits' => $visits, 'message' => $message]);
    }
}
