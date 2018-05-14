<?php

use App\Province;
use App\ProvinceCity;
use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::flushEventListeners();
        ProvinceCity::flushEventListeners();

        $province = Province::create([
            'title' => 'آذربایجان شرقی',
            'code' => '041',
        ]);
        $province->cities()->create(['title' => 'اسکو']);
        $province->cities()->create(['title' => 'اهر']);
        $province->cities()->create(['title' => 'آذرشهر']);
        $province->cities()->create(['title' => 'بستان آباد']);
        $province->cities()->create(['title' => 'بناب']);
        $province->cities()->create(['title' => 'تبریز']);
        $province->cities()->create(['title' => 'جلفا']);
        $province->cities()->create(['title' => 'چاراویماق']);
        $province->cities()->create(['title' => 'خداآفرین']);
        $province->cities()->create(['title' => 'سراب']);
        $province->cities()->create(['title' => 'شبستر']);
        $province->cities()->create(['title' => 'عجب شیر']);
        $province->cities()->create(['title' => 'کلیبر']);
        $province->cities()->create(['title' => 'مراغه']);
        $province->cities()->create(['title' => 'مرند']);
        $province->cities()->create(['title' => 'ملکان']);
        $province->cities()->create(['title' => 'میانه']);
        $province->cities()->create(['title' => 'ورزقان']);
        $province->cities()->create(['title' => 'هریس']);
        $province->cities()->create(['title' => 'هشترود']);


        $province = Province::create([
            'title' => 'آذربایجان غربی',
            'code' => '044',
        ]);
        $province->cities()->create(['title' => 'ارومیه']);
        $province->cities()->create(['title' => 'اشنویه']);
        $province->cities()->create(['title' => 'بوكان']);
        $province->cities()->create(['title' => 'پلدشت']);
        $province->cities()->create(['title' => 'پیرانشهر']);
        $province->cities()->create(['title' => 'تكاب']);
        $province->cities()->create(['title' => 'چالدران']);
        $province->cities()->create(['title' => 'چایپاره']);
        $province->cities()->create(['title' => 'خوی']);
        $province->cities()->create(['title' => 'سردشت']);
        $province->cities()->create(['title' => 'سلماس']);
        $province->cities()->create(['title' => 'شاهین دژ']);
        $province->cities()->create(['title' => 'شوط']);
        $province->cities()->create(['title' => 'ماكو']);
        $province->cities()->create(['title' => 'مهاباد']);
        $province->cities()->create(['title' => 'میاندوآب']);
        $province->cities()->create(['title' => 'نقده']);


        $province = Province::create([
            'title' => 'اردبیل',
            'code' => '045',
        ]);
        $province->cities()->create(['title' => 'اردبیل']);
        $province->cities()->create(['title' => 'بیله سوار']);
        $province->cities()->create(['title' => 'پارس آباد']);
        $province->cities()->create(['title' => 'خلخال']);
        $province->cities()->create(['title' => 'سرعین']);
        $province->cities()->create(['title' => 'كوثر']);
        $province->cities()->create(['title' => 'گرمی']);
        $province->cities()->create(['title' => 'مشگین شهر']);
        $province->cities()->create(['title' => 'نمین']);
        $province->cities()->create(['title' => 'نیر']);


        $province = Province::create([
            'title' => 'اصفهان',
            'code' => '031',
        ]);
        $province->cities()->create(['title' => 'اردستان']);
        $province->cities()->create(['title' => 'اصفهان']);
        $province->cities()->create(['title' => 'آران وبیدگل']);
        $province->cities()->create(['title' => 'برخوار']);
        $province->cities()->create(['title' => 'بو یین و میاندشت']);
        $province->cities()->create(['title' => 'تیران وکرون']);
        $province->cities()->create(['title' => 'چادگان']);
        $province->cities()->create(['title' => 'خمینی شهر']);
        $province->cities()->create(['title' => 'خوانسار']);
        $province->cities()->create(['title' => 'خور و بیابانک']);
        $province->cities()->create(['title' => 'دهاقان']);
        $province->cities()->create(['title' => 'سمیرم']);
        $province->cities()->create(['title' => 'شاهین شهرومیمه']);
        $province->cities()->create(['title' => 'شهرضا']);
        $province->cities()->create(['title' => 'فریدن']);
        $province->cities()->create(['title' => 'فریدونشهر']);
        $province->cities()->create(['title' => 'فلاورجان']);
        $province->cities()->create(['title' => 'کاشان']);
        $province->cities()->create(['title' => 'گلپایگان']);
        $province->cities()->create(['title' => 'لنجان']);
        $province->cities()->create(['title' => 'مبارکه']);
        $province->cities()->create(['title' => 'نایین']);
        $province->cities()->create(['title' => 'نجف آباد']);
        $province->cities()->create(['title' => 'نطنز']);


        $province = Province::create([
            'title' => 'البرز',
            'code' => '026',
        ]);
        $province->cities()->create(['title' => 'اشتهارد']);
        $province->cities()->create(['title' => 'ساوجبلاغ']);
        $province->cities()->create(['title' => 'طالقان']);
        $province->cities()->create(['title' => 'فردیس']);
        $province->cities()->create(['title' => 'کرج']);
        $province->cities()->create(['title' => 'نظرآباد']);


        $province = Province::create([
            'title' => 'ایلام',
            'code' => '084',
        ]);
        $province->cities()->create(['title' => 'ایلام']);
        $province->cities()->create(['title' => 'ایوان']);
        $province->cities()->create(['title' => 'آبدانان']);
        $province->cities()->create(['title' => 'بدره']);
        $province->cities()->create(['title' => 'چرداول']);
        $province->cities()->create(['title' => 'دره شهر']);
        $province->cities()->create(['title' => 'دهلران']);
        $province->cities()->create(['title' => 'سیروان']);
        $province->cities()->create(['title' => 'ملكشاهی']);
        $province->cities()->create(['title' => 'مهران']);


        $province = Province::create([
            'title' => 'بوشهر',
            'code' => '077',
        ]);
        $province->cities()->create(['title' => 'بوشهر']);
        $province->cities()->create(['title' => 'تنگستان']);
        $province->cities()->create(['title' => 'جم']);
        $province->cities()->create(['title' => 'دشتستان']);
        $province->cities()->create(['title' => 'دشتی']);
        $province->cities()->create(['title' => 'دیر']);
        $province->cities()->create(['title' => 'دیلم']);
        $province->cities()->create(['title' => 'عسلویه']);
        $province->cities()->create(['title' => 'كنگان']);
        $province->cities()->create(['title' => 'گناوه']);


        $province = Province::create([
            'title' => 'تهران - شهر تهران',
            'code' => '021',
        ]);
        $province->cities()->create(['title' => 'افسریه']);
        $province->cities()->create(['title' => 'اقدسیه']);
        $province->cities()->create(['title' => 'المپیک']);
        $province->cities()->create(['title' => 'الهیه']);
        $province->cities()->create(['title' => 'امیرآباد']);
        $province->cities()->create(['title' => 'انقلاب']);
        $province->cities()->create(['title' => 'اوین']);
        $province->cities()->create(['title' => 'آتی ساز']);
        $province->cities()->create(['title' => 'آریا شهر']);
        $province->cities()->create(['title' => 'آزادی']);
        $province->cities()->create(['title' => 'آهنگ']);
        $province->cities()->create(['title' => 'بازار']);
        $province->cities()->create(['title' => 'بعثت']);
        $province->cities()->create(['title' => 'بلوار فردوس']);
        $province->cities()->create(['title' => 'پارک وی']);
        $province->cities()->create(['title' => 'پاسداران']);
        $province->cities()->create(['title' => 'پیروزی']);
        $province->cities()->create(['title' => 'تجریش']);
        $province->cities()->create(['title' => 'ترمینال بیهقی']);
        $province->cities()->create(['title' => 'ترمینال شرق']);
        $province->cities()->create(['title' => 'ترمینال غرب']);
        $province->cities()->create(['title' => 'تهرانپارس']);
        $province->cities()->create(['title' => 'تهرانسر']);
        $province->cities()->create(['title' => 'جنت آباد']);
        $province->cities()->create(['title' => 'چیذر']);
        $province->cities()->create(['title' => 'خلیج فارس']);
        $province->cities()->create(['title' => 'فرودگاه مهرآباد']);
        $province->cities()->create(['title' => 'دولت']);
        $province->cities()->create(['title' => 'رسالت']);
        $province->cities()->create(['title' => 'سعادت آباد']);
        $province->cities()->create(['title' => 'سید خندان']);
        $province->cities()->create(['title' => 'شادآباد']);
        $province->cities()->create(['title' => 'شهران']);
        $province->cities()->create(['title' => 'شهرزیبا']);
        $province->cities()->create(['title' => 'اکباتان']);
        $province->cities()->create(['title' => 'آپادانا']);
        $province->cities()->create(['title' => 'شهرک غرب']);
        $province->cities()->create(['title' => 'ظفر']);
        $province->cities()->create(['title' => 'کیلومتر 10 مخصوص']);
        $province->cities()->create(['title' => 'کیلومتر 14 مخصوص']);
        $province->cities()->create(['title' => 'گیشا']);
        $province->cities()->create(['title' => 'لویزان']);
        $province->cities()->create(['title' => 'میدان امام حسین']);
        $province->cities()->create(['title' => 'میدان امام خمینی']);
        $province->cities()->create(['title' => 'میدان آرژانتین']);
        $province->cities()->create(['title' => 'میدان بهارستان']);
        $province->cities()->create(['title' => 'میدان پونک']);
        $province->cities()->create(['title' => 'میدان توحید']);
        $province->cities()->create(['title' => 'میدان خراسان']);
        $province->cities()->create(['title' => 'میدان راه آهن']);
        $province->cities()->create(['title' => 'میدان سپاه']);
        $province->cities()->create(['title' => 'میدان شمشیری']);
        $province->cities()->create(['title' => 'میدان شهدا']);
        $province->cities()->create(['title' => 'میدان فردوسی']);
        $province->cities()->create(['title' => 'میدان فلسطین']);
        $province->cities()->create(['title' => 'میدان قزوین']);
        $province->cities()->create(['title' => 'میدان محسنی']);
        $province->cities()->create(['title' => 'میدان نوبنیاد']);
        $province->cities()->create(['title' => 'مجیدیه']);
        $province->cities()->create(['title' => 'مشیریه']);
        $province->cities()->create(['title' => 'میرداماد']);
        $province->cities()->create(['title' => 'نازی آباد']);
        $province->cities()->create(['title' => 'ونک']);
        $province->cities()->create(['title' => 'هفده شهریور']);


        $province = Province::create([
            'title' => 'تهران - شهرستان ها',
            'code' => '021',
        ]);
        $province->cities()->create(['title' => 'اسلامشهر']);
        $province->cities()->create(['title' => 'بهارستان']);
        $province->cities()->create(['title' => 'پاكدشت']);
        $province->cities()->create(['title' => 'پردیس']);
        $province->cities()->create(['title' => 'پیشوا']);
        $province->cities()->create(['title' => 'دماوند']);
        $province->cities()->create(['title' => 'رباطكریم']);
        $province->cities()->create(['title' => 'ری']);
        $province->cities()->create(['title' => 'شمیرانات']);
        $province->cities()->create(['title' => 'شهریار']);
        $province->cities()->create(['title' => 'فیروزكوه']);
        $province->cities()->create(['title' => 'قدس']);
        $province->cities()->create(['title' => 'قرچک']);
        $province->cities()->create(['title' => 'ملارد']);
        $province->cities()->create(['title' => 'ورامین']);


        $province = Province::create([
            'title' => 'چهارمحال و بختیاری',
            'code' => '038',
        ]);
        $province->cities()->create(['title' => 'اردل']);
        $province->cities()->create(['title' => 'بروجن']);
        $province->cities()->create(['title' => 'بن']);
        $province->cities()->create(['title' => 'سامان']);
        $province->cities()->create(['title' => 'شهركرد']);
        $province->cities()->create(['title' => 'فارسان']);
        $province->cities()->create(['title' => 'كوهرنگ']);
        $province->cities()->create(['title' => 'كیار']);
        $province->cities()->create(['title' => 'لردگان']);


        $province = Province::create([
            'title' => 'خراسان جنوبی',
            'code' => '056',
        ]);
        $province->cities()->create(['title' => 'بشرویه']);
        $province->cities()->create(['title' => 'بیرجند']);
        $province->cities()->create(['title' => 'خوسف']);
        $province->cities()->create(['title' => 'درمیان']);
        $province->cities()->create(['title' => 'زیرکوه']);
        $province->cities()->create(['title' => 'سرایان']);
        $province->cities()->create(['title' => 'سربیشه']);
        $province->cities()->create(['title' => 'طبس']);
        $province->cities()->create(['title' => 'فردوس']);
        $province->cities()->create(['title' => 'قاینات']);
        $province->cities()->create(['title' => 'نهبندان']);


        $province = Province::create([
            'title' => 'خراسان رضوی',
            'code' => '051',
        ]);
        $province->cities()->create(['title' => 'باخرز']);
        $province->cities()->create(['title' => 'بجستان']);
        $province->cities()->create(['title' => 'بردسكن']);
        $province->cities()->create(['title' => 'بینالود']);
        $province->cities()->create(['title' => 'تایباد']);
        $province->cities()->create(['title' => 'تربت جام']);
        $province->cities()->create(['title' => 'تربت حیدریه']);
        $province->cities()->create(['title' => 'جغتای']);
        $province->cities()->create(['title' => 'جوین']);
        $province->cities()->create(['title' => 'چناران']);
        $province->cities()->create(['title' => 'خلیل آباد']);
        $province->cities()->create(['title' => 'خواف']);
        $province->cities()->create(['title' => 'خوشاب']);
        $province->cities()->create(['title' => 'داورزن']);
        $province->cities()->create(['title' => 'درگز']);
        $province->cities()->create(['title' => 'رشتخوار']);
        $province->cities()->create(['title' => 'زاوه']);
        $province->cities()->create(['title' => 'سبزوار']);
        $province->cities()->create(['title' => 'سرخس']);
        $province->cities()->create(['title' => 'فریمان']);
        $province->cities()->create(['title' => 'فیروزه']);
        $province->cities()->create(['title' => 'قوچان']);
        $province->cities()->create(['title' => 'كاشمر']);
        $province->cities()->create(['title' => 'كلات']);
        $province->cities()->create(['title' => 'گناباد']);
        $province->cities()->create(['title' => 'مشهد']);
        $province->cities()->create(['title' => 'مه ولات']);
        $province->cities()->create(['title' => 'نیشابور']);


        $province = Province::create([
            'title' => 'خراسان شمالی',
            'code' => '058',
        ]);
        $province->cities()->create(['title' => 'اسفراین']);
        $province->cities()->create(['title' => 'بجنورد']);
        $province->cities()->create(['title' => 'جاجرم']);
        $province->cities()->create(['title' => 'راز و جرگلان']);
        $province->cities()->create(['title' => 'شیروان']);
        $province->cities()->create(['title' => 'فاروج']);
        $province->cities()->create(['title' => 'گرمه']);
        $province->cities()->create(['title' => 'مانه وسملقان']);


        $province = Province::create([
            'title' => 'خوزستان',
            'code' => '061',
        ]);
        $province->cities()->create(['title' => 'امیدیه']);
        $province->cities()->create(['title' => 'اندیکا']);
        $province->cities()->create(['title' => 'اندیمشک']);
        $province->cities()->create(['title' => 'اهواز']);
        $province->cities()->create(['title' => 'ایذه']);
        $province->cities()->create(['title' => 'آبادان']);
        $province->cities()->create(['title' => 'آغاجاری']);
        $province->cities()->create(['title' => 'باغ ملک']);
        $province->cities()->create(['title' => 'باوی']);
        $province->cities()->create(['title' => 'بندرماهشهر']);
        $province->cities()->create(['title' => 'بهبهان']);
        $province->cities()->create(['title' => 'حمیدیه']);
        $province->cities()->create(['title' => 'خرمشهر']);
        $province->cities()->create(['title' => 'دزفول']);
        $province->cities()->create(['title' => 'دشت آزادگان']);
        $province->cities()->create(['title' => 'رامشیر']);
        $province->cities()->create(['title' => 'رامهرمز']);
        $province->cities()->create(['title' => 'شادگان']);
        $province->cities()->create(['title' => 'شوش']);
        $province->cities()->create(['title' => 'شوشتر']);
        $province->cities()->create(['title' => 'کارون']);
        $province->cities()->create(['title' => 'گتوند']);
        $province->cities()->create(['title' => 'لالی']);
        $province->cities()->create(['title' => 'مسجدسلیمان']);
        $province->cities()->create(['title' => 'هفتگل']);
        $province->cities()->create(['title' => 'هندیجان']);
        $province->cities()->create(['title' => 'هویزه']);

        $province->cities()->create(['title' => 'ماهشهر']); //news


        $province = Province::create([
            'title' => 'زنجان',
            'code' => '024',
        ]);
        $province->cities()->create(['title' => 'ابهر']);
        $province->cities()->create(['title' => 'ایجرود']);
        $province->cities()->create(['title' => 'خدابنده']);
        $province->cities()->create(['title' => 'خرمدره']);
        $province->cities()->create(['title' => 'زنجان']);
        $province->cities()->create(['title' => 'سلطانیه']);
        $province->cities()->create(['title' => 'طارم']);
        $province->cities()->create(['title' => 'ماهنشان']);


        $province = Province::create([
            'title' => 'سمنان',
            'code' => '023',
        ]);
        $province->cities()->create(['title' => 'آرادان']);
        $province->cities()->create(['title' => 'دامغان']);
        $province->cities()->create(['title' => 'سرخه']);
        $province->cities()->create(['title' => 'سمنان']);
        $province->cities()->create(['title' => 'شاهرود']);
        $province->cities()->create(['title' => 'گرمسار']);
        $province->cities()->create(['title' => 'مهدی شهر']);
        $province->cities()->create(['title' => 'میامی']);


        $province = Province::create([
            'title' => 'سیستان و بلوچستان',
            'code' => '054',
        ]);
        $province->cities()->create(['title' => 'ایرانشهر']);
        $province->cities()->create(['title' => 'چابهار']);
        $province->cities()->create(['title' => 'خاش']);
        $province->cities()->create(['title' => 'دلگان']);
        $province->cities()->create(['title' => 'زابل']);
        $province->cities()->create(['title' => 'زاهدان']);
        $province->cities()->create(['title' => 'زهك']);
        $province->cities()->create(['title' => 'سراوان']);
        $province->cities()->create(['title' => 'سرباز']);
        $province->cities()->create(['title' => 'سیب و سوران']);
        $province->cities()->create(['title' => 'فنوج']);
        $province->cities()->create(['title' => 'قصرقند']);
        $province->cities()->create(['title' => 'كنارك']);
        $province->cities()->create(['title' => 'مهرستان']);
        $province->cities()->create(['title' => 'میرجاوه']);
        $province->cities()->create(['title' => 'نیك شهر']);
        $province->cities()->create(['title' => 'نیمروز']);
        $province->cities()->create(['title' => 'هامون']);
        $province->cities()->create(['title' => 'هیرمند']);


        $province = Province::create([
            'title' => 'فارس',
            'code' => '071',
        ]);
        $province->cities()->create(['title' => 'ارسنجان']);
        $province->cities()->create(['title' => 'استهبان']);
        $province->cities()->create(['title' => 'اقلید']);
        $province->cities()->create(['title' => 'آباده']);
        $province->cities()->create(['title' => 'بوانات']);
        $province->cities()->create(['title' => 'پاسارگاد']);
        $province->cities()->create(['title' => 'جهرم']);
        $province->cities()->create(['title' => 'خرامه']);
        $province->cities()->create(['title' => 'خرم بید']);
        $province->cities()->create(['title' => 'خنج']);
        $province->cities()->create(['title' => 'داراب']);
        $province->cities()->create(['title' => 'رستم']);
        $province->cities()->create(['title' => 'زرین دشت']);
        $province->cities()->create(['title' => 'سپیدان']);
        $province->cities()->create(['title' => 'سروستان']);
        $province->cities()->create(['title' => 'شیراز']);
        $province->cities()->create(['title' => 'فراشبند']);
        $province->cities()->create(['title' => 'فسا']);
        $province->cities()->create(['title' => 'فیروزآباد']);
        $province->cities()->create(['title' => 'قیروکارزین']);
        $province->cities()->create(['title' => 'کازرون']);
        $province->cities()->create(['title' => 'کوار']);
        $province->cities()->create(['title' => 'گراش']);
        $province->cities()->create(['title' => 'لارستان']);
        $province->cities()->create(['title' => 'لامرد']);
        $province->cities()->create(['title' => 'مرودشت']);
        $province->cities()->create(['title' => 'ممسنی']);
        $province->cities()->create(['title' => 'مهر']);
        $province->cities()->create(['title' => 'نی ریز']);


        $province = Province::create([
            'title' => 'قزوین',
            'code' => '028',
        ]);
        $province->cities()->create(['title' => 'البرز']);
        $province->cities()->create(['title' => 'آبیك']);
        $province->cities()->create(['title' => 'آوج']);
        $province->cities()->create(['title' => 'بویین زهرا']);
        $province->cities()->create(['title' => 'تاكستان']);
        $province->cities()->create(['title' => 'قزوین']);


        $province = Province::create([
            'title' => 'قم',
            'code' => '025',
        ]);
        $province->cities()->create(['title' => 'قم']);


        $province = Province::create([
            'title' => 'کردستان',
            'code' => '087',
        ]);
        $province->cities()->create(['title' => 'بانه']);
        $province->cities()->create(['title' => 'بیجار']);
        $province->cities()->create(['title' => 'دهگلان']);
        $province->cities()->create(['title' => 'دیواندره']);
        $province->cities()->create(['title' => 'سروآباد']);
        $province->cities()->create(['title' => 'سقز']);
        $province->cities()->create(['title' => 'سنندج']);
        $province->cities()->create(['title' => 'قروه']);
        $province->cities()->create(['title' => 'كامیاران']);
        $province->cities()->create(['title' => 'مریوان']);


        $province = Province::create([
            'title' => 'کرمان',
            'code' => '034',
        ]);
        $province->cities()->create(['title' => 'ارزوییه']);
        $province->cities()->create(['title' => 'انار']);
        $province->cities()->create(['title' => 'بافت']);
        $province->cities()->create(['title' => 'بردسیر']);
        $province->cities()->create(['title' => 'بم']);
        $province->cities()->create(['title' => 'جیرفت']);
        $province->cities()->create(['title' => 'رابر']);
        $province->cities()->create(['title' => 'راور']);
        $province->cities()->create(['title' => 'رفسنجان']);
        $province->cities()->create(['title' => 'رودبارجنوب']);
        $province->cities()->create(['title' => 'ریگان']);
        $province->cities()->create(['title' => 'زرند']);
        $province->cities()->create(['title' => 'سیرجان']);
        $province->cities()->create(['title' => 'شهربابك']);
        $province->cities()->create(['title' => 'عنبرآباد']);
        $province->cities()->create(['title' => 'فاریاب']);
        $province->cities()->create(['title' => 'فهرج']);
        $province->cities()->create(['title' => 'قلعه گنج']);
        $province->cities()->create(['title' => 'كرمان']);
        $province->cities()->create(['title' => 'كوهبنان']);
        $province->cities()->create(['title' => 'كهنوج']);
        $province->cities()->create(['title' => 'منوجان']);
        $province->cities()->create(['title' => 'نرماشیر']);


        $province = Province::create([
            'title' => 'کرمانشاه',
            'code' => '083',
        ]);
        $province->cities()->create(['title' => 'اسلام آبادغرب']);
        $province->cities()->create(['title' => 'پاوه']);
        $province->cities()->create(['title' => 'ثلاث باباجانی']);
        $province->cities()->create(['title' => 'جوانرود']);
        $province->cities()->create(['title' => 'دالاهو']);
        $province->cities()->create(['title' => 'روانسر']);
        $province->cities()->create(['title' => 'سرپل ذهاب']);
        $province->cities()->create(['title' => 'سنقر']);
        $province->cities()->create(['title' => 'صحنه']);
        $province->cities()->create(['title' => 'قصرشیرین']);
        $province->cities()->create(['title' => 'کرمانشاه']);
        $province->cities()->create(['title' => 'کنگاور']);
        $province->cities()->create(['title' => 'گیلانغرب']);
        $province->cities()->create(['title' => 'هرسین']);


        $province = Province::create([
            'title' => 'کهگیلویه و بویراحمد',
            'code' => '074',
        ]);
        $province->cities()->create(['title' => 'باشت']);
        $province->cities()->create(['title' => 'بویراحمد']);
        $province->cities()->create(['title' => 'بهمیی']);
        $province->cities()->create(['title' => 'چرام']);
        $province->cities()->create(['title' => 'دنا']);
        $province->cities()->create(['title' => 'كهگیلویه']);
        $province->cities()->create(['title' => 'گچساران']);
        $province->cities()->create(['title' => 'لنده']);


        $province = Province::create([
            'title' => 'گلستان',
            'code' => '017',
        ]);
        $province->cities()->create(['title' => 'آزادشهر']);
        $province->cities()->create(['title' => 'آق قلا']);
        $province->cities()->create(['title' => 'بندرگز']);
        $province->cities()->create(['title' => 'تركمن']);
        $province->cities()->create(['title' => 'رامیان']);
        $province->cities()->create(['title' => 'علی آباد']);
        $province->cities()->create(['title' => 'كردكوی']);
        $province->cities()->create(['title' => 'كلاله']);
        $province->cities()->create(['title' => 'گالیكش']);
        $province->cities()->create(['title' => 'گرگان']);
        $province->cities()->create(['title' => 'گمیشان']);
        $province->cities()->create(['title' => 'گنبدكاووس']);
        $province->cities()->create(['title' => 'مراوه تپه']);
        $province->cities()->create(['title' => 'مینودشت']);


        $province = Province::create([
            'title' => 'گیلان',
            'code' => '013',
        ]);
        $province->cities()->create(['title' => 'املش']);
        $province->cities()->create(['title' => 'آستارا']);
        $province->cities()->create(['title' => 'آستانه اشرفیه']);
        $province->cities()->create(['title' => 'بندرانزلی']);
        $province->cities()->create(['title' => 'رشت']);
        $province->cities()->create(['title' => 'رضوانشهر']);
        $province->cities()->create(['title' => 'رودبار']);
        $province->cities()->create(['title' => 'رودسر']);
        $province->cities()->create(['title' => 'سیاهكل']);
        $province->cities()->create(['title' => 'شفت']);
        $province->cities()->create(['title' => 'صومعه سرا']);
        $province->cities()->create(['title' => 'طوالش']);
        $province->cities()->create(['title' => 'فومن']);
        $province->cities()->create(['title' => 'لاهیجان']);
        $province->cities()->create(['title' => 'لنگرود']);
        $province->cities()->create(['title' => 'ماسال']);

        $province->cities()->create(['title' => 'تالش']); //new


        $province = Province::create([
            'title' => 'لرستان',
            'code' => '066',
        ]);
        $province->cities()->create(['title' => 'ازنا']);
        $province->cities()->create(['title' => 'الیگودرز']);
        $province->cities()->create(['title' => 'بروجرد']);
        $province->cities()->create(['title' => 'پلدختر']);
        $province->cities()->create(['title' => 'خرم آباد']);
        $province->cities()->create(['title' => 'دلفان']);
        $province->cities()->create(['title' => 'دورود']);
        $province->cities()->create(['title' => 'دوره']);
        $province->cities()->create(['title' => 'رومشکان']);
        $province->cities()->create(['title' => 'سلسله']);
        $province->cities()->create(['title' => 'کوهدشت']);


        $province = Province::create([
            'title' => 'مازندران',
            'code' => '011',
        ]);
        $province->cities()->create(['title' => 'آمل']);
        $province->cities()->create(['title' => 'بابل']);
        $province->cities()->create(['title' => 'بابلسر']);
        $province->cities()->create(['title' => 'بهشهر']);
        $province->cities()->create(['title' => 'تنكابن']);
        $province->cities()->create(['title' => 'جویبار']);
        $province->cities()->create(['title' => 'چالوس']);
        $province->cities()->create(['title' => 'رامسر']);
        $province->cities()->create(['title' => 'ساری']);
        $province->cities()->create(['title' => 'سوادکوه شمالی']);
        $province->cities()->create(['title' => 'سوادكوه']);
        $province->cities()->create(['title' => 'سیمرغ']);
        $province->cities()->create(['title' => 'عباس آباد']);
        $province->cities()->create(['title' => 'فریدونكنار']);
        $province->cities()->create(['title' => 'قایم شهر']);
        $province->cities()->create(['title' => 'کلاردشت']);
        $province->cities()->create(['title' => 'گلوگاه']);
        $province->cities()->create(['title' => 'محمودآباد']);
        $province->cities()->create(['title' => 'میاندورود']);
        $province->cities()->create(['title' => 'نكا']);
        $province->cities()->create(['title' => 'نور']);
        $province->cities()->create(['title' => 'نوشهر']);


        $province = Province::create([
            'title' => 'مرکزی',
            'code' => '086',
        ]);
        $province->cities()->create(['title' => 'اراک']);
        $province->cities()->create(['title' => 'آشتیان']);
        $province->cities()->create(['title' => 'تفرش']);
        $province->cities()->create(['title' => 'خمین']);
        $province->cities()->create(['title' => 'خنداب']);
        $province->cities()->create(['title' => 'دلیجان']);
        $province->cities()->create(['title' => 'زرندیه']);
        $province->cities()->create(['title' => 'ساوه']);
        $province->cities()->create(['title' => 'شازند']);
        $province->cities()->create(['title' => 'فراهان']);
        $province->cities()->create(['title' => 'کمیجان']);
        $province->cities()->create(['title' => 'محلات']);


        $province = Province::create([
            'title' => 'هرمزگان',
            'code' => '076',
        ]);
        $province->cities()->create(['title' => 'ابوموسی']);
        $province->cities()->create(['title' => 'بستك']);
        $province->cities()->create(['title' => 'بشاگرد']);
        $province->cities()->create(['title' => 'بندرعباس']);
        $province->cities()->create(['title' => 'بندرلنگه']);
        $province->cities()->create(['title' => 'پارسیان']);
        $province->cities()->create(['title' => 'جاسك']);
        $province->cities()->create(['title' => 'حاجی اباد']);
        $province->cities()->create(['title' => 'خمیر']);
        $province->cities()->create(['title' => 'رودان']);
        $province->cities()->create(['title' => 'سیریك']);
        $province->cities()->create(['title' => 'قشم']);
        $province->cities()->create(['title' => 'میناب']);


        $province = Province::create([
            'title' => 'همدان',
            'code' => '081',
        ]);
        $province->cities()->create(['title' => 'اسدآباد']);
        $province->cities()->create(['title' => 'بهار']);
        $province->cities()->create(['title' => 'تویسركان']);
        $province->cities()->create(['title' => 'رزن']);
        $province->cities()->create(['title' => 'فامنین']);
        $province->cities()->create(['title' => 'كبودرآهنگ']);
        $province->cities()->create(['title' => 'ملایر']);
        $province->cities()->create(['title' => 'نهاوند']);
        $province->cities()->create(['title' => 'همدان']);


        $province = Province::create([
            'title' => 'یزد',
            'code' => '035',
        ]);
        $province->cities()->create(['title' => 'ابركوه']);
        $province->cities()->create(['title' => 'اردكان']);
        $province->cities()->create(['title' => 'اشکذر']);
        $province->cities()->create(['title' => 'بافق']);
        $province->cities()->create(['title' => 'بهاباد']);
        $province->cities()->create(['title' => 'تفت']);
        $province->cities()->create(['title' => 'خاتم']);
        $province->cities()->create(['title' => 'مهریز']);
        $province->cities()->create(['title' => 'میبد']);
        $province->cities()->create(['title' => 'یزد']);
    }
}
