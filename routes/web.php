<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherCoordinatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\UserStudentController;
use App\Http\Controllers\StudentAuthManager;
use App\Http\Controllers\UserAuthManager;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentDocController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\BatchContentController;
use App\Http\Controllers\AnswerController;
use App\Models\Student;

use Illuminate\Support\Str;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/


// Filling dumy student data
// Route::get('/fill_student', function () {
//     Student::factory()->times(20)->create();
//     return 'Student created successfully! with thier email address and password = "password" ';
// });

// Generate Id for students

/*
|--------------------------------------------------------------------------
| Student Auth Manager                                       
|------------------------------------------------------------------------*/

Route::get('/student_login', [StudentAuthManager::class, 'login'] )->name('student.login');
Route::post('/student_login', [StudentAuthManager::class, 'loginPost'] );

Route::get('/student_register', [StudentAuthManager::class, 'register']);
Route::post('/student_register', [StudentAuthManager::class, 'registrationPost'] );

Route::get('/student_logout', [StudentAuthManager::class, 'logout']);
Route::get('/forget_password', [StudentAuthManager::class, 'forgetPassword']);
Route::post('/reset_password', [StudentAuthManager::class, 'resetPassword']);

/*
|--------------------------------------------------------------------------
| Student - Course                                        
|------------------------------------------------------------------------*/

Route::group(['middleware' => ['student']], function () {

    Route::get('/', [UserStudentController::class, 'index']);

    Route::get('/course_list', [UserStudentController::class, 'courseList']);

    Route::get('/course_single/{id}', [UserStudentController::class, 'courseSingle']);

    Route::get('/my_profile', [UserStudentController::class, 'myProfile']);

    Route::get('/my_profile/{id}/edit', [UserStudentController::class, 'myProfileEdit']);

    Route::put('/my_profile_update/{id}', [UserStudentController::class, 'myProfileUpdate']);

    Route::get('/my_picture/{id}/edit', [UserStudentController::class, 'myPictureEdit']);

    Route::put('/my_picture_update/{id}', [UserStudentController::class, 'myPictureUpdate']);

    Route::get('my_setting', [UserStudentController::class, 'mySetting']);

    Route::get('change_password', [UserStudentController::class, 'changePassword']);

    Route::put('/student_update_password', [UserStudentController::class, 'updatePassword']);
    
    Route::get('/my_course_single/{course_id}/{classroom_id}', [UserStudentController::class, 'myCourseSingle']);

    Route::get('/enroll_course/{id}', [UserStudentController::class, 'enrollCourse']);

    Route::post('/enroll_now', [UserStudentController::class, 'enrollNow']);

    // Fetch Quiz Questions
    Route::get('/my_quiz/{content_id}/{classroom_id}', [UserStudentController::class, 'myQuiz']);

    // Submit QUiz Answers - Each
    Route::post('/quiz_answer_submit/{classroom_id}/{quiz_id}', [AnswerController::class, 'quizAnswerSubmit']);
    // Submit Quiz Match Answer - Each
    Route::post('/quiz_match_submit/{classroom_id}/{quiz_id}', [AnswerController::class, 'quizMatchSubmit']);

    // Submit Quiz - Finish
    Route::post('/quiz_submit/{classroom_id}/{content_id}', [UserStudentController::class, 'quizSubmit']);

    Route::get('/my_final/{course_id}/{classroom_id}', [UserStudentController::class, 'myFinal']);

    Route::post('/my_final/{classroom_id}', [UserStudentController::class, 'myFinalSubmit']);

    Route::post('/disqualify/{classroom_id}', [UserStudentController::class, 'disqualify']);

    Route::resource('student_doc', StudentDocController::class);

    Route::get('/student_doc/{id}/verify', [StudentDocController::class, 'verifyDoc']);

    Route::get('resource/{id}/downloadStu', [ResourceController::class, 'getDownloadStu']);
    
    Route::get('resource/viewDoc/{filename}', [ResourceController::class, 'viewDoc']);
});

/*
|--------------------------------------------------------------------------
| User Auth Manager                                       
|------------------------------------------------------------------------*/

Route::get('/user_login', [UserAuthManager::class, 'login'] )->name('user.login');
Route::post('/user_login', [UserAuthManager::class, 'loginPost'] );

Route::get('/user_register', [UserAuthManager::class, 'register']);
Route::post('/user_register', [UserAuthManager::class, 'registrationPost'] );

Route::get('/user_logout', [UserAuthManager::class, 'logout']);
Route::get('/user_forget_password', [UserAuthManager::class, 'userForgetPassword']);
Route::post('/user_reset_password', [UserAuthManager::class, 'userResetPassword']);

/*
|--------------------------------------------------------------------------
| Admin Entry - Left Menu                                         
|------------------------------------------------------------------------*/

