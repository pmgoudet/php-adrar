<?php

include "./utils/utils.php";
include "./model/modelUser.php";
include "./view/viewHome.php";
include "./controller/controllerHome.php";

$home = new ControllerHome(new viewHome, new ModelUser);
$home->render();
