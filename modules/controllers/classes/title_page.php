<?php
    class Title_page {

        public function getTitlePage (string $default, array $pages):string {
            if (isset($_GET["page"])) {

                $title = $default;

                foreach ($pages as $key => $page) {
                    if ($key == $_GET["page"]) {
                        $title = $page ;
                        break ;
                    }
                } 

                return $title ;

            } else {
                return $default ;
            }
        }

    }



?>