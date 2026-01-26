@extends('template.master')
@section('title', 'CME Reports')

@section('content')
    <div class="row">
        <div class="col">
            @livewire('reports.cme-report') <!-- This must exist -->
        </div>
    </div>
@endsection


