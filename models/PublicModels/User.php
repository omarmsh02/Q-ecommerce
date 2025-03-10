<?php
// models/User.php
require_once 'config/Database.php';

class User extends Model
{
    public function getUsers()
    {
        return null;
    }

    public function create($data)
    {
        $sql = "INSERT INTO users (first_name, last_name, email, password) 
                VALUES (:first_name, :last_name, :email, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':first_name' => $data['first_name'],
            ':last_name' => $data['last_name'],
            ':email' => $data['email'],
            ':password' => $data['password']
        ]);
        return $this->db->lastInsertId();
    }

    public function findByEmail($email)
{
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function update($id, $data) {
    $fields = [];
    foreach ($data as $key => $value) {
        $fields[] = "{$key} = :{$key}";
    }
    $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $data['id'] = $id;
    $stmt->execute($data);
}
}