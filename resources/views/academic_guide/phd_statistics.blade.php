@extends('academic_guide.layouts.app')

@php $pageTitle = 'احصائيات الدكتوراه'; @endphp

@section('title')
  {{ $pageTitle }}
@endsection

@section('content')

    <h2>إحصاءات عامة للدكتوراه</h2>
    <hr>
    <section id="dashboard-ecommerce">
        <div class="row align-items-center">
            <!-- Multi Radial Chart Starts -->
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">مخطط دائري لنسبة الدكتوراه</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body pl-0">
                            <div id="pie_chart" class="pieChartJs"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="row">
                    <!-- Statistics Cards Starts -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-4 col-12">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                                <i class="bx bx-user font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis">عدد الدكتوراه</div>
                                            <h3 class="mb-0">{{ $numberOfPhDUsers }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-4 col-12">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                <i class="bx bx-briefcase-alt font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis">عدد عملاء الدكتوراه</div>
                                            <h3 class="mb-0">{{ $numberOfUnRegisteredPhDUsers }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-4 col-12">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                                <i class="bx bx-briefcase-alt font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis">عدد تسجيل الدكتوراه</div>
                                            <h3 class="mb-0">{{ $numberOfRegisteredPhDUsers }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Revenue Growth Chart Starts -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">مخطط شريطي لعدد المستخدمين المسجلين وغير المسجلين لدرجة الدكتوراه</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body pl-0">
                            <div id="phd_line_chart" class="pieChartJs"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Latest Update Starts -->
            <div class="col-xl-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center pb-50">
                        <h4 class="card-title">الحسابات لدرجه الدكتوراه</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body p-0 pb-1">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                    <div class="list-left d-flex">
                                        <div class="list-icon mr-1">
                                            <div class="avatar bg-rgba-danger m-0">
                                                <div class="avatar-content">
                                                    <i class="bx bx-credit-card text-danger font-size-base"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <span class="list-title">إجمالي الأموال المحصلة من الدفعة الاولى</span>
                                        </div>
                                    </div>
                                    <span>${{ $totalMoneyRecievedForFirstPayment }}</span>
                                </li>
                                <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                    <div class="list-left d-flex">
                                        <div class="list-icon mr-1">
                                            <div class="avatar bg-rgba-danger m-0">
                                                <div class="avatar-content">
                                                    <i class="bx bx-credit-card text-danger font-size-base"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <span class="list-title">إجمالي الأموال المحصلة من دفعه المتابعه الثانية</span>
                                        </div>
                                    </div>
                                    <span>${{ $totalMoneyRecievedForSecondPayment }}</span>
                                </li>
                                <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                    <div class="list-left d-flex">
                                        <div class="list-icon mr-1">
                                            <div class="avatar bg-rgba-danger m-0">
                                                <div class="avatar-content">
                                                    <i class="bx bx-credit-card text-danger font-size-base"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <span class="list-title">إجمالي الأموال المحصلة من دفعه قدم وفتح الملف</span>
                                        </div>
                                    </div>
                                    <span>${{ $totalMoneyRecievedForThirdPayment }}</span>
                                </li>
                                <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                    <div class="list-left d-flex">
                                        <div class="list-icon mr-1">
                                            <div class="avatar bg-rgba-danger m-0">
                                                <div class="avatar-content">
                                                    <i class="bx bx-credit-card text-danger font-size-base"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <span class="list-title">إجمالي الأموال المحصلة من دفعه غلق الملف</span>
                                        </div>
                                    </div>
                                    <span>${{ $totalMoneyRecievedForFourthPayment }}</span>
                                </li>
                                <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                    <div class="list-left d-flex">
                                        <div class="list-icon mr-1">
                                            <div class="avatar bg-rgba-success m-0">
                                                <div class="avatar-content">
                                                    <i class="bx bx-dollar text-success font-size-base"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <span class="list-title">اجمالي الاموال التي يجب تحصيلها</span>
                                        </div>
                                    </div>
                                    <span>${{ $totalMoneyShouldRecieved }}</span>
                                </li>
                                <li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                                    <div class="list-left d-flex">
                                        <div class="list-icon mr-1">
                                            <div class="avatar bg-rgba-success m-0">
                                                <div class="avatar-content">
                                                    <i class="bx bx-dollar text-success font-size-base"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-content">
                                            <span class="list-title">اجمالي الاموال الباقيه </span>
                                        </div>
                                    </div>
                                    <span>${{ $totalMoneyMissing }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earning Swiper Starts -->
            <!-- Marketing Campaigns Starts -->
        </div>
    </section>

@endsection

@push('js')

    <script type="text/javascript">

        var analytics3 = <?php echo $phd_degrees; ?>

        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart()
        {
        var data3 = google.visualization.arrayToDataTable(analytics3);
        
        var chart3 = new google.visualization.BarChart(document.getElementById('phd_line_chart'));
        chart3.draw(data3);
        }

    </script>

    <script type="text/javascript">

        var analytics = <?php echo $degrees; ?>

        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart()
        {
        var data = google.visualization.arrayToDataTable(analytics);
        
        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
        chart.draw(data);
        }

    </script>

@endpush