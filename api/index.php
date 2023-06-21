<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../classes/database.php';
include_once '../classes/Blog.php';

$database = new Database();
$db = $database->getConnection();
$blog = new Blog($db);

$requestMethod = $_SERVER['REQUEST_METHOD'];

switch ($requestMethod) {

    case 'GET':
        if (isset($_GET['id'])) {
            $blogId = $_GET['id'];
            $result = $blog->getBlog($blogId);
            echo json_encode($result);
        } else {
            $result = $blog->getAllBlogs();
            echo json_encode($result);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $title = $data['title'];
        $content = $data['content'];
        $result = $blog->addBlog($title, $content);
        echo json_encode($result);
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            $blogId = $_GET['id'];
            $data = json_decode(file_get_contents('php://input'), true);
            $title = $data['title'];
            $content = $data['content'];
            $result = $blog->updateBlog($blogId, $title, $content);
            echo json_encode($result);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $blogId = $_GET['id'];
            $result = $blog->deleteBlog($blogId);
            echo json_encode($result);
        }
        break;

    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Invalid request method."));
        break;
}
?>
