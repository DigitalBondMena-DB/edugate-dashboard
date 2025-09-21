@extends('dashboard.layouts.master')

@php $pageTitle = 'Sliders Control'; @endphp

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
                        <div class="col-md-4 col-6 text-end">
                            <a class="btn btn-white btn-round shadow-sm px-4" href="{{ route('sliders.create') }}">
                                <i class="fas fa-plus me-2"></i>
                                Add New Slider
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if(count($rows))
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="text-center" style="width: 60px;">#</th>
                                        <th scope="col" class="text-center" style="width: 35%;">Title (AR)</th>
                                        <th scope="col" class="text-center" style="width: 35%;">Title (EN)</th>
                                        <th scope="col" class="text-center" style="width: 120px;">Image</th>
                                        <th scope="col" class="text-center" style="width: 120px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $slider)
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-success rounded-pill">{{ $slider->id }}</span>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="text-dark fw-bold">{{ $slider->ar_title }}</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="text-dark fw-bold">{{ $slider->en_title }}</div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    {{-- Image with Modal Trigger --}}
                                                    <div class="position-relative image-preview-container">
                                                        <img class="rounded border shadow-sm slider-thumbnail" 
                                                             style="width: 80px; height: 50px; object-fit: cover; cursor: pointer; transition: all 0.3s ease;"
                                                             src="{{ asset('sliders/' . $slider->image) }}" 
                                                             alt="Slider Image"
                                                             data-bs-toggle="modal" 
                                                             data-bs-target="#imageModal{{ $slider->id }}"
                                                             onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.2)';"
                                                             onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 2px 5px rgba(0,0,0,0.1)';">
                                                    </div>
                                                </div>

                                                {{-- Image Modal --}}
                                                <div class="modal fade" id="imageModal{{ $slider->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $slider->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="imageModalLabel{{ $slider->id }}">
                                                                    <i class="fas fa-image me-2"></i>Slider Preview
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center p-0">
                                                                <img src="{{ asset('sliders/' . $slider->image) }}" 
                                                                     class="img-fluid rounded" 
                                                                     alt="Full Size Slider Image"
                                                                     style="max-height: 70vh; object-fit: contain;">
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <div class="text-muted small">
                                                                    <i class="fas fa-info-circle me-1"></i>
                                                                    Image: {{ $slider->image }}
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
                                                    <a href="{{ route('sliders.edit', $slider->id) }}" class="text-decoration-none">
                                                        <button class="btn btn-outline-primary btn-sm" 
                                                                title="Edit Slider" data-bs-toggle="tooltip">
                                                            <span style="font-size: 14px;">✏️</span>
                                                        </button>
                                                    </a>
                                                    
                                                    {{-- Toggle Status Button --}}
                                                    @if($slider->active === 'activated')
                                                        <form action="{{ route('sliders.toggleStatus', $slider->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button class="btn btn-outline-warning btn-sm" type="submit"
                                                                    title="Deactivate Slider" data-bs-toggle="tooltip"
                                                                    onclick="return confirm('Are you sure you want to deactivate this slider?');">
                                                                <span style="font-size: 14px;"><i class="fa-solid fa-eye"></i></span>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('sliders.toggleStatus', $slider->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button class="btn btn-outline-success btn-sm" type="submit"
                                                                    title="Activate Slider" data-bs-toggle="tooltip"
                                                                    onclick="return confirm('Are you sure you want to activate this slider?');">
                                                                <span style="font-size: 14px;"><i class="fa-solid fa-eye-slash"></i></span>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <div class="px-3 py-3 border-top mt-2">
                                <div class="d-flex justify-content-center">
                                    {{ $rows->links('pagination::custom-bootstrap4') }}
                                </div>
                            </div>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light" 
                                         style="width: 100px; height: 100px;">
                                        <span style="font-size: 3rem;">🎨</span>
                                    </div>
                                </div>
                                <h5 class="text-muted mb-3">No Sliders Available</h5>
                                <p class="text-muted mb-4">Start creating beautiful sliders for your website</p>
                                <a href="{{ route('sliders.create') }}" class="btn btn-primary btn-round shadow-sm px-4">
                                    <span class="me-2" style="font-weight: bold;">+</span>
                                    Create First Slider
                                </a>
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