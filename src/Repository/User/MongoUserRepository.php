<?php


namespace App\Repository\User;


use App\Model\User\{User, UserInterface};
use MongoDB\Client;

final class MongoUserRepository implements UserRepositoryInterface
{
    private Client $client;

    /**
     * MongoUserRepository constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function createCollection()
    {
        $collection = $this->client->blog;
        $collection->createCollection("users");
    }

    public function find(int $id): UserInterface
    {
        $collection = $this->client->blog->users;
        $data = $collection->findOne(['id' => $id]);
        return new User($data->id, $data->email);
    }

    public function save(UserInterface $user): void
    {
        $collection = $this->client->blog->users;
        $collection->insertOne(['id'=> $user->getId(), 'email'=>$user->getEmail()]);
    }

    public function delete(UserInterface $user): void
    {
        $collection = $this->client->blog->users;
        $collection->deleteOne(['id'=> $user->getId()]);
    }
}