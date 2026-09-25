CREATE DATABASE control_work;
USE control_work;

-- Tabela que armazena os usuarios do sistema.
CREATE TABLE usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY, -- ID unico, gerado automaticamente.
    nome VARCHAR(50) NOT NULL, -- Nome obrigatorio, com ate 50 caracteres.
    sobrenome VARCHAR(80), -- Sobrenome opcional.
    email VARCHAR(100) NOT NULL UNIQUE, -- Email obrigatorio e exclusivo.
    senha VARCHAR(200) NOT NULL, -- Senha obrigatoria; deve ser criptografada.
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data e hora automaticas do cadastro.
) DEFAULT CHARSET=utf8mb4; -- Aceita acentos e emojis.
   
   


-- Tabela que armazena as tarefas dos usuarios.
CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY, -- ID unico, gerado automaticamente.
    usuario_id INT NOT NULL, -- ID do usuario dono da tarefa.
    titulo VARCHAR(150) NOT NULL, -- Titulo obrigatorio da tarefa.
    descricao TEXT, -- Descricao opcional da tarefa.
    concluida TINYINT(1) NOT NULL DEFAULT 0, -- 0 = pendente; 1 = concluida.
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data e hora da criacao.
    atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Data da ultima alteracao.
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE -- Apaga as tarefas quando o usuario for apagado.
) DEFAULT CHARSET=utf8mb4; -- Aceita acentos e emojis.