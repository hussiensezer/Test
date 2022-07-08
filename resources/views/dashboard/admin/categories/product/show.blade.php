@extends('dashboard.layouts.master')
{{--Change The Title Each Page From Here--}}
@section('title')
    المنتجات
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
    <li class="breadcrumb-item active" aria-current="page">المنتجات</li>
@endsection


{{--Main Content Here--}}
@section('content')
<div class="container">
  <div class="row align-items-center mb-4 position-relative">
    <div class="col-4 ms-auto d-flex justify-content-end pe-0 position-absolute add-category-btn">
      <!-- Button trigger modal -->
      <a href="/dashboard/categories/product/create" class="btn btn-primary">
        <ion-icon name="add-outline"></ion-icon>
        <span>منتج جديد</span>
      </a>
    </div>

    <div class="card">
      <div class="card-body">
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
                    <input  type="text" class="form-control" name="filter-name" id="filter-name" placeholder=""/>
                  </div>
                  <div class="mb-4">
                    <label for="filter-quantity" class="form-label">الكمية</label><br>
                    <input type="range" name="filter-quantity" class="form-range px-3" id="filter-quantity" min="1" max="50" step="1">
                    <div class="range-values px-3">
                      <span class="min"></span>
                      <span class="val"></span>
                      <span class="max"></span>
                    </div>
                  </div>
                  <div class="mb-4">
                    <label for="filter-price" class="form-label">السعر</label><br>
                    <input type="range" name="filter-price" class="form-range px-3" id="filter-price" min="200" max="5000" step="1">
                    <div class="range-values px-3">
                      <span class="min"></span>
                      <span class="val"></span>
                      <span class="max"></span>
                    </div>
                  </div>
                  <div class="mb-4">
                    <div class="input-group barcode-input-group">
                      <label for="barcode-en" class="form-label">الباركود</label>
                    <div class="barcode"></div>
                  </div>
                  </div>
                  <div class="mb-4">
                    <label for="filter-category" class="form-label">المجموعة الرئيسية</label><br>
                    <input  type="text" class="form-control" name="filter-category" id="filter-category" placeholder=""/>
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
        <div class="table-responsive categories-table">
          <table id="products" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>رقم</th>
                <th>اسم</th>
                <th>تاريخ الإنشاء</th>
                <th>
                  <span>السعر</span><br>
                  <span>ريال سعودى</span>
                </th>
                <th>الكمية</th>
                <th>وحدة<br>القياس</th>
                <th>المجموعة</th>
                <th>الحالة</th>
                <th>الصورة</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>مسمار</td>
                <td>يناير</td>
                <td>50</td>
                <td>5</td>
                <td>كيلو</td>
                <td>3</td>
                <td>
                  <span class="badge bg-light-success text-success w-100">مفعل</span>
                </td>
                <td>
                  <img src="https://via.placeholder.com/30" alt="">
                </td>
                <td>
                  <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:;" class="show fs-5" title="عرض المنتج"  data-bs-toggle="modal" data-bs-target="#show-product-1">
                      <ion-icon name="eye-outline"></ion-icon>
                    </a>
                    <!-- Show Modal -->
                    <div class="modal fade show-product-modal" id="show-product-1" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">عرض المنتج</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="accordion card basic-information" id="basic-information">
                              <div class="accordion-item">
                                  <h6 class="card-header accordion-header p-0" id="basic-information-header">
                                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#basic-information-content" aria-expanded="true" aria-controls="basic-information-content">
                                          <ion-icon name="barcode-outline"></ion-icon>
                                          <span>المعلومات الأساسية</span>
                                          <ion-icon name="chevron-down-outline"></ion-icon>
                                      </button>
                                  </h6>
                                  <div id="basic-information-content" class="accordion-collapse collapse show" aria-labelledby="basic-information-header" data-bs-parent="#basic-information">
                                      <div class="accordion-body card-body">
                                          <div class="mb-4 d-flex main-sub-categories">
                                              <div class="input-group">
                                                  <label for="parent" class="form-label me-3">المجموعة الرئيسية</label>
                                                  <select class="form-select single-select field-edit" name="parent" id="parent" disabled>
                                                      <option>اختر مجموعة</option>
                                                      <option value="1" selected>ستائر</option>
                                                      <option value="2">ستائر 2</option>
                                                      <option value="3">ستائر 3</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="mb-4 d-flex align-items-center name-barcode">
                                              <div class="input-group">
                                                  <label for="name" class="form-label">الاسم</label>
                                                  <input type="text" class="form-control field-edit " name="name" id="name" placeholder="" value="منتج ستائر" disabled>
                                              </div>
                                              <div class="input-group barcode-input-group">
                                                  <label for="barcode" class="form-label">الباركود</label>
                                                  <div class="barcode field-edit "></div>
                                                  <span class="field-show"></span>
                                              </div>
                                          </div>
                                          <div class="mb-4 d-flex code-wrapper">
                                              <div class="input-group">
                                                  <label for="code" class="form-label">الرمز</label>
                                                  <input type="text" class="form-control field-edit " name="code" id="code" value="0x40s4d" disabled>
                                              </div>
                                          </div>
                                          <div class="mb-4 d-flex align-items-center price">
                                              <div class="input-group">
                                                  <label for="price" class="form-label">السعر</label>
                                                  <input type="number" class="form-control field-edit " name="price" id="price" placeholder="" value="50" disabled>
                                                  <p class="mb-0 ms-2">ريال سعودى</p>
                                              </div>
                                          </div>
                                          <div class="justify-content-start mb-4 d-flex align-items-center quantity">
                                              <label for="quantity" class="form-label">الكمية</label>
                                              <input type="number" class="form-control me-2 field-edit " name="quantity" id="quantity" value="4" placeholder="" disabled>
                                              <select class="form-select single-select ms-4 field-edit " name="unit" id="unit" disabled>
                                                  <option value="1" selected>حبة</option>
                                                  <option value="2">متر</option>
                                                  <option value="3">كيلو</option>
                                              </select>
                                          </div>
                                          <div class="mb-4 description">
                                              <label for="description" class="form-label">الوصف</label>
                                              <textarea name="description" id="description" class="form-control field-edit " cols="30" rows="10" placeholder="" disabled>وصف المنتج التجريبى</textarea>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
  
                            <div class="accordion card media " id="media">
                              <div class="accordion-item">
                                  <h6 class="card-header accordion-header p-0" id="media-header">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#media-content" aria-expanded="true" aria-controls="media-content">
                                          <ion-icon name="images-outline"></ion-icon>
                                          <span>الوسائط</span>
                                          <ion-icon name="chevron-down-outline"></ion-icon>
                                      </button>
                                  </h6>
                                  <div id="media-content" class="accordion-collapse collapse" aria-labelledby="media-header" data-bs-parent="#media">
                                      <div class="accordion-body card-body">
                                          <div class="mb-4 images">
                                              <div class="mb-1">
                                                  <label for="image" class="form-label me-4 mb-3">صورة</label>
                                                  <div class="field-show">
                                                      <img src="https://via.placeholder.com/150" alt="" class="ms-2">
                                                      <img src="https://via.placeholder.com/150" alt="" class="ms-2">
                                                      <img src="https://via.placeholder.com/150" alt="" class="ms-2">
                                                      <img src="https://via.placeholder.com/150" alt="" class="ms-2">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
  
                            <div class="accordion card features-card" id="features-card">
                              <div class="accordion-item">
                                  <h6 class="card-header accordion-header p-0" id="features-card-header">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#features-card-content" aria-expanded="true" aria-controls="features-card-content">
                                          <ion-icon name="construct-outline"></ion-icon>
                                          <span>الخصائص الأساسية</span>
                                          <ion-icon name="chevron-down-outline"></ion-icon>
                                      </button>
                                  </h6>
                                  <div id="features-card-content" class="accordion-collapse collapse" aria-labelledby="features-card-header" data-bs-parent="#features-card">
                                      <div class="accordion-body card-body">
                                          <div class="mb-4 features">
                                              <div class="feature-wrapper d-flex align-items-center mb-4">
                                                  <select class="form-select single-select me-4" name="feature" id="feature" disabled>
                                                      <option >اختر خاصية</option>
                                                      <option value="color" selected>اللون</option>
                                                      <option value="size">الحجم</option>
                                                      <option value="height">الارتفاع</option>
                                                  </select>
                                                  <select class="form-select single-select" name="color" id="color" disabled>
                                                      <option value="1">الأبيض</option>
                                                      <option value="2" selected>الأسود</option>
                                                      <option value="3">الرمادى</option>
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
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
                    <a href="/dashboard/categories/1/product/edit" class="edit fs-5" title="اذهب لصفحة العرض والتعديل">
                      <ion-icon name="create-outline"></ion-icon>
                    </a>
                    <form action="" name="delete-product" class="delete-category delete-product" id="delete-product">
                      <input type="button" class="delete" value="X" title="حذف">
                      <ion-icon name="close-outline" class="fs-5"></ion-icon>
                    </form>
                    <a href="javascript:;" class="add fs-5" title="إضافة كمية"  data-bs-toggle="modal" data-bs-target="#add-product-1">
                      <ion-icon name="add-outline"></ion-icon>
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
                              <div class="mb-4">
                                <label for="add-quantity" class="form-label">الكمية المراد إضافتها للمخزون</label>
                                <input type="number" class="form-control" name="add-quantity" id="add-quantity" placeholder="0">
                              </div>
                              <div class="mb-4 notes">
                                <label for="notes" class="form-label">ملاحظات</label>
                                <textarea name="notes" id="notes" class="form-control" rows="3" placeholder=""></textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">
                                <ion-icon name="close-circle-outline"></ion-icon>
                                <span>تفريغ الحقول</span>
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
                    <a href="javascript:;" class="subtract fs-5" title="سحب كمية"  data-bs-toggle="modal" data-bs-target="#subtract-product-1">
                      <ion-icon name="remove-outline"></ion-icon>
                    </a>
                    <!-- Withdraw Modal -->
                    <div class="modal fade subtract-product-modal" id="subtract-product-1" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">سحب كمية من المخزون</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form name="withdraw-product" id="withdraw-product" method="POST" action="#">
                            <div class="modal-body">
                              <div class="mb-4">
                                <label for="withdraw-quantity" class="form-label">الكمية المراد سحبها من المخزون</label>
                                <input type="number" class="form-control" name="withdraw-quantity" id="withdraw-quantity" placeholder="0">
                              </div>
                              <div class="mb-4 notes">
                                <label for="notes" class="form-label">ملاحظات</label>
                                <textarea name="notes" id="notes" class="form-control" rows="3" placeholder=""></textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">
                                <ion-icon name="close-circle-outline"></ion-icon>
                                <span>تفريغ الحقول</span>
                              </button>
                              <button type="submit" class="btn btn-success">
                                <ion-icon name="remove-outline"></ion-icon>
                                <span>سحب الكمية</span>
                              </button>
                            </div>
                          </form>
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
