<?php
$email = $_POST['email'];
$password = $_POST['password'];
$response = array();
//Check if all fieds are given
if (empty($email) || empty($password)) {
    $response['success'] = "0";
    $response['message'] = "Some fields are empty. Please try again!";
    echo json_encode($response);
    die;
}
$userdetails = array(
    'email' => $email,
    'password' =>$password
);
//Insert the user into the database
$success = loginUser($userdetails);
if (!empty($success)) {
    $response['success'] = "1";
    $response['message'] = "Login successfully!";
    $response['details'] = $success;
    echo json_encode($response);
} else {
    $response['success'] = "0";
    $response['message'] = "Login failed. Please try again!";
    echo json_encode($response);
}

function loginUser($userdetails) {
    require './connect.php';
    $array = array();
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
    $stmt->execute($userdetails);
    $array = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt = null;
    return $array;
}

?>