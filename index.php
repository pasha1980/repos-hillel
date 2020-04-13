<?php

require_once 'vendor/autoload.php';

/*
 * Часть кода для MySQL
 */

$pdo = new PDO('mysql:host=mysql;dbname=study_php', 'root', '123');
$usersRepository = new \App\Repository\User\PdoUserRepository($pdo);
\App\Repository\User\PdoUserRepository::createTable();

/*
 * Часть кода для MongoDB
 */

$client = new MongoDB\Client('mongodb://root:123@mongo:27017');
$usersRepository = new \App\Repository\User\MongoUserRepository($client);
$usersRepository->createCollection();

$user = new \App\Model\User\User(1, 'pasha@gmail.com');
//$usersRepository->delete($user);
//$usersRepository->save($user);
//$user1 = $usersRepository->find(1);
//var_dump($user);


