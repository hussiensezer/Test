$(function() {

    // Date Picker
    if ($('.datepicker-custom').length > 0) {
        $('.datepicker-custom').pickadate({
            monthsFull: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيه', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
            monthsShort: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيه', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
            weekdaysFull: ['الأحد' ,'الإثنين' ,'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
            weekdaysShort: ['الأحد' ,'الإثنين' ,'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
            today: 'اليوم',
            clear: 'مسح',
            close: 'إلغاء'
        });
    }

    // The Searchabe Dropdown
    if ($('.single-select').length > 0) {
        // $('body').find('.single-select').each(function() {
        //     let dropdownParent = $(document.body);
        //     if ($(this).parent('div').length !== 0)
        //         dropdownParent = $(this).parent('div');
        //     $(this).select2({
        //         dropdownParent: dropdownParent
        //     });
        // });

        $('body').on('shown.bs.modal', '.modal', function() {
            $(this).find('.single-select').each(function() {
              let dropdownParent = $(document.body);
              if ($(this).parent('div').length !== 0)
                dropdownParent = $(this).parent('div');
              $(this).select2({
                dropdownParent: dropdownParent
              });
            });
        });
    }

    // Custom File Upload
    if ($('input[type=file]').length > 0) {
        $('input[type=file]').FancyFileUpload({
            params : {
                action : 'fileuploader'
            },
            maxfilesize : 1000000    
        });
    }

    if ($('input[type=file] + .ff_fileupload_wrap .ff_fileupload_dropzone_wrap').length > 0) {
        $('input[type=file].multiple-images + .ff_fileupload_wrap .ff_fileupload_dropzone').append('<a href="javascript:void(0);" class="btn btn-primary" title="إضافة صورة أو أكثر"><ion-icon name="add-outline"></ion-icon></a>');
        $('input[type=file].multiple-images + .ff_fileupload_wrap .ff_fileupload_dropzone').append('<span class"add-images-caption">اضف صورة أو أكثر</span>');

        $('input[type=file].multiple-files + .ff_fileupload_wrap .ff_fileupload_dropzone').append('<a href="javascript:void(0);" class="btn btn-primary" title="إضافة مستند أو أكثر"><ion-icon name="add-outline"></ion-icon></a>');
        $('input[type=file].multiple-files + .ff_fileupload_wrap .ff_fileupload_dropzone').append('<span class"add-images-caption">اضف مستند أو أكثر</span>');

        $('input[type=file].signle-image + .ff_fileupload_wrap .ff_fileupload_dropzone').append('<a href="javascript:void(0);" class="btn btn-primary" title="إضافة صورة"><ion-icon name="add-outline"></ion-icon></a>');
        $('input[type=file].single-image + .ff_fileupload_wrap .ff_fileupload_dropzone').append('<span class"add-images-caption">اضف صورة</span>');

        $('input[type=file].signle-file + .ff_fileupload_wrap .ff_fileupload_dropzone').append('<a href="javascript:void(0);" class="btn btn-primary" title="إضافة مستند"><ion-icon name="add-outline"></ion-icon></a>');
        $('input[type=file].single-file + .ff_fileupload_wrap .ff_fileupload_dropzone').append('<span class"add-images-caption">اضف مستند</span>');
    }

    // The Categories Data Table
    if ($('table#categories').length > 0) {
        var categoriesTable = $('table#categories').DataTable({
            buttons: ['excel', 'pdf', 'print'],
            searching: false,
            paging: false,
            ordering: false
        });
        categoriesTable.buttons().container().appendTo('#categories_wrapper .col-md-6:eq(0)');
    }

    // The Products Data Table
    if ($('table#products').length > 0) {
        var productsTable = $('table#products').DataTable({
            buttons: ['excel', 'pdf', 'print'],
            searching: false,
            paging: false,
            ordering: false
        });
        productsTable.buttons().container().appendTo('#products_wrapper .col-md-6:eq(0)');
    }

    // Adding the active and show classes to the languages tabs
    if ($('.languages-tabs-wrapper').length > 0) {
        $('.languages-tabs-wrapper .nav-item:first-child .nav-link').addClass('active');
        $('.languages-tabs-wrapper .tab-pane:first-child').addClass('show active');
    }

    function fetchRecords(api, query = '', selector = '') {
        $.ajax({
            url: api + query,
            type: 'get',
            dataType: 'json',
            success: function(response){
                let len = 0;
                let data = response.categories.data;
                let lang = $('html').attr('lang');
                selector.empty(); // Empty <tbody>

                if(data != null){
                    len = data.length;
                }
    
                if(len > 0) {
                    for(let i = 0; i < len; i++) {
                        let id = data[i].id;
                        let name = data[i].name[lang];
                        let date = data[i].created_at
                        let description = data[i].description[lang];
                        let level = data[i].level;
                        let childCount = data[i].child_categories_count || 'لا يوجد';
                        let status = data[i].status;
        
                        let tr = `
                            <tr class="odd">
                                <td>${id}</td>
                                <td>${name}</td>
                                <td>${date}</td>
                                <td>${description}</td>
                                <td>${level}</td>
                                <td>${childCount}</td>
                                <td>
                                    ${status == 1 ? 
                                        `<span class="badge bg-light-success text-success w-100">مفعل</span>` :
                                        `<span class="badge bg-light-danger text-danger w-100">معطل</span>`
                                    }
                                </td>
                                <td>
                                    <img src="https://via.placeholder.com/30" alt="">
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="javascript:;" class="edit fs-5" title="تعديل"  data-bs-toggle="modal" data-bs-target="#edit-category-${id}">
                                        <ion-icon name="create-outline"></ion-icon>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade edit-category-modal" id="edit-category-${id}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">تعديل مجموعة المواد الأولية</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form name="edit-category-${id}-form" id="edit-category-${id}-form" method="POST" action="#">
                                                <div class="modal-body">
                                                <div class="mb-4">
                                                    <label for="edit-name" class="form-label">الاسم</label>
                                                    <input type="text" class="form-control" name="edit-name" id="edit-name" placeholder="" value="${name}">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="edit-description" class="form-label">الوصف</label>
                                                    <textarea name="edit-description" id="description" class="form-control" cols="30" rows="5" placeholder="">${description}</textarea>
                                                </div>
                                                <div class="mb-4 overflow-hidden">
                                                    <label for="edit-parent" class="form-label">المجموعة الأب</label>
                                                    <select class="single-select" name="edit-parent" id="edit-parent">
                                                        <option value="">اختر من القائمة</option>
                                                        <option value="1">ستائر</option>
                                                        <option value="2" selected>ستائر 2</option>
                                                        <option value="3">ستائر 3</option>
                                                        </select>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="edit-image" class="form-label">صورة</label>
                                                    <input id="edit-image" name="edit-image" type="file" accept=".jpg,.jpeg,.png" multiple>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                    <ion-icon name="close-circle-outline"></ion-icon>
                                                    <span>إلغاء</span>
                                                </button>
                                                <button type="submit" class="btn btn-success">
                                                    <ion-icon name="create-outline"></ion-icon>
                                                    <span>تعديل المجموعة</span>
                                                </button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        selector.append(tr);

                        for (let x = 0; x < childCount; x++) {
                            let id = data[i].child_categories[x].id;
                            let name = data[i].child_categories[x].name[lang];
                            let date = data[i].child_categories[x].created_at
                            let description = data[i].child_categories[x].description[lang];
                            let level = data[i].child_categories[x].level;
                            let childCount = data[i].child_categories[x].child_categories_count || 'لا يوجد';
                            let status = data[i].child_categories[x].status;

                            let tr = `
                            <tr class="sub-parent">
                                <td>- ${id}</td>
                                <td>${name}</td>
                                <td>${date}</td>
                                <td>${description}</td>
                                <td>${level}</td>
                                <td>${childCount}</td>
                                <td>
                                    ${status == 1 ? 
                                        `<span class="badge bg-light-success text-success w-100">مفعل</span>` :
                                        `<span class="badge bg-light-danger text-danger w-100">معطل</span>`
                                    }
                                </td>
                                <td>
                                    <img src="https://via.placeholder.com/30" alt="">
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="javascript:;" class="edit fs-5" title="تعديل"  data-bs-toggle="modal" data-bs-target="#edit-category-${id}">
                                        <ion-icon name="create-outline"></ion-icon>
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade edit-category-modal" id="edit-category-${id}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">تعديل مجموعة المواد الأولية</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form name="edit-category-${id}-form" id="edit-category-${id}-form" method="POST" action="#">
                                                <div class="modal-body">
                                                <div class="mb-4">
                                                    <label for="edit-name" class="form-label">الاسم</label>
                                                    <input type="text" class="form-control" name="edit-name" id="edit-name" placeholder="" value="${name}">
                                                </div>
                                                <div class="mb-4">
                                                    <label for="edit-description" class="form-label">الوصف</label>
                                                    <textarea name="edit-description" id="description" class="form-control" cols="30" rows="5" placeholder="">${description}</textarea>
                                                </div>
                                                <div class="mb-4 overflow-hidden">
                                                    <label for="edit-parent" class="form-label">المجموعة الأب</label>
                                                    <select class="single-select" name="edit-parent" id="edit-parent">
                                                        <option value="">اختر من القائمة</option>
                                                        <option value="1">ستائر</option>
                                                        <option value="2" selected>ستائر 2</option>
                                                        <option value="3">ستائر 3</option>
                                                        </select>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="edit-image" class="form-label">صورة</label>
                                                    <input id="edit-image" name="edit-image" type="file" accept=".jpg,.jpeg,.png" multiple>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                    <ion-icon name="close-circle-outline"></ion-icon>
                                                    <span>إلغاء</span>
                                                </button>
                                                <button type="submit" class="btn btn-success">
                                                    <ion-icon name="create-outline"></ion-icon>
                                                    <span>تعديل المجموعة</span>
                                                </button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        selector.append(tr);

                        for (let z = 0; z < childCount; z++) {
                            let id = data[i].child_categories[x].child_categories[z].id;
                            let name = data[i].child_categories[x].child_categories[z].name[lang];
                            let date = data[i].child_categories[x].child_categories[z].created_at
                            let description = data[i].child_categories[x].child_categories[z].description[lang];
                            let level = data[i].child_categories[x].child_categories[z].level;
                            let childCount = data[i].child_categories[x].child_categories[z].child_categories_count || 'لا يوجد';
                            let status = data[i].child_categories[x].child_categories[z].status;

                            let tr = `
                                <tr class="sub-child">
                                    <td>-- ${id}</td>
                                    <td>${name}</td>
                                    <td>${date}</td>
                                    <td>${description}</td>
                                    <td>${level}</td>
                                    <td>${childCount}</td>
                                    <td>
                                        ${status == 1 ? 
                                            `<span class="badge bg-light-success text-success w-100">مفعل</span>` :
                                            `<span class="badge bg-light-danger text-danger w-100">معطل</span>`
                                        }
                                    </td>
                                    <td>
                                        <img src="https://via.placeholder.com/30" alt="">
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="javascript:;" class="edit fs-5" title="تعديل"  data-bs-toggle="modal" data-bs-target="#edit-category-${id}">
                                            <ion-icon name="create-outline"></ion-icon>
                                            </a>
                                            <!-- Modal -->
                                            <div class="modal fade edit-category-modal" id="edit-category-${id}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">تعديل مجموعة المواد الأولية</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form name="edit-category-${id}-form" id="edit-category-${id}-form" method="POST" action="#">
                                                    <div class="modal-body">
                                                    <div class="mb-4">
                                                        <label for="edit-name" class="form-label">الاسم</label>
                                                        <input type="text" class="form-control" name="edit-name" id="edit-name" placeholder="" value="${name}">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="edit-description" class="form-label">الوصف</label>
                                                        <textarea name="edit-description" id="description" class="form-control" cols="30" rows="5" placeholder="">${description}</textarea>
                                                    </div>
                                                    <div class="mb-4 overflow-hidden">
                                                        <label for="edit-parent" class="form-label">المجموعة الأب</label>
                                                        <select class="single-select" name="edit-parent" id="edit-parent">
                                                            <option value="">اختر من القائمة</option>
                                                            <option value="1">ستائر</option>
                                                            <option value="2" selected>ستائر 2</option>
                                                            <option value="3">ستائر 3</option>
                                                            </select>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="edit-image" class="form-label">صورة</label>
                                                        <input id="edit-image" name="edit-image" type="file" accept=".jpg,.jpeg,.png" multiple>
                                                    </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                        <ion-icon name="close-circle-outline"></ion-icon>
                                                        <span>إلغاء</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-success">
                                                        <ion-icon name="create-outline"></ion-icon>
                                                        <span>تعديل المجموعة</span>
                                                    </button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            `;
                            selector.append(tr);
                            }
                        }
                    }
                } else {
                    let tr = `
                        <tr>
                            <td>
                                لا يوجد مجموعات
                            </td>
                        </tr>
                    `;
            
                    selector.append(tr);
                }
            }
        });

        // Deleting row btn's functionality
        $('input.delete').each(function () {
            $(this).click(function () {
                $(this).parents('tr').remove();
            });
        });
    }

    // Fetching the Items Categories
    if ($('.items-categories tbody').length > 0) {
        fetchRecords('/dashboard/categories/item/data', '', $('.items-categories tbody'));
    }

    // Fetching the Products Categories
    if ($('.products-categories tbody').length > 0) {
        fetchRecords('/dashboard/categories/product/data', '', $('.products-categories tbody'));
    }

    function fetchCategories(api, selector = '') {
        $.ajax({
            url: api,
            type: 'get',
            dataType: 'json',
            success: function(response){
                let len = 0;
                let data = response.categories;
                let lang = $('html').attr('lang');
                selector.empty().append('<option selected>اختر من القائمة</option>'); // Empty <select>

                if(data != null){
                    len = data.length;
                }
    
                if(len > 0) {
                    for(let i = 0; i < len; i++) {
                        let id = data[i].id;
                        let name = data[i].name[lang];

                        let option = `
                            <option value="${id}">${name}</option>
                        `;

                        selector.append(option);
                    }
                }
            }
        });
    }

    function fetchSubCategories(api, selector = '') {
        $.ajax({
            url: api,
            type: 'get',
            dataType: 'json',
            success: function(response){
                let len = 0;
                let data = response.subCategories;
                let lang = $('html').attr('lang');
                selector.empty(); // Empty <select>

                if(data != null){
                    len = data.length;
                }
    
                if(len > 0) {
                    for(let i = 0; i < len; i++) {
                        let id = data[i].id;
                        let name = data[i].name[lang];

                        let option = `
                            <option value="${id}">${name}</option>
                        `;

                        selector.append(option);
                    }
                }
            }
        });
    }

    // Fetching the Items Category names and IDs
    if ($('#item-addcategory-form .parent-category-select').length > 0) {
        fetchCategories('/dashboard/categories/item/categories', $('#item-addcategory-form .parent-category-select select'));

        $('#item-addcategory-form .parent-category-select select').change(function () {
            let id = $(this).val();
            // Fetching the Items Category names and IDs
            if (id > 0) {
                $('#item-addcategory-form .child-category-select').removeClass('hidden');
                fetchSubCategories(`/dashboard/categories/item/category/${id}/sub-categories`, $('#item-addcategory-form .child-category-select select'));
            } else {
                $('#item-addcategory-form .child-category-select').addClass('hidden');
            }
        });
    }

    // When submitting the Item add New Category form
    $('#item-addcategory-form').submit(function (e) {
        e.preventDefault();

        let url = $(this).attr('action');
        let type = $(this).attr('method');
        let formData = new FormData(this);

        // Custom File Upload
        if ($('#item-addcategory-form #image').length > 0) {
          $('#item-addcategory-form #image').FancyFileUpload({
              url: url,
              params : {
                  _token : $(this).find('input[name=_token]').first().val()
              },
              maxfilesize : 1000000,
              edit: false
          });
        }
        

        $.ajax({
            url: url,
            type: type,
            data: formData,
            async: true,
            timeout: 60000,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
            },
            error: function(err) {
                console.log(err);
            }
        });
    });

    // Fetching the Products Category names and IDs
    if ($('#product-addcategory-form .parent-category-select').length > 0) {
        fetchCategories('/dashboard/categories/product/categories', $('#product-addcategory-form .parent-category-select select'));

        $('#product-addcategory-form .parent-category-select select').change(function () {
            let id = $(this).val();
            // Fetching the Items Category names and IDs
            if (id > 0) {
                $('#product-addcategory-form .child-category-select').removeClass('hidden');
                fetchSubCategories(`/dashboard/categories/product/category/${id}/sub-categories`, $('#product-addcategory-form .child-category-select select'));
            } else {
                $('#product-addcategory-form .child-category-select').addClass('hidden');
            }
        });
    }

    // When submitting the Products add New Category form
    $('#product-addcategory-form').submit(function (e) {
        e.preventDefault();

        let url = $(this).attr('action');
        let type = $(this).attr('method');
        let formData = new FormData(this);

        // Custom File Upload
        if ($('#product-addcategory-form #image').length > 0) {
          $('#product-addcategory-form #image').FancyFileUpload({
              url: url,
              params : {
                  _token : $(this).find('input[name=_token]').first().val()
              },
              maxfilesize : 1000000,
              edit: false
          });
        }
        

        $.ajax({
            url: url,
            type: type,
            data: formData,
            async: true,
            timeout: 60000,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
            },
            error: function(err) {
                console.log(err);
            }
        });
    });

    // Changing the data table classes
    if ($('.dataTables_wrapper').length > 0) {
        // Adjust the controls classes
        $('.dataTables_wrapper .row:first-child > *')
        .removeClass('col-sm-12 col-md-6')
        .addClass('col');
        $('.dataTables_wrapper .row:first-child > div:first-child').addClass('col-md-3 d-flex');
        $('.dataTables_wrapper .row:first-child > div:last-child').addClass('col-md-9');

        // Changing the table buttons text
        $('.buttons-print').text('طباعة');

        $('.dataTables_wrapper > .row:first-child > div:last-child').append($('.table-custom-controls'));
    }

    // Setting the Filter Quantity Range
    const filterQuantity = $('#filter-quantity');
    if (filterQuantity.length > 0) {
        filterQuantity.next('.range-values').children('.min').text(filterQuantity.attr('min'));
        filterQuantity.next('.range-values').children('.val').text(filterQuantity.val());
        filterQuantity.next('.range-values').children('.max').text(filterQuantity.attr('max'));

        filterQuantity.change(function () {
            $(this).next('.range-values').children('.min').text($(this).attr('min'));
            $(this).next('.range-values').children('.val').text($(this).val());
            $(this).next('.range-values').children('.max').text($(this).attr('max'));
        });

        filterQuantity.on('input', function () {
            $(this).next('.range-values').children('.min').text($(this).attr('min'));
            $(this).next('.range-values').children('.val').text($(this).val());
            $(this).next('.range-values').children('.max').text($(this).attr('max'));
        });
    }

    // Setting the Filter Price Range
    const filterPrice = $('#filter-price');
    if (filterPrice.length > 0) {
        filterPrice.next('.range-values').children('.min').text(filterPrice.attr('min'));
        filterPrice.next('.range-values').children('.val').text(filterPrice.val());
        filterPrice.next('.range-values').children('.max').text(filterPrice.attr('max'));

        filterPrice.change(function () {
            $(this).next('.range-values').children('.min').text($(this).attr('min'));
            $(this).next('.range-values').children('.val').text($(this).val());
            $(this).next('.range-values').children('.max').text($(this).attr('max'));
        });

        filterQuantity.on('input', function () {
            $(this).next('.range-values').children('.min').text($(this).attr('min'));
            $(this).next('.range-values').children('.val').text($(this).val());
            $(this).next('.range-values').children('.max').text($(this).attr('max'));
        });
    }

    // Showing the features drop downs
    // function showingFeaturesDropdowns() {
    //     $(".features > div > select:first-child").change(function () {
    //         if($('#' + $(this).val()).length) {
    //             $('#' + $(this).val()).show();
    //             $('#' + $(this).val()).siblings().not($(this)).hide();
    //         } else {
    //             $(this).siblings().hide();
    //         }
    //     });
    // }
    // showingFeaturesDropdowns();

    // Cloning the Features drop downs
    // var featuresCount = 1;
    // $('.features-header button').click(function () {
    //     // cloning the wrapper div and change its className
    //     let element = $('.feature-wrapper').clone()
    //                 .removeClass('feature-wrapper')
    //                 .addClass('feature-wrapper-' + featuresCount);

    //     // Append the new wrapper in the end
    //     element.appendTo('.features');
        
    //     // Changing the id and the name attributes of each select element
    //     element.children()
    //     .each(function () {
    //         $(this).attr({
    //             'id': $(this).attr('id') + '-' + featuresCount,
    //             'name': $(this).attr('name') + '-' + featuresCount
    //         })
    //     });

    //     // Changing the value of each option of the first select element
    //     element.find('select:first-child option').each(function () {
    //         $(this).attr('value', $(this).attr('value') + '-' + featuresCount);
    //     });

    //     showingFeaturesDropdowns();

    //     featuresCount++;
    // });



    // The Configuration features:
    // The checkbox switcher
    $('.config-features .form-check-input').change(function () {
        if($(this).prop("checked")) {
            $('.config-features-wrapper').removeClass('hidden');
            $(this).siblings('.btn').removeClass('hidden');
        } else {
            $('.config-features-wrapper').addClass('hidden');
            $(this).siblings('.btn').addClass('hidden');
        }
    });

    // Showing the hidden config features
    $('.config-features .form-check .btn').click(function () {
        $('.config-features-inner select.hidden').first().removeClass('hidden');
    });

    // Showing the config features values
    // $("#config-feature-1").change(function () {
    //     if($(this).val().length) {
    //         $('#' + $(this).attr('id') + '-wrapper')
    //         .children('#' + $(this).val()).removeClass('hidden').siblings().addClass('hidden');
    //     } else {
    //         $('#' + $(this).attr('id') + '-wrapper').children().addClass('hidden');
    //     }
    // });

    // $("#config-feature-2").change(function () {
    //     if($(this).val().length) {
    //         $('#' + $(this).attr('id') + '-wrapper')
    //         .children('#' + $(this).val()).removeClass('hidden').siblings().addClass('hidden');
    //     } else {
    //         $('#' + $(this).attr('id') + '-wrapper').children().addClass('hidden');
    //     }
    // });

    // $("#config-feature-3").change(function () {
    //     if($(this).val().length) {
    //         $('#' + $(this).attr('id') + '-wrapper')
    //         .children('#' + $(this).val()).removeClass('hidden').siblings().addClass('hidden');
    //     } else {
    //         $('#' + $(this).attr('id') + '-wrapper').children().addClass('hidden');
    //     }
    // });

    // Adding a row in the Configuration features table
    // if ($('.add-feature-btn button').length > 0) {
    //     $('.add-feature-btn button').click(function () {
    //         let clonedTR = $(this).parent().next().find('tbody tr').clone();
    //         $(this).parent().next().find('tbody').append(clonedTR);
    //     });
    // }

    // Changing the unit on each input
    $('#added-quantity + p').text($('#unit').find('option:selected').text());
    $('.min-quantity p').text($('#unit').find('option:selected').text());
    $('#ingredient-quantity + p').text($('#unit').find('option:selected').text());

    $('#unit').change(function () {
        $('#added-quantity + p').text($(this).find('option:selected').text());
        $('.min-quantity p').text($(this).find('option:selected').text());
        $('#ingredient-quantity + p').text($(this).find('option:selected').text());
    });

    // Validate number inputs
    if ($('input[type="number"]').length > 0) {
        $('input[type="number"]').each(function () {
            $(this).change(function () {
                if ($(this).val() <= 0) {
                    $(this).val(1);
                }
            });
        });
    }

    // The Show and Edit Page functionality
    if($('.edit-btn').length > 0) {
        $('.edit-btn').each(function () {
            $(this).click(function () {
                $(this).parents('.section-show').find('.field-show').addClass('hidden');
                $(this).parents('.section-show').find('.field-edit').removeClass('hidden');
            });
        })
    }

    if($('.save-btn').length > 0) {
        $('.save-btn').click(function () {
            $('.field-show').removeClass('hidden');
            $('.field-edit').addClass('hidden');
        });
    }

    if ($('.reports-charts').length > 0) {

        // Items Categories Main Sub Chart
        let itemsCategoriesMainSubOptions = {
            series: [{
                name: 'المجموعات الفرعية للمواد الأولية',
                data: [13, 23, 20, 8, 13, 27]
            }, {
                name: 'المجموعات الرئيسية للمواد الأولية',
                data: [44, 55, 41, 67, 22, 43]
            }],
            chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            toolbar: {
                show: false
            },
          },
          responsive: [{
            breakpoint: 480,
            options: {
              legend: {
                position: 'bottom',
                offsetX: -10,
                offsetY: 0
              }
            }
          }],
          plotOptions: {
            bar: {
              horizontal: false,
              borderRadius: 10
            },
          },
          legend: {
            position: 'top'
          },
          fill: {
            opacity: 1
          },
          colors: ["#cc4f0e", '#9f361b'],
          xaxis: {
            categories: ['ريسى 1', 'رئيسى 2', 'رئيسى 3', 'رئيسى 4', 'رئيسى 5'],
          }
        };
        let itemsCategoriesMainSubChart = new ApexCharts(document.querySelector("#items-categories-main-sub"), itemsCategoriesMainSubOptions);
        itemsCategoriesMainSubChart.render();

        // Products Categories Main Sub Chart
        let productsCategoriesMainSubOptions = {
            series: [{
                name: 'المجموعات الفرعية للمنتجات',
                data: [13, 23, 20, 8, 13, 27]
            }, {
                name: 'المجموعات الرئيسية للمنتجات',
                data: [44, 55, 41, 67, 22, 43]
            }],
            chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            toolbar: {
                show: false
            },
          },
          responsive: [{
            breakpoint: 480,
            options: {
              legend: {
                position: 'bottom',
                offsetX: -10,
                offsetY: 0
              }
            }
          }],
          plotOptions: {
            bar: {
              horizontal: false,
              borderRadius: 10
            },
          },
          legend: {
            position: 'top'
          },
          fill: {
            opacity: 1
          },
          colors: ["#cc4f0e", '#9f361b'],
          xaxis: {
            categories: ['ريسى 1', 'رئيسى 2', 'رئيسى 3', 'رئيسى 4', 'رئيسى 5'],
          }
        };
        let productsCategoriesMainSubChart = new ApexCharts(document.querySelector("#products-categories-main-sub"), productsCategoriesMainSubOptions);
        productsCategoriesMainSubChart.render();

         // Categories Main Sub Chart
         let categoriesMainSub = document.getElementById('categories-main-sub').getContext('2d');
         let categoriesMainSubChart = new Chart(categoriesMainSub, {
             type: 'pie',
             data: {
                 labels: ['الرئيسية', 'الفرعية'],
                 datasets: [{
                     data: [21, 19],
                     backgroundColor: ["#cc4f0e", "#9f361b"],
                     borderWidth: 1
                 }]
             },
             options: {
                 maintainAspectRatio: false,
                 
             }
         });

        // Items Categories Sub
        let itemsCategoriesSubOptions = {
            series: [{
                name: 'عدد المواد الأولية',
                data: [44, 55, 57, 56]
            }, {
                name: 'المجموعات الفرعية للمواد الأولية',
                data: [76, 85, 101, 98]
            }],
            chart: {
                foreColor: '#9ba7b2',
                type: 'bar',
                height: 250,
                stacked: true,
                toolbar: {
                    show: false
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '25%'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            colors: ["#cc4f0e", '#9f361b'],
            xaxis: {
                categories: ['م 1', 'م 1', 'م 3', 'م 4'],
            },
            fill: {
                opacity: 1
            }
        };
        let itemsCategoriesSubChart = new ApexCharts(document.querySelector("#items-categories-sub"), itemsCategoriesSubOptions);
        itemsCategoriesSubChart.render();

        // Products Categories Sub
        let productsCategoriesSubOptions = {
            series: [{
                name: 'عدد المنتجات',
                data: [44, 55, 57, 56]
            }, {
                name: 'المجموعات الفرعية للمنتجات',
                data: [76, 85, 101, 98]
            }],
            chart: {
                foreColor: '#9ba7b2',
                type: 'bar',
                height: 250,
                stacked: true,
                toolbar: {
                    show: false
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '25%'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            colors: ["#cc4f0e", '#9f361b'],
            xaxis: {
                categories: ['م 1', 'م 1', 'م 3', 'م 4'],
            },
            fill: {
                opacity: 1
            }
        };
        let productsCategoriesSubChart = new ApexCharts(document.querySelector("#products-categories-sub"), productsCategoriesSubOptions);
        productsCategoriesSubChart.render();

        // Products Items Count
        let productsItemsCountOptions = {
            series: [{
                name: 'عدد المواد الأولية',
                data: [44, 55, 57, 56]
            }, {
                name: 'المنتجات',
                data: [76, 85, 101, 98]
            }],
            chart: {
                foreColor: '#9ba7b2',
                type: 'bar',
                height: 250,
                stacked: true,
                toolbar: {
                    show: false
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '25%'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            colors: ["#cc4f0e", '#9f361b'],
            xaxis: {
                categories: ['م 1', 'م 1', 'م 3', 'م 4'],
            },
            fill: {
                opacity: 1
            }
        };
        let productsItemsCountChart = new ApexCharts(document.querySelector("#products-items-count"), productsItemsCountOptions);
        productsItemsCountChart.render();

        // Items Best Sellers
        let itemsBestSellersOptions = {
            series: [{
                name: 'المادة الأولية',
                data: [44, 55, 57, 56]
            }, {
                name: 'المدة',
                data: [76, 85, 101, 98]
            }],
            chart: {
                foreColor: '#9ba7b2',
                type: 'bar',
                height: 250,
                stacked: true,
                toolbar: {
                    show: false
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '25%'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            colors: ["#cc4f0e", '#9f361b'],
            xaxis: {
                categories: ['م 1', 'م 1', 'م 3', 'م 4'],
            },
            fill: {
                opacity: 1
            }
        };
        let itemsBestSellersChart = new ApexCharts(document.querySelector("#items-best-sellers"), itemsBestSellersOptions);
        itemsBestSellersChart.render();

        // Products Best Sellers
        let productsBestSellersOptions = {
            series: [{
                name: 'المنتج',
                data: [44, 55, 57, 56]
            }, {
                name: 'المدة',
                data: [76, 85, 101, 98]
            }],
            chart: {
                foreColor: '#9ba7b2',
                type: 'bar',
                height: 250,
                stacked: true,
                toolbar: {
                    show: false
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '25%'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            colors: ["#cc4f0e", '#9f361b'],
            xaxis: {
                categories: ['م 1', 'م 1', 'م 3', 'م 4'],
            },
            fill: {
                opacity: 1
            }
        };
        let productsBestSellersChart = new ApexCharts(document.querySelector("#products-best-sellers"), productsBestSellersOptions);
        productsBestSellersChart.render();

        // Items Products Notification
        let itemsProductsNotification = document.getElementById('items-products-notification').getContext('2d');
        let itemsProductsNotificationChart = new Chart(itemsProductsNotification, {
            type: 'line',
            data: {
                labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يوينو'],
                datasets: [{
                    label: 'التاريخ',
                    data: [12, 19, 13, 15, 20, 10, 14, 25, 10],
                    backgroundColor: [
                        '#cc4f0e'
                    ],
                    lineTension: 0,
                    borderColor: [
                        '#cc4f0e'
                    ],
                    borderWidth: 3
                },
                {
                    label: 'المدة',
                    data: [7, 15, 9, 12, 17, 16, 12, 9, 4, 6],
                    backgroundColor: [
                        '#9f361b'
                    ],
                    tension: 0,
                    borderColor: [
                        '#9f361b'
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});