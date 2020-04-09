<?php


namespace App\Repository\User;


use App\Model\User\UserInterface;

interface UserRepositoryInterface
{
    public function find(int $id): UserInterface;
}