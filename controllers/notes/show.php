<?php


use Core\Database;



$config = require base_path('config.php');

$db = new Database($config['database']);


if ($_SERVER["REQUEST_METHOD"] === 'POST') {
   //form was submitted delete the current note.
    $db->query('delete from note where id = :id', [

    ]);
    
}

//dd($_SERVER);


$currentUserId = 1;


$note = $db->query('select * from notes where id = :id', [

    'id' => $_GET['id']

])->findOrFail();


authorize($note['user_id'] === $currentUserId);




view("notes/show.view.php", [

    'heading' => 'Note',

    'note' => $note

]);