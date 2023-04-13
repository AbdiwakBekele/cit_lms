<!DOCTYPE html>
<html>

    <head>
        <title>Editable Div</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        #editor {
            border: 1px solid #ccc;
            padding: 5px;
            min-height: 100px;
        }

        ul {
            list-style-type: none;
            margin-left: 20px;
        }

        li:before {
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

    <body>
        <div class="m-3">
            <button class='btn btn-light m-1' onclick="execCmd('bold')"><b>B</b></button>
            <button class='btn btn-light m-1' onclick="execCmd('italic')"><i>I</i></button>
            <button class='btn btn-light m-1' onclick="execCmd('underline')"><u>U</u></button>
            <button class='btn btn-light m-1' onclick="execCmd('insertUnorderedList')"><b>&#8226;</b></button>

            <button class='btn btn-light m-1' onclick="insertTable()">Insert Table</button>

            <button class='btn btn-light m-1' onclick="execCmd('justifyLeft')"><b><i class="fa fa-align-left"
                        aria-hidden="true"></i></b></button>
            <button class='btn btn-light m-1' onclick="execCmd('justifyCenter')"><b><i class="fa fa-align-center"
                        aria-hidden="true"></i></b></button>
            <button class='btn btn-light m-1' onclick="execCmd('justifyRight')"><b><i class="fa fa-align-right"
                        aria-hidden="true"></i></b></button>
            <button class='btn btn-light m-1' onclick="execCmd('justifyFull')"><b><i class="fa fa-align-justify"
                        aria-hidden="true"></i></b></button>

            <select class="p-1 m-1" onchange="execCmd('formatBlock', this.value)">
                <option value="H1">Header 1</option>
                <option value="H2">Header 2</option>
                <option value="p">Normal</option>
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
        <div class="mx-3 w-75" id="editor" contenteditable="true"></div>
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
        </script>
    </body>

</html>