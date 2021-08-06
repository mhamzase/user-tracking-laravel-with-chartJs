<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href='https://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>

    <title>Users Joining Stats</title>
    <style>
        * {
            font-family: 'Karla', sans-serif;
        }

    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="display-4 fw-bold text-center mb-5">Overview Of New Users From Previews 7 Days</h1>

        <div class="mb-5">
            <canvas id="myChart"></canvas>
        </div>


        <h1 class="display-3 text-center mb-5 text-uppercase">Users List</h1>

        <table class="table table-striped table-dark" style="color:rgb(104, 209, 104)">
            <thead>
                <tr>
                    <th scope="col">SR #</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Joined At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('j F, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>




    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // === include 'setup' then 'config' above ===
        // var labels = [];

        const months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ]

        const days = [
            'Sun',
            'Mon',
            'Tue',
            'Wed',
            'Thu',
            'Fri',
            'Sat'
        ]


        function Last7Days() {
            var dates = [];
            for (var i = 6; i >= 0; i--) {
                var d = new Date();
                d.setDate(d.getDate() - i);

                const year = d.getFullYear()
                const monthName = months[d.getMonth()];
                const dayName = days[d.getDay()];

                dates.push(`${dayName} ${d.getDate()} ${monthName} ${year}`);
            }

            return (dates.join(','));
        }

        var str = Last7Days();
        var labels = str.split(',');


        
       
        var results = {{$usersCount}};
 
        const data = {
            labels: labels,
            datasets: [{
                label: 'Users',
                backgroundColor: 'green',
                borderColor: 'green',
                data: results.reverse(),
            }]
        };


        const config = {
            type: 'line',
            data,
            options: {}
        };


        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>


</body>

</html>
