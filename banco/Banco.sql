-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Abr-2020 às 03:44
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `cod_curso` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`cod_curso`, `nome`) VALUES
(1, 'Desenvolvimento de Sistemas'),
(2, 'Edificações'),
(3, 'Nutrição'),
(4, 'Administração'),
(5, 'Desenho de construção civil'),
(6, 'Modelos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE `escola` (
  `cod_escola` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `escola`
--

INSERT INTO `escola` (`cod_escola`, `nome`) VALUES
(1, 'Etec de Heliópolis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `cod_tcc` int(11) NOT NULL,
  `capa` varchar(20) NOT NULL,
  `arquivo` varchar(100) DEFAULT NULL,
  `ano` year(4) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `cod_curso_fk` int(11) DEFAULT NULL,
  `cod_escola_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`cod_tcc`, `capa`, `arquivo`, `ano`, `nome`, `descricao`, `cod_curso_fk`, `cod_escola_fk`) VALUES
(1, 'ti.jpg', 'TCC -  Informática.pdf', 2018, 'Central de Informática', 'Esse trabalho teve como objetivo a criação de um Site Informativo (Central do TCC Informática, com Banco de Dados na Linguagem SQL, voltado para TCC’s das turmas de informática), abordando a falta de esclarecimento da maioria dos alunos da ETEC Irmã Agostina em relação aos TCC’s, e a resolução das dificuldades encontradas do ponto de vista dos próprios alunos, partindo da reflexão sobre as melhorias e facilidades na busca de sanar as dúvidas e falta de informação. Para alcançar o objetivo proposto, foram realizados ao longo de 225 dias de estudos: Brainstorming; aulas teóricas e práticas de PTCC, DTCC e outras disciplinas; pesquisas de campo e na internet; documentos textuais e power point; e por fim desenvolvimento do banco de dados e do site para acesso ao banco de dados, visando entregar uma proposta com uma problemática e solução para a mesma. Os resultados obtidos indicarão e contribuirão com a melhoria do acesso as pesquisas e informações necessárias disponibilizadas por esta Central perante aos alunos, tendo como retorno riqueza de dados informativos e disponibilidade de acesso de acordo com a necessidade dos mesmos. ', 1, 1),
(2, 'adm.jpg', 'TCC - Assessoramento de Marketing Empresarial.pdf', 2018, 'Assessoramento de Marketing Empresarial', 'Este trabalho abordará conteúdos específicos da área empresarial, com o \r\nobjetivo de apresentar ao leitor uma síntese muito clara e especifica dos meios \r\nimprescindíveis de se obter o sucesso no âmbito organizacional. Tratando de \r\nimportâncias e necessidades de sistemas que são demasiado primordiais para \r\nalavancar qualquer empresa, seja ela de pequeno, médio ou grande porte. Ao \r\nlongo da dos tópicos são especificados os sistemas de divulgação. São eles: \r\nmarketing, propaganda, publicidade, comunicação e estratégias de \r\ndesenvolvimento e lucratividade.  Este sistema, integrado à técnicas de gestão \r\nde organização especializada, é o caminho resoluto para obter um \r\nposicionamento eminente no mercado, fazendo assim com que haja um efetivo \r\ndestaque perante à concorrência. Deste modo, pode-se afirmar que implantar o \r\nsistema de divulgação, contido aqui, é um meio crucial de se tornar uma \r\nempresa reconhecida, lembrada, superior às demais, assim como lucrativa', 4, 1),
(3, 'ti.jpg', 'TCC - DS.pdf', 2018, 'SoftPets', 'O projeto de TCC é a realização de um software para gerenciamento do pet shop, e a criação de um site para divulgar o mesmo. Decidimos fazer este projeto devido ao alto índice de crescimento de animais domésticos e consequentemente, o aumento dos estabelecimentos como, por exemplo, o pet shop. As pesquisas feitas mostram que os estabelecimentos menores ainda não contam com um serviço de software e site e é com essa proposta de implementar nosso software e site personalizados para o pet shop, que a SoftPets busca seu espaço no mercado.', 1, 1),
(4, 'adm.jpg', 'TCC - Escritório Virtual - Home Office.pdf', 2018, 'Escritório Virtual / Home Office', 'O avanço tecnológico permite que todo trabalho que antigamente era totalmente manual na área secretarial e administrativa, hoje seja feito com pequenos gestos chamados de “clicks”, trazendo para nossa nova realidade um diferencial repaginado relacionado a estas áreas profissionais. Todos os recursos tecnológicos disponíveis garantem grandes negócios, economia, lucros, estabilidade, modernidade, novas qualificações, novos métodos, novos conceitos e acima de tudo segurança. Contudo, exige também do profissional muita atenção. E hoje as opções de escritório virtual e home office traz um novo jeito de executar tarefas, assim como, um diferencial para empresas, empreendedores, etc. Por meio de entrevistas com profissionais que atuam em um escritório virtual e pesquisa bibliográfica, concluímos que essa mudança tecnológica positiva tem sido favorável aos negócios no mercado de trabalho. Esses novos formatos de local de trabalho garantem que todos os serviços secretariais e administrativos sejam executados de maneira que superem as expectativas dentro desta área', 4, 1),
(5, 'adm.jpg', 'TCC - Incubadora - Assessoramento Empresarial.pdf', 2018, 'Incubadora Assessoria de Empresas', 'Este trabalho de conclusão de curso falará sobre como as  Incubadoras foram introduzidas no mercado, já que estas foram criadas de forma não proposital, a intenção não era criar uma nova forma de empreender e sim salvar empresas que faliram por razoes diversas. A ideia de reestruturar empresas ou ate mesmo tira-las do vermelho cresceu e se tornou consistente, se passaram cerca de 30 de nós para que a primeira Incubadora fosse realmente criada, nesses 30 anos protótipos foram criados, mas por falta de logística foram desfeitos. As Incubadoras só chegaram ao Brasil depois de 40 anos da sua primeira versão. O Brasil recebeu as Incubadoras dentro das universidades para planejamentos de novas fases e desenvolvimento do processo de Incubação, as universidades desenvolveram projetos para a área de empreendedorismo assim os interligando e tornando os dois projetos uma via de mão dupla para as pessoas que querem ingressam com suas empresas no mercado de trabalho.   O trabalho também abordará sobre os conceitos de tudo o que engloba a incubação e seus tipos, os requisitos utilizados para que uma empresa possa entrar no processo de incubação, ele falará da introdução das Incubadoras no cenário mundial, explicando sobre a sua expansão e sua importância no mercado econômico mundial. \r\n', 4, 1),
(6, 'adm.jpg', 'TCC - O Poder do Marketing Pessoal e da Comunicação.pdf', 2018, 'O Poder do Marketing pessoal e da comunicação', 'Este trabalho de conclusão de concurso abordará o assunto cujo qual tem faltado no desenvolvimento da carreira de muitos profissionais, o famoso “MARKETING PESSOAL” e ressaltando a importância do mesmo se aplicado de maneira correta na vida do profissional o levando ao auge do sucesso. \r\nApresentaremos os conceitos das palavras “marketing pessoal”, “marketing” e “comunicação”. Mostrando o quão importante é na área Secretarial, visando à melhoria na carreira do profissional, dando dicas importantes para um bom desenvolvimento do marketing pessoal em sua vida. \r\nPor fim, mostraremos a pesquisa de campo realizada pelos integrantes deste grupo, exibindo o questionário utilizado e seus respectivos gráficos.', 4, 1),
(7, 'ti.jpg', 'TCC - Tecnologia da Informação e comunicação.pdf', 2019, 'Tecnologia da Informação e comunicação', 'O mercado de trabalho busca por profissionais que tragam inovações e competências. Que atenda as exigências e se adapte bem ao ambiente. Do mesmo modo, os profissionais em secretariado buscam obter esses requisitos. Estão surgindo cada vez mais inovações tecnológicas e cabe a cada profissional se qualificar, adequar e dar a devida importância para o mesmo. A tecnologia e a comunicação são fatores que facilitam o relacionamento entre empresa e cliente e que disponibilizam vários recursos para a realização das tarefas diárias. Através de pesquisa de campo e de um projeto que visa facilitar o funcionamento das empresas, mostraremos ao longo deste trabalho de conclusão de curso como é utilizada a tecnologia nas empresas e o benefício que esta ferramenta traz ao Profissional em Secretariado', 4, 1),
(8, 'mapa.jpg', 'TCC - Manual.pdf', 2015, 'Manual para a elaboração do TCC', 'Com o objetivo de facilitar o desenvolvimento do Trabalho de Conclusão de Curso no que se refere às normas de formatação, o Grupo de Supervisão Educacional, em conjunto com o Centro de Gestão Documental e com a colaboração do Centro de Capacitação Técnica, Pedagógica e de Gestão e do Grupo de Formulação e Análises Curriculares disponibiliza este Manual, que traz orientações quanto ao desenvolvimento, apresentação, formatação e estética de acordo com as Normas Técnicas da ABNT (para trabalhos acadêmicos e publicação de artigos) e quanto aos padrões estabelecidos pelo Grupo de Supervisão Educacional para os aspectos não contemplados pelas normas da ABNT. \r\nInicialmente são apresentados alguns conceitos essenciais para a elaboração de seu trabalho acadêmico e, em seguida, de forma resumida e exemplificada, cada um dos aspectos que o compõe.  \r\nUm ponto importante é que este manual não dispensa a orientação do seu professor quanto à metodologia e elaboração do Trabalho de Conclusão de Curso (TCC), pois embora o TCC seja um processo interdisciplinar, a orientação do TCC é de responsabilidade do professor com aulas atribuídas nos componentes curriculares Planejamento do Trabalho de Conclusão de Curso e Desenvolvimento do Trabalho de Conclusão de Curso.   ', 6, 1),
(9, 'mapa.jpg', 'TCC - Modelo.pdf', 2016, 'Modelo de TCC', 'Com o objetivo de facilitar o desenvolvimento do Trabalho de Conclusão de Curso no que se refere às normas de formatação, o Grupo de Supervisão Educacional, em conjunto com o Centro de Gestão Documental e com a colaboração do Centro de Capacitação Técnica, Pedagógica e de Gestão e do Grupo de Formulação e Análises Curriculares disponibiliza este Manual, que traz orientações quanto ao desenvolvimento, apresentação, formatação e estética de acordo com as Normas Técnicas da ABNT (para trabalhos acadêmicos e publicação de artigos) e quanto aos padrões estabelecidos pelo Grupo de Supervisão Educacional para os aspectos não contemplados pelas normas da ABNT. \r\nInicialmente são apresentados alguns conceitos essenciais para a elaboração de seu trabalho acadêmico e, em seguida, de forma resumida e exemplificada, cada um dos aspectos que o compõe.  \r\nUm ponto importante é que este manual não dispensa a orientação do seu professor quanto à metodologia e elaboração do Trabalho de Conclusão de Curso (TCC), pois embora o TCC seja um processo interdisciplinar, a orientação do TCC é de responsabilidade do professor com aulas atribuídas nos componentes curriculares Planejamento do Trabalho de Conclusão de Curso e Desenvolvimento do Trabalho de Conclusão de Curso.   ', 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `senha` varchar(80) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `usuario`, `nome`, `senha`, `tipo`) VALUES
(6, 'adm', 'bruno', '$2y$10$JUJGx039vMLgqWocIhuUYu86s.cNU8HbSOnw1HbFRFS2PZHTTz1e.', 'admin'),
(8, 'adm2', 'Bruno', '$2y$10$8oUwp/Cntd8QyKhR.I8RE.JOhrZhhyCBCP69kPDZMIOkE01ucRkyO', 'editor'),
(9, 'admin', 'administrador', '$2y$10$VYewnTJft0PLVJ20SRqSJuYddSBw0E7qs.wRmRtw0aoQyEq56EI1S', 'admin'),
(10, 'adm3', 'teste', '$2y$10$O43vOdBsOEwE9QOvS8m/buMhmBXg..MJHMiS9SSbTr2E96hVAv7YC', 'editor');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cod_curso`);

--
-- Índices para tabela `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`cod_escola`);

--
-- Índices para tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`cod_tcc`),
  ADD KEY `cod_curso_fk` (`cod_curso_fk`),
  ADD KEY `cod_escola_fk` (`cod_escola_fk`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `cod_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `escola`
--
ALTER TABLE `escola`
  MODIFY `cod_escola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `cod_tcc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`cod_curso_fk`) REFERENCES `curso` (`cod_curso`),
  ADD CONSTRAINT `projeto_ibfk_2` FOREIGN KEY (`cod_escola_fk`) REFERENCES `escola` (`cod_escola`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
