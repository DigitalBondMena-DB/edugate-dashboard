@extends('dashboard.layouts.master')

@php $pageTitle = 'Sub Categories Control'; @endphp

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
                            <a class="btn btn-white btn-round shadow-sm px-4" href="{{ route('articleSubCategory.create') }}">
                                <i class="fas fa-plus me-2"></i>
                                Add New Sub Category
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-0">
                        <div class="p-3 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="0">All</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == (request()->category_id ?? null) ? 'selected' : '' }}>{{ $category->ar_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    <div class="table-responsive">
                        @if(count($rows))
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="text-center" style="width: 60px;">#</th>
                                        <th scope="col" class="text-center" style="width: 35%;">Title (AR)</th>
                                        <th scope="col" class="text-center" style="width: 35%;">Title (EN)</th>
                                        <th scope="col" class="text-center" style="width: 120px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $subCategory)
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-success rounded-pill">{{ $subCategory->id }}</span>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="text-dark fw-bold">{{ $subCategory->ar_title }}</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="text-dark fw-bold">{{ $subCategory->en_title }}</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    {{-- Edit Button --}}
                                                    <a href="{{ route('articleSubCategory.edit', $subCategory->id) }}" class="text-decoration-none">
                                                        <button class="btn btn-outline-primary btn-sm" 
                                                                title="Edit Sub Category" data-bs-toggle="tooltip">
                                                            <span style="font-size: 14px;">✏️</span>
                                                        </button>
                                                    </a>
                                                    
                                                    {{-- Toggle Status Button --}}
                                                    @if($subCategory->active === 'activated')
                                                        <form action="{{ route('articleSubCategory.toggleStatus', $subCategory->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button class="btn btn-outline-warning btn-sm" type="submit"
                                                                    title="Deactivate Sub Category" data-bs-toggle="tooltip"
                                                                    onclick="return confirm('Are you sure you want to deactivate this sub category?');">
                                                                <span style="font-size: 14px;"><i class="fa-solid fa-eye"></i></span>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('articleSubCategory.toggleStatus', $subCategory->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button class="btn btn-outline-success btn-sm" type="submit"
                                                                    title="Activate Sub Category" data-bs-toggle="tooltip"
                                                                    onclick="return confirm('Are you sure you want to activate this sub category?');">
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
                                    {{ $rows->appends(request()->query())->links('pagination::custom-bootstrap4') }}
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
                                <h5 class="text-muted mb-3">No Sub Categories Available</h5>
                                <p class="text-muted mb-4">Start creating beautiful sliders for your website</p>
                                <a href="{{ route('articleSubCategory.create') }}" class="btn btn-primary btn-round shadow-sm px-4">
                                    <span class="me-2" style="font-weight: bold;">+</span>
                                    Create First Sub Category
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
    @push('page_js')
    <script>
        $(document).ready(function() {
            $('#category_id').on('change', function() {
                var selectedCategoryId = this.value;
                if (selectedCategoryId === '0') {
                    window.location.href = '{{ route('articleSubCategory.index') }}';
                } else {
                    window.location.href = '{{ route('articleSubCategory.index') }}?category_id=' + selectedCategoryId;
                }
            });
        });
    </script>
    @endpush
@endsection