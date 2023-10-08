<?php
require_once '../data/header.php';
require_once '../db/conn.php';
$results=$product-> getProduct();
?>





 <table class="table">
        <tr>
            <th>#</th>
            <th>marque</th>
            <th>price</th>
            <th>type</th>
            <th>Actions</th>
        </tr>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
           <tr>
                <td><?php echo $r['id_product'] ?></td>
                <td><?php echo $r['marque'] ?></td>
                <td><?php echo $r['price'] ?></td>
                <td><?php echo $r['name_type'] ?></td>
                <td>
                    <a href="view.php?id=<?php echo $r['id_product'] ?>" class="btn btn-primary">View</a>
                    <a href="edit.php?id=<?php echo $r['id_product'] ?>" class="btn btn-warning">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['id_product'] ?>" class="btn btn-danger">Delete</a>
                </td>
           </tr> 
        <?php }?>
    </table>

