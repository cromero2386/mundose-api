<!DOCTYPE html>
<html>
<head>
    <title>MundosE.com</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .person {
            color: #333333;
            font-size: 18px;
            margin-bottom: 10px;
        }   
        .line {
            border-bottom: 1px solid #cccccc;
            margin-bottom: 20px;
        }
        .mje {
            color: #666666;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h5 class="person">{{ $details['name'] }}</h5>
        <p class="line"></p>
        <p class="mje">{{ $details['mje'] }}</p>
    </div>
</body>
</html>
