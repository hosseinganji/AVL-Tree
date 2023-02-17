<?php
require "avltree.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    
?>


<html lang="en">
<?php require("head.php");  ?>
    <body>
    <?php require("navbar.php") ?>

    <div style="width: 100%; height: 90%;" class="d-flex flex-column flex-shrink-0 p-3 overflow-auto float-end">
        <div class="px-3 pt-2">
            <main class="form-signin m-auto text-center w-50 p-3 rounded-3 bg-white mt-5">
                <form method="post" novalidate>
                    <h2 class="h2 mb-3 fw-normal mb-4 mt-2">Add Student</h2>

                    <div class="col-md-5 float-start form-floating mx-4 mb-3">
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="firstname">
                        <label for="firstname">First Name</label>
                    </div>

                    <div class="col-md-5 float-end form-floating mx-4 mb-3">
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="lastname">
                        <label for="lastname">Last Name</label>
                    </div>

                    <div class="col-md-5 float-start form-floating mx-4 mb-3">
                        <input type="text" name="fathername" class="form-control" id="fathername" placeholder="fathername">
                        <label for="fathername">Father Name</label>
                    </div>

                    <div class="col-md-5 float-end form-floating mx-4 mb-3">
                        <input type="date" name="birthofdate" class="form-control" id="birthofdate" placeholder="birthofdate">
                        <label for="birthofdate">Birth Of Date</label>
                    </div>

                    <div class="col-md-5 float-start form-floating mx-4 mb-3">
                        <input type="number" name="birthcertificatenumber" class="form-control" id="birthcertificatenumber" placeholder="birthcertificatenumber">
                        <label for="birthcertificatenumber">Birth Certificate Number</label>
                    </div>
                    
                    <div class="col-md-5 float-end form-floating mx-4 mb-3">
                        <input type="number" name="nationalcode" class="form-control" id="nationalcode" placeholder="nationalcode">
                        <label for="nationalcode">National Code</label>
                    </div>

                    <div class="col-md-5 float-start form-floating mx-4 mb-3">
                        <input type="number" name="homenumber" class="form-control" id="homenumber" placeholder="homenumber">
                        <label for="homenumber">Home Number</label>
                    </div>
                    
                    <div class="col-md-5 float-end form-floating mx-4 mb-3">
                        <input type="number" name="phonenumber" class="form-control" id="phonenumber" placeholder="phonenumber">
                        <label for="phonenumber">Phone Number</label>
                    </div>

                    <div class="col-md-5 float-start form-floating mx-4 mb-3">
                        <input type="number" name="studentnumber" class="form-control" id="studentnumber" placeholder="studentnumber">
                        <label for="studentnumber">Student Number</label>
                    </div>
                    
                    <div class="col-md-5 float-end form-floating float-start mx-4 mb-4">
                        <input type="text" name="address" class="form-control" id="address" placeholder="address">
                        <label for="address">Address</label>
                    </div>

                    <div style="width: -webkit-fill-available;" class="form-floating float-start mx-4 mb-4">
                        <button name="add" class="w-100 btn btn-lg btn-success" type="submit">Add</button>
                    </div>
                    <p class="mt-4 mb-2 text-muted">Data Structure Project</p>
                </form>
            </main>
        </div>
    </div>
</body>
</html>

<?php
}

