

<?php

require "connection.php";

$txt = $_POST["t"];


$query = "SELECT * FROM `product`";

if (!empty($txt) ) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'";

}if (empty($txt) ) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'";

}

?>

<div class="row">
    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row">

            <?php


            if ("0" != ($_POST["page"])) {
                $pageno = $_POST["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 4;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>
             <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">

  <?php


$images_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='".$selected_data["id"]."'");
$images_data = $images_rs->fetch_assoc();
    
?>


<span class="d-inline-block " tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" 
data-bs-content="<?php echo $product_data["you_learn"]; ?>" style="font-color: purple;">

<img src="<?php echo $images_data["image_code"]; ?>" class="img-fluid rounded-start" style="height: 200px;" />
</span>

     
          

         
          
            <div class="post-box">
             
              <div class="meta">
                <span class="post-date" style="font-size: 14px;"><i class="bi bi-patch-exclamation-fill"></i>Last updated <?php echo $selected_data["datetime_added"]; ?></span>
                <span class="post-author"> </span>
              </div>
              <h3 class="post-title"><?php echo $selected_data["title"]; ?> </h3>
          
              <h6 style="font-size: 12px;"><i class="bi bi-award"></i>by softlearner </h6>
             <h6>Rs. <?php echo $selected_data["price"]; ?> .00</h6>
        <a href="blog-details.html" class="readmore stretched-link"> <button class="col-12 btn btn-success">Buy Now</button></a>
      <br/>
        <div class=" col-12 col-lg-12">
                                   <div class="row">
                                                        <div class="col-10 col-lg-4 offset-1">
                                                            <div class="row g-2">
                                                             
                                                                
                                                                    <button class="btn btn-outline-warning fw-bold" ><i class="bi bi-cart-plus" style="font-size: 23px; color:#E30B5C;"></i></button>
                                                                </div>
                                                                </div>
                                                                <div class="col-10 col-lg-4 offset-1">
                                                            <div class="row g-2">
                                                                    <button class="btn btn-light fw-bold" ><i class="bi bi-suit-heart" style="font-size: 23px;"></i></button>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                </div>
          
          </div>
          </div>

          <?php
}
?>

         

          
         


    </section><!-- End Recent Blog Posts Section -->
    
    </div>
           

        </div>
    </div>

</div>
</div>


</div>
</div>
<!--  -->
<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="basicSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                        } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php

            for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {
            ?>
                    <li class="page-item active">
                        <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="page-item">
                        <a class="page-link" onclick="basicSearch(<?php echo ($x) ?>);"><?php echo $x; ?></a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                            echo ("#");
                                        } else {
                                        ?> onclick="basicSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                        } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!--  -->
</div>
