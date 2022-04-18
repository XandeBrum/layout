<?php 
require 'db.php';
$sql = ('SELECT * FROM people');
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php 
require 'header.php';
?>

<div class="container">
    <div class="card mt-5">
        <h5 class="card-header">All People</h5>
        <div class="card-body">
            <div>
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php
                     foreach($people as $person): ?>
                        <tr>
                            <td><?= $person->id;?></td>
                            <td><?= $person->name;?></td>
                            <td><?= $person->email;?></td>
                            <td>
                                <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
                                <a href="delete.php?id=<?= $person->id ?>"class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
require 'footer.php';
?>