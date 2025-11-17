<?php
session_start();
define("CONTACT_FILE", __DIR__ . "/contacts.json");

function loadContacts(){
    if(!file_exists(CONTACT_FILE)){
        file_put_contents(CONTACT_FILE, json_encode([]));
    }
    return json_decode(file_get_contents(CONTACT_FILE), true);
}

function saveContacts($data){
    file_put_contents(CONTACT_FILE, json_encode($data, JSON_PRETTY_PRINT));
}

function requireLogin(){
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
        exit();
    }
}
?>
