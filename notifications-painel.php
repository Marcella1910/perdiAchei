<?php

include 'dbconnect.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    die("Erro: Usuário não autenticado.");
}

$usuarioId = $_SESSION['id']; // ID do usuário logado

// Testa se a conexão com o banco está funcionando
if (!$conn) {
    die("Erro na conexão com o banco.");
}

// Consulta SQL
$sql = "SELECT n.id, n.mensagem, n.status, u.nome, u.foto_perfil 
        FROM notificacoes n
        JOIN usuarios u ON n.usuario_id = u.id
        WHERE n.usuario_id = ?
        ORDER BY n.data_criacao DESC";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro na preparação da query: " . $conn->error);
}

$stmt->bind_param("i", $usuarioId);
$stmt->execute();
$result = $stmt->get_result();

?>

<div class="notification-panel">
    <div class="notification-header">
        <?php
        echo "<h2 class='username'> <u>" . htmlspecialchars($_SESSION['nome']) . "</u></h2>";
        ?>
    </div>
    <ul class="notification-list">
        <?php if ($result->num_rows === 0): ?>
            <li>
                <p>Nenhuma notificação encontrada.</p>
            </li>
        <?php else: ?>
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
        <?php endif; ?>
    </ul>
</div>

<?php
$stmt->close();
$conn->close();
?>