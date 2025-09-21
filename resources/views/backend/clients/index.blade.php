@extends('backend.layouts.app')

@php $pageTitle = 'Partners Control'; @endphp

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
                          <div class="col-md-8 col-4">
                              <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                          </div>
                          <div class="col-md-4 col-8 text-right">
                            <a class="btn btn-white btn-round" href="{{ route('clients.create') }}">Add Partner</a>
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
                            Image 
                          </th>
                          <th>
                            Control
                          </th>
                        </thead>
                        <tbody>
                      @foreach($rows as $client)
                          <tr>
                          <td>
                          {{$client->id}}
                            </td>
                            <td>
                          {{$client->ar_name}}
                            </td>
                            <td>
                              <img src="{{ asset('clients/' . $client->logo) }}" width="100px" height="100px">
                            </td>  
                            
                            <td class="td-actions row justify-content-center py-5 no-gutters">
                              <div class="col-6">
                                  <a href="{{ route('clients.edit', $client->id) }}">
                                      <button title="" class="btn btn-icon  btn-success" type="button" data-original-title="Edit Client" rel="tooltip">
                                      <i class="material-icons">edit</i>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-6">
                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button title="" class="btn btn-icon btn-danger" type="submit" data-original-title="Remove Client" rel="tooltip" onclick="return confirm('Are you sure you want to delete this item?');">
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
                      <h3 class="text-center">No Clients Found</h3>
                  @endif
                    </div>
                  </div>
                </div>
              </div>
          </div>
  
@endsection