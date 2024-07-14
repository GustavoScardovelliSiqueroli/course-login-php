<?php
spl_autoload_register(function ($class) {
    include "classes\\" . $class . '.php';
});
?>

<?php
use \configs\Router;
Router::mainRouter();
