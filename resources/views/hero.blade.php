@extends('dashboard.layouts.master')

@section('title', 'البحث الذكي عن الجامعات')

@push('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .smart-search-card {
            background: #fff;
            border-radius: 18px;
            padding: 2rem;
            box-shadow: 0 15px 60px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(15, 23, 42, 0.05);
        }

        .smart-search-header h2 {
            font-weight: 700;
            margin-bottom: .5rem;
            color: #1f2937;
        }

        .smart-search-header p {
            margin: 0;
            color: #6b7280;
        }

        .smart-dropdown {
            position: relative;
        }

        .smart-dropdown[data-disabled='true'] {
            opacity: .45;
            pointer-events: none;
        }

        .smart-dropdown__trigger {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 0.9rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            background: #f9fafb;
            font-weight: 600;
            color: #1f2937;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .smart-dropdown__trigger:hover {
            border-color: #818cf8;
            box-shadow: 0 8px 26px rgba(129, 140, 248, 0.25);
        }

        .smart-dropdown__panel {
            position: absolute;
            top: calc(100% + 10px);
            left: 0;
            right: 0;
            z-index: 20;
            background: #fff;
            border-radius: 16px;
            border: 1px solid rgba(15, 23, 42, 0.08);
            box-shadow: 0 25px 80px rgba(15, 23, 42, 0.15);
            padding: 0.75rem;
            display: none;
        }

        .smart-dropdown.open .smart-dropdown__panel {
            display: block;
        }

        .smart-dropdown__search input {
            border-radius: 12px;
        }

        .smart-dropdown__list {
            max-height: 260px;
            overflow-y: auto;
            margin-top: .75rem;
        }

        .smart-dropdown__item {
            width: 100%;
            border: none;
            background: transparent;
            text-align: left;
            padding: .65rem .85rem;
            border-radius: 12px;
            font-weight: 500;
            color: #1f2937;
            transition: background .15s ease;
        }

        .smart-dropdown__item:hover,
        .smart-dropdown__item.is-active {
            background: rgba(99, 102, 241, 0.08);
            color: #3730a3;
        }

        .smart-status {
            min-height: 28px;
            font-weight: 600;
            color: #6b7280;
        }

        [data-requires-faculty] {
            display: none;
        }

        [data-requires-faculty].is-visible {
            display: block;
        }

        @media (max-width: 991px) {
            .smart-dropdown__panel {
                position: relative;
            }
        }
    </style>
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="smart-search-card" data-flexible-search data-endpoint="{{ route('search.flexible') }}">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 smart-search-header mb-4">
                    <div>
                        <h2>البحث الذكي عن الجامعات</h2>
                        <p>اختر المكان أو الجامعة أو الكلية وسيتم جلب باقي القوائم تلقائياً.</p>
                    </div>
                    <div class="smart-status text-end" data-search-status>⏳ جاهز لبدء البحث.</div>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="smart-dropdown" data-dropdown="destination" data-placeholder="اختر الوجهة">
                            <label class="form-label fw-bold mb-2">الوجهة</label>
                            <button type="button" class="smart-dropdown__trigger" data-dropdown-trigger>
                                <span data-dropdown-label>اختر الوجهة</span>
                                <i class="ph ph-caret-down"></i>
                            </button>
                            <div class="smart-dropdown__panel" data-dropdown-panel>
                                <div class="smart-dropdown__search">
                                    <input type="text" class="form-control" placeholder="ابحث داخل الوجهات"
                                        data-dropdown-search>
                                </div>
                                <div class="smart-dropdown__list" data-dropdown-list>
                                    <div class="text-muted small px-2">لا توجد بيانات بعد</div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="destination_id" data-selected="destination">
                    </div>

                    <div class="col-md-4">
                        <div class="smart-dropdown" data-dropdown="university" data-placeholder="اختر الجامعة">
                            <label class="form-label fw-bold mb-2">الجامعة</label>
                            <button type="button" class="smart-dropdown__trigger" data-dropdown-trigger>
                                <span data-dropdown-label>اختر الجامعة</span>
                                <i class="ph ph-caret-down"></i>
                            </button>
                            <div class="smart-dropdown__panel" data-dropdown-panel>
                                <div class="smart-dropdown__search">
                                    <input type="text" class="form-control" placeholder="ابحث داخل الجامعات"
                                        data-dropdown-search>
                                </div>
                                <div class="smart-dropdown__list" data-dropdown-list>
                                    <div class="text-muted small px-2">لا توجد بيانات بعد</div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="university_id" data-selected="university">
                    </div>

                    <div class="col-md-4">
                        <div class="smart-dropdown" data-dropdown="faculty" data-placeholder="اختر الكلية">
                            <label class="form-label fw-bold mb-2">الكلية</label>
                            <button type="button" class="smart-dropdown__trigger" data-dropdown-trigger>
                                <span data-dropdown-label>اختر الكلية</span>
                                <i class="ph ph-caret-down"></i>
                            </button>
                            <div class="smart-dropdown__panel" data-dropdown-panel>
                                <div class="smart-dropdown__search">
                                    <input type="text" class="form-control" placeholder="ابحث داخل الكليات"
                                        data-dropdown-search>
                                </div>
                                <div class="smart-dropdown__list" data-dropdown-list>
                                    <div class="text-muted small px-2">لا توجد بيانات بعد</div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="faculty_id" data-selected="faculty">
                    </div>

                    <div class="col-md-6" data-requires-faculty>
                        <div class="smart-dropdown" data-dropdown="department" data-placeholder="اختر القسم">
                            <label class="form-label fw-bold mb-2">القسم</label>
                            <button type="button" class="smart-dropdown__trigger" data-dropdown-trigger>
                                <span data-dropdown-label>اختر القسم</span>
                                <i class="ph ph-caret-down"></i>
                            </button>
                            <div class="smart-dropdown__panel" data-dropdown-panel>
                                <div class="smart-dropdown__search">
                                    <input type="text" class="form-control" placeholder="ابحث داخل الأقسام"
                                        data-dropdown-search>
                                </div>
                                <div class="smart-dropdown__list" data-dropdown-list>
                                    <div class="text-muted small px-2">قم باختيار كلية أولاً</div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="department_id" data-selected="department">
                    </div>

                    <div class="col-md-6" data-requires-faculty>
                        <div class="smart-dropdown" data-dropdown="specialization" data-placeholder="اختر التخصص">
                            <label class="form-label fw-bold mb-2">التخصص</label>
                            <button type="button" class="smart-dropdown__trigger" data-dropdown-trigger>
                                <span data-dropdown-label>اختر التخصص</span>
                                <i class="ph ph-caret-down"></i>
                            </button>
                            <div class="smart-dropdown__panel" data-dropdown-panel>
                                <div class="smart-dropdown__search">
                                    <input type="text" class="form-control" placeholder="ابحث داخل التخصصات"
                                        data-dropdown-search>
                                </div>
                                <div class="smart-dropdown__list" data-dropdown-list>
                                    <div class="text-muted small px-2">قم باختيار قسم أولاً</div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="specialization_id" data-selected="specialization">
                    </div>

                    <div class="col-12 d-flex justify-content-end align-items-center pt-2">
                        <button type="button" class="btn btn-success px-4 d-flex align-items-center gap-2" data-search-submit>
                            <span>بحث</span>
                            <span aria-hidden="true">🔍</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_js')
    <script src="{{ asset('js/search.js') }}"></script>
@endpush
