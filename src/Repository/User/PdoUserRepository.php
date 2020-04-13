<?php


namespace App\Repository\User;


use App\Model\User\{User, UserInterface};

final class PdoUserRepository implements UserRepositoryInterface
{
    private \PDO $pdo;

    /**
     * PdoUserRepository constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public static function createTable()
    {
        $pdo = new \PDO('mysql:host=mysql;dbname=study_php', 'root', '123');
        $sql = 'CREATE TABLE `study_php`.`users` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NULL , `email` VARCHAR(255) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; ';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    }

    public function find(int $id): UserInterface
    {
        $sql = 'select * from `users` where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return new User($data['id'], $data['email']);
    }

    public function save(UserInterface $user): void
    {
        $value = $user->getId() . ", '" . $user->getEmail() . "'";
        $sql = 'insert into `users` values (' . $value . '); ';
        $stmt = $this->pdo->prepare($sql);
//        $stmt->bindValue(':val', $value);
        $stmt->execute();
    }

    public function delete(UserInterface $user): void
    {
        $sql = 'delete from `users` where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $user->getId());
        $stmt->execute();
    }
}