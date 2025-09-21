@extends('backend.layouts.app')

@php $pageTitle = ' الصفحه الرئيسية'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')

    @if (auth()->user()->role === 'super-admin')
          <div class="row">
              <div class="col-md-12">
              @if(Session::has('flash_message'))
              <div class="alert alert-success">
                  {{ Session::get('flash_message') }}
              </div>
              @endif
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class=" text-primary">
                          <th>
                            #
                          </th>
                          <th>
                            First Section First Image
                          </th>
                          <th>
                            First SEction Second Image 
                          </th>
                          <th>
                            First Section Third Image
                          </th>
                          <th>
                            Last SEction Image 
                          </th>
                          <th>
                            Control
                          </th>
                        </thead>
                      
                        <tbody>
                          <tr>
                             <td>
                                 {{$main->id}}
                            </td>
                            <td>
                              <img src="{{ asset('mains/' . $main->first_section_first_image) }}" width="100px" height="100px">
                            </td>
                            <td>
                              <img src="{{ asset('mains/' . $main->first_section_second_image) }}" width="100px" height="100px">
                            </td>
                            <td>
                              <img src="{{ asset('mains/' . $main->first_section_third_image) }}" width="100px" height="100px">
                            </td> 
                            <td>
                              <img src="{{ asset('mains/' . $main->last_section_image) }}" width="100px" height="100px">
                            </td>  
                            
                            <td class="td-actions row justify-content-center py-5 no-gutters">
                              <div class="col-6">
                                  <a href="{{ route('mains.edit', $main->id) }}">
                                      <button title="" class="btn btn-icon rounded-circle btn-info" type="button" data-original-title="Edit main" rel="tooltip">
                                      <i class="material-icons">edit</i>
                                      </button>
                                  </a>
                              </div>
                                    
                          </td>
                          </tr>
                        </tbody>
                     
                      </table>
                      
                      
                    </div>
                  </div>
                </div>
              </div>
          </div>
    @endif

    @if (auth()->user()->role === 'admin')
        @if (auth()->user()->admin_status == 1) 
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
                          <div class="col-md-8 col-4">
                              <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                          </div>
                          <div class="col-md-4 col-8 text-right">
                            <a class="btn btn-white btn-round" href="{{ route('clients.create') }}">إضافة عميل</a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                   
                      <table class="table">
                        <thead class=" text-primary">
                              <th>
                                First Section First Image
                              </th>
                              <th>
                                First SEction Second Image 
                              </th>
                              <th>
                                First Section Third Image
                              </th>
                              <th>
                                Last SEction Image 
                              </th>
                              <th>
                                Control
                              </th>
                        </thead>
                      
                        <tbody>
                          <tr>
                              <td>
                                <img src="{{ asset('mains/' . $main->first_section_first_image) }}" width="100px" height="100px">
                              </td>
                              <td>
                                <img src="{{ asset('mains/' . $main->first_section_second_image) }}" width="100px" height="100px">
                              </td>
                              <td>
                                <img src="{{ asset('mains/' . $main->first_section_third_image) }}" width="100px" height="100px">
                              </td> 
                              <td>
                                <img src="{{ asset('mains/' . $main->last_section_image) }}" width="100px" height="100px">
                              </td>  
                            
                            <td class="td-actions row justify-content-center py-5 no-gutters">
                              <div class="col-6">
                                  <a href="{{ route('mains.edit', $main->id) }}">
                                      <button title="" class="btn btn-icon rounded-circle btn-info" type="button" data-original-title="Edit main" rel="tooltip">
                                      <i class="material-icons">edit</i>
                                      </button>
                                  </a>
                              </div>
                          </td>
                          </tr>
                      
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                </div>
              </div>
          </div>
        @else 
          <h3> Access Denied</h3>  
        @endif
    @endif
@endsection