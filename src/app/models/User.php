<?php

namespace App\Models;

class User
{
    public function getWelcomeMessage()
    {
        // In a real application, this would fetch data from the database.
        // For example: `return db->query('SELECT message FROM welcome_messages')->fetch();`
        return "Hello from the Model!";
    }
}