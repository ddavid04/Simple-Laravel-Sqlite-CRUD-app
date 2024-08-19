<x-app-layout>
    <div class="note-container py-12">
        <a href="{{ route('note.create') }}" class="new-note-btn">
            New Note
        </a>
        <div class="notes">
            @foreach ($notes as $note)
                <div class="note">
                    <div class="note-body">
                        {{ Str::words($note->note, 30) }}
                    </div>
                    <div class="note-buttons">
                        <a href="{{ route('note.show', $note) }}" class="note-edit-button">View</a>
                        <a href="{{ route('note.edit', $note) }}" class="note-edit-button">Edit</a>
                        <form action="{{ route('note.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="note-delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination-container">
            <div class="pagination-info">
                Showing {{ $notes->firstItem() }} to {{ $notes->lastItem() }} of {{ $notes->total() }} results
            </div>
            <div class="pagination-links">
                @if ($notes->onFirstPage())
                    <span class="pagination-arrow disabled">&laquo;</span>
                @else
                    <a href="{{ $notes->previousPageUrl() }}" class="pagination-arrow">&laquo;</a>
                @endif

                @foreach ($notes->links()->elements[0] as $page => $url)
                    @if ($page == $notes->currentPage())
                        <span class="pagination-link active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="pagination-link">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($notes->hasMorePages())
                    <a href="{{ $notes->nextPageUrl() }}" class="pagination-arrow">&raquo;</a>
                @else
                    <span class="pagination-arrow disabled">&raquo;</span>
                @endif
            </div>
        </div>

    </div>
</x-app-layout>
