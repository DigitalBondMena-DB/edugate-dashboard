@extends('backend.layouts.app')

@php $pageTitle = 'علامات تحسين محرك البحث'; @endphp

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
                  <div class="card-header card-header-primary">
                      <div class="row align-items-center">
                          <div class="col-md-8 col-4">
                              <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                          </div>
                          <div class="col-md-4 col-8 text-right">
                            <a class="btn btn-white btn-round" href="{{ route('tags.create') }}"> علامات تحسين محرك البحث </a>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      @if(count($rows))
                      <table class="table table-striped table-bordered">
                        <thead class=" text-primary">
                          <th>
                            #
                          </th>
                          <th>
                            Title
                          </th>
                          <th>
                            Paragraph 
                          </th>
                          <th>
                            Tag Type 
                          </th>
                          <th>
                            Control
                          </th>
                        </thead>
                        <tbody>
                      @foreach($rows as $slider)
                          <tr>
                          <td>
                          {{$slider->id}}
                            </td>
                            <td>
                          {{$slider->ar_tag_title}}
                            </td>
                            <td>
                          {{$slider->ar_tag_paragraph}}
                            </td>
                            <td>
                          {{$slider->tag_type}}    
                            </td>  
                            
                            <td class="td-actions row no-gutters justify-content-center py-5">
                              <div class="col-6">
                                <a href="{{ route('tags.edit', $slider->id) }}">
                                      <button title="" class="btn btn-icon rounded-circle btn-info" type="button" data-original-title="Edit Slider" rel="tooltip">
                                      <i class="material-icons">edit</i>
                                      </button>
                                  </a>
                              </div>
                              <div class="col-6">
                                <form action="{{ route('tags.destroy', $slider->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button title="" class="btn btn-icon rounded-circle btn-danger" type="submit" data-original-title="Remove Slider" rel="tooltip" onclick="return confirm('هل انت متاكد من حذف هذا السجل؟ لا يمكن استرجاع هذا السجل بعد حذفه نهائيا');">
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
                      <h3 class="text-center">No tags Found</h3>
                  @endif
                    </div>
                  </div>
                </div>
              </div>
          </div>      
    @endif


@endsection