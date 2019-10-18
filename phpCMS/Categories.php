<?php include_once("include/DB.php"); ?>
<?php include_once("include/Sessions.php"); ?>
<?php include_once("include/Functions.php"); ?>
<?php
if(isset($_POST["Submit"])){
    $Category = mysqli_real_escape_string($connection,$_POST["Category"]);
    date_default_timezone_set("Europe/Stockholm");
    $CurrentTime = time();
    $DateTime = strftime('%Y-%m-%d %H:%M:%S ',$CurrentTime);
    $Admin = "Ali";
    if(empty($Category)){
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("Categories.php");
    }elseif(strlen($Category>99)){
        $_SESSION["ErrorMessage"] = "Too long Name for Category";
        Redirect_to("Categories.php");
    } else {
        global $connection;
        $Query = "INSERT INTO category(datetime,name,creatorname)
        VALUES('$DateTime','$Category','$Admin')";
        $Execute = mysqli_query($connection,$Query);
        if($Execute){
            $_SESSION['SuccessMessage'] = "Category Added Successfully";
            Redirect_to("Categories.php");
        } else {
            $_SESSION['ErrorMessage'] = "Category failed to Add";
            Redirect_to("Categories.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admib Dashboard</title>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel= "stylesheet" href = "css/adminStyles.css" > 
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <h1>Ali&Beni</h1>
                <ul id = "side-menu" class="nav nav-pills nav-stacked">
                    <li >
                        <a href="dashboard.php">
                        <!-- <i class='fas fa-grip-vertical'></i> --> Dashboard</a></li>
                    <li ><!-- <i class='far fa-address-card'></i> --><a href="#">Add New Post</a></li>
                    <li class = "active" ><!-- <i class='fab fa-canadian-maple-leaf'></i> --><a href="categories.php">Categories</a></li>
                    <li ><!-- <i class="fa fa-user-md"></i> --><a href="#">Manage Admins</a></li>
                    <li ><!-- <i class="fa fa-columns"></i> --><a href="#">Comment Us </a></li>
                    <li ><!-- <i class='fas fa-blog'></i> --><a href="#">Live blog us </a></li>
                    <li ><!-- <i class="fas fa-sign-out-alt"></i> --><a href="#">Logout</a></li>
                </ul>
            </div><!-- Ending of side area -->
            <div class="col-sm-10">
                <h1>Manage Categories</h1>
                <?php echo Message(); ?>
                <?php echo SuccessMessage(); ?>
                <div>
                    <form action = "Categories.php" method="post" >
                        <fieldset>
                            <div class = "form-group">
                                <label for = "categoryname" >Name:</label>
                                <input class = "form-control" type="text" name="Category" placeholder="Name" >
                            </div>
                            <input class = "btn btn-primary btn-block" type="submit" name="Submit" value="Add New Category">                           
                        </fieldset>
                    </form>
                </div>
            </div><!-- Ending of main area -->
        </div><!-- Ending of row -->
    </div><!-- Ending of container -->
    <div id = "footer">
    <h4>About</h4>

        <p>Theme by | Ali Ezadkhaha | &copy; 2019-2020 --- All right reserved</p>
        <p>
            <a style = "color:white;text-decoration:none;cursor:pointer;font-weight:bold;"
            href = "https://www.google.com/">This is just for study purpose</a>
        </p>
    </div>
    <div style = "height:10px;background:#27aae1;"></div>
</body>
</html>