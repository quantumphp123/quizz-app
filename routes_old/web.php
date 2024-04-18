<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
// use App\Http\Middleware\CheckAdminLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Starter Route

Route::get('/',function(){
          return view('About');
});

Route::get('/contact-us',function(){
          return view('contact');
});

Route::get('/main',function(){
    return view('main');
});

// Admin Routes

    Route::prefix('admin')->group(function () {
        Route::get('login', [AdminController::class,'login'])->name('adminLogin');
        Route::post('login_post', [AdminController::class,'login_post'])->name('adminLoginPost');


        Route::get('signup', [AdminController::class,'signup'])->name('adminSignup');
        Route::post('signup-post', [AdminController::class,'signup_post'])->name('adminSignupPost');
        
        Route::middleware(['CheckAdminLogin'])->group(function(){
            Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');
            Route::get('dashboard', [AdminController::class,'admin_dashboard'])->name('adminDashboard');
            Route::get('all-students',[AdminController::class,'all_students']);
            Route::get('student-details/{studentId}',[AdminController::class,'student_details'])->name('admin.student.details');
            Route::get('all-teachers',[AdminController::class,'all_teachers'])->name('admin.all.teachers');
            Route::get('teacher-details',[AdminController::class,'teacher_details']);
            Route::get('all-parents',[AdminController::class,'all_parents']);
            Route::get('parent-deatils',[AdminController::class,'parent_details']);
            Route::get('parent-deatils',[AdminController::class,'parent_details']);
            Route::get('groups',[AdminController::class,'groups']);
            Route::get('group-details/{groupId}',[AdminController::class,'groupDetails'])->name('admin.show.group.details');
            Route::get('quiz-schedule',[AdminController::class,'quiz_schedule']);
            Route::get('quiz-grades',[AdminController::class,'quiz_grades']);
            Route::get('notification',[AdminController::class,'notification']);
            Route::get('add-teacher',[AdminController::class,'addTeacher'])->name('admin.add.teacher');
            Route::post('post-add-teacher',[AdminController::class,'postAddTeacher'])->name('admin.post.add.teacher');

        });


    });


// Teacher Routes
Route::prefix('teacher')->group(function () {

    Route::get('login', [TeacherController::class,'login'])->name('teacherLogin');
    Route::post('login-post', [TeacherController::class,'login_post'])->name('teacherLoginPost');

    Route::get('signup', [TeacherController::class,'signup'])->name('teacherSignup');
    Route::post('signup-post', [TeacherController::class,'signup_post'])->name('teacherSignupPost');

    Route::middleware(['CheckTeacherLogin'])->group(function(){

                    
                Route::get('dashboard',[TeacherController::class,'teacher_dashboard'])->name('teacher.dashboard');
                Route::get('logout',[TeacherController::class,'logout'])->name('teacher.logout');
                Route::get('all-students',[TeacherController::class,'all_students']);
                Route::get('student-details/{id}',[TeacherController::class,'student_details'])->name('teacher.student.details');
                Route::get('groups',[TeacherController::class,'groups'])->name('teacher.listGroups');
                Route::get('group-detail/{groupId}',[TeacherController::class,'group_detail'])->name('teacher.group.show');
                Route::get('group-detail/students/{groupId}',[TeacherController::class,'group_student_detail'])->name('teacher.group.students');
                
                Route::get('remove-group-member/{sId}',[TeacherController::class,'remove_group_member'])->name('teacher.remove.group.member');
                Route::post('add-group-member',[TeacherController::class,'add_group_member'])->name('teacher.add.group.member');
                Route::get('show-point/{groupId}',[TeacherController::class,'showPoint'])->name('teacher.show.point');
                Route::post('student-feedback',[TeacherController::class,'studentFeedback'])->name('teacher.student.feedback');
                Route::get('quiz-schedule',[TeacherController::class,'quiz_schedule']);
                Route::get('quiz-grades',[TeacherController::class,'quiz_grades']);
                Route::get('assign-points/group/{groupId}/student/{studentId}',[TeacherController::class,'assign_points'])->name('teacher.assign.points');
                Route::post('post-assign-points',[TeacherController::class,'post_assign_points']);
                Route::get('assignment/{groupId}',[TeacherController::class,'assignment'])->name('teacher.assignment');
                Route::post('assign-assignment',[TeacherController::class,'assignAssignment'])->name('teacher.assign.assignment');
                Route::get('view-assignment/{groupId}',[TeacherController::class,'viewAssignment'])->name('teacher.view.assignment');

                Route::post('createGroup',[TeacherController::class,'createGroup'])->name('teacher.createGroup');
                Route::get('fetchStudents/{class}',[TeacherController::class,'getStudentList']);

    });





});



// Student Routes
Route::prefix('student')->group(function () {
    Route::get('login',[StudentController::class,'login'])->name('student.login');
    Route::post('post-login',[StudentController::class,'postLogin'])->name('student.postLogin');

    Route::middleware(['CheckStudentLogin'])->group(function(){

        Route::get('logout',[StudentController::class,'logout'])->name('student.logout');
        Route::get('my-group',[StudentController::class,'myGroup'])->name('student.group');
        Route::get('group-points/{groupId}',[StudentController::class,'groupPoints'])->name('student.group.points');
        Route::get('feedback',[StudentController::class,'feedback'])->name('student.feedback');
        Route::get('dashboard',[StudentController::class,'studentDashboard'])->name('student.dashboard');
        Route::get('quiz-schedule',[StudentController::class,'quiz_schedule'])->name('student.quiz.schedule');
        Route::get('quiz-grades',[StudentController::class,'quiz_grades'])->name('student.quiz.grades');
        Route::get('notice',[StudentController::class,'notice'])->name('student.notice');
        Route::get('assignments',[StudentController::class,'assignments'])->name('student.assignments');
    });


});


// Parent Routes
Route::prefix('parent')->group(function () {


    Route::get('login',[ParentController::class,'login'])->name('parent.login');
    Route::post('login-post',[ParentController::class,'login_post'])->name('parent.login.post');

    Route::get('signup',[ParentController::class,'signup'])->name('parent.signup');
    Route::post('signup-post',[ParentController::class,'signup_post'])->name('parent.signup.post');


    Route::middleware(['CheckParentLogin'])->group(function(){

        
            Route::get('dashboard',[ParentController::class,'parent_dashboard'])->name('parent.dashboard');  
            Route::get('addkid',[ParentController::class,'parent_addkid'])->name('parent.addKid');
            Route::post('addkidPost',[ParentController::class,'parent_addkidPost'])->name('parent.kid.post');

            Route::get('assign-points/{kidId}',[ParentController::class,'assign_points'])->name('parent.assignPoints');
            Route::post('post-assign-points',[ParentController::class,'post_assign_points'])->name('parent.postAssignPoints'); 

            Route::get('view-points/{kidId}', [ParentController::class,'viewPoints'])->name('parent.viewPoints');

            Route::post('parent-feedback',[ParentController::class,'feedback'])->name('parent.student.feedback');

            Route::get('teacher-feedback',[ParentController::class,'teacherFeedback'])->name('parent.teacher.feedback');

            Route::get('my-profile',[ParentController::class,'my_profile'])->name('parent.profile');
            Route::post('update-profile',[ParentController::class,'update_profile'])->name('parent.update.profile');
            Route::get('change-pic/{id}',[ParentController::class,'change_profile_pic'])->name('change.profile.pic');
            Route::get('logout',[ParentController::class,'logout'])->name('parent.logout');

    });


});



// parent add child:user id and password,


