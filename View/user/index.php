<h1> User </h1>
<form method="POST" action="http://localhost/basicMvc/user/create">
    <lable>Login</lable><input type="text" name="login" /><br>
    <lable>Password</lable><input type="text" name="password" /><br>
    <lable>Role</lable>
    <select name="role">
        <option value="default">Default</option>
        <option value="admin">Admin</option>
        <option value="owner">Owner</option>
    </select>
    <lable>&nbsp;</lable><input type="submit"/>
</form>
<hr/>
<table>
<?php 
    foreach ($this->userList as $key=>$value){
        echo '<tr>';
        echo '<td>'.$value['id'].'</td>';
        echo '<td>'.$value['login'].'</td>';
        echo '<td>'.$value['role'].'</td>';
        echo '<td><a href="'.URL.'user/edit/'.$value['id'].'">Edit</a> <a href="'.URL.'user/delete/'.$value['id'].'">Delete</a></td>';
        echo '</tr>';
 }
   // print_r($this->userList);
?>
</table>