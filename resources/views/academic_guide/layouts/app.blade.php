<!doctype html>
<html lang="en">

<head>
   <title> @yield('title') </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.png') }}">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/vendors/css/vendors-rtl.min.css">
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/vendors/css/extensions/swiper.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/css-rtl/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/css-rtl/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/css-rtl/colors.css">
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/css-rtl/components.css">
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/css-rtl/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/css-rtl/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/css-rtl/custom-rtl.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/app-assets/css-rtl/pages/dashboard-ecommerce.css">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/egec_new/backend/assets/css/style-rtl.css">
    <!-- END: Custom CSS-->
  @stack('css')
  <style>
    .dataTables_filter{
      display: none !important;
    }
  </style>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('academic_guide.layouts.header')

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
        @include('academic_guide.layouts.side-bar')

    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
              @yield('content')
            </div>
        </div>
    </div>
  <!--   Core JS Files   -->
   <script src="/egec_new/backend/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/egec_new/backend/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="/egec_new/backend/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="/egec_new/backend/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <script src="/egec_new/backend/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="/egec_new/backend/app-assets/vendors/js/extensions/swiper.min.js"></script>

    <!-- BEGIN: Page Vendor JS-->
    <script src="/egec_new/backend/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/egec_new/backend/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/egec_new/backend/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/egec_new/backend/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="/egec_new/backend/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="/egec_new/backend/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="/egec_new/backend/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="/egec_new/backend/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/egec_new/backend/app-assets/js/scripts/configs/vertical-menu-light.js"></script>
    <script src="/egec_new/backend/app-assets/js/core/app-menu.js"></script>
    <script src="/egec_new/backend/app-assets/js/core/app.js"></script>
    <script src="/egec_new/backend/app-assets/js/scripts/components.js"></script>
    <script src="/egec_new/backend/app-assets/js/scripts/footer.js"></script>
    <!-- END: Theme JS-->

    <script src="/egec_new/backend/app-assets/js/scripts/modal/components-modal.min.js"></script>

    <!-- BEGIN: Page JS-->
    <script src="/egec_new/backend/app-assets/js/scripts/datatables/datatable.js"></script>
    <script src="/egec_new/backend/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  @yield('js')

    <script>
      $(document).ready(function() {
          $('#list-ads-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetAdsListData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'status', name: 'status'},
                {data: 'calls', name: 'calls'},
                {data: 'source', name: 'source'},
                {data: 'comment', name: 'comment'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},
                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_address', name: 'personal_info.address'},
                {data: 'personal_info_area', name: 'personal_info.area'},
                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},
                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_school_name', name: 'academic_info.school_name'},
                {data: 'academic_info_university_name', name: 'academic_info.university_name'},
                {data: 'academic_info_faculty_name', name: 'academic_info.faculty_name'},
                {data: 'academic_info_department_name', name: 'academic_info.department_name'},
                {data: 'academic_info_gpa_precentage', name: 'academic_info.gpa_precentage'},
                {data: 'academic_info_education_system', name: 'academic_info.education_system'},
              
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $('#list-social-media-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetSocialMediaListData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'status', name: 'status'},
                {data: 'calls', name: 'calls'},
                {data: 'source', name: 'source'},
                {data: 'comment', name: 'comment'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},
                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_address', name: 'personal_info.address'},
                {data: 'personal_info_area', name: 'personal_info.area'},
                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},
                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_school_name', name: 'academic_info.school_name'},
                {data: 'academic_info_university_name', name: 'academic_info.university_name'},
                {data: 'academic_info_faculty_name', name: 'academic_info.faculty_name'},
                {data: 'academic_info_department_name', name: 'academic_info.department_name'},
                {data: 'academic_info_gpa_precentage', name: 'academic_info.gpa_precentage'},
                {data: 'academic_info_education_system', name: 'academic_info.education_system'},
              
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $('#list-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetListData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'status', name: 'status'},
                {data: 'calls', name: 'calls'},
                {data: 'source', name: 'source'},
                {data: 'comment', name: 'comment'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},
                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_address', name: 'personal_info.address'},
                {data: 'personal_info_area', name: 'personal_info.area'},
                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},
                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_school_name', name: 'academic_info.school_name'},
                {data: 'academic_info_university_name', name: 'academic_info.university_name'},
                {data: 'academic_info_faculty_name', name: 'academic_info.faculty_name'},
                {data: 'academic_info_department_name', name: 'academic_info.department_name'},
                {data: 'academic_info_gpa_precentage', name: 'academic_info.gpa_precentage'},
                {data: 'academic_info_education_system', name: 'academic_info.education_system'},
              
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $('#register-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetRegisterData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
              {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'status', name: 'status'},
                {data: 'calls', name: 'calls'},
                {data: 'source', name: 'source'},
                {data: 'comment', name: 'comment'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},
                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_address', name: 'personal_info.address'},
                {data: 'personal_info_area', name: 'personal_info.area'},
                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},
                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_school_name', name: 'academic_info.school_name'},
                {data: 'academic_info_university_name', name: 'academic_info.university_name'},
                {data: 'academic_info_faculty_name', name: 'academic_info.faculty_name'},
                {data: 'academic_info_department_name', name: 'academic_info.department_name'},
                {data: 'academic_info_gpa_precentage', name: 'academic_info.gpa_precentage'},
                {data: 'academic_info_education_system', name: 'academic_info.education_system'},
                
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $('#list-reports-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetListReportsData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
                "fromdate": $("#fromdate").val(),
                "todate": $("#todate").val(),
              }
            },
            columns: [
                {data: 'day', name: 'day'},
                {data: 'month', name: 'month'},
                {data: 'year', name: 'year'},
                {data: 'quantity', name: 'quantity'},
                {data: 'bachelor_quantity', name: 'bachelor_quantity'},
                {data: 'master_quantity', name: 'master_quantity'},
                {data: 'phd_quantity', name: 'phd_quantity'},
            ],
          });

          $('#register-reports-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetRegisterReportsData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
                "fromdate": $("#fromdate").val(),
                "todate": $("#todate").val(),
              }
            },
            columns: [
                {data: 'day', name: 'day'},
                {data: 'month', name: 'month'},
                {data: 'year', name: 'year'},
                {data: 'quantity', name: 'quantity'},
                {data: 'bachelor_quantity', name: 'bachelor_quantity'},
                {data: 'master_quantity', name: 'master_quantity'},
                {data: 'phd_quantity', name: 'phd_quantity'},
            ],
          });


          $('#list-bachelor-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetListBachelorData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
                {data: 'id', name: 'id'},

                {data: 'admission_info_day', name: 'user_admission_forms.day'},
                {data: 'admission_info_month', name: 'user_admission_forms.month'},
                {data: 'admission_info_year', name: 'user_admission_forms.year'},
                {data: 'source', name: 'source'},

                {data: 'name', name: 'name'},
                {data: 'status', name: 'status'},
                {data: 'calls', name: 'calls'},
                {data: 'phone', name: 'phone'},

                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_area', name: 'personal_info.area'},
                {data: 'personal_info_address', name: 'personal_info.address'},

                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_gpa_precentage', name: 'academic_info.gpa_precentage'},
                {data: 'academic_info_education_system', name: 'academic_info.education_system'},

                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},

                {data: 'admission_info_destination', name: 'user_admission_forms.destination'},
                {data: 'admission_info_university', name: 'user_admission_forms.university'},
                {data: 'admission_info_faculty', name: 'user_admission_forms.faculty'},
                {data: 'admission_info_department', name: 'user_admission_forms.department'},

                {data: 'email', name: 'email'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},

                {data: 'comment', name: 'comment'},
                {data: 'admission_info_registered', name: 'user_admission_forms.registered'},

                {data: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $('#create_record_list_bachelor').click(function(){
            $('#list-bachelor-form')[0].reset();
            $('.modal-title-list-bachelor').text('انشاء سجل جديد');
            $('#action_button_list_bachelor').val('اضف');
            $('#action_list_bachelor').val('اضف');
            $('#form_result_list_bachelor').html('');
            $('#formModalListBachelor').modal('show');
          });

          $(document).on('click', '.edit-list-bachelor', function(){
            var id = $(this).attr('id');
            $('#form_result_list_bachelor').html('');
            $.ajax({
            url: "/egec_new/academic-guide/datatable/list/getBachelorData/"+id+"/edit",
            dataType:"json",
            success:function(data)
            {
              $('#name').val(data.user.name);
              $('#email').val(data.user.email);
              $('#phone').val(data.user.phone);
              $('#status').val(data.user.status);
              $('#calls').val(data.user.calls);
              $('#source').val(data.user.source);
              $('#comment').val(data.user.comment);
              $('#birthdate').val(data.userPersonalInfo.birthdate);
              $('#gender').val(data.userPersonalInfo.gender);
              $('#nationality').val(data.userPersonalInfo.nationality);
              $('#nation').val(data.userPersonalInfo.nation);
              $('#address').val(data.userPersonalInfo.address);
              $('#area').val(data.userPersonalInfo.area);
              $('#degree_needed').val(data.userPersonalInfo.degree_needed);
              $('#degree_name').val(data.userAcademicInfo.degree_name);
              $('#degree_year').val(data.userAcademicInfo.degree_year);
              $('#degree_country').val(data.userAcademicInfo.degree_country);
              $('#school_name').val(data.userAcademicInfo.school_name);
              $('#gpa_precentage').val(data.userAcademicInfo.gpa_precentage);
              $('#education_system').val(data.userAcademicInfo.education_system);
              $('#destination').val(data.userAdmissionInfo.destination);
              $('#university').val(data.userAdmissionInfo.university);
              $('#faculty').val(data.userAdmissionInfo.faculty);
              $('#major').val(data.userAdmissionInfo.major);
              $('#department').val(data.userAdmissionInfo.department);
              $('#registered').val(data.userAdmissionInfo.registered);  
              $('#hidden_id_list_bachelor').val(id);
              $('.modal-title-list-bachelor').text('تعديل السجل');
              $('#action_button_list_bachelor').val('تعديل');
              $('#action_list_bachelor').val('تعديل');
              $('#formModalListBachelor').modal('show');
            }
            })
          });

          var list_bachelor_user_id;

          $(document).on('click', '.delete-list-bachelor', function(){
            list_bachelor_user_id = $(this).attr('id');
            $('.modal-title-list-bachelor').text('تاكيد حذف السجل');
            $('#confirmModalListBachelor').modal('show');
          });

          $(document).on('click', '#ok_button_list_bachelor', function() {
            $.ajax({
              url: "/egec_new/academic-guide/datatable/list/getBachelorData/"+list_bachelor_user_id+"/delete",
              beforeSend:function(){
                $('#ok_button_list_bachelor').text('...جاري الحذف');
              },
              success:function(data)
              {
                $('#confirmModalListBachelor').modal('hide');
                $('#list-bachelor-users-table').DataTable().ajax.reload();
              }
            })
          });

          $('#list-bachelor-form').on('submit', function(event){
            event.preventDefault();
            var action_url = '';

            if($('#action_list_bachelor').val() == 'اضف')
            {
            action_url = "{{ route('academicGuideGetListBachelorDataUserStore') }}";
            }

            if($('#action_list_bachelor').val() == 'تعديل')
            {
            action_url = "{{ route('academicGuideGetListBachelorDataUserIdUpdate') }}";
            }

            $.ajax({
            url: action_url,
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
              var html = '';
              if(data.errors)
              {
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
              }
              if(data.success)
              {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              $('#list-bachelor-form')[0].reset();
              $('#list-bachelor-users-table').DataTable().ajax.reload();
              }
              $('#form_result_list_bachelor').html(html);
              $('#formModalListBachelor').modal('hide');
            }
            });
          });





          $('#list-master-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetListMasterData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
                {data: 'id', name: 'id'},

                {data: 'admission_info_day', name: 'user_admission_forms.day'},
                {data: 'admission_info_month', name: 'user_admission_forms.month'},
                {data: 'admission_info_year', name: 'user_admission_forms.year'},
                {data: 'source', name: 'source'},

                {data: 'name', name: 'name'},
                {data: 'status', name: 'status'},
                {data: 'calls', name: 'calls'},
                {data: 'phone', name: 'phone'},

                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_area', name: 'personal_info.area'},
                {data: 'personal_info_address', name: 'personal_info.address'},

                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                 {data: 'academic_info_university_name', name: 'academic_info.university_name'},
                {data: 'academic_info_faculty_name', name: 'academic_info.faculty_name'},
                {data: 'academic_info_department_name', name: 'academic_info.department_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_gpa_precentage', name: 'academic_info.gpa_precentage'},
                {data: 'academic_info_education_system', name: 'academic_info.education_system'},

                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},

                {data: 'admission_info_destination', name: 'user_admission_forms.destination'},
                {data: 'admission_info_university', name: 'user_admission_forms.university'},
                {data: 'admission_info_faculty', name: 'user_admission_forms.faculty'},
                {data: 'admission_info_department', name: 'user_admission_forms.department'},

                {data: 'email', name: 'email'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},

                {data: 'comment', name: 'comment'},
                {data: 'admission_info_registered', name: 'user_admission_forms.registered'},

                {data: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $('#create_record_list_master').click(function(){
            $('#list-master-form')[0].reset();
            $('.modal-title-list-master').text('انشاء سجل جديد');
            $('#action_button_list_master').val('اضف');
            $('#action_list_master').val('اضف');
            $('#form_result_list_master').html('');
            $('#formModalListMaster').modal('show');
          });

          $(document).on('click', '.edit-list-master', function(){
            var id = $(this).attr('id');
            $('#form_result_list_master').html('');
            $.ajax({
            url: "/egec_new/academic-guide/datatable/list/getMasterData/"+id+"/edit",
            dataType:"json",
            success:function(data)
            {
              $('#name').val(data.user.name);
              $('#email').val(data.user.email);
              $('#phone').val(data.user.phone);
              $('#status').val(data.user.status);
              $('#calls').val(data.user.calls);
              $('#source').val(data.user.source);
              $('#comment').val(data.user.comment);
              $('#birthdate').val(data.userPersonalInfo.birthdate);
              $('#gender').val(data.userPersonalInfo.gender);
              $('#nationality').val(data.userPersonalInfo.nationality);
              $('#nation').val(data.userPersonalInfo.nation);
              $('#address').val(data.userPersonalInfo.address);
              $('#area').val(data.userPersonalInfo.area);
              $('#degree_needed').val(data.userPersonalInfo.degree_needed);
              $('#degree_name').val(data.userAcademicInfo.degree_name);
              $('#degree_year').val(data.userAcademicInfo.degree_year);
              $('#degree_country').val(data.userAcademicInfo.degree_country);
              $('#university_name').val(data.userAcademicInfo.university_name);
              $('#faculty_name').val(data.userAcademicInfo.faculty_name);
              $('#department_name').val(data.userAcademicInfo.department_name);
              $('#gpa_precentage').val(data.userAcademicInfo.gpa_precentage);
              $('#education_system').val(data.userAcademicInfo.education_system);
              $('#destination').val(data.userAdmissionInfo.destination);
              $('#university').val(data.userAdmissionInfo.university);
              $('#faculty').val(data.userAdmissionInfo.faculty);
              $('#major').val(data.userAdmissionInfo.major);
              $('#department').val(data.userAdmissionInfo.department);
              $('#registered').val(data.userAdmissionInfo.registered);   
              $('#hidden_id_list_master').val(id);
              $('.modal-title-list-master').text('تعديل السجل');
              $('#action_button_list_master').val('تعديل');
              $('#action_list_master').val('تعديل');
              $('#formModalListMaster').modal('show');
            }
            })
          });

          var list_master_user_id;

          $(document).on('click', '.delete-list-master', function(){
            list_master_user_id = $(this).attr('id');
            $('.modal-title-list-master').text('تاكيد حذف السجل');
            $('#confirmModalListMaster').modal('show');
          });

          $(document).on('click', '#ok_button_list_master', function() {
            $.ajax({
              url: "/egec_new/academic-guide/datatable/list/getMasterData/"+list_master_user_id+"/delete",
              beforeSend:function(){
                $('#ok_button_list_master').text('...جاري الحذف');
              },
              success:function(data)
              {
                $('#confirmModalListMaster').modal('hide');
                $('#list-master-users-table').DataTable().ajax.reload();
              }
            })
          });

          $('#list-master-form').on('submit', function(event){
            event.preventDefault();
            var action_url = '';

            if($('#action_list_master').val() == 'اضف')
            {
            action_url = "{{ route('academicGuideGetListMasterDataUserStore') }}";
            }

            if($('#action_list_master').val() == 'تعديل')
            {
            action_url = "{{ route('academicGuideGetListMasterDataUserIdUpdate') }}";
            }

            $.ajax({
            url: action_url,
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
              var html = '';
              if(data.errors)
              {
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
              }
              if(data.success)
              {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              $('#list-master-form')[0].reset();
              $('#list-master-users-table').DataTable().ajax.reload();
              }
              $('#form_result_list_master').html(html);
              $('#formModalListMaster').modal('hide');
            }
            });
          });


          $('#list-phd-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetListPhdData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'status', name: 'status'},
                {data: 'calls', name: 'calls'},
                {data: 'source', name: 'source'},
                {data: 'comment', name: 'comment'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},
                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_address', name: 'personal_info.address'},
                {data: 'personal_info_area', name: 'personal_info.area'},
                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},
                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_university_name', name: 'academic_info.university_name'},
                {data: 'academic_info_faculty_name', name: 'academic_info.faculty_name'},
                {data: 'academic_info_master_name', name: 'academic_info.master_name'},
                {data: 'academic_info_gpa_precentage', name: 'academic_info.gpa_precentage'},
                {data: 'admission_info_destination', name: 'user_admission_forms.destination'},
                {data: 'admission_info_university', name: 'user_admission_forms.university'},
                {data: 'admission_info_faculty', name: 'user_admission_forms.faculty'},
                {data: 'admission_info_major', name: 'user_admission_forms.major'},
                {data: 'admission_info_department', name: 'user_admission_forms.department'},
                {data: 'admission_info_day', name: 'user_admission_forms.day'},
                {data: 'admission_info_month', name: 'user_admission_forms.month'},
                {data: 'admission_info_year', name: 'user_admission_forms.year'},
                {data: 'admission_info_academic_guide', name: 'user_admission_forms.academic_guide'},
                {data: 'admission_info_registered', name: 'user_admission_forms.registered'},
                {data: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $('#create_record_list_phd').click(function(){
            $('#list-phd-form')[0].reset();
            $('.modal-title-list-phd').text('انشاء سجل جديد');
            $('#action_button_list_phd').val('اضف');
            $('#action_list_phd').val('اضف');
            $('#form_result_list_phd').html('');
            $('#formModalListPhd').modal('show');
          });

          $(document).on('click', '.edit-list-phd', function(){
            var id = $(this).attr('id');
            $('#form_result_list_phd').html('');
            $.ajax({
            url: "/egec_new/academic-guide/datatable/list/getPhdData/"+id+"/edit",
            dataType:"json",
            success:function(data)
            {
              $('#name').val(data.user.name);
              $('#email').val(data.user.email);
              $('#phone').val(data.user.phone);
              $('#status').val(data.user.status);
              $('#calls').val(data.user.calls);
              $('#source').val(data.user.source);
              $('#comment').val(data.user.comment);
              $('#birthdate').val(data.userPersonalInfo.birthdate);
              $('#gender').val(data.userPersonalInfo.gender);
              $('#nationality').val(data.userPersonalInfo.nationality);
              $('#nation').val(data.userPersonalInfo.nation);
              $('#address').val(data.userPersonalInfo.address);
              $('#area').val(data.userPersonalInfo.area);
              $('#degree_needed').val(data.userPersonalInfo.degree_needed);
              $('#degree_name').val(data.userAcademicInfo.degree_name);
              $('#degree_year').val(data.userAcademicInfo.degree_year);
              $('#degree_country').val(data.userAcademicInfo.degree_country);
              $('#university_name').val(data.userAcademicInfo.university_name);
              $('#faculty_name').val(data.userAcademicInfo.faculty_name);
              $('#master_name').val(data.userAcademicInfo.master_name);
              $('#gpa_precentage').val(data.userAcademicInfo.gpa_precentage);
              $('#destination').val(data.userAdmissionInfo.destination);
              $('#university').val(data.userAdmissionInfo.university);
              $('#faculty').val(data.userAdmissionInfo.faculty);
              $('#major').val(data.userAdmissionInfo.major);
              $('#department').val(data.userAdmissionInfo.department);
              $('#registered').val(data.userAdmissionInfo.registered);   
              $('#hidden_id_list_phd').val(id);
              $('.modal-title-list-phd').text('تعديل السجل');
              $('#action_button_list_phd').val('تعديل');
              $('#action_list_phd').val('تعديل');
              $('#formModalListPhd').modal('show');
            }
            })
          });

          var list_phd_user_id;

          $(document).on('click', '.delete-list-phd', function(){
            list_phd_user_id = $(this).attr('id');
            $('.modal-title-list-phd').text('تاكيد حذف السجل');
            $('#confirmModalListPhd').modal('show');
          });

          $(document).on('click', '#ok_button_list_phd', function() {
            $.ajax({
              url: "/egec_new/academic-guide/datatable/list/getPhdData/"+list_phd_user_id+"/delete",
              beforeSend:function(){
                $('#ok_button_list_phd').text('...جاري الحذف');
              },
              success:function(data)
              {
                $('#confirmModalListPhd').modal('hide');
                $('#list-phd-users-table').DataTable().ajax.reload();
              }
            })
          });

          $('#list-phd-form').on('submit', function(event){
            event.preventDefault();
            var action_url = '';

            if($('#action_list_phd').val() == 'اضف')
            {
            action_url = "{{ route('academicGuideGetListPhdDataUserStore') }}";
            }


            if($('#action_list_phd').val() == 'تعديل')
            {
            action_url = "{{ route('academicGuideGetListPhdDataUserIdUpdate') }}";
            }

            $.ajax({
            url: action_url,
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
              var html = '';
              if(data.errors)
              {
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
              }
              if(data.success)
              {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              $('#list-phd-form')[0].reset();
              $('#list-phd-users-table').DataTable().ajax.reload();
              }
              $('#form_result_list_phd').html(html);
              $('#formModalListPhd').modal('hide');
            }
            });
          });



          $('#register-bachelor-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetRegisterBachelorData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},
                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_address', name: 'personal_info.address'},
                {data: 'personal_info_area', name: 'personal_info.area'},
                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},
                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_school_name', name: 'academic_info.school_name'},
                {data: 'academic_info_gpa_precentage', name: 'academic_info.gpa_precentage'},
                {data: 'academic_info_education_system', name: 'academic_info.education_system'},
                {data: 'admission_info_destination', name: 'user_admission_forms.destination'},
                {data: 'admission_info_university', name: 'user_admission_forms.university'},
                {data: 'admission_info_faculty', name: 'user_admission_forms.faculty'},
                {data: 'admission_info_major', name: 'user_admission_forms.major'},
                {data: 'admission_info_department', name: 'user_admission_forms.department'},
                {data: 'admission_info_status_after_register', name: 'user_admission_forms.status_after_register'},
                {data: 'admission_info_paper_status', name: 'user_admission_forms.paper_status'},
                {data: 'admission_info_deal', name: 'user_admission_forms.deal'},
                
                {data: 'admission_info_account_finance_first_image', name: 'user_admission_forms.account_finance_first_image'},
                {data: 'admission_info_account_finance_first_number', name: 'user_admission_forms.account_finance_first_number'},
                {data: 'admission_info_account_finance_first_status', name: 'user_admission_forms.account_finance_first_status'},
                {data: 'admission_info_account_finance_second_image', name: 'user_admission_forms.account_finance_second_image'},
                {data: 'admission_info_account_finance_second_number', name: 'user_admission_forms.account_finance_second_number'},
                {data: 'admission_info_account_finance_second_status', name: 'user_admission_forms.account_finance_second_status'},
                {data: 'admission_info_account_finance_third_image', name: 'user_admission_forms.account_finance_third_image'},
                {data: 'admission_info_account_finance_third_number', name: 'user_admission_forms.account_finance_third_number'},
                {data: 'admission_info_account_finance_third_status', name: 'user_admission_forms.account_finance_third_status'},
                {data: 'admission_info_account_finance_fourth_image', name: 'user_admission_forms.account_finance_fourth_image'},
                {data: 'admission_info_account_finance_fourth_number', name: 'user_admission_forms.account_finance_fourth_number'},
                {data: 'admission_info_account_finance_fourth_status', name: 'user_admission_forms.account_finance_fourth_status'},

                {data: 'admission_info_accounts_status', name: 'user_admission_forms.accounts_status'},
                {data: 'admission_info_correspondence', name: 'user_admission_forms.correspondence'},
                {data: 'admission_info_day', name: 'user_admission_forms.day'},
                {data: 'admission_info_month', name: 'user_admission_forms.month'},
                {data: 'admission_info_year', name: 'user_admission_forms.year'},
                {data: 'admission_info_registered_day', name: 'user_admission_forms.register_day'},
                {data: 'admission_info_registered_month', name: 'user_admission_forms.register_month'},
                {data: 'admission_info_registered_year', name: 'user_admission_forms.register_year'},
                {data: 'admission_info_academic_guide', name: 'user_admission_forms.academic_guide'},
                {data: 'admission_info_model_number', name: 'user_admission_forms.model_number'},
                {data: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $(document).on('click', '.edit-register-bachelor', function(){
            var id = $(this).attr('id');
            $('#form_result_register_bachelor').html('');
            $('#form_result_register_bachelor').html('');
            $('#account_finance_first_image').html('');
            $('#account_finance_second_image').html('');
            $('#account_finance_third_image').html('');
            $('#account_finance_fourth_image').html('');
            $.ajax({
            url: "/egec_new/academic-guide/datatable/register/getBachelorData/"+id+"/edit",
            dataType:"json",
            success:function(data)
            {
              $('#name').val(data.user.name);
              $('#email').val(data.user.email);
              $('#phone').val(data.user.phone);
              $('#birthdate').val(data.userPersonalInfo.birthdate);
              $('#gender').val(data.userPersonalInfo.gender);
              $('#nationality').val(data.userPersonalInfo.nationality);
              $('#nation').val(data.userPersonalInfo.nation);
              $('#address').val(data.userPersonalInfo.address);
              $('#area').val(data.userPersonalInfo.area);
              $('#degree_needed').val(data.userPersonalInfo.degree_needed);
              $('#degree_name').val(data.userAcademicInfo.degree_name);
              $('#degree_year').val(data.userAcademicInfo.degree_year);
              $('#degree_country').val(data.userAcademicInfo.degree_country);
              $('#school_name').val(data.userAcademicInfo.school_name);
              $('#gpa_precentage').val(data.userAcademicInfo.gpa_precentage);
              $('#education_system').val(data.userAcademicInfo.education_system);
              $('#destination').val(data.userAdmissionInfo.destination);
              $('#university').val(data.userAdmissionInfo.university);
              $('#faculty').val(data.userAdmissionInfo.faculty);
              $('#major').val(data.userAdmissionInfo.major);
              $('#department').val(data.userAdmissionInfo.department);
              $('#status_after_register').val(data.userAdmissionInfo.status_after_register);
              $('#paper_status').val(data.userAdmissionInfo.paper_status);
              $('#deal').val(data.userAdmissionInfo.deal);

              if(data.userAdmissionInfo.account_finance_first_image != null) {
                if(data.userAdmissionInfo.account_finance_first_image != 'لم يرسل صورة الايصال') {
                  $('#account_finance_first_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.account_finance_first_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.account_finance_first_image + " width=100 height=60></a>");
                } else {
                  $('#account_finance_first_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#account_finance_first_image').html('لم يرسل صورة حتي الان');
              }
              $('#account_finance_first_number').val(data.userAdmissionInfo.account_finance_first_number);
              $('#account_finance_first_status').val(data.userAdmissionInfo.account_finance_first_status);


              if(data.userAdmissionInfo.account_finance_second_image != null) {
                if(data.userAdmissionInfo.account_finance_second_image != 'لم يرسل صورة الايصال') {
                  $('#account_finance_second_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.account_finance_second_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.account_finance_second_image + " width=100 height=60></a>");
                } else {
                  $('#account_finance_second_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#account_finance_second_image').html('لم يرسل صورة حتي الان');
              }
              $('#account_finance_second_number').val(data.userAdmissionInfo.account_finance_second_number);
              $('#account_finance_second_status').val(data.userAdmissionInfo.account_finance_second_status);
              
              if(data.userAdmissionInfo.account_finance_third_image != null) {
                if(data.userAdmissionInfo.account_finance_third_image != 'لم يرسل صورة الايصال') {
                  $('#account_finance_third_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.account_finance_third_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.account_finance_third_image + " width=100 height=60></a>");
                } else {
                  $('#account_finance_third_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#account_finance_third_image').html('لم يرسل صورة حتي الان');
              }
              $('#account_finance_third_number').val(data.userAdmissionInfo.account_finance_third_number);
              $('#account_finance_third_status').val(data.userAdmissionInfo.account_finance_third_status);


              if(data.userAdmissionInfo.account_finance_fourth_image != null) {
                if(data.userAdmissionInfo.account_finance_fourth_image != 'لم يرسل صورة الايصال') {
                  $('#account_finance_fourth_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.account_finance_fourth_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.account_finance_fourth_image + " width=100 height=60></a>");
                } else {
                  $('#account_finance_fourth_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#account_finance_fourth_image').html('لم يرسل صورة حتي الان');
              }
              $('#account_finance_fourth_number').val(data.userAdmissionInfo.account_finance_fourth_number);
              $('#account_finance_fourth_status').val(data.userAdmissionInfo.account_finance_fourth_status);

              $('#accounts_status').val(data.userAdmissionInfo.accounts_status);
              $('#correspondence').val(data.userAdmissionInfo.correspondence);
              $('#academic_guide_register_bachelor option').remove();
              $('#academic_guide_register_bachelor').append("<option value=''>اختر المرشد الاكاديمي</option>");
              $('#model_number').val(data.userAdmissionInfo.model_number);
              $('#hidden_id_register_bachelor').val(id);
              $('.modal-title-register-bachelor').text('تعديل السجل');
              $('#action_button_register_bachelor').val('تعديل');
              $('#action_register_bachelor').val('تعديل');
              $('#formModalRegisterBachelor').modal('show');
            }
            })
          });

          var register_bachelor_user_id;

          $(document).on('click', '.delete-register-bachelor', function(){
            register_bachelor_user_id = $(this).attr('id');
            $('.modal-title-register-bachelor').text('تاكيد حذف السجل');
            $('#confirmModalRegisterBachelor').modal('show');
          });

          $(document).on('click', '#ok_button_register_bachelor', function() {
            $.ajax({
              url: "/egec_new/academic-guide/datatable/register/getBachelorData/"+register_bachelor_user_id+"/delete",
              beforeSend:function(){
                $('#ok_button_register_bachelor').text('...جاري الحذف');
              },
              success:function(data)
              {
                $('#confirmModalRegisterBachelor').modal('hide');
                $('#register-bachelor-users-table').DataTable().ajax.reload();
              }
            })
          });

          $('#register-bachelor-form').on('submit', function(event){
            event.preventDefault();
            var action_url = '';

            if($('#action_register_bachelor').val() == 'تعديل')
            {
            action_url = "{{ route('academicGuideGetRegisterBachelorDataUserIdUpdate') }}";
            }

            $.ajax({
            url: action_url,
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
              var html = '';
              if(data.errors)
              {
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
              }
              if(data.success)
              {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              $('#register-bachelor-form')[0].reset();
              $('#register-bachelor-users-table').DataTable().ajax.reload();
              }
              $('#form_result_register_bachelor').html(html);
              $('#formModalRegisterBachelor').modal('hide');
            }
            });
          });




          
          $('#register-master-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url:  '{!! route('academicGuideGetRegisterMasterData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},
                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_address', name: 'personal_info.address'},
                {data: 'personal_info_area', name: 'personal_info.area'},
                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},
                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_university_name', name: 'academic_info.university_name'},
                {data: 'academic_info_faculty_name', name: 'academic_info.faculty_name'},
                {data: 'academic_info_department_name', name: 'academic_info.department_name'},
                {data: 'academic_info_gpa_precentage', name: 'academic_info.gpa_precentage'},
                {data: 'academic_info_education_system', name: 'academic_info.education_system'},
                {data: 'admission_info_destination', name: 'user_admission_forms.destination'},
                {data: 'admission_info_university', name: 'user_admission_forms.university'},
                {data: 'admission_info_faculty', name: 'user_admission_forms.faculty'},
                {data: 'admission_info_major', name: 'user_admission_forms.major'},
                {data: 'admission_info_department', name: 'user_admission_forms.department'},
                {data: 'admission_info_status_after_register', name: 'user_admission_forms.status_after_register'},
                {data: 'admission_info_paper_status', name: 'user_admission_forms.paper_status'},
                {data: 'admission_info_deal', name: 'user_admission_forms.deal'},
                
                {data: 'admission_info_account_finance_first_image', name: 'user_admission_forms.account_finance_first_image'},
                {data: 'admission_info_account_finance_first_number', name: 'user_admission_forms.account_finance_first_number'},
                {data: 'admission_info_account_finance_first_status', name: 'user_admission_forms.account_finance_first_status'},
                {data: 'admission_info_account_finance_second_image', name: 'user_admission_forms.account_finance_second_image'},
                {data: 'admission_info_account_finance_second_number', name: 'user_admission_forms.account_finance_second_number'},
                {data: 'admission_info_account_finance_second_status', name: 'user_admission_forms.account_finance_second_status'},
                {data: 'admission_info_account_finance_third_image', name: 'user_admission_forms.account_finance_third_image'},
                {data: 'admission_info_account_finance_third_number', name: 'user_admission_forms.account_finance_third_number'},
                {data: 'admission_info_account_finance_third_status', name: 'user_admission_forms.account_finance_third_status'},
                {data: 'admission_info_account_finance_fourth_image', name: 'user_admission_forms.account_finance_fourth_image'},
                {data: 'admission_info_account_finance_fourth_number', name: 'user_admission_forms.account_finance_fourth_number'},
                {data: 'admission_info_account_finance_fourth_status', name: 'user_admission_forms.account_finance_fourth_status'},

                {data: 'admission_info_accounts_status', name: 'user_admission_forms.accounts_status'},
                {data: 'admission_info_correspondence', name: 'user_admission_forms.correspondence'},
                {data: 'admission_info_day', name: 'user_admission_forms.day'},
                {data: 'admission_info_month', name: 'user_admission_forms.month'},
                {data: 'admission_info_year', name: 'user_admission_forms.year'},
                {data: 'admission_info_registered_day', name: 'user_admission_forms.register_day'},
                {data: 'admission_info_registered_month', name: 'user_admission_forms.register_month'},
                {data: 'admission_info_registered_year', name: 'user_admission_forms.register_year'},
                {data: 'admission_info_academic_guide', name: 'user_admission_forms.academic_guide'},
                {data: 'admission_info_model_number', name: 'user_admission_forms.model_number'},
                {data: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $(document).on('click', '.edit-register-master', function(){
            var id = $(this).attr('id');
            $('#form_result_register_master').html('');
            $('#form_result_register_bachelor').html('');
            $('#account_finance_first_image').html('');
            $('#account_finance_second_image').html('');
            $('#account_finance_third_image').html('');
            $('#account_finance_fourth_image').html('');
            $.ajax({
            url: "/egec_new/academic-guide/datatable/register/getMasterData/"+id+"/edit",
            dataType:"json",
            success:function(data)
            {
              $('#name').val(data.user.name);
              $('#email').val(data.user.email);
              $('#phone').val(data.user.phone);
              $('#birthdate').val(data.userPersonalInfo.birthdate);
              $('#gender').val(data.userPersonalInfo.gender);
              $('#nationality').val(data.userPersonalInfo.nationality);
              $('#nation').val(data.userPersonalInfo.nation);
              $('#address').val(data.userPersonalInfo.address);
              $('#area').val(data.userPersonalInfo.area);
              $('#degree_needed').val(data.userPersonalInfo.degree_needed);
              $('#degree_name').val(data.userAcademicInfo.degree_name);
              $('#degree_year').val(data.userAcademicInfo.degree_year);
              $('#degree_country').val(data.userAcademicInfo.degree_country);
              $('#university_name').val(data.userAcademicInfo.university_name);
              $('#faculty_name').val(data.userAcademicInfo.faculty_name);
              $('#department_name').val(data.userAcademicInfo.department_name);
              $('#gpa_precentage').val(data.userAcademicInfo.gpa_precentage);
              $('#education_system').val(data.userAcademicInfo.education_system);
              $('#destination').val(data.userAdmissionInfo.destination);
              $('#university').val(data.userAdmissionInfo.university);
              $('#faculty').val(data.userAdmissionInfo.faculty);
              $('#major').val(data.userAdmissionInfo.major);
              $('#department').val(data.userAdmissionInfo.department);
              $('#status_after_register').val(data.userAdmissionInfo.status_after_register);
              $('#paper_status').val(data.userAdmissionInfo.paper_status);
              $('#deal').val(data.userAdmissionInfo.deal);
              
              if(data.userAdmissionInfo.account_finance_first_image != null) {
                if(data.userAdmissionInfo.account_finance_first_image != 'لم يرسل صورة الايصال') {
                  $('#account_finance_first_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.account_finance_first_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.account_finance_first_image + " width=100 height=60></a>");
                } else {
                  $('#account_finance_first_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#account_finance_first_image').html('لم يرسل صورة حتي الان');
              }
              $('#account_finance_first_number').val(data.userAdmissionInfo.account_finance_first_number);
              $('#account_finance_first_status').val(data.userAdmissionInfo.account_finance_first_status);


              if(data.userAdmissionInfo.account_finance_second_image != null) {
                if(data.userAdmissionInfo.account_finance_second_image != 'لم يرسل صورة الايصال') {
                  $('#account_finance_second_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.account_finance_second_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.account_finance_second_image + " width=100 height=60></a>");
                } else {
                  $('#account_finance_second_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#account_finance_second_image').html('لم يرسل صورة حتي الان');
              }
              $('#account_finance_second_number').val(data.userAdmissionInfo.account_finance_second_number);
              $('#account_finance_second_status').val(data.userAdmissionInfo.account_finance_second_status);
              
              if(data.userAdmissionInfo.account_finance_third_image != null) {
                if(data.userAdmissionInfo.account_finance_third_image != 'لم يرسل صورة الايصال') {
                  $('#account_finance_third_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.account_finance_third_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.account_finance_third_image + " width=100 height=60></a>");
                } else {
                  $('#account_finance_third_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#account_finance_third_image').html('لم يرسل صورة حتي الان');
              }
              $('#account_finance_third_number').val(data.userAdmissionInfo.account_finance_third_number);
              $('#account_finance_third_status').val(data.userAdmissionInfo.account_finance_third_status);


              if(data.userAdmissionInfo.account_finance_fourth_image != null) {
                if(data.userAdmissionInfo.account_finance_fourth_image != 'لم يرسل صورة الايصال') {
                  $('#account_finance_fourth_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.account_finance_fourth_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.account_finance_fourth_image + " width=100 height=60></a>");
                } else {
                  $('#account_finance_fourth_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#account_finance_fourth_image').html('لم يرسل صورة حتي الان');
              }
              $('#account_finance_fourth_number').val(data.userAdmissionInfo.account_finance_fourth_number);
              $('#account_finance_fourth_status').val(data.userAdmissionInfo.account_finance_fourth_status);

              if(data.userAdmissionInfo.other_service_image != null) {
                if(data.userAdmissionInfo.other_service_image != 'لم يرسل صورة الايصال') {
                  $('#other_service_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.other_service_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.other_service_image + " width=100 height=60></a>");
                } else {
                  $('#other_service_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#other_service_image').html('لم يرسل صورة حتي الان');
              }
              $('#other_service_number').val(data.userAdmissionInfo.other_service_number);
              $('#other_service_status').val(data.userAdmissionInfo.other_service_status);

              $('#accounts_status').val(data.userAdmissionInfo.accounts_status);
              $('#correspondence').val(data.userAdmissionInfo.correspondence);
              $('#academic_guide_register_master option').remove();
              $('#academic_guide_register_master').append("<option value=''>اختر المرشد الاكاديمي</option>");
              $('#model_number').val(data.userAdmissionInfo.model_number);   
              $('#hidden_id_register_master').val(id);
              $('.modal-title-register-master').text('تعديل السجل');
              $('#action_button_register_master').val('تعديل');
              $('#action_register_master').val('تعديل');
              $('#formModalRegisterMaster').modal('show');
            }
            })
          });

          var register_master_user_id;

          $(document).on('click', '.delete-register-master', function(){
            register_master_user_id = $(this).attr('id');
            $('.modal-title-register-master').text('تاكيد حذف السجل');
            $('#confirmModalRegisterMaster').modal('show');
          });

          $(document).on('click', '#ok_button_register_master', function() {
            $.ajax({
              url: "/egec_new/academic-guide/datatable/register/getMasterData/"+register_master_user_id+"/delete",
              beforeSend:function(){
                $('#ok_button_register_master').text('...جاري الحذف');
              },
              success:function(data)
              {
                $('#confirmModalRegisterMaster').modal('hide');
                $('#register-master-users-table').DataTable().ajax.reload();
              }
            })
          });

          $('#register-master-form').on('submit', function(event){
            event.preventDefault();
            var action_url = '';

            if($('#action_register_master').val() == 'تعديل')
            {
            action_url = "{{ route('academicGuideGetRegisterMasterDataUserIdUpdate') }}";
            }

            $.ajax({
            url: action_url,
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
              var html = '';
              if(data.errors)
              {
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
              }
              if(data.success)
              {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              $('#register-master-form')[0].reset();
              $('#register-master-users-table').DataTable().ajax.reload();
              }
              $('#form_result_register_master').html(html);
              $('#formModalRegisterMaster').modal('hide');
            }
            });
          });




          $('#register-phd-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url:  '{!! route('academicGuideGetRegisterPhdData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},
                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_address', name: 'personal_info.address'},
                {data: 'personal_info_area', name: 'personal_info.area'},
                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},
                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_university_name', name: 'academic_info.university_name'},
                {data: 'academic_info_faculty_name', name: 'academic_info.faculty_name'},
                {data: 'academic_info_master_name', name: 'academic_info.master_name'},
                {data: 'academic_info_gpa_precentage', name: 'academic_info.gpa_precentage'},
                {data: 'admission_info_destination', name: 'user_admission_forms.destination'},
                {data: 'admission_info_university', name: 'user_admission_forms.university'},
                {data: 'admission_info_faculty', name: 'user_admission_forms.faculty'},
                {data: 'admission_info_major', name: 'user_admission_forms.major'},
                {data: 'admission_info_department', name: 'user_admission_forms.department'},
                {data: 'admission_info_status_after_register', name: 'user_admission_forms.status_after_register'},
                {data: 'admission_info_paper_status', name: 'user_admission_forms.paper_status'},
                {data: 'admission_info_deal', name: 'user_admission_forms.deal'},
                
                {data: 'admission_info_account_finance_first_image', name: 'user_admission_forms.account_finance_first_image'},
                {data: 'admission_info_account_finance_first_number', name: 'user_admission_forms.account_finance_first_number'},
                {data: 'admission_info_account_finance_first_status', name: 'user_admission_forms.account_finance_first_status'},
                {data: 'admission_info_account_finance_second_image', name: 'user_admission_forms.account_finance_second_image'},
                {data: 'admission_info_account_finance_second_number', name: 'user_admission_forms.account_finance_second_number'},
                {data: 'admission_info_account_finance_second_status', name: 'user_admission_forms.account_finance_second_status'},
                {data: 'admission_info_account_finance_third_image', name: 'user_admission_forms.account_finance_third_image'},
                {data: 'admission_info_account_finance_third_number', name: 'user_admission_forms.account_finance_third_number'},
                {data: 'admission_info_account_finance_third_status', name: 'user_admission_forms.account_finance_third_status'},
                {data: 'admission_info_account_finance_fourth_image', name: 'user_admission_forms.account_finance_fourth_image'},
                {data: 'admission_info_account_finance_fourth_number', name: 'user_admission_forms.account_finance_fourth_number'},
                {data: 'admission_info_account_finance_fourth_status', name: 'user_admission_forms.account_finance_fourth_status'},

                {data: 'admission_info_accounts_status', name: 'user_admission_forms.accounts_status'},
                {data: 'admission_info_correspondence', name: 'user_admission_forms.correspondence'},
                {data: 'admission_info_day', name: 'user_admission_forms.day'},
                {data: 'admission_info_month', name: 'user_admission_forms.month'},
                {data: 'admission_info_year', name: 'user_admission_forms.year'},
                {data: 'admission_info_registered_day', name: 'user_admission_forms.register_day'},
                {data: 'admission_info_registered_month', name: 'user_admission_forms.register_month'},
                {data: 'admission_info_registered_year', name: 'user_admission_forms.register_year'},
                {data: 'admission_info_academic_guide', name: 'user_admission_forms.academic_guide'},
                {data: 'admission_info_model_number', name: 'user_admission_forms.model_number'},
                {data: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $(document).on('click', '.edit-register-phd', function(){
            var id = $(this).attr('id');
            $('#form_result_register_phd').html('');
            $('#form_result_register_bachelor').html('');
            $('#account_finance_first_image').html('');
            $('#account_finance_second_image').html('');
            $('#account_finance_third_image').html('');
            $('#account_finance_fourth_image').html('');
            $.ajax({
            url: "/egec_new/academic-guide/datatable/register/getPhdData/"+id+"/edit",
            dataType:"json",
            success:function(data)
            {
              $('#name').val(data.user.name);
              $('#email').val(data.user.email);
              $('#phone').val(data.user.phone);
              $('#birthdate').val(data.userPersonalInfo.birthdate);
              $('#gender').val(data.userPersonalInfo.gender);
              $('#nationality').val(data.userPersonalInfo.nationality);
              $('#nation').val(data.userPersonalInfo.nation);
              $('#address').val(data.userPersonalInfo.address);
              $('#area').val(data.userPersonalInfo.area);
              $('#degree_needed').val(data.userPersonalInfo.degree_needed);
              $('#degree_name').val(data.userAcademicInfo.degree_name);
              $('#degree_year').val(data.userAcademicInfo.degree_year);
              $('#degree_country').val(data.userAcademicInfo.degree_country);
              $('#university_name').val(data.userAcademicInfo.university_name);
              $('#faculty_name').val(data.userAcademicInfo.faculty_name);
              $('#master_name').val(data.userAcademicInfo.master_name);
              $('#gpa_precentage').val(data.userAcademicInfo.gpa_precentage);
              $('#destination').val(data.userAdmissionInfo.destination);
              $('#university').val(data.userAdmissionInfo.university);
              $('#faculty').val(data.userAdmissionInfo.faculty);
              $('#major').val(data.userAdmissionInfo.major);
              $('#department').val(data.userAdmissionInfo.department);
              $('#status_after_register').val(data.userAdmissionInfo.status_after_register);
              $('#paper_status').val(data.userAdmissionInfo.paper_status);
              $('#deal').val(data.userAdmissionInfo.deal);

              if(data.userAdmissionInfo.account_finance_first_image != null) {
                if(data.userAdmissionInfo.account_finance_first_image != 'لم يرسل صورة الايصال') {
                  $('#account_finance_first_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.account_finance_first_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.account_finance_first_image + " width=100 height=60></a>");
                } else {
                  $('#account_finance_first_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#account_finance_first_image').html('لم يرسل صورة حتي الان');
              }
              $('#account_finance_first_number').val(data.userAdmissionInfo.account_finance_first_number);
              $('#account_finance_first_status').val(data.userAdmissionInfo.account_finance_first_status);


              if(data.userAdmissionInfo.account_finance_second_image != null) {
                if(data.userAdmissionInfo.account_finance_second_image != 'لم يرسل صورة الايصال') {
                  $('#account_finance_second_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.account_finance_second_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.account_finance_second_image + " width=100 height=60></a>");
                } else {
                  $('#account_finance_second_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#account_finance_second_image').html('لم يرسل صورة حتي الان');
              }
              $('#account_finance_second_number').val(data.userAdmissionInfo.account_finance_second_number);
              $('#account_finance_second_status').val(data.userAdmissionInfo.account_finance_second_status);
              
              if(data.userAdmissionInfo.account_finance_third_image != null) {
                if(data.userAdmissionInfo.account_finance_third_image != 'لم يرسل صورة الايصال') {
                  $('#account_finance_third_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.account_finance_third_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.account_finance_third_image + " width=100 height=60></a>");
                } else {
                  $('#account_finance_third_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#account_finance_third_image').html('لم يرسل صورة حتي الان');
              }
              $('#account_finance_third_number').val(data.userAdmissionInfo.account_finance_third_number);
              $('#account_finance_third_status').val(data.userAdmissionInfo.account_finance_third_status);


              if(data.userAdmissionInfo.account_finance_fourth_image != null) {
                if(data.userAdmissionInfo.account_finance_fourth_image != 'لم يرسل صورة الايصال') {
                  $('#account_finance_fourth_image').append("<a href=/egec_new/movement/" + data.userAdmissionInfo.account_finance_fourth_image + " target=_blank><img src=/egec_new/movement/" + data.userAdmissionInfo.account_finance_fourth_image + " width=100 height=60></a>");
                } else {
                  $('#account_finance_fourth_image').html('لم يرسل صورة الايصال');
                }
              } else {
                $('#account_finance_fourth_image').html('لم يرسل صورة حتي الان');
              }
              $('#account_finance_fourth_number').val(data.userAdmissionInfo.account_finance_fourth_number);
              $('#account_finance_fourth_status').val(data.userAdmissionInfo.account_finance_fourth_status);

              $('#accounts_status').val(data.userAdmissionInfo.accounts_status);
              $('#correspondence').val(data.userAdmissionInfo.correspondence);
              $('#academic_guide_register_phd option').remove();
              $('#academic_guide_register_phd').append("<option value=''>اختر المرشد الاكاديمي</option>");
              $('#model_number').val(data.userAdmissionInfo.model_number);   
              $('#hidden_id_register_phd').val(id);
              $('.modal-title-register-phd').text('تعديل السجل');
              $('#action_button_register_phd').val('تعديل');
              $('#action_register_phd').val('تعديل');
              $('#formModalRegisterPhd').modal('show');
            }
            })
          });

          var register_phd_user_id;

          $(document).on('click', '.delete-register-phd', function(){
            register_phd_user_id = $(this).attr('id');
            $('.modal-title-register-phd').text('تاكيد حذف السجل');
            $('#confirmModalRegisterPhd').modal('show');
          });

          $(document).on('click', '#ok_button_register_phd', function() {
            $.ajax({
              url: "/egec_new/academic-guide/datatable/register/getPhdData/"+register_phd_user_id+"/delete",
              beforeSend:function(){
                $('#ok_button_register_phd').text('...جاري الحذف');
              },
              success:function(data)
              {
                $('#confirmModalRegisterPhd').modal('hide');
                $('#register-phd-users-table').DataTable().ajax.reload();
              }
            })
          });

          $('#register-phd-form').on('submit', function(event){
            event.preventDefault();
            var action_url = '';

            if($('#action_register_phd').val() == 'تعديل')
            {
            action_url = "{{ route('academicGuideGetRegisterPhdDataUserIdUpdate') }}";
            }

            $.ajax({
            url: action_url,
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
              var html = '';
              if(data.errors)
              {
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
              }
              if(data.success)
              {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              $('#register-phd-form')[0].reset();
              $('#register-phd-users-table').DataTable().ajax.reload();
              }
              $('#form_result_register_phd').html(html);
              $('#formModalRegisterPhd').modal('hide');
            }
            });
          });



          $('#movement-bachelor-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetMovementBachelorData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
              {data: 'id', name: 'id'},

              {data: 'file_movement_passport', name: 'file_movement.passport'},
              {data: 'file_movement_passport_status', name: 'file_movement.passport_status'},
              {data: 'file_movement_secondary_certificate', name: 'file_movement.secondary_certificate'},
              {data: 'file_movement_secondary_certificate_status', name: 'file_movement.secondary_certificate_status'},
              {data: 'file_movement_birth_certificate', name: 'file_movement.birth_certificate'},
              {data: 'file_movement_birth_certificate_status', name: 'file_movement.birth_certificate_status'},
              {data: 'file_movement_diploma', name: 'file_movement.diploma'},
              {data: 'file_movement_diploma_status', name: 'file_movement.diploma_status'},
              {data: 'file_movement_authorization', name: 'file_movement.authorization'},
              {data: 'file_movement_authorization_status', name: 'file_movement.authorization_status'},
              {data: 'file_movement_image', name: 'file_movement.image'},
              {data: 'file_movement_image_status', name: 'file_movement.image_status'},
              {data: 'file_movement_last_document', name: 'user_admission_forms.last_document'},
              {data: 'file_movement_last_document_status', name: 'user_admission_forms.last_document_status'},

              {data: 'file_movement_capabilities', name: 'file_movement.capabilities'},
              {data: 'file_movement_other', name: 'file_movement.other'},
              {data: 'file_movement_day', name: 'file_movement.day'},
              {data: 'file_movement_month', name: 'file_movement.month'},
              {data: 'file_movement_year', name: 'file_movement.year'},
              {data: 'file_movement_delegate_day', name: 'file_movement.delegate_day'},
              {data: 'file_movement_delegate_month', name: 'file_movement.delegate_month'},
              {data: 'file_movement_delegate_year', name: 'file_movement.delegate_year'},
              {data: 'file_movement_steps', name: 'file_movement.steps'},
              {data: 'file_movement_delegate_status', name: 'user_admission_forms.delegate_status'},
              {data: 'file_movement_comment', name: 'user_admission_forms.comment'},
              {data: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $(document).on('click', '.edit-movement-bachelor', function(){
            var id = $(this).attr('id');
            $('#form_result_movement_bachelor').html('');
            $('#passport').html('');
            $('#secondary_certificate').html('');
            $('#birth_certificate').html('');
            $('#diploma').html('');
            $('#authorization').html('');
            $('#image').html('');
            $('#last_document').html('');
            $.ajax({
            url: "/egec_new/academic-guide/datatable/movement/getBachelorData/"+id+"/edit",
            dataType:"json",
            success:function(data)
            {
              if(data.userMovementFiles.passport != null) {
                $('#passport').append("<a href=/egec_new/movement/" + data.userMovementFiles.passport + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.passport + " width=100 height=60></a>");
              } else {
                $('#passport').html('لم يرسل صورة حتي الان');
              }
              $('#passport_status').val(data.userMovementFiles.passport_status);
              
              if(data.userMovementFiles.secondary_certificate != null) {
                $('#secondary_certificate').append("<a href=/egec_new/movement/" + data.userMovementFiles.secondary_certificate + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.secondary_certificate + " width=100 height=60></a>");
              } else {
                $('#secondary_certificate').html('لم يرسل صورة حتي الان');
              }
              $('#secondary_certificate_status').val(data.userMovementFiles.secondary_certificate_status);
             
              if(data.userMovementFiles.birth_certificate != null) {
                $('#birth_certificate').append("<a href=/egec_new/movement/" + data.userMovementFiles.birth_certificate + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.birth_certificate + " width=100 height=60></a>");
              } else {
                $('#birth_certificate').html('لم يرسل صورة حتي الان');
              }
              $('#birth_certificate_status').val(data.userMovementFiles.birth_certificate_status);
              
              if(data.userMovementFiles.diploma != null) {
                $('#diploma').append("<a href=/egec_new/movement/" + data.userMovementFiles.diploma + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.diploma + " width=100 height=60></a>");
              } else {
                $('#diploma').html('لم يرسل صورة حتي الان');
              }
              $('#diploma_status').val(data.userMovementFiles.diploma_status);
              
              if(data.userMovementFiles.authorization != null) {
                $('#authorization').append("<a href=/egec_new/movement/" + data.userMovementFiles.authorization + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.authorization + " width=100 height=60></a>");
              } else {
                $('#authorization').html('لم يرسل صورة حتي الان');
              }
              $('#authorization_status').val(data.userMovementFiles.authorization_status);
             
              if(data.userMovementFiles.image != null) {
                $('#image').append("<a href=/egec_new/movement/" + data.userMovementFiles.image + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.image + " width=100 height=60></a>");
              } else {
                $('#image').html('لم يرسل صورة حتي الان');
              }
              $('#image_status').val(data.userMovementFiles.image_status);

              if(data.userMovementFiles.last_document != null) {
                $('#last_document').append("<a href=/egec_new/movement/" + data.userMovementFiles.last_document + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.last_document + " width=100 height=60></a>");
              } else {
                $('#last_document').html('لم يرسل صورة حتي الان');
              }
              $('#last_document_status').val(data.userMovementFiles.last_document_status);

              $('#capabilities').val(data.userMovementFiles.capabilities);
              $('#other').val(data.userMovementFiles.other);
              $('#day').val(data.userMovementFiles.day);
              $('#month').val(data.userMovementFiles.month);
              $('#year').val(data.userMovementFiles.year);
              $('#delegate_day').val(data.userMovementFiles.delegate_day);
              $('#delegate_month').val(data.userMovementFiles.delegate_month);
              $('#delegate_year').val(data.userMovementFiles.delegate_year);
              $('#steps').val(data.userMovementFiles.steps);
              $('#delegate_status').val(data.userMovementFiles.delegate_status);
              $('#last_document').val(data.userMovementFiles.last_document);
              $('#comment').val(data.userMovementFiles.comment); 
              $('#hidden_id_movement_bachelor').val(id);
              $('.modal-title-movement-bachelor').text('تعديل السجل');
              $('#action_button_movement_bachelor').val('تعديل');
              $('#action_movement_bachelor').val('تعديل');
              $('#formModalMovementBachelor').modal('show');
            }
            })
          });

          var movement_bachelor_user_id;

          $(document).on('click', '.delete-movement-bachelor', function(){
            movement_bachelor_user_id = $(this).attr('id');
            $('.modal-title-movement-bachelor').text('تاكيد حذف السجل');
            $('#confirmModalMovementBachelor').modal('show');
          });

          $(document).on('click', '#ok_button_movement_bachelor', function() {
            $.ajax({
              url: "/egec_new/academic-guide/datatable/movement/getBachelorData/"+movement_bachelor_user_id+"/delete",
              beforeSend:function(){
                $('#ok_button_movement_bachelor').text('...جاري الحذف');
              },
              success:function(data)
              {
                $('#confirmModalMovementBachelor').modal('hide');
                $('#movement-bachelor-users-table').DataTable().ajax.reload();
              }
            })
          });

          $('#movement-bachelor-form').on('submit', function(event){
            event.preventDefault();
            var action_url = '';

            if($('#action_movement_bachelor').val() == 'تعديل')
            {
            action_url = "{{ route('academicGuideGetMovementBachelorDataUserIdUpdate') }}";
            }

            $.ajax({
            url: action_url,
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
              var html = '';
              if(data.errors)
              {
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
              }
              if(data.success)
              {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              $('#movement-bachelor-form')[0].reset();
              $('#movement-bachelor-users-table').DataTable().ajax.reload();
              }
              $('#form_result_movement_bachelor').html(html);
              $('#formModalMovementBachelor').modal('hide');
            }
            });
          });






          $('#movement-master-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetMovementMasterData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                
                {data: 'file_movement_passport', name: 'file_movement.passport'},
                {data: 'file_movement_passport_status', name: 'file_movement.passport_status'},
                {data: 'file_movement_secondary_certificate', name: 'file_movement.secondary_certificate'},
                {data: 'file_movement_secondary_certificate_status', name: 'file_movement.secondary_certificate_status'},
                {data: 'file_movement_birth_certificate', name: 'file_movement.birth_certificate'},
                {data: 'file_movement_birth_certificate_status', name: 'file_movement.birth_certificate_status'},
                {data: 'file_movement_bachelor', name: 'file_movement.bachelor'},
                {data: 'file_movement_bachelor_status', name: 'file_movement.bachelor_status'},
                {data: 'file_movement_degree_transcript', name: 'file_movement.degree_transcript'},
                {data: 'file_movement_degree_transcript_status', name: 'file_movement.degree_transcript_status'},
                {data: 'file_movement_authorization', name: 'file_movement.authorization'},
                {data: 'file_movement_authorization_status', name: 'file_movement.authorization_status'},
                {data: 'file_movement_image', name: 'file_movement.image'},
                {data: 'file_movement_image_status', name: 'file_movement.image_status'},
                {data: 'file_movement_last_document', name: 'user_admission_forms.last_document'},
                {data: 'file_movement_last_document_status', name: 'user_admission_forms.last_document_status'},

                {data: 'file_movement_capabilities', name: 'file_movement.capabilities'},
                {data: 'file_movement_other', name: 'file_movement.other'},
                {data: 'file_movement_day', name: 'file_movement.day'},
                {data: 'file_movement_month', name: 'file_movement.month'},
                {data: 'file_movement_year', name: 'file_movement.year'},
                {data: 'file_movement_delegate_day', name: 'file_movement.delegate_day'},
                {data: 'file_movement_delegate_month', name: 'file_movement.delegate_month'},
                {data: 'file_movement_delegate_year', name: 'file_movement.delegate_year'},
                {data: 'file_movement_steps', name: 'file_movement.steps'},
                {data: 'file_movement_delegate_status', name: 'user_admission_forms.delegate_status'},
                {data: 'file_movement_equation_date', name: 'user_admission_forms.equation_date'},
                {data: 'file_movement_egypt_arrival', name: 'user_admission_forms.egypt_arrival'},
                {data: 'file_movement_comment', name: 'user_admission_forms.comment'},
                {data: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $(document).on('click', '.edit-movement-master', function(){
            var id = $(this).attr('id');
            $('#form_result_movement_master').html('');
            $('#passport').html('');
            $('#secondary_certificate').html('');
            $('#birth_certificate').html('');
            $('#bachelor').html('');
            $('#degree_transcript').html('');
            $('#authorization').html('');
            $('#image').html('');
            $('#last_document').html('');
            $.ajax({
            url: "/egec_new/academic-guide/datatable/movement/getMasterData/"+id+"/edit",
            dataType:"json",
            success:function(data)
            {
              if(data.userMovementFiles.passport != null) {
                $('#passport').append("<a href=/egec_new/movement/" + data.userMovementFiles.passport + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.passport + " width=100 height=60></a>");
              } else {
                $('#passport').html('لم يرسل صورة حتي الان');
              }
              $('#passport_status').val(data.userMovementFiles.passport_status);
              
              if(data.userMovementFiles.secondary_certificate != null) {
                $('#secondary_certificate').append("<a href=/egec_new/movement/" + data.userMovementFiles.secondary_certificate + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.secondary_certificate + " width=100 height=60></a>");
              } else {
                $('#secondary_certificate').html('لم يرسل صورة حتي الان');
              }
              $('#secondary_certificate_status').val(data.userMovementFiles.secondary_certificate_status);
             
              if(data.userMovementFiles.birth_certificate != null) {
                $('#birth_certificate').append("<a href=/egec_new/movement/" + data.userMovementFiles.birth_certificate + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.birth_certificate + " width=100 height=60></a>");
              } else {
                $('#birth_certificate').html('لم يرسل صورة حتي الان');
              }
              $('#birth_certificate_status').val(data.userMovementFiles.birth_certificate_status);
              
              if(data.userMovementFiles.bachelor != null) {
                $('#bachelor').append("<a href=/egec_new/movement/" + data.userMovementFiles.bachelor + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.bachelor + " width=100 height=60></a>");
              } else {
                $('#bachelor').html('لم يرسل صورة حتي الان');
              }
              $('#bachelor_status').val(data.userMovementFiles.bachelor_status);

              if(data.userMovementFiles.degree_transcript != null) {
                $('#degree_transcript').append("<a href=/egec_new/movement/" + data.userMovementFiles.degree_transcript + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.degree_transcript + " width=100 height=60></a>");
              } else {
                $('#degree_transcript').html('لم يرسل صورة حتي الان');
              }
              $('#degree_transcript_status').val(data.userMovementFiles.degree_transcript_status);
              
              if(data.userMovementFiles.authorization != null) {
                $('#authorization').append("<a href=/egec_new/movement/" + data.userMovementFiles.authorization + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.authorization + " width=100 height=60></a>");
              } else {
                $('#authorization').html('لم يرسل صورة حتي الان');
              }
              $('#authorization_status').val(data.userMovementFiles.authorization_status);
             
              if(data.userMovementFiles.image != null) {
                $('#image').append("<a href=/egec_new/movement/" + data.userMovementFiles.image + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.image + " width=100 height=60></a>");
              } else {
                $('#image').html('لم يرسل صورة حتي الان');
              }
              $('#image_status').val(data.userMovementFiles.image_status);

              if(data.userMovementFiles.last_document != null) {
                $('#last_document').append("<a href=/egec_new/movement/" + data.userMovementFiles.last_document + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.last_document + " width=100 height=60></a>");
              } else {
                $('#last_document').html('لم يرسل صورة حتي الان');
              }
              $('#last_document_status').val(data.userMovementFiles.last_document_status);

              $('#capabilities').val(data.userMovementFiles.capabilities);
              $('#other').val(data.userMovementFiles.other);
              $('#day').val(data.userMovementFiles.day);
              $('#month').val(data.userMovementFiles.month);
              $('#year').val(data.userMovementFiles.year);
              $('#delegate_day').val(data.userMovementFiles.delegate_day);
              $('#delegate_month').val(data.userMovementFiles.delegate_month);
              $('#delegate_year').val(data.userMovementFiles.delegate_year);
              $('#steps').val(data.userMovementFiles.steps);
              $('#delegate_status').val(data.userMovementFiles.delegate_status);
              $('#equation_date').val(data.userMovementFiles.equation_date);
              $('#egypt_arrival').val(data.userMovementFiles.egypt_arrival);
              $('#comment').val(data.userMovementFiles.comment);   
              $('#hidden_id_movement_master').val(id);
              $('.modal-title-movement-master').text('تعديل السجل');
              $('#action_button_movement_master').val('تعديل');
              $('#action_movement_master').val('تعديل');
              $('#formModalMovementMaster').modal('show');
            }
            })
          });

          var movement_master_user_id;

          $(document).on('click', '.delete-movement-master', function(){
            movement_master_user_id = $(this).attr('id');
            $('.modal-title-movement-master').text('تاكيد حذف السجل');
            $('#confirmModalMovementMaster').modal('show');
          });

          $(document).on('click', '#ok_button_movement_master', function() {
            $.ajax({
              url: "/egec_new/academic-guide/datatable/movement/getMasterData/"+movement_master_user_id+"/delete",
              beforeSend:function(){
                $('#ok_button_movement_master').text('...جاري الحذف');
              },
              success:function(data)
              {
                $('#confirmModalmovementMaster').modal('hide');
                $('#movement-master-users-table').DataTable().ajax.reload();
              }
            })
          });

          $('#movement-master-form').on('submit', function(event){
            event.preventDefault();
            var action_url = '';

            if($('#action_movement_master').val() == 'تعديل')
            {
            action_url = "{{ route('academicGuideGetMovementMasterDataUserIdUpdate') }}";
            }

            $.ajax({
            url: action_url,
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
              var html = '';
              if(data.errors)
              {
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
              }
              if(data.success)
              {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              $('#movement-master-form')[0].reset();
              $('#movement-master-users-table').DataTable().ajax.reload();
              }
              $('#form_result_movement_master').html(html);
              $('#formModalMovementMaster').modal('hide');
            }
            });
          });




          $('#movement-phd-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('academicGuideGetMovementPhdData') !!}',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                
                {data: 'file_movement_passport', name: 'file_movement.passport'},
                {data: 'file_movement_passport_status', name: 'file_movement.passport_status'},
                {data: 'file_movement_secondary_certificate', name: 'file_movement.secondary_certificate'},
                {data: 'file_movement_secondary_certificate_status', name: 'file_movement.secondary_certificate_status'},
                {data: 'file_movement_birth_certificate', name: 'file_movement.birth_certificate'},
                {data: 'file_movement_birth_certificate_status', name: 'file_movement.birth_certificate_status'},
                {data: 'file_movement_master', name: 'file_movement.master'},
                {data: 'file_movement_master_status', name: 'file_movement.master_status'},
                {data: 'file_movement_authorization', name: 'file_movement.authorization'},
                {data: 'file_movement_authorization_status', name: 'file_movement.authorization_status'},
                {data: 'file_movement_image', name: 'file_movement.image'},
                {data: 'file_movement_image_status', name: 'file_movement.image_status'},
                {data: 'file_movement_last_document', name: 'user_admission_forms.last_document'},
                {data: 'file_movement_last_document_status', name: 'user_admission_forms.last_document_status'},

                {data: 'file_movement_capabilities', name: 'file_movement.capabilities'},
                {data: 'file_movement_other', name: 'file_movement.other'},
                {data: 'file_movement_day', name: 'file_movement.day'},
                {data: 'file_movement_month', name: 'file_movement.month'},
                {data: 'file_movement_year', name: 'file_movement.year'},
                {data: 'file_movement_delegate_day', name: 'file_movement.delegate_day'},
                {data: 'file_movement_delegate_month', name: 'file_movement.delegate_month'},
                {data: 'file_movement_delegate_year', name: 'file_movement.delegate_year'},
                {data: 'file_movement_steps', name: 'file_movement.steps'},
                {data: 'file_movement_delegate_status', name: 'user_admission_forms.delegate_status'},
                {data: 'file_movement_equation_date', name: 'user_admission_forms.equation_date'},
                {data: 'file_movement_egypt_arrival', name: 'user_admission_forms.egypt_arrival'},
                {data: 'file_movement_comment', name: 'user_admission_forms.comment'},
                {data: 'action', orderable: false, searchable: false},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("w-100")
              });
            }
          });

          $(document).on('click', '.edit-movement-phd', function(){
            var id = $(this).attr('id');
            $('#form_result_movement_phd').html('');
            $('#passport').html('');
            $('#secondary_certificate').html('');
            $('#birth_certificate').html('');
            $('#master').html('');
            $('#authorization').html('');
            $('#image').html('');
            $('#last_document').html('');
            $.ajax({
            url: "/egec_new/academic-guide/datatable/movement/getPhdData/"+id+"/edit",
            dataType:"json",
            success:function(data)
            {
              if(data.userMovementFiles.passport != null) {
                $('#passport').append("<a href=/egec_new/movement/" + data.userMovementFiles.passport + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.passport + " width=100 height=60></a>");
              } else {
                $('#passport').html('لم يرسل صورة حتي الان');
              }
              $('#passport_status').val(data.userMovementFiles.passport_status);
              
              if(data.userMovementFiles.secondary_certificate != null) {
                $('#secondary_certificate').append("<a href=/egec_new/movement/" + data.userMovementFiles.secondary_certificate + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.secondary_certificate + " width=100 height=60></a>");
              } else {
                $('#secondary_certificate').html('لم يرسل صورة حتي الان');
              }
              $('#secondary_certificate_status').val(data.userMovementFiles.secondary_certificate_status);
             
              if(data.userMovementFiles.birth_certificate != null) {
                $('#birth_certificate').append("<a href=/egec_new/movement/" + data.userMovementFiles.birth_certificate + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.birth_certificate + " width=100 height=60></a>");
              } else {
                $('#birth_certificate').html('لم يرسل صورة حتي الان');
              }
              $('#birth_certificate_status').val(data.userMovementFiles.birth_certificate_status);
              
              if(data.userMovementFiles.master != null) {
                $('#master').append("<a href=/egec_new/movement/" + data.userMovementFiles.master + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.master + " width=100 height=60></a>");
              } else {
                $('#master').html('لم يرسل صورة حتي الان');
              }
              $('#master_status').val(data.userMovementFiles.master_status);
              
              if(data.userMovementFiles.authorization != null) {
                $('#authorization').append("<a href=/egec_new/movement/" + data.userMovementFiles.authorization + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.authorization + " width=100 height=60></a>");
              } else {
                $('#authorization').html('لم يرسل صورة حتي الان');
              }
              $('#authorization_status').val(data.userMovementFiles.authorization_status);
             
              if(data.userMovementFiles.image != null) {
                $('#image').append("<a href=/egec_new/movement/" + data.userMovementFiles.image + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.image + " width=100 height=60></a>");
              } else {
                $('#image').html('لم يرسل صورة حتي الان');
              }
              $('#image_status').val(data.userMovementFiles.image_status);

              if(data.userMovementFiles.last_document != null) {
                $('#last_document').append("<a href=/egec_new/movement/" + data.userMovementFiles.last_document + " target=_blank><img src=/egec_new/movement/" + data.userMovementFiles.last_document + " width=100 height=60></a>");
              } else {
                $('#last_document').html('لم يرسل صورة حتي الان');
              }
              $('#last_document_status').val(data.userMovementFiles.last_document_status);

              $('#capabilities').val(data.userMovementFiles.capabilities);
              $('#other').val(data.userMovementFiles.other);
              $('#day').val(data.userMovementFiles.day);
              $('#month').val(data.userMovementFiles.month);
              $('#year').val(data.userMovementFiles.year);
              $('#delegate_day').val(data.userMovementFiles.delegate_day);
              $('#delegate_month').val(data.userMovementFiles.delegate_month);
              $('#delegate_year').val(data.userMovementFiles.delegate_year);
              $('#steps').val(data.userMovementFiles.steps);
              $('#delegate_status').val(data.userMovementFiles.delegate_status);
              $('#equation_date').val(data.userMovementFiles.equation_date);
              $('#egypt_arrival').val(data.userMovementFiles.egypt_arrival);
              $('#comment').val(data.userMovementFiles.comment);   
              $('#hidden_id_movement_phd').val(id);
              $('.modal-title-movement-phd').text('تعديل السجل');
              $('#action_button_movement_phd').val('تعديل');
              $('#action_movement_phd').val('تعديل');
              $('#formModalMovementPhd').modal('show');
            }
            })
          });

          var movement_phd_user_id;

          $(document).on('click', '.delete-movement-phd', function(){
            movement_phd_user_id = $(this).attr('id');
            $('.modal-title-movement-phd').text('تاكيد حذف السجل');
            $('#confirmModalMovementPhd').modal('show');
          });

          $(document).on('click', '#ok_button_movement_phd', function() {
            $.ajax({
              url: "/egec_new/academic-guide/datatable/movement/getPhdData/"+movement_phd_user_id+"/delete",
              beforeSend:function(){
                $('#ok_button_movement_phd').text('...جاري الحذف');
              },
              success:function(data)
              {
                $('#confirmModalmovementPhd').modal('hide');
                $('#movement-phd-users-table').DataTable().ajax.reload();
              }
            })
          });

          $('#movement-phd-form').on('submit', function(event){
            event.preventDefault();
            var action_url = '';

            if($('#action_movement_phd').val() == 'تعديل')
            {
            action_url = "{{ route('academicGuideGetMovementPhdDataUserIdUpdate') }}";
            }

            $.ajax({
            url: action_url,
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
              var html = '';
              if(data.errors)
              {
              html = '<div class="alert alert-danger">';
              for(var count = 0; count < data.errors.length; count++)
              {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
              }
              if(data.success)
              {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              $('#movement-phd-form')[0].reset();
              $('#movement-phd-users-table').DataTable().ajax.reload();
              }
              $('#form_result_movement_phd').html(html);
              $('#formModalMovementPhd').modal('hide');
            }
            });
          });



          $('#register-bachelor-destination-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('getRegisterBachelorDestinationData') !!}',
              data: function (d) {
                  d.destination = $('#destination').val();
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'personal_info_full_name', name: 'personal_info.full_name'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},
                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},
                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_school_name', name: 'academic_info.school_name'},
                {data: 'academic_info_percentage', name: 'academic_info.percentage'},
                {data: 'academic_info_day', name: 'academic_info.day'},
                {data: 'academic_info_month', name: 'academic_info.month'},
                {data: 'academic_info_year', name: 'academic_info.year'},
                {data: 'user_admission_forms_destination', name: 'user_admission_forms.destination_id'},
                {data: 'user_admission_forms_university', name: 'user_admission_forms.university_id'},
                {data: 'user_admission_forms_faculty', name: 'user_admission_forms.faculty_id'},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
              });
            }
          });

          $('#register-master-destination-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('getRegisterMasterDestinationData') !!}',
              data: function (d) {
                  d.destination = $('#destination').val();
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'personal_info_full_name', name: 'personal_info.full_name'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},
                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},
                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_university_name', name: 'academic_info.university_name'},
                {data: 'academic_info_faculty_name', name: 'academic_info.faculty_name'},
                {data: 'academic_info_department_name', name: 'academic_info.department_name'},
                {data: 'academic_info_day', name: 'academic_info.day'},
                {data: 'academic_info_month', name: 'academic_info.month'},
                {data: 'academic_info_year', name: 'academic_info.year'},
                {data: 'user_admission_forms_destination', name: 'user_admission_forms.destination_id'},
                {data: 'user_admission_forms_university', name: 'user_admission_forms.university_id'},
                {data: 'user_admission_forms_faculty', name: 'user_admission_forms.faculty_id'},
                {data: 'user_admission_forms_major', name: 'user_admission_forms.major_id'},
                {data: 'user_admission_forms_department', name: 'user_admission_forms.department_id'},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
              });
            }
          });

          $('#register-bachelor-destination-university-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('registerBachelorDestinationUniversityData') !!}',
              data: function (d) {
                  d.university = $('#university').val();
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'personal_info_full_name', name: 'personal_info.full_name'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},
                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},
                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_school_name', name: 'academic_info.school_name'},
                {data: 'academic_info_percentage', name: 'academic_info.percentage'},
                {data: 'academic_info_day', name: 'academic_info.day'},
                {data: 'academic_info_month', name: 'academic_info.month'},
                {data: 'academic_info_year', name: 'academic_info.year'},
                {data: 'user_admission_forms_destination', name: 'user_admission_forms.destination_id'},
                {data: 'user_admission_forms_university', name: 'user_admission_forms.university_id'},
                {data: 'user_admission_forms_faculty', name: 'user_admission_forms.faculty_id'},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
              });
            }
          });

          $('#register-master-destination-university-users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: '{!! route('registerMasterDestinationUniversityData') !!}',
              data: function (d) {
                  d.university = $('#university').val();
              }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'personal_info_full_name', name: 'personal_info.full_name'},
                {data: 'personal_info_birthdate', name: 'personal_info.birthdate'},
                {data: 'personal_info_gender', name: 'personal_info.gender'},
                {data: 'personal_info_nationality', name: 'personal_info.nationality'},
                {data: 'personal_info_nation', name: 'personal_info.nation'},
                {data: 'personal_info_degree_needed', name: 'personal_info.degree_needed'},
                {data: 'academic_info_degree_name', name: 'academic_info.degree_name'},
                {data: 'academic_info_degree_year', name: 'academic_info.degree_year'},
                {data: 'academic_info_degree_country', name: 'academic_info.degree_country'},
                {data: 'academic_info_university_name', name: 'academic_info.university_name'},
                {data: 'academic_info_faculty_name', name: 'academic_info.faculty_name'},
                {data: 'academic_info_department_name', name: 'academic_info.department_name'},
                {data: 'academic_info_day', name: 'academic_info.day'},
                {data: 'academic_info_month', name: 'academic_info.month'},
                {data: 'academic_info_year', name: 'academic_info.year'},
                {data: 'user_admission_forms_destination', name: 'user_admission_forms.destination_id'},
                {data: 'user_admission_forms_university', name: 'user_admission_forms.university_id'},
                {data: 'user_admission_forms_faculty', name: 'user_admission_forms.faculty_id'},
                {data: 'user_admission_forms_major', name: 'user_admission_forms.major_id'},
                {data: 'user_admission_forms_department', name: 'user_admission_forms.department_id'},
            ],
            initComplete: function () {
              this.api().columns().every(function () {
                  var column = this;
                  var input = document.createElement("input");
                  $(input).appendTo($(column.footer()).empty())
                  .on('change', function () {
                      column.search($(this).val(), false, false, true).draw();
                  });
                  $(input).addClass("form-control")

              });
            }
          });

        $().ready(function() {
          $sidebar = $('.sidebar');

          $sidebar_img_container = $sidebar.find('.sidebar-background');

          $full_page = $('.full-page');

          $sidebar_responsive = $('body > .navbar-collapse');

          window_width = $(window).width();

          $('.fixed-plugin a').click(function(event) {
            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if ($(this).hasClass('switch-trigger')) {
              if (event.stopPropagation) {
                event.stopPropagation();
              } else if (window.event) {
                window.event.cancelBubble = true;
              }
            }
          });

          $('.fixed-plugin .active-color span').click(function() {
            $full_page_background = $('.full-page-background');

            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('color');

            if ($sidebar.length != 0) {
              $sidebar.attr('data-color', new_color);
            }

            if ($full_page.length != 0) {
              $full_page.attr('filter-color', new_color);
            }

            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.attr('data-color', new_color);
            }
          });

          $('.fixed-plugin .background-color .badge').click(function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('background-color');

            if ($sidebar.length != 0) {
              $sidebar.attr('data-background-color', new_color);
            }
          });

          $('.fixed-plugin .img-holder').click(function() {
            $full_page_background = $('.full-page-background');

            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');


            var new_image = $(this).find("img").attr('src');

            if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              $sidebar_img_container.fadeOut('fast', function() {
                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $sidebar_img_container.fadeIn('fast');
              });
            }

            if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

              $full_page_background.fadeOut('fast', function() {
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                $full_page_background.fadeIn('fast');
              });
            }

            if ($('.switch-sidebar-image input:checked').length == 0) {
              var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
              var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            }

            if ($sidebar_responsive.length != 0) {
              $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
            }
          });

          $('.switch-sidebar-image input').change(function() {
            $full_page_background = $('.full-page-background');

            $input = $(this);

            if ($input.is(':checked')) {
              if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn('fast');
                $sidebar.attr('data-image', '#');
              }

              if ($full_page_background.length != 0) {
                $full_page_background.fadeIn('fast');
                $full_page.attr('data-image', '#');
              }

              background_image = true;
            } else {
              if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr('data-image');
                $sidebar_img_container.fadeOut('fast');
              }

              if ($full_page_background.length != 0) {
                $full_page.removeAttr('data-image', '#');
                $full_page_background.fadeOut('fast');
              }

              background_image = false;
            }
          });

          $('#category_id').change(function() {
            var category_id = $('#category_id').val();
            $.ajax({
              url: "{{ url('/filterSubCategories') }}",
              method: 'GET',
              data: {category_id:category_id},
              success:function(data) {
                $('#sub_category_id option').remove();
                $('#sub_category_id').append("<option value=''>Select a Sub-Category</option>");
                  data.forEach(d => {
                    for($i = 0; $i < d['id'].length; $i++) {
                      $("#sub_category_id").append("<option value=" + d['id'][$i] + ">"+ d['name'][$i] +"</option>");
                    }
                  });
              }
            })
          });

          $('#sub_category_id').change(function() {
            var sub_category_id = $('#sub_category_id').val();
            $.ajax({
              url: "{{ url('/filterBrands') }}",
              method: 'GET',
              data: {sub_category_id:sub_category_id},
              success:function(data) {
                $('#brand_id option').remove();
                $('#brand_id').append("<option value=''>Select a Brand</option>");
                  data.forEach(d => {
                    for($i = 0; $i < d['id'].length; $i++) {
                      $("#brand_id").append("<option value=" + d['id'][$i] + ">"+ d['name'][$i] +"</option>");
                    }
                  });
              }
            })
          });

          $('#name').on('blur', function() {
            var name = this.value.toLowerCase().trim(),
                slugInput = $('#slug'),
                theSlug = name.replace(/&/g, '-and-')
                              .replace(/[^a-z0-9-]+/g, '-')
                              .replace(/\-\-+/g, '-')
                              .replace(/^-+|-+$/g, '-')

                slugInput.val(theSlug)
          });

          $('#is_redeem').change(function() {
              var is_redeem = $('#is_redeem').val();
              if(is_redeem == '1') {
                  $('#show-personal-points-if-redeem').show(); 
                  $('#show-referral-points-if-redeem').show();                    
              } else {
                  $('#personal_points').val("");
                  $('#referral_points').val("");
                  $('#show-personal-points-if-redeem').hide(); 
                  $('#show-referral-points-if-redeem').hide();                                  
              }
          });

          $('.switch-sidebar-mini input').change(function() {
            $body = $('body');

            $input = $(this);

            if (md.misc.sidebar_mini_active == true) {
              $('body').removeClass('sidebar-mini');
              md.misc.sidebar_mini_active = false;

              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

            } else {

              $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

              setTimeout(function() {
                $('body').addClass('sidebar-mini');

                md.misc.sidebar_mini_active = true;
              }, 300);
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function() {
              window.dispatchEvent(new Event('resize'));
            }, 180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function() {
              clearInterval(simulateWindowResize);
            }, 1000);

          });
        });
      });
    </script>
  @stack('js')
</body>

</html>