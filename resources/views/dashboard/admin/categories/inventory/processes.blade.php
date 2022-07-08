@extends('dashboard.layouts.master')
{{--Change The Title Each Page From Here--}}
@section('title')
    عمليات السحب والإضافة
@endsection

{{--Add Css Links Here --}}
@section('css')
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
    <li class="breadcrumb-item active" aria-current="page">عمليات السحب والإضافة</li>
@endsection

{{--Main Content Here--}}
@section('content')
<div class="container">
  <div class="row align-items-center mb-4 position-relative">
    <div class="col-4 ms-auto d-flex justify-content-end pe-0 position-absolute withdraw-add-btn">

      <a href="javascript:;" class="btn btn-primary me-3 add" title="إضافة كمية"  data-bs-toggle="modal" data-bs-target="#add-product-1">
        <ion-icon name="add-outline" class="fs-5"></ion-icon>
        <span>إضافة</span>
      </a>
      <!-- Add Modal -->
      <div class="modal fade add-product-modal" id="add-product-1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">إضافة كمية للمخزون</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form name="add-product" id="add-product" method="POST" action="#">
              <div class="modal-body">
                <div class="mb-4 d-flex align-items-center flex-wrap">
                  <label for="add-quantity" class="form-label me-2">الكمية المراد إضافتها للمخزون:</label>
                  <input type="number" class="form-control me-2" name="add-quantity" id="add-quantity" placeholder="0">
                  <span>وحدة القياس</span>
                </div>
                <div class="mb-4 notes">
                  <label for="notes" class="form-label mb-2">ملاحظات</label>
                  <textarea name="notes" id="notes" class="form-control" rows="3" placeholder=""></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">
                  <ion-icon name="close-circle-outline"></ion-icon>
                  <span>إلغاء</span>
                </button>
                <button type="submit" class="btn btn-success">
                  <ion-icon name="add-outline"></ion-icon>
                  <span>إضافة الكمية</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <a href="javascript:;" class="btn btn-warning withdraw" title="سحب كمية"  data-bs-toggle="modal" data-bs-target="#withdraw-product-1">
        <ion-icon name="remove-outline" class="fs-5"></ion-icon>
        <span>سحب</span>
      </a>
      <!-- Withdraw Modal -->
      <div class="modal fade withdraw-product-modal" id="withdraw-product-1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">سحب كمية من المخزون</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form name="withdraw-product" id="withdraw-product" method="POST" action="#">
              <div class="modal-body">
                <div class="mb-4 d-flex align-items-center flex-wrap">
                  <label for="withdraw-quantity" class="form-label me-2">الكمية المراد سحبها من المخزون:</label>
                  <input type="number" class="form-control me-2" name="withdraw-quantity" id="withdraw-quantity" placeholder="0">
                  <span>وحدة القياس</span>
                </div>
                <div class="mb-4 notes">
                  <label for="notes" class="form-label mb-2">ملاحظات</label>
                  <textarea name="notes" id="notes" class="form-control" rows="3" placeholder=""></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">
                  <ion-icon name="close-circle-outline"></ion-icon>
                  <span>إلغاء</span>
                </button>
                <button type="submit" class="btn btn-warning">
                  <ion-icon name="remove-outline"></ion-icon>
                  <span>سحب الكمية</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="filter-icon">
          <a href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#filter" aria-controls="filter" title="تصفية">
            <ion-icon name="funnel" class="fs-4"></ion-icon>
          </a>
          <div class="offcanvas offcanvas-end shadow border-start-0 p-2 processes-filter" data-bs-scroll="true"
            data-bs-backdrop="false" tabindex="-1" id="filter">
            <form action="#" method="GET" id="filter-form" name="filter-form">
              <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="filter-label">تصفية النتائج</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
              </div>
              <div class="offcanvas-body mb-4">
                <div class="input-group mb-4">
                  <label for="filter-name" class="form-label me-2">الاسم</label>
                  <input type="text" class="form-control" id="filter-name">
                </div>
                <div class="form-check mb-4">
                  <span class="me-2">العمليات:</span>
                  <input class="form-check-input" type="checkbox" value="filter-withdraw" id="filter-withdraw">
                  <label class="form-check-label me-3" for="filter-withdraw">
                    سحب
                  </label><br>
                  <input class="form-check-input" type="checkbox" value="filter-add" id="filter-add">
                  <label class="form-check-label" for="filter-add">
                    إضافة
                  </label>
                </div>
                <div class="input-group mb-4">
                  <label for="filter-date" class="form-label">التاريخ</label>
                  <input type="text" name="filter-date" id="filter-date" class="form-control datepicker-custom" placeholder="يوم شهر, سنة">
                </div>
                <div class="form-check mb-4">
                  <span class="me-3">النوع:</span>
                  <input class="form-check-input" type="checkbox" value="filter-product" id="filter-product">
                  <label class="form-check-label me-3" for="filter-product">
                    منتج
                  </label><br>
                  <input class="form-check-input" type="checkbox" value="filter-item" id="filter-item">
                  <label class="form-check-label" for="filter-item">
                    مادة أولية
                  </label>
                </div>
                <div class="input-group mb-4">
                  <label for="filter-person" class="form-label">القائم بعملية السحب</label>
                  <input type="text" class="form-control" id="filter-person">
                </div>
                <div class="mb-4 left-quantity-wrapper">
                  <label for="left-quantity-condition" class="form-label">الكمية المتبقية</label>
                  <select name="left-quantity" id="left-quantity" class="form-select me-2">
                      <option value="1">أقل من</option>
                      <option value="2" selected>أكثر من</option>
                      <option value="3">تساوى</option>
                  </select>
                  <input type="number" class="form-control me-2" name="left-quantity" id="left-quantity">
                  <span>وحدة القياس</span>
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
        <div class="table-responsive categories-table withdraw-add-table">
          <table id="products" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>رقم</th>
                <th>المنتج / المادة الأولية</th>
                <th>نوع العملية</th>
                <th>التاريخ</th>
                <th>الكمية</th>
                <th>الشخص</th>
                <th>الكمية المتبقية</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr class="odd">
                <td>1</td>
                <td>مسمار</td>
                <td>سحب</td>
                <td>
                  يناير 2020
                </td>
                <td>
                  <span>50</span>
                  <span>حبة</span>
                </td>
                <td>أدمن</td>
                <td>300</td>
                <td>
                  <a href="javascript:;" class="show fs-5" title="عرض"  data-bs-toggle="modal" data-bs-target="#show-product-1">
                    <ion-icon name="eye-outline"></ion-icon>
                  </a>
                  <!-- Show Modal -->
                  <div class="modal fade show-process-modal" id="show-product-1" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">عرض العملية</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="input-group mb-4">
                              <label for="code" class="form-label">المنتج / المادة الأولية</label>
                              <input type="text" class="form-control" value="مسمار" disabled>
                          </div>
                          <div class="input-group mb-4">
                            <label for="code" class="form-label">نوع العملية</label>
                            <input type="text" class="form-control" value="سحب" disabled>
                          </div>
                          <div class="input-group mb-4">
                            <label for="code" class="form-label">التاريخ</label>
                            <input type="text" class="form-control" value="11/12/2020" disabled>
                          </div>
                          <div class="input-group mb-4">
                            <label for="code" class="form-label">الكمية</label>
                            <input type="text" class="form-control" value="50" disabled>
                          </div>
                          <div class="input-group mb-4">
                            <label for="code" class="form-label">القائم بالعملية</label>
                            <input type="text" class="form-control" value="أدمن" disabled>
                          </div>
                          <div class="input-group mb-4">
                            <label for="code" class="form-label">الكمية المتبقية</label>
                            <input type="text" class="form-control" value="500" disabled>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <ion-icon name="close-circle-outline"></ion-icon>
                            <span>إلغاء</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
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
