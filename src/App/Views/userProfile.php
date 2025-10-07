<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h2>HELLO <?php echo $userName?></h2>
<script>console.log(<?php echo json_encode($_SESSION); ?>);</script>
<script>console.log("Session_id: <?php echo session_id(); ?>");</script> 
</body>
</html>