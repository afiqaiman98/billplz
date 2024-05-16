<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreditController extends Controller
{
    public function filterCreditsForm()
    {
        return view('credits.filter-credits');
    }

    public function filterCredits(Request $request)
    {
        // $date = $request->input('date');

        // $credits = DB::table('credits')
        //     ->select('user_id', 'balance')
        //     ->whereDate('created_at', $date)
        //     ->get();

        // return view('credits.filtered-credits', ['credits' => $credits]);

        $date = $request->input('date');

        $credits = DB::table('credits')
            ->select('user_id', 'balance')
            ->whereDate('created_at', $date)
            ->get();

        // Calculate the total credits on the specified date
        $totalCredits = DB::table('credits')
            ->whereDate('created_at', $date)
            ->sum('balance');

        return view('credits.filtered-credits', [
            'credits' => $credits,
            'totalCredits' => $totalCredits,
        ]);
    }
}
