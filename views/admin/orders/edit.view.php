<!DOCTYPE html>
<html lang="en">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/head.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/layout/admin/sidebar.php'; ?>
<body>

<div class="content">
  <div class="card">

   <h3>Edit Order Status</h3>
        <form action="/orders/<?= $order['id'] ?>/edit" method="POST">
            <!-- Use a hidden input to tell your system to treat it as PUT -->
            <input type="hidden" name="_method" value="PUT" />
          
            
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">order status</label>
                
                  
                    <select class="form-select" multiple aria-label="Multiple select example" name="orderstatus" id="">
                        <option value="pending">pending</option>
                        <option value="shipped">shipped</option>
                        <option value="delivered">delivered</option>
                        <option value="cancelled">cancelled</option>
                    </select>
               
            </div>
           
            <button type="submit" class="btn btn-primary mt-2">Update Category</button>
        </form>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>