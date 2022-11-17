<?php 
$data = getproducts($conn);
?>
        <table class="table">
            <thead class="table-dark">
                <tr>
                <th scope="col">Image</th>
                <th scope="col">#</th>
                <th scope="col">Game Name</th>
                <th scope="col">QTY</th>
                <th scope="col">Platform</th>
                <th scope="col">Price</th>
                <th scope="col" id="description">Description</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php while ($row = $data->fetch_assoc()) { ?>
                    <tr>
                        <th class="col-2"><img src="assets/images/products/<?php echo $row['image'] ?>" width="70"></th>
                        <th scope="row">1</th>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo $row['platform_id'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>