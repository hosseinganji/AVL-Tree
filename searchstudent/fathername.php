<?php

if($_SERVER["REQUEST_METHOD"] == "GET"){
?>
<html lang="en">
<?php require("../head.php");  ?>
    <body>
    <?php require("../navbar.php") ?>
    <div style="width: 100%; height: 90%;" class="d-flex flex-column flex-shrink-0 p-3 overflow-auto float-end">
        <div class="px-3 pt-2">
            <main class="form-signin m-auto text-center w-50 p-3 rounded-3 bg-white mt-5">
                <form method="post" novalidate="">
                    <h2 class="h2 mb-3 fw-normal mb-4 mt-2">Search By Fathername</h2>

                    <div class="form-floating mx-4 mb-3">
                        <input type="text" name="fathername" class="form-control" id="fathername" placeholder="fathername">
                        <label for="fathername">Father Name</label>
                    </div>

                    <div style="width: -webkit-fill-available;" class="form-floating float-start mx-4 mb-4">
                        <button name="add" class="w-100 btn btn-lg btn-success" type="submit">Search</button>
                    </div>
                    <p class="mt-4 mb-2 text-muted">Data Structure Project</p>
                </form>
            </main>
        </div>
    </div>



</body></html>



<?php

}elseif($_SERVER["REQUEST_METHOD"] == "POST"){

    require "../avltree.php";

    $data = [
        "fathername" => trim($_POST["fathername"])
    ];
    
    $GLOBALS["i"] = 0;
    function search($root){  
        if($root == null){return;}
        search($root->left);
        $GLOBALS["i"]++;
        $GLOBALS["searchfathername"][$GLOBALS["i"]] = $root->value;
        search($root->right);
    }
    search($node);
    
//
?>


<html lang="en">
<?php require("../head.php");  ?>
    <body>
    <?php require("../navbar.php") ?>
    <main class="container mt-4">
        <h1 class="fw-bold">Filter By: <?php echo $data["fathername"]?></h1>
<div class="row mb-2 mt-3">

<?php
//
    foreach($searchfathername as $info){
        if($data["fathername"] == $info[3]){
            // var_dump($info);
        ?>
            <div class="col-md-6">
                <div class="row g-0 bg-white border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        
                        <h3 class="mb-3"><span class="fw-bold">Full Name:</span> <?php echo $info[1] ?> - <?php echo $info[2] ?></h3>
                        <strong class="d-inline-block mb-2 text-success"><span class="fw-bold">Numbers(Home - Phone):</span> <?php echo $info[7] ?> - <?php echo $info[8] ?></strong>
                        <div class="mb-1 text-muted"><span class="fw-bold">Father Name:</span> <?php echo $info[3] ?></div>
                        <div class="mb-1 text-muted"><span class="fw-bold">Birth Of Date:</span> <?php echo $info[4] ?></div>
                        <p class="card-text mb-auto"><span class="fw-bold">Adress:</span> <?php echo $info[9] ?></p>
                        <span href="#" class="stretched-link"><span class="fw-bold">Birth Certificate Number:</span> <?php echo $info[5] ?></span>
                        <span href="#" class="stretched-link"><span class="fw-bold">National Code:</span> <?php echo $info[6] ?></span>
                        <span href="#" class="stretched-link"><span class="fw-bold">Student Number:</span> <?php echo $info[10] ?></span>
                    </div>
                        <!-- <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        </div> -->
                </div>
            </div>
        <?php
        }
    }
}
?>





  </div>
        </main>
  </body>
</html>