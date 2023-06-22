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

<!-- <body>
    <h1>Blog API</h1>

    <h2>Add Blog</h2>
    <form id="addBlogForm">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="5" required></textarea><br><br>
        <button type="submit">Add Blog</button>
    </form>

    <h2>Fetch Blogs</h2>
    <form id="fetchBlogForm">
        <label for="blogId">Blog ID:</label>
        <input type="text" id="blogId" name="blogId" required>
        <button type="submit">Fetch Blog</button>
    </form>
    <div id="blogsList"></div>

    <h2>Update Blog</h2>
    <form id="updateBlogForm">
        <label for="updateBlogId">Blog ID:</label>
        <input type="text" id="updateBlogId" name="updateBlogId" required><br><br>
        <label for="updateTitle">Title:</label>
        <input type="text" id="updateTitle" name="updateTitle" required><br><br>
        <label for="updateContent">Content:</label><br>
        <textarea id="updateContent" name="updateContent" rows="5" required></textarea><br><br>
        <button type="submit">Update Blog</button>
    </form>

    <h2>Delete Blog</h2>
    <form id="deleteBlogForm">
        <label for="deleteBlogId">Blog ID:</label>
        <input type="text" id="deleteBlogId" name="deleteBlogId" required>
        <button type="submit">Delete Blog</button>
    </form>

    <script>
        document.getElementById('addBlogForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let form = event.target;
            let title = form.elements['title'].value;
            letcontent = form.elements['content'].value;

            let data = {
                title: title,
                content: content
            };

            fetch('api/index.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    console.log(data);
                    form.reset();
                })
                .catch(function(error) {
                    console.log(error);
                });
        });

        document.getElementById('fetchBlogForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let form = event.target;
            let blogId = form.elements['blogId'].value;

            fetch('api/index.php?id=' + blogId)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    console.log(data);
                    let blogsList = document.getElementById('blogsList');
                    blogsList.innerHTML = '';

                    let blogItem = document.createElement('div');
                    blogItem.innerHTML = `
                    <h3>${data.title}</h3>
                    <p>${data.content}</p>
                `;
                    blogsList.appendChild(blogItem);
                })
                .catch(function(error) {
                    console.log(error);
                });
        });

        document.getElementById('updateBlogForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let form = event.target;
            let blogId = form.elements['updateBlogId'].value;
            let title = form.elements['updateTitle'].value;
            let content = form.elements['updateContent'].value;

            let data = {
                title: title,
                content: content
            };

            fetch('api/index.php?id=' + blogId, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    console.log(data);
                    form.reset();
                })
                .catch(function(error) {
                    console.log(error);
                });
        });

        document.getElementById('deleteBlogForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let form = event.target;
            let blogId = form.elements['deleteBlogId'].value;

            fetch('api/index.php?id=' + blogId, {
                    method: 'DELETE'
                })
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    console.log(data);
                    form.reset();
                })
                .catch(function(error) {
                    console.log(error);
                });
        });
    </script>
</body> -->

</html>