<?php
  include('../admin/useful_function.php');
  $myobj = new useful_function();

  //function of fetching an image
   $all_image=$myobj->fetch_multiple_data('tbl_gallery');


?>
<!DOCTYPE html>
<html>
<head>
    <title> Gallery </title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>

<?php
// Include header
include('header.php');
?>
<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 250px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: 300px;
}

div.desc {
  padding: 15px;
  text-align: center;
}
.img-gallery{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
}
</style>

<div class="img-gallery">
  <?php
    foreach($all_image as $key=>$value)
    {
  ?>
  <div class="gallery">
    <a target="_blank" href="/assets/province3/Pashupatinath Temple.jpg">
      <img src="../assets/images/uploaded_images/<?php echo $value['gallery_image']?>" alt="Cinque Terre" width="600" height="400">
    </a>
  <div class="desc"> <?php echo $value['gallery_name']?></div>
</div>
<?php 
   }
?>

<?php
// Include footer
include('footer.php');
?>
<!--
</body>
</html>
-->



