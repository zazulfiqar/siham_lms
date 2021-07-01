<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\CourseRegistrationController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\demoController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\MyParent\MyController;
use App\Http\Controllers\OfferedCoursesController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\PaymentSupportController;
use App\Http\Controllers\StudentSurveyController;
use App\Http\Controllers\SuperAdmin\SettingController;
use App\Http\Controllers\SupportTeam\MarkController;
use App\Http\Controllers\SupportTeam\ReportingController;
use App\Http\Controllers\SupportTeam\StdOnlinePaperController;
use App\Http\Controllers\SupportTeam\TimeTableController;
use App\Http\Controllers\SupportTeam\UserStatusController;
use App\Http\Controllers\TeacherCourseController;
use App\Http\Controllers\TeacherStudentsController;
use App\Http\Controllers\SupportTeam\TeacherController;

Auth::routes();

Route::get('/index', [FrontendController::class, 'indexfront'])->name('index');
Route::get('/', [FrontendController::class, 'indexfront'])->name('index');
Route::get('/blog', [FrontendController::class, 'blogfront'])->name('blog');
Route::get('/contact', [FrontendController::class, 'contactfront'])->name('contact');
Route::get('/course', [FrontendController::class, 'coursesfront'])->name('course');
Route::get('/faq', [FrontendController::class, 'faqfront'])->name('faq');
Route::get('/pricing', [FrontendController::class, 'pricingfront'])->name('pricing');
Route::get('/register', [FrontendController::class, 'registerfront'])->name('register');
Route::get('/testimonials', [FrontendController::class, 'testimonialsfront'])->name('testimonials');
Route::get('/blogdetail/{id}', [FrontendController::class, 'blogdetail'])->name('blogdetail');
Route::get('/teacherRegister', [FrontendController::class, 'teacherRegister'])->name('teacherRegister');
Route::get('/onlineClasses', [FrontendController::class, 'onlineClasses'])->name('onlineClasses');
Route::get('/onlineTutor', [FrontendController::class, 'onlineTutor'])->name('onlineTutor');
// Frontend Routing End


Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms-of-use', [HomeController::class, 'terms_of_use'])->name('terms_of_use');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'dashboard'])->name('home');
    Route::get('/home', [HomeController::class, 'dashboard'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::group(['prefix' => 'my_account'], function () {
        Route::get('/', [MyAccountController::class, 'edit_profile'])->name('my_account');
        Route::put('/', [MyAccountController::class, 'update_profile'])->name('my_account.update');
        Route::put('/change_password', [MyAccountController::class, 'change_pass'])->name('my_account.change_pass');
    });

    /*************** Support Team *****************/
    Route::group(['namespace' => 'SupportTeam',], function () {

        /*************** Students *****************/
        Route::group(['prefix' => 'students'], function () {
            Route::get('reset_pass/{st_id}', [StudentRecordController::class, 'reset_pass'])->name('st.reset_pass');
            Route::get('graduated', [StudentRecordController::class, 'graduated'])->name('students.graduated');
            Route::put('not_graduated/{id}', [StudentRecordController::class, 'not_graduated'])->name('st.not_graduated');
//            Route::get('list/{class_id}', [StudentRecordController::class,'listByClass'])->name('students.list');
            Route::get('list/{class_id}', [ReportingController::class, 'listByClass'])->name('students.list');

            Route::post('promote_selector', [PromotionController::class, 'selector'])->name('students.promote_selector');
            Route::get('promotion/manage', [PromotionController::class, 'manage'])->name('students.promotion_manage');
            Route::delete('promotion/reset/{pid}', [PromotionController::class, 'reset'])->name('students.promotion_reset');
            Route::delete('promotion/reset_all', [PromotionController::class, 'reset_all'])->name('students.promotion_reset_all');
            Route::get('promotion/{fc?}/{fs?}/{tc?}/{ts?}', [PromotionController::class, 'promotion'])->name('students.promotion');
            Route::post('promote/{fc}/{fs}/{tc}/{ts}', [PromotionController::class, 'promote'])->name('students.promote');
            Route::get('/class_schedule', [ClassScheduleController::class, 'index'])->name('students.class_schedule');
            Route::get('/course_register', [CourseRegistrationController::class, 'index'])->name('students.course_register');
              Route::post('/courcestudentDetails', [CourseRegistrationController::class, 'courcestudentDetails'])->name('students.courcestudentDetails');
            Route::get('/general_courses', [OfferedCoursesController::class, 'index'])->name('students.offered_courses');
            Route::get('/private_courses', [OfferedCoursesController::class, 'privateCourses'])->name('students.private_courses');
            Route::get('/course_register_store/{id}', [CourseRegistrationController::class, 'store'])->name('students.course_register.store');
            Route::get('/show_online_paper_result', [StudentSurveyController::class, 'show_online_paper_result'])->name('show_online_paper_result');
            Route::get('/survey', [StudentSurveyController::class, 'index'])->name('students.survey');
            Route::get('/curriculum', [CurriculumController::class, 'index'])->name('students.curriculum');
            Route::get('/drop_a_complain', [ApplicationController::class, 'drop_a_complain'])->name('students.drop_a_complain');
            Route::get('/student_drop_a_complain', [ApplicationController::class, 'individual_drop_a_complain'])->name('individual_students.drop_a_complain');
            Route::get('/general_app', [ApplicationController::class, 'general_app'])->name('students.general_app');
            Route::get('/student_general_app', [ApplicationController::class, 'individual_general_app'])->name('individual_students.general_app');
            Route::get('/addtopic', [OfferedCoursesController::class, 'addtopic'])->name('addtopic');
            Route::post('/addtopicsub', [OfferedCoursesController::class, 'addtopicsub'])->name('addtopicsub');
        });

        Route::post('/general_app_store', [ApplicationController::class, 'general_app_store'])->name('students.general_app_store');
        Route::post('/general_app_storeComplains', [ApplicationController::class, 'general_app_storeComplains'])->name('students.general_app_storeComplains');
        Route::post('/destroy', [ApplicationController::class, 'destroy'])->name('students.destroy');
        Route::post('/surveyStore', [StudentSurveyController::class, 'surveyStore'])->name('students.surveyStore');
        Route::get('/manage_general_app', [ApplicationController::class, 'manage_general_app'])->name('application.manage_general_app');
        Route::get('/manage_complain/{id}', [ApplicationController::class, 'manage_complain'])->name('application.manage_complain');
        Route::post('/add_complain_response/{id}', [ApplicationController::class, 'store_complain_response'])->name('application.store_complain_response');
        Route::get('/manage_general_application/{id}', [ApplicationController::class, 'manage_general_application'])->name('application.manage_complain');
        Route::post('/add_general_application_response/{id}', [ApplicationController::class, 'store_general_application_response'])->name('application.store_general_application');
        Route::get('teacher_reset_pass/{st_id}', [TeacherController::class, 'resetPassword'])->name('teacher.reset_pass');


        /*************** Users *****************/
        Route::group(['prefix' => 'users'], function () {
            Route::get('reset_pass/{id}', [UserController::class, 'reset_pass'])->name('users.reset_pass');
        });

        /*************** TimeTables *****************/
        Route::group(['prefix' => 'timetables'], function () {
            Route::get('/', [TimeTableController::class, 'index'])->name('tt.index');

            Route::group(['middleware' => 'teamSA'], function () {
                Route::post('/', [TimeTableController::class, 'store'])->name('tt.store');
                Route::put('/{tt}', [TimeTableController::class, 'update'])->name('tt.update');
                Route::delete('/{tt}', [TimeTableController::class, 'delete'])->name('tt.delete');
            });

            /*************** TimeTable Records *****************/
            Route::group(['prefix' => 'records'], function () {

                Route::group(['middleware' => 'teamSA'], function () {
                    Route::get('manage/{ttr}', [TimeTableController::class, 'manage'])->name('ttr.manage');
                    Route::post('/', [TimeTableController::class, 'store_record'])->name('ttr.store');
                    Route::get('edit/{ttr}', [TimeTableController::class, 'edit_record'])->name('ttr.edit');
                    Route::put('/{ttr}', [TimeTableController::class, 'update_record'])->name('ttr.update');
                });
                Route::get('show/{ttr}', [TimeTableController::class, 'show_record'])->name('ttr.show');
                Route::get('print/{ttr}', [TimeTableController::class, 'print_record'])->name('ttr.print');
                Route::delete('/{ttr}', [TimeTableController::class, 'delete_record'])->name('ttr.destroy');

            });

            /*************** Time Slots *****************/
            Route::group(['prefix' => 'time_slots', 'middleware' => 'teamSA'], function () {
                Route::post('/', [TimeTableController::class, 'store_time_slot'])->name('ts.store');
                Route::post('/use/{ttr}', [TimeTableController::class, 'use_time_slot'])->name('ts.use');
                Route::get('edit/{ts}', [TimeTableController::class, 'edit_time_slot'])->name('ts.edit');
                Route::delete('/{ts}', [TimeTableController::class, 'delete_time_slot'])->name('ts.destroy');
                Route::put('/{ts}', [TimeTableController::class, 'update_time_slot'])->name('ts.update');
            });

        });

        Route::group(['prefix' => 'payments'], function () {

            Route::get('manage/{class_id?}', [PaymentSupportController::class, 'manage'])->name('payments.manage');
            Route::get('invoice/{id}/{year?}', [PaymentSupportController::class, 'invoice'])->name('payments.invoice');
            Route::get('receipts/{id}', [PaymentSupportController::class, 'receipts'])->name('payments.receipts');
            Route::get('pdf_receipts/{id}', [PaymentSupportController::class, 'pdf_receipts'])->name('payments.pdf_receipts');
            Route::post('select_year', [PaymentSupportController::class, 'select_year'])->name('payments.select_year');
            Route::post('select_class', [PaymentSupportController::class, 'select_class'])->name('payments.select_class');
            Route::delete('reset_record/{id}', [PaymentSupportController::class, 'reset_record'])->name('payments.reset_record');
            Route::post('pay_now/{id}', [PaymentSupportController::class, 'pay_now'])->name('payments.pay_now');
        });


        /*************** Pins *****************/
        Route::group(['prefix' => 'pins'], function () {
            Route::get('create', [PinController::class, 'create'])->name('pins.create');
            Route::get('/', [PinController::class, 'index'])->name('pins.index');
            Route::post('/', [PinController::class, 'store'])->name('pins.store');
            Route::get('enter/{id}', [PinController::class, 'enter_pin'])->name('pins.enter');
            Route::post('verify/{id}', [PinController::class, 'verify'])->name('pins.verify');
            Route::delete('/', [PinController::class, 'destroy'])->name('pins.destroy');
        });

        /*************** Marks *****************/
        Route::group(['prefix' => 'marks'], function () {

            Route::group(['middleware' => 'teamSA'], function () {
                Route::get('batch_fix', [MarkController::class, 'batch_fix'])->name('marks.batch_fix');
                Route::put('batch_update', [MarkController::class, 'batch_update'])->name('marks.batch_update');
                Route::get('tabulation/{exam?}/{class?}/{sec_id?}', [MarkController::class, 'tabulation'])->name('marks.tabulation');
                Route::post('tabulation', [MarkController::class, 'tabulation_select'])->name('marks.tabulation_select');
                Route::get('tabulation/print/{exam}/{class}/{sec_id}', [MarkController::class, 'print_tabulation'])->name('marks.print_tabulation');
            });

            Route::group(['middleware' => 'teamSAT'], function () {
                Route::get('/', [MarkController::class, 'index'])->name('marks.index');
                Route::get('manage/{exam}/{class}/{section}/{subject}', [MarkController::class, 'manage'])->name('marks.manage');
                Route::put('update/{exam}/{class}/{section}/{subject}', [MarkController::class, 'update'])->name('marks.update');
                Route::put('comment_update/{exr_id}', [MarkController::class, 'comment_update'])->name('marks.comment_update');
                Route::put('skills_update/{skill}/{exr_id}', [MarkController::class, 'skills_update'])->name('marks.skills_update');
                Route::post('selector', [MarkController::class, 'selector'])->name('marks.selector');
                Route::get('bulk/{class?}/{section?}', [MarkController::class, 'bulk'])->name('marks.bulk');
                Route::post('bulk', [MarkController::class, 'bulk_select'])->name('marks.bulk_select');
            });

            Route::get('select_year/{id}', [MarkController::class, 'year_selector'])->name('marks.year_selector');
            Route::post('select_year/{id}', [MarkController::class, 'year_selected'])->name('marks.year_select');
            Route::get('show/{id}/{year}', [MarkController::class, 'show'])->name('marks.show');
            Route::get('print/{id}/{exam_id}/{year}', [MarkController::class, 'print_view'])->name('marks.print');

        });

        Route::resource('students', StudentRecordController::class);
        Route::resource('users', UserController::class);
        Route::resource('classes', MyClassController::class);
        Route::resource('sections', SectionController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('grades', GradeController::class);
        Route::resource('exams', ExamController::class);
        Route::resource('dorms', DormController::class);
        Route::resource('payments', PaymentController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('courses', CoursesController::class);
        Route::resource('onlinepaper', OnlinePaperController::class);
        Route::resource('expense_type', ExpenseTypeController::class);
        Route::resource('teacher_assignment', TeacherAssignmentController::class);
        Route::resource('student_assignment', StudentAssignmentController::class);


//         front end admin rights .
        Route::resource('frontcourse', FrontCourseController::class);
        Route::resource('frontpricing', FrontPricingController::class);
        Route::resource('fronttestimonial', FrontTestimonialController::class);
        Route::resource('frontblog', FrontBlogController::class);
        Route::resource('frontfaq', FrontFaqController::class);
        Route::resource('frontgallery', FrontGalleryController::class);
        Route::get('image-upload', [FrontGalleryController::class, 'imageUpload'])->name('image.upload');
        Route::post('image-upload', [FrontGalleryController::class, 'imageUploadPost'])->name('image.upload.post');
        Route::resource('homepage', HomepagefrontController::class);
        Route::resource('homepagegallery', FrontHomepageGalleryController::class);
        Route::resource('homepagevideo', FrontHomepageVideoController::class);


        //          front end admin rights ends here .

        Route::resource('policies', PolicyController::class);
// announcements start
        Route::resource('std_ins', StudentsInstructionController::class);
        Route::resource('teacher_ins', TeachersInstructionController::class);
        Route::resource('std_noti', StudentsNotificationsController::class);
        Route::resource('teacher_noti', TeachersNotificationsController::class);
        Route::resource('std_updates', StudentsUpdatesController::class);
        Route::resource('teacher_updates', TeachersUpdatesController::class);
//  announcements ends here

//        Route::get('list', [TeacherController::class,'list'])->name('teachers.list');

        Route::get('list', [ReportingController::class, 'teachers_list'])->name('teachers.list');
        Route::get('teacher_rules', [ReportingController::class, 'teacher_rules'])->name('teachers.teacer_rules');
        Route::get('student_rules', [ReportingController::class, 'student_rules'])->name('students.student_rules');


        Route::get('/survey_view', [StudentSurveyController::class, 'teacher_view_survey'])->name('teachers.view.survey');


    });

    /************************ AJAX ****************************/


});
Route::group(['prefix' => 'ajax'], function () {
    Route::get('get_lga/{state_id}', [AjaxController::class, 'get_lga'])->name('get_lga');
    Route::get('get_class_sections/{class_id}', [AjaxController::class, 'get_class_sections'])->name('get_class_sections');
    Route::get('get_class_subjects/{class_id}', [AjaxController::class, 'get_class_subjects'])->name('get_class_subjects');
});

Route::resource('teachers', SupportTeam\TeacherController::class);
Route::resource('students', SupportTeam\StudentRecordController::class);
Route::resource('/teacher_evaluation', TeacherEvaluationController::class);
Route::resource('/student_evaluation', StudentEvaluationController::class);

//Route::resource('frontfaq', FrontFaqController::class);


/************************ SUPER ADMIN ****************************/
Route::group(['namespace' => 'SuperAdmin', 'middleware' => 'super_admin', 'prefix' => 'super_admin'], function () {

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

});

/************************ PARENT ****************************/
Route::group(['namespace' => 'MyParent', 'middleware' => 'my_parent',], function () {

    Route::get('/my_children', [MyController::class, 'children'])->name('my_children');

});
Route::get('/sample', [demoController::class, 'index']);

Route::get('/inactive-students', [UserStatusController::class, 'showInActiveStudents'])->name('status.inactive_students');
Route::get('/active-students', [UserStatusController::class, 'showActiveStudents'])->name('status.active_students');
Route::get('/inactive-teachers', [UserStatusController::class, 'showInActiveTeachers'])->name('status.inactive_teachers');
Route::get('/active-teachers', [UserStatusController::class, 'showActiveTeachers'])->name('status.active_teachers');
Route::get('/mark-student-active/{id}', [UserStatusController::class, 'setStudentActive'])->name('students.active');
Route::get('/mark-student-inactive/{id}', [UserStatusController::class, 'setStudentInActive'])->name('students.inactive');
Route::get('/mark-teacher-active/{id}', [UserStatusController::class, 'setTeacherActive'])->name('teacher.active');
Route::get('/mark-teacher-inactive/{id}', [UserStatusController::class, 'setTeacherInActive'])->name('teacher.inactive');


Route::get('/scheduleAClass', [ClassScheduleController::class, 'scheduleAClass'])->name('teacher.scheduleAClass');
Route::post('/scheduleAClassStore', [ClassScheduleController::class, 'store'])->name('teacher.scheduleAClass.store');
Route::get('/schedule_A_Class_Edit/{id}', [ClassScheduleController::class, 'edit'])->name('teacher.scheduleAClass.edit');
Route::post('/schedule_A_Class_Update/{id}', [ClassScheduleController::class, 'update'])->name('teacher.scheduleAClass.update');
Route::post('/schedule_A_Class_Destroy/{id}', [ClassScheduleController::class, 'destroy'])->name('teacher.scheduleAClass.destroy');


Route::get('/UploadLecture', [LectureController::class, 'uploadLecture'])->name('teacher.uploadlecture');
Route::post('/Lecture_store', [LectureController::class, 'storeLecture'])->name('teacher.lecture.store');
Route::get('/Lecture_edit/{id}', [LectureController::class, 'edit'])->name('teacher.lecture.edit');
Route::post('/UploadLecture_Update/{id}', [LectureController::class, 'update'])->name('teacher.lecture.update');
Route::post('/UploadLecture_Destroy/{id}', [LectureController::class, 'destroy'])->name('teacher.lecture.destroy');

Route::get('/create_paper', [PaperController::class, 'index'])->name('teacher.paper');
Route::get('/ResultList', [PaperController::class, 'resultIndex'])->name('teacher.resultlist');
// Route::get('/resultbypaper', [PaperController::class, 'resultbypaper'])->name('teacher.resultbypaper');
Route::get('resultbypaper',  [PaperController::class, 'resultbypaper'])->name('teacher.resultbypaper');
Route::get('resultbypaperAnswer',  [PaperController::class, 'resultbypaperAnswer'])->name('teacher.resultbypaperAnswer');




Route::post('/paper_store', [PaperController::class, 'store'])->name('teacher.paper.store');
Route::get('/paper_edit/{id}', [PaperController::class, 'edit'])->name('teacher.paper.edit');
Route::post('/paper_Update/{id}', [PaperController::class, 'update'])->name('teacher.paper.update');
Route::post('/paper_Destroy/{id}', [PaperController::class, 'destroy'])->name('teacher.paper.destroy');

Route::get('/std_paper', [StdOnlinePaperController::class, 'index'])->name('std_paper.paper.index');
Route::post('/std_paper_store', [StdOnlinePaperController::class, 'store'])->name('std_paper.paper.store');
Route::get('/std_paper_create', [StdOnlinePaperController::class, 'openPaper'])->name('std_paper.paper.openPaper');
Route::get('/std_paper_edit/{id}', [StdOnlinePaperController::class, 'edit'])->name('std_paper.paper.edit');
Route::post('/std_paper_Update/{id}', [StdOnlinePaperController::class, 'update'])->name('std_paper.paper.update');
Route::post('/std_paper_Destroy/{id}', [StdOnlinePaperController::class, 'destroy'])->name('std_paper.paper.destroy');

Route::get('/Lecture_show_student', [LectureController::class, 'show'])->name('student.lecture.show');
Route::get('/teacher/my_courses', [TeacherCourseController::class, 'index'])->name('teacher.my_courses');

Route::get('/teacher/my_courses', [TeacherCourseController::class, 'index'])->name('teacher.my_courses');


Route::get('/teacher/courcestudentDetails', [TeacherStudentsController::class, 'courcestudentDetails'])->name('teacher.courcestudentDetails');
Route::get('/teacher/courcestudentStudents', [TeacherStudentsController::class, 'courcestudentStudents'])->name('teacher.courcestudentStudents');
Route::get('/teacher/courcestudentassigements', [TeacherStudentsController::class, 'courcestudentassigements'])->name('teacher.courcestudentassigements');
Route::get('/teacher/courcestudentpapers', [TeacherStudentsController::class, 'courcestudentpapers'])->name('teacher.courcestudentpapers');


Route::get('/my_students', [TeacherStudentsController::class, 'index'])->name('teacher.my_students');


//Route::get('/view_clear',[LiveCmdController::class,view_clear')->name('view_clear');
//Route::get('/optimize',[LiveCmdController::class,optimize')->name('optimize');
//Route::get('/storage_link',[LiveCmdController::class,storage_link')->name('storage_link');
//Route::get('/migrate',[LiveCmdController::class,migrate')->name('migrate');
//Route::get('/db_seed',[LiveCmdController::class,db_seed')->name('db_seed');
//Route::get('/clear_cache',[LiveCmdController::class,clear_cache')->name('clear_cache');

Route::get('/clear_cache', function () {

    Artisan::call('cache:clear');
    dd("Cache is cleared");

});
Route::get('/migrate', function () {

    Artisan::call('migrate');
    dd("migration is done");

});
Route::get('/db_seed', function () {

    Artisan::call('db:seed');
    dd("seeding is done");

});
Route::get('/optimize', function () {

    Artisan::call('optimize');
    dd("optimized");

});
Route::get('/view_clear', function () {

    Artisan::call('cache:clear');
    dd("view is cleared");

});

Route::get('/key_generate', function () {

    Artisan::call('key:generate');
    dd("app key is set");

});

Route::get('/route_clear', function () {

    Artisan::call('route:clear');
    dd("route is cleared ");

});

Route::get('/route_cache', function () {

    Artisan::call('route:cache');
    dd("route cache cleared");

});

