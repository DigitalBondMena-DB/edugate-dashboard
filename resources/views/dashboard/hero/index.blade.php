@extends('dashboard.layouts.master')

@php $pageTitle = 'Hero Section Control'; @endphp

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
                        @if(!empty($hero))
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="text-center" style="width: 35%;">Title (AR)</th>
                                        <th scope="col" class="text-center" style="width: 35%;">Title (EN)</th>
                                        <th scope="col" class="text-center" style="width: 120px;">Image</th>
                                        <th scope="col" class="text-center" style="width: 120px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="text-center">
                                                    <div class="text-dark fw-bold">{{ $hero->title_ar }}</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="text-dark fw-bold">{{ $hero->title_en }}</div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    {{-- Image with Modal Trigger --}}
                                                    <div class="position-relative image-preview-container">
                                                        <img class="rounded border shadow-sm slider-thumbnail" 
                                                             style="width: 80px; height: 50px; object-fit: cover; cursor: pointer; transition: all 0.3s ease;"
                                                             src="{{ asset('hero/' . $hero->image) }}" 
                                                             alt="Hero Section Image"
                                                             data-bs-toggle="modal" 
                                                             data-bs-target="#imageModal{{$hero->id }}"
                                                             onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.2)';"
                                                             onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 2px 5px rgba(0,0,0,0.1)';">
                                                    </div>
                                                </div>

                                                {{-- Image Modal --}}
                                                <div class="modal fade" id="imageModal{{$hero->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $hero->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="imageModalLabel{{$hero->id }}">
                                                                    <i class="fas fa-image me-2"></i>Hero Section Preview
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center p-0">
                                                                <img src="{{ asset('hero/' . $hero->image) }}" 
                                                                     class="img-fluid rounded" 
                                                                     alt="Full Size Hero Section Image"
                                                                     style="max-height: 70vh; object-fit: contain;">
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <div class="text-muted small">
                                                                    <i class="fas fa-info-circle me-1"></i>
                                                                    Image: {{ $hero->image }}
                                                                </div>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                    <i class="fas fa-times me-1"></i>Close
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    {{-- Edit Button --}}
                                                    <a href="{{ route('hero.edit', $hero->id)}}" class="text-decoration-none">
                                                        <button class="btn btn-outline-primary btn-sm" 
                                                                title="Edit Hero Section" data-bs-toggle="tooltip">
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
                                <h5 class="text-muted mb-3">No Data For Hero Section</h5>
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