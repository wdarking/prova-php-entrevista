<?php

require_once __DIR__ . '/../bootstrap.php';

class UserRepository extends Connection
{
    public function list()
    {
        return $this->query("SELECT * FROM users");
    }

    public function fetch($id)
    {
        $query = $this->getConnection()->prepare("SELECT * FROM users WHERE id = ?");

        $query->execute([$id]);

        return (object)$query->fetch();
    }

    public function getColors($id)
    {
        $conection = $this->getConnection()
            ->prepare("SELECT * FROM colors INNER JOIN user_colors ON user_colors.color_id = colors.id WHERE user_colors.user_id = ?");

        $conection->execute([$id]);

        return $conection->fetchAll();
    }

    public function performInsert($data)
    {
        $this->execute("INSERT INTO users (name, email) VALUES (:name, :email)", $data);
    }

    public function performDelete($id)
    {
        $this->execute("DELETE FROM users WHERE id = ?", [$id])
            ->execute("DELETE FROM user_colors WHERE user_id = ?", [$id]);
    }

    public function performUpdate($data)
    {
        return $this->execute("UPDATE users SET name = :name, email = :email WHERE id = :user_id", $data);
    }

    public function attachColors($id, $colors)
    {
        $this->execute("DELETE FROM user_colors WHERE user_id = ?", [$id]);

        $pdo = $this->getConnection();

        foreach ($colors as $color) {

            $sql = $pdo->prepare("INSERT INTO user_colors (user_id, color_id) VALUES (?, ?)");

            $result = $sql->execute([$id, $color]);

            if (!$result) {
                throw new Exception($pdo->errorInfo());
            }
        }
    }
}
