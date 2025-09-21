@extends('backend.layouts.app')

@php $pageTitle = 'About Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

@section('content')

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
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class=" text-primary ">
                        <th>
                          ID
                        </th>
                        <th>
                          Story
                        </th>
                        <th>
                          Story Image
                        </th>
                        <th>
                          Mission
                        </th>
                        <th>
                          Mission Image
                        </th>
                        <th class="text-right">
                          Control
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            {{$about->id}}
                          </td>
                          <td>
                            {{$about->ar_story}}
                          </td>
                          <td>
                            <img src="{{ asset('about/' . $about->story_image) }}" width="100px" height="100px">
                          </td>
                          <td>
                            {{$about->ar_mission}}
                          </td>
                          <td>
                            <img src="{{ asset('about/' . $about->mission_image) }}" width="100px" height="100px">
                          </td>
                          <td class="td-actions row no-gutters justify-content-center">
                            <div class="col-6">
                              <a href="{{ route('about.edit', $about->id) }}">
                                    <button title="" class="btn btn-icon  btn-success btn-sm" type="button" data-original-title="Edit About" rel="tooltip">
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
      @else
        <h3>Access Denied </h3>  
      @endif      
    @endif

    @if (auth()->user()->role === 'super-admin')
        <div class="row">
            <div class="col-md-12">
            @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
            @endif
              <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Story
                        </th>
                        <th>
                          Story Image
                        </th>
                        <th>
                          Mission
                        </th>
                        <th>
                          Mission Image
                        </th>
                        <th class="text-right">
                          Control
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            {{$about->id}}
                          </td>
                          <td>
                            {{$about->ar_story}}
                          </td>
                          <td>
                            <img src="{{ asset('about/' . $about->story_image) }}" width="100px" height="100px">
                          </td>
                          <td>
                            {{$about->ar_mission}}
                          </td>
                          <td>
                            <img src="{{ asset('about/' . $about->mission_image) }}" width="100px" height="100px">
                          </td>
                          <td class="td-actions row no-gutters justify-content-center">
                            <div class="col-6">
                              <a href="{{ route('about.edit', $about->id) }}">
                                    <button title="" class="btn btn-icon btn-success " type="button" data-original-title="Edit About" rel="tooltip" strly="margin-top: 100%;">
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
    @endif


@endsection


