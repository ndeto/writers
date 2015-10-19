<div class="container">
    <section>
        <div class="col-md-offset-6 "></div>
        <div class="col-md-6 text-center">
            <table class="table table-hover table-bordered">
                <thead>
                <th>Order Name</th>
                </thead>
                <tbody>
                    <?php 
                        foreach ($orders as $orders_item): ?>
                        <tr>
                        <td><a href="orders/view/<?php echo $orders_item['order_id'] ?>" ><?php echo $orders_item['order_title'] ?></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</div>


