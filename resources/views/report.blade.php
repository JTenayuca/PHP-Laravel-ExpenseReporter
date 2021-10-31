@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $report }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($item ->count() > 0) 
                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <td>Item</td>
                                                <td>Vendor</td>
                                                <td>Amount</td>
                                                <td>Notes</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        @foreach ($item as $item) 
                                            <tr><td><a href="/viewExpense/{{ $item->id }}">{{ $item->item }}</a></td>
                                                <td>{{ $item->vendor }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->notes }}</td>
                                                <td><a class="btn btn-success" href="/editExpense/{{ $item->id }}" role="button">Edit</a></td>
                                                <td><a class="btn btn-danger" href="/deleteExpense/{{ $item->id }}" role="button">Delete</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                    </table>
                   Total: ${{ $total }} <hr />
                    @else
                    <p>No Expenses Found!</p>
                    @endif

                    <a class="btn btn-primary" href="/createExpense/{{ $report_id }}" role="button">Create Expense</a>      
                </div>
            </div>
        </div>
    </div>
</div>

@endsection




