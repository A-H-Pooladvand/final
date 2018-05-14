<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 2/6/2018
 * Time: 10:23 PM
 */

return [
    // Dashboard
    [
        'title' => 'داشبورد',
        'icon' => 'fa fa-fw fa-home',
        'link' => '#',
        'permission' => 'panel',
        'sub' => [
            [
                'title' => 'مشاهده سایت',
                'link' => route('home'),
                'permission' => 'admin-panel',
                'target' => '_blank',
            ]
        ]
    ],
    // User
    [
        'title' => 'کاربران',
        'icon' => 'fa fa-fw fa-user',
        'link' => '#',
        'permission' => 'user',
        'sub' => [
            [
                'title' => 'افزودن کاربر',
                'link' => route('admin.user.create'),
                'permission' => 'create-user'
            ],
            [
                'title' => 'لیست کاربران',
                'link' => route('admin.user.index'),
                'permission' => 'read-user'
            ],
            [
                'title' => 'افزودن نقش',
                'link' => route('admin.role.create'),
                'permission' => 'create-acl'
            ],
            [
                'title' => 'لیست نقش ها',
                'link' => route('admin.role.index'),
                'permission' => 'read-acl'
            ]
        ]
    ],
    // Slider
    [
        'title' => 'اسلایدر',
        'icon' => 'fa fa-fw fa-sliders',
        'link' => '#',
        'permission' => 'slider',
        'sub' => [
            [
                'title' => 'افزودن اسلایدر',
                'link' => route('admin.slider.create'),
                'permission' => 'create-slider'
            ],
            [
                'title' => 'لیست اسلاید ها',
                'link' => route('admin.slider.index'),
                'permission' => 'read-slider'
            ]
        ]
    ],
    // News
    [
        'title' => 'یادداشت و مصاحبه',
        'icon' => 'fa fa-fw fa-diamond',
        'link' => '#',
        'permission' => 'news',
        'sub' => [
            [
                'title' => 'افزودن مطلب',
                'link' => route('admin.news.create'),
                'permission' => 'create-news'
            ],
            [
                'title' => 'لیست مطالب',
                'link' => route('admin.news.index'),
                'permission' => 'read-news'
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.news.category.create'),
                'permission' => 'create-news|edit-news'
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.news.category.index'),
                'permission' => 'create-news|edit-news'
            ]
        ]
    ],
    // Audible
    [
        'title' => 'کوتاه و شنیدنی',
        'icon' => 'fa fa-fw fa-volume-up',
        'link' => '#',
        'permission' => 'audible',
        'sub' => [
            [
                'title' => 'افزودن کوتاه و شنیدنی',
                'link' => route('admin.audible.create'),
                'permission' => 'create-audible'
            ],
            [
                'title' => 'لیست کوتاه و شنیدنی ها',
                'link' => route('admin.audible.index'),
                'permission' => 'read-audible'
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.audible.category.create'),
                'permission' => 'create-audible|edit-audible'
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.audible.category.index'),
                'permission' => 'create-audible|edit-news'
            ]
        ]
    ],
    // Course
    [

        'title' => 'درس',
        'icon' => 'fa fa-fw fa-tasks',
        'link' => '#',
        'permission' => 'course',
        'sub' => [
            [
                'title' => 'افزودن درس',
                'link' => route('admin.course.create'),
                'permission' => 'create-course'
            ],
            [
                'title' => 'لیست درس ها',
                'link' => route('admin.course.index'),
                'permission' => 'read-course'
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.course.category.create'),
                'permission' => 'create-course|edit-course'
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.course.category.index'),
                'permission' => 'create-course|edit-course'
            ]
        ]
    ],
    // Term
    [

        'title' => 'دوره',
        'icon' => 'fa fa-fw fa-calendar-o',
        'link' => '#',
        'permission' => 'term',
        'sub' => [
            [
                'title' => 'افزودن دوره',
                'link' => route('admin.term.create'),
                'permission' => 'create-term'
            ],
            [
                'title' => 'لیست دوره ها',
                'link' => route('admin.term.index'),
                'permission' => 'read-term'
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.term.category.create'),
                'permission' => 'create-term|edit-term'
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.term.category.index'),
                'permission' => 'create-term|edit-term'
            ]
        ]
    ],
    // Meeting
    [

        'title' => 'نشست',
        'icon' => 'fa fa-fw fa-calendar-o',
        'link' => '#',
        'permission' => 'term',
        'sub' => [
            [
                'title' => 'افزودن نشست',
                'link' => route('admin.meeting.create'),
                'permission' => 'create-term'
            ],
            [
                'title' => 'لیست نشست ها',
                'link' => route('admin.meeting.index'),
                'permission' => 'read-term'
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.meeting.category.create'),
                'permission' => 'create-term|edit-term'
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.meeting.category.index'),
                'permission' => 'create-term|edit-term'
            ]
        ]
    ],
    // Place
    [
        'title' => 'اماکن',
        'icon' => 'fa fa-fw fa-map-marker',
        'link' => '#',
        'permission' => 'place',
        'sub' => [
            [
                'title' => 'افزودن مکان',
                'link' => route('admin.place.create'),
                'permission' => 'create-place'
            ],
            [
                'title' => 'لیست اماکن',
                'link' => route('admin.place.index'),
                'permission' => 'read-place'
            ]
        ]
    ],
    // Event
    [
        'title' => 'برنامه های آتی',
        'icon' => 'fa fa-fw fa-calendar',
        'link' => '#',
        'permission' => 'event',
        'sub' => [
            [
                'title' => 'افزودن مطلب',
                'link' => route('admin.event.create'),
                'permission' => 'create-event'
            ],
            [
                'title' => 'لیست مطالب',
                'link' => route('admin.event.index'),
                'permission' => 'read-event'
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.event.category.create'),
                'permission' => 'create-event|edit-event'
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.event.category.index'),
                'permission' => 'create-event|edit-event'
            ]
        ]
    ],
    // Page
//    [
//        'title' => 'صفحات',
//        'icon' => 'fa fa-fw fa-sticky-note',
//        'link' => '#',
//        'permission' => 'page',
//        'sub' => [
//            [
//                'title' => 'افزودن صفحه',
//                'link' => route('admin.page.create'),
//                'permission' => 'create-page'
//            ],
//            [
//                'title' => 'لیست صفحات',
//                'link' => route('admin.page.index'),
//                'permission' => 'read-page'
//            ]
//        ]
//    ],
    // Book
    [
        'title' => 'کتاب',
        'icon' => 'fa fa-fw fa-book',
        'link' => '#',
        'permission' => 'book',
        'sub' => [
            [
                'title' => 'افزودن کتاب',
                'link' => route('admin.book.create'),
                'permission' => 'create-book'
            ],
            [
                'title' => 'لیست کتاب ها',
                'link' => route('admin.book.index'),
                'permission' => 'read-book'
            ],
            [
                'title' => 'افزودن دسته بندی',
                'link' => route('admin.book.category.create'),
                'permission' => 'create-book|edit-book'
            ],
            [
                'title' => 'لیست دسته بندی ها',
                'link' => route('admin.book.category.index'),
                'permission' => 'create-book|edit-book'
            ]
        ]
    ],
    // Tags
    [

        'title' => 'کلمات کلیدی',
        'icon' => 'fa fa-fw fa-tags',
        'link' => '#',
        'permission' => 'tag',
        'sub' => [
            [
                'title' => 'افزودن کلمه کلیدی',
                'link' => route('admin.tag.create'),
                'permission' => 'create-tag'
            ],
            [
                'title' => 'لیست کلمات کلیدی',
                'link' => route('admin.tag.index'),
                'permission' => 'read-tag'
            ]
        ]
    ],
    // About
    [
        'title' => 'درباره ما',
        'icon' => 'fa fa-fw fa-info',
        'link' => '#',
        'permission' => 'about',
        'sub' => [
            [
                'title' => 'مشاهده درباره ما',
                'link' => route('admin.about.show', 1),
                'permission' => 'read-about'
            ],
            [
                'title' => 'ویرایش درباره ما',
                'link' => route('admin.about.edit', 1),
                'permission' => 'edit-about'
            ]
        ]
    ],
    // Contact-us
    [
        'title' => 'تماس با ما',
        'icon' => 'fa fa-fw fa-phone',
        'link' => '#',
        'permission' => 'contact',
        'sub' => [
            [
                'title' => 'مشاهده تماس با ما',
                'link' => route('admin.contact.show', 1),
                'permission' => 'read-contact'
            ],
            [
                'title' => 'ویرایش تماس با ما',
                'link' => route('admin.contact.edit', 1),
                'permission' => 'edit-about'
            ],
            [
                'title' => 'پیام ها',
                'link' => route('admin.contact.contacts.index'),
                'permission' => 'edit-about'
            ]
        ]
    ]
];