<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function calculateLoan(Request $request)
    {
        $loan = $request->amount;
        $interest = $request->rate;
        $duration = $request->duration;

        $interestPerYear = ($loan * $interest)/100;

        $monthlyInterest = $interestPerYear/12;
        $monthlyPayment = $monthlyInterest + ($loan/$duration);
        $totalInterestCost = $monthlyInterest * $duration;
        $totalRepayment = $monthlyPayment * $duration;

        //return redirect()->route()->with()
        return view('result')->with('data', [
           'monthlyInterest' => '$ ' .number_format($monthlyInterest, 2),
            'monthlyPayment' => '$ ' .number_format($monthlyPayment, 2),
           'totalRepayment' => '$ ' .number_format($totalRepayment, 2),
           'totalInterestCost' => '$ ' .number_format($totalInterestCost, 2)
        ]);

    }
}
