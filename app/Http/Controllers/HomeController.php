<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 'SELECT *, (SELECT COUNT(*) FROM visits WHERE member_id=m.id AND created_at >= p.active_since) as visits_count, IF(ms.limit_type="days_count",IF(DATEDIFF(ADDDATE(p.active_since, INTERVAL ms.limit DAY),NOW()) >= 0,'true','false'),IF((SELECT COUNT(*) FROM visits WHERE member_id=m.id AND created_at >= p.active_since) <= ms.limit,'true','false')) AS is_valid FROM members AS m LEFT JOIN (SELECT members.id, MAX(payments.id) AS payment_id FROM members LEFT JOIN payments ON members.id = payments.member_id WHERE payments.active_since <= NOW() GROUP BY members.id) AS mp ON m.id = mp.id LEFT JOIN payments AS p ON mp.payment_id = p.id LEFT JOIN memberships AS ms ON p.membership_id = ms.id;'
        // $members = \App\Member::with('payments', 'visits')->orderBy('name', 'asc')->paginate(10);

        $members = DB::table('members')
            ->select(DB::raw('members.id, members.unique_id, members.name, payments.active_since, memberships.limit_type, memberships.limit, (SELECT COUNT(*) FROM visits WHERE member_id=members.id AND created_at >= payments.active_since) AS visits_count, IF(memberships.limit_type="days_count",IF(DATEDIFF(ADDDATE(payments.active_since, INTERVAL memberships.limit DAY),NOW()) >= 0,"true","false"),IF((SELECT COUNT(*) FROM visits WHERE member_id=members.id AND created_at >= payments.active_since) <= memberships.limit,"true","false")) AS is_valid'))
            ->leftJoin(DB::raw('(SELECT members.id, MAX(payments.id) AS payment_id FROM members LEFT JOIN payments ON members.id = payments.member_id WHERE payments.active_since <= NOW() GROUP BY members.id) AS mp'), function($join)
            {
                $join->on('members.id', '=', 'mp.id');
            })
            ->leftJoin('payments', 'mp.payment_id', '=', 'payments.id')
            ->leftJoin('memberships', 'payments.membership_id', '=', 'memberships.id');


        if ($request->has('search')) {
            $request->validate([
                'search' => 'alpha_num'
            ]);

            $members = $members->where('members.unique_id', 'like', '%'.$request->input('search').'%')
                ->orWhere('members.name', 'LIKE', '%'.$request->input('search').'%')
                ->orderBy('payments.active_since', 'desc')
                ->paginate(15);
        } else {
            $members = $members->orderBy('payments.active_since', 'desc')
                ->paginate(15);
        }

        return view('home', ['members' => $members]);
    }
}
