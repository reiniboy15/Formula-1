<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Races</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/f1logo.png') }}">
    <style>
        body {
            padding-top: 5rem;
            text-align: center;
            background-color: #f8f9fa;
        }
        h1 {
            font-weight: 300;
        }
        .logo {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #343a40;
            color: #fff;
        }
        td {
            background-color: #fff;
            transition: background-color 0.3s ease;
        }
        tr:hover td {
            background-color: #f8f9fa;
        }
        button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #c82333;
        }
        button:focus {
            outline: none;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .navbar {
            padding: 0.5rem 1rem;
        }
        .navbar-brand img {
            width: 80px;
            height: 50px;
        }
        .navbar-nav .nav-link {
            color: #fff;
            margin-right: 10px;
        }
        .navbar-nav .nav-link:hover {
            color: #ccc;
        }
        .flag-img {
            max-width: 50px;
            max-height: 30px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('images/f1logo.png') }}" alt="F1 Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('teams.index') }}">Teams</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('teams.sortedByPoints') }}">Team Standings</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('drivers.index') }}">Drivers</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('drivers.sortedByPoints') }}">Driver Standings</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="logo">
        <img src="{{ asset('images/f1logo.png') }}" alt="F1 Logo" width="100" height="90">
    </div>
    <h1>Completed Races</h1>
    <table>
        <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Date</th>
            <th>Location</th>
            <th>Round Number</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($completedRaces as $race)
            <tr>
            <td>
                    @if(file_exists(public_path('images/flags/' . strtolower($race->location) . '.png')))
                        <img src="{{ asset('images/flags/' . strtolower($race->location) . '.png') }}" alt="{{ $race->location }}" class="flag-img">
                    @else
                        Not Available
                    @endif
                </td>
                <td>{{ $race->name }}</td>
                <td>{{ $race->date }}</td>
                <td>{{ $race->location }}</td>
                <td>{{ $race->round_number }}</td>
                <td><button onclick="window.location='{{ route('races.enterPositions', ['race' => $race->race_id]) }}'">Enter Driver Positions</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
