@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3><i class="fas fa-user-lock"></i> Connexion à votre compte</h3>
                </div>

                <div class="card-body p-4">
                    @if(session('error'))
                        <div class="alert alert-danger text-center">{{ session('error')}}</div>
                    @endif

                    <form method="POST" action="{{ route('login')}}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold text-primary">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email')}}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback"><strong>{{ $message}}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold text-primary">
                                <i class="fas fa-lock"></i> Mot de passe
                            </label>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="invalid-feedback"><strong>{{ $message}}</strong></span>
                            @enderror
                        </div>
                        {{--
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                {{ old('remember')? 'checked': ''}}>
                            <label class="form-check-label text-primary" for="remember">Se souvenir de moi</label>
                        </div>
                        --}}
                        <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3">
                            <i class="fas fa-sign-in-alt"></i> SE CONNECTER
                        </button>
                    </form>

                    

                    @if (Route::has('password.request'))
                        <div class="text-center mt-2">
                            <a class="btn btn-link" href="{{ route('password.request')}}">
                                <i class="fas fa-key"></i> Mot de passe oublié?
                            </a>
                        </div>
                    @endif
                    <div class="text-center mt-4">
                        {{--<p>Pas encore de compte?</p>--}}
                        <a href="{{ route('register')}}" class="btn btn-outline-primary rounded-pill">Créer un compte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        let passwordField = document.getElementById('password')
        passwordField.type = passwordField.type === 'password'? 'text': 'password';
});
</script>
@endsection
