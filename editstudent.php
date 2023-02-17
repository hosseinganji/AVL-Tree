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
                <form method="get" action="edit" novalidate>
                    <h2 class="h2 mb-3 fw-normal mb-4 mt-2">Edit Student</h2>

                    <div class="form-floating mx-4 mb-3">
                        <input type="number" name="nationalcode" class="form-control" id="nationalcode" placeholder="nationalcode">
                        <label for="nationalcode">National Code</label>
                    </div>

                    <div style="width: -webkit-fill-available;" class="form-floating float-start mx-4 mb-4">
                        <button class="w-100 btn btn-lg btn-success" type="submit">Edit</button>
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
?>