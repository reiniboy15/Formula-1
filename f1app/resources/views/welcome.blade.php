<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formula 1</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/f1logo.png') }}">

    <style>
        
        body {
            padding-top: 5rem;
            text-align: center;
            background-color: #f8f9fa; 
        }
        .jumbotron {
            padding-top: 3rem;
            padding-bottom: 3rem;
            margin-bottom: 0;
            background-color: #343a40;
            color: #fff; 
        }
        .jumbotron h1 {
            font-weight: 300;
        }
        .carousel-item img {
            width: 100%;
            height: 400px; 
            object-fit: cover;
        }
        .carousel-caption {
            bottom: 2rem;
            z-index: 10;
            animation: fadeInUp 1s ease forwards;
            opacity: 0;
        }
        @keyframes fadeInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .btn-danger {
            background-color: #dc3545; 
            border-color: #dc3545;
            transition: all 0.3s ease;
            box-shadow: 0px 5px 15px rgba(220, 53, 69, 0.4); 
            font-weight: bold;
        }
        .btn-danger:hover, .btn-danger:focus {
            background-color: #c82333; 
            border-color: #bd2130;
            transform: translateY(-3px); 
            box-shadow: 0px 8px 20px rgba(220, 53, 69, 0.6); 
        }
        .latest-news {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            animation: slideInUp 1s ease forwards;
            opacity: 0;
        }
        @keyframes slideInUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .news-item {
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .news-item:hover {
            transform: scale(1.05);
        }
        .news-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .news-description {
            font-size: 16px;
            color: #555;
        }
        .news-link {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }
        .news-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">
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
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/images/Carousals/car8.png') }}" class="d-block w-100" alt="..." width="80" height="50">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Explore the World of Formula 1</h5>
                        <p>Experience the thrill of speed and competition.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/images/Carousals/car7.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Witness Unforgettable Moments</h5>
                        <p>From dramatic overtakes to championship celebrations.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/images/Carousals/car9.png') }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Feel the Passion of Motorsport</h5>
                        <p>Join millions of fans around the world in celebrating Formula 1.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-4">Welcome to the World of Formula 1</h1>
                    <p class="lead">Explore the latest news, races, teams, and drivers in the pinnacle of motorsport.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <button onclick="window.location='{{ route('races.completed') }}'" class="btn btn-danger btn-lg btn-block">Completed Races</button>
                </div>
                <div class="col-md-4">
                    <button onclick="window.location='{{ route('races.finished') }}'" class="btn btn-danger btn-lg btn-block">Finished Races</button>
                </div>
                <div class="col-md-4">
                    <button onclick="window.location='{{ route('race.index') }}'" class="btn btn-danger btn-lg btn-block">Upcoming Races</button>
                </div>
            </div>

            <div class="latest-news">
                <h2 class="mb-4">Latest News</h2>
                <div class="news-item">
                    <h3 class="news-title">Hamilton Wins Monaco Grand Prix</h3>
                    <p class="news-description">Lewis Hamilton secures victory in the prestigious Monaco Grand Prix, extending his lead in the championship.</p>
                    <!-- <a href="#" class="news-link">Read More</a> -->
                </div>
                <div class="news-item">
                    <h3 class="news-title">Red Bull Unveils New Car Design</h3>
                    <p class="news-description">Red Bull Racing reveals their latest car design for the upcoming season, aiming to challenge Mercedes for the title.</p>
                    <!-- <a href="#" class="news-link">Read More</a> -->
                </div>
            </div>
        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.latest-news').animate({opacity: '1'}, 1000);
        });
    </script>
</body>
</html>
