<?php

Class users {

    public $id;
    public $email;
    public $password;
    public $remember_token;
    public $first_name;
    public $suffix_name;
    public $last_name;
    public $country;
    public $city;
    public $street;
    public $street_number;
    public $street_suffix;
    public $active;
    public $created_at;
    public $updated_at;

    public function save(){
        global $db;

        // new user query
        $query = 'INSERT INTO `users`
        (id, first_name, suffix_name, last_name, country, city, street, street_number, street_suffix, zipcode, email, password, created_at, updated_at)
        VALUES
        (:id, :first_name, :suffix_name, :last_name, :country, :city, :street, :street_number, :street_suffix, :zipcode, :email, :password, :created_at, :updated_at)';

        if(isset($_POST['register']))
            $data = [
                'id' => empty($this->id) ? NULL : $this->id,
                'first_name' => $this->standardizeName($_POST['first_name']),
                'suffix_name' => trim($_POST['suffix_name']),
                'last_name' => $this->standardizeName($_POST['last_name']),
                'country' => $_POST['country'],
                'city' => $this->standardizeName($_POST['city']),
                'street' => $this->standardizeName($_POST['street']),
                'street_number' => $_POST['street_number'],
                'street_suffix' => $_POST['street_suffix'],
                'zipcode' => $this->standardizePostcode($_POST['zipcode']),
                'email' => empty($this->email) ? strtolower($_POST['email']) : $this->email,
                'password' => !empty($this->password) ? $this->password : '',
                'created_at' => empty($this->created_at) ? date('Y-m-d H:i:s') : $this->created_at,
                'updated_at' => date('Y-m-d H:i:s')
            ];

        //save the user
        $user = $db->getConnection()->prepare($query);
        $user->execute($data);
        $userId = $db->getConnection()->lastInsertId();

        foreach($data as $k=>$v) $this->$k = $v;
        $this->id = $userId;
    }

    //password salt function
    function SetAuthentication($auth_token)
    {
        if(empty($this->email))  $this->email=  strtolower($_POST['email']);
        if(empty($this->created_at))  $this->created_at = date('Y-m-d H:i:s');

        $tkn=$auth_token.sprintf(crc32($this->email.$this->created_at),'%x') ;
        $this->password = password_hash($tkn, PASSWORD_BCRYPT, ['cost' => 11]);
        $this->save();
    }
    //in case of a functioning login
    static function Logout()
    {
        global $SessionName;
        if (session_status() === PHP_SESSION_NONE){
            @session_name($SessionName);
            @session_start();
        }
        if(     !isset($_SESSION['user'])
            ||  !isset($_SESSION['user']['id'])
            ||  $_SESSION['user']['id'] + 0 <= 0
            )    exit('{"error":"Not Authenticated"}');
        $_SESSION=[];
            session_unset();
            session_destroy();
            unset($_SESSION);
    }
    //function for authenticating login password
    function Authenticate($auth_token)
    {
        $tkn=$auth_token.sprintf(crc32($this->email.$this->created_at),'%x') ;
        if( password_verify($tkn, $this->password) ) return true;
        else exit('{ "error" : "Authentication Failed" }');
    }
    //prepping postalcode for db
    function standardizePostcode($postcode)
    {
        return strtoupper(chunk_split($postcode, 4, ' '));
    }

    //prepping names for db
    function standardizeName($string)
    {
        return ucfirst(trim($string));
    }
}
