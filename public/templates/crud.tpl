<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add/Edit Post</title>
    <link rel="stylesheet" type="text/css" href="/css/crud.css" />
    <script>
        var action='<?php echo $this->getParameters()['action']; ?>';
        if(action=='edit')
        {
            var page='<?php echo ($this->getParameters()[0])?$this->getParameters()[0]:'new'; ?>';
        }
    </script>
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/crud.js"></script>
</head>
<body>
<div class="makearticle">
    <form id="article">
        <input id="title" type="text" placeholder="title" class="txt" /><h1>Make it cool!</h1></br>

        <textarea id="text" rows="20" placeholder="text" class="txt"></textarea></br>
        <input type="submit" value="Submit" class="btn" />
        <button id="back" type="button">Back</button>
    </form>

</div>
<div id="popup">

</div>
</body>
</html>