@extends('backend.layouts.app')

@php $pageTitle = 'Contact Information Control'; @endphp

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
                    
                      <table class="table table-bordered table-striped">
                        <thead class=" text-primary">
                          <th>
                            ID
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Address
                          </th>
                          <th>
                            Phone
                          </th>
                          <th>
                            Control
                          </th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              {{$contact->id}}
                            </td>
                            <td>
                              {{$contact->email}}
                            </td>
                            <td>
                              {{$contact->ar_address}}
                            </td>
                            <td>
                              {{$contact->phone}}
                            </td>
                            
                            <td class="td-actions row no-gutters justify-content-center py-5">
                              <div class="col-6">
                                <a href="{{ route('contact-us.edit', $contact->id) }}">
                                      <button title="" class="btn btn-icon  btn-success" type="button" data-original-title="Edit Contact Us" rel="tooltip">
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


 
        

  
@endsection