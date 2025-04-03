@extends('layout')

@section('content')
    <div class="">
        <h1 class="text-center">Járat Létrehozása</h1>
        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf
            <div class="row mt-4">
                <div class="col-md-6">
                    <label for="departure_time" class="form-label">Indul:</label>
                    <input type="datetime-local" name="departure_time" id="departure_time" class="form-control  date-picker" required>
                </div>
                <div class="col-md-6">
                    <label for="arrival_time" class="form-label">Érkezik:</label>
                    <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control  date-picker" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="goes_back" class="form-label">Vissza indul:</label>
                    <input type="datetime-local" name="goes_back" id="goes_back" class="form-control  date-picker" required>
                </div>
                <div class="col-md-6">
                    <label for="comes_back" class="form-label">Vissza érkezik:</label>
                    <input type="datetime-local" name="comes_back" id="comes_back" class="form-control  date-picker" required>
                </div>
            </div>

            

            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="flights_id" class="form-label">Járat:</label>
                    <select name="flights_id" id="flights_id" class="form-select  date-picker flight-select" required>
                        <option class="" value="" disabled selected>Válassz egy járatot...</option>
                        @foreach ($flights as $flight)
                            <option value="{{ $flight->id }}">{{ $flight->flight_number }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-4 text-center">
                <button type="submit" class="btn-save">Létrehozás</button>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <h1 class="text-center">Menetrend Listája</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="">
            <thead class="">
            <tr>
                <th>ID</th>
                <th>Indulási idő</th>
                <th>Érkezési idő</th>
                <th>Visszaindulás</th>
                <th>Visszaérkezés</th>
                <th>Járat ID</th>
                <th>Űrhajó</th>
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
                    <td>{{ $schedule->flight->spaceship->name ?? 'N/A' }}</td>
                    <td class="text-center align-middle">
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Biztosan törölni szeretnéd?')">Törlés</button>
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
    <form action="{{ route('schedules.cleanup') }}" method="POST">
            @csrf
            <button type="submit" class="btn-delete">Lejárt menetrendek törlése</button>
    </form>
@endsection
