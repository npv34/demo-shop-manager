<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Mã DH</th>
        <th scope="col">Ngày mua</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Khách hàng</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($orders as $key => $order): ?>
    <tr>
        <th scope="row"><?php echo ++$key ?></th>
        <td><a href="index.php?page=orderDetail.php&orderId=<?php echo $order->getId() ?>">DH-<?php echo $order->getId() ?></a></td>
        <td><?php echo $order->getOrderDate() ?></td>
        <td><?php echo $order->getStatus() ?></td>
        <td><?php echo $order->getCustomerName() ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>