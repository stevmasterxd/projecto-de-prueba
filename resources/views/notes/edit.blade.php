<x-layout>
    <x-slot:title>Edit note</x-slot>
        <main class="content">
            <div class="cards">
                <div class="card card-center">
                    <div class="card-body">
                        <h1>Edit note</h1>
                        @if($errors->any())
                        <div class="errors">
                            <p><strong>El formulario contiene errores, por favor corrígelos e intenta nuevamente:</strong></p>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('notes.update', ['id'=> $note->id]) }}" method="PUT">
                            @csrf
                            @method('PUT')
                            <label for="title" class="field-label">Titulo: </label>
                            <input type="text" name="title" id="title" value="{{ old('title', $note->title) }}" class="field-input">
                            @error('title')
                            {{ $mesagge }}
                            @enderror
                            <label for="content" class="field-label">Contenido:</label>
                            <textarea name="content" id="content" rows="10" class="field-textarea">{{ old('content', $note->content) }}</textarea>
                            @error('content')
                            {{ $mesagge }}
                            @enderror
                            <button type="submit" class="btn btn-primary">Update Note</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
</x-layout>