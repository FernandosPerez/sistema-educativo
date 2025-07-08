<?php
session_start();
$sesion=explode("|",$_SESSION["usuario"]);
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
                    $stmt = $dbconn->prepare("SELECT * FROM usuarios WHERE id ='".$sesion[0]."' ");
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (Exception $e) {
                    echo $e;
                }

                ?>

                <!-- Contenedor de notas -->
                <div id="notes-container" class="container">
                    <h1>Mi Perfil</h1>
                    <p><?=$rows[0]["nombre"]?></p>
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

        <script src="js/promocion.js"></script>

</body>

</html>