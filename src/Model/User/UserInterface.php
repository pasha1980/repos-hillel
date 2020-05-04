<?php


namespace App\Model\User;


interface UserInterface
{
    public function getId(): ?int;
    public function setId(?int $id): void;
    public function getEmail(): ?string;
    public function setEmail(?string $email): void;
    public function getName(): ?string;
    public function setName(?string $name): void;
}