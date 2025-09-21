@extends('backend.layouts.app')

@php $pageTitle = 'Edit Article'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')
<style>
    body {font-family: Arial, Helvetica, sans-serif;}
    
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 9999; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    
    
    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    table td {
      border-bottom: none !important;
      display: table-cell !important; 
    }
    
    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
</style>  


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="row">
                                <div class="col-md-8 col-6">
                                    <h4 class="card-title ">{{ $pageTitle }} </h4>
                                </div>
                                <div class="col-md-4 col-6 text-right">
                                    <a class="btn btn-white btn-round">
                                        <button id="myBtn" class="btn btn-primary pull-right" style="color:#2C6DE9 !important;background-color:#fff !important">Open Modal</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <div class="card-body">
                        <form action="{{ route('newArticle.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Title in arabic</label>
                                        <input type="text" name="ar_title" id="my-text" class="form-control" value="{{ $row->ar_title }}" required>
                                        <p id="count-result">Total characters: 0</p>
                                    </div>
                                    @if($errors->has('ar_title'))
                                        <span class="text-danger">{{ $errors->first('ar_title') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Slug in arabic</label>
                                        <input type="text" name="" id="ar_title" class="form-control" value="{{ $row->ar_slug }}" readonly>
                                    </div>
                                    @if($errors->has('ar_title'))
                                        <span class="text-danger">{{ $errors->first('ar_title') }}</span>
                                    @endif
                                </div>

                                

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Text in arabic</label>
                                        <textarea type="text" name="ar_text" id="ar_text" class="form-control ckeditor" value="{{ $row->ar_text }}" required>{{ $row->ar_text }}</textarea>
                                    </div>
                                    @if($errors->has('ar_text'))
                                        <span class="text-danger">{{ $errors->first('ar_text') }}</span>
                                    @endif
                                </div>


                                
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Choose Category</label>
                                        <select name="new_article_sub_catrgory_id" class="form-control" required>
                                            <option value="">Select a Category</option>
                                            @foreach($categoreies as $category)
                                                <option value="{{ $category->id }}" {{ $row->new_article_sub_catrgory_id == $category->id ? 'selected' : null }}>{{ $category->ar_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('ar_title'))
                                        <span class="text-danger">{{ $errors->first('ar_title') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Choose Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="">Select a Category</option>
                                            
                                                <option value="1" {{ $row->status == 1 ? 'selected' : null }}>Active</option>
                                                <option value="0" {{ $row->status == 0 ? 'selected' : null }}>Not Active</option>
                                        </select>
                                    </div>
                                    @if($errors->has('ar_title'))
                                        <span class="text-danger">{{ $errors->first('ar_title') }}</span>
                                    @endif
                                </div>
                                
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tag Title in arabic</label>
                                        <input type="text" name="ar_tag_title" id="my-text2" class="form-control" value="{{ $row->ar_tag_title }}" required>
                                        <p id="count-result2">Total characters: 0</p>
                                    </div>
                                    @if($errors->has('ar_tag_title'))
                                        <span class="text-danger">{{ $errors->first('ar_tag_title') }}</span>
                                    @endif
                                </div>

                               

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tag Text in arabic</label>
                                        <textarea type="text" name="ar_tag_desc" id="my-text3" class="form-control " value="{{ $row->ar_tag_desc }}" required>{{ $row->ar_tag_desc }}</textarea>
                                        <p id="count-result3">Total characters: 0</p>
                                    </div>
                                    @if($errors->has('ar_tag_desc'))
                                        <span class="text-danger">{{ $errors->first('ar_tag_desc') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Article Script </label>
                                        <textarea type="text" name="blog_script" id="blog_script" class="form-control "  required>{{ $row->blog_script }}</textarea>
                                    </div>
                                    @if($errors->has('blog_script'))
                                        <span class="text-danger">{{ $errors->first('blog_script') }}</span>
                                    @endif
                                </div>
                                
                               
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Article Second Script </label>
                                        <textarea type="text" name="blog_second_script" id="blog_second_script" class="form-control "  required>{{ $row->blog_second_script }}</textarea>
                                    </div>
                                    @if($errors->has('blog_second_script'))
                                        <span class="text-danger">{{ $errors->first('blog_second_script') }}</span>
                                    @endif
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">date</label>
                                        <input type="date" name="schedule_date" id="dateInput" class="form-control" value="{{ $row->schedule_date }}" >
                                    </div>
                                    @if($errors->has('schedule_date'))
                                        <span class="text-danger">{{ $errors->first('schedule_date') }}</span>
                                    @endif
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">time</label>
                                        <input type="time" name="schedule_time" id="timeInput" class="form-control" value="{{ $row->schedule_time }}" >
                                    </div>
                                    @if($errors->has('schedule_time'))
                                        <span class="text-danger">{{ $errors->first('schedule_time') }}</span>
                                    @endif
                                  <div style="height: 25px;">
                                    <p id="timeError" class="text-danger mb-0 mt-1" style="display: none;">Cannot select time before the current time</p>
                                  </div>
                                </div>
                                
                                

                               
                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">Main Image</label>
                                        <input type="file" name="main_image" >
                                         @if($row->main_image !== NULL)
                                                <div class="col text-center">
                                                    <img src="{{ asset('../newArticle/' . $row->main_image) }}" width="100px" height="100px;">
                                                </div>
                                            @endif
                                    </div>
                                    @if($errors->has('arrayOfImages'))
                                        <span class="text-danger">{{ $errors->first('arrayOfImages') }}</span>
                                    @endif
                                </div>


                                <div class="col-md-6">
                                    <div>
                                        <label class="bmd-label-floating">More Images</label>
                                        <input type="file" name="arrayOfImages[]" multiple>
                                    </div>
                                    @if($errors->has('arrayOfImages'))
                                        <span class="text-danger">{{ $errors->first('arrayOfImages') }}</span>
                                    @endif
                                </div>
                                      
                            </div>
                        <button type="submit" class="btn btn-primary pull-right">Edit Article</button>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>


            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                  <span class="close">&times;</span>
                  @if(count($articleImages))
                <table class="table table-bordered table-striped">
                  <thead class=" text-primary table-data">
                    <th class="text-center" style="color:#fff">
                      ID
                    </th>
                    <th class="text-center" style="color:#fff">
                      Image 
                    </th>
                    <th class="text-center" style="color:#fff">
                      Link
                    </th>
                  </thead>
                  <tbody>
                  @foreach ($articleImages as $feedback)
                    <tr>
                      <td style="text-align: center">
                        {{$feedback->id}}
                      </td>
                      <td style="text-align: center">
                        <img src="{{ asset('../articleImages/' . $feedback->image) }}" width="100px" height="100px;">
                      </td>
                      <td style="text-align: center">
                        {{-- <input type="text" value="https://edugateuae.com/{{$feedback->image_url}}" style="width:300px" id="myInput" disabled> --}}
                        <button class="btn btn-primary pull-right" style="text-align: center" onclick="copyToClipboard('https://edugateuae.com/{{$feedback->image_url}}')">https://edugateuae.com/{{$feedback->image_url}}</button>
                      </td>
                      {{-- --}}
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                
                    @else
                    <h3 class="text-center">No Blogs Found</h3>
                @endif
                </div>
              
              </div>


            <script>
                // Get the modal
                var modal = document.getElementById("myModal");
                
                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");
                
                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];
                
                // When the user clicks the button, open the modal 
                btn.onclick = function() {
                  modal.style.display = "block";
                }
                
                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }
                
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                  if (event.target == modal) {
                    modal.style.display = "none";
                  }
                }
            </script>

<!--<script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>-->

            <script>
              function copyToClipboard(text) {
                const el = document.createElement('textarea');
                el.value = text;
                document.body.appendChild(el);
                el.select();
                document.execCommand('copy');
                document.body.removeChild(el);
              }
            </script>
            
            
            <script type='text/javascript'>
                                    let myText = document.getElementById("my-text");
                                    myText.addEventListener("input", () => {
                                        let count = (myText.value).length;
                                        document.getElementById("count-result").textContent = `Total characters: ${count}`;
                                    });
            </script>
            
            <script type='text/javascript'>
                                    let myText1 = document.getElementById("my-text2");
                                    myText1.addEventListener("input", () => {
                                        let count = (myText1.value).length;
                                        document.getElementById("count-result2").textContent = `Total characters: ${count}`;
                                    });
            </script>
            
            <script type='text/javascript'>
                                    let myText2 = document.getElementById("my-text3");
                                    myText2.addEventListener("input", () => {
                                        let count = (myText2.value).length;
                                        document.getElementById("count-result3").textContent = `Total characters: ${count}`;
                                    });
            </script>
@endsection