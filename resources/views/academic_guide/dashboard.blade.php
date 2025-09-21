@extends('academic_guide.layouts.app')

@php $pageTitle = 'لوحة التحكم'; @endphp

@section('title')
  {{ $pageTitle }}
@endsection

@section('content')


    <div class="row">
      {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
        <a href="{{ route('academicGuideAdsListView') }}">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
                <i class="material-icons">record_voice_over</i>
            </div>
            <p class="card-category" style="font-size: 20px; font-weight: bold;">  عملاء الاعلانات</p>
            <h3 class="card-title">
            </h3>
            </div>
            <div class="card-footer">
            </div>
        </div>
        </a>
    </div>

    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
        <a href="{{ route('academicGuideSocialMediaListView') }}">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
                <i class="material-icons">share</i>
            </div>
            <p class="card-category" style="font-size: 20px; font-weight: bold;"> عملاء السوشيال ميديا</p>
            <h3 class="card-title">
            </h3>
            </div>
            <div class="card-footer">
            </div>
        </div>
        </a>
    </div> --}}

        <div class="col-12">
            <h3>القوائم</h3>
            <hr>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
          <a href="{{ route('academicGuideListView') }}">
          <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">view_list</i>
              </div>
              <p class="card-category" style="font-size: 20px; font-weight: bold;"> قائمه العملاء</p>
              <h3 class="card-title">
              </h3>
              </div>
              
          </div>
          </a>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
          <a href="{{ route('academicGuideRegisterView') }}">
          <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">view_list</i>
              </div>
              <p class="card-category" style="font-size: 20px; font-weight: bold;"> قائمه التسجيل</p>
              <h3 class="card-title">
              </h3>
              </div>
              
          </div>
          </a>
      </div>

      <div class="col-12">
        <h3>التقارير </h3>
        <hr>
    </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
          <a href="{{ route('academicGuideListReportsView') }}">
          <div class="card card-stats">
              <div class="card-header card-header-secondary card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">drafts</i>
              </div>
              <p class="card-category" style="font-size: 20px; font-weight: bold;"> تقارير العملاء</p>
              <h3 class="card-title">
              </h3>
              </div>
              
          </div>
          </a>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <a href="{{ route('academicGuideRegisterReportsView') }}">
            <div class="card card-stats">
                <div class="card-header card-header-secondary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">drafts</i>
                </div>
                <p class="card-category" style="font-size: 20px; font-weight: bold;"> تقارير التسجيل</p>
                <h3 class="card-title">
                </h3>
                </div>

            </div>
            </a>
        </div>

        <div class="col-12">
            <h3>كشف العملاء  </h3>
            <hr>
        </div>

      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <a href="{{ route('academicGuideListBachelorView') }}">
          <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">content_paste</i>
              </div>
              <p class="card-category" style="font-size: 20px; font-weight: bold;">كشف عملاء البكالوريس</p>
              <h3 class="card-title">
              </h3>
              </div>
              
          </div>
          </a>
      </div>

      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <a href="{{ route('academicGuideListMasterView') }}">
          <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">content_paste</i>
              </div>
              <p class="card-category" style="font-size: 20px; font-weight: bold;">كشف عملاء الماجستير</p>
              <h3 class="card-title">
              </h3>
              </div>
              
          </div>
          </a>
      </div>

      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <a href="{{ route('academicGuideListPhdView') }}">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
                <i class="material-icons">content_paste</i>
            </div>
            <p class="card-category" style="font-size: 20px; font-weight: bold;">كشف عملاء الدكتوراه</p>
            <h3 class="card-title">
            </h3>
            </div>

        </div>
        </a>
    </div>

    <div class="col-12">
        <h3>كشف التسجيل</h3>
        <hr>
    </div>

      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <a href="{{ route('academicGuideRegisterBachelorView') }}">
          <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">note_add</i>
              </div>
              <p class="card-category" style="font-size: 20px; font-weight: bold;">كشف تسجيل البكالوريس</p>
              <h3 class="card-title">
              </h3>
              </div>
              
          </div>
          </a>
      </div>

      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <a href="{{ route('academicGuideRegisterMasterView') }}">
          <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">note_add</i>
              </div>
              <p class="card-category" style="font-size: 20px; font-weight: bold;">كشف تسجيل الماجستير</p>
              <h3 class="card-title">
              </h3>
              </div>
              
          </div>
          </a>
      </div>

      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <a href="{{ route('academicGuideRegisterPhdView') }}">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
                <i class="material-icons">note_add</i>
            </div>
            <p class="card-category" style="font-size: 20px; font-weight: bold;">كشف تسجيل الدكتوراه</p>
            <h3 class="card-title">
            </h3>
            </div>

        </div>
        </a>
    </div>

    <div class="col-12">
        <h3>حركه الملفات</h3>
        <hr>
    </div>

      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <a href="{{ route('academicGuideMovementBachelorView') }}">
          <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">insert_drive_file</i>
              </div>
              <p class="card-category" style="font-size: 20px; font-weight: bold;">  حركه ملفات البكالوريس</p>
              <h3 class="card-title">
              </h3>
              </div>
              
          </div>
          </a>
      </div>

      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
          <a href="{{ route('academicGuideMovementMasterView') }}">
          <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                  <i class="material-icons">insert_drive_file</i>
              </div>
              <p class="card-category" style="font-size: 20px; font-weight: bold;">  حركه ملفات الماجستير</p>
              <h3 class="card-title">
              </h3>
              </div>
              
          </div>
          </a>
      </div>
      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <a href="{{ route('academicGuideMovementPhdView') }}">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
                <i class="material-icons">insert_drive_file</i>
            </div>
            <p class="card-category" style="font-size: 20px; font-weight: bold;">  حركه ملفات الدكتوراه</p>
            <h3 class="card-title">
            </h3>
            </div>

        </div>
        </a>
    </div>

  </div>

@endsection

@push('js')
    <script>

    </script>
@endpush