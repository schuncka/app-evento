# app-evento
Tema: Terminal de auto-atendimento
by Gabriel Schunck
=======================================================================================
Introdução
Esse sistema de auto-atendimento, consiste em ajudar os promotores de eventos, a
agilizar o acesso de um evento para pessoas que já possuem cadastro e inscrição
válidas em um evento.

=======================================================================================

Problema
No momento as pessoas chegam aos eventos sendo eles inscritos ou não e são
encaminhados ao setor de credenciamento dos eventos, fazendo com que pessoas
que cadastraram-se antecipadamente irem para a mesma fila de pessoas que não
estão inscritas, gerando uma fila maior, e transtornos de acúmulo de pessoas nas
entradas, falta de benefício para quem já tem a compra.

=======================================================================================

Objetivo
O objetivo deste trabalho é ter um sistema de autoatendimento de inscritos em um
evento, onde nesse sistema de autoatendimento ele somente irá validar a inscrição e
emitirá a sua credencial de acesso ao evento.

=======================================================================================

Solução
Funcionalidades:
Cadastro de evento: Cadastro do evento com as suas palestras
Cadastro de congressistas: tela onde os congressistas cadastram-se indicam em
qual(is) palestra irá se inscrever. Ao se cadastrar no evento automaticamente o
congressista ja ganha um usuario e senha. A chave de cadastramento, é o CPF do
congressista, caso já exista o cadastro será atualizado.
Validação do congressista no evento: tela de autoatendimento onde o congressista
entrará com seu usuário e senha fornecido no momento do cadastramento, caso o
usuário esteja apto para o evento, é impressa a sua credencial, do contrário, é
encaminhado ao credenciamento do evento.
