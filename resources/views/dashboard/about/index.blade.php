@extends('dashboard.layouts.master')

@php $pageTitle = 'About Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if (Session::has('flash_message'))
                <div class="alert alert-success mb-3">{{ Session::get('flash_message') }}</div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-header bg-light border-0">
                    <h4 class="card-title text-dark mb-0">{{ $pageTitle }}</h4>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if (!empty($about))
                            <table class="table table-hover align-middle mb-0 clean-head fixed-cols">
                                <colgroup>
                                    <col style="width:30%">
                                    <col style="width:30%">
                                    <col style="width:22%">
                                    <col style="width:18%">
                                </colgroup>

                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">Story (AR)</th>
                                        <th class="text-center">Story (EN)</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>

                                        <td class="text-center">
                                                {{ strlen($about->ar_story) > 100 ?  substr($about->ar_story, 0, 100) . '...' : $about->ar_story }}
                                        </td>


                                        <td class="text-center">
                                            <div class="story-full">
                                                {{ strlen($about->en_story) > 100 ? substr($about->en_story, 0, 100) . '...' : $about->en_story }}
                                            </div>
                                        </td>


                                        <td class="text-center">
                                            <img src="{{ asset('about/' . $about->image) }}" alt="About Image"
                                                class="rounded border shadow-sm slider-thumbnail"
                                                style="width:92px;height:58px;object-fit:cover;cursor:pointer"
                                                data-bs-toggle="modal"
                                                data-bs-target="#imageModal{{ $about->id ?? 'about' }}" />

                                            <div class="modal fade" id="imageModal{{ $about->id ?? 'about' }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><i class="fas fa-image me-2"></i> About
                                                                Image</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center p-0">
                                                            <img src="{{ asset('about/' . $about->image) }}"
                                                                class="img-fluid rounded"
                                                                style="max-height:70vh;object-fit:contain"
                                                                alt="About Image Full">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <span class="text-muted small">Image: {{ $about->image }}</span>
                                                            <button class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>


                                        <td class="text-center">
                                            <a href="{{ route('about.edit') }}" class="btn btn-outline-primary btn-sm"
                                                title="Edit About">
                                                ✏️ Edit
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="text-center py-5">
                                <div class="mb-3">
                                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-light"
                                        style="width:100px;height:100px;">
                                        <span style="font-size:3rem;">ℹ️</span>
                                    </div>
                                </div>
                                <h5 class="text-muted mb-0">No About Available</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .table.fixed-cols {
            table-layout: fixed;
        }


        .table.clean-head thead th,
        .table.clean-head thead td {
            border-bottom: 0 !important;
        }

        .table.clean-head tbody td {
            border-top: 1px solid #eee;
        }

        .slider-thumbnail {
            transition: all .25s ease-in-out;
        }

        .slider-thumbnail:hover {
            transform: scale(1.06);
            box-shadow: 0 6px 16px rgba(0, 0, 0, .22);
        }


        thead th {
            text-align: center;
        }
    </style>
@endsection
