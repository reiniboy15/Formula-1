<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finished Races</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/f1logo.png') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 5rem;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
            text-transform: uppercase;
        }
        .race-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
        }
        .race-card h3 {
            color: #dc3545;
            margin-top: 0;
        }
        .race-card p {
            margin-bottom: 10px;
        }
        .flag-img {
            position: absolute;
            top: 10px;
            right: 10px;
            max-width: 70px;
            max-height: 40px; 
        }
        .race-actions {
            text-align: right;
        }
        .btn {
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-primary:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
        }
        .home-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .home-link a {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }
        .home-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/f1logo.png') }}" alt="F1 Logo" width="80" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="{{ route('teams.index') }}" class="nav-link">Teams<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('teams.sortedByPoints') }}" class="nav-link">Team Standings<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('drivers.index') }}" class="nav-link">Drivers<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('drivers.sortedByPoints') }}" class="nav-link">Driver Standings<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <h1>Finished Races</h1>

    <div class="container">
        @foreach ($finishedRaces as $race)
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="race-card">
                        <h3>{{ $race->name }}</h3>
                        @if(file_exists(public_path('images/flags/' . strtolower($race->location) . '.png')))
                            <img src="{{ asset('images/flags/' . strtolower($race->location) . '.png') }}" alt="{{ $race->location }}" class="flag-img">
                        @endif
                        <p>Date: {{ $race->date }}</p>
                        <p>Location: {{ $race->location }}</p>
                        <p>Round Number: {{ $race->round_number }}</p>
                        <div class="race-actions">
                            <a href="{{ route('races.view', ['race' => $race->race_id]) }}" class="btn btn-primary">View <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
