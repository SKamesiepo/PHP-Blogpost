<!DOCTYPE html>
<html>
<head>
    <title>Shaun's Simple Blog</title>
</head>
<body>
<button><a href="index.php">Return To Create Posts</a></button>
<button><a href="blogposts.php">View All Posts</a></button>
    <h1>Search For A Post:</h1>
    <form action="blogposts.php" method="get">
        <label for="search">Search For Post:</label>
        <input type="text" name="search" id="search"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>


<?php

$posts = array();

foreach (glob("posts/*.txt") as $filename) {
  $json = file_get_contents($filename);
  $data = json_decode($json, true);

  $posts[] = $data;
}

usort($posts, function($a, $b) {
  return $b['timestamp'] - $a['timestamp'];
});


if (isset($_GET['search'])) {
  $search = strtolower($_GET['search']);

  $matched_posts = array_filter($posts, function($post) use ($search) {
    $title = strtolower($post['title']);
    $content = strtolower($post['content']);

    return strpos($title, $search) !== false || strpos($content, $search) !== false;
  });


if (!empty($matched_posts)) {
  $post = array_values($matched_posts)[0];

  echo '<h2>' .$post['title'] . '</h2>';
  echo '<p>' .$post['content'] . '</p>';
  echo '<hr>';

} else {
  echo 'No matching posts found :(, try again with different search terms';
}

} else {

  foreach ($posts as $post) {
    echo '<h2>' .$post['title'] . '</h2>';
    echo '<p>' .$post['content'] . '</p>';
    echo '<hr>';
  }
  
}


?>