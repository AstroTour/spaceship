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
                    <th>Jelszó</th>
                    <th>Jogosultság</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
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

        <h2 class="text-center">Menetrend</h2>
        <div class="container-mt-4">
            <form action="{{ route('flights.store') }}" method="POST" class="border p-4 rounded">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="departure_spaceport_id" class="form-label">Indul:</label>
                        <select name="departure_spaceport_id" id="departure_spaceport_id" class="form-select" required>
                            <option value="" selected disabled>Válassz űrkikötőt</option>
                            @foreach($spaceports as $spaceport)
                                <option value="{{ $spaceport->id }}">{{ $spaceport->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="destination_spaceport_id" class="form-label">Érkezik:</label>
                        <select name="destination_spaceport_id" id="destination_spaceport_id" class="form-select" required>
                            <option value="" selected disabled>Válassz űrkikötőt</option>
                            @foreach($spaceports as $spaceport)
                                <option value="{{ $spaceport->id }}">{{ $spaceport->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="departure_time" class="form-label">Vissza indul:</label>
                        <input type="datetime-local" name="departure_time" id="departure_time" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="arrival_time" class="form-label">Vissza érkezik:</label>
                        <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="spaceship_id" class="form-label">Járat:</label>
                    <select name="spaceship_id" id="spaceship_id" class="form-select" required>
                        <option value="" selected disabled>Válassz űrhajót</option>
                        @foreach($spaceships as $spaceship)
                            <option value="{{ $spaceship->id }}">{{ $spaceship->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Létrehozás</button>
            </form>
        </div>


</body>
</html>
