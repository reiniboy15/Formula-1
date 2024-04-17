<!DOCTYPE html>
<html>
<head>
    <title>View Race</title>
 
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
        }
        .race-info {
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
        }
        .race-info p {
            color: #333;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .race-info ul {
            padding-left: 20px;
        }
        .race-info ul li {
            color: #555;
            margin-bottom: 5px;
            text-align: center;
        }
        .podium {
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }
        .first-place {
            background-color: #ffd700;
        }
        .second-place {
            background-color: #c0c0c0;
        }
        .third-place {
            background-color: #cd7f32;
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
            float: right;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <h1>Team Standings </h1>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="race-info">
                    <h2>Formula 1 Teams</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Total Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <td>{{ $team->name }}</td>
                                    <td>{{ $team->total_points }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
