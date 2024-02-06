<?php 
    session_start();
    require_once('new-connection.php');
    function formatDate($date) {
        return date('F jS Y g:i A', strtotime($date));
    }
    function getReviews() {
        $query = "SELECT reviews.*, CONCAT(users.first_name, ' ', users.last_name) AS username FROM reviews INNER JOIN users ON reviews.user_id = users.id ORDER BY reviews.created_at DESC";
        return $result = fetch_all($query);
    }
    function getReplies($review_id) {
        $query = "SELECT replies.*, CONCAT(users.first_name, ' ', users.last_name) AS username FROM replies INNER JOIN users ON replies.user_id = users.id WHERE replies.review_id = $review_id ORDER BY replies.created_at ASC";
        return $result = fetch_all($query);
    }
    if(isset($_POST['review_button'])) {
        $content = $_POST['review_field'];
        $user_id = $_SESSION['user'];

        if(!empty($content)) {
            $query = $connection->query("INSERT INTO reviews (user_id, content) VALUES ('$user_id', '$content')");
            header("location: index.php");
            exit();
        }
    }
    if(isset($_POST['replies_button'])) {
        $content = $_POST['replies_field'];
        $user_id = $_SESSION['user'];
        $review_id = $_POST['review_id'];

        if(!empty($content)) {
            $query = $connection->query("INSERT INTO replies (review_id, user_id, content) VALUES ('$review_id', '$user_id', '$content')");
            header("location: index.php");
            exit();
        }
    }
?>