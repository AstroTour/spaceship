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


</body>
</html>
