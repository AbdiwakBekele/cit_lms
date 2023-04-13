<!DOCTYPE html>
<html>

    <head>
        <title>Editable Div</title>
        <style>
        #editor {
            border: 1px solid #ccc;
            padding: 5px;
            min-height: 100px;
        }

        #toolbar {
            margin-bottom: 5px;
        }

        button {
            margin-right: 5px;
        }

        ul {
            list-style-type: none;
            margin-left: 20px;
        }

        li:before {
            content: "\25CF";
            margin-right: 5px;
        }

        select {
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
        <div id="toolbar">
            <button onclick="execCmd('bold')"><b>B</b></button>
            <button onclick="execCmd('italic')"><i>I</i></button>
            <button onclick="execCmd('underline')"><u>U</u></button>
            <button onclick="execCmd('insertUnorderedList')"><b>&#8226;</b></button>
            <button onclick="execCmd('insertImage')">Insert Image</button>
            <button onclick="insertTable()">Insert Table</button>
            <select onchange="execCmd('formatBlock', this.value)">
                <option value="H1">Header 1</option>
                <option value="H2">Header 2</option>
                <option value="p">Normal</option>
            </select>
            <select onchange="execCmd('fontSize', this.value)">
                <option value="1">Size 1</option>
                <option value="2">Size 2</option>
                <option value="3">Size 3</option>
                <option value="4">Size 4</option>
                <option value="5">Size 5</option>
                <option value="6">Size 6</option>
                <option value="7">Size 7</option>
            </select>
            <button onclick="execCmd('justifyLeft')"><b>L</b></button>
            <button onclick="execCmd('justifyCenter')"><b>C</b></button>
            <button onclick="execCmd('justifyRight')"><b>R</b></button>
            <button onclick="execCmd('justifyFull')"><b>J</b></button>
        </div>
        <div id="editor" contenteditable="true"></div>
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
            var table = "<table border='1'>";
            for (var i = 0; i < rows; i++) {
                table += "<tr>";
                for (var j = 0; j < cols; j++) {
                    table += "<td></td>";
                }
                table += "</tr>";
            }
            table += "</table>";
            execCmd('insertHTML', table);
        }
        </script>
    </body>

</html>