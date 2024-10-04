<x-layout>
    <x-slot:title>listado de notas</x-slot>
        <main class="content">
            <div class="cards">
                @foreach($notes as $note)
                <div class="card card-small">
                    <div class="card-body">
                        <h4> {{ $note->title}} </h4>
                        <p>
                            {{ $note->content}}
                        <form method="POST" action="{{ route('notes.destroy', $note) }}">
                            @method('DELETE')
                            @csrf
                            <button>Eliminate</button>
                        </form>
                        </p>
                    </div>

                    <footer class="card-footer">
                        <a href="{{ $note->editUrl() }}" class="action-link action-edit">
                            <i class="icon icon-pen"></i>
                        </a>
                        <a class="action-link action-delete" data-js-delete-note="{{ $note->id }}">
                            <i class="icon icon-trash"></i>
                        </a>
                    </footer>
                </div>
                @endforeach
            </div>
        </main>
        <x-slot:javascript>
            <script>
                let deleteUrlPlaceholder = "{{ route('notes.destroy', ':id') }}";
                let csrfToken = "{{ csrf_token() }}";
                document.querySelectorAll('a[data-js-delete-note]').forEach(function(link) {
                    link.addEventListener('click', function(event) {
                        deleteNote(event.target.closest('a'));
                    });
                });

                function deleteNote(deleteNoteLink) {
                    let noteCard = deleteNoteLink.closest('.card');
                    let noteId = deleteNoteLink.dataset.jsDeleteNote;
                    let deleteNoteUrl = deleteUrlPlaceholder.replace(':id', noteId);

                    noteCard.style.display = 'none';

                    fetch(deleteNoteUrl, {
                        method: 'DELETE',
                        headers: {
                            "content-type": "aplication/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: JSON.stringify({
                            _token: csrfToken
                        })
                    }).then(function(response) {
                        if (response.status !== 204) {
                            restoreNote(noteCard);
                            return;
                        }
                        noteCard.remove();
                    }).catch(function(response) {
                        restoreNote(noteCard);
                    });
                }

                function restoreNote(noteCard) {
                    alert('Error occurred deleting note');
                    noteCard.style.display = 'flex';
                }
            </script>
        </x-slot:javascript>"
</x-layout>