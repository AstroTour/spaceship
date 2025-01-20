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
        <h1 class="text-center mt-5">Menetrend Létrehozása</h1>
        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf
            <div class="row mt-4">
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
                <div class="col-md-12">
                    <label for="flights_id" class="form-label">Járat:</label>
                    <select name="flights_id" id="flights_id" class="form-select" required>
                        <option value="" disabled selected>Válassz egy járatot...</option>
                        @foreach ($flights as $flight)
                            <option value="{{ $flight->id }}">{{ $flight->flight_number }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="btn btn-primary">Létrehozás</button>
            </div>
        </form>
        </div>


        <div class="mt-5">
            <h2>Menetrendek Listája</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered table-striped mt-4">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Indulási idő</th>
                    <th>Érkezési idő</th>
                    <th>Visszaindulás</th>
                    <th>Visszaérkezés</th>
                    <th>Járat ID</th>
                    <th>Művelet</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->id }}</td>
                        <td>{{ $schedule->departure_time }}</td>
                        <td>{{ $schedule->arrival_time }}</td>
                        <td>{{ $schedule->goes_back }}</td>
                        <td>{{ $schedule->comes_back }}</td>
                        <td>{{ $schedule->flights_id }}</td>
                        <td>
                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Biztosan törölni szeretnéd?')">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nincsenek menetrendek.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>






</body>
</html>
