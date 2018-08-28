<?php
    // Required headers
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json; charset=UTF-8');

    // Include database and object files
    include_once '../config/Database.php';
    include_once '../objects/User.php';

    // Instantiate databse
    $database = new Database();
    $db = $database->getConnection();

    // Initialize object
    $user = new User($db);

    // Query user
    $stmt = $user->read();
    $num = $stmt->rowCount();

    // Check if more than 0 record found
    if($num > 0) {
        
        // User array
        $user_arr = array();
        $user_arr['records'] = array();

        // retrieve our table contents
        // fetch() is faster than fetchAll()    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);

            $user_item = array(
                'id' => $id,
                'username' => $username,
                'password' => $password,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'phone' => $phone,
                'profile_title' => html_entity_decode($profile_title),
                'profile_photo' => $profile_photo,
                'profile_summary' => html_entity_decode($profile_summary),
                'website_url' => $website_url,
                'website_logo' => $website_logo
            );
            array_push($user_arr['records'], $user_item);
        }
        echo json_encode($user_arr);
    }else {
        echo json_encode(
            array('message' => 'No user found.')
        );
    }
?>