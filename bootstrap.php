<?php

    require __DIR__ . "/config.php";
    require __DIR__ . "/src/connect.php";
    require __DIR__ . "/src/route.php";

    if (route('/admin/?(.*)')){
        require __DIR__ . "/admin/routes.php";
    }