<!DOCTYPE html>
<html>
<head>
    <title>View Race: {{ $race->name }}</title>
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
            position: relative;
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
            padding-left: 0;
        }
        .race-info ul li {
            color: #555;
            margin-bottom: 5px;
            list-style: none;
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
        .position {
            font-weight: bold;
            font-size: 1.1em;
        }
        .flag-img {
            position: absolute;
            top: 20px;
            right: 20px;
            max-width: 100px; /* Updated max-width */
            max-height: 100px; /* Updated max-height */
        }
    </style>
</head>
<body>
    <h1>{{ $race->name }}</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="race-info">
                    <h2>Race Information</h2>
                    <p>Date: {{ $race->date }}</p>
                    <p>Location: {{ $race->location }}</p>
                    @if(file_exists(public_path('images/flags/' . strtolower($race->location) . '.png')))
                        <img src="{{ asset('images/flags/' . strtolower($race->location) . '.png') }}" alt="{{ $race->location }}" class="flag-img">
                    @endif
                    <p>Round Number: {{ $race->round_number }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="race-info">
                    <h2>Drivers and Positions</h2>
                    <ul>
                        @foreach ($racePositions as $key => $racePosition)
                            <li class="{{ $key < 3 ? 'podium ' . ($key == 0 ? 'first-place' : ($key == 1 ? 'second-place' : 'third-place')) : '' }}">
                                <span class="position">{{ $racePosition->position }}</span> - {{ $racePosition->driver->name }} {{ $racePosition->driver->surname }} - {{ $racePosition->driver->team->name }}
                                @if ($key < 10 && [25, 18, 15, 12, 10, 8, 6, 4, 2, 1][$key] > 0)
                                    <span class="points">{{ [25, 18, 15, 12, 10, 8, 6, 4, 2, 1][$key] }} points</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <button class="home-button" onclick="goToHome()">Home</button>

    <script>
        function goToHome() {
            window.location.href = '/';
        }
    </script>
</body>
</html>
