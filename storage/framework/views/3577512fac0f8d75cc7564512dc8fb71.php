<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
    <h1>Them nguoi dung</h1>
    <form action="/them-user" method="post">
        <?php echo csrf_field(); ?>
<table>
  <tr>
    <td>ID</td>
    <td><?php echo e($user->ID); ?><input type="hidden" value="<?php echo e($user->ID); ?>" name="txt_id"></td>
  </tr>
  <tr>
  <td>Tai khoan</td>
  <td><input type="text" value="" name="txt_username"></td>
  </tr>
  <tr>    
    <td>Ho ten</td>
    <td><input type="text" value="" name="txt_fullname"></td>
  </tr>
</table>
<input type="submit" value="Them moi">
</form>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel-tutorial\resources\views/them_nguoi-dung.blade.php ENDPATH**/ ?>