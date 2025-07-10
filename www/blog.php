<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="es">

<?php
include("include/head.php");
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
                            <p style="color:#858796; text-align: start; font-size: 40px;">BLOG</p>
                        </div>
                        <div class="col text-right">
                            <button id="addPostButton" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addPostModal">
                                <i class="fas fa-plus"></i> Agregar Nueva Noticia
                            </button>
                        </div>
                    </div>

                    <!-- Tarjetas de noticias -->
                    <div id="blogPosts" class="row">
                        <!-- Las tarjetas de noticias se agregarán aquí dinámicamente -->
                    </div>

                </div>
                <!-- End of Main Content -->

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
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Modal para agregar noticias -->
        <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="addPostModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPostModalLabel">Agregar Nueva Noticia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addPostForm">
                            <div class="form-group">
                                <label for="postTitle">Título de la Noticia</label>
                                <input type="text" class="form-control" id="postTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="postImage">Imagen de la Noticia</label>
                                <input type="file" class="form-control" id="postImage" required>
                            </div>
                            <div class="form-group">
                                <label for="postContent">Contenido de la Noticia</label>
                                <textarea class="form-control" id="postContent" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Noticia</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts necesarios -->
        <?php
        include("include/scripts.php");
        ?>


</body>

</html>
