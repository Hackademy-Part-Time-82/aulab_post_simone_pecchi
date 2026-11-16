<x-c-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="auth-card">

                    <h1 class="auth-title">Modifica articolo</h1>
                    <p class="text-muted mb-4">Dopo la modifica l'articolo tornerà in revisione</p>

                    <form action="{{ route('article.update', $article) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Titolo --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo</label>
                            <input type="text" name="title" id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $article->title) }}">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Sottotitolo --}}
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Sottotitolo</label>
                            <input type="text" name="subtitle" id="subtitle"
                                   class="form-control @error('subtitle') is-invalid @enderror"
                                   value="{{ old('subtitle', $article->subtitle) }}">
                            @error('subtitle') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Immagine attuale + nuova --}}
                        <div class="mb-3">
                            <label class="form-label">Immagine attuale</label>
                            <div class="mb-2">
                                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
                                     class="img-fluid" style="max-height: 200px;">
                            </div>
                            <label for="image" class="form-label">Nuova immagine (facoltativa)</label>
                            <input type="file" name="image" id="image"
                                   class="form-control @error('image') is-invalid @enderror">
                            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Categoria --}}
                        <div class="mb-3">
                            <label for="category" class="form-label">Categoria</label>
                            <select name="category" id="category"
                                    class="form-select @error('category') is-invalid @enderror">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @selected(old('category', $article->category_id) == $category->id)>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Tag --}}
                        <div class="mb-3">
                            <label for="tags" class="form-label">Tag</label>
                            <input type="text" name="tags" id="tags"
                                   class="form-control @error('tags') is-invalid @enderror"
                                   value="{{ old('tags', $article->tags->implode('name', ', ')) }}">
                            <div class="form-text">Separa i tag con una virgola</div>
                            @error('tags') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Corpo del testo --}}
                        <div class="mb-4">
                            <label for="body" class="form-label">Corpo del testo</label>
                            <textarea name="body" id="body" rows="10"
                                      class="form-control @error('body') is-invalid @enderror">{{ old('body', $article->body) }}</textarea>
                            @error('body') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-subscribe w-100 py-2">Salva modifiche</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-c-layout>