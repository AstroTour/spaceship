@extends('layout')

@section('content')
    <div class="table-responsive">
        <h1 class="text-center">Foglalások</h1>
        <table class="">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Felhasználónév</th>
                    <th>Email</th>
                    <th>Bolygó</th>
                    <th>Járatszám</th>
                    <th>Menetrend ID</th>
                    <th>Űrhajó</th>
                    <th>Ülés</th>
                    <th>Indulás</th>
                    <th>Érkezés</th>
                    <th>Visszaindulás</th>
                    <th>Visszaérkezés</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->username }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->planet_name }}</td>
                        <td>{{ $reservation->flight_number }}</td>
                        <td>{{ $reservation->schedule_id }}</td>
                        <td>{{ $reservation->spaceship_name }}</td>
                        <td>{{ $reservation->seat ? 'Ablak mellett' : 'Nem ablak mellett' }}</td>
                        <td>{{ $reservation->departure_time }}</td>
                        <td>{{ $reservation->arrival_time }}</td>
                        <td>{{ $reservation->goes_back }}</td>
                        <td>{{ $reservation->comes_back }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">Nincsenek foglalások.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection