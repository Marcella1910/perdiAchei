CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    foto_perfil VARCHAR(255),
    token VARCHAR(255) NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(80) NOT NULL,
    descricao VARCHAR(280),
    categoria VARCHAR(50),
    status ENUM('perdido', 'encontrado') NOT NULL,
    imagem LONGBLOB,
    tipo_imagem VARCHAR(50),
    devolucao ENUM('sim', 'nao') NOT NULL DEFAULT 'nao',
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reclamante VARCHAR(100) DEFAULT NULL,
    usuario_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);
