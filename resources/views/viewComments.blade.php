<x-app-layout>
    <div class="container my-4 p-3 rounded" style="background-color:rgba(255, 255, 255, 0.77);">
        <div class="row">
            <div class="col-12 p-3">
                <a class="btn btn-primary btn-UI-sm d-flex justify-content-center align-items-center" href="{{ route('dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                  </svg></a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>{{ $message->username }}</h5>
                <small>{{ $message->created_at->format('Y-m-d (H:i)') }}</small>
            </div>
            <div class="card-body">
                <p>{{ $message->content }}</p>
                @if ($message->image_loc)
                    <img src="{{ asset($message->image_loc) }}" alt="Image" style="width: 100%; height: auto;">
                @endif
            </div>
        </div>

        <div class="mt-4">
            <h6>Comments</h6>
            @forelse ($comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1  d-flex align-items-center"><img src="{{ $comment->pfploc }}"
                                    alt="Profile Image" class="rounded-circle" width="50" height="50"></div>
                            <div class="col-8 d-flex align-items-center">
                                <p><strong>{{ $comment->username }}</strong></p>
                            </div>
                            <div class="col-3  d-flex align-items-center">
                                <small class="text-muted">{{ $comment->created_at->format('Y-m-d (H:i)') }}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
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
