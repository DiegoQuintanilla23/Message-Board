<div class="container-fluid">

    <!-- Debug: Mostrar ancho y alto
    <div class="mb-3">
        <strong>Width:</strong> {{ $width }} px <br>
        <strong>Height:</strong> {{ $height }} px
    </div>
    -->

    <!-- Tablero donde se generan los sobres -->
    <div id="message-board" class="position-relative">
        @if ($messages)
            @foreach ($messages as $message)
                <!-- Sobre que abre el modal -->
                <div class="envelope2 position-absolute  d-flex pl-2 justify-content-center flex-column"
                    style="
                top: {{ rand(0, $height - 70) }}px; 
                left: {{ rand(0, $width - 100) }}px; 
                cursor: pointer;
            "
                    data-toggle="modal" data-target="#messageModal-{{ $message->id }}">
                    <p class="mt-3">{{ $message->username }}</p>
                    <small>{{ $message->created_at->format('Y-m-d (H:i)') }}</small>
                </div>

                <!-- Modal único para cada mensaje -->
                <div class="modal fade" id="messageModal-{{ $message->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="messageModalLabel-{{ $message->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="messageModalLabel-{{ $message->id }}">Mi Mensaje</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-2">
                                        <img src="{{ $message->pfploc }}" alt="Profile Image" class="rounded-circle"
                                            width="100%" height="auto">
                                    </div>
                                    <div class="col-7">
                                        <p>{{ $message->username }}</p>
                                    </div>
                                    <div class="col-3">
                                        <small>{{ $message->created_at->format('Y-m-d (H:i)') }}</small>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 p-3">
                                        <p>{{ $message->content }}</p>
                                        @if ($message->image_loc)
                                            <img src="{{ $message->image_loc }}" alt="Image"
                                                style="width: 100%; height: auto;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary" href="{{ route('viewComments', $message->id) }}">Comments</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        @if ($mymessages)
            @foreach ($mymessages as $message)
                <!-- Sobre que abre el modal -->
                <div class="envelope1 position-absolute d-flex pl-2 justify-content-center flex-column"
                    style="
                            top: {{ rand(0, $height - 70) }}px; 
                            left: {{ rand(0, $width - 100) }}px; 
                            cursor: pointer;
                        "
                    data-toggle="modal" data-target="#messageModal-{{ $message->id }}">
                    <p class="mt-3">{{ $message->username }}</p>
                    <small>{{ $message->created_at->format('Y-m-d (H:i)') }}</small>
                </div>

                <!-- Modal único para cada mensaje -->
                <div class="modal fade" id="messageModal-{{ $message->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="messageModalLabel-{{ $message->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="messageModalLabel-{{ $message->id }}">Mi Mensaje</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-2">
                                        <img src="{{ $message->pfploc }}" alt="Profile Image" class="rounded-circle"
                                            width="100%" height="auto">
                                    </div>
                                    <div class="col-7">
                                        <p>{{ $message->username }}</p>
                                    </div>
                                    <div class="col-3">
                                        <small>{{ $message->created_at->format('Y-m-d (H:i)') }}</small>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 p-3">
                                        <p>{{ $message->content }}</p>
                                        @if ($message->image_loc)
                                            <img src="{{ $message->image_loc }}" alt="Image"
                                                style="width: 100%; height: auto;">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-primary" href="{{ route('viewComments', $message->id) }}">Comments</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    @script
        <script>
            document.addEventListener('livewire:initialized', () => {
                const messageBoard = document.getElementById('message-board');

                if (messageBoard) {
                    // Obtener dimensiones del contenedor
                    const boardWidth = messageBoard.clientWidth;
                    const boardHeight = messageBoard.clientHeight;

                    // Enviar las dimensiones al componente Livewire
                    Livewire.dispatch('updateDimensions', {
                        width: boardWidth,
                        height: boardHeight
                    });
                } else {
                    console.error('No se encontró el elemento #message-board.');
                }
            })
        </script>
    @endscript

</div>
