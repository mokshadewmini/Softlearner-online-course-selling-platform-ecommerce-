<?php

session_start();

require "connection.php";

$user = $_SESSION["u"];

$search = $_POST["s"];
$time = $_POST["t"];
$price = $_POST["q"];


$query = "SELECT * FROM `product` ";

if (!empty($search)) {
    $query .= " WHERE `title` LIKE '%" . $search . "%'";
}
if ($time != "0") {
    if ($time == "1") {
        $query .= " ORDER BY `datetime_added` DESC";
    } else if ($time == "2") {
        $query .= " ORDER BY `datetime_added` ASC";
    }
}

if ($time != "0" && $price != "0") {
    if ($price == "1") {
        $query .= " , `price` DESC";
    } else if ($price == "2") {
        $query .= " , `price` ASC";
    }
} else if ($time == "0" && $price != "0") {
    if ($price == "1") {
        $query .= " ORDER BY `price` DESC";
    } else if ($price == "2") {
        $query .= " ORDER BY `price` ASC";
    }
}

?>

<div class="offset-1 col-10 text-center">
    <div class="row justify-content-center">

        <?php
if (isset($_POST["page"])) {
    $pageno = $_POST["page"];
}else {
    $pageno = 1;
}

        $product_rs = Database::search($query);
        $product_num = $product_rs->num_rows;

        $results_per_page = 8;
        $number_of_pages = ceil($product_num / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs = Database::search($query. " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

        $selected_num = $selected_rs->num_rows;

        for ($x = 0; $x < $selected_num; $x++) {
            $selected_data = $selected_rs->fetch_assoc();

        ?>

            <!-- card -->
            <div class="card mb-3 mt-3 col-12 col-lg-6">
                <div class="row">
                    <div class="col-md-4 mt-4">
                        <?php

                        $product_img_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $selected_data["id"] . "'");
                        $product_img_data = $product_img_rs->fetch_assoc();

                        ?>
                        <img src="<?php echo $product_img_data["image_code"]; ?>" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?php echo $selected_data["title"]; ?></h5>
                            <span class="card-text fw-bold text-primary">Rs. <?php echo $selected_data["price"]; ?> .00</span><br />
                            <a href='<?php echo "singleProductView.php?id=".$selected_data["id"];?>'><button class="col-12 btn btn-success">Buy Now</button></a>
                            <div class="form-check form-switch">
                               
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- card -->

        <?php

        }

        ?>


    </div>
</div>

