<!DOCTYPE html>
<html>
<head>
    <title>Enter Driver Positions</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/f1logo.png') }}">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #1e1e1e; 
            color: #fff; 
            padding: 20px;
            text-align: center;
        }
        h1 {
            font-weight: 700;
            color: #dc3545; 
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            animation: fadeInDown 1s ease;
        }
        p {
            font-size: 18px;
            margin-bottom: 10px;
            animation: fadeIn 1s ease;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: slideInUp 1s ease;
        }
        label {
            font-size: 16px;
            color: #fff;
            margin-bottom: 5px;
        }
        select {
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border: 2px solid #dc3545;
            border-radius: 5px;
            background-color: #212529;
            color: #fff;
            appearance: none; 
            animation: fadeIn 1s ease;
        }
        select:focus {
            outline: none; 
            border-color: #dc3545; 
        }
        select.selected {
            border-color: #28a745 !important; 
        }
        button {
            background-color: #dc3545; 
            color: #fff; 
            border: none;
            border-radius: 5px;
            padding: 12px 30px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            animation: pulse 1s infinite alternate; 
        }
        button:hover {
            background-color: #c82333; 
        }

        .home-button {
            position: fixed;
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
            z-index: 999; 
            animation: fadeInLeft 1s ease;
        }
        .home-button:hover {
            background-color: #c82333; 
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            from {
                transform: scale(1);
            }
            to {
                transform: scale(1.05);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
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

        @keyframes selectedAnimation {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <h1>Enter Driver Positions for {{ $race->name }}</h1>
    <p>Date: {{ $race->date }}</p>
    <p>Location: {{ $race->location }}</p>
    <p>Round Number: {{ $race->round_number }}</p>
    <form method="POST" action="{{ route('races.storePositions', ['race' => $race->race_id]) }}">
        @csrf
        @foreach ($drivers as $driver)
            <label for="driver_{{ $driver->driver_id }}">{{ $driver->name }} {{ $driver->surname }}</label>
            <select id="driver_{{ $driver->driver_id }}" name="driver_{{ $driver->driver_id }}" class="position-input">
                <option value="">Select Position</option>
                @for ($i = 1; $i <= 20; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        @endforeach
        <button type="submit">Save Positions</button>
    </form>

    <button class="home-button" onclick="goToHome()">Home</button>

    <script>
        function goToHome() {
            window.location.href = '/';
        }

        const dropdowns = document.querySelectorAll('.position-input');

        dropdowns.forEach(dropdown => {
            dropdown.addEventListener('change', function() {
                if (dropdown.value !== '') {
                    dropdown.classList.add('selected');

                    dropdown.style.animation = 'selectedAnimation 1s ease-in-out';
                    dropdown.addEventListener('animationend', function() {
                        dropdown.style.animation = '';
                    });
                }
            });
        });
    </script>
</body>
</html>
