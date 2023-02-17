<html lang="en"><script type="text/javascript">window["_gaUserPrefs"] = { ioo : function() { return true; } }</script><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Structure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
        body {
            background: #eee;
            font-family: system-ui;;
            font-size: 14px;
            color: #000;
            
            margin: 0;
            padding: 0;
        }
    </style>
    <script type="text/javascript">window["_gaUserPrefs"] = { ioo : function() { return true; } }</script><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content=""><meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors"><meta name="generator" content="Hugo 0.84.0"><title>Product example · Bootstrap v5.0</title><link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/product/"><link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180"><link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png"><link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png"><link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json"><link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3"><link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico"><meta name="theme-color" content="#7952b3"><style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .increasewidth{
        transition: 500ms;
      }
      .increasewidth:hover{
        width: 100% !important; 
        cursor: pointer; 
      }
    </style><link href="product.css" rel="stylesheet"></head><!--?php// require("navbar.php"); ?-->
    <!-- Bootstrap core CSS -->
    <!-- Favicons -->
    <!-- Custom styles for this template -->
<body>
<?php 
    require("define.php");
    require("navbar.php"); 
?>
<main>
  <div style="box-shadow: 0 0 10px #ccc;" class="position-relative overflow-hidden p-3 rounded-4 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 mx-auto my-5">
      <h1 class="display-4 fw-normal">Student Informations</h1>
      <p class="lead fw-normal">In this project, we plan to be able to add, edit and search student information in an avl tree.</p>
      <a class="btn btn-secondary" href="<?php echo all ?>">Show All Student's Informations</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>

<div style="justify-content: space-around;" class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <div style="box-shadow: 0 0 10px #ccc; width: 30%;" class="bg-dark me-md-3 pt-3 px-3 pt-md-5 pb-5 rounded-4 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Add Students</h2>
        <p class="lead">You can add information of students in this.</p>
      </div>
      <div class="increasewidth bg-body shadow-sm mx-auto" style="width: 80%;border-radius: 10px;">
        <a href="<?php echo add ?>" type="button" class="w-100 btn btn-lg btn-warning">Add</a>
      </div>
    </div>

    <div style="box-shadow: 0 0 10px #ccc; width: 30%;" class="bg-light me-md-3 pt-3 px-3 pt-md-5 pb-5 rounded-4 px-md-5 text-center overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Edit Students</h2>
        <p class="lead">You can modify student's information in this.</p>
      </div>
      <div class="increasewidth bg-light shadow-sm mx-auto" style="width: 80%;border-radius: 10px;">
        <a href="<?php echo edit ?>" type="button" class="w-100 btn btn-lg btn-success">Edit</a>
      </div>
    </div>
    
    <div style="box-shadow: 0 0 10px #ccc; width: 30%;" class="bg-dark me-md-3 pt-3 px-3 pb-5 rounded-4 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 p-3">
        <h2 class="display-5">Search Students</h2>
        <p class="lead">Search information of students by any properties.</p>
      </div>
      <div class="increasewidth bg-dark shadow-sm mx-auto" style="width: 80%;border-radius: 10px;">
        <a href="<?php echo search ?>" type="button" class="w-100 btn btn-lg btn-danger">Search</a>
      </div>
    </div>
  </div>
</main>
<!-- <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<style>



</style>

</body>
</html>