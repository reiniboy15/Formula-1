<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/f1logo.png') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            position: relative;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            margin-bottom: 40px;
        }
        .card:last-child {
            margin-bottom: 0;
        }
        h1 {
            color: #dc3545;
            text-align: center;
            margin-bottom: 30px;
        }
        .driver-name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .driver-details {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .fa {
            margin-right: 5px;
            color: #777;
        }
        .profile-picture-container {
            display: flex;
            justify-content: center;
        }
        .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
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
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 999;
        }
        .home-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <button class="home-button animate__animated animate__fadeIn" onclick="goToHome()"><i class="fas fa-home"></i> Home</button>
    <h1>Drivers</h1>
    <div class="container">
        @foreach ($drivers as $driver)
            <div class="card animate__animated animate__fadeIn">
                <div class="profile-picture-container">
                    <img src="images/drivers/{{ $driver->name }}.png" alt="{{ $driver->name }}" class="profile-picture">
                </div>
                <div class="driver-name">{{ $driver->name }} {{ $driver->surname }}</div>
                <div class="driver-details"><i class="fas fa-globe"></i>Nationality: {{ $driver->nationality }}</div>
                <div class="driver-details"><i class="fas fa-birthday-cake"></i>Date of Birth: {{ $driver->date_of_birth }}</div>
                <div class="driver-details"><i class="fas fa-trophy"></i>Total Points: {{ $driver->total_points }}</div>
                <div class="driver-details"><i class="fas fa-car"></i>Team: {{ $driver->team->name }}</div>
            </div>
        @endforeach
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <script>
        function goToHome() {
            window.location.href = '/';
        }
    </script>
</body>
</html>
