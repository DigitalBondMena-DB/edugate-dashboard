@extends('dashboard.layouts.master')

@section('title', 'Control - Dashboard')

@push('styles')
<style>
    .control-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        border: 1px solid #e9ecef;
        transition: all 0.2s ease;
    }
    
    .control-card:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    
    .stat-number {
        font-size: 2rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 0;
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 1rem;
    }
    
    .icon-primary { background: #007bff; }
    .icon-success { background: #28a745; }
    .icon-warning { background: #ffc107; }
    .icon-info { background: #17a2b8; }
    
    .page-header {
        background: #fff;
        padding: 1.5rem;
        border-radius: 8px;
        margin-bottom: 2rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .page-title {
        color: #2c3e50;
        font-size: 1.75rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .page-subtitle {
        color: #6c757d;
        margin: 0;
    }
    
    .quick-link {
        display: block;
        padding: 1rem;
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 6px;
        text-decoration: none;
        color: #495057;
        margin-bottom: 0.75rem;
        transition: all 0.2s ease;
    }
    
    .quick-link:hover {
        background: #f8f9fa;
        border-color: #007bff;
        color: #007bff;
        text-decoration: none;
        transform: translateX(3px);
    }
    
    .quick-link i {
        margin-right: 0.75rem;
        width: 20px;
        text-align: center;
    }
    
    .section-title {
        color: #2c3e50;
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e9ecef;
    }
    
    .dark-mode .control-card,
    .dark-mode .page-header {
        background: var(--dark-card);
        border-color: var(--dark-border);
    }
    
    .dark-mode .quick-link {
        background: var(--dark-card);
        border-color: var(--dark-border);
        color: var(--text-light);
    }
    
    .dark-mode .quick-link:hover {
        background: var(--dark-hover);
        border-color: #007bff;
        color: #007bff;
    }
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Control Dashboard</h1>
    <p class="page-subtitle">Manage your website content and monitor system statistics</p>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="control-card p-3">
            <div class="stat-icon icon-primary">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="stat-number">{{ $activeArticles }}</div>
            <p class="stat-label">Active Articles</p>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="control-card p-3">
            <div class="stat-icon icon-success">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="stat-number">{{ $learningSubCategories }}</div>
            <p class="stat-label">Learning Categories</p>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="control-card p-3">
            <div class="stat-icon icon-warning">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="stat-number">{{ $unreadedMassages }}</div>
            <p class="stat-label">Unread Messages</p>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="control-card p-3">
            <div class="stat-icon icon-info">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-number">{{ $eventCategories }}</div>
            <p class="stat-label">Event Categories</p>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<form id="submit_form" class="logout-form" action="{{ url('/en/logout') }}" method="POST" style="" >
                                            @csrf
                                        <button class="btn btn-danger" type="submit" id="checkout" href="{{ url('/en/logout') }}">Log Out</button>
                                            
                                        </form>
<div class="row">
    <div class="col-12">
        <div class="control-card p-4">
            <h3 class="section-title">Quick Actions</h3>
            
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="/admin/event-categery" class="quick-link">
                        <i class="fas fa-calendar-alt"></i>
                        Event Categories
                    </a>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="/admin/about" class="quick-link">
                        <i class="fas fa-info-circle"></i>
                        Edit About Page
                    </a>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="/admin/clients" class="quick-link">
                        <i class="fas fa-handshake"></i>
                        Manage Partners
                    </a>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="/admin/feedback" class="quick-link">
                        <i class="fas fa-comments"></i>
                        User Contacts
                    </a>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="/admin/serviceuser" class="quick-link">
                        <i class="fas fa-cogs"></i>
                        Services
                    </a>
                </div>
                
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="/admin/articleSubCategory" class="quick-link">
                        <i class="fas fa-newspaper"></i>
                        Article Categories
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection