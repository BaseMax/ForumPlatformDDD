<?php

use Framework\Config;

require_once "./vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = Config::getEnv();

$connection = new PDO(
    "mysql:host={$config['host']};dbname={$config['dbname']}",
    $config["user"],
    $config["password"]
);

$sql_create_users_table =
    "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at INT,
    updated_at INT
);
";

$sql_create_threads_table =
    "CREATE TABLE IF NOT EXISTS threads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    body TEXT,
    upvotes INT,
    downvotes INT,
    created_at INT,
    updated_at INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
";

$sql_create_replies_table =
    "CREATE TABLE IF NOT EXISTS replies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    thread_id INT,
    body TEXT,
    upvotes INT,
    downvotes INT,
    created_at INT,
    updated_at INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (thread_id) REFERENCES threads(id)
);
";

$sql_create_moderators_table =
    "CREATE TABLE IF NOT EXISTS moderators (
    user_id INT,
    created_at INT,
    updated_at INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
";




$stmt = $connection->prepare($sql_create_users_table);
$stmt->execute();
echo "user table created ..." . PHP_EOL;

$stmt = $connection->prepare($sql_create_threads_table);
$stmt->execute();
echo "threads table created ..." . PHP_EOL;

$stmt = $connection->prepare($sql_create_replies_table);
$stmt->execute();
echo "replies table created ..." . PHP_EOL;

$stmt = $connection->prepare($sql_create_moderators_table);
$stmt->execute();
echo "moderators table created ..." . PHP_EOL;

