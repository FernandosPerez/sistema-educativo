<!DOCTYPE html>
<html lang="es">

<?php
include("include/head.php");
?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include("include/menu.php");
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php
                include("include/perfil.php");
                include("include/conn.php");
                ?>

                <div class="container mt-4">
                    <!-- Título y botón en la misma fila -->
                    <div class="row align-items-center">
                        <div class="col">
                            <p style="color:#858796; text-align: start; font-size: 40px;">REPORTES DE TICKETS</p>
                        </div>
                        <div class="col text-right">
                            <!-- Asegúrate de que el botón tiene el atributo correcto -->
                            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#createTicketModal">
                                <i class="fas fa-plus"></i> Crear Ticket
                            </button>
                        </div>
                    </div>

                    <!-- Tabla de Tickets -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="ticketsTable">
                            <!-- Aquí se llenarán los tickets -->
                        </tbody>
                    </table>
                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span style="color:#858796">Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Modal para crear ticket -->
        <div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createTicketModalLabel">Crear Nuevo Ticket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="ticketForm">
                            <div class="mb-3">
                                <label for="ticketTitle" class="form-label">Título</label>
                                <input type="text" class="form-control" id="ticketTitle" required>
                            </div>
                            <div class="mb-3">
                                <label for="ticketDescription" class="form-label">Descripción</label>
                                <textarea class="form-control" id="ticketDescription" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para ver ticket -->
        <div class="modal fade" id="viewTicketModal" tabindex="-1" aria-labelledby="viewTicketModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewTicketModalLabel">Detalles del Ticket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>ID:</strong> <span id="modalTicketId"></span></p>
                        <p><strong>Título:</strong> <span id="modalTicketTitle"></span></p>
                        <p><strong>Descripción:</strong> <span id="modalTicketDescription"></span></p>
                        <p><strong>Estado:</strong> <span id="modalTicketStatus"></span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts necesarios -->
        <?php
        include("include/scripts.php");
        ?>
        <script src="js/reporteSistemas.js"></script>

</body>

</html>