-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql100.infinityfree.com
-- Tempo de geração: 30-Jan-2026 às 10:26
-- Versão do servidor: 11.4.9-MariaDB
-- versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `if0_40948955_gameslibrary`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Jogos`
--

CREATE TABLE `Jogos` (
  `Codigo_Jogo` bigint(20) UNSIGNED NOT NULL,
  `Codigo_Produtor` bigint(20) UNSIGNED NOT NULL,
  `CodTipoJogo` bigint(20) UNSIGNED NOT NULL,
  `Nome_Jogo` varchar(50) NOT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `Preco` double NOT NULL,
  `DataLancamento` date NOT NULL,
  `IMGjg` varchar(100) DEFAULT NULL,
  `JGbg` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `Jogos`
--

INSERT INTO `Jogos` (`Codigo_Jogo`, `Codigo_Produtor`, `CodTipoJogo`, `Nome_Jogo`, `descricao`, `Preco`, `DataLancamento`, `IMGjg`, `JGbg`) VALUES
(32, 30, 3, 'Beyond Two Souls', 'O jogo Ã© centrado em questÃµes sobre aquilo que acontece depois da morte. O jogador controla a personagem Jodie Holmes durante 15 anos (8-23) da sua vida, numa viagem para descobrir o significado de Aiden, uma entidade sobrenatural que estÃ¡ ligada a Jodie desde seu nascimento. O produtor fez notar que os jogadores podem ser capazes de descobrir ', 12, '2013-10-08', './files/IMGJG/BeyondTwoSouls.jpg', './files/IMGBG/BeyondTwoSouls.jpg'),
(29, 0, 0, '', '', 0, '0000-00-00', './files/IMGJG/Naruto.jpg', './files/IMGBG/Naruto.png'),
(30, 35, 3, 'God of War', 'God of War Ã© uma sÃ©rie de jogos eletrÃ´nicos de aÃ§Ã£o-aventura vagamente baseado nas mitologias grega e nÃ³rdica sendo criado originalmente por David Jaffe da Santa Monica Studio. Iniciada em 2005, a sÃ©rie tornou-se carro-chefe para a marca PlayStation, que consiste em oito jogos em vÃ¡rias pla', 54, '2020-02-01', './files/IMGJG/GodofWar.jpg', './files/IMGBG/GodofWar.jpg'),
(28, 0, 0, '', '', 0, '0000-00-00', './files/IMGJG/Sonic.jpeg', './files/IMGBG/Sonic.png'),
(33, 9, 3, 'Need For Speed', 'Need for Speed Ã© uma sÃ©rie de jogos eletrÃ´nicos de corrida automÃ³vel publicada pela Electronic Arts e produzida por vÃ¡rios estÃºdios incluindo o canadiano EA Black Box, o britÃ¢nico Criterion Games e o sueco Ghost Games', 12, '2020-01-03', './files/IMGJG/NeedForSpeed.jpg', './files/IMGBG/NeedForSpeed.jpg'),
(37, 28, 7, 'NBA 2K20', 'NBA 2K20 Ã© um videogame de simulaÃ§Ã£o de basquete desenvolvido pela Visual Concepts e publicado pela 2K Sports, baseado na National Basketball Association. Ã‰ a 21Âª ediÃ§Ã£o da franquia NBA 2K e a sucessora da NBA 2K19.', 50, '2019-12-18', './files/IMGJG/NBA2K20.avif', './files/IMGBG/NBA2K20.jpg'),
(138, 32, 3, 'Minecraft', 'Minecraft Ã© um jogo eletrÃ´nico sandbox de sobrevivÃªncia de 2011 desenvolvido e publicado pela desenvolvedora sueca Mojang Studios. Originalmente criado por Markus \"Notch\" Persson usando a linguagem de programaÃ§Ã£o Java, a primeira versÃ£o alfa pÃºblica foi lanÃ§ada em 17 de maio de 2009.', 10, '2010-02-08', './files/IMGJG/Minecraft.jpg', './files/IMGBG/Minecraft.jpg'),
(137, 16, 3, 'Counter-Strike: Global Offensive', 'Counter-Strike: Global Offensive (CS:GO) is a iconic 2012 tactical FPS developed by Valve and Hidden Path Entertainment, focusing on team-based objectives like planting/defusing bombs. As a free-to-play title (since 2018), it features competitive, casual', 12, '2013-01-12', './files/IMGJG/Counter-Strike:GlobalOffensive.jpg', './files/IMGBG/Counter-Strike:GlobalOffensive.avif'),
(136, 16, 3, 'Red Dead Redemption 2', 'Red Dead Redemption 2 Ã© um jogo eletrÃ´nico de aÃ§Ã£o-aventura desenvolvido e publicado pela Rockstar Games. Ã‰ o terceiro tÃ­tulo da sÃ©rie Red Dead e uma prequela de Red Dead Redemption, tendo sido lanÃ§ado em outubro de 2018 para PlayStation 4 e Xbox One e em novembro de 2019', 23, '2018-01-26', './files/IMGJG/RedDeadRedemption2.jpg', './files/IMGBG/RedDeadRedemption2.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `JogosPlataforma`
--

CREATE TABLE `JogosPlataforma` (
  `CodigoPlataforma` bigint(20) UNSIGNED NOT NULL,
  `CodigoJogo` bigint(20) UNSIGNED NOT NULL,
  `DataLanca` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `JogosPlataforma`
--

INSERT INTO `JogosPlataforma` (`CodigoPlataforma`, `CodigoJogo`, `DataLanca`) VALUES
(9, 13, '2010-07-08'),
(10, 7, '2017-10-17'),
(8, 28, '2017-08-15'),
(4, 21, '2019-10-12'),
(12, 122, '2014-09-05'),
(12, 130, '2020-06-10'),
(10, 121, '2008-11-04'),
(11, 136, '0000-00-00'),
(11, 130, '2020-06-10'),
(10, 3, '2013-12-17'),
(4, 3, '2015-12-17'),
(12, 123, '2011-09-22'),
(10, 123, '2011-09-22'),
(6, 137, '0000-00-00'),
(2, 138, '0000-00-00'),
(8, 123, '2011-09-22'),
(11, 129, '2020-06-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ListaDesejos`
--

