<?php
session_start();

//connection of local database
$db = mysqli_connect('localhost', 'root', '', 'db_portfolio') or die(mysqli_error($db));

$errors = array();

function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

// logging in user
if (isset($_POST['signin_btn'])) {
	login();
}

function login(){
    global $db;

    // form values
	$email =  e($_POST['email']);
	$password = e($_POST['password']);

    $query = "SELECT * FROM tbl_user WHERE UserEmail='$email' AND UserPassword='$password' LIMIT 1";
	$result = mysqli_query($db, $query);

    //store the logged in user to our session
		if(mysqli_num_rows($result) == 1){
			$logged_in_user = mysqli_fetch_assoc($result);
			$_SESSION['user'] = $logged_in_user;
            $_SESSION['success'] = "Welcome back!";
            header('location:index.php');
		}else{
			$_SESSION['error'] =  "Wrong email/password input!";
		}
}
// end function login()

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}


// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: signIn.php");
}


// register user
if (isset($_POST['register_btn'])) {
	register();
}

function register(){
    global $db;

    // form values
    $fname = e($_POST['firstname']);
    $lname = e($_POST['lastname']);
	$email =  e($_POST['email']);
    $birthday = e($_POST['birthday']);
    $phone = e($_POST['phone']);
    $address = e($_POST['address']);
	$password = e($_POST['password']);


    $query_check_user_email = "SELECT UserEmail FROM tbl_user WHERE UserEmail = '$email'";
    $query_check_email = mysqli_query($db,$query_check_user_email);
    if(mysqli_num_rows($query_check_email)>0){
        $_SESSION['error'] =  "Email already used!";
    }else{
        $query = "INSERT INTO tbl_user VALUES(NULL, '$fname', '$lname', '$email', '$birthday', '$phone', '$address', '$password')";
        mysqli_query($db, $query);
    }
    $_SESSION['success'] = "Welcome back!";
    header('location:index.php');

}

function getUserDetail($param){
    global $db;
    $sql_User = "SELECT * FROM tbl_user WHERE UserID = ".$_SESSION['user']['UserID'];
    $result_user = mysqli_query($db, $sql_User) or die(mysqli_error($db));

    if (mysqli_num_rows($result_user) > 0) { //result 1 row
        $row_user = mysqli_fetch_assoc($result_user); //store values in associative array
        if(array_key_exists($param, $row_user)){ //return boolean if the key exists in an array
             $result = $row_user[$param];
        }else{
             $result = "Invalid Key!";
             
        }
    }
    return $result;
}

function calculateAge($dob){

    $dob = date("Y-m-d",strtotime($dob));

    $dobObject = new DateTime($dob);
    $nowObject = new DateTime();

    $diff = $dobObject->diff($nowObject);

    return $diff->y;

}


// Update user details

if (isset($_POST['update_btn'])) {
	updateUser();
}

function updateUser(){
    global $db;
    // form values
   $fname = e($_POST['firstname']);
   $lname = e($_POST['lastname']);
   $email =  e($_POST['email']);
   $birthday = e($_POST['birthday']);
   $phone = e($_POST['phone']);
   $address = e($_POST['address']);

    $update_query = "UPDATE tbl_user SET UserFirstname = '$fname', UserLastname = '$lname', UserEmail = '$email', UserBirthday = '$birthday', UserPhone = '$phone', UserAddress = '$address' WHERE UserID = ".$_SESSION['user']['UserID'];
    mysqli_query($db, $update_query) or die(mysqli_error($db));

    $_SESSION['user']['UserFirstname'] =  $fname;
    $_SESSION['user']['UserLastname'] =  $lname;
    $_SESSION['user']['UserEmail'] =  $email;
    $_SESSION['user']['UserBirthday'] =  $birthday;
    $_SESSION['user']['UserPhone'] =  $phone;
    $_SESSION['user']['UserAddress'] =  $address;
    $_SESSION['success'] = "Updated Successfully!";
}


// Update user password
if (isset($_POST['updatePassword_btn'])) {
	updatePassword();
}

function updatePassword(){
    global $db;

    $old_pass = e($_POST['old_password']);
    $new_pass = e($_POST['new_password']);
    $confirm_pass = e($_POST['confirm_password']);

     //check if old password is correct
     if($old_pass === $_SESSION['user']['UserPassword']){ //password_verify can also be used if it is in hash
        //check if new password match retype
        if($new_pass == $confirm_pass){
            //hash our password
            $password = $new_pass; // or password_hash($new_pass, PASSWORD_DEFAULT) 

            //update the new password
            $sql_pass = "UPDATE tbl_user SET UserPassword = '$password' WHERE UserID = ".$_SESSION['user']['UserID'];
            mysqli_query($db, $sql_pass) or die(mysqli_error($db));

            $_SESSION['user']['UserPassword'] =  $password;
            $_SESSION['success'] = "Updated Password Successfully!";
        }
        else{
            $_SESSION['error'] = "New and retype password did not match";
        }
    }else{
        $_SESSION['error'] = "Incorrect Old Password";
    }
}



?>

