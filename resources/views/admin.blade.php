@extends('layout')

@section('content')

    <div class="">
        <h1 class="text-center">Felhasználók Listája</h1>
        @if(session('success1'))
            <div class="alert alert-success">
                {{ session('success1') }}
            </div>
        @endif
        @if(session('success2'))
            <div class="alert alert-success">
                {{ session('success2') }}
            </div>
        @endif

        <form action="{{ route('admin.user.search') }}" method="GET" class = "mb-3">
            <div class="input-group" style = "max-width: 400px;">
                <input type="text" name="search" class="form-control" placeholder="Név/Email/Jogosultság alapján" value="{{ request('search') }}">
                <button type="submit" class="btn-save btn-primary">Keresés</button>
            </div>
        </form>
        <table class="">
            <thead class="">
            <tr>
                <th>ID</th>
                <th>Felhasználónév</th>
                <th>Email</th>
                <th>Jogosultság</th>
                <th>Művelet</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('users.update-role', $user->id) }}">
                            @csrf
                            <div class="input-group">
                                <select name="role" class="role-select">
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="super-admin" {{ $user->role === 'super-admin' ? 'selected' : '' }}>Super Admin</option>
                                </select>
                                <button type="submit" class="btn-save">Mentés</button>
                            </div>
                        </form>
                    </td>
                    <td class="">
                        <form action="{{ route('users.delete-user', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Biztosan törölni szeretnéd?')">Törlés</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nincsenek felhasználók.</td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>
@endsection
