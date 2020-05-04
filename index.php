<?php

require_once 'vendor/autoload.php';

/**
 * Часть кода для MySQL
 */

$pdo = new PDO('mysql:host=mysql;dbname=study_php', 'root', '123');
$usersRepository = new \App\Repository\User\PdoUserRepository($pdo);
//\App\Repository\User\PdoUserRepository::createTable();

/**
 * Часть кода для MongoDB
 */

$client = new MongoDB\Client('mongodb://root:123@mongo:27017');
$usersRepository = new \App\Repository\User\MongoUserRepository($client);
//$usersRepository->createCollection();

$user = new \App\Model\User\User(1, "pasha", "pasha@gmail.com");
//$usersRepository->save($user);
//$usersRepository->delete($user);
//var_dump($usersRepository->find(1));


