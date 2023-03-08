<!DOCTYPE html>
<html>
<head>
    <title>Shaun's Simple Blog</title>
</head>
<body>
    <h1>Create a new post</h1>
    <form action="create-post.php" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title"><br><br>
        <label for="content">Content:</label><br>
        <textarea name="content" id="content" cols="30" rows="10"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>


    <button><a href="blogposts.php">View All Posts</a></button>
</body>
</html>