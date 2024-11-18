<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    body {
        background: linear-gradient(to bottom right, #1a1a2e, #16213e, #0f3460);
        color: #e4e4e4;
        font-family: 'Arial', sans-serif;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
    }
    .auth-card {
        background: #1c1c1e;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 2rem;
        width: 100%;
        max-width: 400px;
    }
    .form-control {
        background-color: #2a2a3d;
        color: #e4e4e4;
        border: none;
        border-radius: 8px;
    }
    .form-control:focus {
        border-color: #4ecca3;
        box-shadow: 0 0 5px #4ecca3;
    }
    .btn-primary {
        background: #4ecca3;
        border: none;
        border-radius: 8px;
        transition: background 0.3s ease;
    }
    .btn-primary:hover {
        background: #3e9d83;
    }
    a {
        color: #4ecca3;
    }
    a:hover {
        color: #3e9d83;
    }
    label {
        font-size: 0.9rem;
    }
</style>

<body>
    <div class="auth-card">
        <h3 class="text-center mb-4">Welcome Back</h3>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" class="mb-3" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm">{{ __('Forgot your password?') }}</a>
                @endif
            </div>

            <div class="d-flex justify-content-between mt-3">
                <a href="register" class="btn btn-secondary btn-sm">Register</a>
                <button type="submit" class="btn btn-primary btn-sm">{{ __('Log in') }}</button>
            </div>
        </form>
    </div>
</body>
