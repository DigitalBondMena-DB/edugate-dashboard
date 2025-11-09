@extends('dashboard.layouts.master')

@section('title', 'Control - Dashboard')

@push('styles')
    <style>
        .control-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            height: 100%;
        }

        .control-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .stat-card {
            text-align: center;
            padding: 2rem 1.5rem;
        }

        .stat-icon-wrapper {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.25rem;
            position: relative;
            overflow: hidden;
        }

        .stat-icon-wrapper i {
            font-size: 2rem;
            color: white;
            position: relative;
            z-index: 1;
        }

        .icon-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .icon-success {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }

        .icon-warning {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .icon-info {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .stat-label {
            color: #6c757d;
            font-size: 1rem;
            font-weight: 500;
            margin: 0;
        }

        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2.5rem;
            border-radius: 16px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.25);
            color: white;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: white;
        }

        .page-subtitle {
            margin: 0;
            opacity: 0.95;
            font-size: 1.1rem;
        }

        .quick-actions-card {
            padding: 2rem;
        }

        .section-title {
            color: #2c3e50;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 32px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 4px;
        }

        .quick-link {
            display: flex;
            align-items: center;
            padding: 1.25rem 1.5rem;
            background: #fff;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            text-decoration: none;
            color: #495057;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .quick-link:hover {
            background: #f8f9fa;
            border-color: #667eea;
            color: #667eea;
            text-decoration: none;
            transform: translateX(5px);
        }

        .quick-link-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.25rem;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .quick-link:hover .quick-link-icon {
            transform: scale(1.1);
        }

        .icon-bg-1 {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
        }

        .icon-bg-2 {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
        }

        .icon-bg-3 {
            background: rgba(23, 162, 184, 0.1);
            color: #17a2b8;
        }

        .icon-bg-4 {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .icon-bg-5 {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        .icon-bg-6 {
            background: rgba(108, 117, 125, 0.1);
            color: #6c757d;
        }

        /* Dark Mode */
        .dark-mode .control-card {
            background: #1e293b;
            border-color: #334155;
        }

        .dark-mode .stat-number {
            color: #e2e8f0;
        }

        .dark-mode .stat-label {
            color: #94a3b8;
        }

        .dark-mode .section-title {
            color: #e2e8f0;
        }

        .dark-mode .quick-link {
            background: #1e293b;
            border-color: #334155;
            color: #cbd5e1;
        }

        .dark-mode .quick-link:hover {
            background: #334155;
            border-color: #667eea;
            color: #667eea;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                padding: 1.5rem;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .stat-number {
                font-size: 2rem;
            }

            .stat-icon-wrapper {
                width: 60px;
                height: 60px;
            }

            .stat-icon-wrapper i {
                font-size: 1.5rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-tachometer-alt me-2"></i>
            Control Dashboard
        </h1>
        <p class="page-subtitle">Managing all Edugate platform operations</p>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="control-card stat-card">
                <div class="stat-icon-wrapper icon-primary">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="stat-number">{{ $activeArticles }}</div>
                <p class="stat-label">Active Articles</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="control-card stat-card">
                <div class="stat-icon-wrapper icon-success">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="stat-number">{{ $learningSubCategories }}</div>
                <p class="stat-label">Learning Categories</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="control-card stat-card">
                <div class="stat-icon-wrapper icon-warning">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-number">{{ $unreadedMassages }}</div>
                <p class="stat-label">Unread Messages</p>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="control-card stat-card">
                <div class="stat-icon-wrapper icon-info">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-number">{{ $eventCategories }}</div>
                <p class="stat-label">Event Categories</p>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="control-card quick-actions-card">
                <h3 class="section-title">
                    Quick Actions
                </h3>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('event-categery.index') }}" class="quick-link">
                            <div class="quick-link-icon icon-bg-1">
                                <i class="fas fa-images"></i>
                            </div>
                            <span>Gallaries</span>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('newArticle.index') }}" class="quick-link">
                            <div class="quick-link-icon icon-bg-5">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                            <span>Articles (Ar)</span>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('feedback.index') }}" class="quick-link">
                            <div class="quick-link-icon icon-bg-4">
                                <i class="fas fa-comments"></i>
                            </div>
                            <span>Contact Us Messages</span>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('articleSubCategory.index') }}" class="quick-link">
                            <div class="quick-link-icon icon-bg-6">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <span>Article Sub Categories</span>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <a href={{ route('enBlog.index') }} class="quick-link">
                            <div class="quick-link-icon icon-bg-3">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                            <span>Articles (En)</span>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('study_abroad.index') }}" class="quick-link">
                            <div class="quick-link-icon icon-bg-2">
                                <i class="fa-solid fa-hand-point-up"></i>
                            </div>
                            <span>Study Abroad Requests</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
