<?php  
include_once "db.php";



function updateMyUser($userName,$email,$oldPass,$newpass,$renewpass){
 	session_start();
 	$db=db::get();

 	$loggedUser=$db->getRow("SELECT * FROM users WHERE id=".$_SESSION['id']);
 	if ($userName!="" && strlen($userName)>3) {
 		$userName=$db->escape($userName);
 		if ($loggedUser['uname']=!$userName) {
 			if ($db->numrows("SELECT * FROM users WHERE uname='$userName'")==0) {
 				$db->query("UPDATE users SET uname='$userName' WHERE id=".$_SESSION['id']);
 				$msg.="Succesful username update<br>";
 			}else{
 				$msg.="This username is in use<br>";
 			}
 		}else{
 			$msg.="error same user name as before<br>";
 		}
 	}else{
 		$msg.="error username<br>";
 	}

 	if ($email!="" && filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email=$db->escape($email);
 		if ($loggedUser['email']=!$email) {
 			if ($db->numrows("SELECT * FROM users WHERE email='$email'")==0) {
 				$db->query("UPDATE users SET email='$email' WHERE id=".$_SESSION['id']);
 				$msg.="Succesful email update<br>";
 			}else{
 				$msg.="This email is in use<br>";
 			}
 		}else{
 			$msg.="same user email as before<br>";
 		}
 	}else{
 		$msg.="Not valid email<br>";
 	}
 	if (md5($oldPass)==$loggedUser['password']) {
 		if ($newpass==$renewpass) {
 			if (strlen($newpass)>7) {
 				$newpass = md5($newpass);
 				$db->query("UPDATE users SET password='$newpass' WHERE id=".$_SESSION['id']);
 				$msg.="Succesful password update<br>";
 			}else{
 				$msg.="Password is too short<br>";
 			}
 			
 		}else{
 			$msg.="Wrong old password<br>";
 		}
 		
  	}else{
  		$msg.="Wrong old password<br>";
  	}
  	return $msg;
}
//***********************login
function Login($username, $password){
    if(!empty($username) && !empty($password)){
        if($password == $passwordAgain){
            $queryString = "SELECT username FROM users WHERE username = '".$username."'";
            $isUserExists = $db->getRow($queryString);
            if($isUserExists != 0){
              $selectString = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";
              $isPasswordOkay = $db->getRow($selectString);
              if($isPasswordOkay == 1){
                  $_SESSION["id"] == $isPasswordOkay["id"];
                   $errorMsg = "Succesful Login";
              }else{
                  $errorMsg = "Password does not match!";
              }
            }
        }else{
            $errorMsg = "User does not exists!";
        }
    }else{
        $errorMsg = "No fields can be empty!";
    }
    return $errorMsg;
}
 function signUp($argUserName,$argEmail,$argPassword,$argPasswordCheck)
    {
        $db = db::get();
        if (isset($argUserName) && isset($argEmail) && isset($argPassword) && isset($argPasswordCheck)) {
            $userName = $db->escape($argUserName);
            $email = $db->escape($argEmail);
            $password = $db->escape($argPassword);
            $passwordCheck = $db->escape($argPasswordCheck);

            if (empty($userName) && empty($email) && empty($password)) {
                $errorMsg = "Minden mező kitöltése kötelező!";
            } else {

                $rand=rand(1,999);
                if($db->numnrows("SELECT * FROM users WHERE email =" . $email)) {
                    $errorMsg ="Ez az email már registrálva van!";
                }elseif ($db->numnrows("SELECT * FROM users WHERE username =" . $userName)){
                    $errorMsg="Ez a felhasználónév már használatban van! Próbáld meg a ".$userName.$rand." névvel";
                }elseif (count($_POST["password"]) < 8){
                    $errorMsg="A jelszónak min 8 karakternek kell lennie!";
                }elseif (count($_POST["username"]) < 3){
                    $errorMsg="A felhasználó névnek min 3 karakternek kell lennie!";
                }elseif($password != $passwordCheck){
                    $errorMsg="A két jelszó nem egyezik!";
                }else{
                    $hashedPassword = md5($password);
                    $sql ="INSERT INTO users (username,email,password) VALUES ('$userName','$email','$hashedPassword')";
                    $db->query($sql);
                }
            }
        }
        return $errorMsg;
    }
