<?php
session_start();
include 'conexao.php';

$usuarioId = $_SESSION['id']; // ID do usuário logado

$sql = "SELECT n.id, n.mensagem, n.status, u.nome, u.foto_perfil 
        FROM notificacoes n
        JOIN usuarios u ON n.usuario_id = u.id
        WHERE n.usuario_id = ?
        ORDER BY n.data_criacao DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuarioId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!--Div da pequena tela que aparece quando se clica em notificações-->
<div class="notification-panel">
    <div class="notification-header">
        <?php
        echo "<h2 class='username'> <u>{$_SESSION['nome']}</u></h2>";
        ?>
    </div>
    <ul class="notification-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <li class="<?= $row['status'] == 'nao_lida' ? 'notificacao-nao-lida' : '' ?>">
                <div class="notif">
                    <img src="img/userspfp/<?= htmlspecialchars($row['foto_perfil']) ?>"
                        alt="<?= htmlspecialchars($row['nome']) ?>">
                    <div class="dados-notif">
                        <p>@<?= htmlspecialchars($row['nome']) ?></p>
                        <p><?= htmlspecialchars($row['mensagem']) ?></p>
                    </div>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
</div>

<?php $stmt->close(); $conn->close(); ?>