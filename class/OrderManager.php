<?php


class OrderManager
{
    protected $orderDB;

    public function __construct()
    {
        $connect = new DBConnect("mysql:host=localhost;dbname=classicmodels", "root", "123456@Abc");
        $this->orderDB = new OrderDB($connect->connect());
    }

    public function index()
    {
        $orders = $this->orderDB->getAll();
        include "view/order/list.php";
    }

    public function show()
    {
        $orderId = $_GET['orderId'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $status = $_POST['status'];
            $this->orderDB->updateStatusProduct($orderId, $status);
        }
        $result = $this->orderDB->findById($orderId);
        $status = ["Disputed", "Shipped", "In Process", "Cancelled"];
        include "view/order/detail.php";
    }
}
?>