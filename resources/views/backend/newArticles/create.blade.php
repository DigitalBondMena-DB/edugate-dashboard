@extends('backend.layouts.app')

@php $pageTitle = 'Add Article'; @endphp

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

<script src="http://code.jquery.com/jquery-1.11.1.js" type="text/javascript"></script>
  




    
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('newArticle.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Title in arabic</label>
                                        <input type="text" name="ar_title"  class="form-control"  id="my-text"  value="{{ old('ar_title') }}" required>
                                        <p id="count-result">Total characters: 0</p>
                                    </div>
                                    @if($errors->has('ar_title'))
                                        <span class="text-danger">{{ $errors->first('ar_title') }}</span>
                                    @endif
                                </div>
                                
                                
                                

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Text in arabic</label>
                                        <textarea type="text" name="ar_text" id="ar_text" class="form-control ckeditor"  required>{{ old('ar_text') }}</textarea>
                                    </div>
                                    @if($errors->has('ar_text'))
                                        <span class="text-danger">{{ $errors->first('ar_text') }}</span>
                                    @endif
                                </div>
                                
                                
                                
                                
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tag Title in arabic</label>
                                        <input type="text" name="ar_tag_title"  id="my-text2" class="form-control" value="{{ old('ar_tag_title') }}" required>
                                        <p id="count-result2">Total characters: 0</p>
                                    </div>
                                    @if($errors->has('ar_tag_title'))
                                        <span class="text-danger">{{ $errors->first('ar_tag_title') }}</span>
                                    @endif
                                </div>

                               

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tag Text in arabic</label>
                                        <textarea type="text" name="ar_tag_desc" id="my-text3" class="form-control "  required>{{ old('ar_tag_desc') }}</textarea>
                                        <p id="count-result3">Total characters: 0</p>
                                    </div>
                                    @if($errors->has('ar_tag_desc'))
                                        <span class="text-danger">{{ $errors->first('ar_tag_desc') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Article Script </label>
                                        <textarea type="text" name="blog_script" id="blog_script" class="form-control "  required>{{ old('blog_script') }}</textarea>
                                    </div>
                                    @if($errors->has('blog_script'))
                                        <span class="text-danger">{{ $errors->first('blog_script') }}</span>
                                    @endif
                                </div>
                                
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Article Second Script </label>
                                        <textarea type="text" name="blog_second_script" id="blog_second_script" class="form-control "  required>{{ old('blog_second_script') }}</textarea>
                                    </div>
                                    @if($errors->has('blog_second_script'))
                                        <span class="text-danger">{{ $errors->first('blog_second_script') }}</span>
                                    @endif
                                </div>
                                
                                
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">date</label>
                                        <input type="date" name="schedule_date" id="dateInput" class="form-control" value="{{ old('schedule_date') }}" >
                                    </div>
                                    @if($errors->has('schedule_date'))
                                        <span class="text-danger">{{ $errors->first('schedule_date') }}</span>
                                    @endif
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">time</label>
                                        <input type="time" name="schedule_time" id="timeInput" class="form-control" value="{{ old('schedule_time') }}" >
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
                                        <input type="file" name="main_image" required>
                                    </div>
                                    @if($errors->has('arrayOfImages'))
                                        <span class="text-danger">{{ $errors->first('arrayOfImages') }}</span>
                                    @endif
                                </div>
                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="arrayOfImages[]" multiple >
                                    </div>
                                    @if($errors->has('arrayOfImages'))
                                        <span class="text-danger">{{ $errors->first('arrayOfImages') }}</span>
                                    @endif
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Choose Category</label>
                                        <select name="new_article_sub_catrgory_id" class="form-control" required>
                                            <option value="">Select a Category</option>
                                            @foreach($categoreies as $category)
                                                <option value="{{ $category->id }}">{{ $category->ar_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('ar_title'))
                                        <span class="text-danger">{{ $errors->first('ar_title') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Choose Article Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="">Select a Status</option>
                                            
                                                <option value="1">Active</option>
                                                <option value="0">Not Active</option>
                                        </select>
                                    </div>
                                    @if($errors->has('ar_title'))
                                        <span class="text-danger">{{ $errors->first('ar_title') }}</span>
                                    @endif
                                </div>

                                


                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Add Article</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                    </div>
            </div>
            </div>
            
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
            
 <script>
  // Function to get today's date in the format YYYY-MM-DD
  function getTodayDate() {
      const today = new Date();
      const yyyy = today.getFullYear();
      const mm = String(today.getMonth() + 1).padStart(2, '0');
      const dd = String(today.getDate()).padStart(2, '0');
      return `${yyyy}-${mm}-${dd}`;
  }

  // Function to get the current time in the format HH:MM
  function getCurrentTime() {
      const now = new Date();
      const hh = String(now.getHours()).padStart(2, '0');
      const mm = String(now.getMinutes()).padStart(2, '0');
      return `${hh}:${mm}`;
  }


                                
  // Set default values
  document.getElementById('schedule_date').value = getTodayDate();
  document.getElementById('schedule_time').value = getCurrentTime();

  // Set the minimum date to today
  document.getElementById('schedule_date').setAttribute('min', getTodayDate());

  // Validate time input to not allow selection before the current time on the same day
  function validateTime() {
      const selectedDate = document.getElementById('schedule_date').value;
      const selectedTime = document.getElementById('schedule_time').value;
      const todayDate = getTodayDate();
      const currentTime = getCurrentTime();
      const errorElement = document.getElementById('timeError');

      if (selectedDate === todayDate && selectedTime < currentTime) {
          errorElement.style.display = 'block';
          document.getElementById('schedule_time').value = currentTime;
      } else {
          errorElement.style.display = 'none';
      }
  }

  // Add event listeners for date and time inputs
  document.getElementById('schedule_date').addEventListener('change', validateTime);
  document.getElementById('schedule_time').addEventListener('input', validateTime);
</script>
@endsection