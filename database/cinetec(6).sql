-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Out-2022 às 22:36
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cinetec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinhos`
--

CREATE TABLE `carrinhos` (
  `id` int(11) NOT NULL,
  `clientes_id` int(11) NOT NULL,
  `datahora_abertura` datetime NOT NULL,
  `datahora_fechamento` datetime DEFAULT NULL,
  `prazo_pagamento` datetime DEFAULT NULL,
  `numero_pedido` varchar(255) NOT NULL,
  `carrinho_ativo` tinyint(4) NOT NULL DEFAULT 1,
  `pagamento` tinyint(4) NOT NULL DEFAULT 0,
  `cancelado` tinyint(4) NOT NULL DEFAULT 0,
  `expirado` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartoes`
--

CREATE TABLE `cartoes` (
  `id` int(11) NOT NULL,
  `numero_cartao` varchar(255) NOT NULL,
  `cvv_cartao` varchar(255) NOT NULL,
  `nome_cartao` varchar(255) NOT NULL,
  `ano_vencimento` varchar(255) NOT NULL,
  `mes_vencimento` varchar(45) NOT NULL,
  `clientes_id` int(11) NOT NULL,
  `tipo_cartao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cinemas`
--

CREATE TABLE `cinemas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cinemas`
--

INSERT INTO `cinemas` (`id`, `nome`, `logo`) VALUES
(1, 'CINETEC', 'logo.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ddd_celular` varchar(255) NOT NULL,
  `numero_celular` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filiais`
--

CREATE TABLE `filiais` (
  `id` int(11) NOT NULL,
  `cinemas_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `localidade` varchar(255) NOT NULL,
  `uf` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone_ddd` varchar(45) NOT NULL,
  `telefone_numero` varchar(45) NOT NULL,
  `whatsapp_ddd` varchar(45) NOT NULL,
  `whatsapp_numero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `filiais`
--

INSERT INTO `filiais` (`id`, `cinemas_id`, `nome`, `cep`, `logradouro`, `complemento`, `bairro`, `localidade`, `uf`, `numero`, `email`, `telefone_ddd`, `telefone_numero`, `whatsapp_ddd`, `whatsapp_numero`) VALUES
(1, 1, 'CINETEC ARACATUBA', '16052045', 'Avenida Prestes Maia', 'FATEC', 'Ipanema', 'Araçatuba', 'SP', 1764, 'secretaria.fatec.aracatuba@gmail.com', '18', '36259917', '18', '36259917');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sinopse` longtext NOT NULL,
  `filme_categorias_id` int(11) NOT NULL,
  `capa` varchar(255) NOT NULL,
  `duracao` int(11) NOT NULL,
  `faixa_etaria` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `preco_meia` decimal(2,0) NOT NULL,
  `preco_inteira` decimal(2,0) NOT NULL,
  `ano` int(11) NOT NULL,
  `diretor_principal` varchar(255) NOT NULL,
  `ator_principal_1` varchar(255) NOT NULL,
  `ator_principal_2` varchar(255) NOT NULL,
  `ator_principal_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `nome`, `sinopse`, `filme_categorias_id`, `capa`, `duracao`, `faixa_etaria`, `audio`, `preco_meia`, `preco_inteira`, `ano`, `diretor_principal`, `ator_principal_1`, `ator_principal_2`, `ator_principal_3`) VALUES
(1, 'Halloween Ends - O Acerto de Contas Final', 'Último filme da franquia Halloween. Após um período de paz, Laurie voltará para combater o mal de uma vez por todas depois que uma onda de violência e maldade alastra a cidade.', 25, '1.png', 111, '16', 'dublado', '20', '40', 2022, 'David Gordon Green', 'Jamie Lee Curtis', 'Andi Matichak', 'Will Patton'),
(2, 'Sorria', 'Depois que uma de suas pacientes morre de uma maneira trágica no consultório, uma psiquiatra começa a experimentar ocorrências bizarras. ', 25, '2.png', 115, '14', 'legendado', '20', '40', 2022, 'Parker Finn', 'Sosie Bacon', 'Jessie T. Usher', 'Kyle Gallner'),
(3, 'A Mulher Rei', 'Um épico histórico inspirado nos fatos reais que aconteceram no Reino do Daomé, um dos estados mais poderosos da África nos séculos XVIII e XIX.', 1, '3.png', 135, '16', 'dublado', '20', '40', 2022, 'Gina Prince-Bythewood', 'Viola Davis', 'Thuso Mbedu', 'Lashana Lynch'),
(4, 'Caça Implacável', 'Um casal com dificuldades no relacionamento param em um posto de gasolina a caminho da casa dos pais de um deles para passar um tempo separados. Porém, um misterioso homem e um caminhão param quando um deles sai do carro e desaparece. ', 1, '4.png', 96, '14', 'dublado', '20', '40', 2022, 'Brian Goodman', 'Gerard Butler', 'Jaimie Alexander', 'Russel Hornsby'),
(5, 'Morte Morte Morte', 'Um grupo de jovens ricos planejam uma festa no meio do nada e o que parecia ser apenas um jogo de festa se torna em algo mortal. ', 7, '5.png', 95, '18', 'legendado', '20', '40', 2022, 'Halina Rejin', 'Amanda Stenberg', 'Maria Bakalova', 'Rachel Sennott'),
(6, 'Orfã 2: A Origem', 'Após fugir do manicômio em que estava, Esther volta nesta prequela do filme A Órfã (2009) para se passar a filha desaparecida de uma família. No entanto, uma mãe fará de tudo para proteger sua família. ', 25, '6.png', 99, '16', 'legendado', '20', '40', 2022, 'William Brent Bell', 'Isabelle Fuhrman', 'Julia Stiles', 'Rossif Sutherland'),
(7, 'Adão Negro', 'Adão Negro é o filme solo do anti-herói, baseado no personagem em quadrinhos Black Adam (Dwayne Johnson) da DC Comics, grande antagonista de Shazam!, tendo no longa, sua história de origem explorada, e revelando seu passado de escravo no país Kahndaq. Nascido no Egito Antigo, o anti-herói tem super força, velocidade, resistência, capacidade de voar e de disparar raios. Alter ego de Teth-Adam e filho do faraó Ramsés II, Adão Negro foi consumido por poderes mágicos e transformado em um feiticeiro. Grande inimigo de Shazam! nas HQs, apesar dele acreditar em seu pontecial e, inclusive, oferecê-lo como um guerreiro do bem, Adão Negro acaba usando suas habilidades especiais para o mal. O anti-herói em busca de redenção ou um herói que se tornou vilão, pode ser capaz de destruir tudo o que estiver pela frente - ou de encontrar seu caminho.', 1, '7.png', 125, '12', 'dublado', '20', '40', 2022, 'Jaume Collet-Serra', 'Dwayne Johnson', 'Aldis Hodge', 'Pierce Brosnan'),
(8, 'A Lista de Schindler', 'A inusitada história de Oskar Schindler (Liam Neeson), um sujeito oportunista, sedutor, \"armador\", simpático, comerciante no mercado negro, mas, acima de tudo, um homem que se relacionava muito bem com o regime nazista, tanto que era membro do próprio Partido Nazista (o que não o impediu de ser preso algumas vezes, mas sempre o libertavam rapidamente, em razão dos seus contatos). No entanto, apesar dos seus defeitos, ele amava o ser humano e assim fez o impossível, a ponto de perder a sua fortuna mas conseguir salvar mais de mil judeus dos campos de concentração.', 20, '8.png', 195, 'livre', 'dublado', '20', '40', 1991, 'Steven Spielberg', 'Liam Neeson', 'Ben Kngsley', 'Ralph Fiennes'),
(9, 'Um Sonho de Liberdade', 'Em 1946, Andy Dufresne (Tim Robbins), um jovem e bem sucedido banqueiro, tem a sua vida radicalmente modificada ao ser condenado por um crime que nunca cometeu, o homicídio de sua esposa e do amante dela. Ele é mandado para uma prisão que é o pesadelo de qualquer detento, a Penitenciária Estadual de Shawshank, no Maine. Lá ele irá cumprir a pena perpétua. Andy logo será apresentado a Warden Norton (Bob Gunton), o corrupto e cruel agente penitenciário, que usa a Bíblia como arma de controle e ao Capitão Byron Hadley (Clancy Brown) que trata os internos como animais. Andy faz amizade com Ellis Boyd Redding (Morgan Freeman), um prisioneiro que cumpre pena há 20 anos e controla o mercado negro da instituição.', 13, '9.png', 142, 'livre', 'dublado', '20', '40', 1995, 'Frank Darabont', 'Tim Robbins', 'Morgan Freeman', 'Bob Gunton'),
(10, 'O Rei Leão', 'Clássico da Disney, a animação acompanha Mufasa (voz de James Earl Jones), o Rei Leão, e a rainha Sarabi (voz de Madge Sinclair), apresentando ao reino o herdeiro do trono, Simba (voz de Matthew Broderick). O recém-nascido recebe a bênção do sábio babuíno Rafiki (voz de Robert Guillaume), mas ao crescer é envolvido nas artimanhas de seu tio Scar (voz de Jeremy Irons), o invejoso e maquiavélico irmão de Mufasa, que planeja livrar-se do sobrinho e herdar o trono.', 27, '10.png\r\n', 89, 'livre', 'dublado', '20', '40', 1994, 'Roger Allers', 'Garcia Júnior', 'Matthew Broderick', 'James Earl Jones');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme_categorias`
--

CREATE TABLE `filme_categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `filme_categorias`
--

INSERT INTO `filme_categorias` (`id`, `nome`) VALUES
(1, 'Ação'),
(2, 'Aventura'),
(3, 'Cinema de arte'),
(4, 'Chanchada'),
(5, 'Comédia'),
(6, 'Comédia de Ação'),
(7, 'Comédia de terror'),
(8, 'Comédia dramática'),
(9, 'Comédia romântica'),
(10, 'Dança'),
(11, 'Documentário'),
(12, 'Docuficção'),
(13, 'Drama'),
(14, 'Espionagem'),
(15, 'Faroeste'),
(16, 'Fantasia'),
(17, 'Fantasia científica'),
(18, 'Ficção científica'),
(19, 'Filmes com truques'),
(20, 'Filmes de guerra'),
(21, 'Mistério'),
(22, 'Musical'),
(23, 'Filme policial'),
(24, 'Romance'),
(25, 'Terror'),
(26, 'Thriller'),
(27, 'Animação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingressos`
--

CREATE TABLE `ingressos` (
  `id` int(11) NOT NULL,
  `sessoes_id` int(11) NOT NULL,
  `poltronas_id` int(11) NOT NULL,
  `valor` decimal(2,0) NOT NULL,
  `carrinhos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `ativo`) VALUES
(1, '', 1),
(2, '', 1),
(3, '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `poltronas`
--

CREATE TABLE `poltronas` (
  `id` int(11) NOT NULL,
  `salas_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `coord_x` varchar(255) NOT NULL,
  `coord_y` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `produto_categorias_id` int(11) NOT NULL,
  `preco` decimal(2,0) NOT NULL,
  `imagem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `produto_categorias_id`, `preco`, `imagem`) VALUES
(1, 'Pipoca Pequena', 2, '18', 'pequena.png\r\n'),
(2, 'Pipoca Média', 2, '23', 'media.png\r\n'),
(3, 'Pipoca Grande', 2, '29', 'grande.png\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_categorias`
--

CREATE TABLE `produto_categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto_categorias`
--

INSERT INTO `produto_categorias` (`id`, `nome`) VALUES
(1, 'Bebidas'),
(2, 'Pipocas\r\n'),
(3, 'Combos'),
(4, 'Doces');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_compras`
--

CREATE TABLE `produto_compras` (
  `id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_unitario` decimal(2,0) NOT NULL,
  `carrinhos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `filiais_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id`, `nome`, `filiais_id`) VALUES
(3, 'Verde', 1),
(4, 'Vermelha', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessoes`
--

CREATE TABLE `sessoes` (
  `id` int(11) NOT NULL,
  `salas_id` int(11) NOT NULL,
  `filmes_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sessoes`
--

INSERT INTO `sessoes` (`id`, `salas_id`, `filmes_id`, `data`, `hora_inicio`, `status`) VALUES
(1, 3, 3, '2022-10-21', '14:30:00', 1),
(2, 3, 2, '2022-10-21', '18:00:00', 1),
(3, 4, 3, '2022-10-25', '15:15:00', 1),
(4, 3, 2, '2022-10-31', '17:45:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ddd_celular` varchar(255) NOT NULL,
  `numero_celular` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `nome`, `sobrenome`, `email`, `ddd_celular`, `numero_celular`, `cpf`, `foto`) VALUES
(1, 'admin', '12345678', 'Joaquim', 'Neto', 'neto.945@live.com', '18', '997052071', '36790476814', '36790476814.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carrinhos`
--
ALTER TABLE `carrinhos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_id_idx` (`clientes_id`);

--
-- Índices para tabela `cartoes`
--
ALTER TABLE `cartoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_id_idx` (`clientes_id`);

--
-- Índices para tabela `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `filiais`
--
ALTER TABLE `filiais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cinemas_id_idx` (`cinemas_id`);

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filme_categorias_id_idx` (`filme_categorias_id`);

--
-- Índices para tabela `filme_categorias`
--
ALTER TABLE `filme_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ingressos`
--
ALTER TABLE `ingressos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrinhos_id_idx` (`carrinhos_id`),
  ADD KEY `sessoes_id_idx` (`sessoes_id`),
  ADD KEY `poltronas_id_idx` (`poltronas_id`);

--
-- Índices para tabela `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `poltronas`
--
ALTER TABLE `poltronas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salas_id_idx` (`salas_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_categorias_id_idx` (`produto_categorias_id`);

--
-- Índices para tabela `produto_categorias`
--
ALTER TABLE `produto_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto_compras`
--
ALTER TABLE `produto_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produtos_id_idx` (`produtos_id`),
  ADD KEY `carrinhos_id_idx` (`carrinhos_id`);

--
-- Índices para tabela `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filiais_id_idx` (`filiais_id`);

--
-- Índices para tabela `sessoes`
--
ALTER TABLE `sessoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salas_id_idx` (`salas_id`),
  ADD KEY `filmes_id_idx` (`filmes_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinhos`
--
ALTER TABLE `carrinhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cartoes`
--
ALTER TABLE `cartoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `filiais`
--
ALTER TABLE `filiais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `filme_categorias`
--
ALTER TABLE `filme_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `ingressos`
--
ALTER TABLE `ingressos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `poltronas`
--
ALTER TABLE `poltronas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produto_categorias`
--
ALTER TABLE `produto_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produto_compras`
--
ALTER TABLE `produto_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `sessoes`
--
ALTER TABLE `sessoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `carrinhos`
--
ALTER TABLE `carrinhos`
  ADD CONSTRAINT `carrinhos_clientes_id` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `cartoes`
--
ALTER TABLE `cartoes`
  ADD CONSTRAINT `cartoes_clientes_id` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `filiais`
--
ALTER TABLE `filiais`
  ADD CONSTRAINT `cinemas_id` FOREIGN KEY (`cinemas_id`) REFERENCES `cinemas` (`id`);

--
-- Limitadores para a tabela `filmes`
--
ALTER TABLE `filmes`
  ADD CONSTRAINT `filme_categorias_id` FOREIGN KEY (`filme_categorias_id`) REFERENCES `filme_categorias` (`id`);

--
-- Limitadores para a tabela `ingressos`
--
ALTER TABLE `ingressos`
  ADD CONSTRAINT `ingressos_carrinhos_id` FOREIGN KEY (`carrinhos_id`) REFERENCES `carrinhos` (`id`),
  ADD CONSTRAINT `poltronas_id` FOREIGN KEY (`poltronas_id`) REFERENCES `poltronas` (`id`),
  ADD CONSTRAINT `sessoes_id` FOREIGN KEY (`sessoes_id`) REFERENCES `sessoes` (`id`);

--
-- Limitadores para a tabela `poltronas`
--
ALTER TABLE `poltronas`
  ADD CONSTRAINT `poltronas_salas_id` FOREIGN KEY (`salas_id`) REFERENCES `salas` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produto_categorias_id` FOREIGN KEY (`produto_categorias_id`) REFERENCES `produto_categorias` (`id`);

--
-- Limitadores para a tabela `produto_compras`
--
ALTER TABLE `produto_compras`
  ADD CONSTRAINT `produto_compras_carrinhos_id` FOREIGN KEY (`carrinhos_id`) REFERENCES `carrinhos` (`id`),
  ADD CONSTRAINT `produtos_id` FOREIGN KEY (`produtos_id`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `salas`
--
ALTER TABLE `salas`
  ADD CONSTRAINT `filiais_id` FOREIGN KEY (`filiais_id`) REFERENCES `filiais` (`id`);

--
-- Limitadores para a tabela `sessoes`
--
ALTER TABLE `sessoes`
  ADD CONSTRAINT `salas_id` FOREIGN KEY (`salas_id`) REFERENCES `salas` (`id`),
  ADD CONSTRAINT `sessoes_filmes_id` FOREIGN KEY (`filmes_id`) REFERENCES `filmes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