CREATE TABLE `ListaDesejos` (
  `CodigoJogo` bigint(20) UNSIGNED NOT NULL,
  `codigUti` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `ListaDesejos`
--

INSERT INTO `ListaDesejos` (`CodigoJogo`, `codigUti`) VALUES
(3, 0),
(3, 181),
(28, 181),
(28, 182),
(29, 181),
(30, 0),
(30, 181),
(32, 0),
(32, 181),
(33, 181),
(33, 189),
(136, 0),
(136, 189);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Plataforma`
--

CREATE TABLE `Plataforma` (
  `Codigo_Plataforma` bigint(20) UNSIGNED NOT NULL,
  `Nome_Plataforma` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `Plataforma`
--

INSERT INTO `Plataforma` (`Codigo_Plataforma`, `Nome_Plataforma`) VALUES
(2, 'Xbox 360'),
(3, 'Playstation 2'),
(4, 'Wii'),
(5, 'Nintendo 3DS'),
(6, 'PC'),
(8, 'Nintendo Switch'),
(9, 'WII U'),
(10, 'Playstation 3'),
(11, 'Playstation 4'),
(12, 'Xbox one'),
(13, 'Playstation Vita'),
(14, 'PlayStation Portable');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Produtores`
--

CREATE TABLE `Produtores` (
  `Codigo_Produtor` bigint(20) UNSIGNED NOT NULL,
  `Nome_Produtor` char(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `Produtores`
--

INSERT INTO `Produtores` (`Codigo_Produtor`, `Nome_Produtor`) VALUES
(1, 'Sony'),
(3, 'Nintendo'),
(4, 'Nenhuma'),
(5, 'Microsoft'),
(6, 'Tencent'),
(7, 'NCSoft'),
(8, 'Activision Blizzard'),
(9, 'EA'),
(10, 'Sega'),
(11, 'Nexon'),
(12, 'Namco Bandai'),
(13, 'Ubisoft'),
(14, 'Valve Corporation'),
(15, 'Capcom'),
(16, 'Rockstar Games'),
(17, 'Polyphony Digital'),
(18, ' Behaviour Interactive'),
(19, 'PUBG Corp.'),
(24, 'Re-Logic'),
(25, 'Riot Games'),
(26, 'Naughty Dog'),
(39, 'Nuno INC'),
(28, 'Visual Concepts'),
(29, 'Dean Herbert'),
(30, 'Quantic Dream'),
(31, 'Dontnod Entertainment'),
(32, 'Mojang'),
(33, 'From Software	'),
(34, 'Insomniac Games'),
(35, 'Santa Monica Studio'),
(36, 'Psyonix'),
(37, 'Epic Games');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestoes`
--

CREATE TABLE `sugestoes` (
  `Codigo_Sugestao` int(10) NOT NULL,
  `sugesta` varchar(50) NOT NULL,
  `CodUtil` bigint(20) NOT NULL,
  `NomePr` varchar(50) NOT NULL,
  `lido` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `sugestoes`
--

INSERT INTO `sugestoes` (`Codigo_Sugestao`, `sugesta`, `CodUtil`, `NomePr`, `lido`) VALUES
(106, 'Dark Souls', 164, 'From Software', 1),
(108, 'Sonic', 137, 'sdvsd', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Tipo_de_Jogo`
--

CREATE TABLE `Tipo_de_Jogo` (
  `CodTipoJogo` bigint(20) UNSIGNED NOT NULL,
  `Genero` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `Tipo_de_Jogo`
--

INSERT INTO `Tipo_de_Jogo` (`CodTipoJogo`, `Genero`) VALUES
(3, 'AÃ§Ã£o'),
(4, 'Aventura'),
(5, 'EstratÃ©gia'),
(6, 'RPG'),
(7, 'Desporto'),
(8, 'Corrida'),
(9, 'Online'),
(10, 'SimulaÃ§Ã£o'),
(12, 'MOBA'),
(13, 'terror'),
(14, 'Multiplayer'),
(15, 'Single-player'),
(17, 'Guerra'),
(19, 'Musica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Tipo_de_utilizador`
--

CREATE TABLE `Tipo_de_utilizador` (
  `codtipoUti` bigint(20) UNSIGNED NOT NULL,
  `dsg` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `Tipo_de_utilizador`
--

INSERT INTO `Tipo_de_utilizador` (`codtipoUti`, `dsg`) VALUES
(13, 'Administrador'),
(12, 'Produtor'),
(17, 'Normal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Utilizadores`
--

CREATE TABLE `Utilizadores` (
  `codUti` bigint(20) UNSIGNED NOT NULL,
  `codtipoUti` bigint(20) UNSIGNED NOT NULL,
  `Login` varchar(15) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `Nome_Utilizador` varchar(100) NOT NULL,
  `nasc` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `ContaAtiva` tinyint(1) NOT NULL,
  `empresa` char(20) DEFAULT NULL COMMENT 'ser� utilizado para tipo de utilizadores fabricante',
  `img` varchar(100) DEFAULT NULL,
  `comprovativo` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `Utilizadores`
--

INSERT INTO `Utilizadores` (`codUti`, `codtipoUti`, `Login`, `pass`, `Nome_Utilizador`, `nasc`, `email`, `ContaAtiva`, `empresa`, `img`, `comprovativo`) VALUES
(0, 13, 'adm', 'c4ca4238a0b923820dcc509a6f75849b', 'Administrador defeito', '2001-09-16', 'adm.gamesLibrary@gmail.com', 1, '4', './backoffice/3P2/files/IMG/defeito.png', './backoffice/3P2/files/IMG/Comprovativo/adm.pdf'),
(187, 12, 'TestAccougnt', 'e5b3e5477c28452b5a20d50ef7922c41', 'TestAccounts TestAccounts', '2025-12-29', 'yavoj17818@djkux.com', 1, '4', './backoffice/3P2/files/IMG/defeito.png', NULL),
(181, 17, 'Jorge', 'c4ca4238a0b923820dcc509a6f75849b', 'Jorge Matos', '2001-09-16', 'jorge@gmail.com', 1, '4', './backoffice/3P2/files/IMG/defeito.png', NULL),
(182, 17, 'sonic', '202cb962ac59075b964b07152d234b70', 'no xei', '2020-06-10', 'sanic@gmail.com', 0, '4', './backoffice/3P2/files/IMG/defeito.png', NULL),
(186, 17, 'TestAccount', 'b784e66e40a105b3db18aa8f607df455', 'Test Account', '2001-09-16', 'TestAccount@test.com', 1, '4', './backoffice/3P2/files/IMG/TestAccount.jpg', NULL),
(188, 12, 'accountTsts', 'c23961674df545778c6df0fe0371dfca', 'accountTsts accountTsts', '2026-01-05', 'memeyi8407@ofular.com', 1, '4', './backoffice/3P2/files/IMG/defeito.png', NULL),
(189, 12, 'accountTstsd', '5565d5bd5a11eabd173c312ae2b04e3f', 'TestAccounts TestAccounts', '2026-01-05', 'yomak9e9189@djkux.com', 1, '3', './backoffice/3P2/files/IMG/defeito.png', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Jogos`
--
ALTER TABLE `Jogos`
  ADD PRIMARY KEY (`Codigo_Jogo`),
  ADD KEY `CodTipoJogo` (`CodTipoJogo`),
  ADD KEY `Codigo_Fabricante` (`Codigo_Produtor`);

--
-- Índices para tabela `JogosPlataforma`
--
ALTER TABLE `JogosPlataforma`
  ADD PRIMARY KEY (`CodigoPlataforma`,`CodigoJogo`),
  ADD KEY `Codigo_Jogo` (`CodigoJogo`);

--
-- Índices para tabela `ListaDesejos`
--
ALTER TABLE `ListaDesejos`
  ADD PRIMARY KEY (`CodigoJogo`,`codigUti`);

--
-- Índices para tabela `Plataforma`
--
ALTER TABLE `Plataforma`
  ADD PRIMARY KEY (`Codigo_Plataforma`);

--
-- Índices para tabela `Produtores`
--
ALTER TABLE `Produtores`
  ADD PRIMARY KEY (`Codigo_Produtor`);

--
-- Índices para tabela `sugestoes`
--
ALTER TABLE `sugestoes`
  ADD PRIMARY KEY (`Codigo_Sugestao`);

--
-- Índices para tabela `Tipo_de_Jogo`
--
ALTER TABLE `Tipo_de_Jogo`
  ADD PRIMARY KEY (`CodTipoJogo`);

--
-- Índices para tabela `Tipo_de_utilizador`
--
ALTER TABLE `Tipo_de_utilizador`
  ADD PRIMARY KEY (`codtipoUti`);

--
-- Índices para tabela `Utilizadores`
--
ALTER TABLE `Utilizadores`
  ADD PRIMARY KEY (`codUti`),
  ADD UNIQUE KEY `Login` (`Login`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `codtipoUti` (`codtipoUti`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Jogos`
--
ALTER TABLE `Jogos`
  MODIFY `Codigo_Jogo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT de tabela `Plataforma`
--
ALTER TABLE `Plataforma`
  MODIFY `Codigo_Plataforma` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `Produtores`
--
ALTER TABLE `Produtores`
  MODIFY `Codigo_Produtor` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `sugestoes`
--
ALTER TABLE `sugestoes`
  MODIFY `Codigo_Sugestao` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de tabela `Tipo_de_Jogo`
--
ALTER TABLE `Tipo_de_Jogo`
  MODIFY `CodTipoJogo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `Tipo_de_utilizador`
--
ALTER TABLE `Tipo_de_utilizador`
  MODIFY `codtipoUti` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `Utilizadores`
--
ALTER TABLE `Utilizadores`
  MODIFY `codUti` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
