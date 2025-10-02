@extends('dashboard.layouts.master')

@php $pageTitle = 'Why Us Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif

            <div class="card shadow-sm border-0">

                {{-- Header --}}
                <div class="card-header bg-light border-0">
                    <div class="row align-items-center g-2">
                        <div class="col-lg-8 col-12">
                            <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
                        </div>
                        <div class="col-lg-4 col-12 text-lg-end">
                            <div class="btn-group">
                                <a class="btn btn-white btn-round shadow-sm px-4 mb-2" href="{{ route('why-us.create') }}">
                                    <i class="fas fa-plus me-2"></i> Add Field
                                </a>
                                <a class="btn btn-white btn-round shadow-sm px-4" href="{{ route('why-us.editImage') }}">
                                    <i class="fas fa-image me-2"></i> Edit Main Image
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Current image (preview) --}}
                <div class="px-3 pt-3 pb-1 border-bottom">
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <h6 class="text-muted mb-0">Current Image</h6>
                        @if (!empty($why?->image))
                            <img src="{{ asset('why-us/' . $why->image) }}" alt="Why Us Image"
                                class="rounded border shadow-sm whyus-thumb" data-bs-toggle="modal"
                                data-bs-target="#whyImageModal">
                            <a href="{{ route('why-us.editImage') }}" class="btn btn-outline-primary btn-sm">
                                Change Image
                            </a>

                            <!-- Image Modal -->
                            <div class="modal fade" id="whyImageModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><i class="fas fa-image me-2"></i> Image Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center p-0">
                                            <img src="{{ asset('why-us/' . $why->image) }}" class="img-fluid rounded"
                                                style="max-height:70vh; object-fit:contain;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <span class="text-muted">No image uploaded yet.</span>
                            <a href="{{ route('why-us.editImage') }}" class="btn btn-outline-primary btn-sm">
                                Upload Image
                            </a>
                        @endif
                    </div>
                </div>



                {{-- Table --}}
                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if ($fields->count())
                            <table class="table table-hover align-middle mb-0 fixed-table">
                                <colgroup>
                                    <col style="width:7%">
                                    <col style="width:36%">
                                    <col style="width:36%">
                                    <col style="width:21%">
                                </colgroup>

                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Field (AR)</th>
                                        <th class="text-center">Field (EN)</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($fields as $field)
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-success rounded-pill">{{ $field->id }}</span>
                                            </td>
                                            <td class="text-center text-dark fw-bold">{{ $field->field_ar }}</td>
                                            <td class="text-center text-dark fw-bold">{{ $field->field_en }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                    <a href="{{ route('why-us.edit', $field->id) }}"
                                                        class="btn btn-outline-primary btn-sm" title="Edit">
                                                        ✏️
                                                    </a>

                                                    <form action="{{ route('why-us.toggleStatus', $field->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        @if ($field->active === 'activated')
                                                            <button class="btn btn-outline-warning btn-sm"
                                                                onclick="return confirm('Deactivate this field?');"
                                                                title="Deactivate">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-outline-success btn-sm"
                                                                onclick="return confirm('Activate this field?');"
                                                                title="Activate">
                                                                <i class="fa-solid fa-eye-slash"></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                                        style="width:100px; height:100px;">
                                        <span style="font-size:3rem;">🧩</span>
                                    </div>
                                </div>
                                <h5 class="text-muted mb-2">No Fields Available</h5>
                                <a href="{{ route('why-us.create') }}" class="btn btn-primary btn-round shadow-sm px-4">
                                    <span class="me-2">+</span> Add Field
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .fixed-table {
            table-layout: fixed;
            width: 100%
        }

        .whyus-thumb {
            width: 160px;
            height: 100px;
            object-fit: cover;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .whyus-thumb:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .15)
        }
    </style>
@endsection