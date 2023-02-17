<?php

if($_SERVER["REQUEST_METHOD"] == "GET"){
?>
<html lang="en">
<?php require("head.php");  ?>
    <body>
    <?php require("navbar.php") ?>

    <div style="width: 100%; height: 90%;" class="d-flex flex-column flex-shrink-0 p-3 overflow-auto float-end">
        <div class="px-3 pt-2">
            <main class="form-signin m-auto text-center w-50 p-3 rounded-3 bg-white mt-5">
                <form method="post" novalidate="">
                    <h2 class="h2 mb-3 fw-normal mb-4 mt-2">Search By National Code</h2>

                    <div class="form-floating mx-4 mb-3">
                        <input type="number" name="nationalcode" class="form-control" id="nationalcode" placeholder="nationalcode">
                        <label for="nationalcode">National Code</label>
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

    require "avltree.php";
    $data = [
        "nationalcode" => trim($_POST["nationalcode"]),
        "nationalcode_err" => ""
    ];


    if(empty($data["nationalcode"])){$data["nationalcode_err"] = "Please enter your nationalcode";}
    elseif(strlen($data["nationalcode"]) != 10){$data["nationalcode_err"] = "Your national code must be 10 characters";}
    elseif(!nationalcode($data["nationalcode"] , $node)){$data["nationalcode_err"] = "This national code not exist";}

    if(empty($data["nationalcode_err"])){

    function searchnationalcode($node , $nationalcode){
        if($node == null){return;}
        searchnationalcode($node->right , $nationalcode);
        if($node->value[6] == $nationalcode){$GLOBALS["studentinfo"] = $node->value;}
        searchnationalcode($node->left , $nationalcode);
    }
    searchnationalcode($node , $data["nationalcode"]);


?>
    <html lang="en">
<?php require("head.php");  ?>
    <body>
    <?php require("navbar.php") ?>
    <main class="container mt-4">
        <h1 class="fw-bold">Filter By: <?php echo $data["nationalcode"]?></h1>
<div class="row mb-2 mt-3">
<div class="col-md-6">
                <div class="row g-0 bg-white border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-3"><span class="fw-bold">Full Name:</span> <?php echo $GLOBALS["studentinfo"][1] ?> - <?php echo $GLOBALS["studentinfo"][2] ?></h3>
                        <strong class="d-inline-block mb-2 text-success"><span class="fw-bold">Numbers(Home - Phone):</span> <?php echo $GLOBALS["studentinfo"][7] ?> - <?php echo $GLOBALS["studentinfo"][8] ?></strong>
                        <div class="mb-1 text-muted"><span class="fw-bold">Father Name:</span> <?php echo $GLOBALS["studentinfo"][3] ?></div>
                        <div class="mb-1 text-muted"><span class="fw-bold">Birth Of Date:</span> <?php echo $GLOBALS["studentinfo"][4] ?></div>
                        <p class="card-text mb-auto"><span class="fw-bold">Adress:</span> <?php echo $GLOBALS["studentinfo"][9] ?></p>
                        <span href="#" class="stretched-link"><span class="fw-bold">Birth National Code:</span> <?php echo $GLOBALS["studentinfo"][5] ?></span>
                        <span href="#" class="stretched-link"><span class="fw-bold">National Code:</span> <?php echo $GLOBALS["studentinfo"][6] ?></span>
                    </div>
                </div>
            </div>

            

  </div>
        </main>
  </body>
</html>




<?php 
 }else{

?>
    <html lang="en">
<?php require("head.php");  ?>
    <body>
    <?php require("navbar.php") ?>

    <div style="width: 100%; height: 90%;" class="d-flex flex-column flex-shrink-0 p-3 overflow-auto float-end">
        <div class="px-3 pt-2">
            <main class="form-signin m-auto text-center w-50 p-3 rounded-3 bg-white mt-5">
                <form method="post" novalidate="">
                    <h2 class="h2 mb-3 fw-normal mb-4 mt-2">Search By National Code</h2>

                    <div class="form-floating mx-4 mb-3">
                        <input type="number" name="nationalcode" value="<?php echo $data["nationalcode"]; ?>" class="form-control <?php if(!empty($data["nationalcode_err"])){echo "is-invalid";}else{echo "is-valid";} ?>" id="nationalcode" placeholder="nationalcode">
                        <label for="nationalcode">National Code</label>
                        <div class="invalid-feedback"><?php echo $data["nationalcode_err"]; ?></div>
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
 }
}
?>