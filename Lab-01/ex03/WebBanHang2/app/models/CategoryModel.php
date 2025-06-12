<?php
class CategoryModel
{
    private $conn;
    private $table_name = "category";
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getCategories()
    {
        $query = "SELECT id, name, description FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function find($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table_name} WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
