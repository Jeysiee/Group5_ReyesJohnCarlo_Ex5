<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 5</title>

    <style>
        body {
            background-image: url('img/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no repeat;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h2 {
            color: #333;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        #response {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #e9ecef;
            display: none;
        }

        .loading {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Welcome!</h2>
        <p>Please enter your name below:</p>

        <input type="text" id="name" placeholder="Enter your name here" />
        <button onclick="sendRequest()">Submit</button>
        
        <div id="response"></div> <!-- Response display area -->
        <div class="loading" id="loading">Loading...</div> <!-- Loading animation -->
    </div>

    <script>
        function sendRequest() {
            var name = document.getElementById("name").value.trim();
            var responseDiv = document.getElementById("response");
            var loadingDiv = document.getElementById("loading");


            name = name.replace(/\s+/g, ' ').trim();

            loadingDiv.style.display = "block";
            responseDiv.style.display = "none";  // Hide the response area

            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {

                    loadingDiv.style.display = "none";
                    responseDiv.innerHTML = this.responseText;
                    responseDiv.style.display = "block"; // Show the response area
                }
            };

            xhttp.open("GET", "process.php?name=" + encodeURIComponent(name), true);

            xhttp.setRequestHeader("X-Custom-Header", "CustomValue");
            xhttp.setRequestHeader("Content-Type", "application/json");

            xhttp.send();
        }
    </script>

</body>

</html>