Route::group(['middleware'=> ['auth']], function(){

    //Show my User profile
    Route::get('admin_profile', [UserController::class, 'userProfile']);

    // Edit My user profile
    Route::get('/admin_profile/{id}/edit', [UserController::class, 'userProfileEdit']);

    // Update my user profile
    Route::put('/admin_profile/{id}', [UserController::class, 'userProfileUpdate']);

    // Update my user profile
    Route::put('/admin_profile_upload/{id}', [UserController::class, 'userProfileUpload']);

    // Change Password
    Route::get('/admin_edit_password', [UserController::class, 'editPassword']);

    // Update my user profile
    Route::put('/admin_update_password', [UserController::class, 'updatePassword']);

    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin_setting', [AdminController::class, 'setting']);

    Route::resource('courseCategory', CourseCategoryController::class)->middleware('permission:manage category');

    //-------------- Admin - Section -------------/
    Route::group( ['middleware'=> ['permission:manage course']], function(){
        Route::resource('course', CourseController::class);
        Route::resource('section', SectionController::class);
        Route::get('/course/create_section/{id}', [CourseController::class, 'createSection'] );

        //-------------- Admin - Quiz -------------/
        Route::resource('quiz', QuizController::class);
        Route::post('quiz_short', [QuizController::class, 'storeShortQuestion']);
        Route::post('quiz_match', [QuizController::class, 'storeMatchQuestion']);
        Route::get('/course/create_quiz_multiple/{course_id}/{content_id}', [QuizController::class, 'createQuizMultiple']);
        Route::get('/course/create_quiz_short/{course_id}/{content_id}', [QuizController::class, 'createQuizShort']);
        Route::get('course/create_quiz_match/{course_id}/{content_id}', [QuizController::class, 'createQuizMatch']);

        //-------------- Admin - Content -------------/

        Route::resource('content', ContentController::class);
        Route::get('/course/create_content/{id}', [ContentController::class, 'createContent'] );
        Route::get('/course/create_resource/{course_id}/{content_id}', [ContentController::class, 'createResource'] );
        Route::post('/course/store_resource/{content_id}', [ContentController::class, 'storeResource'] );
        Route::post('/course/store_worksheet/{content_id}', [ContentController::class, 'storeWorksheet'] );
    });

    // -------------- User Management ------------
    Route::group( ['middleware'=>['permission:manage users']], function(){

        Route::resource('user', UserController::class);
        Route::post('/user/assign_role', [UserController::class, 'assignRole']);
        Route::get('/user/{user_id}/revoke_role/{role_id}', [UserController::class, 'revokeRole']);

        Route::post('/user/assign_permission', [UserController::class, 'assignPermission']);
        Route::get('/user/{user_id}/revoke_permission/{permission_id}', [UserController::class, 'revokePermission']);

    } );

    // --------------- Role Management -----------------
    Route::group(['middleware'=>['permission:manage roles']], function(){
        Route::resource('role', RoleController::class);
        Route::post('/role/{role_id}/permission', [RoleController::class, 'assignPermission']);
        Route::get('/role/{role_id}/revoke_permission/{permission_id}', [RoleController::class, 'revokePermission']);
    });

    // -------------- Permission Management ------
    Route::group(['middleware'=>['permission:manage permissions']], function(){
        Route::resource('permission', PermissionController::class);
        Route::post('/permission/{permission_id}/role', [PermissionController::class, 'assignRole']);
        Route::get('/permission/{permission_id}/revoke_permission/{role_id}', [PermissionController::class, 'revokePermission']);
    });
    
    Route::resource('student', StudentController::class)->middleware('permission:manage students');
    Route::post('student/{id}/updateStudentProfile', [StudentController::class, 'updateStudentProfile']);

    //-------------- Admin - Batch -------------
    Route::group( ['middleware'=> ['permission:manage batch']], function(){
        Route::resource('batch', BatchController::class);
        Route::resource('batch_content', BatchContentController::class);
        Route::post('/batch_content/dismiss_content', [BatchContentController::class, 'dismissContent']);
        Route::delete('/unenroll_student/{classroom_id}', [BatchController::class, 'unenrollStudent']);
        Route::get('/approve_student/{id}', [BatchController::class, 'approveStudent']);
        Route::get('/disapprove_student/{id}', [BatchController::class, 'disapproveStudent']);
        Route::get('batch_student_progress/{classroom_id}', [BatchController::class, 'batchStudentProgress']);
        Route::post('/add_student_batch', [BatchController::class, 'addStudentBatch']);
        Route::post('/form/batches', [BatchController::class, 'getBatches']);
        Route::get('/review_quiz/{classroom_id}/{content_id}', [BatchController::class, 'reviewQuiz']);
        Route::post('/submit_quiz_result/{classroom_id}/{content_id}', [BatchController::class, 'submitQuizResult']);
    });

    // --------------- Registration Management -------------------
    Route::resource('registration', StudentRegistrationController::class);
    
    // Resource Management
    Route::resource('resource', ResourceController::class);
    Route::get('resource/{id}/download', [ResourceController::class, 'getDownload']);

});