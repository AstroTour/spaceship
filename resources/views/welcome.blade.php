<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AstroTour admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        <div class="container mt-5">
            <h1 class="text-center">Felhasználók Listája</h1>

            <table class="table table-bordered table-striped mt-4">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Felhasználónév</th>
                    <th>Email</th>
                    <th>Jogosultság</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form method="POST" action="{{ route('users.update-role', $user->id) }}">
                                @csrf
                                <div class="input-group">
                                    <select name="role" class="form-select">
                                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm">Mentés</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nincsenek felhasználók.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="container mt-5">
            <h2 class="text-center">Menetrend</h2>
            <form action="{{ route('schedule.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="departure_time" class="form-label">Indul:</label>
                        <input type="datetime-local" name="departure_time" id="departure_time" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="arrival_time" class="form-label">Érkezik:</label>
                        <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="goes_back" class="form-label">Vissza indul:</label>
                        <input type="datetime-local" name="goes_back" id="goes_back" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="comes_back" class="form-label">Vissza érkezik:</label>
                        <input type="datetime-local" name="comes_back" id="comes_back" class="form-control" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <label for="flight_id" class="form-label">Járat:</label>
                        <select name="flight_id" id="flight_id" class="form-control" required>
                            <option value="" selected disabled>Válassz egy járatot</option>
                            @foreach($flights as $flight)
                                <option value="{{ $flight->id }}">{{ $flight->flight_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Létrehozás</button>
            </form>
        </div>

</body>
</html>
