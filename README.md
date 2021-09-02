# MySQL database adapters for Imbo

[![CI](https://github.com/imbo/imbo-mysql-adapters/workflows/CI/badge.svg)](https://github.com/imbo/imbo-mysql-adapters/actions?query=workflow%3ACI)

[MySQL](https://www.mysql.com/) database adapters for [Imbo](https://imbo.io).

## Installation

    composer require imbo/imbo-mysql-adapters

## Usage

This package provides MySQL adapters for Imbo using [PDO](https://www.php.net/pdo).

```php
$database = new Imbo\Database\MySQL($dsn, $username, $passord, $options);
```

## Running integration tests

If you want to run the integration tests you will need a running MySQL service. The repo contains a simple configuration file for [Docker Compose](https://docs.docker.com/compose/) that you can use to quickly run a MySQL instance along with [phpMyAdmin](https://www.phpmyadmin.net/).

If you wish to use this, run the following command to start up the service after you have cloned the repo:

```
docker-compose up -d
```

After the service is running you can execute all tests by simply running PHPUnit:

```
composer run test # or ./vendor/bin/phpunit
```

## License

MIT, see [LICENSE](LICENSE).
