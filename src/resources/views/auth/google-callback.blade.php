@extends('layouts.app')

@section('content')
    <div class="p-6 text-center">
        Loging in with Google...
    </div>

    <script>
        sessionStorage.setItem('auth_token', @json($token));
        sessionStorage.setItem('auth_user', JSON.stringify(@json($user)));
        window.location.href = '/';
    </script>
@endsection
