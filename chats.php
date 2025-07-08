<?php
include("include/error.php");
//include("include/conn.php");
/**Si el formulario se envía, guardamos el mensaje en la base de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $chat_id = $_POST['chat_id'];
    $message_text = $_POST['message'];

    // Insertar el mensaje en la base de datos
    $stmt = $dbconn->prepare("INSERT INTO messages (chat_id, sender, text, created_at) VALUES (:chat_id, :sender, :text, NOW())");
    $stmt->execute([
        'chat_id' => $chat_id,
        'sender' => 'Usuario', // Nombre del usuario logueado
        'text' => $message_text
    ]);
} // Obtener las conversaciones
$stmt = $dbconn->prepare("SELECT * FROM following WHERE status = 0");
$stmt->execute();
$conversations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obtener los mensajes 
$chat_id = isset($_GET['chat_id']) ? $_GET['chat_id'] : (isset($conversations[0]) ? $conversations[0]['id'] : 0);
$stmt = $dbconn->prepare("SELECT * FROM messages WHERE chat_id = :chat_id ORDER BY created_at");
$stmt->execute(['chat_id' => $chat_id]);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
 */
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


                <!-- Contenedor de chat -->
                <div id="chat-container">

                    <!-- Lista de conversaciones -->
                    <div id="conversations" class="chat-list">
                        <!-- Conversaciones predefinidas -->
                        <div class="chat-preview" onclick="loadChat(0)">
                            <p>Juan Pérez</p>
                        </div>
                        <div class="chat-preview" onclick="loadChat(1)">
                            <p>Ana López</p>
                        </div>
                        <div class="chat-preview" onclick="loadChat(2)">
                            <p>Carlos Rodríguez</p>
                        </div>
                        <div class="chat-preview" onclick="loadChat(3)">
                            <p>Maria García</p>
                        </div>
                    </div>

                    <!-- Mensajes del chat -->
                    <div id="chat-window" class="chat-window">
                        <div id="messages">
                        </div>

                        <div class="input-area">
                            <textarea id="message" placeholder="Escribe tu mensaje..."></textarea>

                            <button onclick="sendMessage()">Enviar</button>&nbsp;&nbsp;

                            <div class="file-input">
                                <label for="fileInput" class="file-button">
                                    <i class="fas fa-paperclip"></i> Seleccionar archivo o imagen
                                </label>
                                <input type="file" id="fileInput" onchange="handleFileSelect()" />
                            </div>
                        </div>

                        <div id="filePreview" class="file-preview"></div>
                    </div>
                </div>
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
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->


        <?php
        include("include/scripts.php");
        ?>

        <script src="js/chats.js"></script>


</body>

</html>