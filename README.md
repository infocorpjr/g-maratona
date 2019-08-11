![Maratona](https://user-images.githubusercontent.com/38927366/62840611-7b707180-bc6b-11e9-9595-3967d9d40f5f.jpg)


# Maratona de Programação

Website da maratona de programação do IC-UFMT.

## Instalando / Comece aqui

Depois de clonar o projeto entre na pasta raiz.

```shell
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

Laravel, Bootstrap, JQuery, SASS, Vue.

### Pré-requisitos

PHP 7.2, Composer, Node, npm.  

### Configurando o Dev

Aqui está uma breve introdução sobre o que um desenvolvedor deve fazer para começar a desenvolver o projeto:

```shell
git clone https://github.com/infocorpjr/g-maratona.git

cd g-maratona/
```

### Build
```shell
npm run watch

npm run prod
```

## Versionamento

Usamos [SemVer](http://semver.org/) para controle de versão. Para as versões disponíveis, veja o [link para tags neste repositório](/tags).