<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT users.id as id, email, password, first_name, last_name FROM users left join user_details ud on ud.id = users.details_id WHERE email = :email;
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }
        $newUser = new User($user['email'], $user['password'], $user['first_name'], $user['last_name']);
        $newUser->setId($user['id']);
        return $newUser;
    }

    public function getLoggedUserDetails() {
        $userId = $_SESSION['userId'];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users left join user_details ud on ud.id = users.details_id WHERE users.id = :id;
        ');
        $stmt->bindParam(':id', $userId, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser(User $user)
    {
        $conn = $this->database->connect();
        $stmt = $conn->prepare('
            INSERT INTO user_details (first_name, last_name)
            VALUES (?, ?);
        ');

        $stmt->execute([
            $user->getFirstName(),
            $user->getLastname(),
        ]);

        $stmt = $conn->prepare('
            INSERT INTO users (email, password, details_id)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $this->getUserDetailsId($user)
        ]);
    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.user_details WHERE first_name = :name AND last_name = :surname;
        ');

        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $stmt->bindParam(':name', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $lastName, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }
}