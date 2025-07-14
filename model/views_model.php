<?php
// Esta clase se encarga de validar y retornar la vista que debe mostrarse al usuario.
class viewModel{
     // Método estático protegido get_view
    // Recibe el nombre de la vista solicitada ($view) y devuelve su ruta si es válida.
    protected static function get_view($view){
    // Lista blanca de vistas permitidas
    // Solo estas vistas se pueden acceder directamente si existen en la carpeta /view
        $white_list = ["home", "products", "users", "new-user", "categories"];
            // Si la vista está en la lista blanca
        if (in_array($view, $white_list)) {
            // Verifica si el archivo PHP de la vista realmente existe en la carpeta /view
            if (is_file("./view/".$view.".php")) {
                 // Si existe, se devuelve la ruta completa del archivo
                $content = "./view/".$view.".php";
            }else{
                $content = "404";
            }
           // Si la vista solicitada es "login" (acceso permitido fuera de la lista blanca)
        }elseif($view == "login"){ 
              // En este caso, se devuelve directamente "login"
            $content = "login";
        }else{
            $content = "404";
        }
        // Retorna la ruta del contenido (vista) correspondiente
         return $content;
    }
}
