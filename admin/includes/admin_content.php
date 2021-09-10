<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Admin
<small>Subheading</small>
</h1>
<?php

 
// $user= new User();
// $user->username="kok";
// $user->password="Hope";
// $user->firstname="SEmmai";
// $user->lastname="dbuifbib ";

// // Inserting the user
// $user->create();


$users=User::find_all();
foreach($users as $user){
    echo $user->username;
}
 

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