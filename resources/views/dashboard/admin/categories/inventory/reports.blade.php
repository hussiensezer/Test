@extends('dashboard.layouts.master')
{{--Change The Title Each Page From Here--}}
@section('title')
  المخزون | التقارير
@endsection

{{--Add Css Links Here --}}
@section('css')
<link href="{{URL::asset('assets/plugins/datetimepicker/css/classic.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datetimepicker/css/classic.time.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="{{URL::asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css')}}">
<link href="{{URL::asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
@endsection

{{--Set The BreadCrumb Title From Here --}}
@section('breadcrumb-title')
<ion-icon name="basket-outline"></ion-icon>
<span>المخزون</span>
@endsection

{{--Set The Nested Of ListBreadCrumb  From Here --}}
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">التقارير</li>
@endsection


{{--Main Content Here--}}
@section('content')
<div class="container">
  <div class="row position-relative">
    <div class="card">
        <div class="card-body px-0">
            <div class="reports-icons d-flex align-items-center justify-content-end">
                <div class="date-icon position-relative">
                    <ion-icon name="calendar-outline" class="fs-4" title="التاريخ"></ion-icon>
                    <form action="#" name="filter-date">
                        <input type="text" name="filter-date" id="filter-date" class="form-control datepicker-custom" title="التاريخ">
                    </form>
                </div>
                <div class="export-icon ms-3">
                    <a href="javascript:;" data-bs-toggle="dropdown" title="استخراج">
                        <span class="visually-hidden">Toggle Dropdown</span>
                        <ion-icon name="download" class="fs-4"></ion-icon>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:;">استخرج كملف .xsls</a>
                        <a class="dropdown-item" href="javascript:;">استخرج كملف .pdf</a>
                    </div>
                </div>
                <div class="reports-filter-icon ms-3">
                    <a href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#filter" aria-controls="filter" title="تصفية">
                        <ion-icon name="funnel" class="fs-4"></ion-icon>
                    </a>
                    <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true"
                        data-bs-backdrop="false" tabindex="-1" id="filter">
                        <form action="#" method="GET" id="filter-form" name="filter-form">
                            <div class="offcanvas-header border-bottom">
                                <h5 class="offcanvas-title mx-auto" id="filter-label">تصفية التقارير</h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                            </div>
                            <div class="offcanvas-body mb-4">
                                <div class="mb-4">
                                    <label for="filter-item-name" class="form-label">المادة الأولية</label><br>
                                    <input  type="text" class="form-control" name="filter-item-name" id="filter-item-name" />
                                </div>
                                <div class="mb-4">
                                    <label for="filter-product-name" class="form-label">المنتج</label><br>
                                    <input  type="text" class="form-control" name="filter-product-name" id="filter-product-name" />
                                </div>
                                <div class="mb-4">
                                    <label for="filter-main-category-name" class="form-label">المجموعات الرئيسية</label><br>
                                    <input  type="text" class="form-control" name="filter-main-category-name" id="filter-main-category-name" />
                                </div>
                                <div class="mb-4">
                                    <label for="filter-sub-category-name" class="form-label">المجموعات الفرعية</label><br>
                                    <input  type="text" class="form-control" name="filter-sub-category-name" id="filter-sub-category-name" />
                                </div>
                            </div>
                            <div class="offcanvas-footer text-end">
                                <button type="reset" class="btn btn-warning">
                                <ion-icon name="close-circle-outline"></ion-icon>
                                <span>تفريغ الحقول</span>
                                </button>
                                <button type="submit" class="btn btn-primary">
                                <ion-icon name="funnel"></ion-icon>
                                <span>تصفية</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="reports-totals mb-5 row">
                <div class="col col-sm-4 col-lg-2">
                    <div class="report-total">
                        <span>عدد مجموعات المواد الأولية الرئيسية</span>
                        <span>9</span>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2">
                    <div class="report-total">
                        <span>عدد مجموعات المواد الأولية الفرعية</span>
                        <span>16</span>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2">
                    <div class="report-total">
                        <span>عدد مجموعات المنتجات الرئيسية</span>
                        <span>12</span>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2">
                    <div class="report-total">
                        <span>عدد مجموعات المنتجات الفرعية</span>
                        <span>3</span>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2">
                    <div class="report-total">
                        <span>عدد المواد الأولية</span>
                        <span>134</span>
                    </div>
                </div>
                <div class="col col-sm-4 col-lg-2">
                    <div class="report-total">
                        <span>عدد المنتجات</span>
                        <span>87</span>
                    </div>
                </div>
            </div>
            <div class="reports-charts">
                <div class="row mb-5 reports-charts-1">
                    <div class="col-12 col-md-4 items-categories-main-sub">
                        <span>المواد الأولية والمجموعات الفرعية × المجموعات الرئيسية</span>
                        <div id="items-categories-main-sub"></div>
                    </div>
                    <div class="col-12 col-md-4">
                        <span>المنتجات والمجموعات الفرعية × المجموعات الرئيسية</span>
                        <div>
                            <div id="products-categories-main-sub"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <span>المجموعات الرئيسية والمجموعات الفرعية</span>
                        <div>
                            <canvas id="categories-main-sub"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row mb-5 reports-charts-2">
                    <div class="col-12 col-md-9 reports-charts-2-1">
                        <div class="row mb-4 reports-charts-2-1-1">
                            <div class="col-12 col-md-6 items-categories-sub">
                                <span>المجموعات الفرعية × الأصناف</span>
                                <div id="items-categories-sub"></div>
                            </div>
                            <div class="col-12 col-md-6 products-categories-sub">
                                <span>المجموعات الفرعية × المنتجات</span>
                                <div id="products-categories-sub"></div>
                            </div>
                        </div>
                        <div class="row reports-charts-2-1-2">
                            <div class="col-12 products-items-count">
                                <span>المنتجات التى تتكون من أكبر عدد من المواد الأولية</span>
                                <div id="products-items-count"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 reports-charts-2-2">
                        <span class="mb-2 d-inline-block">المواد الأولية الأكثر انتشاراً</span>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>المادة</th>
                                        <th>مرات التكرار</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <td>1</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>15</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>3</td>
                                        <td>11</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>7</td>
                                    </tr>
                                    <tr class="odd">
                                        <td>5</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>4</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row reports-charts-3">
                    <div class="col-12 col-md-4 items-best-sellers">
                        <span>المواد الأولية الأكثر نفاذاً</span>
                        <div id="items-best-sellers"></div>
                    </div>
                    <div class="col-12 col-md-4 products-best-sellers">
                        <span>المنتجات الأكثر نفاذاً</span>
                        <div id="products-best-sellers"></div>
                    </div>
                    <div class="col-12 col-md-4 items-products-notification">
                        <span>عدد مرات ظهور التنبيه للمنتجات والمواد الأولية</span>
                        <div>
                            <canvas id="items-products-notification"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection



{{--Main Footer Here--}}
@section('footer')
  {{--    Type Here --}}
@endsection

{{--Add Javescript Files Here --}}
@section('js')
<script src="{{URL::asset('assets/plugins/datetimepicker/js/legacy.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datetimepicker/js/picker.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datetimepicker/js/picker.time.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datetimepicker/js/picker.date.js')}}"></script>
<script src="{{URL::asset('assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js')}}"></script>
<script src="{{URL::asset('assets/js/form-date-time-pickes.js')}}"></script>
<script src="{{URL::asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/chartjs/chart.min.js')}}"></script>
@endsection
