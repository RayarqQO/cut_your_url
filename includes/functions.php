<?php

include_once "includes/config.php";

function getURL($page = "") 
{
    return HOST . "/$page";
}

function db()
{
    try {
        return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }catch (PDOException $e) {
        die($e->getMessage());
    }
}

function dbQuery($query = '')
{
    if(empty($query)) return false;

	return db()->query($query);;
}

function dbUpdate($query = '')
{
    if(empty($query)) return false;

	return db()->query($query);
}
