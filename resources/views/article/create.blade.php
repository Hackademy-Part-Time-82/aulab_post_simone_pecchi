<x-c-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="auth-card">

                    <h1 class="auth-title">Inserisci un articolo</h1>
                    <p class="text-muted mb-4">Il tuo articolo sarà pubblicato dopo la revisione della redazione</p>

                    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo</label>
                            <input type="text" name="title" id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                       
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Sottotitolo</label>
                            <input type="text" name="subtitle" id="subtitle"
                                   class="form-control @error('subtitle') is-invalid @enderror"
                                   value="{{ old('subtitle') }}">
                            @error('subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                       
                        <div class="mb-3">
                            <label for="image" class="form-label">Immagine di copertina</label>
                            <input type="file" name="image" id="image"
                                   class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                     
                        <div class="mb-3">
                            <label for="category" class="form-label">Categoria</label>
                            <select name="category" id="category"
                                    class="form-select @error('category') is-invalid @enderror">
                                <option value="" disabled @selected(!old('category'))>Seleziona una categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category') == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        <div class="mb-4">
                            <label for="body" class="form-label">Corpo del testo</label>
                            <textarea name="body" id="body" rows="10"
                                      class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
                            @error('body')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-subscribe w-100 py-2">Pubblica articolo</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-c-layout>