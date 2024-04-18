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
Route::get('updateapp', function()
{
    echo "starting...<br><br>";
    echo "<pre>". shell_exec ('composer dump-autoload')."</pre>"; ;
    echo "<br><br>...completed";
});

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
            Route::get('add-parent',[AdminController::class,'add_parent'])->name('admin.add.parent');
            Route::post('post-add-teacher',[AdminController::class,'postAddTeacher'])->name('admin.post.add.teacher');
            Route::post('add-parent', [AdminController::class, 'post_add_parent'])->name('admin.post.add.parent');
            Route::post('send-creds', [AdminController::class, 'send_creds'])->name('admin.send.creds');
            Route::post('add-notifies-post', [AdminController::class, 'add_notifies_post'])->name('add.notifies.post');
            Route::get('remove-teacher/{teacher_id}', [AdminController::class, 'remove_teacher'])->name('admin.remove.teacher');

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
                Route::get('create-group',[TeacherController::class,'create_group'])->name('create.group');
                Route::get('group-detail/{groupId}',[TeacherController::class,'group_detail'])->name('teacher.group.show');
                Route::get('group-detail/students/{groupId}',[TeacherController::class,'group_student_detail'])->name('teacher.group.students');
                Route::get('group-delete/{groupId}',[TeacherController::class,'group_delete'])->name('teacher.group.delete');
                
                Route::get('remove-group-member/{sId}',[TeacherController::class,'remove_group_member'])->name('teacher.remove.group.member');
                Route::post('add-group-member',[TeacherController::class,'add_group_member'])->name('teacher.add.group.member');
                Route::get('show-point/{groupId}',[TeacherController::class,'showPoint'])->name('teacher.show.point');
                Route::post('student-feedback',[TeacherController::class,'studentFeedback'])->name('teacher.student.feedback');
                Route::get('quiz-schedule',[TeacherController::class,'quiz_schedule']);
                Route::get('quiz-grades',[TeacherController::class,'quiz_grades']);
                Route::get('assign-points/group/{groupId}/student/{studentId}',[TeacherController::class,'assign_points'])->name('teacher.assign.points');
                Route::post('post-assign-points',[TeacherController::class,'post_assign_points'])->name('teacher.postAssignPoints');
                Route::get('assignment/{groupId}',[TeacherController::class,'assignment'])->name('teacher.assignment');
                Route::post('assign-assignment',[TeacherController::class,'assignAssignment'])->name('teacher.assign.assignment');
                Route::get('teacher-delete-assignment/{id}',[TeacherController::class,'teacher_delete_assignment'])->name('teacher-delete-assignment');
                Route::get('edit-assignment/{id}',[TeacherController::class,'edit_assignment'])->name('teacher.edit.assignment');
                Route::post('edit-assignment',[TeacherController::class,'edit_assignment_post'])->name('edit.assignment.post');
                Route::get('view-assignment/{groupId}',[TeacherController::class,'viewAssignment'])->name('teacher.view.assignment');
                Route::get('notice-board',[TeacherController::class,'notice_board'])->name('teacher.notice.board');

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
        Route::get('other-groups',[StudentController::class,'other_groups'])->name('student.other.groups');
        Route::get('group-points/{groupId}',[StudentController::class,'groupPoints'])->name('student.group.points');
        Route::get('feedback',[StudentController::class,'feedback'])->name('student.feedback');
        Route::get('points',[StudentController::class,'student_points'])->name('student.points');
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

    Route::post('kidPoints', [ParentController::class,'kidPoints'])->name('parent.getStudentPoint');  

    Route::middleware(['CheckParentLogin'])->group(function(){

            Route::get('dashboard',[ParentController::class,'parent_dashboard'])->name('parent.dashboard');  
            Route::get('addkid',[ParentController::class,'parent_addkid'])->name('parent.addKid');
            Route::post('addkidPost',[ParentController::class,'parent_addkidPost'])->name('parent.kid.post');
            Route::get('remove-kid/{kid_id}',[ParentController::class,'parent_remove_kid'])->name('parent.remove.kid');
            Route::get('edit-kid/{kid_user_id}',[ParentController::class,'edit_kid'])->name('edit.kid');
            Route::post('edit-kid',[ParentController::class,'edit_kid_post'])->name('edit.kid.post');

            Route::get('assign-points/{kidId}',[ParentController::class,'assign_points'])->name('parent.assignPoints');
            Route::post('post-assign-points',[ParentController::class,'post_assign_points'])->name('parent.postAssignPoints'); 

            Route::get('view-points/{kidId}', [ParentController::class,'viewPoints'])->name('parent.viewPoints');
            Route::get('weekly-points/{kidId}/{created_at}', [ParentController::class,'view_weekly_points'])->name('parent.weekly.points');

            Route::post('parent-feedback',[ParentController::class,'feedback'])->name('parent.student.feedback');
            Route::get('student-notifies/kid={user_id}',[ParentController::class,'student_notifies'])->name('student-notifies');
            Route::get('change-password',[ParentController::class,'change_password'])->name('parent.change.password');
            Route::post('change-password-post',[ParentController::class,'change_password_post'])->name('parent.change.password.post');

            Route::get('teacher-feedback/{student_id}',[ParentController::class,'teacherFeedback'])->name('parent.teacher.feedback');
            Route::get('notice-board',[ParentController::class,'notice_board'])->name('parent.notice.board');

            Route::get('my-profile',[ParentController::class,'my_profile'])->name('parent.profile');
            Route::post('update-profile',[ParentController::class,'update_profile'])->name('parent.update.profile');
            Route::get('change-pic/{id}',[ParentController::class,'change_profile_pic'])->name('change.profile.pic');
            Route::get('logout',[ParentController::class,'logout'])->name('parent.logout');
    });
});

// parent add child:user id and password,


