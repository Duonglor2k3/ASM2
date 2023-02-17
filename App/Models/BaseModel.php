<?php

namespace App\Models;

use PDO;
use PDOException;

class BaseModel
{
  protected $conn;

  public function __construct()
  {
    try {
      $this->conn = new PDO("mysql:host=localhost;dbname=tmudobpahosting_nhom2;charset=utf8", "root", "");
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
  // all function
  public static function all()
  {
    $model = new static;
    $model->sqlBuilder = "select * from $model->tableName";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result  = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
  public function insert($data = [])
  {
    $this->sqlBuilder = "INSERT INTO $this->tableName(";
    $colName = '';
    $params = '';

    //lấy tên cột và tên tham số date
    foreach ($data as $key => $value) {
      $colName .= "`$key`, ";
      $params .= ":$key, ";
    }
    $colName = rtrim($colName, ", ");
    $params = rtrim($params, ", ");
    $this->sqlBuilder .= $colName . ") Values(" . $params . ")";
    $stmt = $this->conn->prepare($this->sqlBuilder);
    $stmt->execute($data);
  }
  public static function findOne($id)
  {
    $model = new static;
    $model->sqlBuilder = "SELECT * FROM $model->tableName Where id = $id";
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
    if ($result) {
      return $result[0];
    }
    return $model;
  }

  public function update($arrs = [])
  {
    $this->sqlBuilder = "UPDATE $this->tableName SET ";
    foreach ($arrs as $key => $value) {
      $this->sqlBuilder .= "`$key`=:$key, ";
    }
    $this->sqlBuilder = rtrim($this->sqlBuilder, ", ");
    $this->sqlBuilder .= " WHERE id=:id";
    if (isset($this->id)) {
      $arrs['id'] = $this->id;
      $stmt = $this->conn->prepare($this->sqlBuilder);
      $stmt->execute($arrs);
      return true;
    }
    return false;
  }
  public function delete($id)
  {
    $this->sqlBuilder = "DELETE FROM $this->tableName WHERE id = $id";
    $stmt = $this->conn->prepare($this->sqlBuilder);
    $stmt->execute();
  }
  public function where($colName, $codition, $value)
  {
    $this->sqlBuilder = "SELECT * FROM $this->tableName WHERE `$colName` $codition '$value' ";
    echo $this->sqlBuilder;
    return $this;
  }

  public function andWhere($colName, $codition, $value)
  {
    $this->sqlBuilder .= " AND `$colName` $codition '$value' ";
    return $this;
  }
  public function orWhere($colName, $codition, $value)
  {
    $this->sqlBuilder .= " OR `$colName` $codition '$value' ";
    return $this;
  }
  public function getTable($value)
  {
    $this->sqlBuilder = "SELECT $value FROM $this->tableName ";

    return $this;
  }
  public function Join($table)
  {
    $this->sqlBuilder .= "JOIN $table ";
    return $this;
  }
  public function On($table1id, $table2id)
  {
    $this->sqlBuilder .= "ON $table1id = $table2id ";
    return $this;
  }
  public function wheree($name, $tableid)
  {
    $this->sqlBuilder .= "WHERE $name = $tableid";
    return $this;
  }
  public function get()
  {
    $stmt = $this->conn->prepare($this->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
  }
  public function limit($limit)
  {
    $this->sqlBuilder .= " limit $limit ";
    return $this;
  }
}
