@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Expense</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <form method="POST" action="{{ url('/createExpense/{$id}') }}">
           
            {{ csrf_field() }}
  
            <div class="form-group">
                <label>Item:</label>
                <input type="text" name="item" class="form-control" placeholder="item">
                @if ($errors->has('item'))
                    <span class="text-danger">{{ $errors->first('item') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>Vendor:</label>
                <input type="text" name="vendor" class="form-control" placeholder="vendor">
                @if ($errors->has('vendor'))
                    <span class="text-danger">{{ $errors->first('vendor') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>Amount:</label>
                <input type="number" step="0.01" min="0.00" value="0.00" name="amount" class="form-control" placeholder="0.00">
                @if ($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>Notes:</label>
                <input type="textbox" name="notes" class="form-control" placeholder="notes">
                @if ($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="hidden" name="report_id" class="form-control" value={{$id}}>
                @if ($errors->has('report_id'))
                    <span class="text-danger">{{ $errors->first('report_id') }}</span>
                @endif
            </div>
   
            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection