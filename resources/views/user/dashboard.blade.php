<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Welcome, {{ $user->name }}</h4>
                        <small>{{ now()->format('l, F j, Y') }}</small>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center mb-3">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=120&background=random"
                                     class="rounded-circle shadow-sm"
                                     alt="User Avatar">
                                <h5 class="mt-3">{{ $user->name }}</h5>
                                <p class="text-muted">{{ $user->email }}</p>
                            </div>

                            <div class="col-md-8">
                                <h5 class="mb-3">Account Details</h5>
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
                                    <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                                    <li class="list-group-item"><strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}</li>
                                    <li class="list-group-item"><strong>Joined:</strong> {{ $user->created_at->format('d M Y') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
