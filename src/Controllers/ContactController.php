<?php

namespace App\Controllers;

class ContactController
{
    public function index()
    {
        // Generate the web page
        $adress = '3, allée du truc';
        require __DIR__ . '/../Views/contact.php';
    }

}
