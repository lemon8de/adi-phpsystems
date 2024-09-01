<?php
    require 'db_connection.php';

    //anchor variable
    $generic = $_POST['generic'];

    //general info variables
    $ple_partname = $_POST['ple_partname'];
    $product_description = $_POST['product_description'];
    $project_category = $_POST['project_category'];
    $tde_status = $_POST['tde_status'];
    $sub_bu = $_POST['sub_bu'];
    $notes = $_POST['notes'];
    $date_created = $_POST['date_created'];
    //modified_date automatic
    $modified_date = date('Y-m-d');
    $modified_by = $_POST['modified_by'];

    //key personnel variables
    $primary_tde = $_POST['primary_tde'];
    $releasing_tde = $_POST['releasing_tde'];
    $primary_pe = $_POST['primary_pe'];
    $releasing_pe = $_POST['releasing_pe'];
    $user_ids = [$primary_tde, $releasing_tde, $primary_pe, $releasing_pe];

    //critical dates variable, initial check depracated, form validated to never be null
    $silicon_ad_initial = $_POST['silicon_ad_initial'] == "" ? null : $_POST['silicon_ad_initial'];
    $silicon_ad_recommit = $_POST['silicon_ad_recommit'] == "" ? null : $_POST['silicon_ad_recommit'];

    //woops the frontend and backend names don't match TODO: FIX THIS
    $charlot_ad_initial = $_POST['charlot_ad_initial'] == "" ? null : $_POST['charlot_ad_initial'];
    $charlot_ad_recommit = $_POST['charlot_ad_recommit'] == "" ? null : $_POST['charlot_ad_recommit'];

    $transfer_package_initial = $_POST['transfer_package_initial'] == "" ? null : $_POST['transfer_package_initial'];
    $transfer_package_recommit = $_POST['transfer_package_recommit'] == "" ? null : $_POST['transfer_package_recommit'];

    $iblot_ad_initial = $_POST['iblot_ad_initial'] == "" ? null : $_POST['iblot_ad_initial'];
    $iblot_ad_recommit = $_POST['iblot_ad_recommit'] == "" ? null : $_POST['iblot_ad_recommit'];

    $target_release_initial = $_POST['target_release_initial'] == "" ? null : $_POST['target_release_initial'];
    $target_release_recommit = $_POST['target_release_recommit'] == "" ? null : $_POST['target_release_recommit'];

    $tde_activities_completed = $_POST['tde_activities_completed'] == "" ? null : $_POST['tde_activities_completed'];
    $actual_release = $_POST['actual_release'] == "" ? null : $_POST['actual_release'];

    //links variable
    $ple_link = $_POST['ple_link'];
    $prime_link = $_POST['prime_link'];
    $arp_link = $_POST['arp_link'];

    //equipment variable
    $handler = $_POST['handler'];
    $tester = $_POST['tester'];
    $prober = $_POST['prober'];


    //just in case you retards try to pump a duplicate generic
    $sql = "SELECT id from general_project_info where generic = :generic";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindParam(':generic', $generic);
    $stmt -> execute();
    if ($duplicate = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        header('location: ../pages/project_list.php');
        exit();
    }

    //start pumping that insert into(s)
    $sql = "INSERT into general_project_info (generic, ple_partname, product_description, project_category, tde_status, sub_bu, notes, date_created, modified_date, modified_by) values (:generic, :ple_partname, :product_description, :project_category, :tde_status, :sub_bu, :notes, :date_created, :modified_date, :modified_by)";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindValue(':generic', $generic);
    $stmt -> bindValue(':ple_partname', $ple_partname);
    $stmt -> bindValue(':product_description', $product_description);
    $stmt -> bindValue(':project_category', $project_category);
    $stmt -> bindValue(':tde_status', $tde_status);
    $stmt -> bindValue(':sub_bu', $sub_bu);
    $stmt -> bindValue(':notes', $notes);
    $stmt -> bindValue(':date_created', $date_created);
    $stmt -> bindValue(':modified_date', $modified_date);
    $stmt -> bindValue(':modified_by', $modified_by);
    $stmt -> execute();

    $sql = "SELECT full_name from users where id = :id";
    $usernames = [];
    $stmt = $conn -> prepare($sql);
    for ($i = 0; $i < count($user_ids); $i++){
        $stmt -> bindParam('id', $user_ids[$i]);
        $stmt -> execute();
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $usernames[] = $user['full_name'];
        }
    }
    $sql = "INSERT into key_personnel (generic, primary_tde, releasing_tde, primary_pe, releasing_pe) values (:generic, :primary_tde, :releasing_tde, :primary_pe, :releasing_pe)";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindValue(':generic', $generic);
    $stmt -> bindValue(':primary_tde', $usernames[0]);
    $stmt -> bindValue(':releasing_tde', $usernames[1]);
    $stmt -> bindValue(':primary_pe', $usernames[2]);
    $stmt -> bindValue(':releasing_pe', $usernames[3]);
    $stmt -> execute();

    $sql = "INSERT into critical_dates (generic, silicon_ad_initial, silicon_ad_recommit, charlot_ad_initial, charlot_ad_recommit, transfer_package_initial, transfer_package_recommit, iblot_ad_initial, iblot_ad_recommit, target_release_initial, target_release_recommit, tde_activities_completed, actual_release) values (:generic, :silicon_ad_initial, :silicon_ad_recommit, :charlot_ad_initial, :charlot_ad_recommit, :transfer_package_initial, :transfer_package_recommit, :iblot_ad_initial, :iblot_ad_recommit, :target_release_initial, :target_release_recommit, :tde_activities_completed, :actual_release)";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindValue(':generic', $generic);
    $stmt -> bindValue(':silicon_ad_initial', $silicon_ad_initial);
    $stmt -> bindValue(':silicon_ad_recommit', $silicon_ad_recommit);
    $stmt -> bindValue(':charlot_ad_initial', $charlot_ad_initial);
    $stmt -> bindValue(':charlot_ad_recommit', $charlot_ad_recommit);
    $stmt -> bindValue(':transfer_package_initial', $transfer_package_initial);
    $stmt -> bindValue(':transfer_package_recommit', $transfer_package_recommit);
    $stmt -> bindValue(':iblot_ad_initial', $iblot_ad_initial);
    $stmt -> bindValue(':iblot_ad_recommit', $iblot_ad_recommit);
    $stmt -> bindValue(':target_release_initial', $target_release_initial);
    $stmt -> bindValue(':target_release_recommit', $target_release_recommit);
    $stmt -> bindValue(':tde_activities_completed', $tde_activities_completed);
    $stmt -> bindValue(':actual_release', $actual_release);
    $stmt -> execute();

    $sql = "INSERT into links (generic, ple_lnk, prime_link, apr_link) values (:generic, :ple_lnk, :prime_link, :apr_link)";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindValue(':generic', $generic);
    $stmt -> bindValue(':ple_lnk', $ple_link); //woops database typo LOL
    $stmt -> bindValue(':prime_link', $prime_link);
    $stmt -> bindValue(':apr_link', $arp_link); //is this also a typo? thats retarded
    $stmt -> execute();


    $sql = "SELECT display_name from tester_masterlist where  tester = :tester";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindValue(':tester', $tester);
    $stmt -> execute();
    $tester_q = $stmt -> fetch(PDO::FETCH_ASSOC);
    if ($tester_q) {
        $tester = $tester_q['display_name'];
    }
    $sql = "SELECT display_name from handler_masterlist where  handler = :handler";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindValue(':handler', $handler);
    $stmt -> execute();
    $handler_q = $stmt -> fetch(PDO::FETCH_ASSOC);
    if ($handler_q) {
        $handler = $handler_q['display_name'];
    }
    $sql = "SELECT display_name from prober_masterlist where  prober = :prober";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindValue(':prober', $prober);
    $stmt -> execute();
    $prober_q = $stmt -> fetch(PDO::FETCH_ASSOC);
    if ($prober_q) {
        $prober = $prober_q['display_name'];
    }
    $sql = "INSERT into equipment (generic, tester, handler, prober) values (:generic, :tester, :handler, :prober)";
    $stmt = $conn -> prepare($sql);
    $stmt -> bindValue(':generic', $generic);
    $stmt -> bindValue(':tester', $tester);
    $stmt -> bindValue(':handler', $handler);
    $stmt -> bindValue(':prober', $prober);
    $stmt -> execute();

    $conn = null;
    header('location: ../pages/project_list.php');
    exit();
?>