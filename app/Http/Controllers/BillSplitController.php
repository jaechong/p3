<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillSplitController extends Controller
{
    public function index()
    {
        return view('bills.index')->with([
            'service' => '0',
            'roundUp' => '',
            'results' => ''
        ]);

    }

    public function calculate(Request $request)
    {
        dump($request->input('noOfPeople'));
        dump($request->input('amount'));
        dump($request->input('service'));
        $splitBy = $request->input('noOfPeople');
        $totalTap = $request->input('amount');
        $tipRate = $request->input('service');
        $roundUp = $request->has('roundUp');

        if ($splitBy < 1 OR $totalTap < 0 OR $tipRate < 0) {
            return -1;      # return indicating error
        } else {
            /* calculate */
            $result = $totalTap * (1 + ($tipRate / 100)) / $splitBy;
        }

        /* round to nearest dollar or up to 1 cent */
        if ($roundUp) {
            $finalResult = ceil($result);
        } else {
            $finalResult = round($result + 0.0049, 2);  # couldn't find ceil function with precision, add .0049 to round up
            # i.e. 1.001 -> 1.01, 1.0001 -> 1.01,
            # limitation: 1.00009 -> 1.00, but close enough
        }

        return view('bills.index')->with([
            'noOfPeople' => $splitBy,
            'amount' => $totalTap,
            'service' => $tipRate,
            'roundUp' => $roundUp,
            'results' => $finalResult
        ]);
    }
}
