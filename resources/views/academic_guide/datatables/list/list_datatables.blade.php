@extends('academic_guide.layouts.app')

@php $pageTitle = 'قائمه العملاء'; @endphp

@section('title')
    {{ $pageTitle }}
@endsection

@section('content')

    <div class="card px-2">
        <div class="card-header card-header-primary mb-4">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h4 class="card-title text-white">{{ $pageTitle }} </h4>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-border-right" id="list-users-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="mw-120px">الاسم</th>
                        <th class="mw-120px">البريد الالكتروني</th>
                        <th class="mw-120px">رقم الهاتف</th>
                        <th class="mw-120px">الحاله</th>
                        <th class="mw-120px">حاله المكالمات</th>
                        <th class="mw-120px">المصدر</th>
                        <th class="mw-120px">الملاحظات</th>
                        <th class="mw-120px">تاريخ الميلاد</th>
                        <th class="mw-120px">النوع</th>
                        <th class="mw-120px">الجنسيه</th>
                        <th class="mw-120px">البلد</th>
                        <th class="mw-120px">العنوان</th>
                        <th class="mw-120px">المنطقه</th>
                        <th class="mw-120px">الدرجه العلميه المطلوبه</th>
                        <th class="mw-120px">اسم الدرجه العلميه</th>
                        <th class="mw-120px">سنه الدرجه العلميه</th>
                        <th class="mw-120px">بلد الدرجه العلميه</th>
                        <th class="mw-120px">اسم المدرسه</th>
                        <th class="mw-120px">اسم الجامعه</th>
                        <th class="mw-120px">اسم الكليه</th>
                        <th class="mw-120px">اسم القسم</th>
                        <th class="mw-120px">المجموع التراكمي او الدرجه المئوية</th>
                        <th class="mw-120px">نظام التعليم</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th class="mw-120px">الاسم</th>
                        <th class="mw-120px">البريد الالكتروني</th>
                        <th class="mw-120px">رقم الهاتف</th>
                        <th class="mw-120px">الحاله</th>
                        <th class="mw-120px">حاله المكالمات</th>
                        <th class="mw-120px">المصدر</th>
                        <th class="mw-120px">الملاحظات</th>
                        <th class="mw-120px">تاريخ الميلاد</th>
                        <th class="mw-120px">النوع</th>
                        <th class="mw-120px">الجنسيه</th>
                        <th class="mw-120px">البلد</th>
                        <th class="mw-120px">العنوان</th>
                        <th class="mw-120px">المنطقه</th>
                        <th class="mw-120px">الدرجه العلميه المطلوبه</th>
                        <th class="mw-120px">اسم الدرجه العلميه</th>
                        <th class="mw-120px">سنه الدرجه العلميه</th>
                        <th class="mw-120px">بلد الدرجه العلميه</th>
                        <th class="mw-120px">اسم المدرسه</th>
                        <th class="mw-120px">اسم الجامعه</th>
                        <th class="mw-120px">اسم الكليه</th>
                        <th class="mw-120px">اسم القسم</th>
                        <th class="mw-120px">المجموع التراكمي او الدرجه المئوية</th>
                        <th class="mw-120px">نظام التعليم</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


@endsection