elseif($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = [
        "firstname" => trim($_POST["firstname"]),
        "firstname_err" => "",
        "lastname" => trim($_POST["lastname"]),
        "lastname_err" => "",
        "fathername" => trim($_POST["fathername"]),
        "fathername_err" => "",
        "birthofdate" => trim($_POST["birthofdate"]),
        "birthofdate_err" => "",
        "birthcertificatenumber" => trim($_POST["birthcertificatenumber"]),
        "birthcertificatenumber_err" => "",
        "nationalcode" => trim($_POST["nationalcode"]),
        "nationalcode_err" => "",
        "homenumber" => trim($_POST["homenumber"]),
        "homenumber_err" => "",
        "phonenumber" => trim($_POST["phonenumber"]),
        "phonenumber_err" => "",
        "address" => trim($_POST["address"]),
        "address_err" => "",
        "studentnumber" => trim($_POST["studentnumber"]),
        "studentnumber_err" => "",
    ];
    if(empty($data["firstname"])){$data["firstname_err"] = "Please enter your firstname";}
    if(empty($data["lastname"])){$data["lastname_err"] = "Please enter your lastname";}
    if(empty($data["fathername"])){$data["fathername_err"] = "Please enter your fathername";}
    if(empty($data["birthofdate"])){$data["birthofdate_err"] = "Please enter your birthofdate";}
    if(empty($data["birthcertificatenumber"])){$data["birthcertificatenumber_err"] = "Please enter your birthcertificatenumber";}

    if(empty($data["nationalcode"])){$data["nationalcode_err"] = "Please enter your national code";}
    elseif(strlen($data["nationalcode"]) != 10){$data["nationalcode_err"] = "Your national code must be 10 characters";}
    elseif(nationalcode($data["nationalcode"] , $node)){$data["nationalcode_err"] = "This national code already used";}
    elseif(!checkNationalCode($data["nationalcode"])){$data["nationalcode_err"] = "This national code is invalid";}

    if(empty($data["studentnumber"])){$data["studentnumber_err"] = "Please enter your student number";}
    elseif(strlen($data["studentnumber"]) != 10){$data["studentnumber_err"] = "Your student number must be 10 characters";}
    elseif(studentnumber($data["studentnumber"] , $node)){$data["studentnumber_err"] = "This student number already used";}

    if(empty($data["homenumber"])){$data["homenumber_err"] = "Please enter your homenumber";}
    if(empty($data["phonenumber"])){$data["phonenumber_err"] = "Please enter your phonenumber";}
    elseif(strlen($data["phonenumber"]) != 11){$data["phonenumber_err"] = "Your phonenumber must be 11 characters";}

    if(empty($data["address"])){$data["address_err"] = "Please enter your address";}    
    if(empty($data["firstname_err"]) && 
       empty($data["lastname_err"]) && 
       empty($data["fathername_err"]) && 
       empty($data["birthofdate_err"]) && 
       empty($data["birthcertificatenumber_err"]) && 
       empty($data["nationalcode_err"]) && 
       empty($data["homenumber_err"]) && 
       empty($data["phonenumber_err"]) && 
       empty($data["address_err"]) &&
       empty($data["studentnumber_err"])
       ){
        //get last index
            index($node);

            $insert = "\n".'$node = insert($node, array("'.$lastindex.'","'.$data["firstname"].'","'.$data["lastname"].'","'
            .$data["fathername"].'","'.$data["birthofdate"].'","'.$data["birthcertificatenumber"].'","'.$data["nationalcode"].
            '","'.$data["homenumber"].'","'.$data["phonenumber"].'","'.$data["address"].'","'.$data["studentnumber"].'"));'; 
        //insert to insert_avltree.php
            $insertavlfile = fopen('insert_avltree.php', 'a');
            fwrite($insertavlfile , $insert);
            fclose($insertavlfile);
?>
            <html lang="en">
            <?php require("head.php");  ?>
                <body>
                <?php require("navbar.php") ?>
                <main class="form-signin m-auto text-center w-50 p-3 rounded-3 bg-white mt-5">
                    <div class="alert alert-success">Added successfully</div>
                    <p class="m-0">
                        <a href="http://localhost/AVL%20Tree" class="btn btn-primary my-2">Home Page</a>
                        <a href="http://localhost/AVL%20Tree/addstudent" class="btn btn-success my-2">Add another Student</a>
                        <a href="http://localhost/AVL%20Tree/searchstudent" class="btn btn-warning my-2">Search Students</a>
                        <a href="http://localhost/AVL%20Tree/showstudents" class="btn btn-danger my-2">All Students</a>
                        <a href="http://localhost/AVL%20Tree/edit?nationalcode=<?php echo $data["nationalcode"]; ?>" class="btn btn-info my-2">Edit this Student</a>
                    </p>
                </main>
                </body>
            </html>
<?php
            // echo $node->height;
            // echo "<hr>";
            // echo inorder($node);
            // echo "<hr>";
            // echo preorder($node);
            // echo "<hr>";
            // echo postorder($node);
            // echo "<hr>";
            // echo balance_factor($node);
            // echo "<hr>";
            // var_dump($node);
            // echo "<hr>";
       }else{

        
?>
        <html lang="en">
<?php require("head.php");  ?>
        <body>
        <?php require("navbar.php") ?>

        <div style="width: 100%; height: 90%;" class="d-flex flex-column flex-shrink-0 p-3 overflow-auto float-end">
            <div class="px-3 pt-2">
                <main class="form-signin m-auto text-center w-50 p-3 rounded-3 bg-white mt-5">
                    <form method="post" novalidate>
                        <h2 class="h2 mb-3 fw-normal mb-4 mt-2">Add Student</h2>
    <div style="height: 100px;">
                        <div class="col-md-5 float-start form-floating mx-4 mb-3">
                            <input type="text" name="firstname" value="<?php echo $data["firstname"]; ?>" class="form-control <?php if(!empty($data["firstname_err"])){echo "is-invalid";}else{echo "is-valid";} ?>" id="firstname" placeholder="firstname">
                            <label for="firstname">First Name</label>
                            <div class="invalid-feedback"><?php echo $data["firstname_err"]; ?></div>
                        </div>

                        <div class="col-md-5 float-end form-floating mx-4 mb-3">
                            <input type="text" name="lastname" value="<?php echo $data["lastname"]; ?>" class="form-control <?php if(!empty($data["lastname_err"])){echo "is-invalid";}else{echo "is-valid";} ?>" id="lastname" placeholder="lastname">
                            <label for="lastname">Last Name</label>
                            <div class="invalid-feedback"><?php echo $data["lastname_err"]; ?></div>
                        </div>
    </div>
    <div style="height: 100px;">
                        <div class="col-md-5 float-start form-floating mx-4 mb-3">
                            <input type="text" name="fathername" value="<?php echo $data["fathername"]; ?>" class="form-control <?php if(!empty($data["fathername_err"])){echo "is-invalid";}else{echo "is-valid";} ?>" id="fathername" placeholder="fathername">
                            <label for="fathername">Father Name</label>
                            <div class="invalid-feedback"><?php echo $data["fathername_err"]; ?></div>
                        </div>

                        <div class="col-md-5 float-end form-floating mx-4 mb-3">
                            <input type="date" name="birthofdate" value="<?php echo $data["birthofdate"]; ?>" class="form-control <?php if(!empty($data["birthofdate_err"])){echo "is-invalid";}else{echo "is-valid";} ?>" id="birthofdate" placeholder="birthofdate">
                            <label for="birthofdate">Birth Of Date</label>
                            <div class="invalid-feedback"><?php echo $data["birthofdate_err"]; ?></div>
                        </div>
                        </div>
    <div style="height: 100px;">
                        <div class="col-md-5 float-start form-floating mx-4 mb-3">
                            <input type="number" name="birthcertificatenumber" value="<?php echo $data["birthcertificatenumber"]; ?>" class="form-control <?php if(!empty($data["birthcertificatenumber_err"])){echo "is-invalid";}else{echo "is-valid";} ?>" id="birthcertificatenumber" placeholder="birthcertificatenumber">
                            <label for="birthcertificatenumber">Birth Certificate Number</label>
                            <div class="invalid-feedback"><?php echo $data["birthcertificatenumber_err"]; ?></div>
                        </div>
                        
                        <div class="col-md-5 float-end form-floating mx-4 mb-3">
                            <input type="number" name="nationalcode" value="<?php echo $data["nationalcode"]; ?>" class="form-control <?php if(!empty($data["nationalcode_err"])){echo "is-invalid";}else{echo "is-valid";} ?>" id="nationalcode" placeholder="nationalcode">
                            <label for="nationalcode">National Code</label>
                            <div class="invalid-feedback"><?php echo $data["nationalcode_err"]; ?></div>
                        </div>
                        </div>
    <div style="height: 100px;">
                        <div class="col-md-5 float-start form-floating mx-4 mb-3">
                            <input type="number" name="homenumber" value="<?php echo $data["homenumber"]; ?>" class="form-control <?php if(!empty($data["homenumber_err"])){echo "is-invalid";}else{echo "is-valid";} ?>" id="homenumber" placeholder="homenumber">
                            <label for="homenumber">Home Number</label>
                            <div class="invalid-feedback"><?php echo $data["homenumber_err"]; ?></div>
                        </div>
                        
                        <div class="col-md-5 float-end form-floating mx-4 mb-3">
                            <input type="number" name="phonenumber" value="<?php echo $data["phonenumber"]; ?>" class="form-control <?php if(!empty($data["phonenumber_err"])){echo "is-invalid";}else{echo "is-valid";} ?>" id="phonenumber" placeholder="phonenumber">
                            <label for="phonenumber">Phone Number</label>
                            <div class="invalid-feedback"><?php echo $data["phonenumber_err"]; ?></div>
                        </div>
    </div>
    <div style="height: 100px;">

                        <div class="col-md-5 float-start form-floating mx-4 mb-3">
                            <input type="number" name="studentnumber" value="<?php echo $data["studentnumber"]; ?>" class="form-control <?php if(!empty($data["studentnumber_err"])){echo "is-invalid";}else{echo "is-valid";} ?>" id="studentnumber" placeholder="studentnumber">
                            <label for="studentnumber">Student Number</label>
                            <div class="invalid-feedback"><?php echo $data["studentnumber_err"]; ?></div>
                        </div>

                        <div class="col-md-5 float-end form-floating float-start mx-4 mb-4">
                            <input type="text" name="address" value="<?php echo $data["address"]; ?>" class="form-control <?php if(!empty($data["address_err"])){echo "is-invalid";}else{echo "is-valid";} ?>" id="address" placeholder="address">
                            <label for="address">Address</label>
                            <div class="invalid-feedback"><?php echo $data["address_err"]; ?></div>
                        </div>
    </div>
                        <div style="width: -webkit-fill-available;" class="form-floating float-start mx-4 mb-4">
                            <button name="add" class="w-100 btn btn-lg btn-success" type="submit">Add</button>
                        </div>
                        <p class="mt-4 mb-2 text-muted">Data Structure Project</p>
                    </form>
                </main>
            </div>
        </div>
    </body>
    </html>




    <?php
        }







}




?>
