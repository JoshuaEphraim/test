<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article</title>
    <link rel="stylesheet" type="text/css" href="/css/article.css" />
    <script>
        var page=<?php echo array_shift($this->getParameters()); ?>;
    </script>
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/article.js"></script>
</head>
<body>
<div class="main">
    <div class="article">

    </div>
    <div class="addcomment">
        <h2>Leave your comment!</h2>
        <form id="add_comment">
            <input type="text" placeholder="Your Name" class="txt" /></br>
            <input type="text" placeholder="Your E-Mail" class="txt" /></br>
            <textarea rows="8" placeholder="Your Comment" class="txt"></textarea></br>
            <input type="submit" value="Submit" class="btn" />
        </form>
    </div>
    <div class="comments">

    </div>
    <div id="popup">

    </div>
</div>
</body>
</html>