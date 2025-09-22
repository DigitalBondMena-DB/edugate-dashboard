@extends('dashboard.layouts.master')

@php $pageTitle = 'Contact Information Control'; @endphp

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
            
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-6">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h4 class="card-title text-dark mb-1">{{ $pageTitle }}</h4>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if(!empty($contact))
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="text-center" style="width: 35%;">Email</th>
                                        <th scope="col" class="text-center" style="width: 35%;">Address (AR)</th>
                                        <th scope="col" class="text-center" style="width: 35%;">Address (EN)</th>
                                        <th scope="col" class="text-center" style="width: 35%;">Phones</th>
                                        <th scope="col" class="text-center" style="width: 120px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="text-center">
                                                    <div class="text-dark fw-bold">{{ $contact->email}}</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="text-dark fw-bold">{{ $contact->ar_address }}</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="text-dark fw-bold">{{ $contact->en_address }}</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    @if(!empty($contact->phones))
                                                    @foreach($contact->phones as $phone)
                                                        <div class="text-dark fw-bold">{{ $phone }}</div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </td>
                                            
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    {{-- Edit Button --}}
                                                    <a href="{{ route('contact-us.edit')}}" class="text-decoration-none">
                                                        <button class="btn btn-outline-primary btn-sm" 
                                                                title="Edit Contact Information" data-bs-toggle="tooltip">
                                                            <span style="font-size: 14px;">✏️</span>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        
                        @else
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light" 
                                         style="width: 100px; height: 100px;">
                                        <span style="font-size: 3rem;">🎨</span>
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
        .slider-thumbnail {
            transition: all 0.3s ease !important;
        }
        
        .slider-thumbnail:hover {
            transform: scale(1.05) !important;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2) !important;
        }
        
        .image-preview-container {
            position: relative;
            display: inline-block;
        }
    </style>
@endsection