<?php
require 'db.php';
$message = ''; 
if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = 'INSERT INTO people(name, email) VALUES(:name, :email)';

    $statement = $connection->prepare($sql);
    
    if ($statement->execute([':name' => $name, ':email' => $email])){
        $message = 'Data inserted successfully!';
    }
}
?>
<?php require 'header.php'; ?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Create a person</h2>
        </div>
        <div class="card-body">

            <?php if(!empty($message)): ?>
            <div class="alert alert-success"> 
                <?= $message; ?>
            </div>
            <?php endif; ?>
            
            <form action="" method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create a Person</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>