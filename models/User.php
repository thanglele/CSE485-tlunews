<?php
    class User{
        public $id;
        public $username;
        public $password;
        public $role;

        public function toArray(): array {
            return [
                'id' => $this->id,
                'username' => $this->username,
                'password' => $this->password,
                'role' => $this->role,
            ];
        }
    }
?>