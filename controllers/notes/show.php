<?php


use Core\Database;



$config = require base_path('config.php');

$db = new Database($config['database']);

$currentUserId = 1;


if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    //dd($_POST);

   //form was submitted delete the current note.
   $note = $db->query('select * from notes where id = :id', [

    'id' => $_GET['id']

    ])->findOrFail();


    authorize($note['user_id'] === $currentUserId);


    $db->query('delete from note where id = :id', [
        'id' => $_GET['id']
    ]);

}

//dd($_SERVER);

view("notes/show.view.php", [

    'heading' => 'Note',

    'note' => $note

]);