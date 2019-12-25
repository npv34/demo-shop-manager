<div class="card">
    <div class="card-header">
        Thông tin khách hàng
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <th>Name:</th>
                        <td><?php echo $result[0]['customerName']?></td>
                    </tr>
                    <tr>
                        <th>Phone:</th>
                        <td><?php echo $result[0]['phone']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="order-status mt-4">
    <div class="col-12">

        <form class="form" method="post">
            <div class="row">
                <div class="col-4">Trang thai</div>
                <div class="col-5">
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <?php foreach ($status as $value): ?>
                                <option
                                    <?php if ($result[0]['status'] == $value): ?>
                                        selected

                                    <?php endif; ?>
                                    value="<?php echo $value ?>"><?php echo $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary" type="submit">Cap nhat</button>
                </div>


            </div>

        </form>
    </div>
</div>
<div class="product-list mt-5">
    <h5>Danh sach san pham mua:</h5>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($result as $item): ?>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
