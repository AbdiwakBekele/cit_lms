@extends('layouts.adminLayout')

@section('title', 'Course Category - CTI')

@section('content')

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content-1">
        <div class="container-fluid">
            <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                Student Detail</h3>
        </div>

        <!-- User Form -->
        <div class="m-3 p-3 ">

            <a class="btn btn-warning m-4" href="/student/{{$student->id}}/edit"> Edit Info </a>

            <div class="row alert alert-primary ">
                <div class="col-lg">
                    <!-- Profile Image -->
                    @if($student->profile_img)
                    <img class="img-fluid" src=" {{ asset('student_profile/'.$student->profile_img) }} ">

                    @else
                    <img class="img-fluid" src=" {{ asset('images/AM2A1021.JPG') }} ">
                    @endif

                </div>
                <div class="col-lg-8">
                    <table class="table table-hover ">
                        <tr>
                            <th>Full name</th>
                            <td> {{$student->fullname}} </td>
                        </tr>

                        <tr>
                            <th>Email Address</th>
                            <td> {{$student->email}} </td>
                        </tr>

                        <tr>
                            <th>Age</th>
                            <td> {{$student->age}} </td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td> {{$student->phone}} </td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td> {{$student->address}} </td>
                        </tr>


                    </table>

                </div>

            </div>


            <a href="#" data-bs-toggle="modal" data-bs-target="#myModalStudent"
                class="btn btn-warning text-dark m-3">Assign to Course Batch</a>

            <!-- Modal | Deleting Section -->
            <div class="modal" id="myModalStudent">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal body -->
                        <div class="modal-body my-4 text-center h5">
                            <h3>Select Student</h3>

                            <form action="/add_student_batch" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="POST">
                                <input type="hidden" name="student_id" value="{{$student->id}}">
                                <div>
                                    <label for="course">Course:</label>
                                    <select id="course" name="course_id">
                                        @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="batch">Batch:</label>
                                    <select id="batch" name="batch_id">
                                        <!-- Options will be populated dynamically using JavaScript -->
                                    </select>
                                </div>

                                <input type="submit" class="btn btn-primary m-2" value="Select">
                                <button type="button" class="btn btn-light m-2" data-bs-dismiss="modal">Close</button>
                            </form>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer p-1">

                        </div>

                    </div>
                </div>
            </div>



            <div class="alert alert-primary">
                <strong>Enrolling Course</strong>

                @foreach($student->classrooms as $classroom)
                <div class="alert alert-light">
                    <strong>{{$classroom->course->course_name}} </strong>
                    <span> | {{$classroom->batch->shift}} shift</span>

                </div>

                @endforeach


            </div>




        </div>



    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.getElementById('course').addEventListener('change', function() {
    fetchBatches(this.value);
});

function fetchBatches(courseId) {
    fetch('/form/batches', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                course_id: courseId
            })
        })
        .then(response => response.json())
        .then(data => {
            const batchSelect = document.getElementById('batch');
            batchSelect.innerHTML = '';
            data.forEach(batch => {
                const option = document.createElement('option');
                option.value = batch.id;
                option.innerText = batch.shift;
                batchSelect.appendChild(option);
            });
        });
}
</script>

@endsection