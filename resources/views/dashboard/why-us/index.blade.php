@extends('dashboard.layouts.master')

@php $pageTitle = 'Why Us Control'; @endphp

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
                            <div class="btn-group">
                                <a class="btn btn-white btn-round shadow-sm px-4" href="{{ route('why-us.create') }}">
                                    <i class="fas fa-plus me-2"></i>
                                    Add Field
                                </a>
                                <a class="btn btn-white btn-round shadow-sm px-4" href="{{ route('why-us.editImage') }}">
                                    <i class="fas fa-image me-2"></i>
                                    Edit Main Image
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    {{-- Current Image --}}
                    <div class="p-3 border-bottom">
                        <h6 class="text-muted mb-2">Current Image</h6>
                        <div class="d-flex align-items-center gap-3">
                            @if($why && $why->image)
                                <img
                                    src="{{ asset('why-us/'.$why->image) }}"
                                    alt="Why Us Image"
                                    class="rounded border shadow-sm"
                                    style="width: 160px; height: 100px; object-fit: cover; cursor:pointer"
                                    data-bs-toggle="modal" data-bs-target="#whyImageModal">
                                <a href="{{ route('why-us.editImage') }}" class="btn btn-outline-primary btn-sm">
                                    Change Image
                                </a>

                                {{-- Modal --}}
                                <div class="modal fade" id="whyImageModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <i class="fas fa-image me-2"></i>Image Preview
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center p-0">
                                                <img src="{{ asset('why-us/'.$why->image) }}" class="img-fluid rounded" style="max-height:70vh; object-fit:contain;">
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

                    {{-- Fields Table --}}
                    <div class="table-responsive">
                        @if($fields->count())
                            <table class="table table-striped table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" style="width:60px;">#</th>
                                        <th class="text-center" style="width:35%;">Field (AR)</th>
                                        <th class="text-center" style="width:35%;">Field (EN)</th>
                                        <th class="text-center" style="width:140px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fields as $field)
                                        <tr>
                                            <td class="text-center">
                                                <span class="badge bg-success rounded-pill">{{ $field->id }}</span>
                                            </td>
                                            <td><div class="text-center text-dark fw-bold">{{ $field->field_ar }}</div></td>
                                            <td><div class="text-center text-dark fw-bold">{{ $field->field_en }}</div></td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ route('why-us.edit', $field->id) }}" class="text-decoration-none">
                                                        <button class="btn btn-outline-primary btn-sm" title="Edit" data-bs-toggle="tooltip">
                                                            ✏️
                                                        </button>
                                                    </a>

                                                    <form action="{{ route('why-us.toggleStatus', $field->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        @if($field->active === 'activated')
                                                            <button class="btn btn-outline-warning btn-sm" type="submit"
                                                                title="Deactivate" data-bs-toggle="tooltip"
                                                                onclick="return confirm('Deactivate this field?');">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-outline-success btn-sm" type="submit"
                                                                title="Activate" data-bs-toggle="tooltip"
                                                                onclick="return confirm('Activate this field?');">
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
                                        style="width: 100px; height: 100px;">
                                        <span style="font-size: 3rem;">🧩</span>
                                    </div>
                                </div>
                                <h5 class="text-muted mb-3">No Fields Available</h5>
                                <p class="text-muted mb-4">Add Why Us fields from database/seeder then manage them here.</p>
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
@endsection
