<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Table - Brand</title>
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
        #editor {
            border: 1px solid #ccc;
            padding: 5px;
            min-height: 200px;
            color: black;
        }


        #editor ul {
            list-style-type: none;
            margin-left: 20px;
        }

        #editor li:before {
            content: "\2022";
            margin-right: 5px;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 15px;
        }

        th {
            background-color: #f2f2f2;
        }

        .table-size-input {
            width: 50px;
        }
        </style>
    </head>

    <body id="page-top">
        <div id="wrapper">
            <div class="text-primary bg-primary"
                style="width: 40px;background: #D9D9D9;--bs-primary: #D9D9D9;--bs-primary-rgb: 217,217,217;"></div>
            <nav class="navbar navbar-dark bg-primary align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
                style="color: #D9D9D9;background: #D9D9D9;text-align: center;--bs-primary: #D9D9D9;--bs-primary-rgb: 217,217,217;position: relative;">
                <div class="container-fluid d-flex flex-column p-0"><a
                        class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#"
                        style="background: #D9D9D9;">
                        <div class="sidebar-brand-icon rotate-n-15" style="background: #D9D9D9;"></div><img
                            class="img-fluid" src="../../assets/img/logo11-1@2x.png" width="150" height="59">
                        <div class="sidebar-brand-text mx-3" style="background: #D9D9D9;"></div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <!-- left Menu -->
                    <ul class="navbar-nav text-light" id="accordionSidebar-1" style="background: #D9D9D9;">
                        <li class="nav-item" style="color: var(--bs-secondary);background: var(--bs-accordion-bg);">
                        </li>

                        <li class="nav-item">
                            <!-- Dashboard -->
                            <a class="nav-link" href="/admin">
                                <i class="fas fa-th-large"
                                    style="color: #16416E;font-size: 19px;margin: 0px 15px 0px 0px;width: 19px;">
                                </i>
                                <span style="color: #16416E;font-size: 14px;font-weight: bold;">Dashboard</span>
                            </a>
                            <!-- Course Category -->
                            <a class="nav-link" href="/courseCategory">
                                <i class="fas fa-bookmark"
                                    style="color: #16416E;font-size: 19px;margin: 0px 15px 0px 0px;width: 19px;">
                                </i>
                                <span style="color: #16416E;font-size: 14px;font-weight: bold;">Course Category</span>
                            </a>
                            <!-- Course Management -->
                            <a class="nav-link text-start bg-white active" href="/course"
                                style="color: #FFB600;background: var(--bs-white);">
                                <i class="fab fa-creative-commons-sampling"
                                    style="color: #FFB600;font-size: 19px;margin: 0px 15px 0px 0px;">
                                </i>
                                <span style="font-size: 14px;color: rgb(255, 182, 0);">Course Management</span>
                            </a>
                            <!-- Resource Managment -->
                            <a class="nav-link" href="/resource"><i class="fas fa-trash-restore-alt"
                                    style="color: #16416E;font-size: 19px;margin: 0px 15px 0px 0px;width: 19px;"></i><span
                                    style="color: #16416E;font-size: 14px;font-weight: bold;">Resource Management</span>
                            </a>
                        </li>
                        <!-- Student Managment -->
                        <li class="nav-item">
                            <a class="nav-link" href="/student" style="font-size: 14.6px;font-weight: bold;">
                                <i class="fas fa-user-alt"
                                    style="color: #16416E;font-size: 19px;margin: 0px 15px 0px 0px;">
                                </i>
                                <span style="color: #16416E;font-size: 14px;">Student Management</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <!-- Teacher Managment -->
                            <a class="nav-link" href="/teacher">
                                <i class="fas fa-chalkboard-teacher"
                                    style="font-size: 19px;color: #16416E;font-weight: bold;margin: 0px 15px 0px 0px;width: 19px;">
                                </i>
                                <span style="color: #16416E;font-size: 14px;font-weight: bold;">Teacher
                                    Management</span>
                            </a>
                            <!-- Teacher Coordinator -->
                            <a class="nav-link" href="/teacherCoordinator">
                                <i class="fas fa-coins"
                                    style="font-size: 19px;color: #16416E;font-weight: bold;margin: 0px 15px 0px 0px;width: 19px;">
                                </i>
                                <span style="color: #16416E;font-size: 14px;font-weight: bold;">Teacher
                                    Coordinator</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <!-- Registrar Management -->
                            <a class="nav-link" href="/registrar">
                                <i class="far fa-sticky-note"
                                    style="color: #16416E;font-size: 19px;width: 19px;margin: 0px 15px 0px 0px;font-weight: bold;">
                                </i>
                                <span style="color: #16416E;font-size: 14px;font-weight: bold;">Registrar
                                    Management</span>
                            </a>
                            <!-- Reception Managment -->
                            <a class="nav-link" href="/reception">
                                <i class="fas fa-receipt"
                                    style="color: #16416E;font-size: 19px;width: 19px;margin: 0px 15px 0px 0px;font-weight: bold;"></i><span
                                    style="color: #16416E;font-size: 14px;font-weight: bold;">Reception
                                    Management</span>
                            </a>
                            <!-- Role Managment -->
                            <a class="nav-link" href="/role"><i class="fas fa-star-of-life"
                                    style="color: #16416E;font-size: 19px;width: 19px;margin: 0px 15px 0px 0px;font-weight: bold;"></i><span
                                    style="color: #16416E;font-size: 14px;font-weight: bold;">Role
                                    Management</span></a>
                            <!-- Site Administrator -->
                            <a class="nav-link" href="/site" style="color: #16416E;">
                                <i class="far fa-calendar-minus"
                                    style="color: #16416E;font-size: 19px;width: 19px;margin: 0px 15px 0px 0px;font-weight: bold;"></i>
                                <span style="color: #16416E;font-size: 14px;font-weight: bold;">Site
                                    Administrator</span>
                            </a>
                            <!-- Event Managment -->
                            <a class="nav-link" href="/event"><i class="far fa-calendar"
                                    style="color: #16416E;font-size: 19px;width: 19px;margin: 0px 15px 0px 0px;font-weight: bold;"></i><span
                                    style="color: #16416E;font-size: 14px;font-weight: bold;">Events
                                    Management</span>
                            </a>
                            <!-- Notifications -->
                            <a class="nav-link" href="/notification"><i class="far fa-bell"
                                    style="color: #16416E;font-size: 19px;width: 19px;margin: 0px 15px 0px 0px;font-weight: bold;"></i><span
                                    style="color: #16416E;font-size: 14px;font-weight: bold;">Notification</span>
                            </a>
                            <!-- Reports -->
                            <a class="nav-link" href="/report"><i class="fas fa-file-prescription"
                                    style="color: #16416E;font-size: 19px;width: 19px;margin: 0px 15px 0px 0px;font-weight: bold;"></i><span
                                    style="color: #16416E;font-size: 14px;font-weight: bold;">Report</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <div class="container-fluid">
                        <h3 class="mb-4" style="margin: 26px;color: #16416E;font-size: 35px;font-weight: bold;">
                            Add Section Content</h3>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block m-3">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block m-3">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <div class="container">

                        <form action="/content" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="section_id" value="{{$section->id}}">
                            <!-- Section Name -->
                            <div class="mb-3 mt-3">
                                <label for="content_name" class="form-label">Content Title</label>
                                <input type="text" class="form-control" id="content_name"
                                    placeholder="Enter Content Title" name="content_name">
                                @error('content_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Course Desciption -->
                            <div class="my-3 bg-white px-3 py-1 rounded">
                                <div class="m-3">
                                    <button type="button" class='btn btn-light m-1'
                                        onclick="execCmd('bold')"><b>B</b></button>
                                    <button type="button" class='btn btn-light m-1'
                                        onclick="execCmd('italic')"><i>I</i></button>
                                    <button type="button" class='btn btn-light m-1'
                                        onclick="execCmd('underline')"><u>U</u></button>
                                    <button type="button" class='btn btn-light m-1'
                                        onclick="execCmd('insertUnorderedList')"><b>&#8226;</b></button>

                                    <button type="button" class='btn btn-light m-1' onclick="insertTable()">Insert
                                        Table</button>

                                    <button type="button" class='btn btn-light m-1'
                                        onclick="execCmd('justifyLeft')"><b><i class="fa fa-align-left"
                                                aria-hidden="true"></i></b></button>
                                    <button type="button" class='btn btn-light m-1'
                                        onclick="execCmd('justifyCenter')"><b><i class="fa fa-align-center"
                                                aria-hidden="true"></i></b></button>
                                    <button type="button" class='btn btn-light m-1'
                                        onclick="execCmd('justifyRight')"><b><i class="fa fa-align-right"
                                                aria-hidden="true"></i></b></button>
                                    <button type="button" class='btn btn-light m-1'
                                        onclick="execCmd('justifyFull')"><b><i class="fa fa-align-justify"
                                                aria-hidden="true"></i></b></button>

                                    <select class="p-1 m-1" onchange="execCmd('formatBlock', this.value)">
                                        <option value="p">Normal</option>
                                        <option value="H1">Header 1</option>
                                        <option value="H2">Header 2</option>

                                    </select>

                                    <select class="p-1 m-1" onchange="execCmd('fontSize', this.value)">
                                        <option value="1">8</option>
                                        <option value="2">10</option>
                                        <option value="3" selected>12</option>
                                        <option value="4">14</option>
                                        <option value="5">16</option>
                                        <option value="6">18</option>
                                        <option value="7">20</option>
                                    </select>

                                </div>

                                <!-- Editable Content -->
                                <input type="hidden" name="description" id="description">

                                <div class="mx-3" id="editor" contenteditable="true"></div>

                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <input type="submit" class="btn btn-warning btn-lg">
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/theme.js"></script>
        <script>
        function execCmd(command, arg = null) {
            if (arg) {
                document.execCommand(command, false, arg);
            } else {
                document.execCommand(command, false, null);
            }
        }

        function insertTable() {
            var rows = prompt("Enter number of rows", "2");
            var cols = prompt("Enter number of columns", "2");
            var table = "<table style='border: 1px solid black'>";
            for (var i = 0; i < rows; i++) {
                table += "<tr>";
                for (var j = 0; j < cols; j++) {
                    table += "<td></td>";
                }
                table += "</tr>";
            }
            table += "</table>";
            // execCmd('insertHTML', table);
            document.getElementById('editor').insertAdjacentHTML('beforeend', table);
        }

        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();
            var editor = document.getElementById('editor');
            var content = editor.innerHTML;
            document.getElementById('description').value = content;
            this.submit();
        });
        </script>
    </body>

</html>