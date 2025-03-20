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

    <div class="">
        <h1 class="text-center">Űrhajó létrehozása</h1>
        <form action="{{ route('spaceships.create') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Név</label>
                <input type="text" name="name" id="name" class="form-control date-picker" value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger">A mező kitöltése kötelező!</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="information">Információ</label>
                <textarea name="information" id="information" class="form-control date-picker">{{ old('information') }}</textarea>
                @error('information')
                    <div class="alert alert-danger">A mező kitöltése kötelező</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="capacity">Kapacitás</label>
                <input type="number" name="capacity" id="capacity" class="form-control date-picker" value="{{ old('capacity') }}">
                @error('capacity')
                    <div class="alert alert-danger">A kapacitás minimum 1 lehet!</div>
                @enderror
            </div>
            <button type="submit" class="btn-save">Létrehozás</button>
        </form>
    </div>

@endsection
