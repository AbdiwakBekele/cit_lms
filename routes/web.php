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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Models\Student;
Route::get('/test_student', function () {
    Student::factory()->times(10)->create();

    return 'Student created successfully!';
});


Route::get('/', [UserStudentController::class, 'index']);

Route::get('/about', [UserStudentController::class, 'about']);

Route::get('/events', [UserStudentController::class, 'events']);

Route::get('/event_single', [UserStudentController::class, 'eventSingle']);

Route::get('/instructors', [UserStudentController::class, 'instructors']);

Route::get('/blog', [UserStudentController::class, 'blog']);

Route::get('/contact', [UserStudentController::class, 'contact']);

/*
|--------------------------------------------------------------------------
| Student Auth Manager                                       
|------------------------------------------------------------------------*/

Route::get('/student_login', [StudentAuthManager::class, 'login'] )->name('student.login');
Route::post('/student_login', [StudentAuthManager::class, 'loginPost'] );

Route::get('/student_register', [StudentAuthManager::class, 'register']);
Route::post('/student_register', [StudentAuthManager::class, 'registrationPost'] );

Route::get('/student_logout', [StudentAuthManager::class, 'logout']);

/*
|--------------------------------------------------------------------------
| Student - Course                                        
|------------------------------------------------------------------------*/

Route::get('/course_list', [UserStudentController::class, 'courseList']);

Route::get('/course_single/{id}', [UserStudentController::class, 'courseSingle']);


Route::group(['middleware' => ['student']], function () {
    
    Route::get('/my_course_single/{course_id}/{classroom_id}', [UserStudentController::class, 'myCourseSingle']);

    Route::get('/enroll_course/{id}', [UserStudentController::class, 'enrollCourse']);

    Route::post('/enroll_now', [UserStudentController::class, 'enrollNow']);

    Route::get('/my_learning', [UserStudentController::class, 'myLearning']);

    Route::get('/my_quiz/{section_id}', [UserStudentController::class, 'myQuiz']);

    Route::post('/my_quiz', [UserStudentController::class, 'myQuizSubmit']);

    Route::get('/my_final/{course_id}', [UserStudentController::class, 'myFinal']);

    Route::post('/my_final', [UserStudentController::class, 'myFinalSubmit']);
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

/*
|--------------------------------------------------------------------------
| Admin Entry - Left Menu                                         
|------------------------------------------------------------------------*/

Route::group(['middleware'=> ['auth']], function(){
    // Route::post('/enroll_now', [UserStudentController::class, 'enrollNow']);

    Route::get('/admin', [AdminController::class, 'index']);

    Route::resource('courseCategory', CourseCategoryController::class)->middleware('permission:manage category');

    //-------------- Admin - Section -------------/
    Route::group( ['middleware'=> ['permission:manage course']], function(){
        Route::resource('course', CourseController::class);
        Route::resource('section', SectionController::class);
        Route::get('/course/create_section/{id}', [CourseController::class, 'createSection'] );

    //-------------- Admin - Quiz -------------/
        Route::resource('quiz', QuizController::class);
        Route::get('/course/create_quiz/{course_id}/{section_id}', [QuizController::class, 'createQuiz']);

        //-------------- Admin - Content -------------/

        Route::resource('content', ContentController::class);
        Route::get('/course/create_content/{id}', [ContentController::class, 'createContent'] );
        Route::get('/course/create_resource/{course_id}/{content_id}', [ContentController::class, 'createResource'] );
        Route::post('/course/store_resource', [ContentController::class, 'storeResource'] );
    });


    Route::group( ['middleware'=>['permission:manage users']], function(){

        Route::resource('user', UserController::class);
        Route::post('/user/assign_role', [UserController::class, 'assignRole']);
        Route::get('/user/{user_id}/revoke_role/{role_id}', [UserController::class, 'revokeRole']);

        Route::post('/user/assign_permission', [UserController::class, 'assignPermission']);
        Route::get('/user/{user_id}/revoke_permission/{permission_id}', [UserController::class, 'revokePermission']);

    } );

    Route::group(['middleware'=>['permission:manage roles']], function(){
        Route::resource('role', RoleController::class);
        Route::post('/role/{role_id}/permission', [RoleController::class, 'assignPermission']);
        Route::get('/role/{role_id}/revoke_permission/{permission_id}', [RoleController::class, 'revokePermission']);
    });

    Route::group(['middleware'=>['permission:manage permissions']], function(){
        Route::resource('permission', PermissionController::class);
        Route::post('/permission/{permission_id}/role', [PermissionController::class, 'assignRole']);
        Route::get('/permission/{permission_id}/revoke_permission/{role_id}', [PermissionController::class, 'revokePermission']);
    });
    
    Route::resource('student', StudentController::class)->middleware('permission:manage students');

    //-------------- Admin - Batch -------------/

    Route::group( ['middleware'=> ['permission:manage batch']], function(){
        Route::resource('batch', BatchController::class);
        Route::get('/approve_student/{id}', [BatchController::class, 'approveStudent']);
        Route::get('/disapprove_student/{id}', [BatchController::class, 'disapproveStudent']);
    });

    

    // Resource Management
    Route::resource('resource', ResourceController::class);
    Route::get('resource/{id}/download', [ResourceController::class, 'getDownload']);

});