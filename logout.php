<?php
    session_start();
    session_destroy();
?>

<html>
    <body>
        <script>
            document.cookie = "des=;expires= Thu, 01 Jan 1970 00:00:00 GMT;path=/~s3849758;";
            setTimeout(function(){
                window.location.href = "index.html";
            }, 250);
        </script>
    </body>
</html>