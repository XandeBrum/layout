<?php 
require 'db.php';

$id = $_GET['id'];
$sql = 'SELECT * FROM people WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id'=> $id]);
$person = $statement->fetch(PDO::FETCH_OBJ);


 if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = 'UPDATE people SET name=:name, email=:email WHERE id=:id';
    $statement = $connection->prepare($sql);
     if($statement->execute([':name'=>$name,':email'=>$email, ':id'=>$id])){        
        
    }  
 }



?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
    <h5 class="card-header">Edit</h5>
        <div class="card-body">
            <form action="edit.php" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="<?= $person->name; ?>" name="name" class="form-control">
                </div>
                <div class="form-gorup">
                    <label for="email">Email</label>
                    <input type="text" value="<?= $person->email; ?>" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>