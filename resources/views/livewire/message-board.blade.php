<div class="container-fluid">
    <div id="message-board" class="position-relative">
        <!-- Los sobres se generarán aquí -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Mensaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalContent">
                    <!-- Aquí se mostrará el contenido del mensaje -->
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
            const messages = @json($messages); // Pasar los mensajes a JavaScript
            const numberOfMessages = messages.length; // Número de mensajes

            for (let i = 0; i < numberOfMessages; i++) {
                // Usamos setTimeout para agregar un retraso
                setTimeout(() => {
                    const envelope = document.createElement('div');
                    envelope.classList.add('envelope');
                    envelope.style.top = Math.random() * (messageBoard.clientHeight - 70) + 'px'; // Altura aleatoria
                    envelope.style.left = Math.random() * (messageBoard.clientWidth - 100) + 'px'; // Ancho aleatorio

                    // Contenido del mensaje
                    envelope.innerHTML = `<p>Mensaje ${messages[i].content}</p>`;
                    envelope.dataset.content = messages[i].content; // Guardar contenido del mensaje en dataset
                    if (messages[i].image) {
                        envelope.dataset.image = messages[i].image.image_loc; // Guardar imagen si existe
                    }

                    // Agregar evento de clic para abrir el modal
                    envelope.addEventListener('click', () => {
                        const modalContent = document.getElementById('modalContent');
                        modalContent.innerHTML = `
                            <p>${envelope.dataset.content}</p>
                            ${envelope.dataset.image ? `<div class="image"><img src="${envelope.dataset.image}" alt="Image" style="width: 100%; height: auto;"></div>` : ''}
                        `;
                        $('#messageModal').modal('show'); // Usar jQuery para mostrar el modal
                    });

                    messageBoard.appendChild(envelope);
                }, i * 150); // Retraso de i * 150 ms
            }
        });
    </script>
</div>
