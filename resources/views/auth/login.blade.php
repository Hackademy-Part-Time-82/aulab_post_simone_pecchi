<x-c-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="auth-card">

                    <h1 class="auth-title">Accedi</h1>
                    <p class="text-muted mb-4">Accedi con il tuo account</p>

                    {{-- Errori di validazione --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf


                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email"
                                   class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Conferma password</label>
                            <input type="password" name="password_confirmation"
                                   id="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-subscribe w-100 py-2">Accedi</button>

                        <p class="text-center mt-3 mb-0">
                            non hai ancora un'account? <a href="{{ route('register') }}" class="auth-link">registrati</a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-c-layout>