<?php
require_once 'models/AdminModels/Order.php';
require_once 'controllers/Controller.php';
class OrderController extends Controller 
{
    public function index()
    {
        $role = 'admin';
        if ($role == 'admin'){
            $order = $this->model('order');
            $orders = $order->all();
            $this->render('admin.orders.index', [
                'pageTitle' => 'All Orders',
                'orders' => $orders
            ]);
        }
        else{
            echo 'you are not authorized';
        }
    }
    public function edit($id)
    {
        $order = $this->model('order');
        $order = $order->find($id);
       // dd($product);
        $this->render('admin.orders.edit', ['title' => 'Edit Order', 'order' => $order]);
    }

    public function update($id)
    {
        $orderstatus = $_POST['orderstatus'] ?? null;
      

        $errors = $this->validate([
            'orderstatus' => 'required',
            
        ]);

        if (!empty($errors)) {
            dd($errors);
        }
        $order = $this->model('order');
        $order->update($id,[
            'order_status' => $orderstatus,
            
        ]);
        $this->redirect('/orders');
    }

    public function show($id)
    {
        $order = $this->model('order');
        $order = $order->find($id);
        $this->render('admin.orders.show', ['order' => $order]);
    }

    public function destroy($id)
    {
        $order = $this->model('order');
        $order->delete($id);
        $this->redirect('/orders');
    }

    
}