<?php
    include 'template/session.php';
    if(empty($user) || $user->role == 2){
        header("Location:index.php");
    }else{
?>
<?php include 'template/header.php' ?>
<?php include 'template/navbar.php' ?>
<div class="container">
<div class="row">
<div class="col">
<table class= "table">
   <tr>
   <th>No</th>
   <th>Nama</th>
   <th>Username</th>
   <th>Status</th>
   <th>Bergabung pada</th>
   </tr>
<?php
$no = 1;
$stmt = $conn->prepare('SELECT * FROM user WHERE role=2');
$stmt->execute();
while($users=$stmt->fetch(PDO::FETCH_OBJ)){
?>
    <tr>
       <td><?php echo $no ?></td>
       <td><?php echo $users->nama ?></td>
       <td><?php echo $users->username ?></td>
       <td><?php echo $users->status ?></td>
       <td><?php echo date("d-m-y h:m:s", strtotime($users->created_at))?></td>
       <td><?php echo $users->created_at ?></td>
    </tr>
<?php } ?>
</table>
</div>
<?php
}?>