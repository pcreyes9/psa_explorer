@extends('template.master')
@section('title', 'Browse Payment Details')

@section('content')
    <div class="row">
        <div class="col">
            @livewire('payments.browse-payments') <!-- This must exist -->
        </div>
    </div>
@endsection


