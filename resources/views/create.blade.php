@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Report</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
            <form method="POST" action="{{ url('/create') }}">
           
            {{ csrf_field() }}
  
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="report_name" class="form-control" placeholder="Name">
                @if ($errors->has('report_name'))
                    <span class="text-danger">{{ $errors->first('report_name') }}</span>
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




