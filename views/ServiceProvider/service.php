<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['res'])) {
    header('Location: ../auth/index.php');
} else {
    include './service_header.php';



?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            margin-top: 20px;
            background: #eee;
        }

        h3 {
            font-size: 16px;
        }

        .text-navy {
            color: #1ab394;
        }

        .cart-product-imitation {
            text-align: center;
            margin: 0 10px;
            height: 100px;
            width: 100px;
            /* background-color: #f8f8f9; */
        }

        .product-desc {
            padding: 20px;
            position: relative;
        }

        .ecommerce .tag-list {
            padding: 0;
        }

        .ecommerce .fa-star {
            color: #d1dade;
        }

        .ecommerce .fa-star.active {
            color: #f8ac59;
        }

        .ecommerce .note-editor {
            border: 1px solid #e7eaec;
        }

        table.shoping-cart-table {
            margin-bottom: 0;
        }

        table.shoping-cart-table tr td {
            border: none;
            text-align: right;
        }

        table.shoping-cart-table tr td.desc,
        table.shoping-cart-table tr td:first-child {
            text-align: left;
        }

        table.shoping-cart-table tr td:last-child {
            width: 80px;
        }

        .ibox {
            clear: both;
            margin-bottom: 25px;
            margin-top: 0;
            padding: 0;
        }

        .ibox.collapsed .ibox-content {
            display: none;
        }

        .ibox:after,
        .ibox:before {
            display: table;
        }

        .ibox-title {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background-color: #ffffff;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 3px 0 0;
            color: inherit;
            margin-bottom: 0;
            padding: 14px 15px 7px;
            min-height: 48px;
        }

        .ibox-content {
            background-color: #ffffff;
            color: inherit;
            padding: 15px 20px 20px 20px;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 0;
        }

        .ibox-footer {
            color: inherit;
            border-top: 1px solid #e7eaec;
            font-size: 90%;
            background: #ffffff;
            padding: 10px 15px;
        }
    </style>
    <section id="portfolio" class="" style="padding-left: 340px; padding-right:50px;">
        <div class="row">
            <div class="ibox">
                <div class="ibox-title">
                    <!-- <span class="pull-right">(<strong>5</strong>) items</span>-->
                    <h5>Your Service</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table shoping-cart-table">
                            <tbody>
                                <tr>
                                    <td width="90">
                                        <div class="cart-product-imitation">
                                            <?php
                                            
                                            $user_id = $_SESSION['res']->user_id;
                                            $res = $dbm->servicePaginateByUser($user_id);
                                            ?>
                                          <img style="height: 100px; max-width:150px; "  src="<?php echo $res[0]->image; ?>">  
                                        </div>
                                    </td>
                                    <td class="desc">
                                        <h3>
                                            <a href="#" class="text-navy">
                                                <?php

                                                echo $res[0]->user_name; ?>
                                            </a>
                                        </h3>
                                        <h6 class="" style="font-weight: bold;margin-bottom:20px;">
                                            <?php echo $res[0]->first_service; ?>
                                        </h6>
                                        <h5 class="">
                                            <?php echo $res[0]->title; ?>
                                        </h5>

                                        <dl class="small m-b-none">
                                            <!-- <dt>Description lists</dt> -->
                                            <?php echo $res[0]->description; ?>
                                        </dl>

                                        <div class="m-t-sm">
                                            <a class="" style="text-decoration: none; color:black;"><i class=" p-1 fas fa-briefcase"></i></a>

                                            <a class=" p-1" style="text-decoration: none; color:black;"> <?php $exp = $res[0]->experience;
                                                                                                            if ($exp <= 1) {
                                                                                                                echo $exp, " Year";
                                                                                                            } else {
                                                                                                                echo $exp, " Years";
                                                                                                            }; ?> Experience</a>
                                        </div>
                                    </td>

                                    <td>
                                        <s class="small text-muted"></s>
                                    </td>

                                    <td>
                                        <h4>
                                            <?php echo "$", $res[0]->rate; ?>
                                        </h4>
                                        per hour
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php include './service_footer.php';
} ?>