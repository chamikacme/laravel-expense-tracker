<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expense Tracker</title>
    <link rel="icon" type="image/x-icon" href="https://img.icons8.com/ultraviolet/40/us-dollar-circled.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        .bg-repeat {
            background-image: url("https://img.icons8.com/ultraviolet/240/us-dollar-circled.png");
            background-repeat: repeat-xy;
        }
    </style>
</head>

<body>
    <div class="bg-primary-subtle h-100 w-100 position-absolute top-0 start-0"></div>
    <div>
        <x-navbar />
    </div>
    <main class="">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</body>

</html>
