<html lang="en">
<?php require("head.php");  ?>
    <body>
        <style>
            td {
                vertical-align: middle;
            }
        </style>
    <?php require("navbar.php");
    require("avltree.php");
    $GLOBALS["i"] = 0;
    function search($root){  
        if($root == null){return;}
        search($root->left);
        $GLOBALS["i"]++;
        $GLOBALS["student_info"][$GLOBALS["i"]] = $root->value;
        search($root->right);
    }
    search($node);
    ?>
    <main class="col-md-12 ms-sm-auto px-md-4">
    <div class="text-center mb-5 mt-4">
        <h2 class="fw-bold">Students Information</h2>
    </div>
    <div style="background-color: #fff; padding: 20px 10px; border-radius: 10px;" class="table-responsive">
        <table class="table table-borderd table-striped table-hover">
          <thead>
            <tr class="border-bottom border-dark border-2">
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Father Name</th>
                <th scope="col">Birth Of Date</th>
                <th scope="col">Birth Certificate Number</th>
                <th scope="col">National Code</th>
                <th scope="col">Student Number</th>
                <th scope="col">Home Number</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Address</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach(range(1 , $GLOBALS["i"]) as $j){ ?>
                    <tr>
                        <td><?php echo $GLOBALS["student_info"][$j][0] ?></td>
                        <td><?php echo $GLOBALS["student_info"][$j][1] ?></td>
                        <td><?php echo $GLOBALS["student_info"][$j][2] ?></td>
                        <td><?php echo $GLOBALS["student_info"][$j][3] ?></td>
                        <td><?php echo $GLOBALS["student_info"][$j][4] ?></td>
                        <td><?php echo $GLOBALS["student_info"][$j][5] ?></td>
                        <td><?php echo $GLOBALS["student_info"][$j][6] ?></td>
                        <td><?php echo $GLOBALS["student_info"][$j][10] ?></td>                        
                        <td><?php echo $GLOBALS["student_info"][$j][7] ?></td>
                        <td><?php echo $GLOBALS["student_info"][$j][8] ?></td>
                        <td><?php echo $GLOBALS["student_info"][$j][9] ?></td>
                    </tr> 
                <?php } ?>
            </tbody>
        </table>
      </div>
    </main>

      </body>
</html>