<x-c-layout>
    <div class="container my-5">
        <h1 class="page-heading">Lavora con noi</h1>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="auth-card">

                    <p class="text-muted mb-4">
                        Vuoi entrare nella redazione di The Aulab Post? Scegli il ruolo e raccontaci qualcosa di te.
                    </p>

                    <form action="{{ route('careers.submit') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="role" class="form-label">Per quale ruolo ti candidi?</label>
                            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                                <option value="" disabled @selected(!old('role'))>Seleziona un ruolo</option>
                                @if (!Auth::user()->is_admin)
                                    <option value="admin" @selected(old('role') == 'admin')>Amministratore</option>
                                @endif
                                @if (!Auth::user()->is_revisor)
                                    <option value="revisor" @selected(old('role') == 'revisor')>Revisore</option>
                                @endif
                                @if (!Auth::user()->is_writer)
                                    <option value="writer" @selected(old('role') == 'writer')>Redattore</option>
                                @endif
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', Auth::user()->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label">Presentati</label>
                            <textarea name="message" id="message" rows="6"
                                      class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-subscribe w-100 py-2">Invia candidatura</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-c-layout>