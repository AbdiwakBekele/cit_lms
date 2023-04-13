<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherCoordinatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\UserStudentController;
use App\Http\Controllers\StudentAuthManager;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\QuizController;

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

Route::get('/', [UserStudentController::class, 'index']);

Route::get('/about', [UserStudentController::class, 'about']);

Route::get('/events', [UserStudentController::class, 'events']);

Route::get('/event_single', [UserStudentController::class, 'eventSingle']);

Route::get('/instructors', [UserStudentController::class, 'instructors']);

Route::get('/blog', [UserStudentController::class, 'blog']);

Route::get('/contact', [UserStudentController::class, 'contact']);

/*
|--------------------------------------------------------------------------
| Student - Course                                        
|------------------------------------------------------------------------*/

Route::get('/course_list', [UserStudentController::class, 'courseList']);

Route::get('/course_single/{id}', [UserStudentController::class, 'courseSingle']);

Route::get('/my_course_single/{id}', [UserStudentController::class, 'myCourseSingle']);

Route::get('/enroll_course/{id}', [UserStudentController::class, 'enrollCourse']);

Route::post('/enroll_now', [UserStudentController::class, 'enrollNow']);

Route::get('/my_learning', [UserStudentController::class, 'myLearning']);

Route::get('/my_quiz/{section_id}', [UserStudentController::class, 'myQuiz']);

Route::post('/my_quiz', [UserStudentController::class, 'myQuizSubmit']);

Route::get('/my_final/{course_id}', [UserStudentController::class, 'myFinal']);

Route::post('/my_final', [UserStudentController::class, 'myFinalSubmit']);

Route::group(['middleware'=>'auth'], function(){
    // Route::post('/enroll_now', [UserStudentController::class, 'enrollNow']);
});

/*
|--------------------------------------------------------------------------
| Student Auth Manager                                       
|------------------------------------------------------------------------*/

Route::get('/student_login', [StudentAuthManager::class, 'login'] )->name('login');
Route::post('/student_login', [StudentAuthManager::class, 'loginPost'] );

Route::get('/student_register', [StudentAuthManager::class, 'register']);
Route::post('/student_register', [StudentAuthManager::class, 'registrationPost'] );

Route::get('/student_logout', [StudentAuthManager::class, 'logout']);


/*
|--------------------------------------------------------------------------
| Admin Entry - Left Menu                                         
|------------------------------------------------------------------------*/

Route::get('/admin', function () {
    return view('admin.adminDashboard');
});

Route::get('/adminDashboard', function () {
    return view('admin.adminDashboard');
});

Route::get('/adminTeacherAndCoordinator', function(){
    return view('admin.teacher.adminTeacherAndCoordinator');
});

Route::get('/registrarAndReception', function(){
    return view('admin.registrar.registrarAndReception');
});

Route::resource('courseCategory', CourseCategoryController::class);

Route::resource('course', CourseController::class);

Route::resource('user', UserController::class);

Route::resource('role', RoleController::class);

Route::resource('student', StudentController::class);

//-------------- Admin - Batch -------------/

Route::resource('batch', BatchController::class);

Route::get('/approve_student/{id}', [BatchController::class, 'approveStudent']);

Route::get('/disapprove_student/{id}', [BatchController::class, 'disapproveStudent']);

//-------------- Admin - Section -------------/

Route::resource('section', SectionController::class);

Route::get('/section/create_section/{id}', [SectionController::class, 'createSection'] );

//-------------- Admin - Quiz -------------/

Route::resource('quiz', QuizController::class);

Route::get('/quiz/create_quiz/{course_id}/{section_id}', [QuizController::class, 'createQuiz']);

//-------------- Admin - Section Content -------------/

Route::resource('content', ContentController::class);

Route::get('/content/create_content/{id}', [ContentController::class, 'createContent'] );

Route::get('/content/create_resource/{course_id}/{content_id}', [ContentController::class, 'createResource'] );

Route::post('/content/store_resource', [ContentController::class, 'storeResource'] );

//-------------- Admin - Teacher -------------/

Route::resource('teacher', TeacherController::class);

Route::resource('teacherCoordinator', TeacherCoordinatorController::class);

Route::resource('resource', ResourceController::class);

Route::get('resource/{id}/download', [ResourceController::class, 'getDownload']);

Route::resource('registrar', RegistrarController::class);

Route::resource('reception', ReceptionController::class);