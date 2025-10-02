@extends('dashboard.layouts.master')

@php $pageTitle = 'Counters Control'; @endphp

@section('title')
  {{ $pageTitle }}
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">

    @if(Session::has('flash_message'))
      <div class="alert alert-success">
        {{ Session::get('flash_message') }}
      </div>
    @endif

    <div class="card shadow-sm border-0">
      {{-- Header --}}
      <div class="card-header bg-light border-0">
        <div class="row align-items-center">
          <div class="col-12">
            <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
          </div>
        </div>
      </div>

      {{-- Table --}}
      <div class="card-body p-0">
        <div class="table-responsive">
          @if(!empty($counters) && count($counters))
            <table class="table table-hover align-middle mb-0 fixed-table">
              <colgroup>
                <col style="width:38%">  {{-- Title (AR) --}}
                <col style="width:38%">  {{-- Title (EN) --}}
                <col style="width:14%">  {{-- Count --}}
                <col style="width:10%">  {{-- Actions --}}
              </colgroup>

              <thead class="table-light">
                <tr>
                  <th class="text-center">Title (AR)</th>
                  <th class="text-center">Title (EN)</th>
                  <th class="text-center">Count</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>

              <tbody>
              @foreach($counters as $counter)
                <tr>
                  <td class="text-center text-dark fw-bold">{{ $counter->title_ar }}</td>
                  <td class="text-center text-dark fw-bold">{{ $counter->title_en }}</td>
                  <td class="text-center text-dark fw-bold">{{ $counter->count }}</td>
                  <td class="text-center">
                    <div class="d-flex justify-content-center">
                      <a href="{{ route('counters.edit', $counter->id) }}" class="btn btn-outline-primary btn-sm" title="Edit">
                        ✏️
                      </a>
                    </div>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          @else
            <div class="text-center py-5">
              <div class="mb-4">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light" style="width:100px;height:100px;">
                  <span style="font-size:3rem;">🎯</span>
                </div>
              </div>
              <h5 class="text-muted mb-0">No Counters Available</h5>
            </div>
          @endif
        </div>
      </div>

    </div>
  </div>
</div>

<style>
  .fixed-table{ table-layout: fixed; width:100%; }
  .fixed-table th, .fixed-table td{ vertical-align: middle; }
</style>
@endsection