<?php
session_start();
require("../login/processes/new-connection.php");

$reviews = fetch_all("SELECT *, DATE_FORMAT(created_at, '%M %D, %Y %l:%i%p') AS formatted_date FROM reviews ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../login/styles/index.css">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
       $(document).ready(function(){
            $(".show").click(function(){
                $(this).siblings(".comment-container").toggle();;
            });

            setTimeout(function(){
                $(".success").css("display", "none");
                $(".failed").css("display", "none");
            }, 3000);
        });
    </script>
</head>
<body>
<?php
    if(isset($_SESSION['success'])){
?>
        <p class="success"><?= $_SESSION['success']?></p>
<?php
    }else if(isset($_SESSION['failed'])){
?>
        <p class="failed"><?= $_SESSION['failed']?></p>
<?php
    }
    unset($_SESSION['success']);
    unset($_SESSION['failed']);
?>
   
    <header>
        <nav>
            <div class="pagename-logo">
                <h1>MyBlogPage</h1>
            </div>
            <ul>
<?php
if(isset($_SESSION['username'])){
?>
    <li><p>Welcome</p> <p><?=$_SESSION['username'] ?>!</p></li>
<?php
}
?>
                <li> <a href="../login/processes/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <section class="bogcontainer">
            <div class="title">My first blog</div>
            <div class="blogcontent">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem vero ducimus hic voluptates quos repudiandae, perferendis a quasi id, blanditiis repellendus. Rem veniam repellendus incidunt. Velit pariatur illum unde atque?
                Accusantium libero, odio ab ad optio consectetur! Culpa minus numquam recusandae error in adipisci maiores id, ut quos natus molestiae ipsum illo doloremque expedita tempora fugiat maxime eveniet. Molestias, deserunt!
                Tempora nesciunt placeat omnis consectetur quos pariatur doloribus reiciendis atque rem, alias itaque, provident impedit doloremque necessitatibus facilis debitis dolorum! Minus temporibus dicta quaerat laudantium eveniet soluta voluptatem veritatis quo!
                Voluptates mollitia unde dolorum laboriosam omnis suscipit, enim dolores alias eligendi autem porro exercitationem dolor accusamus error pariatur natus quos sint laborum nesciunt animi reiciendis rerum optio. Magni, deleniti facilis.
                Delectus cumque repellat debitis cupiditate sapiente, dolorem qui numquam aut pariatur. Aliquid aut laudantium debitis ad, minus fuga similique consequuntur enim nulla eius sequi obcaecati tenetur, maiores quas iste consectetur!
                Alias dolorum officia quae nobis. Repellendus, in quae eos omnis atque expedita laboriosam minima similique quasi veritatis delectus consequuntur dolorum nihil facilis sunt architecto deserunt eum officia consequatur laborum neque!
                Neque hic quis culpa id quae est, perferendis ea optio et inventore, quisquam veritatis sed nesciunt nam doloremque voluptatem vitae voluptate, provident dolorem. Corrupti, earum unde. Consequuntur voluptatum officiis quae.
                Dignissimos quibusdam unde harum fugit ipsam odit omnis repudiandae iste eos culpa, blanditiis expedita eius impedit, perspiciatis accusantium possimus corrupti quis aspernatur? Voluptatibus nesciunt laborum sequi doloribus iusto adipisci vitae.
                Ab quas quaerat, pariatur excepturi provident libero, totam numquam, beatae fugit quod aliquam culpa eius earum qui nobis. Molestiae atque consequuntur explicabo ullam. Nulla, eligendi. Nisi commodi officiis libero id.
                Eos rem quas ducimus illum accusamus at, consequuntur voluptatibus provident doloribus optio fugit odit vero minus debitis odio dolorem. Non molestiae libero voluptate! Nisi, vero eius dolores perferendis nostrum exercitationem!</p>
            </div>
        </section>

        <form class="leavereview" action="../login/processes/review_process.php" method="POST">
            <h2>Leave a Review</h2>
            <textarea name="review" cols="150" rows="5" placeholder="add review here...."></textarea>
            <input type="hidden" name="userId" value="<?= $_SESSION['userId'] ?>">
            <input type="submit" value="Post a review">
        </form>

        <section class="reviews">
<?php

    if(isset($reviews)){
        foreach($reviews as $review){
            $user = fetch_record("SELECT * FROM users WHERE id= '{$review['user_id']}'");
?>
            <div class="review">
                <p class="reviewer-name"><?= $user['user_name'] ?> (<?= $review['formatted_date'] ?>)</p>
                <p class="review-content"><?= $review['content'] ?></p>
                <p class="tick-comment show">Show Comment(s)</p>
                <div class="comment-container">

<?php
            $comments = fetch_all("SELECT *,DATE_FORMAT(created_at, '%M %D, %Y %l:%i%p') AS formatted_date FROM replies WHERE review_id= '{$review['id']}'");

            
            if(isset($comments)){
                foreach($comments as $comment){
                    if($comment['review_id'] == $review['id']){
                        $user = fetch_record("SELECT * FROM users WHERE id= '{$comment['user_id']}'");
?>
                    <div class="comment">
                        <p class="username"><?= $user['user_name'] ?> (<?= $comment['formatted_date'] ?>)</p>
                        <p class="comment-context"><?=$comment['content'] ?></p>
                    </div>
<?php
                    } 
                }
            }
?> 
                    <form action="../login/processes/reply_process.php" method="post">
                        <textarea name="reply" id="" cols="20" role="5" placeholder="comment here..."></textarea>
                        <input type="hidden" name="userId" value="<?= $_SESSION['userId'] ?>">
                        <input type="hidden" name="reviewId" value="<?= $review['id'] ?>">
                        <input type="submit" value="create comment">
                    </form>
                </div>
            </div>

<?php
        }
    }


?>
        </section>
    </div>
    <script src="/blogpage/index.js"></script>
</body>
</html>