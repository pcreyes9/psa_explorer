@extends('template.master')
@section('title', 'PSA Explorer')

@section('content')
    <div class="row">
        <div class="col">
            @livewire('membership.mem-account', ['member_id' => $memberId]) <!-- This must exist -->
        </div>
    </div>
@endsection


