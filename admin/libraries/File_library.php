<?php

class File
{
    public static function upload($file, $path = "uploads", $name = "")
    {
        // Folder Create
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        if (!is_array($file) || $file["error"] != 0) {
            return false;
        }

        // Allowed File Types
        $allowed = [
            "image/jpeg",
            "image/jpg",
            "image/png",
            "application/pdf"
        ];

        if (!in_array($file["type"], $allowed)) {
            return false;
        }

        // Max File Size (5 MB)
        if ($file["size"] > (5 * 1024 * 1024)) {
            return false;
        }

        // Extension
        $extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

        // File Name
        if ($name == "") {
            $name = time() . rand(1000, 9999);
        } else {
            $name = slugify($name) . "-" . time();
        }

        $fileName = $name . "." . $extension;

        // Upload
        if (move_uploaded_file($file["tmp_name"], $path . "/" . $fileName)) {
            return $fileName;
        }

        return false;
    }

    // Delete File
    public static function delete($file, $path = "uploads")
    {
        $fullPath = $path . "/" . $file;

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
}

?>


