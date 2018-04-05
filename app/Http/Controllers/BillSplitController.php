<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillSplitController extends Controller
{

    public function index(Request $request)
    {
        return view('bills.index')->with([
            'noOfPeople' => '',
            'amount' => '',
            'service' => '0',
            'roundUp' => '',
            'results' => ''
        ]);
    }

    public function calculate(Request $request)
    {
        $this->validate($request, [
            'noOfPeople' => 'required|numeric|min:1|max:100',
            'amount' => 'required|numeric|min:1'
        ]);

        $splitBy = $request->input('noOfPeople');
        $totalTap = $request->input('amount');
        $tipRate = $request->input('service');
        $roundUp = $request->has('roundUp');

        /* calculate */
        $result = $totalTap * (1 + ($tipRate / 100)) / $splitBy;

        /* round to nearest dollar or up to 1 cent */
        if ($roundUp) {
            $finalResult = ceil($result);
        } else {
            $finalResult = round($result + 0.0049, 2);  
            # couldn't find ceil function with precision, add .0049 to round up
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
