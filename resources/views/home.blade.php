@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reports Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    @php
                    use App\expense_reports;
                    //TODO: Modify query to retrieve only those matching id
                    // $reports = expense_reports::all();
                   $reports = expense_reports::where('user_id', Auth::user()->id)->get();



                    if ($reports->count() > 0) {
                        echo '<table class="table table-striped">
                            <thead>
                                <tr><td>Report</td>
                                    <td>Date Created</td>
                                    <td>Updated at</td>
                                </tr>
                            </thead>
                            <tbody>';
                                foreach ($reports as $report) {
                                    echo '<tr><td>' . '<a href="/report/' . $report->id . '">' . $report->REPORT_NAME . '</a>'. '</td><td>' . $report->created_at . '</td><td>' . $report->updated_at . '</td><td><a class="btn btn-success" href="/edit/' . $report->id . '" role="button">Edit</a></td><td><a class="btn btn-danger" href="/delete/' . $report->id . '" role="button">Delete</a></td>';
                                    }
                            echo '</tbody>
                        </table>';
                    }
                    else {
                        echo '<p>No Reports Found!</p>';
                    }
                    @endphp
                  
                    <a class="btn btn-primary" href="{{ url('/create') }}" role="button">Create</a>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


