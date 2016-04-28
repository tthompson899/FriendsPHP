<!Doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Display information about each user">
    <title><?php echo $show_user['name'];?></title>
  </head>

  <body>
    <a href="/Details">Home</a>
    <a href="/Details/logoff">Logoff</a>
    <h2><?php echo $show_user['alias'];?>'s Profile</h2>
    Name:<?php echo $show_user['name']; ?></br>
    Email Address:<?php echo $show_user['email']; ?>
  </body>
</html>
