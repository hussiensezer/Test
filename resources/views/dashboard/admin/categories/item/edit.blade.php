@extends('dashboard.layouts.master')
{{--Change The Title Each Page From Here--}}
@section('title')
    تعديل المادة الأولية
    {{--    Type Here --}}
@endsection

{{--Add Css Links Here --}}
@section('css')
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />
@endsection

{{--Set The BreadCrumb Title From Here --}}
@section('breadcrumb-title')
<ion-icon name="basket-outline"></ion-icon>
<span>المخزون</span>
@endsection

{{--Set The Nested Of ListBreadCrumb  From Here --}}
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">تعديل مادة أولية</li>
@endsection


{{--Main Content Here--}}
@section('content')
<div class="container">
    <div class="row position-relative">
        <div class="languages-tabs-wrapper">
            <ul class="nav nav-tabs mb-4" id="languages-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="arabic-tab" data-bs-toggle="tab" data-bs-target="#arabic-content" type="button" role="tab" aria-controls="arabic-content" aria-selected="true">العربية</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="english-tab" data-bs-toggle="tab" data-bs-target="#english-content" type="button" role="tab" aria-controls="english-content" aria-selected="false">الإنجليزية</button>
                </li>
            </ul>
            
            <div class="tab-content" id="languages-contents">
                <div class="tab-pane fade show active" id="arabic-content" role="tabpanel" aria-labelledby="arabic-tab">
                    <form action="#" class="add-item-form arabic-add-item" name="arabic-add-product" id="arabic-add-product" method="GET">
                        <div class="accordion card basic-information section-show" id="basic-information">
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
                                                <select class="form-select single-select field-edit hidden" name="parent" id="parent">
                                                    <option selected>اختر مجموعة</option>
                                                    <option value="1">ستائر</option>
                                                    <option value="2">ستائر 2</option>
                                                    <option value="3">ستائر 3</option>
                                                </select>
                                                <span class="field-show">
                                                    <select class="form-select" name="" id="" disabled>
                                                        <option value="1" selected>ستائر</option>
                                                        <option value="2">ستائر 2</option>
                                                        <option value="3">ستائر 3</option>
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-4 d-flex align-items-center name-barcode">
                                            <div class="input-group">
                                                <label for="name" class="form-label">الاسم</label>
                                                <input type="text" class="form-control field-edit hidden" name="name" id="name" placeholder="">
                                                <span class="field-show">
                                                    <input type="text" class="form-control" name="" id="" placeholder="" value="مادة ستائر" disabled>
                                                </span>
                                            </div>
                                            <div class="input-group barcode-input-group">
                                                <label for="barcode" class="form-label">الباركود</label>
                                                <div class="barcode field-edit hidden"></div>
                                                <span class="field-show"></span>
                                            </div>
                                        </div>
                                        <div class="mb-4 d-flex code-wrapper">
                                            <div class="input-group">
                                                <label for="code" class="form-label">الرمز</label>
                                                <input type="text" class="form-control field-edit hidden" name="code" id="code" placeholder="رمز المادة الأولية">
                                                <span class="field-show">
                                                    <input type="text" class="form-control" name="" id="" placeholder="" value="0x40s4d" disabled>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-4 d-flex align-items-center price">
                                            <div class="input-group">
                                                <label for="price" class="form-label">السعر</label>
                                                <input type="number" class="form-control field-edit hidden" name="price" id="price" placeholder="">
                                                <span class="field-show">
                                                    <input type="number" class="form-control" name="" id="" placeholder="" value="50" disabled>
                                                </span>
                                                <p class="mb-0 ms-2">ريال سعودى</p>
                                            </div>
                                        </div>
                                        <div class="justify-content-start mb-4 d-flex align-items-center quantity">
                                            <label for="quantity" class="form-label text-end">الكمية</label>
                                            <input type="number" class="form-control me-2 field-edit hidden" name="quantity" id="quantity" placeholder="">
                                            <select class="form-select single-select ms-4 field-edit hidden" name="unit" id="unit">
                                                <option value="1" selected>حبة</option>
                                                <option value="2">متر</option>
                                                <option value="3">كيلو</option>
                                            </select>
                                            <span class="field-show me-2">
                                                <input type="number" class="form-control me-2" name="" id="" placeholder="" value="4" disabled>
                                            </span>
                                            <span class="field-show">كيلو</span>
                                        </div>
                                        <div class="mb-4 description">
                                            <label for="description" class="form-label">الوصف</label>
                                            <textarea name="description" id="description" class="form-control field-edit hidden" cols="30" rows="10" placeholder=""></textarea>
                                            <p class="field-show mb-0">
                                                <textarea name="" id="" class="form-control" cols="30" rows="10" placeholder="" disabled>وصف المادة التجريبى</textarea>
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <button type="button" class="btn btn-warning col-3 field-show edit-btn">
                                                <ion-icon name="create-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
                                                تعديل
                                            </button>
                                            <button type="button" class="ms-3 btn btn-success col-3 field-edit hidden save-btn">
                                                <ion-icon name="save-outline"></ion-icon>
                                                حفظ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion card media section-show" id="media">
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
                                                <input id="image" name="image" type="file" class="field-edit hidden" accept=".jpg,.jpeg,.png" multiple>
                                                <div class="field-show">
                                                    <img src="https://via.placeholder.com/150" alt="" class="ms-2">
                                                    <img src="https://via.placeholder.com/150" alt="" class="ms-2">
                                                    <img src="https://via.placeholder.com/150" alt="" class="ms-2">
                                                    <img src="https://via.placeholder.com/150" alt="" class="ms-2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 files">
                                            <div class="mb-1">
                                                <label for="file" class="form-label me-4 mb-3">مستند</label>
                                                <input id="file" name="file" type="file" class="field-edit hidden" accept=".pdf,.xsl,.xsls,.ppt,.pptx,.doc,.docx" multiple>
                                                <div class="field-show"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <button type="button" class="btn btn-warning col-3 field-show edit-btn">
                                                <ion-icon name="create-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
                                                تعديل
                                            </button>
                                            <button type="button" class="ms-3 btn btn-success col-3 field-edit hidden save-btn">
                                                <ion-icon name="save-outline"></ion-icon>
                                                حفظ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion card features-card section-show" id="features-card">
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
                                            <div class="mb-4 d-flex align-items-center features-header">
                                                <label for="feature" class="form-label mb-0">الخصائص:</label>
                                                <button type="button" class="btn btn-primary ms-4 mb-0" title="إضافة خاصية">
                                                    <ion-icon name="add-outline"></ion-icon>
                                                </button>
                                                <p class="ms-4 d-inline-block mb-0">
                                                    <a href="javascript:void(0)" title="إضافة خاصية أساسية غير موجودة">إضافة خاصية أساسية غير موجودة</a>
                                                </p>
                                            </div>
                                            <div class="feature-wrapper d-flex align-items-center mb-4">
                                                <select class="form-select single-select me-4" name="feature" id="feature">
                                                    <option selected>اختر خاصية</option>
                                                    <option value="color">اللون</option>
                                                    <option value="size">الحجم</option>
                                                    <option value="height">الارتفاع</option>
                                                </select>
                                                <select class="form-select single-select" name="color" id="color">
                                                    <option value="1">الأبيض</option>
                                                    <option value="2">الأسود</option>
                                                    <option value="3">الرمادى</option>
                                                </select>
                                                <select class="form-select single-select" name="size" id="size" multiple>
                                                    <option value="1">L</option>
                                                    <option value="2">XL</option>
                                                    <option value="3">XXL</option>
                                                </select>
                                                <input type="text" class="form-control" name="height" id="height" placeholder="الارتفاع">
                                            </div>
                                        </div>
                                        <div class="mb-4 config-features">
                                            <div class="form-check form-switch mb-4 d-flex align-items-center">
                                                <input class="form-check-input me-4" type="checkbox" id="config-feature">
                                                <label class="form-check-label me-4" for="config-feature">الخصائص القابلة للاختيار</label>
                                                <button type="button" class="btn btn-primary hidden" title="إضافة خاصية">
                                                    <ion-icon name="add-outline" class="m-auto"></ion-icon>
                                                </button>
                                            </div>
                                            <div class="config-features-wrapper hidden">
                                                <div class="config-features-inner d-flex mb-4">
                                                    <select class="form-select single-select hidden me-4" name="config-feature-1" id="config-feature-1">
                                                        <option value="" selected>اختر خاصية</option>
                                                        <option value="config-feature-color">اللون</option>
                                                        <option value="config-feature-size">الحجم</option>
                                                        <option value="config-feature-height">الارتفاع</option>
                                                    </select>
                                                    <select class="form-select single-select hidden me-4" name="config-feature-2" id="config-feature-2">
                                                        <option value="" selected>اختر خاصية</option>
                                                        <option value="config-feature-color">اللون</option>
                                                        <option value="config-feature-size">الحجم</option>
                                                        <option value="config-feature-height">الارتفاع</option>
                                                    </select>
                                                    <select class="form-select single-select hidden" name="config-feature-3" id="config-feature-3">
                                                        <option value="" selected>اختر خاصية</option>
                                                        <option value="config-feature-color">اللون</option>
                                                        <option value="config-feature-size">الحجم</option>
                                                        <option value="config-feature-height">الارتفاع</option>
                                                    </select>
                                                </div>
                                                <div class="added-features">
                                                    <div class="d-flex align-items-center add-feature-btn mb-2">
                                                        <button type="button" class="btn btn-primary" title="إضافة صف">
                                                            <ion-icon name="add-outline"></ion-icon>
                                                        </button>
                                                    </div>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">الاسم المضاف</th>
                                                                <th scope="col">السعر</th>
                                                                <th scope="col">الكمية المتوفرة</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="d-flex align-items-center me-1" id="config-feature-1-wrapper">
                                                                            <select class="form-select single-select hidden me-2" name="config-feature-color" id="config-feature-color">
                                                                                <option value="1">الأبيض</option>
                                                                                <option value="2">الأسود</option>
                                                                                <option value="3">الرمادى</option>
                                                                            </select>
                                                                            <select class="form-select single-select hidden me-2" name="config-feature-size" id="config-feature-size" multiple>
                                                                                <option value="1">L</option>
                                                                                <option value="2">XL</option>
                                                                                <option value="3">XXL</option>
                                                                            </select>
                                                                            <input type="text" class="form-control hidden me-2" name="config-feature-height" id="config-feature-height" placeholder="الارتفاع">
                                                                        </div>
                                                                        <div class="d-flex align-items-center me-1" id="config-feature-2-wrapper">
                                                                            <select class="form-select single-select hidden me-2" name="config-feature-color" id="config-feature-color">
                                                                                <option value="1">الأبيض</option>
                                                                                <option value="2">الأسود</option>
                                                                                <option value="3">الرمادى</option>
                                                                            </select>
                                                                            <select class="form-select single-select hidden me-2" name="config-feature-size" id="config-feature-size" multiple>
                                                                                <option value="1">L</option>
                                                                                <option value="2">XL</option>
                                                                                <option value="3">XXL</option>
                                                                            </select>
                                                                            <input type="text" class="form-control hidden me-2" name="config-feature-height" id="config-feature-height" placeholder="الارتفاع">
                                                                        </div>
                                                                        <div class="d-flex align-items-center me-1" id="config-feature-3-wrapper">
                                                                            <select class="form-select single-select hidden me-2" name="config-feature-color" id="config-feature-color">
                                                                                <option value="1">الأبيض</option>
                                                                                <option value="2">الأسود</option>
                                                                                <option value="3">الرمادى</option>
                                                                            </select>
                                                                            <select class="form-select single-select hidden me-2" name="config-feature-size" id="config-feature-size" multiple>
                                                                                <option value="1">L</option>
                                                                                <option value="2">XL</option>
                                                                                <option value="3">XXL</option>
                                                                            </select>
                                                                            <input type="text" class="form-control hidden me-2" name="config-feature-height" id="config-feature-height" placeholder="الارتفاع">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <input type="number" class="form-control" name="added-price" id="added-price" placeholder="السعر">
                                                                        <p class="mb-0 ms-2">ريال سعودى</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <input type="number" class="form-control" name="added-quantity" id="added-quantity" placeholder="الكمية">
                                                                        <p class="mb-0 ms-1"></p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <button type="button" class="btn btn-warning col-3 field-show edit-btn">
                                                <ion-icon name="create-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
                                                تعديل
                                            </button>
                                            <button type="button" class="ms-3 btn btn-success col-3 field-edit hidden save-btn">
                                                <ion-icon name="save-outline"></ion-icon>
                                                حفظ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion card additional-information section-show" id="additional-information">
                            <div class="accordion-item">
                                <h6 class="card-header accordion-header p-0" id="additional-information-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#additional-information-content" aria-expanded="true" aria-controls="additional-information-content">
                                        <ion-icon name="help-buoy-outline"></ion-icon>
                                        <span>معلومات إضافية</span>
                                        <ion-icon name="chevron-down-outline"></ion-icon>
                                    </button>
                                </h6>
                                <div id="additional-information-content" class="accordion-collapse collapse" aria-labelledby="additional-information-header" data-bs-parent="#additional-information">
                                    <div class="accordion-body card-body">
                                        <div class="justify-content-start mb-4 d-flex align-items-center min-quantity">
                                            <label for="min-quantity" class="form-label me-4">الحد الأدنى للتنبيه: أقل من</label>
                                            <input type="number" min="1" class="form-control field-edit hidden" name="min-quantity" id="min-quantity" placeholder="1">
                                            <span class="field-show ms-2">
                                                <input type="number" min="" class="form-control" name="" id="" placeholder="" value="5" disabled>
                                            </span>
                                            <p class="mb-0 ms-2">
                                                وحدة القياس
                                            </p>
                                        </div>
                                        <div class="mb-4 suppliers">
                                            <label class="form-label mb-2">الموردون</label>
                                            <div class="d-flex align-items-center add-supplier-btn mb-2">
                                                <button type="button" class="btn btn-primary" title="إضافة مورد">
                                                    <ion-icon name="add-outline"></ion-icon>
                                                </button>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">اسم المورد</th>
                                                        <th scope="col">السعر</th>
                                                        <th scope="col">رمز المنتج عند المورد</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <input type="text" class="form-control" name="supplier-1" id="supplier-1" placeholder="اسم المورد">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <input type="number" class="form-control" name="added-price" id="added-price" placeholder="السعر">
                                                                <p class="mb-0 ms-2">ريال سعودى</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <input type="text" class="form-control" name="supplier-code" id="supplier-code" title="رمز المادة الأولية عند المورد" placeholder="رمز المادة الأولية">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <button type="button" class="btn btn-warning col-3 field-show edit-btn">
                                                <ion-icon name="create-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
                                                تعديل
                                            </button>
                                            <button type="button" class="ms-3 btn btn-success col-3 field-edit hidden save-btn">
                                                <ion-icon name="save-outline"></ion-icon>
                                                حفظ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- End the Arabic content -->
                
                <div class="tab-pane fade" id="english-content" role="tabpanel" aria-labelledby="english-content">
                    <form action="#" class="add-item-form english-add-item" name="english-add-product" id="english-add-product" method="GET">
                        <div class="accordion card basic-information section-show" id="basic-information-en">
                            <div class="accordion-item">
                                <h6 class="card-header accordion-header p-0" id="basic-information-header-en">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#basic-information-content-en" aria-expanded="true" aria-controls="basic-information-content-en">
                                        <ion-icon name="barcode-outline"></ion-icon>
                                        <span>المعلومات الأساسية</span>
                                        <ion-icon name="chevron-down-outline"></ion-icon>
                                    </button>
                                </h6>
                                <div id="basic-information-content-en" class="accordion-collapse collapse show" aria-labelledby="basic-information-header-en" data-bs-parent="#basic-information-en">
                                    <div class="accordion-body card-body">
                                        <div class="mb-4 d-flex main-sub-categories">
                                            <div class="input-group">
                                                <label for="parent-en" class="form-label me-3">المجموعة الرئيسية</label>
                                                <select class="form-select single-select field-edit hidden" name="parent-en" id="parent-en">
                                                    <option selected>اختر مجموعة</option>
                                                    <option value="1">ستائر</option>
                                                    <option value="2">ستائر 2</option>
                                                    <option value="3">ستائر 3</option>
                                                </select>
                                                <span class="field-show">ستائر</span>
                                            </div>
                                        </div>
                                        <div class="mb-4 d-flex align-items-center name-barcode">
                                            <div class="input-group">
                                                <label for="name-en" class="form-label">الاسم</label>
                                                <input type="text" class="form-control field-edit hidden" name="name-en" id="name-en" placeholder="">
                                                <span class="field-show">منتج ستائر</span>
                                            </div>
                                            <div class="input-group barcode-input-group">
                                                <label for="barcode-en" class="form-label">الباركود</label>
                                                <div class="barcode-en field-edit hidden"></div>
                                                <span class="field-show"></span>
                                            </div>
                                        </div>
                                        <div class="mb-4 d-flex code-wrapper">
                                            <div class="input-group">
                                                <label for="code-en" class="form-label">الرمز</label>
                                                <input type="text" class="form-control field-edit hidden" name="code-en" id="code-en" placeholder="Item code">
                                                <span class="field-show">0x40s4d</span>
                                            </div>
                                        </div>
                                        <div class="mb-4 d-flex align-items-center price">
                                            <div class="input-group">
                                                <label for="price-en" class="form-label">السعر</label>
                                                <input type="number" class="form-control field-edit hidden" name="price-en" id="price-en" placeholder="">
                                                <span class="field-show">50</span>
                                                <p class="mb-0 ms-2">ريال سعودى</p>
                                            </div>
                                        </div>
                                        <div class="justify-content-start mb-4 d-flex align-items-center quantity">
                                            <label for="quantity-en" class="form-label text-end">الكمية</label>
                                            <input type="number" class="form-control me-2 field-edit hidden" name="quantity-en" id="quantity-en" placeholder="">
                                            <select class="form-select single-select ms-4 field-edit hidden" name="unit-en" id="unit-en">
                                                <option value="1" selected>حبة</option>
                                                <option value="2">متر</option>
                                                <option value="3">كيلو</option>
                                            </select>
                                            <span class="field-show me-2">4</span>
                                            <span class="field-show">كيلو</span>
                                        </div>
                                        <div class="mb-4 description">
                                            <label for="description-en" class="form-label">الوصف</label>
                                            <textarea name="description-en" id="description-en" class="form-control field-edit hidden" cols="30" rows="10" placeholder=""></textarea>
                                            <p class="field-show mb-0">وصف المادة الأولية التجريبى</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <button type="button" class="btn btn-warning col-3 field-show edit-btn">
                                                <ion-icon name="create-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
                                                تعديل
                                            </button>
                                            <button type="button" class="ms-3 btn btn-success col-3 field-edit hidden save-btn">
                                                <ion-icon name="save-outline"></ion-icon>
                                                حفظ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion card media section-show" id="media-en">
                            <div class="accordion-item">
                                <h6 class="card-header accordion-header p-0" id="media-header-en">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#media-content-en" aria-expanded="true" aria-controls="media-content-en">
                                        <ion-icon name="images-outline"></ion-icon>
                                        <span>الوسائط</span>
                                        <ion-icon name="chevron-down-outline"></ion-icon>
                                    </button>
                                </h6>
                                <div id="media-content-en" class="accordion-collapse collapse" aria-labelledby="media-header-en" data-bs-parent="#media-en">
                                    <div class="accordion-body card-body">
                                        <div class="mb-4 images">
                                            <div class="mb-1">
                                                <label for="image-en" class="form-label me-4 mb-3">صورة</label>
                                                <input id="image-en" name="image-en" type="file" class="field-edit hidden" accept=".jpg,.jpeg,.png" multiple>
                                                <div class="field-show">
                                                    <img src="https://via.placeholder.com/150" alt="" class="ms-2">
                                                    <img src="https://via.placeholder.com/150" alt="" class="ms-2">
                                                    <img src="https://via.placeholder.com/150" alt="" class="ms-2">
                                                    <img src="https://via.placeholder.com/150" alt="" class="ms-2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 files">
                                            <div class="mb-1">
                                                <label for="file-en" class="form-label me-4 mb-3">مستند</label>
                                                <input id="file-en" name="file-en" type="file" class="field-edit hidden" accept=".pdf,.xsl,.xsls,.ppt,.pptx,.doc,.docx" multiple>
                                                <div class="field-show"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <button type="button" class="btn btn-warning col-3 field-show edit-btn">
                                                <ion-icon name="create-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
                                                تعديل
                                            </button>
                                            <button type="button" class="ms-3 btn btn-success col-3 field-edit hidden save-btn">
                                                <ion-icon name="save-outline"></ion-icon>
                                                حفظ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion card features-card section-show" id="features-card-en">
                            <div class="accordion-item">
                                <h6 class="card-header accordion-header p-0" id="features-card-header-en">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#features-card-content-en" aria-expanded="true" aria-controls="features-card-content-en">
                                        <ion-icon name="construct-outline"></ion-icon>
                                        <span>الخصائص الأساسية</span>
                                        <ion-icon name="chevron-down-outline"></ion-icon>
                                    </button>
                                </h6>
                                <div id="features-card-content-en" class="accordion-collapse collapse" aria-labelledby="features-card-header-en" data-bs-parent="#features-card-en">
                                    <div class="accordion-body card-body">
                                        <div class="mb-4 features">
                                            <div class="mb-4 d-flex align-items-center features-header">
                                                <label for="feature-en" class="form-label mb-0">الخصائص:</label>
                                                <button type="button" class="btn btn-primary ms-4 mb-0" title="إضافة خاصية">
                                                    <ion-icon name="add-outline"></ion-icon>
                                                </button>
                                                <p class="ms-4 d-inline-block mb-0">
                                                    <a href="javascript:void(0)" title="إضافة خاصية أساسية غير موجودة">إضافة خاصية أساسية غير موجودة</a>
                                                </p>
                                            </div>
                                            <div class="feature-wrapper d-flex align-items-center mb-4">
                                                <select class="form-select single-select me-4" name="feature-en" id="feature-en">
                                                    <option selected>اختر خاصية</option>
                                                    <option value="color">اللون</option>
                                                    <option value="size">الحجم</option>
                                                    <option value="height">الارتفاع</option>
                                                </select>
                                                <select class="form-select single-select" name="color-en" id="color-en">
                                                    <option value="1">الأبيض</option>
                                                    <option value="2">الأسود</option>
                                                    <option value="3">الرمادى</option>
                                                </select>
                                                <select class="form-select single-select" name="size-en" id="size-en" multiple>
                                                    <option value="1">L</option>
                                                    <option value="2">XL</option>
                                                    <option value="3">XXL</option>
                                                </select>
                                                <input type="text" class="form-control" name="height-en" id="height-en" placeholder="الارتفاع">
                                            </div>
                                        </div>
                                        <div class="mb-4 config-features">
                                            <div class="form-check form-switch mb-4 d-flex align-items-center">
                                                <input class="form-check-input me-4" type="checkbox" id="config-feature-en">
                                                <label class="form-check-label me-4" for="config-feature-en">الخصائص القابلة للاختيار</label>
                                                <button type="button" class="btn btn-primary hidden" title="إضافة خاصية">
                                                    <ion-icon name="add-outline" class="m-auto"></ion-icon>
                                                </button>
                                            </div>
                                            <div class="config-features-wrapper hidden">
                                                <div class="config-features-inner d-flex mb-4">
                                                    <select class="form-select single-select hidden me-4" name="config-feature-1-en" id="config-feature-1-en">
                                                        <option value="" selected>اختر خاصية</option>
                                                        <option value="config-feature-color">اللون</option>
                                                        <option value="config-feature-size">الحجم</option>
                                                        <option value="config-feature-height">الارتفاع</option>
                                                    </select>
                                                    <select class="form-select single-select hidden me-4" name="config-feature-2-en" id="config-feature-2-en">
                                                        <option value="" selected>اختر خاصية</option>
                                                        <option value="config-feature-color">اللون</option>
                                                        <option value="config-feature-size">الحجم</option>
                                                        <option value="config-feature-height">الارتفاع</option>
                                                    </select>
                                                    <select class="form-select single-select hidden" name="config-feature-3-en" id="config-feature-3-en">
                                                        <option value="" selected>اختر خاصية</option>
                                                        <option value="config-feature-color">اللون</option>
                                                        <option value="config-feature-size">الحجم</option>
                                                        <option value="config-feature-height">الارتفاع</option>
                                                    </select>
                                                </div>
                                                <div class="added-features">
                                                    <div class="d-flex align-items-center add-feature-btn mb-2">
                                                        <button type="button" class="btn btn-primary" title="إضافة صف">
                                                            <ion-icon name="add-outline"></ion-icon>
                                                        </button>
                                                    </div>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">الاسم المضاف</th>
                                                                <th scope="col">السعر</th>
                                                                <th scope="col">الكمية المتوفرة</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="d-flex align-items-center me-1" id="config-feature-1-wrapper-en">
                                                                            <select class="form-select single-select hidden me-2" name="config-feature-color-en" id="config-feature-color-en">
                                                                                <option value="1">الأبيض</option>
                                                                                <option value="2">الأسود</option>
                                                                                <option value="3">الرمادى</option>
                                                                            </select>
                                                                            <select class="form-select single-select hidden me-2" name="config-feature-size-en" id="config-feature-size-en" multiple>
                                                                                <option value="1">L</option>
                                                                                <option value="2">XL</option>
                                                                                <option value="3">XXL</option>
                                                                            </select>
                                                                            <input type="text" class="form-control hidden me-2" name="config-feature-height-en" id="config-feature-height-en" placeholder="Height">
                                                                        </div>
                                                                        <div class="d-flex align-items-center me-1" id="config-feature-2-wrapper-en">
                                                                            <select class="form-select single-select hidden me-2" name="config-feature-color-en" id="config-feature-color-en">
                                                                                <option value="1">الأبيض</option>
                                                                                <option value="2">الأسود</option>
                                                                                <option value="3">الرمادى</option>
                                                                            </select>
                                                                            <select class="form-select single-select hidden me-2" name="config-feature-size-en" id="config-feature-size-en" multiple>
                                                                                <option value="1">L</option>
                                                                                <option value="2">XL</option>
                                                                                <option value="3">XXL</option>
                                                                            </select>
                                                                            <input type="text" class="form-control hidden me-2" name="config-feature-height-en" id="config-feature-height-en" placeholder="Height">
                                                                        </div>
                                                                        <div class="d-flex align-items-center me-1" id="config-feature-3-wrapper-en">
                                                                            <select class="form-select single-select hidden me-2" name="config-feature-color-en" id="config-feature-color-en">
                                                                                <option value="1">الأبيض</option>
                                                                                <option value="2">الأسود</option>
                                                                                <option value="3">الرمادى</option>
                                                                            </select>
                                                                            <select class="form-select single-select hidden me-2" name="config-feature-size-en" id="config-feature-size-en" multiple>
                                                                                <option value="1">L</option>
                                                                                <option value="2">XL</option>
                                                                                <option value="3">XXL</option>
                                                                            </select>
                                                                            <input type="text" class="form-control hidden me-2" name="config-feature-height-en" id="config-feature-height-en" placeholder="Height">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <input type="number" class="form-control" name="added-price-en" id="added-price-en" placeholder="Price">
                                                                        <p class="mb-0 ms-2">ريال سعودى</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <input type="number" class="form-control" name="added-quantity-en" id="added-quantity-en" placeholder="Quantity">
                                                                        <p class="mb-0 ms-1"></p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <button type="button" class="btn btn-warning col-3 field-show edit-btn">
                                                <ion-icon name="create-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
                                                تعديل
                                            </button>
                                            <button type="button" class="ms-3 btn btn-success col-3 field-edit hidden save-btn">
                                                <ion-icon name="save-outline"></ion-icon>
                                                حفظ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion card additional-information section-show" id="additional-information-en">
                            <div class="accordion-item">
                                <h6 class="card-header accordion-header p-0" id="additional-information-header-en">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#additional-information-content-en" aria-expanded="true" aria-controls="additional-information-content-en">
                                        <ion-icon name="help-buoy-outline"></ion-icon>
                                        <span>معلومات إضافية</span>
                                        <ion-icon name="chevron-down-outline"></ion-icon>
                                    </button>
                                </h6>
                                <div id="additional-information-content-en" class="accordion-collapse collapse" aria-labelledby="additional-information-header-en" data-bs-parent="#additional-information-en">
                                    <div class="accordion-body card-body">
                                        <div class="justify-content-start mb-4 d-flex align-items-center min-quantity">
                                            <label for="min-quantity-en" class="form-label me-4">الحد الأدنى للتنبيه: أقل من</label>
                                            <input type="number" min="1" class="form-control field-edit hidden" name="min-quantity-en" id="min-quantity-en" placeholder="1">
                                            <span class="field-show ms-2">5</span>
                                            <p class="mb-0 ms-2">
                                                وحدة القياس
                                            </p>
                                        </div>
                                        <div class="mb-4 suppliers">
                                            <label class="form-label mb-2">الموردون</label>
                                            <div class="d-flex align-items-center add-supplier-btn mb-2">
                                                <button type="button" class="btn btn-primary" title="إضافة مورد">
                                                    <ion-icon name="add-outline"></ion-icon>
                                                </button>
                                            </div>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">اسم المورد</th>
                                                        <th scope="col">السعر</th>
                                                        <th scope="col">رمز المنتج عند المورد</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <input type="text" class="form-control" name="supplier-1-en" id="supplier-1-en" placeholder="Supplier name">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <input type="number" class="form-control" name="added-price-en" id="added-price-en" placeholder="Price">
                                                                <p class="mb-0 ms-2">ريال سعودى</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <input type="text" class="form-control" name="supplier-code-en" id="supplier-code-en" title="Supplier's item code" placeholder="Item Code">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end">
                                            <button type="button" class="btn btn-warning col-3 field-show edit-btn">
                                                <ion-icon name="create-outline" role="img" class="md hydrated" aria-label="close outline"></ion-icon>
                                                تعديل
                                            </button>
                                            <button type="button" class="ms-3 btn btn-success col-3 field-edit hidden save-btn">
                                                <ion-icon name="save-outline"></ion-icon>
                                                حفظ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- End the English content -->
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
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/form-select single-select2.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancy-file-uploader/jquery.fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js')}}"></script>
@endsection
