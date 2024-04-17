<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Race</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/f1logo.png') }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            position: relative;
            animation: animateIn 0.5s ease-out forwards;
            opacity: 0;
            text-align: center; 
        }

        .f1-logo {
            margin-bottom: 20px; 
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 2em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            color: #666;
            font-weight: bold;
        }

        input {
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 8px;
            background-color: #f5f5f5;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s, background-color 0.3s;
        }

        input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.2);
            background-color: #fff;
        }

        button {
            padding: 15px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1em;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            text-align: center;
            color: #007bff;
            text-decoration: none;
            font-size: 0.9em;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }

        @keyframes animateIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/f1logo.png') }}" alt="F1 Logo" width="110" height="90">
        <h1 class="animate__animated animate__fadeInDown">Add Race</h1>

        <form method="POST" action="{{ route('races.store') }}" class="animate__animated animate__fadeInUp">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" name="name">

            <label for="date">Date</label>
            <input type="date" id="date" name="date">

            <label for="location">Location</label>
            <input type="text" id="location" name="location">

            <label for="round_number">Round Number</label>
            <input type="text" id="round_number" name="round_number">

            <button type="submit" class="animate__animated animate__fadeInUp">Submit</button>
            <a href="{{ route('race.index') }}" class="animate__animated animate__fadeInUp">Cancel</a>
        </form>
    </div>
</body>
</html>
