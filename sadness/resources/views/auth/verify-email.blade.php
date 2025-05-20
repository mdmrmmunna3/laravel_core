<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="container">
            <h2>Email Verification</h2>
            <p>Please check your email to verify your account.</p>
            <form action="{{ route('verification.resend') }}" method="POST">
                @csrf
                <button type="submit">Resend Verification Email</button>
            </form>
        </div>
    @endsection

</body>

</html>