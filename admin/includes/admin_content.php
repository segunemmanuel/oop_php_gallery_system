<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Admin
<small>Subheading</small>
</h1>
<?php

$found_user=User::find_all_users_by_id(20);

// echo  $found_user->username;

$user= new User();
$user->username="kok";
$user->password="Hope";
$user->first_name="SEmmai";
$user->last_name="dbuifbib ";

// Inserting the user
$user->update();

// $user=User::find_all_users_by_id(3);
// $user->delete();


// $user=User::find_all_users_by_id(3);
// $user->username="Hopes";
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