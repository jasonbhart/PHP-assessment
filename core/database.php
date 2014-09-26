<?php

namespace interview;

class Database {
    protected $link;
    protected $connected;

    public function __construct() {
        $credentials = new Config_Database();

        try {
            $this->link = new \PDO(
                'mysql:host=' . $credentials['host'] . 'dbname=' . $credentials['database'],
                $credentials->getUser(),
                $credentials->getPass(),
                array(
                    \PDO::ATTR_EMULATE_PREPARES => false,
                    \PDO::ATTR_ERRMODE          => \PDO::ERRMODE_EXCEPTION)
            );
        } catch (\PDOException $e) {
            Logging::logDBErrorAndExit($e->getMessage());
        }
    }
    //--------------------------------------------------------------------------


    public function insert($tableName, $columns, $data, $ignore = false)
    {
        $statement  = "INSERT";

        if ($ignore) {
            $statement .= " IGNORE";
        }

        $statement .= " INTO `" . $tableName . "`";
        $statement .= " (";

        for ($x = 0; $x < sizeof($columns); $x++) {
            if ($x > 0) { $statement .= ', '; }
            $statement .= $columns[$x];
        }

        $statement .= ")";
        $statement .= " values (";

        for ($x = 0; $x < sizeof($data); $x++) {
            if ($x > 0) { $statement .= ', '; }
            $statement .= "?";
        }

        $statement .= ")";

        try {
            $insert = $this->link->prepare($statement);
            $insert->execute($data);
        } catch (\PDOException $e) {
            Logging::logDBErrorAndExit($e->getMessage());
        }
    }
    //--------------------------------------------------------------------------


    public function updateOne($tableName, $column, $data, $where, $condition)
    {
        $statement  = "UPDATE";

        $statement .= " `" . $tableName . "`";
        $statement .= " SET `";

        $statement .= $column . "`";
        $statement .= ' = ';
        $statement .= "?";

        $statement .= " WHERE `" . $where . "` = ?";

        try {
            $update = $this->link->prepare($statement);
            $update->execute(array($data, $condition));
        } catch (\PDOException $e) {
            Logging::logDBErrorAndExit($e->getMessage());
        }
    }
    //--------------------------------------------------------------------------


    public function getArray($statement)
    {
        try {
            $sql = $this->link->query($statement);
            $results = $sql->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            Logging::logDBErrorAndExit($e->getMessage());
        }

        if (!empty($results)) {
            return false;
        }

        return $results;
    }
    //--------------------------------------------------------------------------
}
