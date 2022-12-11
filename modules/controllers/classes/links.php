<?php
    class Links {

        protected $router   ;
        protected $home     ;
        protected $error404 ;

        protected $path_to_controller_pages ;
        protected $path_to_view_pages       ;

        protected $pages ;

        public function getUrlRoot () {
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                $url = "https://";   
            else  
                $url = "http://";

            $url.= $_SERVER['HTTP_HOST'];

            return $url;
        }

        public function getUrl () {
            return ($this -> getUrlRoot ()) . $_SERVER['REQUEST_URI'] ;
        }

        public function createRouter () {

            if (isset ($_GET['page'])) {

                $directory = $this -> path_to_controller_pages;
                $scanned_directory = array_diff (scandir ($directory), array ('..', '.'));
                $include404 = true;


                

                foreach ($scanned_directory as $link) {
                    if (str_contains ($link, '.php') && ($_GET['page'].".php") == $link) {

                        include_once(($this -> path_to_controller_pages).$link);
                        $include404 = false;
                        break;

                    }
                }

                if ($include404) {

                    include_once(($this -> path_to_controller_pages).($this -> error404).'.php');

                } 
                
                

            } else {

                header("Location: ".$this -> getUrlRoot ()."/".($this -> router).".php?page=home") ;

            }

        }

        public function getNavLinks ($active_class, $li_class, $a_class, $pagesNav) {
            $string_to_fill = "" ;
            foreach ($pagesNav as $key => $value) {
                if (isset($_GET["page"]) && $_GET["page"] == $key) {
                    $string_to_fill .= "<li class='".$li_class." ".$active_class."'><a class='".$a_class."' href='".$this -> getUrlRoot ()."/".$this -> router.".php?page=".$key."'>".$value."</a></li>" ;
                } else {
                    $string_to_fill .= "<li class='".$li_class."'><a class='".$a_class."' href='".($this -> getUrlRoot ()."/".$this -> router.".php?page=".$key)."'>".$value."</a></li>" ;
                }

            }
            return $string_to_fill ;
        }

        public function issetPOST ($vars):bool {
            if (is_string($vars)) {
                return isset($_POST[$vars]);

            } elseif (is_array($vars)){

                $test = true ;
                foreach ($vars as $var) {
                    if (!isset($_POST[$var])) {
                        $test = false ;
                    }
                } ;
                return $test ;
            } else {
                return false ;
            }
        }

        public function issetGET ($vars):bool {
            if (is_string($vars)) {
                return isset($_GET[$vars]);

            } elseif (is_array($vars)){

                $test = true ;
                foreach ($vars as $var) {
                    if (!isset($_GET[$var])) {
                        $test = false ;
                    }
                } ;
                return $test ;
            } else {
                return false ;
            }
        }

        public function getFeedBack ($check, $msg_true, $msg_false, $name_response) {
            if ($check) {
                if ($msg_true != "") {
                    setcookie($name_response, $msg_true, time()+3, '/');
                }
            } else {
                if ($msg_false != "") {
                    setcookie($name_response, $msg_false, time()+3, '/');
                }
            }
        }

        public function headerInPage ($check, $header_true, $header_false) {
            if ($check) {
                header('Location: ' . $header_true);

            } else {
                header('Location: ' . $header_false);
            }
        }

        public function __construct(string $router, string $home, int $error404, string $path_to_controller_pages, string $path_to_view_pages, array $pages) {

            $this -> router                   = $router                   ;
            $this -> home                     = $home                     ;
            $this -> error404                 = $error404                 ;
            $this -> path_to_controller_pages = $path_to_controller_pages ;
            $this -> path_to_view_pages       = $path_to_view_pages       ;
            
            $this -> pages             = $pages             ;
        }
    }



    
?>