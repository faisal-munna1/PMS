<?php

class Table
{

    public static function report($table, $columns = ["*"])
    {
        global $db, $tx;


        $cols = self::columns($columns);


        $sql = "
            SELECT {$cols}
            FROM {$tx}{$table}
        ";


        $result = $db->query($sql);


        if (!$result || $result->num_rows == 0) {

            return self::emptyTable();

        }


        $fields = $result->fetch_fields();



        $html = '

        <div class="table-responsive">

        <table class="table table-bordered table-hover table-striped align-middle">

            <thead class="table-light">

                <tr>';


        foreach ($fields as $field) {

            $html .= '
                <th>
                    '.ucfirst($field->name).'
                </th>';

        }



        $html .= '

                </tr>

            </thead>


            <tbody>';



        while ($row = $result->fetch_assoc()) {


            $html .= '<tr>';


            foreach ($fields as $field) {


                $value = $row[$field->name] ?? "";


                $html .= '

                <td>
                    '.htmlspecialchars($value).'
                </td>';

            }


            $html .= '</tr>';

        }



        $html .= '

            </tbody>

        </table>

        </div>';



        return $html;

    }







    public static function manage($table, $columns = ["*"], $route = "")
    {

        global $db, $tx;


        if ($route == "") {

            $route = $_SERVER["REQUEST_URI"];

        }



        $cols = self::columns($columns);



        $sql = "
            SELECT {$cols}
            FROM {$tx}{$table}
        ";



        $result = $db->query($sql);



        if (!$result || $result->num_rows == 0) {

            return self::emptyTable();

        }



        $fields = $result->fetch_fields();




        $html = '

        <div class="table-responsive">

        <table class="table table-bordered table-hover table-striped align-middle">


        <thead class="table-dark">


        <tr>';




        foreach ($fields as $field) {


            $html .= '

            <th>
                '.ucfirst($field->name).'
            </th>';

        }



        $html .= '

            <th width="150" class="text-center">
                Action
            </th>


        </tr>


        </thead>


        <tbody>';





        while ($row = $result->fetch_assoc()) {



            $html .= '<tr>';



            foreach ($fields as $field) {


                $name = $field->name;

                $value = $row[$name] ?? "";



                if(
                    strtolower($name) == "image" ||
                    strtolower($name) == "photo"
                ){


                    $html .= '

                    <td>

                    <img src="'.$value.'"
                    width="60"
                    height="60"
                    class="img-thumbnail">

                    </td>';



                }else{


                    $html .= '

                    <td>
                        '.htmlspecialchars($value).'
                    </td>';

                }



            }




            $id = $row["id"];



            $html .= '

            <td class="text-center">


            <div class="btn-group btn-group-sm">


                <a href="'.$route.'/edit/'.$id.'"
                   class="btn btn-primary">

                    <i class="bi bi-pencil"></i>

                </a>



                <a href="'.$route.'/'.$id.'"
                   class="btn btn-info">

                    <i class="bi bi-eye"></i>

                </a>



                <a href="'.$route.'/delete/'.$id.'"
                   class="btn btn-danger"
                   onclick="return confirm(\'Are you sure?\')">

                    <i class="bi bi-trash"></i>

                </a>


            </div>


            </td>';



            $html .= '</tr>';

        }





        $html .= '

        </tbody>

        </table>

        </div>';



        return $html;

    }







    private static function columns($columns)
    {

        if(
            is_array($columns) &&
            count($columns) > 0 &&
            $columns[0] != "*"
        ){

            return implode(",", $columns);

        }


        return "*";

    }






    private static function emptyTable()
    {

        return '

        <div class="alert alert-info">

            No Data Found.

        </div>';

    }



}

?>