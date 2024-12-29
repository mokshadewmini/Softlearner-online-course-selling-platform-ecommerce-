<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice | SoftLeaRNER</title>

    <link rel="stylesheet" href="bootstrap 5.2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/s.jfif" />
</head>

<body class="mt-2" style="background-color: #f7f7ff;">

    <div class="container-fluid">
        <div class="row">

            <?php 

            require "connection.php";

            if (isset($_SESSION["u"])) {
                $email = $_SESSION["u"]["email"];
               
            ?>
            <?php
                                $invoice_rs = Database::search("SELECT * FROM `invoice` ");
                                $invoice_data = $invoice_rs->fetch_assoc();

                                ?>
                                <?php
                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_data["product_id"] . "'");
                                            $product_data = $product_rs->fetch_assoc();
                                            ?>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12 btn-toolbar justify-content-end">
                <button class="btn btn-success me-2" onclick="feedback();" ><i class="bi bi-chat-text"></i> Add a Feedback</button>
                    <button class="btn btn-dark me-2" onclick="printInvoice();"><i class="bi bi-printer-fill"></i> print</button>
                    <button class="btn btn-danger me-2" ><i class="bi bi-filetype-pdf" ></i> Export as PDF</button>
                </div>
                <?php
$rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $email . "'");
$num = $rs->num_rows;




    $total = "0";
   

    for ($x = 0; $x < $num; $x++) {
        $data = $rs->fetch_assoc();
        $rs1 = Database::search("SELECT * FROM `product` WHERE `id` = '" . $data["product_id"] . "'");
        $p = $rs1->fetch_assoc();

        

            $total += ($p["price"] * $data["qty"]);
          
    }

?>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12" id="page">
                    <div class="row">

                        <div class="col-6">
                            <div class="ms-5 invoiceHeaderImage"></div>
                        </div>

                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 text-primary text-decoration-underline text-end">
                                    <h2>SoftLeaRNER</h2>
                                </div>
                                <div class="col-12 fw-bold text-end">
                                <span>Wellawatthe, Colombo 06, Sri Lanka</span><br />
                                    <span>+94112 4445558</span><br />
                                    <span>softlearner@gmail.com</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary" />
                        </div>

                        <div class="col-12 mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="fw-bold">INVOICE TO :</h5>
                                    
                                    <h2><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></h2>
                                    <br />
                                    <span><?php echo $email; ?></span>
                                </div>
                                
                                <div class="col-6 text-end mt-4">
                                    <h1 class="text-primary">INVOICE </h1>
                                    <span class="fw-bold">Date & Time of Invoice : </span><br />
                                    <span><?php echo $invoice_data["date"]; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <table class="table">

                                <thead>
                                    <tr class="border border-1 border-secondary">
                                        <th>#</th>
                                        <th>Courses from cart checkout</th>
                                        <th class="text-end">Unit Price</th>
                                        <th class="text-end"></th>
                                        <th class="text-end">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 72px;">
                                        <td class="bg-primary text-white fs-3"><?php echo $invoice_data["id"]; ?></td>
                                        <td>
                                           <br />
                                            
                                            <span class="fw-bold text-primary fs-4 p-2">Selected Items in the cart</span>
                                        </td>
                                        <td class="fw-bold fs-6 text-end pt-4 bg-secondary text-white"> - </td>
                                        <td class="fw-bold fs-6 text-end pt-4"></td>
                                        <td class="fw-bold fs-6 text-end pt-4 bg-secondary text-white">Rs. <?php echo $total; ?> .00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <?php
                                   
                                    $t = $invoice_data["total"];
                                    
                                    ?>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold">SUBTOTAL</td>
                                        <td class="text-end">Rs. <?php echo $total; ?> .00</td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold border-primary text-primary">GRAND TOTAL</td>
                                        <td class="text-end border-primary text-primary">Rs. <?php echo $total; ?> .00</td>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>

                        <div class="col-4 text-center" style="margin-top: -100px;">
                            <span class="fs-1 fw-bold text-success">Thank You !</span>
                        </div>

                        <div class="col-12 border-start border-5 border-primary mt-3 mb-3 rounded" style="background-color: #e7f2ff;">
                            <div class="row">
                                <div class="col-12 mt-3 mb-3">
                                    <label class="form-label fw-bold fs-5">NOTICE : </label><br />
                                    <label class="form-label fs-6">Money back guarantee for 3 days.</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary" />
                        </div>

                        <div class="col-12 text-center mb-3">
                            <label class="form-label fs-5 text-black-50 fw-bold">
                                Invoice was created on a computer and is valid without the Signature and Seal.
                            </label>
                        </div>

                    </div>
                </div>

            <?php
            }
            ?>

           

</div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>