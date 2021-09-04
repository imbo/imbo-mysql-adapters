<?php declare(strict_types=1);
namespace Imbo\EventListener\ImageVariations\Database;

use PDO;

/**
 * @coversDefaultClass Imbo\EventListener\ImageVariations\Database\MySQL
 */
class MySQLIntegrationTest extends DatabaseTests
{
    protected function getAdapter(): MySQL
    {
        return new MySQL(
            (string) getenv('DB_DSN'),
            (string) getenv('DB_USERNAME'),
            (string) getenv('DB_PASSWORD'),
        );
    }

    protected function setUp(): void
    {
        parent::setUp();

        $pdo = new PDO(
            (string) getenv('DB_DSN'),
            (string) getenv('DB_USERNAME'),
            (string) getenv('DB_PASSWORD'),
        );

        $pdo->query(sprintf("DELETE FROM `%s`", MySQL::IMAGEVARIATIONS_TABLE));
    }
}
