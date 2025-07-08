<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
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

                try {
                    $stmt = $dbconn->prepare("SELECT * FROM following WHERE status =0 ");
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    echo $e;
                }

                ?>

                <!-- Contenedor de notas -->
                <div id="notes-container" class="container">
                    <h1>CANAL DE DIFUSION</h1>
                    <div id="note-list"></div>
                    <button id="add-note" class="btn btn-primary" data-toggle="modal" data-target="#noteModal">Crear nueva difusión</button>
                </div>
                <!-- Modal para crear difusión -->
                <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="noteModalLabel">Crear Difusión</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="note-form">
                                    <div class="form-group">
                                        <label for="diffusion-name">Nombre de la difusión</label>
                                        <input type="text" class="form-control" id="diffusion-name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="diffusion-image">Imagen</label>
                                        <input type="file" class="form-control" id="diffusion-image" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="diffusion-details">Detalles</label>
                                        <textarea class="form-control" id="diffusion-details" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="start-date">Fecha de inicio</label>
                                        <input type="date" class="form-control" id="start-date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end-date">Fecha de fin</label>
                                        <input type="date" class="form-control" id="end-date" required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" id="save-note">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <!-- End of Content Wrapper -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Page Wrapper -->


        <?php
        include("include/scripts.php");
        ?>

<script>
        document.getElementById("save-note").addEventListener("click", function () {
            const name = document.getElementById("diffusion-name").value;
            const image = document.getElementById("diffusion-image").files[0];
            const details = document.getElementById("diffusion-details").value;
            const startDate = document.getElementById("start-date").value;
            const endDate = document.getElementById("end-date").value;

            if (name && details && startDate && endDate) {
                const noteData = {
                    name: name,
                    image: image ? URL.createObjectURL(image) : null, 
                    details: details,
                    startDate: startDate,
                    endDate: endDate
                };

                const noteContainer = document.createElement("div");
                noteContainer.classList.add("note", "border", "p-3", "mb-3", "bg-light");
                noteContainer.innerHTML = `
                    <h4>${noteData.name}</h4>
                    ${noteData.image ? `<img src="${noteData.image}" alt="Imagen de la difusión" style="width: 100px; height: 100px;">` : ""}
                    <p>${noteData.details}</p>
                    <p><strong>Fecha de inicio:</strong> ${noteData.startDate}</p>
                    <p><strong>Fecha de fin:</strong> ${noteData.endDate}</p>
                `;

                document.getElementById("note-list").appendChild(noteContainer);

                $('#noteModal').modal('hide');

                document.getElementById("note-form").reset();
            } else {
                alert("Por favor, complete todos los campos.");
            }
        });
    </script>

</body>

</html>