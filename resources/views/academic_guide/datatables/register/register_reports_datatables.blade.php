@extends('academic_guide.layouts.app')

@php $pageTitle = 'تقارير التسجيل'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

    <div class="card px-2">
        <div class="card-header card-header-primary mb-4">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                    <form action="" method="GET" class="row align-items-center">
                        <div class="col-{{ request()->has('from') ? '3' : '4' }}"><input class="form-control" style="border-bottom: 1px solid #fff;" type="date" id="from" name="from" value="{{ request()->has('from') ? request()->get('from') : null }}">
                        </div>
                        <div class="col-{{ request()->has('from') ? '3' : '4' }}"><input class="form-control" style="border-bottom: 1px solid #fff;" type="date" id="to" name="to" value="{{ request()->has('to') ? request()->get('to') : null }}">
                        </div>
                        <div class="col-{{ request()->has('from') ? '3' : '4' }}"><button type="submit" class="btn-block btn-round btn btn-white">Filter</button>
                        </div>
                        @if(request()->has('from'))
                          <div class="col-3"><a href="{{ route('academicGuideRegisterReportsView') }}" class="btn-block btn-round btn btn-danger">Remove</a>
                          </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <input type="hidden" name="fromdate" id="fromdate" value="{{ request()->has('from') ? request()->get('from') : null }}">
        <input type="hidden" name="todate" id="todate" value="{{ request()->has('to') ? request()->get('to') : null }}">

        <div class="table-responsive">
            <table class="table" id="register-reports-users-table">
                <thead>
                    <tr>
                        <th>اليوم</th>
                        <th>الشهر</th>
                        <th>السنه</th>
                        <th>العدد الكلي</th>
                        <th>عدد البكالوريوس</th>
                        <th>عدد الماجستير</th>
                        <th>عدد الدكتوراه</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection