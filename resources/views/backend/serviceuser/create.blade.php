@extends('backend.layouts.app')

@php $pageTitle = 'Add Service'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/froala_editor.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/froala_style.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/plugins/code_view.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/plugins/colors.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/plugins/emoticons.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/plugins/image_manager.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/plugins/image.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/plugins/line_breaker.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/plugins/table.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/plugins/char_counter.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/plugins/video.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/plugins/fullscreen.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/plugins/file.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/froala_editor/css/plugins/quick_insert.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
  
  <style>
      div#editor {
      width: 81%;
      margin: auto;
      text-align: left;
    }
  </style>
    
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('serviceuser.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Service Name In Arabic</label>
                                        <input type="text" name="ar_name" id="ar_name" class="form-control" value="{{ old('ar_name') }}">
                                    </div>
                                    @if($errors->has('ar_name'))
                                        <span class="text-danger">{{ $errors->first('ar_name') }}</span>
                                    @endif
                                </div>
                               

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Service Title In Arabic</label>
                                        <input type="text" name="ar_title" id="ar_title" class="form-control" value="{{ old('ar_title') }}">
                                    </div>
                                    @if($errors->has('ar_title'))
                                        <span class="text-danger">{{ $errors->first('ar_title') }}</span>
                                    @endif
                                </div>
                                


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Service First Text in Arabic</label>
                                        <textarea rows="10" cols="10" name="ar_first_text" id="edit" class="form-control">{{ old('ar_first_text') }}</textarea>
                                    </div>
                                    @if($errors->has('ar_first_text'))
                                        <span class="text-danger">{{ $errors->first('ar_first_text') }}</span>
                                    @endif
                                </div>

                               

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Service Second Text in Arabic</label>
                                        <textarea rows="10" cols="10" name="ar_second_text" id="edit" class="form-control">{{ old('ar_second_text') }}</textarea>
                                    </div>
                                    @if($errors->has('ar_second_text'))
                                        <span class="text-danger">{{ $errors->first('ar_second_text') }}</span>
                                    @endif
                                </div>
                                
                                

                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Service Image</label>
                                        <input type="file" name="image">
                                    </div>
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Add Service</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
            
            
            <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/froala_editor.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/align.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/char_counter.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/code_beautifier.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/code_view.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/colors.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/draggable.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/emoticons.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/entities.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/file.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/font_size.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/font_family.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/fullscreen.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/image.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/image_manager.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/line_breaker.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/inline_style.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/link.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/lists.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/paragraph_format.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/paragraph_style.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/quick_insert.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/quote.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/table.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/save.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/url.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/froala_editor/js/plugins/video.min.js')}}"></script>

  <script>
    (function () {
      const editorInstance = new FroalaEditor('#edit', {
        events: {
          'image.beforeUpload': function (files) {
            const editor = this
            if (files.length) {
              var reader = new FileReader()
              reader.onload = function (e) {
                var result = e.target.result
                editor.image.insert(result, null, null, editor.image.get())
              }
              reader.readAsDataURL(files[0])
            }
            return false
          }
        }
      })
    })()
  </script>
            
            
@endsection