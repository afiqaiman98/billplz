<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include custom CSS if needed -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        @section('header')
        <!-- Bootstrap Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between">
            <a href="@yield('previous-page-url', '#')" class="btn btn-light">
                <span class="mr-2">&larr;</span> Previous Question
            </a>
            <a class="navbar-brand mx-auto" href="/">Billplz Assignment</a>
            <a href="@yield('next-page-url', '#')" class="btn btn-light">
                 Next Question <span class="ml-2">&rarr;</span>
            </a>
        </nav>
        @show
    </header>

    <main class="container my-5 d-flex flex-column align-items-center justify-content-center" style="min-height: 70vh;">
        @yield('content')
    </main>

    <footer class="bg-light py-4">
        @section('footer')
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} Billplz Assignment</p>
        </div>
        @show
    </footer>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include custom JS if needed -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
