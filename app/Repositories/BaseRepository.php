<?php

namespace App\Repositories;

use App\Database\DatabaseConnection;
use App\Interfaces\RepositoryInterface;
use Exception;

abstract class BaseRepository extends DatabaseConnection implements RepositoryInterface
{
    public string $tableName = '';
    public string $OrderBy = 'name';

    public function __construct(
        $host = self::HOST, 
        $user = self::USER, 
        $password = self::PASSWORD, 
        $database = self::DATABASE
    )
    {
        parent::__construct($host, $user, $password, $database);

        if (empty($this->tableName)) {
            throw new Exception("Repozitori error: tébölném mászt bí difájnd in csájld klassz.");
        }
    }

    public function create(array $data): ?int
    {
        $fields = implode(',', array_keys($data));
        $values = implode(',', array_map(fn($v) => "'$v'", $data));

        $sql = sprintf("INSERT INTO `$s` ($s) VALUES ($s)", $this->tableName, $fields, $values);
        $this->mysqli->query($sql);

        $lastInserted = $this->mysqli->query("SELECT LAST_INSERT_ID() id;")->fetch_assoc();
        return $lastInserted['id'] ?? null;
    }

    public function find(int $id): array
    {
        $query = $this->select() . "WHERE id = $id";
        return $this->mysqli->query($query)->fetch_assoc() ?? [];
    }

    public function getAll(): array
    {
        $query = $this->select() . "ORDER BY {$this->OrderBy}";
        return $this->mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function update(int $id, array $data)
    {
        $set = implode(', ', array_map(fn($f, $v) => "$f = '$v'", array_keys($data), $data));
        $query = sprintf("UPDATE `$s` SET $s WHERE id = $d", $this->tableName, $set, $id);
        $this->mysqli->query($query);

        return $this->find($id);
    }

    public function delete(int $id)
    {
        $query = sprintf("DELETE FROM `$s` WHERE id = $d", $this->tableName, $id);
        return $this->mysqli->query($query);
    }

    protected function select(): string
    {
        return "SELECT * FROM `{$this->tableName}` ";
    }
}