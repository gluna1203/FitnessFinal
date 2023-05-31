<?php
include_once "Header.php";
include_once($_SERVER['DOCUMENT_ROOT'].'/dbConnection/UserConnection.php');

if (!isAdmin()) {
	header('location: /Pages/LoginPage.php');
}
?>


	<div id="divider">
        <div id="leftSide"></div>
        <div id="centerSide">
			
<div class="header">
	<h2>Admin - Register user</h2>
</div>
			
			<form method="post" action="RegisterAdminPage.php">
            <div class="user-values">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="user-values">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="user-values">
		<label>Admin?</label>
		<select name="isAdmin" id="isAdmin" >
			<option value=""></option>
			<option value="admin">Admin</option>
			<option value="user">User</option>
		</select>
	</div>
	<div class="user-values">
		<label>Password</label>
		<input type="password" name="password">
	</div>
	<div class="user-values">
		<button type="submit" class="btn" name="register">Create user</button>
	</div>
				</form>
        </div>
        <div id="rightSide"></div>
    </div>
	


<?php
include_once "Footer.php";
?>