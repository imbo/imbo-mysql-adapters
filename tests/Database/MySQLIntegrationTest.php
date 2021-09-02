<?php declare(strict_types=1);
namespace Imbo\Database;

use PDO;

/**
 * @coversDefaultClass Imbo\Database\MySQL
 */
class MySQLIntegrationTest extends DatabaseTests
{
    private PDO $pdo;

    protected function insertImage(array $image): void
    {
        $sql = <<<SQL
            INSERT INTO `imageinfo` (
                `user`,
                `imageIdentifier`,
                `size`,
                `extension`,
                `mime`,
                `added`,
                `updated`,
                `width`,
                `height`,
                `checksum`,
                `originalChecksum`
            ) VALUES (
                :user,
                :imageIdentifier,
                :size,
                :extension,
                :mime,
                :added,
                :updated,
                :width,
                :height,
                :checksum,
                :originalChecksum
            )
        SQL;

        $this->pdo
            ->prepare($sql)
            ->execute([
                ':user'             => $image['user'],
                ':imageIdentifier'  => $image['imageIdentifier'],
                ':size'             => $image['size'],
                ':extension'        => $image['extension'],
                ':mime'             => $image['mime'],
                ':added'            => $image['added'],
                ':updated'          => $image['updated'],
                ':width'            => $image['width'],
                ':height'           => $image['height'],
                ':checksum'         => $image['checksum'],
                ':originalChecksum' => $image['originalChecksum'],
            ]);
    }

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

        $this->pdo = new PDO(
            (string) getenv('DB_DSN'),
            (string) getenv('DB_USERNAME'),
            (string) getenv('DB_PASSWORD'),
        );

        $tables = [
            MySQL::IMAGEINFO_TABLE,
            MySQL::SHORTURL_TABLE,
        ];

        foreach ($tables as $table) {
            $this->pdo->query(sprintf("DELETE FROM `%s`", $table));
        }
    }
}
