![Logo do projeto](http://maratona.ic.ufmt.br/wp-content/uploads/2017/06/LogoMaratona.jpg)

# Maratona de Programação
> **PO:** Lucas Romero         |       **Scrum Master:** Ruben Galvão

Website da maratona de programção do IC-UFMT.

## Documentos do projeto

#### [Documento de visão](https://gitlab.com/infocorp/g-maratona/wikis/Documento-de-Vis%C3%A3o) &middot; [Documento de requisitos](https://gitlab.com/infocorp/g-maratona/wikis/Documento-de-requisitos) &middot; [Diagrama Casos de uso](https://gitlab.com/infocorp/g-maratona/wikis/Diagrama-de-Casos-de-Uso) &middot; [Especificação Casos de uso](https://gitlab.com/infocorp/g-maratona/wikis/Especifica%C3%A7%C3%A3o-dos-casos-de-uso) &middot; [Prototipo](https://xd.adobe.com/view/56743920-7613-4e65-5299-dccf7a856803-2045/)  &middot; [Design Specs](https://xd.adobe.com/spec/51c562ac-fe12-49bb-75ff-a37a4bf29da5-27f4/)

## Instalando / Comece aqui

Depois de clonar o projeto entre na pasta raiz.

```
composer install
npm install
npm run prod
cp .env.example .env
php artisan key:generate
// Altere o .env para confiugração do banco desejado
php artisan migrate
php artisan storage:link
```

## Desenvolvendo

### Construído com

Listar bibliotecas principais, frameworks usados incluindo as suas versões (Reagir, Angular, etc ...), o link para baixar e como instalar.

### Pré-requisitos

O que é necessário para configurar o ambiente de desenvolvimento. Por exemplo, dependências globais ou quaisquer outras ferramentas. incluir links de download.


### Configurando o Dev

Aqui está uma breve introdução sobre o que um desenvolvedor deve fazer para começar a desenvolver o projeto:

```shell
git clone https://github.com/nome-usuario/nome-do-projeto.git

cd nome-do-projeto/

packagemanager install
```

E diga o que acontece passo a passo. Se houver algum ambiente virtual, servidor local ou alimentador de banco de dados necessário, explique aqui.

### Build

Se o seu projeto precisar de algumas etapas adicionais para o desenvolvedor construir o projeto após algumas alterações de código, informe-as aqui. por exemplo:

```shell
./configure

make

make install
```

Aqui você deve indicar o que realmente acontece quando o código acima é executado.

### Deploying / Publishing

Dar instruções sobre como criar e lançar uma nova versão. 
Caso haja algum passo a ser dado para publicar esse projeto em um servidor, este é o momento certo para declará-lo.

```shell
packagemanager deploy your-project -s server.com -u username -p password
```

E novamente você precisaria dizer o que o código anterior realmente faz.

## Versioning

Talvez possamos usar [SemVer](http://semver.org/) para controle de versão. Para as versões disponíveis, veja o [link para tags neste repositório](/tags).

## Configuração

Aqui você deve escrever quais são todas as configurações que um usuário pode inserir ao usar o projeto.

## Teste

Descreva e mostre como executar os testes com exemplos de código.
Explique o que esses testes fazem e por quê.

```shell
Dê um exemplo do código aqui 
```

## Style guide

Explique seu estilo de código e mostre como verificar isso.

## Referência da API

Se a API for externa, conecte-se à documentação da API. Se não descrever sua API, incluindo os métodos de autenticação, além de explicar todos os endpoints com seus parâmetros necessários.

## Banco de dados

Explicando qual banco de dados (e versão) foi usado. Fornecer links de download.
Documenta seu projeto de banco de dados e esquemas, relações, etc ...

## Licença

Indique qual é a licença e como encontrar a versão em texto da licença.