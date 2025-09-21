@extends('backend.layouts.app')

@php $pageTitle = 'Users Feedbacks Control'; @endphp

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
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    @if(count($rows))
                    <table class="table table-bordered table-striped">
                      <thead class=" text-primary">
                        <th>
                          #
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Email 
                        </th>
                        <th>
                          Phone 
                      </th>
                        <th>
                          Request Type 
                        </th>
                        <th>
                          Control
                        </th>
                      </thead>
                      <tbody>
                    @foreach($rows as $feedback)
                        <tr>
                        <td>
                        {{$feedback->id}}
                          </td>
                          <td>
                        {{$feedback->name}}
                          </td>
                          <td>
                            {{$feedback->email}}
                            </td>
                          <td>
                        {{$feedback->phone}}
                          </td>
                          <td>
                            {{$feedback->request_type}}
                            </td>  
                          <td class="td-actions row no-gutters justify-content-center">
                            <div class="col-6">
                              <a href="{{ route('user-contact.show', $feedback->id) }}">
                                <button title="" class="btn btn-icon btn-sm btn-success" type="button" data-original-title="Show Message" rel="tooltip">
                                <i class="material-icons" >zoom_in</i>
                                </button>
                              </a>
                            </div>
                          
                        </td>
                        </tr>
                    @endforeach
                      </tbody>
                    </table>    
                    {{ $rows->links() }} 
                    @else
                    <h3 class="text-center">No User Contacts Found</h3>
                @endif
                  </div>
                </div>
              </div>
            </div>
        </div>
   
@endsection