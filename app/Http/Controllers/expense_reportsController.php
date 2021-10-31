<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\expense_reports;
use App\expense_items;
use Auth;

class expense_reportsController extends Controller
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

    
    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        Auth::user();
        
        $expense_report = new expense_reports;

        $expense_report->report_name = $request->report_name;

       
        $request->validate([
            'report_name' => 'required',
        ], [
            'report_name.required' => 'Name is required'
        ]);
        $expense_report -> user_id=Auth::user()->id;

        $expense_report->save();

        //    $request

        // $input = $request->all();
        //$report = expense_reports::create($input);

        return redirect()->route('home');

    }

    public function read($id) {
        $report = expense_reports::where('id', $id)->first();
        $item = expense_items::where('report_id', $id)->get();
        $total = $item->sum('amount');

        if (!$report) {
            return "Record not found!";
        } 

        elseif (Auth::user()->id == $report->user_id) {
            
            return view('/report', ['report' => $report->REPORT_NAME, 'report_id' => $report->id, 'user_id' => $report->user_id, 'item' => $item, 'report1' => $report, 'total' => $total]);
        }

        else {
            return "Record not found!";
        }
        
    }

    public function delete($id) {
        $report = expense_reports::where('id', $id)->first();

        if (!$report) {
            return "Record not found!";
        } 
        elseif (Auth::user()->id == $report->user_id) {
            $report->delete();
            return redirect()->route('home');
        }
        else {
            return "Record not found!";
        }
        

    }

    public function edit($id) {
        $report = expense_reports::where('id', $id)->first();

        if (!$report) {
            return "Record not found!";
        } 
        elseif (Auth::user()->id == $report->user_id) {
            return view('/edit', ['report' => $report->REPORT_NAME, 'id' => $report->id]);
        }
        else {
            return "Record not found!";
        }
    }

    public function update(Request $request) {

        $request->validate([
            'report_name' => 'required',
        ], [
            'report_name.required' => 'Name is required'
        ]);
        $report = expense_reports::where('id', $request->id)->first();

        if (!$report) {
            return "Record not found!";
        } 
        elseif (Auth::user()->id == $report->user_id) {
            $report->report_name = $request->report_name;
            $report->save();
            return redirect()->route('home');
        }
        else {
            return "Record not found!";
        }


    }
}
