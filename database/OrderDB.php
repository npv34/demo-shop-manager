<?php


class OrderDB
{
    protected $conn;

    public function __construct($connect)
    {
        $this->conn = $connect;
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM orders
                INNER JOIN customers 
                ON orders.customerNumber = customers.customerNumber';
        $stmt = $this->conn->query($sql);

        $result = $stmt->fetchAll();
        $arr = [];
        foreach ($result as $item) {
            $order = new Order($item['orderNumber'],
                                $item['orderDate'],
                                $item['status'],
                                $item['customerNumber'],
                                $item['customerName']);
            array_push($arr, $order);
        }

        return $arr;
    }

    public function findById($id)
    {
        $sql = "SELECT c.customerName, c.phone, c.addressLine1,
                p.productName, p.buyPrice, o.status
                FROM orders o
                INNER JOIN customers c
                ON o.customerNumber = c.customerNumber
                INNER JOIN orderdetails od  
                ON o.orderNumber = od.orderNumber
                INNER JOIN products p 
                ON p.productCode = od.productCode
                WHERE o.orderNumber = $id";
        $stmt = $this->conn->query($sql);

        return $stmt->fetchAll();
    }

    public function updateStatusProduct($orderId, $status)
    {
        $sql = "UPDATE orders SET status = ? WHERE orders.orderNumber = ?";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute([$status, $orderId]);
    }
}