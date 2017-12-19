<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembershipController extends Controller
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
        $memberships = \App\Membership::orderBy('created_at', 'desc')->get();
        return view('memberships.index', ['memberships' => $memberships]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('memberships.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'limit_type' => 'required|string|in:days_count,visits_count',
            'limit' => 'required|digits_between:1,4',
            'amount' => 'required|numeric'
        ]);

        $membership = new \App\Membership();
        $membership->fill($request->all());
        $membership->save();

        return redirect()->route('memberships.index');
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
        $membership = \App\Membership::find($id);

        return view('memberships.edit', ['membership' => $membership]);
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
        $request->validate([
            'title' => 'required|string|max:100',
            'limit_type' => 'required|string|in:days_count,visits_count',
            'limit' => 'required|digits_between:1,4',
            'amount' => 'required|numeric'
        ]);

        $membership = \App\Membership::find($id);
        $membership->fill($request->all());
        $membership->save();

        return redirect()->route('memberships.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = \App\Payment::where('membership_id', $id)->first();

        if ($payment) {
            return 'Klaida! Toks planas yra mokėjimuose.';
        }

        \App\Membership::destroy($id);

        return redirect(route('memberships.index'));
    }

    public function findMembership(Request $request)
    {
        $data = \App\Membership::select('price', 'valid_days', 'id')->where('id', $request->id)->get();
        return response()->json($data);
    }
}
