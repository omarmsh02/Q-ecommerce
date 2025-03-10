<?php
require_once 'models/Model.php';

class Cart extends Model
{
    public function __construct()
    {
        parent::__construct('cart');
    }

    public function getCartItems($user_id)
    {
        $stmt = $this->db->prepare("
SELECT 
    c.product_id,
    p.product_name, 
    p.product_price, 
    p.product_img_url, 
    c.quantity
FROM cart c
JOIN products p ON c.product_id = p.id
WHERE c.user_id = :user_id;

        ");


        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function clearCart($id){

        try {
            $stmt = $this->db->prepare("DELETE FROM cart WHERE user_id = :value1");
            $stmt->bindParam(':value1', $id);
            return $stmt->execute();
            
        } catch (PDOException $e) {
            error_log("Database error in findByTwoConditions(): " . $e->getMessage());
            return null;
        }
    }

     function findRow($userId,$productId){
        try {
            $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE user_id = :value1 AND product_id = :value2");
            $stmt->bindParam(':value1', $userId);
            $stmt->bindParam(':value2', $productId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch() if expecting one row, fetchAll() for multiple rows
        } catch (PDOException $e) {
            error_log("Database error in findByTwoConditions(): " . $e->getMessage());
            return null;
        }
    }

    function updateCart($userId,$productId,$quantity){
        try {
            $stmt = $this->db->prepare("UPDATE cart SET quantity = :new_value WHERE user_id = :value1 AND product_id = :value2;");
            $stmt->bindParam(':new_value', $quantity);
            $stmt->bindParam(':value1', $userId);
            $stmt->bindParam(':value2', $productId);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch() if expecting one row, fetchAll() for multiple rows
        } catch (PDOException $e) {
            error_log("Database error in findByTwoConditions(): " . $e->getMessage());
            return null;
        }
    }

    // دالة لحذف عنصر من سلة التسوق
    public function removeFromCart($user_id, $product_id)
    {
        try {
            return $this->deleteByWhere(['user_id' => $user_id, 'product_id' => $product_id]);
        } catch (PDOException $e) {
            error_log("Database error in removeFromCart(): " . $e->getMessage());
            return false;
        }
    }

    // دالة لحساب إجمالي قيمة سلة التسوق
    public function getTotal($user_id)
    {
        try {
            $stmt = $this->db->prepare("
                SELECT SUM(products.product_price * cart.quantity) as total 
                FROM cart 
                INNER JOIN products ON cart.product_id = products.id 
                WHERE cart.user_id = :user_id
            ");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ? $result['total'] : 0;
        } catch (PDOException $e) {
            error_log("Database error in getTotal(): " . $e->getMessage());
            return 0;
        }
    }
}
