<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="<?php echo __WEB_ROOT ?>public/assets/client/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo __WEB_ROOT ?>public/assets/client/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        
    </style>
</head>

<body>
    <?php
    if (!empty($sub_header)) {
        $this->view($header, $sub_header);
    } else {
        $this->view('client/block/header');
    }
    ?>
    <main >
        <div class="container-xxl px-5">
            <?php if (!empty($sub_sidebar)) { ?>
                <div class="row">
                    <div style="width: 30%;">
                        <?php
                        $this->view($sidebar, $sub_sidebar);
                        ?>
                    </div>
                    <div style="width: 70%;">
                        <?php
                        $this->view($content_product, $sub_sidebar);
                        ?>
                    </div>
                </div>
            <?php
            } else if (!empty($sidebar)) {
            ?>
                <div class="row">
                    <div style="width: 100%;">
                        <?php
                        $this->view($content_product);
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
            <div>
                <div class="mt-3 row rounded d-flex justify-content-center">
                    <?php
                    if(!empty($content)){
                    $this->view($content, $sub_content);
                    }
                    ?>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-3">
                        <?php
                        if(!empty($sidebar_user)){
                            $this->view($sidebar_user,$sub_sidebar_user);
                        }
                        ?>
                    </div>
                    <div class="col-9">
                        <?php 
                        if(!empty($content_user)){
                            $this->view($content_user,$sub_content_user);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div>
        <?php
        if(!empty($main_content)){
        $this->view($main_content,$sub_main_content);
        }
        ?>
    </div>
    <?php
    $this->view('client/block/footer');
    ?>
    <script src="<?php echo __WEB_ROOT; ?>public/assets/client/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>