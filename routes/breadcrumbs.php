<?php
/**
 * Created by PhpStorm.
 * User: Amirhossein
 * Date: 2/11/2018
 * Time: 4:59 PM
 */

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

/** USERS */

// users
Breadcrumbs::register('users', function ($breadcrumbs) {
    $breadcrumbs->push('لیست کاربران', route('admin.user.index'));
});

// User > Create
Breadcrumbs::register('user-create', function ($breadcrumbs) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('افزودن کاربر', route('admin.user.create'));
});

// User > Show
Breadcrumbs::register('user-show', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('مشاهده کاربر', route('admin.user.show', $user->id));
});

// Users > Show > Edit
Breadcrumbs::register('user-edit', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('user-show', $user);
    $breadcrumbs->push('ویرایش کاربر', route('admin.user.edit', $user->id));
});

// User > Show > Edit-Permission
Breadcrumbs::register('user-edit-permission', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('user-show', $user);
    $breadcrumbs->push('ویرایش دسترسی های فردی کاربر', route('admin.user.permission.edit', $user->id));
});

/** ROLES */

// Roles
Breadcrumbs::register('roles', function ($breadcrumbs) {
    $breadcrumbs->push('لیست نقش ها', route('admin.role.index'));
});

// Role > Create
Breadcrumbs::register('role-create', function ($breadcrumbs) {
    $breadcrumbs->parent('roles');
    $breadcrumbs->push('افزودن نقش', route('admin.role.create'));
});

// Role > Show
Breadcrumbs::register('role-show', function ($breadcrumbs, $role) {
    $breadcrumbs->parent('roles');
    $breadcrumbs->push('مشاهده نقش', route('admin.role.show', $role->id));
});

// Roles > Show > Edit
Breadcrumbs::register('role-edit', function ($breadcrumbs, $role) {
    $breadcrumbs->parent('role-show', $role);
    $breadcrumbs->push('ویرایش نقش', route('admin.role.edit', $role->id));
});

/** Book */

// Books
Breadcrumbs::register('books', function ($breadcrumbs) {
    $breadcrumbs->push('لیست کتاب ها', route('admin.book.index'));
});

// Book > Create
Breadcrumbs::register('book-create', function ($breadcrumbs) {
    $breadcrumbs->parent('books');
    $breadcrumbs->push('افزودن کتاب', route('admin.book.create'));
});

// Book > Show
Breadcrumbs::register('book-show', function ($breadcrumbs, $book) {
    $breadcrumbs->parent('books');
    $breadcrumbs->push('مشاهده کتاب', route('admin.book.show', $book->id));
});

// Books > Show > Edit
Breadcrumbs::register('book-edit', function ($breadcrumbs, $book) {
    $breadcrumbs->parent('book-show', $book);
    $breadcrumbs->push('ویرایش کتاب', route('admin.book.edit', $book->id));
});

/** Book Category */

// Categories
Breadcrumbs::register('book-categories', function ($breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی کتاب ها', route('admin.book.category.index'));
});

// Category > Create
Breadcrumbs::register('book-category-create', function ($breadcrumbs) {
    $breadcrumbs->parent('book-categories');
    $breadcrumbs->push('افزودن دسته بندی کتاب', route('admin.book.category.create'));
});

// Category > Show
Breadcrumbs::register('book-category-show', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('book-categories');
    $breadcrumbs->push('مشاهده دسته بندی کتاب', route('admin.book.category.show', $category->id));
});

// Categories > Show > Edit
Breadcrumbs::register('book-category-edit', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('book-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی کتاب', route('admin.book.category.edit', $category->id));
});


/** Course */

// Courses
Breadcrumbs::register('courses', function ($breadcrumbs) {
    $breadcrumbs->push('لیست درس ها', route('admin.course.index'));
});

// Course > Create
Breadcrumbs::register('course-create', function ($breadcrumbs) {
    $breadcrumbs->parent('courses');
    $breadcrumbs->push('افزودن درس', route('admin.course.create'));
});

// Course > Show
Breadcrumbs::register('course-show', function ($breadcrumbs, $course) {
    $breadcrumbs->parent('courses');
    $breadcrumbs->push('مشاهده درس', route('admin.course.show', $course->id));
});

// Courses > Show > Edit
Breadcrumbs::register('course-edit', function ($breadcrumbs, $course) {
    $breadcrumbs->parent('course-show', $course);
    $breadcrumbs->push('ویرایش درس', route('admin.course.edit', $course->id));
});


/** Course Category */

// Categories
Breadcrumbs::register('course-categories', function ($breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی درس ها', route('admin.course.category.index'));
});

// Category > Create
Breadcrumbs::register('course-category-create', function ($breadcrumbs) {
    $breadcrumbs->parent('course-categories');
    $breadcrumbs->push('افزودن دسته بندی درس', route('admin.course.category.create'));
});

// Category > Show
Breadcrumbs::register('course-category-show', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('course-categories');
    $breadcrumbs->push('مشاهده دسته بندی درس', route('admin.course.category.show', $category->id));
});

// Categories > Show > Edit
Breadcrumbs::register('course-category-edit', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('course-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی درس', route('admin.course.category.edit', $category->id));
});

/** Term */

// Terms
Breadcrumbs::register('terms', function ($breadcrumbs) {
    $breadcrumbs->push('لیست دوره ها', route('admin.term.index'));
});

// Term > Create
Breadcrumbs::register('term-create', function ($breadcrumbs) {
    $breadcrumbs->parent('terms');
    $breadcrumbs->push('افزودن دوره', route('admin.term.create'));
});

// Term > Show
Breadcrumbs::register('term-show', function ($breadcrumbs, $term) {
    $breadcrumbs->parent('terms');
    $breadcrumbs->push('مشاهده دوره', route('admin.term.show', $term->id));
});

// Terms > Show > Edit
Breadcrumbs::register('term-edit', function ($breadcrumbs, $term) {
    $breadcrumbs->parent('term-show', $term);
    $breadcrumbs->push('ویرایش دوره', route('admin.term.edit', $term->id));
});


/** Term Category */

// Categories
Breadcrumbs::register('term-categories', function ($breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی دوره ها', route('admin.term.category.index'));
});

// Category > Create
Breadcrumbs::register('term-category-create', function ($breadcrumbs) {
    $breadcrumbs->parent('term-categories');
    $breadcrumbs->push('افزودن دسته بندی دوره', route('admin.term.category.create'));
});

// Category > Show
Breadcrumbs::register('term-category-show', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('term-categories');
    $breadcrumbs->push('مشاهده دسته بندی دوره', route('admin.term.category.show', $category->id));
});

// Categories > Show > Edit
Breadcrumbs::register('term-category-edit', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('term-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی دوره', route('admin.term.category.edit', $category->id));
});

/** Meeting */

// Meeting
Breadcrumbs::register('meetings', function ($breadcrumbs) {
    $breadcrumbs->push('لیست نشست ها', route('admin.meeting.index'));
});

// Meeting > Create
Breadcrumbs::register('meeting-create', function ($breadcrumbs) {
    $breadcrumbs->parent('meetings');
    $breadcrumbs->push('افزودن نشست', route('admin.meeting.create'));
});

// Meeting > Show
Breadcrumbs::register('meeting-show', function ($breadcrumbs, $term) {
    $breadcrumbs->parent('meetings');
    $breadcrumbs->push('مشاهده نشست', route('admin.meeting.show', $term->id));
});

// Meeting > Show > Edit
Breadcrumbs::register('meeting-edit', function ($breadcrumbs, $term) {
    $breadcrumbs->parent('meeting-show', $term);
    $breadcrumbs->push('ویرایش نشست', route('admin.meeting.edit', $term->id));
});


/** Term Category */

// Categories
Breadcrumbs::register('meeting-categories', function ($breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی نشست ها', route('admin.meeting.category.index'));
});

// Category > Create
Breadcrumbs::register('meeting-category-create', function ($breadcrumbs) {
    $breadcrumbs->parent('meeting-categories');
    $breadcrumbs->push('افزودن دسته بندی نشست', route('admin.meeting.category.create'));
});

// Category > Show
Breadcrumbs::register('meeting-category-show', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('meeting-categories');
    $breadcrumbs->push('مشاهده دسته بندی نشست', route('admin.meeting.category.show', $category->id));
});

// Categories > Show > Edit
Breadcrumbs::register('meeting-category-edit', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('meeting-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی نشست', route('admin.meeting.category.edit', $category->id));
});

/** Tag */

// Tags
Breadcrumbs::register('tags', function ($breadcrumbs) {
    $breadcrumbs->push('لیست کلمات کلیدی', route('admin.tag.index'));
});

// Tag > Create
Breadcrumbs::register('tag-create', function ($breadcrumbs) {
    $breadcrumbs->parent('tags');
    $breadcrumbs->push('افزودن کلمه کلیدی', route('admin.tag.create'));
});

// Tag > Show
Breadcrumbs::register('tag-show', function ($breadcrumbs, $tag) {
    $breadcrumbs->parent('tags');
    $breadcrumbs->push('مشاهده کلمه کلیدی', route('admin.tag.show', $tag->id));
});

// Tags > Show > Edit
Breadcrumbs::register('tag-edit', function ($breadcrumbs, $tag) {
    $breadcrumbs->parent('tag-show', $tag);
    $breadcrumbs->push('ویرایش کلمه کلیدی', route('admin.tag.edit', $tag->id));
});

/** News */

// News
Breadcrumbs::register('news', function ($breadcrumbs) {
    $breadcrumbs->push('لیست یادداشت و مصاحبه', route('admin.news.index'));
});

// News > Create
Breadcrumbs::register('news-create', function ($breadcrumbs) {
    $breadcrumbs->parent('news');
    $breadcrumbs->push('افزودن یادداشت و مصاحبه', route('admin.news.create'));
});

// News > Show
Breadcrumbs::register('news-show', function ($breadcrumbs, $news) {
    $breadcrumbs->parent('news');
    $breadcrumbs->push('مشاهده یادداشت و مصاحبه', route('admin.news.show', $news->id));
});

// News > Show > Edit
Breadcrumbs::register('news-edit', function ($breadcrumbs, $news) {
    $breadcrumbs->parent('news-show', $news);
    $breadcrumbs->push('ویرایش یادداشت و مصاحبه', route('admin.news.edit', $news->id));
});

/** Category */

// Categories
Breadcrumbs::register('news-categories', function ($breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی یادداشت و مصاحبه', route('admin.news.category.index'));
});

// Category > Create
Breadcrumbs::register('news-category-create', function ($breadcrumbs) {
    $breadcrumbs->parent('news-categories');
    $breadcrumbs->push('افزودن دسته بندی یادداشت و مصاحبه', route('admin.news.category.create'));
});

// Category > Show
Breadcrumbs::register('news-category-show', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('news-categories');
    $breadcrumbs->push('مشاهده دسته بندی یادداشت و مصاحبه', route('admin.news.category.show', $category->id));
});

// Categories > Show > Edit
Breadcrumbs::register('news-category-edit', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('news-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی یادداشت و مصاحبه', route('admin.news.category.edit', $category->id));
});

/** Page */

// Pages
Breadcrumbs::register('pages', function ($breadcrumbs) {
    $breadcrumbs->push('لیست صفحات', route('admin.page.index'));
});

// Page > Create
Breadcrumbs::register('page-create', function ($breadcrumbs) {
    $breadcrumbs->parent('pages');
    $breadcrumbs->push('افزودن صفحه', route('admin.page.create'));
});

// Page > Show
Breadcrumbs::register('page-show', function ($breadcrumbs, $page) {
    $breadcrumbs->parent('pages');
    $breadcrumbs->push('مشاهده صفحه', route('admin.page.show', $page->id));
});

// Pages > Show > Edit
Breadcrumbs::register('page-edit', function ($breadcrumbs, $page) {
    $breadcrumbs->parent('page-show', $page);
    $breadcrumbs->push('ویرایش صفحه', route('admin.page.edit', $page->id));
});

/** Place */

// Places
Breadcrumbs::register('places', function ($breadcrumbs) {
    $breadcrumbs->push('لیست اماکن', route('admin.place.index'));
});

// Place > Create
Breadcrumbs::register('place-create', function ($breadcrumbs) {
    $breadcrumbs->parent('places');
    $breadcrumbs->push('افزودن مکان', route('admin.place.create'));
});

// Place > Show
Breadcrumbs::register('place-show', function ($breadcrumbs, $place) {
    $breadcrumbs->parent('places');
    $breadcrumbs->push('مشاهده مکان', route('admin.place.show', $place->id));
});

// Places > Show > Edit
Breadcrumbs::register('place-edit', function ($breadcrumbs, $place) {
    $breadcrumbs->parent('place-show', $place);
    $breadcrumbs->push('ویرایش مکان', route('admin.place.edit', $place->id));
});

/** Event */

// Events
Breadcrumbs::register('events', function ($breadcrumbs) {
    $breadcrumbs->push('لیست برنامه های آتیا', route('admin.event.index'));
});

// Event > Create
Breadcrumbs::register('event-create', function ($breadcrumbs) {
    $breadcrumbs->parent('events');
    $breadcrumbs->push('افزودن برنامه های آتی', route('admin.event.create'));
});

// Event > Show
Breadcrumbs::register('event-show', function ($breadcrumbs, $event) {
    $breadcrumbs->parent('events');
    $breadcrumbs->push('مشاهده برنامه های آتی', route('admin.event.show', $event->id));
});

// Events > Show > Edit
Breadcrumbs::register('event-edit', function ($breadcrumbs, $event) {
    $breadcrumbs->parent('event-show', $event);
    $breadcrumbs->push('ویرایش برنامه های آتی', route('admin.event.edit', $event->id));
});

/** Event Category */

// Categories
Breadcrumbs::register('event-categories', function ($breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی برنامه های آتی', route('admin.event.category.index'));
});

// Category > Create
Breadcrumbs::register('event-category-create', function ($breadcrumbs) {
    $breadcrumbs->parent('event-categories');
    $breadcrumbs->push('افزودن دسته بندی برنامه های آتی', route('admin.event.category.create'));
});

// Category > Show
Breadcrumbs::register('event-category-show', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('event-categories');
    $breadcrumbs->push('مشاهده دسته بندی برنامه های آتی', route('admin.event.category.show', $category->id));
});

// Categories > Show > Edit
Breadcrumbs::register('event-category-edit', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('event-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی برنامه های آتی', route('admin.event.category.edit', $category->id));
});

/** Slider */

// Sliders
Breadcrumbs::register('sliders', function ($breadcrumbs) {
    $breadcrumbs->push('لیست اسلاید ها', route('admin.slider.index'));
});

// Slider > Create
Breadcrumbs::register('slider-create', function ($breadcrumbs) {
    $breadcrumbs->parent('sliders');
    $breadcrumbs->push('افزودن اسلایدر', route('admin.slider.create'));
});

// Slider > Show
Breadcrumbs::register('slider-show', function ($breadcrumbs, $slider) {
    $breadcrumbs->parent('sliders');
    $breadcrumbs->push('مشاهده اسلایدر', route('admin.slider.show', $slider->id));
});

// Sliders > Show > Edit
Breadcrumbs::register('slider-edit', function ($breadcrumbs, $slider) {
    $breadcrumbs->parent('slider-show', $slider);
    $breadcrumbs->push('ویرایش اسلایدر', route('admin.slider.edit', $slider->id));
});

/** Audible */

// Audibles
Breadcrumbs::register('audible', function ($breadcrumbs) {
    $breadcrumbs->push('لیست کوتاه و شنیدنی ها', route('admin.audible.index'));
});

// Audible > Create
Breadcrumbs::register('audible-create', function ($breadcrumbs) {
    $breadcrumbs->parent('audible');
    $breadcrumbs->push('افزودن کوتاه و شنیدنی', route('admin.audible.create'));
});

// Audible > Show
Breadcrumbs::register('audible-show', function ($breadcrumbs, $audible) {
    $breadcrumbs->parent('audible');
    $breadcrumbs->push('مشاهده کوتاه و شنیدنی', route('admin.audible.show', $audible->id));
});


// Audibles
Breadcrumbs::register('contact', function ($breadcrumbs) {
    $breadcrumbs->push('تماس با ما', route('admin.contact.contacts.index'));
});


// Audible > Show
Breadcrumbs::register('contact-show', function ($breadcrumbs, $contact) {
    $breadcrumbs->parent('contact');
    $breadcrumbs->push('مشاهده تماس با ما', route('admin.contact.contacts.show', $contact->id));
});

// Audibles > Show > Edit
Breadcrumbs::register('audible-edit', function ($breadcrumbs, $audible) {
    $breadcrumbs->parent('audible-show', $audible);
    $breadcrumbs->push('ویرایش کوتاه و شنیدنی', route('admin.audible.edit', $audible->id));
});

/** Category */

// Categories
Breadcrumbs::register('audible-categories', function ($breadcrumbs) {
    $breadcrumbs->push('لیست دسته بندی کوتاه و شنیدنی ها', route('admin.audible.category.index'));
});

// Category > Create
Breadcrumbs::register('audible-category-create', function ($breadcrumbs) {
    $breadcrumbs->parent('audible-categories');
    $breadcrumbs->push('افزودن دسته بندی کوتاه و شنیدنی', route('admin.audible.category.create'));
});

// Category > Show
Breadcrumbs::register('audible-category-show', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('audible-categories');
    $breadcrumbs->push('مشاهده دسته بندی کوتاه و شنیدنی', route('admin.audible.category.show', $category->id));
});

// Categories > Show > Edit
Breadcrumbs::register('audible-category-edit', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('audible-category-show', $category);
    $breadcrumbs->push('ویرایش دسته بندی کوتاه و شنیدنی', route('admin.audible.category.edit', $category->id));
});