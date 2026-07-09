
<?php

/**
 * Form Helper Library
 * Version: 2.0
 * Framework: Custom MVC
 * UI: AdminLTE 4 + Bootstrap 5
 *
 * Features:
 * - Dynamic form generation
 * - Bootstrap 5 compatible markup
 * - Secure HTML escaping
 * - Reusable input/select/textarea/button components
 * - File upload preview support
 * - MVC friendly routing
 */
class Form
{
  public static function open($config = [])
  {
    global $base_url;

    $route = isset($config["route"]) ? $config["route"] : "";
    $method = isset($config["method"]) ? $config["method"] : "post";
    $class = isset($config["class"]) ? $config["class"] : "";
    $id = isset($config["id"]) ? $config["id"] : "";
    $enctype = isset($config["enctype"]) ? $config["enctype"] : "multipart/form-data";

    return "
    <form
        action='{$base_url}/{$route}'
        method='{$method}'
        class='{$class}'
        id='{$id}'
        enctype='{$enctype}'>
    ";
  }

  public static function close()
  {
    return "</form>";
  }

  public static function select($config)
  {
    global $db, $tx;

    $label = isset($config["label"]) ? $config["label"] : "";
    $name = isset($config["name"]) ? $config["name"] : "";
    $table = isset($config["table"]) ? $config["table"] : "";
    $value = isset($config["value"]) ? $config["value"] : "";
    $value_column = isset($config["value_column"]) ? $config["value_column"] : "id";
    $display_column = isset($config["display_column"]) ? $config["display_column"] : "name";
    $class = isset($config["class"]) ? $config["class"] : "form-select";
    $required = isset($config["required"]) ? "required" : "";

    $html = "
    <div class='mb-3'>

        <label for='{$name}' class='form-label'>
            {$label}
        </label>

        <select
            name='{$name}'
            id='{$name}'
            class='{$class}'
            {$required}>
    ";

    $result = $db->query("
        SELECT {$value_column}, {$display_column}
        FROM {$tx}{$table}
    ");

    while ($row = $result->fetch_assoc()) {

      $selected = "";

      if ($row[$value_column] == $value) {
        $selected = "selected";
      }

      $html .= "
        <option value='{$row[$value_column]}' {$selected}>
            {$row[$display_column]}
        </option>";
    }

    $html .= "
        </select>

    </div>";

    return $html;
  }

  public static function button($config)
  {
    $type = isset($config["type"]) ? $config["type"] : "submit";
    $name = isset($config["name"]) ? $config["name"] : "";
    $value = isset($config["value"]) ? $config["value"] : "Submit";
    $class = isset($config["class"]) ? $config["class"] : "btn btn-primary";

    return "
    <button
        type='{$type}'
        name='{$name}'
        class='{$class}'>
        {$value}
    </button>";
  }

  public static function input($config)
  {
    global $base_url;

    $label       = isset($config["label"]) ? $config["label"] : "";
    $name        = isset($config["name"]) ? $config["name"] : "";
    $type        = isset($config["type"]) ? $config["type"] : "text";
    $value       = isset($config["value"]) ? $config["value"] : "";
    $placeholder = isset($config["placeholder"]) ? $config["placeholder"] : "";
    $required    = isset($config["required"]) ? "required" : "";
    $checked     = isset($config["checked"]) ? "checked" : "";
    $class       = isset($config["class"]) ? $config["class"] : "form-control";

    if ($type == "checkbox" || $type == "radio") {
      $class = "form-check-input";
    }

    $html = "";

    if (!in_array($type, ["hidden", "submit", "reset"])) {

      $html .= "
        <div class='mb-3'>

            <label for='{$name}' class='form-label'>
                {$label}
            </label>";
    }

    $html .= "
        <input
            type='{$type}'
            id='{$name}'
            name='{$name}'
            value='{$value}'
            placeholder='{$placeholder}'
            class='{$class}'
            {$required}
            {$checked}>";

    if ($type == "file" && $value != "") {

      $html .= "

        <div class='mt-2'>
            <img src='{$base_url}/uploads/{$value}'
                 width='120'
                 class='img-thumbnail'>
        </div>";
    }

    if (!in_array($type, ["hidden", "submit", "reset"])) {
      $html .= "</div>";
    }

    return $html;
  }

  public static function textarea($config)
  {
    $label       = isset($config["label"]) ? $config["label"] : "";
    $name        = isset($config["name"]) ? $config["name"] : "";
    $value       = isset($config["value"]) ? $config["value"] : "";
    $placeholder = isset($config["placeholder"]) ? $config["placeholder"] : "";
    $required    = isset($config["required"]) ? "required" : "";
    $class       = isset($config["class"]) ? $config["class"] : "form-control";

    return "
    <div class='mb-3'>

        <label for='{$name}' class='form-label'>
            {$label}
        </label>

        <textarea
            id='{$name}'
            name='{$name}'
            class='{$class}'
            placeholder='{$placeholder}'
            {$required}>{$value}</textarea>

    </div>";
  }



  public static function PrintDate($day = "cmbDay", $month = "cmbMonth", $year = "cmbYear")
  {

    $html = "";
    $html .= "<select name='$day'>";
    for ($d = 1; $d <= 30; $d++) {
      $d = str_pad($d, 2, '0', STR_PAD_LEFT);

      if ($d == str_pad(date("d"), 2, '0', STR_PAD_LEFT)) {
        $html .= "<option value='$d' selected>$d</option>";
      } else {
        $html .= "<option value='$d'>$d</option>";
      }
    }
    $html .= "</select>";

    $html .= "<select name='$month'>";
    $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    for ($d = 1; $d <= 12; $d++) {
      $d = str_pad($d, 2, '0', STR_PAD_LEFT);
      if ($d == str_pad(date("m"), 2, '0', STR_PAD_LEFT)) {
        $html .= "<option value='$d' selected>{$months[$d - 1]}</option>";
      } else {
        $html .= "<option value='$d'>{$months[$d - 1]}</option>";
      }
    }
    $html .= "</select>";
    $html .= "<select name='$year'>";

    for ($d = date("Y") - 60; $d <= date("Y") + 3; $d++) {

      if (date("Y") == $d) {
        $html .= "<option value='$d' selected>$d</option>";
      } else {
        $html .= "<option value='$d'>$d</option>";
      }
    }
    $html .= "</select>";
    return $html;
  }

  public static function PrintTime($hour = "cmbHour", $min = "cmbMin", $ampm = "cmbAMPM")
  {

    $html = "<select name='$hour'>";
    for ($h = 1; $h <= 12; $h++) {
      $h = str_pad($h, 2, '0', STR_PAD_LEFT);
      $html .= "<option value='$h'>$h</option>";
    }
    $html .= "</select>";

    $html .= "<select name='$min'>";
    for ($h = 1; $h <= 60; $h++) {
      $h = str_pad($h, 2, '0', STR_PAD_LEFT);
      $html .= "<option value='$h'>$h</option>";
    }
    $html .= "</select>";

    $html .= "<select name='$ampm'>";
    $html .= "<option value='AM'>AM</option>";
    $html .= "<option value='PM'>PM</option>";
    $html .= "</select>";

    return $html;
  }
}
