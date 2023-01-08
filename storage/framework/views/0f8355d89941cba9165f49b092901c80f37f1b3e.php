<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="<?php echo e(route('root')); ?>" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>الصفحة الرئيسية</span>
                    </a>

                </li>
                <?php if(Auth::user()->type == "admin"): ?>
              
                <li>
                    <a href="<?php echo e(route('users.index')); ?>" class="waves-effect">
                        <i class="bx bx-user"></i>
                        <span>المستخدمين</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('projects.index')); ?>" class="waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span>المشاريع</span>
                    </a>
                </li>
              
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span key="t-dashboards">اعدادات النظام</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('sliders.index')); ?>" key="t-tui-calendar">السلايدر </a></li>
                        <li><a href="<?php echo e(route('pages.index')); ?>" key="t-tui-calendar">الصفحات </a></li>
                        <li><a href="<?php echo e(route('services.index')); ?>" key="t-tui-calendar">الخدمات </a></li>
                        <li><a href="<?php echo e(route('contacts.index')); ?>" key="t-tui-calendar">معلومات التواصل </a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span key="t-dashboards">اعدادات المشروع</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('projectype.index')); ?>" key="t-tui-calendar">أنواع المشاريع</a></li>
                        <li><a href="<?php echo e(route('saleChanel.index')); ?>" key="t-full-calendar">قنوات البيع</a></li>
                        <li><a href="<?php echo e(route('marketchanel.index')); ?>" key="t-full-calendar">قنوات التسويق</a></li>
                        <li><a href="<?php echo e(route('incomSourc.index')); ?>" key="t-full-calendar"> مصادر الايرادات</a></li>
                        <li><a href="<?php echo e(route('expensisModel.index')); ?>" key="t-full-calendar"> هيكل التكاليف </a></li>
                        <li><a href="<?php echo e(route('mainActivity.index')); ?>" key="t-full-calendar"> الأنشطة الرئيسية  </a></li>

                    </ul>
                </li>
                <li>
                    <a href="<?php echo e(route('adminstExp.index')); ?>" class="waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span> مصاريف ادارية</span>
                    </a>
                </li>
                <?php else: ?>
                    
                <li>
                    <a href="<?php echo e(route('projects.index')); ?>" class="waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span>المشاريع</span>
                    </a>
                </li>

                <?php endif; ?>
                
                
                

                
                
                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End --><?php /**PATH C:\MAMP\htdocs\jadwahmad\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>