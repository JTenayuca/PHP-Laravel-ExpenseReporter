<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\expense_reports;
use App\expense_items;
use Auth;

class expense_itemController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewExpense($id) {
        $item = expense_items::where('id', $id)->first();
        $report = expense_reports::where('id', $item->report_id)->first();
        if (!$report) {
            return "Record not found!";
        } 
        elseif (Auth::user()->id == $report->user_id) {
            return view('/viewExpense', ['item' => $item, 'item_item' => $item->item, 'item_vendor' => $item->vendor,
             'item_amount' => $item->amount, 'item_created' => $item->created_at, 'item_updated' => $item->updated_at,
              'item_notes' => $item->notes, 'item_id' => $item->id]);
        }
        else {
            return "Record not found!";
        }
    }

    public function create_expense($id) {
        $report = expense_reports::where('id', $id)->first();
        if (!$report) {
            return "Record not found!";
        } 
        elseif (Auth::user()->id == $report->user_id) {
            return view('/createExpense', ['report' => $report->REPORT_NAME, 'id' => $report->id]);
        }
        else {
            return "Record not found!";
        }
    }

    public function store_expense(Request $request, $id) {
        $expense_item = new expense_items;

        $expense_item->item = $request->item;
        $expense_item->vendor = $request->vendor;
        $expense_item->amount = $request->amount;
        $expense_item->notes = $request->notes;
        $expense_item->report_id = $request->report_id;

       
        $request->validate([
            'item' => 'required',
            'vendor' => 'required',
            'amount' => 'required',
            'notes' => 'required'

        ], [
            'item.required' => 'Item is required',
            'vendor.required' => 'Vendor is required',
            'amount.required' => 'Amount is required',
            'notes.required' => 'Notes is required'
        ]);


        $expense_item->save();

        return redirect()->route('report', $request->report_id);
        
    }

    public function editExpense($id) {
        $item = expense_items::where('id', $id)->first();
        $report = expense_reports::where('id', $item->report_id)->first();
        if (!$item) {
            return "Record not found!";
        } 
        elseif (Auth::user()->id == $report->user_id) {
            return view('/editExpense', ['item' => $item, 'item_id' => $item->id, 'item_item' => $item->item, 'item_vendor' => $item->vendor,
             'item_amount' => $item->amount, 'item_created' => $item->created_at, 'item_updated' => $item->updated_at,
              'item_notes' => $item->notes]);
        }
        else {
            return "Record not found!";
        }
    }


    public function updateExpense(Request $request) {
       
        $request->validate([
            'item' => 'required',
            'vendor' => 'required',
            'amount' => 'required',
            'notes' => 'required'

        ], [
            'item.required' => 'Item is required',
            'vendor.required' => 'Vendor is required',
            'amount.required' => 'Amount is required',
            'notes.required' => 'Notes is required'
        ]);

        $item = expense_items::where('id', $request->item_id)->first();
        $report = expense_reports::where('id', $item->report_id)->first();

        if (!$report) {
            return "Record not found!";
        } 
        elseif (Auth::user()->id == $report->user_id) {
            $item->item = $request->item;
            $item->vendor = $request->vendor;
            $item->amount = $request->amount;
            $item->notes = $request->notes;
            $item->id = $request->item_id;

            $item->save();
            return redirect()->route('report', $report->id);
        }
        else {
            return "Record not found!";
        }
    }

    public function delete($id) {

        $item = expense_items::where('id', $id)->first();
        $report = expense_reports::where('id', $item->report_id)->first();

        if (!$item) {
            return "Record not found!";
        } 
        elseif (Auth::user()->id == $report->user_id) {
            $item->delete();
            return redirect()->route('report', $report->id);
        }
        else {
            return "Record not found!";
        }
    }
}
