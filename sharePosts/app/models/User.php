<?php

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Register user
    public function register($data) {
        $this->db->query("INSERT INTO users (name, email, password) VALUES(:name, :email, :password)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        if ($this->db->execute()) return true;
        return false;
    }

    public function login($email, $password) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hashed_password = $row->password;

        if (password_verify($password, $hashed_password)) return $row;
        return false;
    }

    public function findUserByEmail($email) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) return true;
        return false;
    }

    public function getUserById($user_id) {
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind('id', $user_id);
        return $this->db->single();
    }
}