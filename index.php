<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
</head>

<body>
    <h1>Blog API Demo</h1>

    <h2>Add Blog</h2>
    <form action="api/index.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="5" required></textarea><br><br>
        <button type="submit">Add Blog</button>
    </form>

    <h2>Fetch Blogs</h2>
    <form action="api/index.php" method="GET">
        <label for="blogId">Blog ID:</label>
        <input type="text" id="blogId" name="id" required>
        <button type="submit">Fetch Blog</button>
    </form>
    <div id="blogsList">
        <?php
        if (isset($_GET['id'])) {
            $blogId = $_GET['id'];
            $url = "api/index.php?id=" . $blogId;
            $response = file_get_contents($url);
            $blog = json_decode($response);
            if ($blog && isset($blog->title) && isset($blog->content)) {
                echo "<h3>{$blog->title}</h3>";
                echo "<p>{$blog->content}</p>";
            } else {
                echo "<p>No blog found with ID: {$blogId}</p>";
            }
        }
        ?>
    </div>

    <h2>Update Blog</h2>
    <form action="api/index.php" method="PUT">
        <label for="updateBlogId">Blog ID:</label>
        <input type="text" id="updateBlogId" name="id" required><br><br>
        <label for="updateTitle">Title:</label>
        <input type="text" id="updateTitle" name="title" required><br><br>
        <label for="updateContent">Content:</label><br>
        <textarea id="updateContent" name="content" rows="5" required></textarea><br><br>
        <button type="submit">Update Blog</button>
    </form>

    <h2>Delete Blog</h2>
    <form action="api/index.php" method="DELETE">
        <label for="deleteBlogId">Blog ID:</label>
        <input type="text" id="deleteBlogId" name="id" required>
        <button type="submit">Delete Blog</button>
    </form>
</body>
</html>