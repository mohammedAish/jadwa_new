

<?php $__env->startSection('title'); ?>
    ملفي الشخصي
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            الملف الشخصي
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            اعدادات الحساب
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="checkout-tabs">
        <div class="row">
            <div class="col-xl-2 col-sm-3">

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="tab_a" data-bs-toggle="pill" href="#a" role="tab"
                        aria-controls="v-pills-shipping" aria-selected="true">
                        <i class="bx bxs-user d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4"> البيانات الشخصية</p>
                    </a>

                    <a class="nav-link " id="tab_b" data-bs-toggle="pill" href="#b" role="tab"
                        aria-controls="v-pills-shipping" aria-selected="true">
                        <i class="bx bx-lock d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">كلمة المرور </p>
                    </a>
                    <a class="nav-link " id="tab_c" data-bs-toggle="pill" href="#c" role="tab"
                        aria-controls="v-pills-shipping" aria-selected="true">
                        <i class="bx bx-badge-check d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">بيانات الاشتراك</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade show active" id="a" role="tabpanel"
                                aria-labelledby="v-pills-shipping-tab">
                                <h4 class="card-title"> بيانات شخصية</h4>
                                <p class="card-title-desc"></p>
                                <form class="form-horizontal" method="POST"
                                action="<?php echo e(route('edit_profile')); ?>">
                                <?php echo csrf_field(); ?>

                                    <label class="col-md-2 col-form-label">الاسم كامل</label>
                                    <div class="form-group row mb-4">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="الاسم كامل" value="<?php echo e($user->name); ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="col-md-4 ">البريد الالكتروني</label>
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="jadwacloud@gmail.com"  value="<?php echo e($user->email); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="col-md-4">رقم
                                                    الجوال</label>
                                                <input type="phone" class="form-control" name="phone"
                                                    placeholder="4567 123 598 966"  value="<?php echo e($user->phone); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="col-md-4 ">الجنس</label>
                                                <select class="form-control select2" id="gender" name="gender">
                                                    <option>اختر الجنس</option>
                                                    <option <?php if($user->gender == "male"): ?> selected <?php endif; ?> value="male">ذكر</option>
                                                    <option <?php if($user->gender == "female"): ?> selected <?php endif; ?> value="female">انثى</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="col-md-2 ">الدولة</label>
                                                
                                                <!-- All countries -->
                                                <select class="form-control select2" id="country" name="country">
                                                    <option>الدولة</option>
                                                    <option value="AF">أفغانستان</option>
                                                    <option value="AX">جزر آلاند</option>
                                                    <option value="AL">ألبانيا</option>
                                                    <option value="DZ">الجزائر</option>
                                                    <option value="AS">ساموا الأمريكية</option>
                                                    <option value="AD">أندورا</option>
                                                    <option value="AO">أنغولا</option>
                                                    <option value="AI">أنغيلا</option>
                                                    <option value="AQ">أنتاركتيكا</option>
                                                    <option value="AG">أنتيغوا وبربودا</option>
                                                    <option value="AR">الأرجنتين</option>
                                                    <option value="AM">أرمينيا</option>
                                                    <option value="AW">أروبا</option>
                                                    <option value="AU">أستراليا</option>
                                                    <option value="AT">النمسا</option>
                                                    <option value="AZ">أذربيجان</option>
                                                    <option value="BS">جزر البهاما</option>
                                                    <option value="BH">البحرين</option>
                                                    <option value="BD">بنغلاديش</option>
                                                    <option value="BB">بربادوس</option>
                                                    <option value="BY">بيلاروسيا</option>
                                                    <option value="BE">بلجيكا</option>
                                                    <option value="BZ">بليز</option>
                                                    <option value="BJ">بنين</option>
                                                    <option value="BM">برمودا</option>
                                                    <option value="BT">بوتان</option>
                                                    <option value="BO">بوليفيا</option>
                                                    <option value="BQ">بونير وسانت يوستاتيوس وسابا</option>
                                                    <option value="BA">البوسنة والهرسك</option>
                                                    <option value="BW">بوتسوانا</option>
                                                    <option value="BV">جزيرة بوفيت</option>
                                                    <option value="BR">البرازيل</option>
                                                    <option value="IO">إقليم المحيط البريطاني الهندي</option>
                                                    <option value="BN">بروناي دار السلام</option>
                                                    <option value="BG">بلغاريا</option>
                                                    <option value="BF">بوركينا فاسو</option>
                                                    <option value="BI">بوروندي</option>
                                                    <option value="KH">كمبوديا</option>
                                                    <option value="CM">الكاميرون</option>
                                                    <option value="CA">كندا</option>
                                                    <option value="CV">الرأس الأخضر</option>
                                                    <option value="KY">جزر كايمان</option>
                                                    <option value="CF">جمهورية افريقيا الوسطى</option>
                                                    <option value="TD">تشاد</option>
                                                    <option value="CL">تشيلي</option>
                                                    <option value="CN">الصين</option>
                                                    <option value="CX">جزيرة الكريسماس</option>
                                                    <option value="CC">جزر كوكوس (كيلينغ)</option>
                                                    <option value="CO">كولومبيا</option>
                                                    <option value="KM">جزر القمر</option>
                                                    <option value="CG">الكونغو</option>
                                                    <option value="CD">الكونغو ، جمهورية الكونغو الديمقراطية
                                                    </option>
                                                    <option value="CK">جزر كوك</option>
                                                    <option value="CR">كوستا ريكا</option>
                                                    <option value="CI">ساحل العاج</option>
                                                    <option value="HR">كرواتيا</option>
                                                    <option value="CU">كوبا</option>
                                                    <option value="CW">كوراكاو</option>
                                                    <option value="CY">قبرص</option>
                                                    <option value="CZ">الجمهورية التشيكية</option>
                                                    <option value="DK">الدنمارك</option>
                                                    <option value="DJ">جيبوتي</option>
                                                    <option value="DM">دومينيكا</option>
                                                    <option value="DO">جمهورية الدومنيكان</option>
                                                    <option value="EC">الاكوادور</option>
                                                    <option value="EG">مصر</option>
                                                    <option value="SV">السلفادور</option>
                                                    <option value="GQ">غينيا الإستوائية</option>
                                                    <option value="ER">إريتريا</option>
                                                    <option value="EE">إستونيا</option>
                                                    <option value="ET">أثيوبيا</option>
                                                    <option value="FK">جزر فوكلاند (مالفيناس)</option>
                                                    <option value="FO">جزر فاروس</option>
                                                    <option value="FJ">فيجي</option>
                                                    <option value="FI">فنلندا</option>
                                                    <option value="FR">فرنسا</option>
                                                    <option value="GF">غيانا الفرنسية</option>
                                                    <option value="PF">بولينيزيا الفرنسية</option>
                                                    <option value="TF">المناطق الجنوبية لفرنسا</option>
                                                    <option value="GA">الجابون</option>
                                                    <option value="GM">غامبيا</option>
                                                    <option value="GE">جورجيا</option>
                                                    <option value="DE">ألمانيا</option>
                                                    <option value="GH">غانا</option>
                                                    <option value="GI">جبل طارق</option>
                                                    <option value="GR">اليونان</option>
                                                    <option value="GL">الأرض الخضراء</option>
                                                    <option value="GD">غرينادا</option>
                                                    <option value="GP">جوادلوب</option>
                                                    <option value="GU">غوام</option>
                                                    <option value="GT">غواتيمالا</option>
                                                    <option value="GG">غيرنسي</option>
                                                    <option value="GN">غينيا</option>
                                                    <option value="GW">غينيا بيساو</option>
                                                    <option value="GY">غيانا</option>
                                                    <option value="HT">هايتي</option>
                                                    <option value="HM">قلب الجزيرة وجزر ماكدونالز</option>
                                                    <option value="VA">الكرسي الرسولي (دولة الفاتيكان)</option>
                                                    <option value="HN">هندوراس</option>
                                                    <option value="HK">هونج كونج</option>
                                                    <option value="HU">هنغاريا</option>
                                                    <option value="IS">أيسلندا</option>
                                                    <option value="IN">الهند</option>
                                                    <option value="ID">إندونيسيا</option>
                                                    <option value="IR">جمهورية إيران الإسلامية</option>
                                                    <option value="IQ">العراق</option>
                                                    <option value="IE">أيرلندا</option>
                                                    <option value="IM">جزيرة آيل أوف مان</option>
                                                    <option value="IL">إسرائيل</option>
                                                    <option value="IT">إيطاليا</option>
                                                    <option value="JM">جامايكا</option>
                                                    <option value="JP">اليابان</option>
                                                    <option value="JE">جيرسي</option>
                                                    <option value="JO">الأردن</option>
                                                    <option value="KZ">كازاخستان</option>
                                                    <option value="KE">كينيا</option>
                                                    <option value="KI">كيريباتي</option>
                                                    <option value="KP">كوريا، الجمهورية الشعبية الديمقراطية
                                                    </option>
                                                    <option value="KR">جمهورية كوريا</option>
                                                    <option value="XK">كوسوفو</option>
                                                    <option value="KW">الكويت</option>
                                                    <option value="KG">قيرغيزستان</option>
                                                    <option value="LA">جمهورية لاو الديمقراطية الشعبية</option>
                                                    <option value="LV">لاتفيا</option>
                                                    <option value="LB">لبنان</option>
                                                    <option value="LS">ليسوتو</option>
                                                    <option value="LR">ليبيريا</option>
                                                    <option value="LY">الجماهيرية العربية الليبية</option>
                                                    <option value="LI">ليختنشتاين</option>
                                                    <option value="LT">ليتوانيا</option>
                                                    <option value="LU">لوكسمبورغ</option>
                                                    <option value="MO">ماكاو</option>
                                                    <option value="MK">مقدونيا ، جمهورية يوغوسلافيا السابقة
                                                    </option>
                                                    <option value="MG">مدغشقر</option>
                                                    <option value="MW">ملاوي</option>
                                                    <option value="MY">ماليزيا</option>
                                                    <option value="MV">جزر المالديف</option>
                                                    <option value="ML">مالي</option>
                                                    <option value="MT">مالطا</option>
                                                    <option value="MH">جزر مارشال</option>
                                                    <option value="MQ">مارتينيك</option>
                                                    <option value="MR">موريتانيا</option>
                                                    <option value="MU">موريشيوس</option>
                                                    <option value="YT">مايوت</option>
                                                    <option value="MX">المكسيك</option>
                                                    <option value="FM">ولايات ميكرونيزيا الموحدة</option>
                                                    <option value="MD">جمهورية مولدوفا</option>
                                                    <option value="MC">موناكو</option>
                                                    <option value="MN">منغوليا</option>
                                                    <option value="ME">الجبل الأسود</option>
                                                    <option value="MS">مونتسيرات</option>
                                                    <option value="MA">المغرب</option>
                                                    <option value="MZ">موزمبيق</option>
                                                    <option value="MM">ميانمار</option>
                                                    <option value="NA">ناميبيا</option>
                                                    <option value="NR">ناورو</option>
                                                    <option value="NP">نيبال</option>
                                                    <option value="NL">هولندا</option>
                                                    <option value="AN">جزر الأنتيل الهولندية</option>
                                                    <option value="NC">كاليدونيا الجديدة</option>
                                                    <option value="NZ">نيوزيلاندا</option>
                                                    <option value="NI">نيكاراغوا</option>
                                                    <option value="NE">النيجر</option>
                                                    <option value="NG">نيجيريا</option>
                                                    <option value="NU">نيوي</option>
                                                    <option value="NF">جزيرة نورفولك</option>
                                                    <option value="MP">جزر مريانا الشمالية</option>
                                                    <option value="NO">النرويج</option>
                                                    <option value="OM">سلطنة عمان</option>
                                                    <option value="PK">باكستان</option>
                                                    <option value="PW">بالاو</option>
                                                    <option value="PS">الأراضي الفلسطينية المحتلة</option>
                                                    <option value="PA">بنما</option>
                                                    <option value="PG">بابوا غينيا الجديدة</option>
                                                    <option value="PY">باراغواي</option>
                                                    <option value="PE">بيرو</option>
                                                    <option value="PH">فيلبيني</option>
                                                    <option value="PN">بيتكيرن</option>
                                                    <option value="PL">بولندا</option>
                                                    <option value="PT">البرتغال</option>
                                                    <option value="PR">بورتوريكو</option>
                                                    <option value="QA">دولة قطر</option>
                                                    <option value="RE">جمع شمل</option>
                                                    <option value="RO">رومانيا</option>
                                                    <option value="RU">الاتحاد الروسي</option>
                                                    <option value="RW">رواندا</option>
                                                    <option value="BL">سانت بارتيليمي</option>
                                                    <option value="SH">سانت هيلانة</option>
                                                    <option value="KN">سانت كيتس ونيفيس</option>
                                                    <option value="LC">القديسة لوسيا</option>
                                                    <option value="MF">القديس مارتن</option>
                                                    <option value="PM">سانت بيير وميكلون</option>
                                                    <option value="VC">سانت فنسنت وجزر غرينادين</option>
                                                    <option value="WS">ساموا</option>
                                                    <option value="SM">سان مارينو</option>
                                                    <option value="ST">ساو تومي وبرينسيبي</option>
                                                    <option value="SA">المملكة العربية السعودية</option>
                                                    <option value="SN">السنغال</option>
                                                    <option value="RS">صربيا</option>
                                                    <option value="CS">صربيا والجبل الأسود</option>
                                                    <option value="SC">سيشيل</option>
                                                    <option value="SL">سيرا ليون</option>
                                                    <option value="SG">سنغافورة</option>
                                                    <option value="SX">سينت مارتن</option>
                                                    <option value="SK">سلوفاكيا</option>
                                                    <option value="SI">سلوفينيا</option>
                                                    <option value="SB">جزر سليمان</option>
                                                    <option value="SO">الصومال</option>
                                                    <option value="ZA">جنوب أفريقيا</option>
                                                    <option value="GS">جورجيا الجنوبية وجزر ساندويتش الجنوبية
                                                    </option>
                                                    <option value="SS">جنوب السودان</option>
                                                    <option value="ES">إسبانيا</option>
                                                    <option value="LK">سيريلانكا</option>
                                                    <option value="SD">السودان</option>
                                                    <option value="SR">سورينام</option>
                                                    <option value="SJ">سفالبارد وجان ماين</option>
                                                    <option value="SZ">سوازيلاند</option>
                                                    <option value="SE">السويد</option>
                                                    <option value="CH">سويسرا</option>
                                                    <option value="SY">الجمهورية العربية السورية</option>
                                                    <option value="TW">مقاطعة تايوان الصينية</option>
                                                    <option value="TJ">طاجيكستان</option>
                                                    <option value="TZ">جمهورية تنزانيا المتحدة</option>
                                                    <option value="TH">تايلاند</option>
                                                    <option value="TL">تيمور ليشتي</option>
                                                    <option value="TG">توجو</option>
                                                    <option value="TK">توكيلاو</option>
                                                    <option value="TO">تونغا</option>
                                                    <option value="TT">ترينداد وتوباغو</option>
                                                    <option value="TN">تونس</option>
                                                    <option value="TR">ديك رومى</option>
                                                    <option value="TM">تركمانستان</option>
                                                    <option value="TC">جزر تركس وكايكوس</option>
                                                    <option value="TV">توفالو</option>
                                                    <option value="UG">أوغندا</option>
                                                    <option value="UA">أوكرانيا</option>
                                                    <option value="AE">الإمارات العربية المتحدة</option>
                                                    <option value="GB">المملكة المتحدة</option>
                                                    <option value="US">الولايات المتحدة</option>
                                                    <option value="UM">جزر الولايات المتحدة البعيدة الصغرى</option>
                                                    <option value="UY">أوروغواي</option>
                                                    <option value="UZ">أوزبكستان</option>
                                                    <option value="VU">فانواتو</option>
                                                    <option value="VE">فنزويلا</option>
                                                    <option value="VN">فييت نام</option>
                                                    <option value="VG">جزر العذراء البريطانية</option>
                                                    <option value="VI">جزر فيرجن ، الولايات المتحدة</option>
                                                    <option value="WF">واليس وفوتونا</option>
                                                    <option value="EH">الصحراء الغربية</option>
                                                    <option value="YE">اليمن</option>
                                                    <option value="ZM">زامبيا</option>
                                                    <option value="ZW">زيمبابوي</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>المدينة</label>
                                                <input type="text" class="form-control" name="city"
                                                    placeholder="المدينة">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label>العنوان</label>
                                                <input type="text" class="form-control" name="address"
                                                    placeholder="العنوان"  value="<?php echo e($user->address); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="col-md-2 ">واتساب</label>
                                                <input type="text" class="form-control" name="whatsapp"
                                                    placeholder="رابط الواتساب"  value="<?php echo e($user->whatsapp); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label>لينكد ان</label>
                                                <input type="text" class="form-control" name="linkedin"
                                                    placeholder="رابط لينكد ان"  value="<?php echo e($user->linkedin); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6" style="float: left">
                                        <button type="submit" style="float: left"
                                            class="btn btn-outline-warning" id="save2">حفظ التعديلات</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade show" id="b" role="tabpanel"
                                aria-labelledby="v-pills-shipping-tab">
                                <h4 class="card-title">كلمة المرور</h4>
                                <p class="card-title-desc"></p>
                                <div class="p-4 border">
                                    <?php if(session('status')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e(session('status')); ?>

                                    </div>
                                <?php elseif(session('error')): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo e(session('error')); ?>

                                    </div>
                                <?php endif; ?>
                                    <form class="form-horizontal" method="POST"
                                    action="<?php echo e(route('edit_password')); ?>">
                                    <?php echo csrf_field(); ?>
                                        <label class="col-md-2 col-form-label">كلمة المرور القديمة</label>
                                        <div class="form-group row mb-4">
                                            <div
                                                class="input-group auth-pass-inputgroup <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <input type="password" name="old_password"
                                                    class="form-control  <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder=" كلمة المرور القديمة"
                                                    aria-label="old_password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                                <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <label class="col-md-2 col-form-label">كلمة المرور الجديدة</label>
                                        <div class="form-group row mb-4">
                                            <div
                                                class="input-group auth-pass-inputgroup <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <input type="password" name="password"
                                                    class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder=" كلمة المرور الجديدة"
                                                    aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <label class="col-md-2 col-form-label"> تأكيد كلمة المرور</label>
                                        <div class="form-group row mb-4">
                                            <div
                                                class="input-group auth-pass-inputgroup <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                <input type="password" name="confirm_password"
                                                    class="form-control  <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                     placeholder="تأكيد كلمة المرور"
                                                    aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i
                                                        class="mdi mdi-eye-outline"></i></button>
                                                <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6" style="float: float">
                                            <button type="submit" style="float: left"
                                                class="btn btn-outline-warning col-md-6" id="save2">تأكيد </button>
                                        </div>
                                        <br><br>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="c" role="tabpanel"
                                aria-labelledby="v-pills-shipping-tab">
                                <h4 class="card-title"> بيانات الاشتراك</h4>
                                <p class="card-title-desc"></p>
                                <table class="table table-bordered">
                                    <thead>
                                      <tr style="text-align: center">
                                        <th>اسم الباقة</th>
                                        <th>قيمة الاشتراك</th>
                                        <th>تاريخ بداية الاشتراك</th>
                                        <th>تاريخ نهاية الاشتراك</th>
                                        <th>تحميل الفاتورة</th>
                                      </tr>
                                    </thead>
                                    <tbody style="text-align: center">
                                      <tr>
                                        <th></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> <button> <i class="mdi mdi-download"></i></button></td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-bottom'); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my project\jadwa\resources\views/profile.blade.php ENDPATH**/ ?>