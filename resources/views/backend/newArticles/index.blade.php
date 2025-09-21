@extends('backend.layouts.app')

@php $pageTitle = 'News Article Control'; @endphp

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
                        <a class="btn btn-white btn-round" href="{{ route('newArticle.create') }}">Add Article</a>
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
                      Article Title In Arabic 
                    </th>
                    <th>
                      Article Image
                    </th>
                    <th>
                      Article  Slug
                    </th>
                    <th>
                        Status
                    </th>
                    <th class="text-right">
                      Control
                    </th>
                  </thead>
                  <tbody>
                  @foreach ($rows as $newArticle)
                    <tr>
                        <td>
                        {{$newArticle->id}}
                        </td>
                        <td>
                        {{$newArticle->ar_title}}
                        </td>
                       
                        <td>
                          <img src="{{ asset('../newArticle/' . $newArticle->main_image) }}" width="100px" height="100px">
                        </td>
                         <td>
                        {{$newArticle->schedule_date}}
                        </td>
                        <td>
                            @if($newArticle->status == 1)
                                Active
                            @else 
                                Not Active
                            @endif
                        </td>
                        <td class="td-actions row no-gutters align-items-center justify-content-center" style="border-bottom: none;">
                          <div class="col-6">
                              
                            <a href="{{ route('newArticle.edit', $newArticle->id) }}">
                                <button title="" class="btn btn-info btn-lg" type="button" data-original-title="Edit Article" rel="tooltip">
                                <i class="material-icons">edit</i>
                                </button>
                            </a>
                              
                          </div>
                          <div class="col-6">
                              @if($newArticle->status == 1)
                              <form action="{{ route('newArticle.destroy', $newArticle->id) }}" method="POST">
                                  {{ csrf_field() }}
                                  {{ method_field('delete') }}
                                  <button title="" class="btn btn-danger btn-lg" type="submit" data-original-title="Delete Article" rel="tooltip" onclick="return confirm('Are you sure you want to Delete this Article?');">
                                    <i class="material-icons">close</i>
                                  </button>
                              </form>
                              @else 
                              <form action="{{ route('newArticle-recover', $newArticle->id) }}" method="POST">
                                  @csrf
                                  <button title="" class="btn btn-success btn-lg" type="submit" data-original-title="Delete Article" rel="tooltip" onclick="return confirm('Are you sure you want to Recover this Article?');">
                                    <i class="material-icons">check</i>
                                  </button>
                              </form>
                              @endif
                          </div>
                     </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                
                    @else
                    <h3 class="text-center">No Articles Found</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
@endsection


