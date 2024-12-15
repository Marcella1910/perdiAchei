<?php
session_start();

include_once 'dbconnect.php';
include_once 'validaSessao.php';


$query = "SELECT posts.id, posts.titulo, posts.descricao, categorias.nome AS categoria,
          posts.status, posts.imagem, posts.tipo_imagem, posts.data_criacao, posts.usuario_id,
          usuarios.nome AS usuario_nome, usuarios.foto_perfil
          FROM posts
          INNER JOIN usuarios ON posts.usuario_id = usuarios.id
          LEFT JOIN categorias ON posts.categoria_id = categorias.id
          ORDER BY posts.data_criacao DESC";


$result = $conn->query($query);

if (!$result) {
    die("Erro na consulta SQL: " . $conn->error);
}


date_default_timezone_set('America/Sao_Paulo'); // Altere para o fuso horário desejado

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perdiAchei</title>

    <link rel="stylesheet" href="css/feed.css">

    <!-- Estilos e scripts da barra -->
    <link rel="stylesheet" href="css/barra-acessibilidade.css">
    <script src="js/barra-acessibilidade.js" defer></script>

    <script src="https://kit.fontawesome.com/c1b7b8fa84.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Inclui a Navbar -->
    <?php include 'navbar.php'; ?>


    <!-- Main Container -->
    <div class="adjustable-font container">

        <!-- Inclui Left Menu -->
        <?php include 'leftMenu.php'; ?>

        <!-- Middle Content -->
        <div class="main-content">

            <!-- Painel de notificações -->
            <?php include 'notifications-painel.php'; ?>

            <!-- Criar post formulário -->
            <?php include 'create-post-form.php'; ?>

            <!--Visualizar o seu perfil-->
            <div class="visualiza-perfil">
                <div class="header-perfil">
                    <button class="editperfil" onclick="openEditProfile()">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <div class="ftperfil">
                        <!--Conferir de que cada foto de perfil de cada usuário apareça, e seja aquela que o usuário colocou-->
                        <?php
                        if (isset($_SESSION['foto_perfil']) && file_exists($_SESSION['foto_perfil'])) {
                            echo '<img src="' . $_SESSION['foto_perfil'] . '" alt="Profile Picture">';
                        } else {
                            echo '<img src="img/userspfp/usericon.jpg" alt="Profile Picture">';
                        }
                        ?>

                    </div>
                </div>

                <div class="middle-perfil">
                    <!--Mostrar nome do usuário da sessão-->
                    <?php
                    echo "<h2 class='nome'><u>{$_SESSION['nome']}</u></h2>";
                    ?>
                    <!--Mostrar username do usuário da sessão-->
                    <?php
                    echo "<h3 class = 'username'> @<u>{$_SESSION['usuario']}</u></h3>";
                    ?>

                </div>
                <!--Separação dos tipos dos itens-->
                <div class="menu-publicacoes">
                    <button class="menu-btn active" onclick="showSectionPerfil('objetos-perdidos')">objetos
                        perdidos</button>
                    <button class="menu-btn" onclick="showSectionPerfil('objetos-achados')">objetos achados</button>

                </div>
            </div>

            <!-- Create Post Section -->

            <!--Items perdidos do usuário-->
            <div id="objetos-perdidos" class="section-tipo active">
                <h3>Objetos Perdidos</h3>

                <div class="post">

                    <div class="post-header">
                        <div class="pfp-post">
                            <img class="pfp" src="img/userspfp/usericon.jpg">
                        </div>
                        <div class="perfil-post">
                            <p class="nome">kevin de bruyne</p>
                            <p class="data-post">12/12/12</p>
                        </div>
                        <div class="menu-container">
                            <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
                            <div class="dropdown-menu" id="dropdown-menu">
                                <ul>
                                    <li><button class="dropdown-item" onclick="openEditPost()">Editar</button></li>
                                    <li><button class="dropdown-item" onclick="openDeletePostModal()">Excluir</button>
                                    </li>
                                    <li><button class="dropdown-item"
                                            onclick="openConfirmModalMarcarComoEncontrado()">Marcar como
                                            'encontrado'</button></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="conteudo-principal">
                        <h2 class="titulo">
                            perdi minha carteiraa
                        </h2>
                        <div class="midia">
                            <img class="imagem-post" src="img/postagens/carteira.jpg">
                        </div>
                        <p class="texto-post">perdi minha carteira '-'</p>
                    </div>


                    <div class="post-footer">
                        <div class="tags-post">
                            <button class="tp_publicacao">
                                objeto perdido
                            </button>
                            <button class="tag-item">
                                <i class="fa-solid fa-id-card"></i>
                                documentos
                            </button>
                        </div>



                    </div>
                </div>


            </div>

            <!--Items achados do usuário-->
            <div id="objetos-achados" class="section-tipo">
                <h3>Objetos Achados</h3>

                <div class="post">

                    <div class="post-header">
                        <div class="pfp-post">
                            <img class="pfp" src="img/userspfp/usericon.jpg">
                        </div>
                        <div class="perfil-post">
                            <p class="nome">kevin de bruyne</p>
                            <p class="data-post">12/12/12</p>
                        </div>
                        <div class="menu-container">
                            <button class="menu-button" id="menu-button"><i class="fa-solid fa-ellipsis"></i></button>
                            <div class="dropdown-menu" id="dropdown-menu">
                                <ul>
                                    <li><button class="dropdown-item" onclick="openEditPost()">Editar</button></li>
                                    <li><button class="dropdown-item" onclick="openDeletePostModal()">Excluir</button>
                                    </li>
                                    <li><button class="dropdown-item"
                                            onclick="openConfirmModalMarcarComoReivindicado()">Marcar como
                                            'reivindicado'</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="conteudo-principal">
                        <h2 class="titulo">
                            encontrei um caderno
                        </h2>
                        <div class="midia">
                            <img class="imagem-post" src="img/postagens/caderno.jpg">
                        </div>
                        <p class="texto-post">caderno</p>
                    </div>


                    <div class="post-footer">
                        <div class="tags-post">
                            <button class="tp_publicacao">
                                objeto achado
                            </button>
                            <button class="tag-item">
                                <i class="fa-solid fa-pencil"></i> materiais escolares
                            </button>
                        </div>



                    </div>
                </div>




            </div>

            <!-- Posts -->

            <!-- Modal de editar perfil  -->
            <?php include 'editPerfilModal.php'; ?>

            <?php include 'confirmarReivindicarItemModal.php'; ?>

            <?php include 'editModal.php'; ?>

            <?php include 'deletePostModal.php'; ?>

            <?php include 'confirmModalItemPerdido.php'; ?>

            <!-- Modal de marcar como encontrado  -->
            <?php include 'confirmModalMarcarComoEncontrado.php'; ?>

            <!-- Modal de marcar como encontrado  -->
            <?php include 'formModalItemPerdido.php'; ?>

            <!-- Modal de marcar como reivindicado  -->
            <?php include 'confirmModalMarcarComoReivindicado.php'; ?>

            <!-- Modal de marcar como reivindicado  -->
            <?php include 'marcarComoReivindicado.php'; ?>


        </div>

        <!-- Right Menu -->
        <div class="right-menu">

        </div>

    </div>


    <script src="js/feed.js"></script>
</body>

</html>