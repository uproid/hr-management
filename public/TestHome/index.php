<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API Test Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function api(obj) {
            var data = $(obj).attr("data");
            var hasData = data !== undefined;
            var method = $(obj).attr("method");
            var postvalue = {};
            var endpoint = $(obj).attr("endpoint");

            if (method === "POST") {
                var datas = data.split(",");
                for (var d of datas) {
                    postvalue[d] = prompt(d, "");
                }
            } else {
                if (data.length > 1) {
                    var datas = data.split(",");
                    for (var d of datas) {
                        endpoint += "/" + prompt(d, "");
                    }
                }
            }

            getData(endpoint, postvalue, method, jobes_update);
        }

        function getData(endpoint, data, type, event) {
            var url = "http://127.0.0.1:8000/api/" + endpoint + "/?api_token=1234";
            $.ajax({
                type: type,
                url: url,
                data: data,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (data) {
                    event(data);
                },
            });
        }

        function jobes_update(data) {
            var rows = data.data;
            $("#table").html("");
            if (rows instanceof Array) {
                for (var row of rows) {
                    printtable(row);
                }
            } else {
                printtable(rows);
            }
        }

        function printtable(row) {
            var tr = $("<tr></tr>");

            Object.entries(row).forEach(entry => {
                const [key, value] = entry;
                tr.append("<td>" + value + "</td>");
            });

            $("#table").append(tr);
        }
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <H1>API Test !</H1>
        <hr/>
        <div class="container">
            <button onclick="api(this)" method="GET" endpoint="employee" data="id" class="btn btn-primary btn-sm">
                Employee
            </button>
            <button onclick="api(this)" method="GET" endpoint="employee" data="" class="btn btn-primary btn-sm">
                Employees
            </button>
            <button onclick="api(this)" method="GET" endpoint="jobs" data="" class="btn btn-primary btn-sm">
                Jobs
            </button>
            <button onclick="api(this)" method="GET" endpoint="jobs" data="id" class="btn btn-primary btn-sm">
                Job
            </button>
            <button onclick="api(this)" method="GET" endpoint="jobs/max_salary" data="salary" class="btn btn-primary btn-sm">
                Max Salary
            </button>
            <button onclick="api(this)" method="GET" endpoint="jobs/min_salary" data="salary" class="btn btn-primary btn-sm">
                Min Salary
            </button>
            <button onclick="api(this)" method="GET" endpoint="departments" data="" class="btn btn-primary btn-sm">
                Departments
            </button>
            <button onclick="api(this)" method="GET" endpoint="departments" data="id" class="btn btn-primary btn-sm">
                Department
            </button>
        </div>
    </div>
    <hr/>
    <table style="width: 100%">
        <tbody id="table">
        </tbody>
    </table>
</div>

<!-- Scripts{ -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
<!-- } Scripts -->
</body>
</html>
