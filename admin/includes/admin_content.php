<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Admin
<small>Subheading</small>
</h1>
<?php

 
$photo= new Photo();
$photo->title="kok";
$photo->description="Hope";
$photo->filename="SEmmai";
$photo->type="dbuifbib ";

// // Inserting the user
$photo->create();
 

// $photos=Photo::find_all();
// foreach($photos as $photo){
//     echo $photo->title;
// }

// $user->username="NEW USER";
// $user->save();




 

?>
<ol class="breadcrumb">
<li>
<i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
</li>
<li class="active">
<i class="fa fa-file"></i> Blank Page
</li>
</ol>
</div>
</div>
<!-- /.row -->

</div>