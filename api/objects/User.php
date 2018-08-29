<?php
    class User {
        // Database connection and table name
    private $conn;
    private $table_name = 'user';

    // Object properties
    public $id;
    public $username;
    public $password;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $profile_title;
    public $profile_photo;
    public $profile_summarry;
    public $website_url;
    public $website_logo;
    public $facebook;
    public $instagram;
    public $twitter;
    public $dribbble;


    // Constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Read user
    function read() {
        
        // Select all query
        $query = 'SELECT * FROM ' .$this->table_name. ' INNER JOIN socialmedia ON user.id = socialmedia.id_user';
        
        // Prepare query statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Update user
    function update() {

        // Update query
        $query = 'UPDATE '.$this->table_name. 
                    'SET 
                        username = :username,
                        password = :password,
                        firstname = :firstname,
                        lastname = :lastname,
                        email = :email,
                        phone = :phone,
                        profile_title = :profile_title,
                        profile_photo = :profile_photo,
                        profile_summarry = :profile_summarry,
                        website_url = :website_url,
                        website_logo = :website_logo
                    WHERE 
                        id = :id';

        // Prepare query statement
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));

        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->profile_title = htmlspecialchars(strip_tags($this->profile_title));
        $this->profile_photo = htmlspecialchars(strip_tags($this->profile_photo));

        $this->profile_summarry = htmlspecialchars(strip_tags($this->profile_summarry));
        $this->website_url = htmlspecialchars(strip_tags($this->website_url));
        $this->website_logo = htmlspecialchars(strip_tags($this->website_logo));

        // Bind values
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);

        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':profile_title', $this->profile_title);
        $stmt->bindParam(':profile_photo', $this->profile_photo);

        $stmt->bindParam(':profile_summarry', $this->profile_summarry);
        $stmt->bindParam(':website_url', $this->website_url);
        $stmt->bindParam(':website_logo', $this->Website_logo);

        // Execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
}
?>