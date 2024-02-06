<?php 
    require_once('new-connection.php');
    include_once ('process_blog.php');
    if(isset($_SESSION['user'])) {
        $query = "SELECT * FROM users WHERE id = '{$_SESSION['user']}'";
        $user = fetch_record($query);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home | The Blog Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css/" />
        <link rel="stylesheet" href="css/blog.css">
    </head>
    <body>
        <section class="nav_container">
            <nav>
                <h3><a href="#">Blog</a></h3>
                <form id="form_logout" action="process.php" method="POST">
                    <input type="submit" name="logout" id="logout" value="Logout">
                </form>
            </nav>
        </section>
        <main>
            <article>
                <h1>One-Punch Man</h1>
                <img src="images/saitama.jpg" alt="saitama">
                <p>One-Punch Man (Japanese: ワンパンマン, Hepburn: Wanpanman) is a Japanese superhero manga series created by One. It tells the story of Saitama, a superhero who, because he can defeat any opponent with a single punch, grows bored from a lack of challenge. One wrote the original webcomic manga version in early 2009.
                </p>
                <p>
                A digital manga remake, illustrated by Yusuke Murata, began publication on Shueisha's Tonari no Young Jump website in June 2012. Its chapters are periodically compiled and published into individual tankōbon volumes. As of November 2023, 29 volumes have been released. In North America, Viz Media has licensed the remake manga for English language release and has serialized it in its Weekly Shonen Jump digital magazine.
                </p>  
                <p>  
                An anime adaptation produced by Madhouse was broadcast in Japan from October to December 2015. A second season, produced by J.C.Staff, was broadcast from April to July 2019. A third season has been announced. Licensed in North America by Viz Media, it premiered in the United States on Adult Swim's Toonami programming block in July 2016. The second season premiered on the block in October 2019.
                </p>
            </article>
<?php 
        if (isset($_SESSION['user'])) {
?>
            <form action="process_blog.php" method="POST">
                <label for="review_field">Leave a Review</label>
                <textarea name="review_field" id="review_field" cols="30" rows="10"></textarea>
                <input type="submit" name="review_button" id="review_button" value="Post a review">
            </form>
<?php
        }
?>
            <section>
<?php
    $reviews = getReviews();
    if(!empty($reviews)) {
        foreach($reviews as $review) {
?>
                <div class="review_block">
                    <h4><?= $review['username']?> (<?= formatDate($review['created_at'])?>)</h4>
                    <p><?= $review['content']?></p>
                </div>
<?php 
        $replies = getReplies();
        if(!empty($replies)) {
            foreach($replies as $reply) {
?>
                <div class="replies_block">
                    <h4><?= $reply['username']?> (<?= formatDate($reply['created_at'])?>)</h4>
                    <p><?= $reply['content']?></p>
                </div>
<?php 
            }
        }
            if (isset($_SESSION['user'])) {
?>
                <form action="process_blog.php" method="POST">
                    <input type='hidden' name='review_id' value="<?= $reply['id'] ?>">
                    <label for="replies_field"></label>
                    <textarea name="replies_field" id="replies_field" cols="30" rows="10"></textarea>
                    <input type="submit" name="replies_button" id="replies_button" value="Reply">
                </form>
<?php
            }
        }
    }
?>    
            </section>
        </main>
    </body>
</html>