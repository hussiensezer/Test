<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="mx-auto">
            <h4 class="logo-text">FADAA ERP</h4>
        </div>
        <div class="toggle-icon ms-auto">
            <ion-icon name="menu-sharp"></ion-icon>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="home-sharp"></ion-icon>
                </div>
                <div class="menu-title">الرئيسية</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="basket-outline"></ion-icon>
                </div>
                <div class="menu-title">المخزون</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('dashboard.categories.item.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        مجموعات المواد الأولية
                    </a>
                </li>
                <li> <a href="{{route('dashboard.categories.product.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        مجموعات المنتجات
                    </a>
                </li>
                <li>
                    <a href="/dashboard/categories/1/item/show">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        المواد الأولية
                    </a>
                </li>
                <li>
                    <a href="/dashboard/categories/1/product/show">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        المنتجات
                    </a>
                </li>
                <li>
                    <a href="/dashboard/categories/inventory/processes">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        عمليات السحب والإضافة
                    </a>
                </li>
                <li>
                    <a href="/dashboard/categories/inventory/reports">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير المخزون
                    </a>
                </li>
                <li>
                    <a href="/dashboard/categories/inventory/settings">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        إعدادات المحزون
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="basket-outline"></ion-icon>
                </div>
                <div class="menu-title">المبيعات / الطلبات</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('dashboard.categories.item.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        نقاط البيع
                    </a>
                </li>
                <li> <a href="{{route('dashboard.categories.product.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        المبيعات
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        الوكلاء
                    </a>
                </li>
                <li>
                    <a href="#{{--route('product.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير المبيعات
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        إعدادات المبيعات
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="basket-outline"></ion-icon>
                </div>
                <div class="menu-title">المشتريات</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('dashboard.categories.item.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        الموردين
                    </a>
                </li>
                <li> <a href="{{route('dashboard.categories.product.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        المشتريات
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير المشتريات
                    </a>
                </li>
                <li>
                    <a href="#{{--route('product.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        إعدادات المشتريات
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="basket-outline"></ion-icon>
                </div>
                <div class="menu-title">المالية</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('dashboard.categories.item.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        الفواتير
                    </a>
                </li>
                <li> <a href="{{route('dashboard.categories.product.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        المصروفات
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        العمليات المالية
                    </a>
                </li>
                <li>
                    <a href="#{{--route('product.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        القيود
                    </a>
                </li>
                <li>
                    <a href="#{{--route('product.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير المالية
                    </a>
                </li>
                <li>
                    <a href="#{{--route('product.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        إعدادات المالية
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="basket-outline"></ion-icon>
                </div>
                <div class="menu-title">التصنيع</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('dashboard.categories.item.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        التصنيع
                    </a>
                </li>
                <li> <a href="{{route('dashboard.categories.product.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير التصنيع
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        إعدادات التصنيع
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="home-sharp"></ion-icon>
                </div>
                <div class="menu-title">الشحنات</div>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="home-sharp"></ion-icon>
                </div>
                <div class="menu-title">العملاء</div>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="home-sharp"></ion-icon>
                </div>
                <div class="menu-title">المشاريع</div>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="home-sharp"></ion-icon>
                </div>
                <div class="menu-title">المستندات</div>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="home-sharp"></ion-icon>
                </div>
                <div class="menu-title">الموارد البشرية</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="basket-outline"></ion-icon>
                </div>
                <div class="menu-title">المستخدمين</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('dashboard.categories.item.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        المستخدمين
                    </a>
                </li>
                <li> <a href="{{route('dashboard.categories.product.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        الأقسام
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        الصلاحيات
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير المستخدمين
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        إعدادات المستخدمين
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="basket-outline"></ion-icon>
                </div>
                <div class="menu-title">التقارير</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('dashboard.categories.item.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        التقارير العامة
                    </a>
                </li>
                <li> <a href="{{route('dashboard.categories.product.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير المخزون
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير المبيعات
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير المشتريات
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير المالية
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير التصنيع
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير العملاء
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير المشاريع
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير الموارد البشرية
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير المستخدمين
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير المتجر الالكتروني
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير الموقع
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        تقارير التطبيق
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        إعدادات التقارير
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="basket-outline"></ion-icon>
                </div>
                <div class="menu-title">الإعدادات</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <ion-icon name="basket-outline"></ion-icon>
                </div>
                <div class="menu-title">لوحات المحتوى</div>
            </a>
            <ul>
                <li>
                    <a href="{{route('dashboard.categories.item.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        لوحة التحكم بمحتوى الموقع
                    </a>
                </li>
                <li> <a href="{{route('dashboard.categories.product.index')}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        لوحة التحكم بالمتجر الالكتروني
                    </a>
                </li>
                <li>
                    <a href="#{{--route('item.show', ['category' => 1])--}}">
                        <ion-icon name="ellipse-outline"></ion-icon>
                        لوحة التحكم بالتطبيق
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="basket-outline"></ion-icon>
                </div>
                <div class="menu-title">الموقع التعريفي</div>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="basket-outline"></ion-icon>
                </div>
                <div class="menu-title">المتجر الالكتروني</div>
            </a>
        </li>
        <li>
            <a href="javascript:;">
                <div class="parent-icon">
                    <ion-icon name="basket-outline"></ion-icon>
                </div>
                <div class="menu-title">تطبيق جوال</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->
