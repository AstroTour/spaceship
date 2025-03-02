@extends('layout')

@section('content')
    <div class="">
        <h1 class="text-center">Űrhajók listája</h1>

        <table class="">
            <thead class="">
                <tr>
                    <th>ID</th>
                    <th>Űrhajó neve</th>
                    <th>Kapacitás</th>
                </tr>
            </thead>
            <tbody>
            @forelse($spaceships as $spaceship)
                <tr>
                    <td>{{ $spaceship->id }}</td>
                    <td>{{ $spaceship->name }}</td>
                    <td>{{ $spaceship->capacity }}</td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nincsenek űthajók.</td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>

@endsection
