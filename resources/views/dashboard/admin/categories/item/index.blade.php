@extends('dashboard.layouts.master')
{{--Change The Title Each Page From Here--}}
@section('title')
    مجموعات المواد الأولية
    {{--    Type Here --}}
@endsection

{{--Add Css Links Here --}}
@section('css')


    {{--    Type Here --}}


   <link href="{{URL::asset('assets/plugins/datetimepicker/css/classic.css')}}" rel="stylesheet" />
	  <link href="{{URL::asset('assets/plugins/datetimepicker/css/classic.time.css')}}" rel="stylesheet" />
	  <link href="{{URL::asset('assets/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet" />
	  <link rel="stylesheet" href="{{URL::asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css')}}">
   <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
   <link href="{{URL::asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
   <link href="{{URL::asset('assets/plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet" />
	  <link href="{{URL::asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />
   <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />

@endsection

{{--Set The BreadCrumb Title From Here --}}
@section('breadcrumb-title')
<ion-icon name="basket-outline"></ion-icon>
<span>المخزون</span>
@endsection

{{--Set The Nested Of ListBreadCrumb  From Here --}}
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">مجموعات المواد الأولية</li>
@endsection


{{--Main Content Here--}}
@section('content')
<div class="container">
  <div class="row align-items-center mb-4 position-relative">
    <div class="col-4 ms-auto d-flex justify-content-end pe-0 position-absolute add-category-btn">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategory-modal">
        <ion-icon name="add-outline"></ion-icon>
        <span>مجموعة مواد أولية جديدة</span>
      </button>
      <!-- Modal -->
      <div class="modal fade" id="addcategory-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">إضافة مجموعة مواد أولية جديدة</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="languages-tabs-wrapper">
              <ul class="nav nav-tabs mb-4" id="languages-tabs" role="tablist">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="{{$localeCode}}-tab" data-bs-toggle="tab" data-bs-target="#{{$localeCode}}-content" type="button" role="tab" aria-controls="{{$localeCode}}-content" aria-selected="true">{{$properties['native']}}</button>
                </li>
                @endforeach
              </ul>
              <form name="item-addcategory-form" id="item-addcategory-form" enctype="multipart/form-data" method="POST" action="{{route('dashboard.categories.item.store')}}">
                @csrf
                @method('post')
                <div class="tab-content" id="languages-contents">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                  <div class="tab-pane fade" id="{{$localeCode}}-content" role="tabpanel" aria-labelledby="{{$localeCode}}-tab">
                    <div class="form-body">
                      <div class="mb-4">
                        <label for="name[{{$localeCode}}]" class="form-label">الاسم</label>
                        <input type="text" class="form-control" name="name[{{$localeCode}}]" id="name[{{$localeCode}}]" placeholder="">
                      </div>
                      <div class="mb-4">
                        <label for="description[{{$localeCode}}]" class="form-label">الوصف</label>
                        <textarea name="description[{{$localeCode}}]" id="description[{{$localeCode}}]" class="form-control" cols="30" rows="5" placeholder=""></textarea>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  <div class="mb-4">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" placeholder="">
                  </div>
                  <div class="mb-4">
                    <label for="status" class="form-label">الحالة</label>
                    <select class="single-select" name="status" id="status">
                      <option value="1">مفعل</option>
                      <option value="0">غير مفعل</option>
                    </select>
                  </div>
                  <div class="mb-4 parent-category-select">
                    <label for="parent" class="form-label">المجموعة الأب</label>
                    <select class="single-select" name="parent_id[]" id="parent"></select>
                  </div>
                  <div class="mb-4 hidden child-category-select">
                    <label for="child" class="form-label">المجموعة الابن</label>
                    <select class="single-select" name="parent_id[]" id="child"></select>
                  </div>
                  <div class="mb-4">
                      <label for="image" class="form-label">صورة</label>
                      <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png" class="single-image">
                  </div>
                    <div class="form-footer d-flex justify-content-end">
                      <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">
                        <ion-icon name="close-circle-outline"></ion-icon>
                        <span>إلغاء</span>
                      </button>
                      <button type="submit" class="btn btn-success">
                        <ion-icon name="add-outline"></ion-icon>
                        <span>ضف مجموعة</span>
                      </button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="table-responsive categories-table d-flex align-items-center flex-wrap">
          <div class="table-custom-controls">
            <div class="rows-count col-md-4">
              <label class="form-label" for="table-rows-count">
                عدد الصفوف:
              </label>
              <select class="form-select items-table-rows-count" id="table-rows-count" aria-label="table rows count">
                <option value="20">20</option>
                <option value="40">40</option>
                <option value="60">60</option>
                <option value="80">80</option>
                <option value="100">100</option>
              </select>
            </div>
            <div class="table-search items-table-search col-md-4">
              <input type="search" class="form-control" placeholder="بحث">
              <ion-icon name="search-sharp"></ion-icon>
            </div>
            <div class="filter-icon">
              <a href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#filter" aria-controls="filter" title="تصفية">
                <ion-icon name="funnel" class="fs-4"></ion-icon>
              </a>
              <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true"
                data-bs-backdrop="false" tabindex="-1" id="filter">
                <form action="#" method="GET" id="filter-form" name="filter-form">
                  <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="filter-label">تصفية النتائج</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                  </div>
                  <div class="offcanvas-body mb-4">
                      <div class="mb-4">
                        <label for="filter-name" class="form-label">الاسم</label><br>
                        <input  type="text" class="form-control" name="filter-name" id="filter-name" placeholder="اسم  مجموعة المواد الأولية"/>
                      </div>
                      <div class="mb-4">
                        <label for="filter-date" class="form-label">تاريخ الإنشاء</label>
                        <div class="input-group d-flex align-items-center mb-2">
                          <label for="filter-date" class="form-label me-2 mb-0">من:</label>
                          <input type="text" name="filter-date" id="filter-date" class="form-control datepicker-custom" placeholder="يوم شهر, سنة">
                        </div>
                        <div class="input-group d-flex align-items-center">
                          <label for="date-2" class="form-label me-2 mb-0">إلى:</label>
                          <input type="text" name="filter-date-2" id="date-2" class="form-control datepicker-custom" placeholder="يوم شهر, سنة">
                        </div>
                      </div>
                      <div class="mb-4 d-flex align-items-center">
                        <label class="form-label me-4 mb-0s">المستوى</label>
                        <div class="form-check me-3 mb-0s">
                          <input class="form-check-input" type="checkbox" value="1" id="filter-level-1" name="filter-level">
                          <label class="form-check-label" for="filter-level-1">
                            1
                          </label>
                        </div>
                        <div class="form-check me-3 mb-0s">
                          <input class="form-check-input" type="checkbox" value="2" id="filter-level-2" name="filter-level" checked>
                          <label class="form-check-label" for="filter-level-2">
                            2
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="3" id="filter-level-3" name="filter-level">
                          <label class="form-check-label" for="filter-level-3">
                            3
                          </label>
                        </div>
                      </div>
                      <div class="mb-4">
                        <label for="filter-sub-level" class="form-label">عدد الوحدات الداخلية</label><br>
                        <input type="number" name="filter-sub-level" id="filter-sub-level" class="form-control" placeholder="عدد الوحدات الداخلية" min="1" max="3" step="1">
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
          <table id="categories" class="table table-striped table-bordered items-categories">
            <thead>
              <tr>
                <th>رقم</th>
                <th>اسم</th>
                <th>تاريخ<br>الإنشاء</th>
                <th>الوصف</th>
                <th>المستوى</th>
                <th>عدد<br>المجموعات<br>الداخلية</th>
                <th>الحالة</th>
                <th>الصورة</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
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
  <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
  <script src="{{URL::asset('assets/js/form-select2.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/fancy-file-uploader/jquery.fileupload.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
@endsection
