<div class="post">
    <div class="post-header">
        <div class="pfp-post">
            <?php
            // Exibe a foto do usuário ou uma imagem padrão
            if ($post['foto_perfil'] && file_exists($post['foto_perfil'])) {
                echo '<img class="pfp" src="' . htmlspecialchars($post['foto_perfil']) . '" alt="Profile Picture">';
            } else {
                echo '<img class="pfp" src="img/userspfp/usericon.jpg" alt="Profile Picture">';
            }
            ?>
        </div>
        <div class="perfil-post">
            <p class="nome"><?php echo htmlspecialchars($post['nome']); ?></p>
            <p class="data-post"><?php echo date("d/m/Y", strtotime($post['data_criacao'])); ?></p>
        </div>
        <div class="menu-container">
            <button class="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
            <div class="dropdown-menu">
                <ul>
                    <?php if ($post['usuario_id'] == $_SESSION['id']): ?>
                        <li><button onclick="openEditPost(<?php echo $post['id']; ?>)">Editar</button></li>
                        <li><button onclick="openDeletePostModal(<?php echo $post['id']; ?>)">Excluir</button></li>
                        <li><button onclick="openConfirmModalMarcarComoEncontrado()">Marcar como 'encontrado'</button></li>
                    <?php else: ?>
                        <li><button onclick="openReportForm()">Reportar</button></li>
                        <?php if ($post['status'] == 'encontrado'): ?>
                            <li><button onclick="openConfirmPopup()">Reivindicar item</button></li>
                        <?php else: ?>
                            <li><button onclick="openConfirmPopupItemPerdido()">Entrar em contato</button></li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="conteudo-principal">
        <h2 class="titulo"><?php echo htmlspecialchars($post['titulo']); ?></h2>
        <div class="midia">
            <?php if (!empty($post['imagem'])): ?>
                <?php if (strpos($post['tipo_imagem'], 'image') === 0): ?>
                    <img class="imagem-post"
                        src="data:<?php echo $post['tipo_imagem']; ?>;base64,<?php echo base64_encode($post['imagem']); ?>"
                        alt="Imagem da postagem">
                <?php else: ?>
                    <video class="video-post" controls>
                        <source
                            src="data:<?php echo $post['tipo_imagem']; ?>;base64,<?php echo base64_encode($post['imagem']); ?>">
                    </video>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <p class="texto-post"><?php echo htmlspecialchars($post['descricao']); ?></p>
    </div>

    <div class="post-footer">
        <div class="tags-post">
            <button class="tp_publicacao">
                <?php echo $post['status'] == 'encontrado' ? 'objeto achado' : 'objeto perdido'; ?>
            </button>
            <button class="tag-item"><?php echo htmlspecialchars($post['categoria']); ?></button>
        </div>
        <div class="acoes">
            <?php if ($post['usuario_id'] != $_SESSION['id']): ?>
                <?php if ($post['status'] == 'encontrado'): ?>
                    <button class="e-meu" onclick="openConfirmPopup()">é meu!</button>
                <?php else: ?>
                    <button class="encontrei" onclick="openConfirmPopupItemPerdido()">encontrei!</button>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>