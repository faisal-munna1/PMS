<?php

class Menu
{
    public static function item($menu)
    {
        global $base_url;

        $menu["name"]  = $menu["name"] ?? "";
        $menu["icon"]  = $menu["icon"] ?? "bi bi-circle";
        $menu["route"] = $menu["route"] ?? "#";

        $hasChild = isset($menu["links"]) && !empty($menu["links"]);

        // Parent menu URL
        if ($hasChild) {
            $url = "#";
        } else {
            $url = $base_url . "/" . ltrim($menu["route"], "/");
        }

        $html = '<li class="nav-item">';

        $html .= '<a href="' . $url . '" class="nav-link">';

        $html .= '<i class="nav-icon ' . $menu["icon"] . '"></i>';

        $html .= '<p>';

        $html .= $menu["name"];

        if ($hasChild) {
            $html .= '<i class="nav-arrow bi bi-chevron-right"></i>';
        }

        $html .= '</p>';

        $html .= '</a>';

        if ($hasChild) {

            $html .= '<ul class="nav nav-treeview">';

            foreach ($menu["links"] as $link) {

                $icon = $link["icon"] ?? "bi bi-circle";

                $html .= '<li class="nav-item">';

                $html .= '<a href="' . $base_url . '/' . ltrim($link["route"], "/") . '" class="nav-link">';

                $html .= '<i class="nav-icon ' . $icon . '"></i>';

                $html .= '<p>' . $link["text"] . '</p>';

                $html .= '</a>';

                $html .= '</li>';
            }

            $html .= '</ul>';
        }

        $html .= '</li>';

        return $html;
    }
}