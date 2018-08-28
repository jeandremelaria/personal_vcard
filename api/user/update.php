<?php
// Required headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Max-Age: 3600');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

// Include database and object files
include_once '../config/Database.php';
include_once '../objects/User.php';

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Prepare user object
$user = new User($db);

// Get id of user to be edited
$data = json_decode(file_get_contents("php://input"));

// Set ID property of user to be edited
$user->id = $data->id;

// Set user property values
$user->username = $data->username;
$user->password = $data->password;
$user->firstname = $data->firstname;
$user->lastname = $data->lastname;
$user->email = $data->email;
$user->phone = $data->phone;
$user->profile_title = $data->profile_title;
$user->profile_photo = $data->profile_photo;
$user->profile_summarry = $data->profile_summarry;
$user->website_url = $data->website_url;
$user->website_logo = $data->website_logo;

// Update the user
if($user->update()){
    echo 'Message: User was updated';

// If unable to update the user, tell the user
}else {
    echo 'Message: Unable to update user.';
}
?>