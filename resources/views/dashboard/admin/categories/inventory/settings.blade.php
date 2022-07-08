@extends('dashboard.layouts.master')
{{--Change The Title Each Page From Here--}}
@section('title')
  المخزون | الإعدادات
@endsection

{{--Add Css Links Here --}}
@section('css')

@endsection

{{--Set The BreadCrumb Title From Here --}}
@section('breadcrumb-title')
<ion-icon name="basket-outline"></ion-icon>
<span>المخزون</span>
@endsection

{{--Set The Nested Of ListBreadCrumb  From Here --}}
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">الإعدادات</li>
@endsection


{{--Main Content Here--}}
@section('content')
<div class="container">
  <div class="row position-relative">
    <div class="card">
      <div class="card-body">
        <div class="mb-4 manual-withdraw-wrapper">
          <form action="#" class="manual-withdraw-form" name="manual-withdraw-form" id="manual-withdraw-form" method="GET">
            <div class="form-check form-switch mb-4 d-flex align-items-center">
              <input class="form-check-input me-4" type="checkbox" id="manual-withdraw" name="manual-withdraw">
              <label class="form-check-label me-4" for="manual-withdraw">تفعيل خاصية السحب اليدوى</label>
            </div>
          </form>
        </div>
        <div class="justify-content-start mb-4 d-flex align-items-center min-quantity min-quantity-settings">
          <form action="#" name="min-quantity-form">
            <label for="min-quantity" class="form-label me-4">الحد الأدنى للتنبيه: أقل من</label>
            <input type="number" min="1" class="form-control" name="min-quantity" id="min-quantity" placeholder="1">
            <p class="mb-0 ms-2">وحدة قياس</p>
          </form>
        </div>
        <div class="row">
          <div class="features-units-wrapper">
            <div class="col-12 mb-3 feaures-table-wrapper">
              <div class="mb-3 d-flex align-items-center">
                <span>الخصائص</span>
                <form action="#" class="add-feature-form ms-3" id="add-feature-form" name="add-feature-form">
                  <button type="button" class="btn btn-primary edit fs-5" title="إضافة خاصية" data-bs-toggle="modal" data-bs-target="#add-feature">
                    <ion-icon name="add-outline"></ion-icon>
                  </button>
                  <!-- Modal -->
                  <div class="modal fade add-feature-modal" id="add-feature" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">إضافة خاصية</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="modal-body">
                            <div class="mb-4">
                              <label for="feature-name" class="form-label">الاسم</label>
                              <input type="text" class="form-control" name="feature-name" id="feature-name" placeholder="">
                            </div>
                            <div class="mb-4">
                              <label for="feature-type" class="form-label me-3">النوع</label>
                              <select class="form-select" name="feature-type" id="feature-type">
                                  <option selected>نصى</option>
                                  <option value="1">اختيار</option>
                                  <option value="2">اختيار من متعدد</option>
                              </select>
                            </div>
                            <div class="mb-4">
                              <label for="feature-value" class="form-label">القيمة</label>
                              <input type="text" class="form-control" name="feature-value" id="feature-value" placeholder="">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <ion-icon name="close-circle-outline"></ion-icon>
                            <span>إلغاء</span>
                          </button>
                          <button type="submit" class="btn btn-success">
                            <ion-icon name="create-outline"></ion-icon>
                            <span>إضافة خاصية</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">الخاصية</th>
                        <th scope="col">النوع</th>
                        <th scope="col">القيمة</th>
                        <th scope="col">عدد مرات الاستخدام</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>اللون</td>
                        <td>اختيار</td>
                        <td>
                          أبيض <br />
                          أصفر <br />
                          أخضر <br />
                        </td>
                        <td>5</td>
                        <td>
                          <div class="d-flex justify-content-around align-items-center">
                            <a href="javascript:;" class="edit fs-5" title="تعديل الخاصية" data-bs-toggle="modal" data-bs-target="#edit-feature-1">
                              <ion-icon name="create-outline"></ion-icon>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade edit-feature-modal" id="edit-feature-1" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">تعديل الخاصية</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="#" name="edit-feature">
                                      <div class="mb-4">
                                        <label for="feature-name" class="form-label">الاسم</label>
                                        <input type="text" class="form-control" name="feature-name" id="feature-name" placeholder="" value="اسم الخاصية">
                                      </div>
                                      <div class="mb-4">
                                        <label for="feature-type" class="form-label me-3">النوع</label>
                                        <select class="form-select" name="feature-type" id="feature-type">
                                            <option selected>نصى</option>
                                            <option value="1">اختيار</option>
                                            <option value="2">اختيار من متعدد</option>
                                        </select>
                                      </div>
                                      <div class="mb-4">
                                        <label for="feature-value" class="form-label">القيمة</label>
                                        <input type="text" class="form-control" name="feature-value" id="feature-value" placeholder="" value="قيمة الخاصية">
                                      </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                      <ion-icon name="close-circle-outline"></ion-icon>
                                      <span>إلغاء</span>
                                    </button>
                                    <button type="submit" class="btn btn-success">
                                      <ion-icon name="create-outline"></ion-icon>
                                      <span>تعديل الخاصية</span>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <form action="" name="delete-feature" class="delete-category delete-feature" id="delete-feature">
                              <input type="button" class="delete" value="X" title="حذف">
                              <ion-icon name="close-outline" class="fs-5"></ion-icon>
                            </form>
                          </div>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
              <div class="col-12 units-table-wrapper">
                  <div class="mb-3 d-flex align-items-center">
                      <span>وحدات القياس</span>
                      <form action="#" class="add-feature-form ms-3" id="add-unit-form" name="add-unit-form">
                          <button type="button" class="btn btn-primary edit fs-5" title="إضافة وحدة قياس" data-bs-toggle="modal" data-bs-target="#add-unit">
                              <ion-icon name="add-outline"></ion-icon>
                          </button>
                          <!-- Modal -->
                          <div class="modal fade add-unit-modal" id="add-unit" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title">إضافة وحدة قياس</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          <div class="modal-body">
                                              <div class="mb-4">
                                                  <label for="unit-name" class="form-label">الاسم</label>
                                                  <input type="text" class="form-control" name="unit-name" id="unit-name" placeholder="">
                                              </div>
                                              <div class="mb-4">
                                                  <label for="unit-type" class="form-label me-3">النوع</label>
                                                  <select class="form-select" name="unit-type" id="unit-type">
                                                      <option selected>نصى</option>
                                                      <option value="1">اختيار</option>
                                                      <option value="2">اختيار من متعدد</option>
                                                  </select>
                                              </div>
                                              <div class="mb-4">
                                                  <label for="unit-value" class="form-label">القيمة</label>
                                                  <input type="text" class="form-control" name="unit-value" id="unit-value" placeholder="">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                              <ion-icon name="close-circle-outline"></ion-icon>
                                              <span>إلغاء</span>
                                          </button>
                                          <button type="submit" class="btn btn-success">
                                              <ion-icon name="create-outline"></ion-icon>
                                              <span>إضافة وحدة قياس</span>
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
                  <table class="table">
                      <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">وحدة القياس</th>
                          <th scope="col">النوع</th>
                          <th scope="col">القيمة</th>
                          <th scope="col">تنبيه النقص</th>
                          <th scope="col">عدد مرات الاستخدام</th>
                          <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <th scope="row">1</th>
                          <td>حبة</td>
                          <td>نصى</td>
                          <td>
                              -
                          </td>
                          <td>3</td>
                          <td>5</td>
                          <td>
                              <div class="d-flex justify-content-around align-items-center">
                                  <a href="javascript:;" class="edit fs-5" title="تعديل وحدة القياس" data-bs-toggle="modal" data-bs-target="#edit-unit-1">
                                      <ion-icon name="create-outline"></ion-icon>
                                  </a>
                                  <!-- Modal -->
                                  <div class="modal fade edit-unit-modal" id="edit-unit-1" tabindex="-1" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title">تعديل وحدة القياس</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="mb-4">
                                                      <label for="unit-name" class="form-label">الاسم</label>
                                                      <input type="text" class="form-control" name="unit-name" id="unit-name" placeholder="" value="اسم وحدة القياس">
                                                  </div>
                                                  <div class="mb-4">
                                                      <label for="unit-type" class="form-label me-3">النوع</label>
                                                      <select class="form-select" name="unit-type" id="unit-type">
                                                          <option selected>نصى</option>
                                                          <option value="1">اختيار</option>
                                                          <option value="2">اختيار من متعدد</option>
                                                      </select>
                                                  </div>
                                                  <div class="mb-4">
                                                      <label for="unit-value" class="form-label">القيمة</label>
                                                      <input type="text" class="form-control" name="unit-value" id="unit-value" placeholder="" value="قيمة وحدة القياس">
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                      <ion-icon name="close-circle-outline"></ion-icon>
                                                      <span>إلغاء</span>
                                                  </button>
                                                  <button type="submit" class="btn btn-success">
                                                      <ion-icon name="create-outline"></ion-icon>
                                                      <span>تعديل وحدة القياس</span>
                                                  </button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <form action="" name="delete-unit" class="delete-category delete-unit" id="delete-unit">
                                      <input type="button" class="delete" value="X" title="حذف">
                                      <ion-icon name="close-outline" class="fs-5"></ion-icon>
                                  </form>
                              </div>
                          </td>
                      </tr>
                      </tbody>
                  </table>
              </div>

            <!-- Start Manufacturing Processes-->
              <div class="col-12 units-table-wrapper">
                  <div class="mb-3 d-flex align-items-center">
                      <span>عمليات التصنيع</span>
                      <form action="#" class="add-feature-form ms-3" id="add-unit-form" name="add-unit-form">
                          <button type="button" class="btn btn-primary edit fs-5" title="إضافة  عملية تصنيع" data-bs-toggle="modal" data-bs-target="#add-manufacturing-processes">
                              <ion-icon name="add-outline"></ion-icon>
                          </button>
                          <!-- Modal -->
                          <div class="modal fade add-unit-modal" id="add-manufacturing-processes" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title">إضافة  عملية تصنيع</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          <div class="modal-body">
                                              <div class="mb-4">
                                                  <label for="unit-name" class="form-label">الاسم العملية</label>
                                                  <input type="text" class="form-control" name="unit-name" id="unit-name" placeholder="">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                              <ion-icon name="close-circle-outline"></ion-icon>
                                              <span>إلغاء</span>
                                          </button>
                                          <button type="submit" class="btn btn-success">
                                              <ion-icon name="create-outline"></ion-icon>
                                              <span>إضافة عملية تصنيع</span>
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
                  <table class="table">
                      <thead>
                      <tr>
                          <th scope="col">#</th>
                         <td>اسم العملية</td>
                          <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <th scope="row">1</th>
                          <td>حبة</td>

                          <td>
                              <div class="d-flex justify-content-around align-items-center">
                                  <a href="javascript:;" class="edit fs-5" title="تعديل وحدة القياس" data-bs-toggle="modal" data-bs-target="#edit-unit-1">
                                      <ion-icon name="create-outline"></ion-icon>
                                  </a>
                                  <!-- Modal -->
                                  <div class="modal fade edit-unit-modal" id="edit-unit-1" tabindex="-1" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title">تعديل وحدة القياس</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="mb-4">
                                                      <label for="unit-name" class="form-label">الاسم</label>
                                                      <input type="text" class="form-control" name="unit-name" id="unit-name" placeholder="" value="اسم وحدة القياس">
                                                  </div>
                                                  <div class="mb-4">
                                                      <label for="unit-type" class="form-label me-3">النوع</label>
                                                      <select class="form-select" name="unit-type" id="unit-type">
                                                          <option selected>نصى</option>
                                                          <option value="1">اختيار</option>
                                                          <option value="2">اختيار من متعدد</option>
                                                      </select>
                                                  </div>
                                                  <div class="mb-4">
                                                      <label for="unit-value" class="form-label">القيمة</label>
                                                      <input type="text" class="form-control" name="unit-value" id="unit-value" placeholder="" value="قيمة وحدة القياس">
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                      <ion-icon name="close-circle-outline"></ion-icon>
                                                      <span>إلغاء</span>
                                                  </button>
                                                  <button type="submit" class="btn btn-success">
                                                      <ion-icon name="create-outline"></ion-icon>
                                                      <span>تعديل وحدة القياس</span>
                                                  </button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <form action="" name="delete-unit" class="delete-category delete-unit" id="delete-unit">
                                      <input type="button" class="delete" value="X" title="حذف">
                                      <ion-icon name="close-outline" class="fs-5"></ion-icon>
                                  </form>
                              </div>
                          </td>
                      </tr>
                      </tbody>
                  </table>
              </div>
            <!-- End Manufacturing Processes-->
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

@endsection
