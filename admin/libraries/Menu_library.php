<?php

class Menu
{
    public static function item($menu)
    {
        global $base_url;

        $name  = $menu["name"] ?? "";
        $icon  = $menu["icon"] ?? "bi bi-circle";
        $route = $menu["route"] ?? "#";

        $links = $menu["links"] ?? [];

        $hasChild = !empty($links);


        /*
        |--------------------------------------------------------------------------
        | Parent URL
        |--------------------------------------------------------------------------
        */

        $url = $hasChild 
            ? "#" 
            : $base_url . "/" . ltrim($route, "/");



        /*
        |--------------------------------------------------------------------------
        | Menu Item
        |--------------------------------------------------------------------------
        */

        $html = '
        <li class="nav-item">';


        $html .= '
            <a href="'.$url.'" class="nav-link">

                <i class="nav-icon '.$icon.'"></i>

                <p>
                    '.$name;

        if ($hasChild) {

            $html .= '
                    <i class="nav-arrow bi bi-chevron-right"></i>';

        }


        $html .= '
                </p>

            </a>';



        /*
        |--------------------------------------------------------------------------
        | Child Menu
        |--------------------------------------------------------------------------
        */

        if ($hasChild) {


            $html .= '
            <ul class="nav nav-treeview">';


            foreach ($links as $link) {


                $childIcon = $link["icon"] ?? "bi bi-circle";

                $childRoute = $link["route"] ?? "#";

                $childText = $link["text"] ?? "";


                $html .= '

                <li class="nav-item">

                    <a href="'.$base_url.'/'.ltrim($childRoute,"/").'" 
                       class="nav-link">


                        <i class="nav-icon '.$childIcon.'"></i>


                        <p>
                            '.$childText.'
                        </p>


                    </a>

                </li>';

            }


            $html .= '
            </ul>';

        }


        $html .= '
        </li>';



        return $html;
    }
}