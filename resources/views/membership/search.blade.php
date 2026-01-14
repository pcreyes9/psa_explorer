@extends('template.master')
@section('title', 'PSA Explorer')

@section('content')
  <div class="row">
      <div class="col">
          @livewire('membership.mem-search')
      </div>
  </div>
@endsection


