@extends('layouts.adminLayout')

@section('title', 'Dashboard - CTI')

@can('view dashboard')

@section('content')
<div class="page-content">

    <!-- Total's Row -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <!-- Total Students -->
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Students</p>
                            <h4 class="my-1 text-info">{{$students->count()}}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto">
                            <i class='fa fa-graduation-cap'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Courses -->
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Courses</p>
                            <h4 class="my-1 text-danger">{{ $courses->count()}}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto">
                            <i class='fa fa-book'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Category -->
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Categories</p>
                            <h4 class="my-1 text-success">{{ $categories->count() }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                            <i class='fa fa-clipboard'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total User -->
        <div class="col">
            <div class="card radius-10 border-start border-0 border-4 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Users</p>
                            <h4 class="my-1 text-warning"> {{ $users->count() }} </h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto">
                            <i class='bx bxs-group'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Student Enrollment Overview -->
        <div class="col-12 col-lg-8 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Student Enrolment</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
                        <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                style="color: #14abef"></i>Registered Student</span>
                        <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                style="color: #ffc107"></i>Enrolled Student</span>
                    </div>
                    <div class="chart-container-1">
                        <canvas id="chart1"></canvas>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
                    <div class="col">
                        <div class="p-3">
                            <h5 class="mb-0"> 20 </h5>
                            <small class="mb-0">Overall Registered Students </small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <h5 class="mb-0">10</h5>
                            <small class="mb-0">Overall Enrolled Students </small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <h5 class="mb-0">6</h5>
                            <small class="mb-0">Overall Graduated Students </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Student Enrollment Percentage -->
        <div class="col-12 col-lg-4 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Total Students Overview</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container-2">
                        <canvas id="chart2"></canvas>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li
                        class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                        On-Progress <span class="badge bg-success rounded-pill">25%</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        Graduated <span class="badge bg-danger rounded-pill">10%</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        Registered <span class="badge bg-primary rounded-pill">65%</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        Waitlist <span class="badge bg-warning text-dark rounded-pill">14%</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="card radius-10">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Recent Registed Courses</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Course Category</th>
                            <th>Course Price</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->course_name }}</td>

                            <td>{{ $course->short_name }}</td>

                            <td>{{ $course->courseCategory->category_name }}</td>

                            <td>{{ $course->course_price }}</td>

                            <td>{{ $course->created_at }}</td>

                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-lg-3">
        <!-- Active students-->
        <div class="col d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <p class="font-weight-bold mb-1 text-secondary">Weekly Active Users</p>
                    <div class="d-flex align-items-center mb-4">
                        <div>
                            <h4 class="mb-0">160</h4>
                        </div>
                        <div class="">
                            <p class="mb-0 align-self-center font-weight-bold text-success ms-2">4.4% <i
                                    class="bx bxs-up-arrow-alt mr-2"></i>
                            </p>
                        </div>
                    </div>
                    <div class="chart-container-0 mt-5">
                        <canvas id="chart3"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Orders Summary -->
        <div class="col d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Batch Summary</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container-1 mt-3">
                        <canvas id="chart4"></canvas>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li
                        class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">
                        Completed <span class="badge bg-gradient-quepal rounded-pill">25</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        Pending <span class="badge bg-gradient-ibiza rounded-pill">10</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        Process <span class="badge bg-gradient-deepblue rounded-pill">65</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Top selling category -->
        <div class="col d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Top Courses</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container-0">
                        <canvas id="chart5"></canvas>
                    </div>
                </div>
                <div class="row row-group border-top g-0">
                    <div class="col">
                        <div class="p-3 text-center">
                            <h4 class="mb-0 text-danger">59 Students</h4>
                            <p class="mb-0">Digital Marketing</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 text-center">
                            <h4 class="mb-0 text-success">45 Students</h4>
                            <p class="mb-0">Cyber Security</p>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>

    </div>
</div>

@endsection

@endcan