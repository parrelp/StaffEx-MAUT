@extends('layouts.manager.app')

@section('content')
<div class="container ms-30">
    <div class="title mt-10 flex gap-4 items-center justify-between w-full">
        <div class="flex items-center gap-2">
            <i class="ti ti-list-details text-4xl"></i>
            <h1 class="text-2xl font-medium">Detail History - {{ $history->saved_at }}</h1>
        </div>
    </div>
    
    <div class="divider"></div>

    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="text-left">#</th>
                <th class="text-left">Nama Kandidat</th>
                <th class="text-left">Final Score</th>
                <th class="text-left">Rank</th>
            </tr>
        </thead>
        <tbody>
            @foreach($history->details->sortBy('rank') as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->candidate->name }}</td>
                    <td>{{ $detail->final_score }}</td>
                    <td>{{ $detail->rank }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
