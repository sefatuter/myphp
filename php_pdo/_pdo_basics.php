<!--

Main PDO Classes:

* PDO          - Represents a connection between PHP & DB
* PDOStatement - Represents a prepared statement and after executed an associated result
* PDOException - Represents errors raised by PDO 
-->

<?php

$host = "localhost";
$user = "root";
$password = "sql1234";
$db = "pdoposts";


// Set DSN -> 

$dsn = 'mysql:host=' . $host . ';dbname=' . $db;

// Create a PDO instance

$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // fix limiting

# PDO Query
/*
//statement
$stmt = $pdo->query('SELECT * FROM posts');

//
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo $row['title'] . "<br>";
}

// object example

while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    echo $row->title . "<br>";
}


// we made default obj above, so we dont need to specify
while($row = $stmt->fetch()){
    echo $row->title . "<br>";
}
*/

# PREPARED STATEMENTS (prepare & execute)

//unsafe
// $sql = "SELECT * FROM posts WHERE author='$author'";


// FETCH MULTIPLE POSTS

// User input
$author = 'sefa';
// $author = 'tester'; // for Named params, if you change author it will change the result of query.

$is_published = true;
$id = 1;
$limit = 1;

/*
// Positional Params
$sql = 'SELECT * FROM posts WHERE author = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$author]);
$posts = $stmt->fetchAll();

// Named Params
$sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published'; //named
$stmt = $pdo->prepare($sql);
$stmt->execute(['author' => $author, 'is_published' => $is_published]); // got only post one and post four.
$posts = $stmt->fetchAll();

// var_dump($posts) # Dumps information about a variable

foreach($posts as $post){
    echo $post->title . "<br>";
}
*/

// FETCH SINGLE POST
/*
$sql = 'SELECT * FROM posts WHERE id = :id'; //named
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$post = $stmt->fetch(); // since only fetching one

echo $post->title . "<br>";
*/

// <h1><php echo $post->title . "<br>"; ></h1>
// <p><php echo $post->body . "<br>"; ></p>


// GET ROW COUNT
/*
$stmt = $pdo->prepare('SELECT * FROM POSTS WHERE author = ?');
$stmt->execute([$author]);
$postCount = $stmt->rowCount();

echo "Post Count: ". $postCount . "<br>";
*/

// INSERT DATA
/*
$title = 'Post Five';
$body = 'This is post five';
$author = 'Ben';
$is_published = false;

$sql = 'INSERT INTO posts(title, body, author, is_published) VALUES(:title, :body, :author, :is_published)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['title' => $title, 'body' => $body, 'author' => $author, 'is_published' => $is_published]);

echo 'Post added.';
*/

// UPDATE DATA
/*
$id = 1;
$body = 'This is updated post one';

$sql = 'UPDATE posts SET body = :body WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['body' => $body, 'id' => $id]);

echo 'Post updated.';
*/

// DELETE DATA
/*
$id = 3;

$sql = 'DELETE FROM posts WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

echo 'Post deleted.';
*/

//SEARCH DATA
/*
$search = '%f%';

$sql = 'SELECT * FROM posts WHERE title LIKE ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$search]); // since positional param
$posts = $stmt->fetchAll();

foreach($posts as $post){
    echo $post->title . "<br>";
}
*/

// LIMIT

$sql = 'SELECT * FROM posts WHERE author = ? && is_published = ? LIMIT ?'; // since emulation LIMIT ? is not gonna work, use line 26
$stmt = $pdo->prepare($sql);
$stmt->execute([$author, $is_published, $limit]); // don't forget to add limit variable here
$posts = $stmt->fetchAll();

foreach($posts as $post){
    echo $post->title . "<br>";
}

?>



