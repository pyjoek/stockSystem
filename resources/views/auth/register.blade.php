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
        max-width: 450px;
    }
    .form-control, .form-select {
        background-color: #2a2a3d;
        color: #e4e4e4;
        border: none;
        border-radius: 8px;
    }
    .form-control:focus, .form-select:focus {
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
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required />
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label for="role" class="form-label">{{ __('Role') }}</label>
                <select id="role" name="role" class="form-select" required>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <!-- Already Registered -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="{{ route('login') }}" class="text-sm">{{ __('Already registered?') }}</a>
            </div>

            <!-- Register Button -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
            </div>
        </form>
    </div>
</body>
