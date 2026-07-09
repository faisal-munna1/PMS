<?php

/**
 * HTML Helper Library
 *
 * Version: 2.0
 * UI: AdminLTE 4 + Bootstrap 5
 *
 * Features:
 * - Dynamic link generation
 * - Secure HTML escaping
 * - Icon support
 * - Button style support
 * - MVC route friendly
 */


class Html
{

    private static function e($value)
    {
        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
    }



    public static function link($config = [])
    {

        global $base_url;


        $route = $config["route"] ?? "#";
        $text = $config["text"] ?? "Link";

        $class = $config["class"] ?? "btn btn-primary";

        $icon = $config["icon"] ?? "";

        $target = $config["target"] ?? "";

        $id = $config["id"] ?? "";

        $title = $config["title"] ?? "";



        return "

        <a

            href='{$base_url}/{$route}'

            class='{$class}'

            id='{$id}'

            title='{$title}'

            target='{$target}'>

            " . 
            ($icon ? "<i class='{$icon} me-1'></i>" : "") .
            self::e($text)
            . "

        </a>

        ";

    }



    public static function button($config=[])

    {

        $type=$config["type"] ?? "button";

        $text=$config["text"] ?? "Button";

        $class=$config["class"] ?? "btn btn-primary";

        $icon=$config["icon"] ?? "";



        return "

        <button

            type='{$type}'

            class='{$class}'>


            " .
            ($icon ? "<i class='{$icon} me-1'></i>" : "")
            .
            self::e($text)
            . "


        </button>

        ";

    }



}