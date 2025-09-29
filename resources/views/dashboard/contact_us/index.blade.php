@extends('dashboard.layouts.master')

@php $pageTitle = 'Contact Information Control'; @endphp

@section('title') {{ $pageTitle }} @endsection

@section('content')
<div class="row">
  <div class="col-md-12">

    @if(Session::has('flash_message'))
      <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif

    <div class="card shadow-sm border-0">
      <div class="card-header bg-light border-0">
        <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
      </div>

      <div class="card-body p-0">
        <div class="table-responsive">
          @if(!empty($contact))
            @php
              $phonesRaw = $contact->phones ?? [];
              if (is_string($phonesRaw)) {
                  $decoded = json_decode($phonesRaw, true);
                  $phones  = is_array($decoded) ? $decoded : array_map('trim', explode(',', $phonesRaw));
              } else {
                  $phones = (array) $phonesRaw;
              }
              $phones = array_filter(array_map('trim', $phones));
            @endphp

            <table class="table table-hover align-middle mb-0 fixed-table clean-head">
              <colgroup>
                <col style="width:22%">
                <col style="width:27%">
                <col style="width:27%">
                <col style="width:12%">
                <col style="width:12%">
              </colgroup>
              <thead class="table-light">
                <tr>
                  <th class="text-center">Email</th>
                  <th class="text-center">Address (AR)</th>
                  <th class="text-center">Address (EN)</th>
                  <th class="text-center">Phones</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  {{-- Email --}}
                  <td class="text-start">
                    @if(!empty($contact->email))
                      <div class="link-dark text-decoration-underline">{{ $contact->email }}</div>
                    @else
                      <span class="text-muted">—</span>
                    @endif
                  </td>

                  {{-- Address AR --}}
                  <td class="text-start">
                    <div class="pre-wrap" dir="rtl">{{ $contact->ar_address }}</div>
                  </td>

                  {{-- Address EN --}}
                  <td class="text-start">
                    <div class="pre-wrap" dir="ltr">{{ $contact->en_address }}</div>
                  </td>

                  {{-- Phones --}}
                  <td class="text-center">
                    @if(count($phones))
                      <div class="d-flex justify-content-center flex-wrap gap-1">
                        @foreach($phones as $ph)
                          <div  class="badge rounded-pill phone-badge">{{ $ph }}</div>
                        @endforeach
                      </div>
                    @else
                      <span class="text-muted">—</span>
                    @endif
                  </td>

                  {{-- Actions --}}
                  <td class="text-center">
                    <a href="{{ route('contact-us.edit') }}" class="btn btn-outline-primary btn-sm" title="Edit Contact Information">
                      ✏️
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          @else
            <div class="text-center py-5">
              <div class="mb-4">
                <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light" style="width:100px;height:100px;">
                  <span style="font-size:3rem;">📇</span>
                </div>
              </div>
              <h5 class="text-muted mb-3">No Contact Information Available</h5>
            </div>
          @endif
        </div>
      </div>
    </div>

  </div>
</div>

<style>
  
  .fixed-table{ table-layout: fixed; }
  .clean-head thead th, .clean-head thead td{ border-bottom:0 !important; }
  .clean-head tbody td{ border-top:1px solid #eee; }

  
  .pre-wrap{
    white-space: pre-wrap;
    word-wrap: break-word;
    overflow-wrap: anywhere;
    line-height: 1.6;
    min-height: 48px; 
    padding-block: 6px;
  }

  
  :root{
    
    --brand-50:#f5f0fa; --brand-200:#e4d7f1; --brand-600:#7e5fa6; --brand-700:#5d4a6b;
  }
  .phone-badge{
    background: var(--brand-50);
    border: 1px solid var(--brand-200);
    color: var(--brand-700);
    font-weight: 600;
    text-decoration: none;
    padding: .35rem .55rem;
  }
  .phone-badge:hover{
    background: var(--brand-200);
    color: #231f2b;
  }
</style>
@endsection
