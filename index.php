<?php

include('../admin/useful_function.php');

$myobj = new useful_function();
// Getting home page content from the database
$homepage_content = $myobj->fetch_multiple_data('tbl_homepage');

$background_image = $homepage_content[0]['background_image'];
$middle_text = $homepage_content[0]['middle_text'];
$body_content_title = $homepage_content[0]['body_content_title'];
$body_content_desc = $homepage_content[0]['body_content_desc'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
  include('header.php');
?>

<!-- Main content -->
<section class="content" style="background-image: url('../assets/images/uploaded_images/<?php echo $background_image; ?>');">
    <h1 class="heading"><?php echo $middle_text; ?></h1>
</section>

<section class="disp">
    <h1 class="header"><?php echo $body_content_title; ?></h1>
    <p class="para"><?php echo $body_content_desc; ?></p>
</section>

<?php
  include('footer.php');
?>

</body>
</html>
