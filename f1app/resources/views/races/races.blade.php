<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Races</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/f1logo.png') }}">

    <style>
        .race-card {
            background-color: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            animation: fadeIn 0.5s ease forwards;
            opacity: 0;
        }

        .race-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .race-card img {
            width: 100%;
            height: auto;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .race-card .card-body {
            padding: 20px;
        }

        .race-card .card-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .race-card .card-text {
            font-size: 16px;
            color: #555;
        }

        .race-card .btn {
            transition: all 0.3s ease-in-out;
        }

        .race-card .btn:hover {
            transform: scale(1.05);
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

        body {
            padding-top: 5rem;
            text-align: center;
            background-color: #f8f9fa; 
        }
        h1 {
            font-weight: 300;
        }
        .navbar-nav .nav-link {
            color: #fff; 
        }
        .f1-button {
            font-size: 1.2em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            border-radius: 8px;
            padding: 15px 30px;
            background-color: #dc3545; 
            color: #fff;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
            display: block; 
            margin: 0 auto; 
            margin-top: 20px; 
        }

        .f1-button:hover {
            transform: scale(1.1); 
        }

        .f1-button:active {
            transform: scale(0.95); 
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/f1logo.png') }}" alt="Your Logo" width="80" height="50">
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

    <main role="main">
        <div class="container">
            <h1 style="margin-top: 20px;">Upcoming Races</h1>

            Welcome to our Upcoming Races page, where you can explore the thrilling world of Formula 1 events scheduled for the near future. Discover the dates, locations, and details of upcoming races from around the globe. Get ready to immerse yourself in the excitement of Formula 1 as we countdown to the next thrilling race day. Explore the races below and mark your calendars for the most anticipated events in the world of motorsport.

            <div class="container" style="margin-top: 20px;">
                <div class="row">
                    @foreach ($races as $race)
                    <div class="col-md-4 mb-4">
                        <div class="race-card">
                        <img src="{{ asset('images/tracks/' . strtolower($race->location) . '.png') }}" alt="{{ $race->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $race->name }}</h5>
                                <p class="card-text">
                                    <strong>Date:</strong> {{ $race->date }}<br>
                                    <strong>Location:</strong> {{ $race->location }}<br>
                                    <strong>Round Number:</strong> {{ $race->round_number }}
                                </p>
                            </div>
                            <div class="card-footer bg-transparent border-0 text-right">
                            <button type="button" class="btn btn-sm btn-outline-success complete-race" 
        data-toggle="modal" data-target="#completeRaceModal" 
        data-race-id="{{ $race->race_id }}">
    <i class="fas fa-check-circle"></i> Complete Race
</button>
                                <form method="POST" action="{{ route('races.complete', ['race' => $race->race_id]) }}" style="display: none;" data-race-id="{{ $race->race_id }}">
                                    @csrf
                                    @method('PUT')
                
                                    <button type="submit" id="completeFormSubmit"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                <button onclick="window.location='{{ route('races.create') }}'" class="btn btn-primary f1-button mb-4">Create Race</button>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<div class="modal fade" id="completeRaceModal" tabindex="-1" role="dialog" aria-labelledby="completeRaceModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="completeRaceModalLabel">Confirm Completion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to mark this race as completed?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" id="confirmComplete">Yes, Complete Race</button>
      </div>
    </div>
  </div>
</div>

<script>
 document.addEventListener('DOMContentLoaded', function () {
        const completeRaceModal = document.getElementById('completeRaceModal');
        const confirmCompleteButton = document.getElementById('confirmComplete');

        $('.complete-race').click(function () {

            $(completeRaceModal).modal('show');
    
            const raceId = $(this).data('race-id');

            confirmCompleteButton.setAttribute('data-race-id', raceId);
        });

    
        confirmCompleteButton.addEventListener('click', function () {

            const raceId = this.getAttribute('data-race-id');

            document.querySelector('form[data-race-id="' + raceId + '"]').submit();
        });
    });
</script>
