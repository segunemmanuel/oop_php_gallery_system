<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Admin
<small>Subheading</small>
</h1>
<?php

$found_user=User::find_all_users_by_id(1);

echo  $found_user->username;


$user= new User();
$user->username="Some username here ";
$user->password="Some password here ";
$user->firstname="Some firstanme here ";
$user->lastname="Some lastname here ";




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