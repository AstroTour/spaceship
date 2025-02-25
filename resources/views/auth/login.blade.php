@extends('layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="card p-4" style="width: 400px; background: rgba(255, 255, 255, 0.1); border-radius: 12px;">
            <h2 class="text-center text-white">Admin Bejelentkezés</h2>



            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label text-white">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Jelszó:</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Bejelentkezés</button>
            </form>
            @if(Auth::check())
                <p class="text-success">Be vagy jelentkezve.</p>
            @else
                <p class="text-danger">NEM vagy bejelentkezve.</p>
            @endif

        </div>
    </div>
@endsection
