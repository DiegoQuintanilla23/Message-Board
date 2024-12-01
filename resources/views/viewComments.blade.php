<x-app-layout>
    <div class="container my-4 p-3" style="background-color:rgba(255, 255, 255, 0.77);">
        <div class="card">
            <div class="card-header">
                <h5>{{ $message->username }}</h5>
                <small>{{ $message->created_at->format('Y-m-d (H:i)') }}</small>
            </div>
            <div class="card-body">
                <p>{{ $message->content }}</p>
                @if ($message->image_loc)
                    <img src="{{ $message->image_loc }}" alt="Image" class="img-fluid">
                @endif
            </div>
        </div>
    
        <div class="mt-4">
            <h6>Comments</h6>
            @forelse ($comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <p><strong>{{ $comment->username }}</strong>:</p>
                        <p>{{ $comment->content }}</p>
                        <small class="text-muted">{{ $comment->created_at->format('Y-m-d (H:i)') }}</small>
                    </div>
                </div>
            @empty
                <p>No comments yet.</p>
            @endforelse
        </div>
    
        <form action="{{ route('postComment') }}" method="POST" class="mt-3">
            @csrf
            <input type="hidden" name="message_id" value="{{ $message->id }}">
            <div class="form-group">
                <label for="commentContent">Add a comment</label>
                <textarea name="content" id="commentContent" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#commentContent'), {
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'bulletedList', 'numberedList', 'link', 'blockQuote'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>