# Teste Técnico PMK

Teste Técnico para a vaga de desenvolvedor pleno na [PMK Marketing Digital](https://www.pmk.com.br/).

O teste consiste de 2 testes:

## Projeto Cadastro para Doadores

Nesse teste o objetivo é a construção de um formulário para o cadastro de doadores.

### Como Executar

1. Mova para a pasta **formulario_doadores**

```bash
cd formulario_doadores
```

2. Configuração do banco de dados

Copie o arquivo .env.example para .env

```bash
cp .env.example .env
```

Agora configure as variáveis conforme o banco de dados mysql local ou então execute o docker compose para gerar um:

```bash
docker compose up -d
```

3. Executando o código

```bash
php -S localhost:8000 -t public
```

## Exercício de Lógica

Nesse teste o objetivo é ordenar o vetor **[50,1,5,65,35,22,100,300,250]**

## Como executar

Para executar esse teste basta executar os comandos abaixo:

```bash
cd ordenar_vetor
php index.php
```

O resultado será o vetor ordenado.