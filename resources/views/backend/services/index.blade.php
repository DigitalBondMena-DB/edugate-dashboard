@extends('backend.layouts.app')

@php $pageTitle = 'Feedbacks Control'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@push('css')
    <style>

    </style>
@endpush

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
                        <h4 class="card-title ">{{ $pageTitle }} </h4>
                    </div>
                    <div class="col-md-4 col-6 text-right">
                        <a class="btn btn-white btn-round" href="{{ route('service.create') }}">Add Feedback</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if(count($rows))
                <table class="table table-bordered table-striped">
                  <thead class=" text-primary">
                    <th>
                        ID
                    </th>
                    
                    <th>
                      Feedback Name In Arabic 
                    </th>
                    <th>
                      Feedback Image
                    </th>
                    <th class="text-right">
                      Control
                    </th>
                  </thead>
                  <tbody>
                  @foreach ($rows as $service)
                    <tr>
                        <td>
                        {{$service->id}}
                        </td>
                        <td>
                        {{$service->ar_name}}
                        </td>
                        <td>
                          <img src="{{ asset('service/' . $service->image) }}" width="100px" height="100px">
                        </td>
                        <td class="td-actions row no-gutters align-items-center justify-content-center">
                          <div class="col-6">
                              
                            <a href="{{ route('service.edit', $service->id) }}">
                                <button title="" class="btn btn-success btn-sm" type="button" data-original-title="Edit service" rel="tooltip">
                                <i class="material-icons">edit</i>
                                </button>
                            </a>
                              
                          </div>
                          <div class="col-6">
                              <form action="{{ route('service.destroy', $service->id) }}" method="POST">
                                  {{ csrf_field() }}
                                  {{ method_field('delete') }}
                                  <button title="" class="btn btn-danger btn-sm" type="submit" data-original-title="Delete service" rel="tooltip" onclick="return confirm('Are you sure you want to Delete this service?');">
                                    <i class="material-icons">close</i>
                                  </button>
                              </form>      
                          </div>
                     </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                {{ $rows->links() }} 
                    @else
                    <h3 class="text-center">No Feedback Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
@endsection


