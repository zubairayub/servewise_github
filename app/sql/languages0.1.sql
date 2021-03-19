-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 01:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servewise`
--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `eng` varchar(255) DEFAULT NULL,
  `pt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `value`, `eng`, `pt`) VALUES
(1, 'login', 'Login', 'Conecte-se'),
(2, 'welcome', 'Welcome', 'Receber'),
(4, 'to', 'To', 'Para'),
(5, 'or', 'or', 'ou'),
(6, 'with', 'with', 'com'),
(7, 'email', 'email', 'o email'),
(8, 'keep ', 'keep', 'guarda'),
(9, 'me', 'me', 'mim'),
(10, 'logged', 'logged', 'logado'),
(11, 'in', 'in', 'no'),
(12, 'Forget Password', 'Forget Password', 'Esqueceu a senha'),
(15, 'Do not', 'Do not', 'Não'),
(16, 'have an', 'have an', 'tem um'),
(17, 'account yet?', 'account yet?', 'conta ainda?'),
(19, 'Serial.No', 'Serial.No', 'Número de série'),
(20, 'Order Code', 'Order Code', 'Código de encomenda'),
(21, 'Customer', 'Customer', 'Cliente'),
(22, 'Amount', 'Amount', 'Quantia'),
(23, 'Delivery Status', 'Delivery Status', 'Status de entrega'),
(24, 'Payment Status', 'Payment Status', 'Status do pagamento'),
(25, 'Option', 'Option', 'Opção'),
(26, 'All Order', 'All Order', 'Todos os pedidos'),
(27, 'Customers List', 'Lista de Clientes', 'Lista de Clientes'),
(28, 'Serial No', 'Serial No', 'Número de série'),
(29, 'Name', 'Nome', 'Nome'),
(30, 'Email', 'Email', 'O email'),
(31, 'Phone', 'Phone', 'Telefone'),
(32, 'Brand', 'Brand', 'Marca'),
(33, 'vendor', 'vendor', 'fornecedor'),
(34, 'Option', 'Option', 'Opção'),
(35, 'Uplaod Images', 'Uplaod Images', 'Enviar imagens'),
(36, 'Add New Product', 'Add New Product', 'Adicionar Novo Produto'),
(37, 'View Product', 'View Product', 'Ver Produto'),
(38, 'Category', 'Category', 'Categoria'),
(39, 'Select Category', 'Select Category', 'Selecione a Categoria'),
(40, 'Sub Category', 'Sub Category', 'Subcategoria'),
(41, 'Select Second Level', 'Select Second Level', 'Selecione o segundo nível'),
(42, '2nd Sub Category', '2nd Sub Category', '2ª subcategoria'),
(43, 'Select Third Level', 'Select Third Level', 'Selecione o terceiro nível'),
(44, 'Name', 'Name', 'Nome'),
(46, 'Weight, KG', 'Weight, KG', 'Peso, KG'),
(47, 'Description', 'Description', 'Descrição'),
(48, 'Purchase Price', 'Purchase Price', 'Preço de compra'),
(49, 'Sell Price', 'Sell Price', 'Preço de venda'),
(50, 'Quantity', 'Quantity', 'Quantidade'),
(51, 'Is Featured', 'Is Featured', 'Está em destaque'),
(52, 'Publish', 'Publish', 'Publicar'),
(53, 'Incorrect input field', 'Incorrect input field', 'Campo de entrada incorreto'),
(54, 'Add Product', 'Add Product', 'Adicionar Produto'),
(55, 'Sign up', 'Sign up', 'Inscrever-se'),
(56, 'Log In', 'Log In', 'Conecte-se'),
(57, 'Category', 'Category', 'Categoria'),
(58, 'Category name', 'Category name', 'Nome da Categoria'),
(59, 'Category ID', 'Category ID', 'Categoria ID'),
(60, 'Category', 'Category', 'Categoria'),
(61, '2nd Level Category', '2nd Level Category', 'Categoria de 2º Nível'),
(62, 'add Category', 'add Category', 'Adicionar categoria'),
(63, 'Option', 'Option', '\r\nOpção'),
(64, 'Payment Status', 'Payment Status', 'Status do pagamento'),
(65, 'Delivery Status', 'Delivery Status', 'Status de entrega'),
(66, 'Amount', 'Amount', 'Quantia'),
(67, 'Customer', 'Customer', 'Cliente'),
(68, 'No. of Product', 'No. of Product', 'No. do produto'),
(69, 'Order Code', 'Order Code', 'Código de encomenda'),
(70, 'Serial.No', 'Serial.No', 'Número de série'),
(71, 'Action', 'Action', 'Açao'),
(72, 'Status', 'Status', 'Status'),
(73, 'Address', 'Address', 'Endereço'),
(74, 'Email', 'Email', 'O email'),
(75, 'Contact No', 'Contact No', 'Contato Não'),
(76, 'Branch Url', 'Branch Url', 'URL da filial'),
(77, 'Branch Name', 'Branch Name', 'Nome da filial'),
(78, 'Vendor', 'Vendor', 'Fornecedor'),
(79, 'Branch', 'Branch', 'Filial'),
(80, 'Stock left', 'Stock left', 'Estoque restante'),
(81, 'Quantity purchased', 'Quantity purchased', 'Quantidade comprada'),
(82, 'Selling Price', 'Selling Price', 'Preço de venda'),
(83, 'Purchased from', 'Purchased from', 'Comprado de\r\n'),
(84, 'Product Name', 'Product Name', 'Nome do Produto'),
(85, 'Serial.No', 'Serial.No', 'Número de série'),
(86, 'No. Of Wish', 'No. Of Wish', 'No. de desejo'),
(87, 'Product Name', 'Product Name', 'Nome do Produto'),
(88, 'Serial.No', 'Serial.No', 'Número de série'),
(89, 'Product Wishlist', 'Product Wishlist', 'Lista de desejos do produto'),
(90, 'User Search', 'User Search', 'Pesquisa de usuário'),
(91, 'Serial.No', 'Serial.No', 'Número de série'),
(93, 'No. of Search', 'No. of Search', 'No. de pesquisa'),
(95, 'Search by', 'Search by', 'Procurar por'),
(96, 'Option', 'Option', 'Opção'),
(97, 'Page Link', 'Page Link', 'link da página'),
(98, 'Featured', 'Featured', 'Destaque'),
(99, 'Status', 'Status', 'Status'),
(100, 'End Date', 'End Date', 'Data final'),
(101, 'Start Date', 'Start Date', 'Data de início'),
(102, 'Banner', 'Banner', 'Bandeira'),
(103, 'title', 'title', 'título'),
(104, 'Serial.No', 'Serial.No', 'Número de série'),
(105, 'Add New Deal', 'Add New Deal', 'Adicionar Novo Acordo'),
(106, 'Flash Deal', 'Flash Deal', 'Acordo Flash'),
(107, 'Sender Email', 'Sender Email', 'Email do Remetente'),
(108, 'Sender Name', 'Sender Name', 'Nome do remetente'),
(109, 'Attachment', 'Attachment', 'Acessório'),
(110, 'Multiple Available', 'Multiple Available', 'Múltiplos Disponíveis'),
(111, 'Multiple Available', 'Multiple Available', 'Múltiplos Disponíveis'),
(112, 'Subject', 'Subject', 'Sujeita'),
(113, 'Message Letter', 'Message Letter', 'Carta de Mensagem'),
(114, 'Email List', 'Email List', 'Lista de Emails\r\n'),
(115, 'Start Sending Email', 'Start Sending Email', 'Comece a enviar e-mail'),
(116, 'STOP', 'STOP', 'PARE'),
(117, 'Send Bulk SMS', 'Send Bulk SMS', 'Enviar SMS em Massa'),
(118, 'Mobile Users', 'Mobile Users', 'Usuários móveis'),
(119, 'SMS Subject', 'SMS Subject', 'Assunto SMS'),
(120, 'SMS Content', 'SMS Content', 'Conteúdo SMS'),
(121, 'SEND', 'SEND', 'ENVIAR'),
(122, 'list 1', 'list 1', 'lista 1'),
(123, 'list 2', 'list 2', 'lista 2'),
(124, 'list 3', 'list 3', 'lista 3'),
(128, 'Serial.No', 'Serial.No', 'Número de série'),
(129, 'E-mail', 'E-mail', 'O email'),
(130, 'Date', 'Date', 'Encontro'),
(131, 'All Subscribers', 'All Subscribers', 'Todos os assinantes'),
(132, 'Options', 'Options', 'Opções'),
(133, 'End Date', 'End Date', 'Data final'),
(134, 'Start Date', 'Start Date', 'Data de início\r\n'),
(135, 'Type', 'Type', 'Modelo'),
(136, 'Code', 'Code', 'Código'),
(137, 'Serial.No', 'Serial.No', 'Número de série'),
(138, 'Coupons', 'Coupons', 'Cupons'),
(139, 'Add New Coupon', 'Add New Coupon', 'Add New Coupon'),
(140, 'Add New Coupon', 'Add New Coupon', 'Adicionar novo cupom'),
(141, 'Email To', 'Email To', 'Email para'),
(142, 'Title', 'Title', 'Título'),
(143, 'Massage', 'Massage', 'Massagem'),
(144, 'E-mail', 'E-mail', 'O email'),
(145, 'Ticket (Support Desk)', 'Ticket (Support Desk)', 'Ingresso (balcão de suporte)'),
(146, 'View Table', 'View Table', 'Ver Tabela\r\n'),
(147, 'Send Ticket to', 'Send Ticket to', 'Enviar tíquete para'),
(148, 'Ticket Title', 'Ticket Title', 'Título do ingresso'),
(149, 'Ticket Discribtion', 'Ticket Discribtion', 'Discrição de Ingresso'),
(150, 'Send', 'Send', 'Mandar'),
(151, 'Serial No.', 'Serial No.', 'Número de série.'),
(152, 'Sender', 'Sender', 'Remetente'),
(153, 'Options', 'Options', 'Opções'),
(154, 'Serial No.', 'Serial No.', 'Número de série.'),
(155, 'Email', 'Email', 'O email'),
(156, 'Phone', 'Phone', 'Telefone'),
(157, 'Role', 'Role', 'Função'),
(158, 'Options', 'Options', 'Opções'),
(159, 'All Staff', 'All Staff', 'Todo o pessoal'),
(160, 'Add New Staff', 'Add New Staff', 'Adicionar nova equipe'),
(161, 'Premission Assign', 'Premission Assign', 'Atribuição de premissão'),
(162, 'Header', 'Header', 'Cabeçalho'),
(163, 'Header Logo', 'Header Logo', 'Logotipo do cabeçalho'),
(164, 'Show language Switch', 'Show language Switch', 'Mostrar mudança de idioma'),
(165, 'Header Logo :', 'Header Logo :', 'Logotipo do cabeçalho:'),
(166, 'Show Currency Switch', 'Show Currency Switch', 'Mostrar mudança de moeda'),
(167, 'Update', 'Update', 'Atualizar'),
(168, 'Footer', 'Footer', 'Rodapé'),
(169, 'Footer Logo', 'Footer Logo', 'Logotipo do rodapé\r\n'),
(170, 'About Discribtion :', 'About Discribtion :', 'Sobre a descrição:'),
(171, 'Update logo & Discribtion', 'Update logo & Discribtion', 'Atualizar logotipo e descrição'),
(172, 'Contact Address', 'Contact Address', 'endereço de contato'),
(173, 'Contact info', 'Contact info', 'Informação de contato'),
(174, 'Contact Phone', 'Contact Phone', 'telefone de contato'),
(175, 'Contact Phone', 'Contact Phone', 'telefone de contato'),
(176, 'Contact E-mail', 'Contact E-mail', 'Email de contato'),
(177, 'Update', 'Update', 'Atualizar'),
(178, 'Copyright Text', 'Copyright Text', 'Texto de Copyright'),
(179, 'Show Social Media Links.', 'Show Social Media Links.', 'Mostrar links de mídia social.'),
(180, 'Social links', 'Social links', 'Links sociais'),
(181, 'Update', 'Update', 'Atualizar'),
(182, 'Knowledgebase & Blog', 'Knowledgebase & Blog', 'Base de conhecimento e blog'),
(183, 'Title', 'Title', 'Título'),
(184, 'Artical Type', 'Artical Type', 'Tipo de Artigo'),
(185, 'Knowledge Base', 'Knowledge Base', 'Base de Conhecimento'),
(186, 'Update', 'Update', 'Atualizar'),
(187, 'Blog', 'Blog', 'Blog'),
(188, 'General Setting', 'General Setting', 'Configuração geral'),
(189, 'System Name', 'System Name', 'Nome do Sistema'),
(190, 'System Logo', 'System Logo', 'Logotipo do sistema'),
(191, 'System timezone', 'System timezone', 'Fuso horário do sistema'),
(192, 'Admin Login Page Background', 'Admin Login Page Background', 'Plano de fundo da página de login do administrador'),
(193, 'Update', 'Update', 'Atualizar'),
(194, 'Feature activation', 'Feature activation', 'Ativação de recurso'),
(195, 'HTTPS Activation', 'HTTPS Activation', 'Ativação HTTPS'),
(196, 'HTTPS Activation', 'HTTPS Activation', 'Ativação HTTPS'),
(197, 'Maintenance Mode', 'Maintenance Mode', 'Modo de manutenção'),
(198, 'Maintenance Mode Activation', 'Maintenance Mode Activation', 'Ativação do modo de manutenção'),
(199, 'Classified Product', 'Classified Product', 'Produto classificado'),
(200, 'Classified Product Activate', 'Classified Product Activate', 'Ativar produto classificado'),
(201, 'Business Related', 'Business Related', 'Relacionado aos negócios'),
(202, 'Email Verification', 'Email Verification', 'verificação de e-mail'),
(203, 'Category-based Commission', 'Category-based Commission', 'Comissão baseada em categoria'),
(204, 'Guest Checkout Activation', 'Guest Checkout Activation', 'Ativação de checkout de convidado'),
(205, 'Conversation Activation', 'Conversation Activation', 'Ativação de conversação'),
(206, 'Cash Payment Activation', 'Cash Payment Activation', 'Ativação de pagamento em dinheiro'),
(207, 'Payhere Activation', 'Payhere Activation', 'Ativação Payhere'),
(208, 'VoguePay Activation', 'VoguePay Activation', 'Ativação VoguePay'),
(209, 'PayStack Activation', 'PayStack Activation', 'Ativação PayStack'),
(210, 'Maintenance Mode Activation', 'Maintenance Mode Activation', 'Ativação do modo de manutenção\r\n'),
(211, 'Instamojo Payment Activation', 'Instamojo Payment Activation', 'Ativação de Pagamento Instamojo\r\n'),
(212, 'SSlCommerz Activation', 'SSlCommerz Activation', 'Ativação SSlCommerz'),
(213, 'Stripe Payment Activation', 'Stripe Payment Activation', 'Ativação do Stripe Payment'),
(214, 'Paypal Payment Activation', 'Paypal Payment Activation', 'Ativação de pagamento Paypal\r\n'),
(215, 'Payment Related', 'Payment Related', 'Relacionado ao Pagamento\r\n'),
(216, 'Email Verification', 'Email Verification', 'verificação de e-mail\r\n'),
(217, 'Category-based Commission', 'Category-based Commission', 'Comissão baseada em categoria\r\n'),
(218, 'Guest Checkout Activation', 'Guest Checkout Activation', 'Ativação de checkout de convidado\r\n'),
(219, 'Conversation Activation', 'Conversation Activation', 'Ativação de conversação\r\n'),
(220, 'Pickup Point Activation', 'Pickup Point Activation', 'Ativação do Ponto de Coleta'),
(221, 'Coupon System Activation', 'Coupon System Activation', 'Ativação do sistema de cupons\r\n'),
(222, 'Wallet System Activation', 'Wallet System Activation', 'Ativação do sistema de carteira\r\n'),
(223, 'Vendor System Activation', 'Vendor System Activation', 'Ativação do sistema do fornecedor'),
(224, 'Social Media Login', 'Social Media Login', 'Login de mídia social\r\n'),
(225, 'Facebook login', 'Facebook login', 'entrar no Facebook\r\n'),
(226, 'Google login', 'Google login', 'Login do Google\r\n'),
(227, 'Twitter login', 'Twitter login', 'Login no Twitter\r\n'),
(228, 'Username', 'Username', 'Nome de usuário\r\n'),
(229, 'Name', 'Name', 'Nome'),
(230, 'Contact No', 'Contact No', 'Contato Não'),
(231, 'Email', 'Email', 'O email\r\n'),
(232, 'Address', 'Address', 'Endereço'),
(233, 'Country', 'Country', 'País'),
(234, 'City', 'City', 'Cidade'),
(235, 'State', 'State', 'Estada'),
(236, 'Zip', 'Zip', 'Fecho eclair'),
(237, 'Status', 'Status', 'Status'),
(238, 'Action', 'Action', 'Action'),
(239, 'Signup Vendor', 'Signup Vendor', 'Fornecedor de inscrição'),
(240, 'Address 2nd', 'Address 2nd', 'Endereço 2'),
(241, 'Address', 'Address', 'Endereço'),
(242, 'Email', 'Email', 'O email'),
(243, 'Contact Number', 'Contact Number', 'Número de contato'),
(244, 'Name', 'Name', 'Nome'),
(245, 'Request', 'Request', 'Solicitação'),
(246, 'About Us Edit', 'About Us Edit', 'Sobre nós Editar\r\n'),
(247, 'About Discribtion :', 'About Discribtion :', 'Sobre a descrição:\r\n\r\n'),
(248, 'Our Team info', 'Our Team info', 'Informação da nossa equipa\r\n'),
(249, 'Upadate', 'Upadate', 'Atualizar'),
(250, 'Name', 'Name', 'Nome'),
(251, 'Position', 'Position', 'Posição'),
(252, 'Image', 'Image', 'Imagem'),
(253, 'Company Name', 'Company Name', 'Nome da empresa'),
(254, 'Our Vision', 'Our Vision', 'Nossa visão'),
(255, 'Update', 'Update', 'Atualizar'),
(256, 'Serial No.', 'Serial No.', 'Número de série.'),
(257, 'Name', 'Name', 'Nome'),
(258, 'Position', 'Position', 'Posição'),
(259, 'img', 'img', 'img'),
(260, 'Company Name', 'Company Name', 'Nome da empresa\r\n'),
(261, 'Option', 'Option', 'Opção'),
(262, 'Upadate', 'Upadate', 'Atualizar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
