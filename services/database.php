<?php

const DB_HOST = "localhost";
const DB_NAME = "DWWM_2023_10_20";
const DB_USER = "root";
const DB_PASS = "";
function connectDB(): PDO{
    $db =   new PDO('mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME.';charset=utf8',DB_USER,DB_PASS);
    return $db;
    
}