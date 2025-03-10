<?php

require_once 'models/Model.php';
class Wishlist extends Model
{

    public function __construct()
    {
        parent::__construct('wishlist');

    }

    public function getUserWishlist($userId)
    {
        // Prepare the SQL query with the JOIN
        $sql = "
            SELECT 
                wishlist.*, 
                products.product_name, 
                products.product_price, 
                products.product_img_url, 
                products.id as id
            FROM wishlist
            INNER JOIN products ON wishlist.product_id = products.id
            WHERE wishlist.user_id = :user_id
        ";

        // Execute the query with the user ID
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        // Fetch and return the results
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteFromWishlist($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE product_id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database error in delete(): " . $e->getMessage());
            return false;
        }
    }
}
