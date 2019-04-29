<div class="container">
<?php if (isset($_SESSION['userid'])) { ?>
<div class="row">
<div class="navbar-collapse gallery">
<ul>
<?php
$sql_query="SELECT id, user_id, image_title, image_description, image_name FROM user_gallery WHERE user_id='".$_SESSION["userid"]."'";
$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
while($rows = mysqli_fetch_array($resultset) ) { ?>
<li>
<a href="http://localhost/phpzag/create-dynamic-image-gallery-with-jquery-php-mysql/uploads/<?php echo $rows["image_name"]; ?>" data-lightbox="<?php echo $_SESSION['userid']; ?>" data-title="<?php echo $rows["image_title"]; ?>"><img
src="https://localhost/phpzag/create-dynamic-image-gallery-with-jquery-php-mysql/uploads/<?php echo $rows["image_name"]; ?>" class="images" width="200" height="200"></a>
</li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>
</div>