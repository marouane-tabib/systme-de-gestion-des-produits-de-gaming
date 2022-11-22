<?php 
$i=0;
?>
        <table class="table">
            <thead class="table-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Platforme Name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider table-responsive">
                <?php if(isset($platforms)){ while ($row = $platforms->fetch_assoc()) { $i++ ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $row['name'] ?></td>
                        <td class="column">
                            <div class="mx-auto">
                                <?php include'includes/components/actionsIcons.php' ?>
                            </div>
                        </td>
                    </tr>
                <?php }} else {?>
                    <tr>
                        <td colspan="8" class="text-center">No product found</td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>