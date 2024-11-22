<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1 class="mt-4">Message Board</h1>
                        <div id="message-board" class="position-relative">
                            <!-- Los sobres se generarán aquí -->
                        </div>
                        <div class="mt-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal1">
                                Abrir Modal 1
                            </button>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal2">
                                Abrir Modal 2
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modales -->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1Label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal1Label">Modal 1</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Este es el contenido del Modal 1.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal2Label">Modal 2</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Este es el contenido del Modal 2.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const messageBoard = document.getElementById('message-board');
            const numberOfEnvelopes = 23; // Número de sobres a generar

            for (let i = 0; i < numberOfEnvelopes; i++) {
                // Usamos setTimeout para agregar un retraso
                setTimeout(() => {
                    const envelope = document.createElement('div');
                    envelope.classList.add('envelope');
                    envelope.style.top = Math.random() * (messageBoard.clientHeight - 70) +
                        'px'; // Altura aleatoria
                    envelope.style.left = Math.random() * (messageBoard.clientWidth - 100) +
                        'px'; // Ancho aleatorio
                    envelope.textContent = `Mensaje ${i + 1}`; // Texto del mensaje
                    messageBoard.appendChild(envelope);
                }, i * 50); // Retraso de i segundos (1000 ms = 1 segundo)
            }
        });
    </script>
</x-app-layout>
