<?php
    require 'db_connection.php';
    session_name('adi-php-systems');
    session_start();
    $generic = $_GET['generic'];
    $project_category = $_GET['project_category'];
    $sub_bu = $_GET['sub_bu'];
    $tde_status = $_GET['tde_status'];
    $key_personnel = $_GET['key_personnel'];
    $date_from = $_GET['date_from'];
    $date_to = $_GET['date_to'];

    //building queries
    $sql = "SELECT a.generic, project_category, sub_bu, tde_status, releasing_tde, target_release_initial, target_release_recommit, tde_activities_completed from general_project_info as a left join key_personnel as b on a.generic = b.generic left join critical_dates as c on a.generic = c.generic where 1=1 ";

    if ($generic != "") {
        $sql .= "AND a.generic like :generic ";
    }
    if ($project_category != "") {
        $sql .= "AND project_category = :project_category ";
    }
    if ($sub_bu != "") {
        $sql .= "AND sub_bu = :sub_bu ";
    }
    if ($tde_status != "") {
        $sql .= "AND tde_status = :tde_status ";
    }
    if ($key_personnel != "") {
        $sql .= "AND releasing_tde = :key_personnel ";
    }

    if ($date_from and $date_to) {
        $sql .= "AND ((target_release_initial between STR_TO_DATE(:date_from, '%Y-%m-%d') and STR_TO_DATE(:date_to, '%Y-%m-%d') and target_release_recommit is null) or (target_release_recommit BETWEEN STR_TO_DATE(:date_from, '%Y-%m-%d') AND STR_TO_DATE(:date_to, '%Y-%m-%d')))";
    }
    $stmt = $conn -> prepare($sql);
    //bug: why is this here? removed sep 2
    if ($generic != "") {
        $generic .= "%";
        $stmt -> bindParam(':generic', $generic);
    }
    if ($project_category != "") {
        $stmt -> bindParam(':project_category', $project_category);
    }
    if ($sub_bu != "") {
        $stmt -> bindParam(':sub_bu', $sub_bu);
    }
    if ($tde_status != "") {
        $stmt -> bindParam(':tde_status', $tde_status);
    }
    if ($key_personnel != "") {
        $stmt -> bindParam(':key_personnel', $key_personnel);
    }
    if ($date_from and $date_to) {
        $stmt -> bindParam(':date_from', $date_from);
        $stmt -> bindParam(':date_to', $date_to);
    }
    $stmt -> execute();
    $inner_html = "";

    $sql_sub_bu = "SELECT display_name from sub_bu_masterlist where sub_bu = :sub_bu";
    $stmt_sub_bu = $conn -> prepare($sql_sub_bu);

    $sql_product = "SELECT display_name from project_category_masterlist where project_category = :project_category";
    $stmt_product = $conn -> prepare($sql_product);

    $sql_tde_status = "SELECT display_name from tde_status_masterlist where tde_status = :tde_status";
    $stmt_tde_status = $conn -> prepare($sql_tde_status);

    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $stmt_product -> bindValue(':project_category', $row['project_category']);
        $stmt_product -> execute();
        $product = $stmt_product -> fetch(PDO::FETCH_ASSOC);
        if ($product) {
            $row['project_category'] = $product['display_name'];
        }

        $stmt_sub_bu -> bindValue(':sub_bu', $row['sub_bu']);
        $stmt_sub_bu -> execute();
        $sub_bu = $stmt_sub_bu -> fetch(PDO::FETCH_ASSOC);
        if ($sub_bu) {
            $row['sub_bu'] = $sub_bu['display_name'];
        }

        $stmt_tde_status -> bindValue(':tde_status', $row['tde_status']);
        $stmt_tde_status -> execute();
        $tde_status = $stmt_tde_status -> fetch(PDO::FETCH_ASSOC);
        if ($tde_status) {
            $row['tde_status'] = $tde_status['display_name'];
        }

        $target_date = $row['target_release_recommit'] == null ? $row['target_release_initial'] : $row['target_release_recommit'];

        $button = <<<HTML
            <td><button class="btn btn-info btn-block" data-toggle="modal" data-target=".bd-example-modal-lg-view" id="{$row['generic']}" onclick="view_project.call(this)">View</button></td>
        HTML;

        if ($_SESSION['users_role'] == 'admin' || $_SESSION['users_role'] == 'leader') {
            $button .= <<<HTML
                <td><button class="btn btn-primary btn-block" data-toggle="modal" data-target=".bd-example-modal-lg-update" id="{$row['generic']}" onclick="update_project.call(this)">Edit</button></td>
                <td>
                    <form action="../php_api/delete_project.php" method="POST">
                        <input type="text" hidden readonly name="generic" value="{$row['generic']}">
                        <button class="btn btn-danger btn-block" id="{$row['generic']}">Delete</button>
                    </form>
                </td>
            HTML;
        }

        $inner_html .= <<<HTML
            <tr>
                    <td>{$row['generic']}</td>
                    <td>{$row['project_category']}</td>
                    <td>{$row['sub_bu']}</td>
                    <td>{$row['tde_status']}</td>
                    <td>{$row['releasing_tde']}</td>
                    <td>{$target_date}</td>
                    <td>{$row['tde_activities_completed']}</td>
                    {$button}
            </tr>
        HTML;
    }

    $return_body = [];
    $return_body['inner_html'] = $inner_html;
    $return_body['sql'] = $sql;
    echo json_encode($return_body);