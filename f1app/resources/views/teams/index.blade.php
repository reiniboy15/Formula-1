<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formula 1 Teams</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/f1logo.png') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #F9F9F9, #ECECEC);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            width: 100%;
            padding: 20px;
            background: linear-gradient(to right, #ffffff, #f8f8f8);
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            animation: fadeInUp 0.6s ease forwards;
        }
        h1 {
            color: #dc3545;
            text-align: center;
            margin-bottom: 30px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 30px;
            padding: 20px;
            background: linear-gradient(to right, #ffffff, #f8f8f8);
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        li:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .team-name {
            font-size: 24px;
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .details {
            font-size: 18px;
            color: #555;
            margin-bottom: 8px;
        }
        .team-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .animate__animated {
            animation-duration: 0.6s;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .home-button {
            position: absolute;
            top: 20px;
            left: 20px;
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
            animation: fadeInLeft 0.6s ease forwards;
        }
        .home-button:hover {
            background-color: #c82333;
        }
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <button class="home-button animate__animated animate__fadeInLeft" onclick="goToHome()">Home</button>
    <div class="container animate__animated animate__fadeInUp">
        <h1>Formula 1 Teams</h1>
        <ul>
            <?php foreach ($teams as $team): ?>
                <li>
                    <div class="team-name"><?php echo $team->name; ?></div>
                    <img src="images/teams/<?php echo $team->name; ?>.png" alt="<?php echo $team->name; ?>" class="team-image" width="70" height="100">
                    <div class="details">Nationality: <?php echo $team->nationality; ?></div>
                    <div class="details">Total Points: <?php echo $team->total_points; ?></div>
                    <div class="details">Team Principal: <?php echo $team->team_principle; ?></div>
                    <div class="details">Power Unit: <?php echo $team->power_unit; ?></div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script>
        function goToHome() {
            window.location.href = '/';
        }
    </script>
</body>
</html>
