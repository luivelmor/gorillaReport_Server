@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12 py-3">
            <h1>Report List</h1>
        </div>
        <div class="col-md-12">
            <form method="GET">
            <div class="col align-items-end d-flex flex-column mb-3">
                <div class="d-flex flex-column ">
                    <label for="filter" class="form-label">Filter</label>
                    <input type="text" class="form-control" id="filter" name="filter" placeholder="Client name..." value="{{ $filter ?? '' }}">
                    <span id="passwordHelpInline" class="form-text">
                            Type the whole or part of the name and press enter.
                    </span>
                    
                </div>
            </div>
                <!-- <button type="submit" class="btn btn-default mb-2">Filter</button> -->
            </form>
        </div>
        
        <div class="col-md-12 table-responsive"> 
            <table class="table table-dark table-hover table-bordered  align-middle">
                <thead>
                    <tr class="table-light">
                        <!-- <th class="col-1">ID</th> -->
                        <th class="py-3" >@sortablelink('updated_at')</th>
                        <th class="py-3" >@sortablelink('client.name')</th>
                        <th class="py-3">@sortablelink('managed_install')</th>
                        <th class="py-3">@sortablelink('managed_uninstall')</th>
                        <th class="py-3">@sortablelink('managed_update')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                    <tr>
                        <td class="py-3">{{$report->updated_at}}</td>
                        <td class="py-3"><a href="{{ route('clients.show',$report->client->id) }}"> {{$report->client->name}} </a></td>
                        <td class="py-3">
                            @foreach(json_decode($report->managed_install, true) as $key => $value)
                                <span><b>{{$key}}:</b></span><br />
                                @foreach($value as $key2 => $value2)
                                    <span><i>{{$key2}}: {{ var_dump($value2) }}</i></span>
                                @endforeach
                                <br />
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
@endsection    