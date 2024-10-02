<x-layout>
    <x-slot:title>Nueva nota</x-slot>
        <main class="content">
            <div class="cards">
                <div class="card card-center">
                    <div class="card-body">
                        <h1>Nueva nota</h1>

                        <form action="{{ route('notes.store') }}" method="post">
                            @csrf
                            <label for="title" class="field-label">Título: </label>
                            <input type="text" name="title" id="title"value="{{ old('title') }}" class="field-input">
                            @error('title')
                                {{ $mesagge }}
                            @enderror
                            <label for="content" class="field-label">Contenido:</label>
                            <textarea name="content" id="content" rows="10" class="field-textarea">{{ old('title') }}</textarea>
                            @error('content')
                                {{ $mesagge }}
                            @enderror
                            <button type="submit" class="btn btn-primary">Crear nota</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
</x-layout>   