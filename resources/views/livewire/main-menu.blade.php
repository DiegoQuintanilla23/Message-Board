<div class="container-fluid">

    <div class="container mt-4">
        <div class="row">
            <div class="col-4 d-flex justify-content-start">
                <!-- Botón para abrir el modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">
                    Add Friends
                </button>
                <!-- Botón para abrir el form -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal2">
                    New Message
                </button>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <livewire:clock />
            </div>
            <div class="col-4 d-flex justify-content-end">
                <!-- Botón para ir a la ruta de perfil -->
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                    Profile
                </a>
                <!-- Botón para logout como formulario -->
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Label"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal1Label">Add Friends</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="friendCode" class="form-label">Your Friend Code</label>
                        <input type="text" id="friendCode" class="form-control" value="{{ $myFriendCode }}" readonly>
                    </div>

                    <div>
                        <div class="form-group">
                            <label for="friendCodeInput">Friend Code</label>
                            <input type="text" id="friendCodeInput" class="form-control" maxlength="10"
                                placeholder="----------" wire:model.defer="friendCode" required>
                        </div>

                        @if ($message)
                            <div class="alert alert-info mt-3">
                                {{ $message }}
                            </div>
                        @endif
                        <button type="button" wire:click.prevent="sendFriendRequest" class="btn btn-primary mt-2">Send
                            Request</button>
                    </div>

                    <div class="mt-4">
                        <h5>Your Friends:</h5>
                        <ul class="list-group">
                            @forelse($friends as $friend)
                                <li class="list-group-item">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $friend->pfploc }}" alt="Profile Image" class="rounded-circle"
                                            width="30" height="30">
                                        <span class="ml-2">{{ $friend->username }}</span>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">You have no friends yet.</li>
                            @endforelse
                        </ul>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Label"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal2Label">New Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Dropdown to select friend -->
                    <div class="form-group">
                        <label for="friendSelect">Select Friend</label>
                        <select id="friendSelect" wire:model="selectedFriend" class="form-control" required>
                            <option value="" disabled selected>Select a friend</option>
                            @foreach ($friends as $friend)
                                <option value="{{ $friend->id }}">{{ $friend->username }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <textarea id="newMessage" name="newMessage" wire:model="newMessage" class="form-control" maxlength="232323"
                            placeholder="Write a new message..." rows="4"></textarea>

                        <button type="button" wire:click.prevent="sendNewMessage"
                            class="btn btn-primary mt-2">
                            Send
                        </button>
                    </div>

                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>



    @script
        <script>
            document.addEventListener('livewire:load', () => {
                Livewire.on('friendRequestProcessed', () => {
                    const modalElement = document.getElementById('modal1');
                    if (modalElement) {
                        const modal = new bootstrap.Modal(modalElement);
                        modal.show();
                    }
                });
            });
        </script>
    @endscript
</div>
