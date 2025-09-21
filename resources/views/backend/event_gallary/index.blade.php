@extends('backend.layouts.app')

@php $pageTitle = 'Event Gallery Control'; @endphp

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
                    <div class="col-md-8">
                        <h4 class="card-title ">{{ $pageTitle }} </h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a class="btn btn-white btn-round" href="{{ route('event-gallary', $eventDetail->id) }}">Add Event Image</a>
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
                        Image
                    </th>
                    <th class="text-right">
                      Control
                    </th>
                  </thead>
                  <tbody>
                  @foreach ($rows as $eventGallary)
                    <tr>
                        <td>
                          {{$eventGallary->id}}
                        </td>
                        <td>
                          <img src="{{ asset('eventGallary/' . $eventGallary->image) }}" width="100px" height="100px">
                        </td>
                      <td class="td-actions row justify-content-end no-gutters text-right">
                          <div class="col-lg-3 col-6">
                              
                            <a href="{{ route('event-gallary.edit', $eventGallary->id) }}">
                                <button title="" class="btn btn-success btn-sm" type="button" data-original-title="Edit Event Image" rel="tooltip">
                                <i class="material-icons">edit</i>
                                </button>
                            </a>
                          </div>
                          <div class="col-lg-3 col-6">
                              
                            <form action="{{ route('event-gallary.destroy', $eventGallary->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button title="" class="btn btn-danger btn-sm" type="submit" data-original-title="Remove Event Image" rel="tooltip" onclick="return confirm('Are you sure you want to delete this Image ?');">
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
                    <h3 class="text-center">No Event Images Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
@endsection


