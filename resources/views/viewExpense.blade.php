@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Expense Item</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($item)
                        <h2>Item: {{ $item_item}}</h2>
                        <h2>Vendor: {{ $item_vendor }}</h2>
                        <h2>Amount: ${{ $item_amount }}</h2>
                        <h2>Created at: {{ $item_created }}</h2>
                        <h2>Updated at: {{ $item_updated }}</h2>
                        <h2>Notes: {{ $item_notes }}</h2>
                        <hr />
                        <a class="btn btn-success" href="/editExpense/{{ $item->id }}" role="button">Edit</a>
                    @else
                        <p>No records found!</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection