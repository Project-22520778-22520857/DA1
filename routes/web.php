<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

// Route hiển thị trang đăng nhập
Route::get('login', [Controller::class, 'showLoginForm'])->name('login');

// Route xử lý đăng nhập
Route::post('login', [Controller::class, 'login'])->name('login.submit');

// Route đăng xuất
// web.php
Route::post('/logout', [Controller::class, 'logout'])->name('logout');


// Route nhóm cho sinh viên
Route::middleware('check.login')->group(function () {
    Route::get('student/classlist', [StudentController::class, 'classList'])->name('student.classlist');

    Route::get('student/profile', [StudentController::class, 'studentProfile'])->name('student.profile');

    Route::get('student/calendar', [StudentController::class, 'studentCalendar'])->name('student.calendar');

    Route::get('student/password', [StudentController::class, 'studentPassword'])->name('student.password');
    Route::post('student/password', [StudentController::class, 'changeStudentPassword'])->name('student.password.change');

    Route::get('student/dashboard', [StudentController::class, 'studentDashboard'])->name('student.dashboard');

    Route::get('student/view/classes/{malop}', [StudentController::class, 'viewClass'])->name('student.class.details');

    Route::get('student/view/tests/{malop}', [StudentController::class, 'viewTest'])->name('student.class.tests');
    Route::get('student/test/{malop}/{msbkt}/redirect', [StudentController::class, 'redirectToTest'])->name('student.test.redirect');
    Route::get('student/test/{malop}/{msbkt}/form', [StudentController::class, 'takeTestForm'])->name('student.test.form');
    Route::get('student/test/{malop}/{msbkt}/essay', [StudentController::class, 'takeTestEssay'])->name('student.test.essay');
    Route::post('student/store-test/{malop}', [StudentController::class, 'storeStudentTest'])->name('student.storeTest');
    Route::get('student/detail/test/{malop}/{msbkt}', [StudentController::class, 'viewTestDetail'])->name('student.detail.test');
    Route::get('student/detail/essay/{malop}/{msbkt}', [StudentController::class, 'viewEssayDetail'])->name('student.detail.essay');
    Route::post('student/test/{malop}/store-essay', [StudentController::class, 'storeEssayTest'])->name('student.test.storeEssay');

    Route::get('student/view/lectures/{malop}', [StudentController::class, 'viewLecture'])->name('student.class.lectures');
    Route::get('student/detail/lecture/{malop}/{id}', [StudentController::class, 'show'])->name('student.lecture.detail');

    Route::get('student/view/members/{malop}', [StudentController::class, 'viewMember'])->name('student.class.members');

    Route::get('student/view/scores/{malop}', [StudentController::class, 'viewScore'])->name('student.class.scores');
    Route::get('student/notice', [StudentController::class, 'studentNotification'])->name('student.notice');
    Route::post('student/notice/{id}/read', [StudentController::class, 'markAsRead'])->name('student.notice.read');
});

// Route nhóm cho giáo viên
Route::middleware('check.login')->group(function () {
    Route::get('teacher/classlist', [TeacherController::class, 'classList'])->name('teacher.classlist');

    Route::get('teacher/profile', [TeacherController::class, 'teacherProfile'])->name('teacher.profile');

    Route::get('teacher/calendar', [TeacherController::class, 'teacherCalendar'])->name('teacher.calendar');

    Route::get('teacher/password', [TeacherController::class, 'teacherPassword'])->name('teacher.password');
    Route::post('teacher/password', [TeacherController::class, 'changePassword'])->name('teacher.password.change');

    Route::get('teacher/dashboard', [TeacherController::class, 'teacherDashboard'])->name('teacher.dashboard');

    Route::get('teacher/view/classes/{malop}', [TeacherController::class, 'viewClass'])->name('class.details');

    Route::get('teacher/update/notification/{id}/{malop}', [TeacherController::class, 'editNotification'])->name('notification.edit');
    Route::post('teacher/update/notification/{id}/{malop}', [TeacherController::class, 'updateNotification'])->name('notification.update');
    Route::get('teacher/add/notification/{malop}', [TeacherController::class, 'showNotification'])->name('notification.form');
    Route::post('teacher/add/notification/{malop}', [TeacherController::class, 'storeNotification'])->name('notification.add');

    Route::get('teacher/view/tests/{malop}', [TeacherController::class, 'classTest'])->name('class.tests');

    Route::get('teacher/view/lectures/{malop}', [TeacherController::class, 'classLecture'])->name('class.lectures');

    Route::get('teacher/view/members/{malop}', [TeacherController::class, 'classMember'])->name('class.members');

    Route::get('teacher/view/statics/{malop}', [TeacherController::class, 'classStatics'])->name('class.statics');

    Route::get('teacher/view/scores/{malop}', [TeacherController::class, 'classScores'])->name('class.scores');
    Route::get('/teacher/class-scores/export/{malop}', [TeacherController::class, 'exportScores'])->name('teacher.exportScores');

    Route::get('teacher/add/lecture/{malop}', [TeacherController::class, 'addLecture'])->name('add.lecture');
    Route::post('teacher/add/lecture/{malop}', [TeacherController::class, 'addLecture'])->name('add.lecture');
    Route::get('teacher/update/lecture/{id}/{malop}', [TeacherController::class, 'showUpdateLectureForm'])->name('lecture.edit');
    Route::delete('teacher/delete/lecture/{malop}/{id}', [TeacherController::class, 'deleteLecture'])->name('class.delete.lecture');
    Route::post('teacher/update/lecture/{id}/{malop}', [TeacherController::class, 'updateLecture'])->name('lecture.update');
    Route::get('teacher/detail/lecture/{id}/{malop}', [TeacherController::class, 'showLecture'])->name('lecture.detail');

    Route::get('teacher/add/test/type/{malop}', [TeacherController::class, 'testType'])->name('test.type');
    Route::get('teacher/add/test/percent/{malop}', [TeacherController::class, 'testPercent'])->name('test.percent');
    Route::post('teacher/add/test/percent/{malop}', [TeacherController::class, 'storeTestPercent'])->name('test.percent.store');

    Route::get('teacher/add/test/form/{malop}', [TeacherController::class, 'testForm'])->name('test.form');
    Route::post('teacher/add/test/store/{malop}', [TeacherController::class, 'storeTest'])->name('test.store');
    Route::post('teacher/add/test/storeessay/{malop}', [TeacherController::class, 'storetestEssay'])->name('test.store.essay');
    Route::delete('teacher/delete/test/{malop}/{msbkt}', [TeacherController::class, 'deleteTest'])->name('class.delete.test');

    Route::get('teacher/add/test/essay/{malop}', [TeacherController::class, 'testEssay'])->name('test.essay');

    Route::get('teacher/update/test/essay/{id}/{malop}', [TeacherController::class, 'editEssay'])->name('essay.edit');
    Route::get('teacher/update/test/form/{id}/{malop}', [TeacherController::class, 'editForm'])->name('form.edit');
    Route::post('teacher/update/test/form/{id}/{malop}', [TeacherController::class, 'updateTest'])->name('form.update');
    Route::post('teacher/update/test/essay/{id}/{malop}', [TeacherController::class, 'updateEssay'])->name('essay.update');

    Route::get('teacher/grading/list/{malop}/{msbkt}', [TeacherController::class, 'gradingList'])->name('grading.list');
    Route::get('teacher/grading/student/{malop}/{msbkt}/{mssv}', [TeacherController::class, 'gradingStudent'])->name('grading.student');
    Route::post('/teacher/grading/submit', [TeacherController::class, 'submitGrading'])->name('teacher.grading.submit');
});
