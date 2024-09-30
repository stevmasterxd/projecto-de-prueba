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
                        </p>
                    </div>

                    <footer class="card-footer">
                        <a href="{{ $note->editUrl() }}" class="action-link action-edit">
                            <i class="icon icon-pen"></i>
                        </a>
                        <a class="action-link action-delete">
                            <i class="icon icon-trash"></i>
                        </a>
                    </footer>
                </div>
                 @endforeach
            </div>
        </main>
</x-layout>         
