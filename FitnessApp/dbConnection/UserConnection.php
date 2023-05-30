<?php
session_start();
DEFINE("DB_USER", "root");
DEFINE("DB_PSWD", "Neumont#23"); // Add password
DEFINE("DB_SERVER", "localhost"); // Value might change depending on mysql install
DEFINE("DB_NAME", "fitnessusers"); // Might be diff on your pc

function ConnGetA() {
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME)
        or die("Failed to connect to the db " . DB_SERVER . '::' . DB_NAME . " : " . mysqli_connect_error());
    return $dbConn;
}

if (isset($_POST['register'])) {
	register();
}

if (isset($_POST['login'])) {
	login();
}

if (isset($_POST['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: LoginPage.php");
}

function register(){

    $username =  mysqli_real_escape_string(ConnGetA(), trim(($_POST['username'])));
	$email =  mysqli_real_escape_string(ConnGetA(), trim(($_POST['email'])));
	$password =  mysqli_real_escape_string(ConnGetA(), trim(($_POST['password'])));

    if (empty($username) || empty($email) || empty($password)) {
		echo "<script>alert('All fields need to have correct values');</script>";
	} else {
        $password = md5($password); //encrypt

        //Used to make admin account
        if (isset($_POST['isAdmin'])) {
            $isAdmin = mysqli_real_escape_string(ConnGetA(), trim(($_POST['isAdmin'])));
            $query = "INSERT INTO fitnessusers.users (username, email, password, isAdmin)
					  VALUES('$username', '$email', '$password', '$isAdmin')";
            mysqli_query(ConnGetA(), $query);
            header('location: Home.php');
        }else{
            //Used to make user Account
            $query = "INSERT INTO fitnessusers.users (username, email, password, isAdmin)
					  VALUES('$username', '$email', '$password', 'user')";
            mysqli_query(ConnGetA(), $query);

            // get id of new user
            $logged_in_user_id = mysqli_insert_id(ConnGetA());

            $_SESSION['user'] = getUserById($logged_in_user_id); // create new session
            header('location: LoginPage.php'); // Redirect after login
        }
    }
}

function login(){

    $username = mysqli_real_escape_string(ConnGetA(), trim(($_POST['username'])));
	$password = mysqli_real_escape_string(ConnGetA(), trim(($_POST['password'])));

    if (empty($username) || empty($password)){
        echo "<script>alert('All fields need to be filled');</script>";
    }else {
        $password = md5($password); // Decrypt

        $query = "SELECT * FROM fitnessusers.users WHERE username='$username' AND password='$password'";
        $results = mysqli_query(ConnGetA(), $query);

        if (mysqli_num_rows($results) > 0){
            // check admin or user
            $logged_in_user = mysqli_fetch_assoc($results);
            if ($logged_in_user['isAdmin'] == 'admin') {
                $_SESSION['user'] = $logged_in_user;
                header('location: Home.php');
            }else{
                $_SESSION['user'] = $logged_in_user;
                header('location: Home.php');
            }
        } else {
            echo "<script>alert('No Results found, Try Again');</script>";
        }

    }
}

function getUserById($id){
	$query = "SELECT * FROM fitnessusers.users WHERE id=" . $id;
	$result = mysqli_query(ConnGetA(), $query);

	return mysqli_fetch_assoc($result);
}

function isAdmin(){
    // Logged in and a admin account
	if (isset($_SESSION['user']) && $_SESSION['user']['isAdmin'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

function logged(){
    // checks session to see if logged in
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}



?>