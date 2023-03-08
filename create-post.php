<!DOCTYPE html>
<html>
<head>
    <title>Shaun's Simple Blog</title>
</head>
<body>
<button><a href="index.php">Return To Create Posts</a></button>
<button><a href="blogposts.php">View All Posts</a></button>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $title = filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW);
  $content = filter_input(INPUT_POST, 'content', FILTER_UNSAFE_RAW);

  if (!$title || !$content) {
  echo 'Please fill in all fields of post!';
  } else {
      $data = array(
      'title' => $title,
      'content' => $content,
      'timestamp' => time()
      );


    $filename = 'posts/' . time() . '.txt';
    $json = json_encode($data);

    file_put_contents($filename, $json);

    echo 'Thank you for submitting a post!';
    };

  } else {
    echo 'Due to an error, your post was not submitted :(, please refresh and try
    again';
  }

?>