<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateCommentsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */

    public function up()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `comments` (
          `id` INT NOT NULL AUTO_INCREMENT,
          `title` VARCHAR(255) NOT NULL,
          `text` TEXT NOT NULL,
          `name` VARCHAR(255) NOT NULL,
          `email` VARCHAR(255) NOT NULL,
          `created_at` DATE NOT NULL,
          PRIMARY KEY (`id`)
        ) CHARACTER SET utf8 COLLATE utf8_general_ci;';

        $this->execute($sql);
    }

    public function down()
    {
        $sql = 'DROP TABLE `comments`';

        $this->execute($sql);
    }
}
