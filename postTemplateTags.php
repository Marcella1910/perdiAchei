<?php $postId = $post['id']; ?> <!-- Garantindo que $postId está correto -->
<div class="post">
    <div class="post-header">
        <div class="pfp-post">
            <?php
            // Exibe a foto do usuário ou uma imagem padrão
            if ($post['foto_perfil'] && file_exists($post['foto_perfil'])) {
                // Verifica se é o mesmo usuário logado
                if ($post['usuario_id'] == $_SESSION['id']) {
                    echo '<a href="meuperfil.php"><img class="pfp" src="' . htmlspecialchars($post['foto_perfil']) . '" alt="Profile Picture"></a>';
                } else {
                    echo '<a href="perfil-alheio.php?usuario_id=' . $post['usuario_id'] . '"><img class="pfp" src="' . htmlspecialchars($post['foto_perfil']) . '" alt="Profile Picture"></a>';
                }
            } else {
                // Caso não tenha foto, usa a imagem padrão
                if ($post['usuario_id'] == $_SESSION['id']) {
                    echo '<a href="meuperfil.php"><img class="pfp" src="img/userspfp/usericon.jpg" alt="Profile Picture"></a>';
                } else {
                    echo '<a href="perfil-alheio.php?usuario_id=' . $post['usuario_id'] . '"><img class="pfp" src="img/userspfp/usericon.jpg" alt="Profile Picture"></a>';
                }
            }
            ?>
        </div>
        <div class="perfil-post">
            <?php
            // Exibe o nome do usuário associado
            if ($post['usuario_id'] == $_SESSION['id']) {
                echo "<p class='nome'><a href='meuperfil.php'>" . htmlspecialchars($postId['nome']) . "</a></p>";
            } else {
                echo "<p class='nome'><a href='perfil-alheio.php?usuario_id=" . $post['usuario_id'] . "'>" . htmlspecialchars($post['nome']) . "</a></p>";
            }
            ?>
            <p class="data-post"><?php echo date("d/m/Y", strtotime($post['data_criacao'])); ?></p>
        </div>
        <div class="menu-container">
            <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
            <div class="dropdown-menu" id="dropdown-menu">
                <ul>
                    <?php if ($post['usuario_id'] == $_SESSION['id']): ?>
                        <?php if ($post['devolucao'] == 'nao'): ?>
                            <!-- Se a postagem pertence ao usuário logado -->
                            <li><button onclick="openEditPost(<?php echo $postId; ?>)">Editar</button></li>
                            <li><button class="dropdown-item"
                                    onclick="openDeletePostModal(<?php echo $postId; ?>)">Excluir</button></li>
                            <?php if ($post['status'] == 'encontrado'): ?>
                                <!-- Caso seja um objeto achado -->
                                <li><button class="dropdown-item"
                                        onclick="openConfirmModalMarcarComoReivindicado(<?php echo $postId; ?>)">Marcar
                                        como
                                        'reivindicado'</button></li>
                            <?php else: ?>
                                <!-- Caso seja um objeto perdido -->
                                <li><button class="dropdown-item"
                                        onclick="openConfirmModalMarcarComoEncontrado(<?php echo $postId; ?>)">Marcar
                                        como
                                        'encontrado'</button></li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li><button class="dropdown-item"
                                    onclick="openDeletePostModal(<?php echo $postId; ?>)">Excluir</button></li>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if ($post['devolucao'] == 'nao'): ?>
                            <!-- Se a postagem pertence a outro usuário -->
                            <li><button class="dropdown-item" onclick="openReportForm(<?php echo $postId; ?>)">Reportar</button>
                            </li>
                            <?php if ($post['status'] == 'encontrado'): ?>
                                <!-- Caso seja um objeto achado -->
                                <li><button class="dropdown-item" onclick="openConfirmPopup(<?php echo $postId; ?>)">Reivindicar
                                        item</button></li>
                            <?php else: ?>
                                <!-- Caso seja um objeto perdido -->
                                <li><button class="dropdown-item"
                                        onclick="openConfirmPopupItemPerdido(<?php echo $postId; ?>)">Entrar em
                                        contato com usuário</button></li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li><button class="dropdown-item" onclick="openReportForm(<?php echo $postId; ?>)">Reportar</button>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="conteudo-principal">
        <h2 class="titulo"><?php echo htmlspecialchars($post['titulo']); ?></h2>
        <div class="midia">
            <?php if ($post['imagem']): ?>
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
                <?php echo htmlspecialchars($post['status'] == 'encontrado' ? 'objeto achado' : 'objeto perdido'); ?>
            </button>
            <button class="tag-item"><?php echo htmlspecialchars($post['categoria']); ?></button>
        </div>
        <div class="acoes">
            <?php if ($post['usuario_id'] != $_SESSION['id']): ?>
                <?php if ($post['devolucao'] == 'nao'): ?>
                    <?php if ($post['status'] == 'encontrado'): ?>
                        <!-- Caso seja um objeto encontrado -->
                        <button class="e-meu" onclick="openConfirmPopup(<?php echo $postId; ?>)">é meu !</button>
                    <?php elseif ($post['status'] == 'perdido'): ?>
                        <!-- Caso seja um objeto perdido -->
                        <button class="encontrei" onclick="openConfirmPopupItemPerdido(<?php echo $postId; ?>)">encontrei !</button>
                    <?php endif; ?>
                <?php elseif ($post['devolucao'] == 'sim'): ?>
                    <?php if ($post['status'] == 'encontrado'): ?>
                        <!-- Caso seja um objeto encontrado -->
                        <button class="e-meu indisponivel" onclick="openConfirmPopup(<?php echo $postId; ?>)" disabled>é meu
                            !</button>
                        <p class="infodevolucao">Reivindicado por: Fulano de tal</p>
                    <?php elseif ($post['status'] == 'perdido'): ?>
                        <!-- Caso seja um objeto perdido -->
                        <button class="encontrei indisponivel" onclick="openConfirmPopupItemPerdido(<?php echo $postId; ?>)"
                            disabled>encontrado</button>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>