<?php

/**
* the auto-loading function, which will be called every time a file "is missing"
* NOTE: don't get confused, this is not "__autoload", the now deprecated function
* The PHP Framework Interoperability Group (@see https://github.com/php-fig/fig-standards) recommends using a
* standardized auto-loader https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md, so we do:
*/
/*Cuando php hace una funcion de una clase que no tiene, php va a buscar una clase con el mismo nombre de la 
clase en el directorio libs y hace un require de la misma al vuelo y nos evitamos incluirlas.*/
function autoload($class) {
    // if file does not exist in LIBS_PATH folder [set it in config/config.php]
    $class_min = strtolower($class);
    
    /*
    *Linux: Si esta en minuscula lo requiere. Si esta en mayula lo requiere. Y si no esta en ninguna hace el exit.
    *Window$: Si esta en minuscula o mayuscula lo requiere y no entra en el else if. Si no esta volvera a preguntar en vano y luego hara el exit.
    **/
    if (file_exists(LIBS_PATH . $class_min . ".php") {
        require LIBS_PATH . $class_min . ".php"; 
    } else if (file_exists(LIBS_PATH .$class. ".php"){
         require LIBS_PATH . $class . ".php"; 
      }else{
	 exit ('The file ' . $class_min . '.php is missing in the libs folder.');
    }
}

// spl_autoload_register defines the function that is called every time a file is missing. as we created this
// function above, every time a file is needed, autoload(THENEEDEDCLASS) is called
spl_autoload_register("autoload");
