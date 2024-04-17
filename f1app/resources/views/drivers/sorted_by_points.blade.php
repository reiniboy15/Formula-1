<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers Standings</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/f1logo.png') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            background-image: linear-gradient(to right, #333 10%, #000 50%, #333 90%);
            background-size: cover;
            color: #333;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            padding: 20px;
            margin-bottom: 20px;
        }
        h1 {
            color: #fff;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 0;
            margin-bottom: 20px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }
        h2 {
            color: #dc3545;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .table {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            border: none;
            text-align: center;
            vertical-align: middle;
            font-weight: bold;
        }
        .home-button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 999;
        }
        .home-button:hover {
            background-color: #c82333;
        }
        .points {
            font-weight: bold;
            color: #333;
            background-color: #ddd;
            border-radius: 20px;
            padding: 5px 10px;
        }
        .team-name {
            font-size: 12px;
            color: #777;
            text-align: left; 
        }

        .driver-name {
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Drivers Standings</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h2>Formula 1 Drivers</h2>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th style="text-align: left;">Driver</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drivers as $key => $driver)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <div class="driver-name">{{ $driver->name }} {{ $driver->surname }}</div>
                                            <div class="team-name">{{ $driver->team->name }}</div>
                                        </td>
                                        <td><span class="points">{{ $driver->total_points }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <button class="home-button" onclick="goToHome()">Home</button>

    <script>
        function goToHome() {
            window.location.href = '/';
        }
    </script>
</body>
</html>
