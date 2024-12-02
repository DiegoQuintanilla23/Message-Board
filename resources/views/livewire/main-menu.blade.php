<div class="container-fluid">

    <div class="container mt-2">
        <div class="row">
            <div class="col-4 d-flex justify-content-start align-items-center">
                <div class="mx-3">
                    <!-- Botón para abrir el modal -->
                    <button type="button" class="btn btn-primary btn-UI d-flex justify-content-center align-items-center"
                        data-toggle="modal" data-target="#modal1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-person-fill-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path
                                d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                        </svg>
                    </button>
                </div>
                <div class="mx-3">
                    <!-- Botón para abrir el form -->
                    <button type="button"
                        class="btn btn-primary  btn-UI d-flex justify-content-center align-items-center"
                        data-toggle="modal" data-target="#modal2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-envelope-plus-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 4.697v4.974A4.5 4.5 0 0 0 12.5 8a4.5 4.5 0 0 0-1.965.45l-.338-.207z" />
                            <path
                                d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="col-4 d-flex justify-content-center align-items-center">
                <livewire:clock />
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="mx-3">
                    <!-- Botón para ir a la ruta de perfil -->
                    <a href="{{ route('profile.edit') }}"
                        class="btn btn-primary btn-UI d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                            <path
                                d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
                        </svg>
                    </a>
                </div>

                <div class="mx-3">
                    <!-- Botón para logout como formulario -->
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-UI d-flex justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                              </svg>
                        </button>
                    </form>
                </div>
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

                    <div class="mt-4" wire:ignore>
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
                    <div class="form-group" wire:ignore>
                        <label for="friendSelect">Select Friend</label>
                        <select id="friendSelect" wire:model="selectedFriend" class="form-control" required>
                            <option value="" disabled selected>Select a friend</option>
                            @foreach ($friends as $friend)
                                <option value="{{ $friend->id }}">{{ $friend->username }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foto" class="form-label">Imagen</label> <br>
                        <label class="btn btn-primary" style="width: 100%; cursor: pointer;">
                            <i class="fa fa-cloud-upload" aria-hidden="true"></i> Imagen
                            <input type="file" accept="image/*" id="uploadImageNom" wire:model="foto"
                                style="display: none;">
                        </label>

                        <div class="row mt-3">
                            <div class="col-12 d-flex justify-content-center">
                                @if ($foto)
                                    <img src="{{ $foto->temporaryUrl() }}" class="img-fluid img-responsive" />
                                @else
                                    <img id="foto" class="img-fluid img-responsive" />
                                @endif
                            </div>
                        </div>

                        @error('foto')
                            <span class="help-block text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <textarea id="newMessage" wire:model="newMessages" class="form-control" maxlength="232323"
                            placeholder="Write a new message..." rows="4"></textarea>

                        <button type="button" wire:click.prevent="sendNewMessage" class="btn btn-primary mt-2">
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
