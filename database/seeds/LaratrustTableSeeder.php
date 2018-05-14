<?php

use App\Permission;
use App\PermissionTitle;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class LaratrustTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'none',
            'display_name' => 'بدون نقش',
            'description' => 'هیچ نقشی ندارد'
        ]);

        $accounts = [
            [
                'user' => [
                    'name' => 'Hamid',
                    'family' => 'Madanizadegan',
                    'username' => 'Hamin-Madanizadegan',
                    'mobile' => '09121111111',
                    'phone' => '02112345678',
                    'avatar' => 'files/_test/' . rand(1, 10) . '.jpg',
                    'email' => 'madanizadegan@gmail.com',
                    'password' => '123',
                    'remember_token' => str_random(10),
                    'is_active' => true
                ],
                'role' => [
                    'name' => 'superAdmin',
                    'display_name' => 'ادمین کل',
                    'description' => 'دسترسی به تمامی امکانات سایت',
                ]
            ],
            [
                'user' => [
                    'name' => 'پشتیبان',
                    'family' => 'سیستم',
                    'username' => 'system-support',
                    'mobile' => '09125878084',
                    'phone' => '09125878084',
                    'avatar' => 'files/_test/' . rand(1, 10) . '.jpg',
                    'email' => 'qwe@qwe.com',
                    'password' => 'qwe',
                    'remember_token' => str_random(10),
                    'is_active' => true
                ],
                'role' => [
                    'name' => 'supporter',
                    'display_name' => 'پشتیبان سایت',
                    'description' => 'دسترسی تقریبی به تمامی امکانات سایت',
                ]
            ],
            [
                'user' => [
                    'name' => 'modir',
                    'family' => 'modir',
                    'username' => 'modir-modir',
                    'mobile' => 'xxxxxxxxxxx',
                    'phone' => 'xxxxxxxxxxx',
                    'avatar' => 'files/_test/' . rand(1, 10) . '.jpg',
                    'email' => 'modir@gmail.com',
                    'password' => 'modir',
                    'remember_token' => str_random(10),
                    'is_active' => true
                ],
                'role' => [
                    'name' => 'admin',
                    'display_name' => 'صاحب سیستم',
                    'description' => 'خریدار سایت - دسترسی کل و دسترسی ایجاد نقش ها',
                ]
            ]
        ];

        $permissions = [
            // Panel
            [
                'title' => 'پنل',
                'detail' => [
                    [
                        'name' => 'admin-panel',
                        'display_name' => 'پنل مدیریت',
                        'description' => 'توانایی مشاهده پنل مدیریت',
                    ]
                ]
            ],
            // File-Manager
            [
                'title' => 'فایل منیجر',
                'detail' => [
                    [
                        'name' => 'file-manager',
                        'display_name' => 'فایل منیجر',
                        'description' => 'توانایی استفاده از فایل منیجر',
                    ]
                ]
            ],
            //User
            [
                'title' => 'کاربران',
                'detail' => [
                    [
                        'name' => 'create-user',
                        'display_name' => 'ایجاد کاربر جدید',
                        'description' => 'توانایی ایجاد کاربر جدید',
                    ],
                    [
                        'name' => 'read-user',
                        'display_name' => 'مشاهده کاربران',
                        'description' => 'توانایی مشاهده کاربران',
                    ],
                    [
                        'name' => 'edit-user',
                        'display_name' => 'ویرایش کاربران',
                        'description' => 'توانایی ویرایش کاربران',
                    ],
                    [
                        'name' => 'delete-user',
                        'display_name' => 'حذف کاربران',
                        'description' => 'توانایی حذف کاربران',
                    ],
                ]
            ],
            // Slider
            [
                'title' => 'اسلایدر',
                'detail' => [
                    [
                        'name' => 'create-slider',
                        'display_name' => 'ایجاد اسلایدر جدید',
                        'description' => 'توانایی ایجاد اسلایدر جدید',
                    ],
                    [
                        'name' => 'read-slider',
                        'display_name' => 'مشاهده اسلاید ها',
                        'description' => 'توانایی مشاهده اسلاید ها',
                    ],
                    [
                        'name' => 'edit-slider',
                        'display_name' => 'ویرایش اسلاید ها',
                        'description' => 'توانایی ویرایش اسلاید ها',
                    ],
                    [
                        'name' => 'delete-slider',
                        'display_name' => 'حذف اسلاید ها',
                        'description' => 'توانایی حذف اسلاید ها',
                    ],
                ]
            ],
            //Role
            [
                'title' => 'نقش و دسترسی ها',
                'detail' => [
                    [
                        'name' => 'create-acl',
                        'display_name' => 'ایجاد نقش و دسترسی جدید',
                        'description' => 'توانایی ایجاد نقش و دسترسی جدید',
                    ],
                    [
                        'name' => 'read-acl',
                        'display_name' => 'مشاهده نقش ها و دسترسی ها',
                        'description' => 'توانایی مشاهده نقش ها و دسترسی ها',
                    ],
                    [
                        'name' => 'edit-acl',
                        'display_name' => 'ویرایش نقش ها و دسترسی ها',
                        'description' => 'توانایی ویرایش نقش ها و دسترسی ها',
                    ],
                    [
                        'name' => 'delete-acl',
                        'display_name' => 'حذف نقش ها و دسترسی ها',
                        'description' => 'توانایی حذف نقش ها و دسترسی ها',
                    ],
                ]
            ],
            //News
            [
                'title' => 'خبر',
                'detail' => [
                    ['name' => 'create-news',
                        'display_name' => 'ایجاد خبر',
                        'description' => 'توانایی ایجاد خبر',
                    ],
                    [
                        'name' => 'read-news',
                        'display_name' => 'مشاهده خبر',
                        'description' => 'توانایی مشاهده خبر',
                    ],
                    [
                        'name' => 'edit-news',
                        'display_name' => 'ویرایش خبر',
                        'description' => 'توانایی ویرایش خبر',
                    ],
                    [
                        'name' => 'delete-news',
                        'display_name' => 'حذف خبر',
                        'description' => 'توانایی حذف خبر',
                    ],
                ]
            ],
            // Audible
            [
                'title' => 'کوتاه و شنیدنی',
                'detail' => [
                    ['name' => 'create-audible',
                        'display_name' => 'ایجاد کوتاه و شنیدنی',
                        'description' => 'توانایی ایجاد کوتاه و شنیدنی',
                    ],
                    [
                        'name' => 'read-audible',
                        'display_name' => 'مشاهده کوتاه و شنیدنی',
                        'description' => 'توانایی مشاهده کوتاه و شنیدنی',
                    ],
                    [
                        'name' => 'edit-audible',
                        'display_name' => 'ویرایش کوتاه و شنیدنی',
                        'description' => 'توانایی ویرایش کوتاه و شنیدنی',
                    ],
                    [
                        'name' => 'delete-audible',
                        'display_name' => 'حذف کوتاه و شنیدنی',
                        'description' => 'توانایی حذف کوتاه و شنیدنی',
                    ],
                ]
            ],
            //Course
            [
                'title' => 'درس',
                'detail' => [
                    ['name' => 'create-course',
                        'display_name' => 'ایجاد درس',
                        'description' => 'توانایی ایجاد درس',
                    ],
                    [
                        'name' => 'read-course',
                        'display_name' => 'مشاهده درس',
                        'description' => 'توانایی مشاهده درس',
                    ],
                    [
                        'name' => 'edit-course',
                        'display_name' => 'ویرایش درس',
                        'description' => 'توانایی ویرایش درس',
                    ],
                    [
                        'name' => 'delete-course',
                        'display_name' => 'حذف درس',
                        'description' => 'توانایی حذف درس',
                    ],
                ]
            ],
            //Term
            [
                'title' => 'دوره',
                'detail' => [
                    ['name' => 'create-term',
                        'display_name' => 'ایجاد دوره',
                        'description' => 'توانایی ایجاد دوره',
                    ],
                    [
                        'name' => 'read-term',
                        'display_name' => 'مشاهده دوره',
                        'description' => 'توانایی مشاهده دوره',
                    ],
                    [
                        'name' => 'edit-term',
                        'display_name' => 'ویرایش دوره',
                        'description' => 'توانایی ویرایش دوره',
                    ],
                    [
                        'name' => 'delete-term',
                        'display_name' => 'حذف دوره',
                        'description' => 'توانایی حذف دوره',
                    ],
                ]
            ],
            //Meeting
            [
                'title' => 'نشست',
                'detail' => [
                    ['name' => 'create-meeting',
                        'display_name' => 'ایجاد نشست',
                        'description' => 'توانایی ایجاد نشست',
                    ],
                    [
                        'name' => 'read-meeting',
                        'display_name' => 'مشاهده نشست',
                        'description' => 'توانایی مشاهده نشست',
                    ],
                    [
                        'name' => 'edit-meeting',
                        'display_name' => 'ویرایش نشست',
                        'description' => 'توانایی ویرایش نشست',
                    ],
                    [
                        'name' => 'delete-meeting',
                        'display_name' => 'حذف نشست',
                        'description' => 'توانایی حذف نشست',
                    ],
                ]
            ],
            //Panel-Blog
            [
                'title' => 'پنل-بلاگ',
                'detail' => [
                    ['name' => 'create-panel-blog',
                        'display_name' => 'ایجاد پنل-بلاگ',
                        'description' => 'توانایی ایجاد پنل-بلاگ',
                    ],
                    [
                        'name' => 'read-panel-blog',
                        'display_name' => 'مشاهده پنل-بلاگ',
                        'description' => 'توانایی مشاهده پنل-بلاگ',
                    ],
                    [
                        'name' => 'edit-panel-blog',
                        'display_name' => 'ویرایش پنل-بلاگ',
                        'description' => 'توانایی ویرایش پنل-بلاگ',
                    ],
                    [
                        'name' => 'delete-panel-blog',
                        'display_name' => 'حذف پنل-بلاگ',
                        'description' => 'توانایی حذف پنل-بلاگ',
                    ],
                ]
            ],
            //Book
            [
                'title' => 'کتاب',
                'detail' => [
                    ['name' => 'create-book',
                        'display_name' => 'ایجاد کتاب',
                        'description' => 'توانایی ایجاد کتاب',
                    ],
                    [
                        'name' => 'read-book',
                        'display_name' => 'مشاهده کتاب',
                        'description' => 'توانایی مشاهده کتاب',
                    ],
                    [
                        'name' => 'edit-book',
                        'display_name' => 'ویرایش کتاب',
                        'description' => 'توانایی ویرایش کتاب',
                    ],
                    [
                        'name' => 'delete-book',
                        'display_name' => 'حذف کتاب',
                        'description' => 'توانایی حذف کتاب',
                    ],
                ]
            ],
            //Tag
            [
                'title' => 'کلمات کلیدی',
                'detail' => [
                    [
                        'name' => 'create-tag',
                        'display_name' => 'ایجاد کلمات کلیدی',
                        'description' => 'توانایی ایجاد کلمات کلیدی',
                    ],
                    [
                        'name' => 'read-tag',
                        'display_name' => 'مشاهده کلمات کلیدی',
                        'description' => 'توانایی مشاهده کلمات کلیدی',
                    ],
                    [
                        'name' => 'edit-tag',
                        'display_name' => 'ویرایش کلمات کلیدی',
                        'description' => 'توانایی ویرایش کلمات کلیدی',
                    ],
                    [
                        'name' => 'delete-tag',
                        'display_name' => 'حذف کلمات کلیدی',
                        'description' => 'توانایی حذف کلمات کلیدی',
                    ],
                ]
            ],
            // Place
            [
                'title' => 'اماکن',
                'detail' => [
                    [
                        'name' => 'create-place',
                        'display_name' => 'ایجاد مکان',
                        'description' => 'توانایی ایجاد مکان',
                    ],
                    [
                        'name' => 'read-place',
                        'display_name' => 'مشاهده مکان',
                        'description' => 'توانایی مشاهده مکان',
                    ],
                    [
                        'name' => 'edit-place',
                        'display_name' => 'ویرایش مکان',
                        'description' => 'توانایی ویرایش مکان',
                    ],
                    [
                        'name' => 'delete-place',
                        'display_name' => 'حذف مکان',
                        'description' => 'توانایی حذف مکان',
                    ],
                ]
            ],
            // Event
            [
                'title' => 'رویداد',
                'detail' => [
                    [
                        'name' => 'create-event',
                        'display_name' => 'ایجاد رویداد',
                        'description' => 'توانایی ایجاد رویداد',
                    ],
                    [
                        'name' => 'read-event',
                        'display_name' => 'مشاهده رویداد',
                        'description' => 'توانایی مشاهده رویداد',
                    ],
                    [
                        'name' => 'edit-event',
                        'display_name' => 'ویرایش رویداد',
                        'description' => 'توانایی ویرایش رویداد',
                    ],
                    [
                        'name' => 'delete-event',
                        'display_name' => 'حذف رویداد',
                        'description' => 'توانایی حذف رویداد',
                    ],
                ]
            ],
            // Page
            [
                'title' => 'صفحات',
                'detail' => [
                    [
                        'name' => 'create-page',
                        'display_name' => 'ایجاد صفحه',
                        'description' => 'توانایی ایجاد صفحه',
                    ],
                    [
                        'name' => 'read-page',
                        'display_name' => 'مشاهده صفحه',
                        'description' => 'توانایی مشاهده صفحه',
                    ],
                    [
                        'name' => 'edit-page',
                        'display_name' => 'ویرایش صفحه',
                        'description' => 'توانایی ویرایش صفحه',
                    ],
                    [
                        'name' => 'delete-page',
                        'display_name' => 'حذف صفحه',
                        'description' => 'توانایی حذف صفحه',
                    ],
                ]
            ],
            //About-Us
            [
                'title' => 'درباره ما',
                'detail' => [
                    [
                        'name' => 'read-about',
                        'display_name' => 'مشاهده درباره ما',
                        'description' => 'توانایی مشاهده درباره ما',
                    ],
                    [
                        'name' => 'edit-about',
                        'display_name' => 'ویرایش درباره ما',
                        'description' => 'توانایی ویرایش درباره ما',
                    ]
                ]
            ],
            //Contact-Us
            [
                'title' => 'تماس با ما',
                'detail' => [
                    [
                        'name' => 'read-contact',
                        'display_name' => 'مشاهده تماس با ما',
                        'description' => 'توانایی مشاهده تماس با ما',
                    ],
                    [
                        'name' => 'edit-contact',
                        'display_name' => 'ویرایش تماس با ما',
                        'description' => 'توانایی ویرایش تماس با ما',
                    ]
                ]
            ],
            // Master
            [
                'title' => 'استاد',
                'detail' => [
                    [
                        'name' => 'teach',
                        'display_name' => 'تدریس',
                        'description' => 'توانایی تدریس',
                    ]
                ]
            ],
        ];

        foreach ($permissions as $permission) {
            $permissionTitle = PermissionTitle::create(['title' => $permission['title']]);
            foreach ($permission['detail'] as $detail) {
                $permissionTitle->permissions()->create($detail);
            }
        }

        $permissions = Permission::get()->pluck('id')->toArray();

        foreach ($accounts as $account) {
            $role = Role::create($account['role'])->attachPermissions($permissions);
            $user = User::create($account['user']);

            $user->attachRole($role['id']);

            $user->attachPermissions($permissions);
        }

    }
}
