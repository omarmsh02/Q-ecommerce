<?php

require_once 'models/Model.php';
class History extends Model
{

    public function construct()
    {
        parent::construct('orders');

    }
    public function getUserOrders($userId)
    {
        // SQL query to get order details with joined order items and products
        $sql = "
    SELECT 
        orders.id AS order_id,
        orders.purchase_date AS date,
        orders.total AS total,
        orders.order_status AS order_status
        from orders
    WHERE orders.user_id = :user_id
";


        // Prepare the query
        $stmt = $this->db->prepare($sql);

        // Bind the user ID parameter to the query
        $stmt->bindParam(':user_id', $userId);

        // Execute the query
        $stmt->execute();

        // Fetch all results and return them as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}
?>