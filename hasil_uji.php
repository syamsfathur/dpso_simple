<?php
include 'koneksi.php';
ini_set('max_execution_time', 300);

//variabel global untuk menampilkan hasil
$GLOBALS['hasil_gbest_global'] = "";
$GLOBALS['cp'] = 0;
$GLOBALS['iterasi_total'] = 0;
$GLOBALS['execution_time'] = 0;

function delete_data($koneksi, $kode)
{
    if ($kode == "master_pso") {
        for ($i = 0; $i < 4; $i++) {
            $query_delete = "DELETE FROM master_pso_" . $i;
            mysqli_query($koneksi, $query_delete);
        }
    } elseif ($kode == "other") {
        $query_delete = "DELETE FROM cari_cw_pso1";
        mysqli_query($koneksi, $query_delete);
        $query_delete = "DELETE FROM cari_cw_pso2";
        mysqli_query($koneksi, $query_delete);
        $query_delete = "DELETE FROM cari_cw_pso3";
        mysqli_query($koneksi, $query_delete);
        $query_delete = "DELETE FROM cari_cw_pso0";
        mysqli_query($koneksi, $query_delete);

        $query_delete = "DELETE FROM partikel_pso_1";
        mysqli_query($koneksi, $query_delete);
        $query_delete = "DELETE FROM partikel_pso_2";
        mysqli_query($koneksi, $query_delete);
        $query_delete = "DELETE FROM partikel_pso_3";
        mysqli_query($koneksi, $query_delete);
        $query_delete = "DELETE FROM partikel_pso_0";
        mysqli_query($koneksi, $query_delete);

    } elseif ($kode == "transpos") {
        $query_delete = "DELETE FROM transpos_ke_1";
        mysqli_query($koneksi, $query_delete);
        $query_delete = "DELETE FROM transpos_ke_2";
        mysqli_query($koneksi, $query_delete);
        $query_delete = "DELETE FROM transpos_ke_3";
        mysqli_query($koneksi, $query_delete);
    }
}

function cek_co($co)
{
    if ($co == 0) {
        $cp = 0;
    } elseif ($co == 6) {
        $cp = 1;
    } elseif ($co == 7) {
        $cp = 2;
    } elseif ($co == 8) {
        $cp = 3;
    }

    return $cp;
}

function generateCP($gen_cp)
{
    $co = 0;
    // $gen_cp = mt_rand(0, 3);
    // echo "ini cp : " . $gen_cp;

    //binding cp ke co
    if ($gen_cp == 0) {
        $co = 0;
    } elseif ($gen_cp == 1) {
        $co = 6;
    } elseif ($gen_cp == 2) {
        $co = 7;
    } elseif ($gen_cp == 3) {
        $co = 8;
    }
    // echo "<br>ini co : " . $co . "<br>";
    return $co;
}

function generatePartikel($co, $jml_partikel, $koneksi)
{
    $partikel = array(array());

    delete_data($koneksi, "master_pso");

    for ($i = 0; $i < $jml_partikel; $i++) {

        if ($co == 0) {
            $partikel[$i] = range(1, 8);
            shuffle($partikel[$i]);
        } elseif ($co == 6) {
            $partikel[$i]  = range(1, 6);
            shuffle($partikel[$i]);
        } elseif ($co == 7) {
            $partikel[$i]  = range(1, 7);
            shuffle($partikel[$i]);
        } elseif ($co == 8) {
            $partikel[$i]  = range(1, 8);
            shuffle($partikel[$i]);
        }
    }

    if ($co == 0) {
        foreach ($partikel as $value) {
            $query_jml = "SELECT COUNT(*) FROM master_pso_0";
            $jml_exquery = mysqli_query($koneksi, $query_jml);
            $jml = mysqli_fetch_row($jml_exquery);
            $jml[0]++;
            $lo1 = $value[0];
            $lo2 = $value[1];
            $lo3 = $value[2];
            $lo4 = $value[3];
            $lo5 = $value[4];
            $lo6 = $value[5];
            $lo7 = $value[6];
            $lo8 = $value[7];
            $query_insert = "INSERT INTO master_pso_0 VALUES ($jml[0],$lo1,$lo2,$lo3,$lo4,$lo5,$lo6,$lo7,$lo8)";
            // echo "<br>" . $query_insert;
            $ex_q_insert = mysqli_query($koneksi, $query_insert);
        }
    } elseif ($co == 6) {
        foreach ($partikel as $value) {
            $query_jml = "SELECT COUNT(*) FROM master_pso_1";
            $jml_exquery = mysqli_query($koneksi, $query_jml);
            $jml = mysqli_fetch_row($jml_exquery);
            $jml[0]++;
            $lo1 = $value[0];
            $lo2 = $value[1];
            $lo3 = $value[2];
            $lo4 = $value[3];
            $lo5 = $value[4];
            $lo6 = $value[5];
            $query_insert = "INSERT INTO master_pso_1 VALUES ($jml[0],$lo1,$lo2,$lo3,$lo4,$lo5,$lo6)";
            // echo "<br>" . $query_insert;
            $ex_q_insert = mysqli_query($koneksi, $query_insert);
        }
    } elseif ($co == 7) {
        foreach ($partikel as $value) {
            $query_jml = "SELECT COUNT(*) FROM master_pso_2";
            $jml_exquery = mysqli_query($koneksi, $query_jml);
            $jml = mysqli_fetch_row($jml_exquery);
            $jml[0]++;
            $lo1 = $value[0];
            $lo2 = $value[1];
            $lo3 = $value[2];
            $lo4 = $value[3];
            $lo5 = $value[4];
            $lo6 = $value[5];
            $lo7 = $value[6];
            $query_insert = "INSERT INTO master_pso_2 VALUES ($jml[0],$lo1,$lo2,$lo3,$lo4,$lo5,$lo6,$lo7)";
            // echo "<br>" . $query_insert;
            $ex_q_insert = mysqli_query($koneksi, $query_insert);
        }
    } elseif ($co == 8) {
        foreach ($partikel as $value) {
            $query_jml = "SELECT COUNT(*) FROM master_pso_3";
            $jml_exquery = mysqli_query($koneksi, $query_jml);
            $jml = mysqli_fetch_row($jml_exquery);
            $jml[0]++;
            $lo1 = $value[0];
            $lo2 = $value[1];
            $lo3 = $value[2];
            $lo4 = $value[3];
            $lo5 = $value[4];
            $lo6 = $value[5];
            $lo7 = $value[6];
            $lo8 = $value[7];
            $query_insert = "INSERT INTO master_pso_3 VALUES ($jml[0],$lo1,$lo2,$lo3,$lo4,$lo5,$lo6,$lo7,$lo8)";
            // echo "<br>" . $query_insert;
            $ex_q_insert = mysqli_query($koneksi, $query_insert);
        }
    }
}

function binding_dataawal($iterasi_ke, $cp, $a, $b, $koneksi)
{
    $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $lo8 = $id_partikel = 0;

    if ($cp == 0) {
        $cmd = "SELECT * FROM master_pso_0";
        $cmd_ex = mysqli_query($koneksi, $cmd);
        if (mysqli_num_rows($cmd_ex)) {
            while ($data = mysqli_fetch_assoc($cmd_ex)) {
                $id_partikel = $data['id_partikel'];
                $lo1 = $data['lo1'];
                $lo2 = $data['lo2'];
                $lo3 = $data['lo3'];
                $lo4 = $data['lo4'];
                $lo5 = $data['lo5'];
                $lo6 = $data['lo6'];
                $lo7 = $data['lo7'];
                $lo8 = $data['lo8'];

                //insert data diskrit
                $cmd_insert = "INSERT INTO partikel_pso_0(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES('xi',$id_partikel,$iterasi_ke,$lo1,$lo2,$lo3,$lo4,$lo5,$lo6,$lo7,$lo8)";
                $cmd_insert_ex = mysqli_query($koneksi, $cmd_insert);

                //insert kecepatan
                $cmd_insert = "INSERT INTO partikel_pso_0(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES('v_update',$id_partikel,$iterasi_ke,$lo1,$lo2,$lo3,$lo4,$lo5,$lo6,$lo7,$lo8)";
                $cmd_insert_ex = mysqli_query($koneksi, $cmd_insert);
            }
        }

        //update kecepatan awal
        $cmd_update = "UPDATE partikel_pso_0 SET v_pso0_lo1=0,v_pso0_lo2=0,v_pso0_lo3=0,v_pso0_lo4=0,v_pso0_lo5=0,v_pso0_lo6=0,v_pso0_lo7=0,v_pso0_lo8=0 WHERE iterasi_ke=" . $iterasi_ke;
        $cmd_update_ex = mysqli_query($koneksi, $cmd_update);

        $cmd_update = "UPDATE partikel_pso_0 SET pso0_a=$a, pso0_b=$b, pso0_unlo=0 WHERE iterasi_ke=$iterasi_ke";
        $cmd_update_ex = mysqli_query($koneksi, $cmd_update);
    } elseif ($cp == 1) {
        $cmd = "SELECT * FROM master_pso_1";
        $cmd_ex = mysqli_query($koneksi, $cmd);
        if (mysqli_num_rows($cmd_ex)) {
            while ($data = mysqli_fetch_assoc($cmd_ex)) {
                $id_partikel = $data['id_partikel'];
                $lo1 = $data['lo1'];
                $lo2 = $data['lo2'];
                $lo3 = $data['lo3'];
                $lo4 = $data['lo4'];
                $lo5 = $data['lo5'];
                $lo6 = $data['lo6'];

                //insert data diskrit
                $cmd_insert = "INSERT INTO partikel_pso_1(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6) VALUES('xi',$id_partikel,$iterasi_ke,$lo1,$lo2,$lo3,$lo4,$lo5,$lo6)";
                $cmd_insert_ex = mysqli_query($koneksi, $cmd_insert);

                //insert kecepatan
                $cmd_insert = "INSERT INTO partikel_pso_1(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6) VALUES('v_update',$id_partikel,$iterasi_ke,$lo1,$lo2,$lo3,$lo4,$lo5,$lo6)";
                $cmd_insert_ex = mysqli_query($koneksi, $cmd_insert);
            }
        }

        //update kecepatan awal
        $cmd_update = "UPDATE partikel_pso_1 SET v_pso6_lo1=0,v_pso6_lo2=0,v_pso6_lo3=0,v_pso6_lo4=0,v_pso6_lo5=0,v_pso6_lo6=0 WHERE iterasi_ke=" . $iterasi_ke;
        $cmd_update_ex = mysqli_query($koneksi, $cmd_update);

        $cmd_update = "UPDATE partikel_pso_1 SET pso6_a=$a, pso6_b=$b, pso6_unlo=2 WHERE iterasi_ke=$iterasi_ke";
        $cmd_update_ex = mysqli_query($koneksi, $cmd_update);
    } elseif ($cp == 2) {
        $cmd = "SELECT * FROM master_pso_2";
        $cmd_ex = mysqli_query($koneksi, $cmd);
        if (mysqli_num_rows($cmd_ex)) {
            while ($data = mysqli_fetch_assoc($cmd_ex)) {
                $id_partikel = $data['id_partikel'];
                $lo1 = $data['lo1'];
                $lo2 = $data['lo2'];
                $lo3 = $data['lo3'];
                $lo4 = $data['lo4'];
                $lo5 = $data['lo5'];
                $lo6 = $data['lo6'];
                $lo7 = $data['lo7'];

                //insert data diskrit
                $cmd_insert = "INSERT INTO partikel_pso_2(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7) VALUES('xi',$id_partikel,$iterasi_ke,$lo1,$lo2,$lo3,$lo4,$lo5,$lo6,$lo7)";
                $cmd_insert_ex = mysqli_query($koneksi, $cmd_insert);

                //insert kecepatan
                $cmd_insert = "INSERT INTO partikel_pso_2(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7) VALUES('v_update',$id_partikel,$iterasi_ke,$lo1,$lo2,$lo3,$lo4,$lo5,$lo6,$lo7)";
                $cmd_insert_ex = mysqli_query($koneksi, $cmd_insert);
            }
        }

        //update kecepatan awal
        $cmd_update = "UPDATE partikel_pso_2 SET v_pso7_lo1=0,v_pso7_lo2=0,v_pso7_lo3=0,v_pso7_lo4=0,v_pso7_lo5=0,v_pso7_lo6=0,v_pso7_lo7=0 WHERE iterasi_ke=" . $iterasi_ke;
        $cmd_update_ex = mysqli_query($koneksi, $cmd_update);

        $cmd_update = "UPDATE partikel_pso_2 SET pso7_a=$a, pso7_b=$b, pso7_unlo=1 WHERE iterasi_ke=$iterasi_ke";
        $cmd_update_ex = mysqli_query($koneksi, $cmd_update);
    } elseif ($cp == 3) {
        $cmd = "SELECT * FROM master_pso_3";
        $cmd_ex = mysqli_query($koneksi, $cmd);
        if (mysqli_num_rows($cmd_ex)) {
            while ($data = mysqli_fetch_assoc($cmd_ex)) {
                $id_partikel = $data['id_partikel'];
                $lo1 = $data['lo1'];
                $lo2 = $data['lo2'];
                $lo3 = $data['lo3'];
                $lo4 = $data['lo4'];
                $lo5 = $data['lo5'];
                $lo6 = $data['lo6'];
                $lo7 = $data['lo7'];
                $lo8 = $data['lo8'];

                //insert data diskrit
                $cmd_insert = "INSERT INTO partikel_pso_3(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES('xi',$id_partikel,$iterasi_ke,$lo1,$lo2,$lo3,$lo4,$lo5,$lo6,$lo7,$lo8)";
                $cmd_insert_ex = mysqli_query($koneksi, $cmd_insert);

                //insert kecepatan
                $cmd_insert = "INSERT INTO partikel_pso_3(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES('v_update',$id_partikel,$iterasi_ke,$lo1,$lo2,$lo3,$lo4,$lo5,$lo6,$lo7,$lo8)";
                $cmd_insert_ex = mysqli_query($koneksi, $cmd_insert);
            }
        }

        //update kecepatan awal
        $cmd_update = "UPDATE partikel_pso_3 SET v_pso8_lo1=0,v_pso8_lo2=0,v_pso8_lo3=0,v_pso8_lo4=0,v_pso8_lo5=0,v_pso8_lo6=0,v_pso8_lo7=0,v_pso8_lo8=0 WHERE iterasi_ke=" . $iterasi_ke;
        $cmd_update_ex = mysqli_query($koneksi, $cmd_update);

        $cmd_update = "UPDATE partikel_pso_3 SET pso8_a=$a, pso8_b=$b, pso8_unlo=0 WHERE iterasi_ke=$iterasi_ke";
        $cmd_update_ex = mysqli_query($koneksi, $cmd_update);
    }
}

function dbb_x($nilai_x, $koneksi)
{
    $nilai = 0;
    $select_x = "SELECT nilai_x FROM dbb WHERE learning_object=" . $nilai_x;
    $q_selectx = mysqli_query($koneksi, $select_x);
    if (mysqli_num_rows($q_selectx)) {
        while ($data = mysqli_fetch_assoc($q_selectx)) {
            $nilai = $data['nilai_x'];
        }
    }
    return $nilai;
}

function dbb_y($nilai_y, $koneksi)
{
    $nilai = 0;
    $select_y = "SELECT nilai_y FROM dbb WHERE learning_object=" . $nilai_y;
    $q_selecty = mysqli_query($koneksi, $select_y);
    if (mysqli_num_rows($q_selecty)) {
        while ($data = mysqli_fetch_assoc($q_selecty)) {
            $nilai = $data['nilai_y'];
        }
    }
    return $nilai;
}

function dbo($nilai_x, $nilai_y, $koneksi)
{
    $nilai = 0;

    $select_dbo = "SELECT jarak FROM dbo WHERE nilai_x=$nilai_x and nilai_y=$nilai_y";
    $q_selectdbo = mysqli_query($koneksi, $select_dbo);
    if (mysqli_num_rows($q_selectdbo)) {
        while (($data = mysqli_fetch_assoc($q_selectdbo))) {
            $nilai = $data['jarak'];
        }
    }
    return $nilai;
}

function cari_fitness($iterasi_ke, $total_data, $cp, $koneksi, $t1, $t2, $k)
{
    $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $lo8 = 0;
    $cw_lo1 = $cw_lo2 = $cw_lo3 = $cw_lo4 = $cw_lo5 = $cw_lo6 = $cw_lo7 = $cw_lo8 = 0;
    $total_cw_lo1 = $total_cw_lo2 = $total_cw_lo3 = $total_cw_lo4 = $total_cw_lo5 = $total_cw_lo6 = $total_cw_lo7 = $total_cw_lo8 = 0;
    $total_cw_all = 0;
    $unlo = $fitness = 0;

    $a = $b = 0;

    //looping setiap partikel
    for ($id_partikel = 1; $id_partikel <= $total_data; $id_partikel++) {
        if ($cp == 0) {
            $query_show = "SELECT lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8 FROM partikel_pso_" . $cp . " WHERE id_partikel=$id_partikel and iterasi_ke=$iterasi_ke and kode='xi'";
            $q_queryshow = mysqli_query($koneksi, $query_show);
            if (mysqli_num_rows($q_queryshow)) {
                while ($data = mysqli_fetch_assoc($q_queryshow)) {
                    $lo1 = $data['lo1'];
                    $lo2 = $data['lo2'];
                    $lo3 = $data['lo3'];
                    $lo4 = $data['lo4'];
                    $lo5 = $data['lo5'];
                    $lo6 = $data['lo6'];
                    $lo7 = $data['lo7'];
                    $lo8 = $data['lo8'];
                }
            }

            $query_insert = "INSERT INTO cari_cw_pso0(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES('partikel',$id_partikel,$iterasi_ke,$lo1,$lo2,$lo3,$lo4,$lo5,$lo6,$lo7,$lo8)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            //cari dbb
            $dbb_lo1 = sqrt(pow((dbb_x($lo1, $koneksi) - dbb_x($lo2, $koneksi)), 2) + pow((dbb_y($lo1, $koneksi) - dbb_y($lo2, $koneksi)), 2));
            $dbb_lo2 = sqrt(pow((dbb_x($lo2, $koneksi) - dbb_x($lo3, $koneksi)), 2) + pow((dbb_y($lo2, $koneksi) - dbb_y($lo3, $koneksi)), 2));
            $dbb_lo3 = sqrt(pow((dbb_x($lo3, $koneksi) - dbb_x($lo4, $koneksi)), 2) + pow((dbb_y($lo3, $koneksi) - dbb_y($lo4, $koneksi)), 2));
            $dbb_lo4 = sqrt(pow((dbb_x($lo4, $koneksi) - dbb_x($lo5, $koneksi)), 2) + pow((dbb_y($lo4, $koneksi) - dbb_y($lo5, $koneksi)), 2));
            $dbb_lo5 = sqrt(pow((dbb_x($lo5, $koneksi) - dbb_x($lo6, $koneksi)), 2) + pow((dbb_y($lo5, $koneksi) - dbb_y($lo6, $koneksi)), 2));
            $dbb_lo6 = sqrt(pow((dbb_x($lo6, $koneksi) - dbb_x($lo7, $koneksi)), 2) + pow((dbb_y($lo6, $koneksi) - dbb_y($lo7, $koneksi)), 2));
            $dbb_lo7 = sqrt(pow((dbb_x($lo7, $koneksi) - dbb_x($lo8, $koneksi)), 2) + pow((dbb_y($lo7, $koneksi) - dbb_y($lo8, $koneksi)), 2));
            $dbb_lo8 = sqrt(pow((dbb_x($lo8, $koneksi) - dbb_x($lo1, $koneksi)), 2) + pow((dbb_y($lo8, $koneksi) - dbb_y($lo1, $koneksi)), 2));

            $query_insert = "INSERT INTO cari_cw_pso0(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES('dbb',$id_partikel,$iterasi_ke,$dbb_lo1,$dbb_lo2,$dbb_lo3,$dbb_lo4,$dbb_lo5, $dbb_lo6,$dbb_lo7,$dbb_lo8)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            $dbo_lo1 = dbo($lo1, $lo2, $koneksi);
            $dbo_lo2 = dbo($lo2, $lo3, $koneksi);
            $dbo_lo3 = dbo($lo3, $lo4, $koneksi);
            $dbo_lo4 = dbo($lo4, $lo5, $koneksi);
            $dbo_lo5 = dbo($lo5, $lo6, $koneksi);
            $dbo_lo6 = dbo($lo6, $lo7, $koneksi);
            $dbo_lo7 = dbo($lo7, $lo8, $koneksi);
            $dbo_lo8 = dbo($lo8, $lo1, $koneksi);

            $query_insert = "INSERT INTO cari_cw_pso0(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES('dbo',$id_partikel,$iterasi_ke,$dbo_lo1,$dbo_lo2,$dbo_lo3,$dbo_lo4,$dbo_lo5, $dbo_lo6, $dbo_lo7,$dbo_lo8)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            if (isset($dbb_lo1) || isset($dbo_lo1)) {
                $cw_lo1 = $k / (($t1 * $dbo_lo1) + ($t2 * $dbb_lo1));
                $total_cw_lo1 = $cw_lo1;
            }

            if (isset($dbb_lo2) || isset($dbo_lo2)) {
                $cw_lo2 = $k / (($t1 * $dbo_lo2) + ($t2 * $dbb_lo2));
                $total_cw_lo2 = $cw_lo2;
            }

            if (isset($dbb_lo3) || isset($dbo_lo3)) {
                $cw_lo3 = $k / (($t1 * $dbo_lo3) + ($t2 * $dbb_lo3));
                $total_cw_lo3 = $cw_lo3;
            }

            if (isset($dbb_lo4) || isset($dbo_lo4)) {
                $cw_lo4 = $k / (($t1 * $dbo_lo4) + ($t2 * $dbb_lo4));
                $total_cw_lo4 = $cw_lo4;
            }

            if (isset($dbb_lo5) || isset($dbo_lo5)) {
                $cw_lo5 = $k / (($t1 * $dbo_lo5) + ($t2 * $dbb_lo5));
                $total_cw_lo5 = $cw_lo5;
            }

            if (isset($dbb_lo6) || isset($dbo_lo6)) {
                $cw_lo6 = $k / (($t1 * $dbo_lo6) + ($t2 * $dbb_lo6));
                $total_cw_lo6 = $cw_lo6;
            }

            if (isset($dbb_lo7) || isset($dbo_lo7)) {
                $cw_lo7 = $k / (($t1 * $dbo_lo7) + ($t2 * $dbb_lo7));
                $total_cw_lo7 = $cw_lo7;
            }

            if (isset($dbb_lo8) || isset($dbo_lo8)) {
                $cw_lo8 = $k / (($t1 * $dbo_lo8) + ($t2 * $dbb_lo8));
                $total_cw_lo8 = $cw_lo8;
            }

            $total_cw_all = $total_cw_lo1 + $total_cw_lo2 + $total_cw_lo3 + $total_cw_lo4 + $total_cw_lo5 + $total_cw_lo6 + $total_cw_lo7 + $total_cw_lo8;

            $query_insert = "INSERT INTO cari_cw_pso0(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES('cw',$id_partikel,$iterasi_ke,$cw_lo1,$cw_lo2,$cw_lo3,$cw_lo4,$cw_lo5, $cw_lo6, $cw_lo7,$cw_lo8)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            $query_unlo = "SELECT pso0_a, pso0_b, pso0_unlo FROM partikel_pso_0 WHERE id_partikel=$id_partikel and iterasi_ke=$iterasi_ke and kode='xi'";
            $q_query_unlo = mysqli_query($koneksi, $query_unlo);
            if (mysqli_num_rows($q_query_unlo)) {
                while ($data_unlo = mysqli_fetch_assoc($q_query_unlo)) {
                    $unlo = $data_unlo['pso0_unlo'];
                    $a = $data_unlo['pso0_a'];
                    $b = $data_unlo['pso0_b'];
                }
            }

            $cek_unlo = $b * $unlo;
            if ($cek_unlo == 0) {
                $cek_unlo = 0;
                $fitness = $total_cw_all * $a;
            } else {
                $fitness = ($total_cw_all * $a) + (1 / ($b * $unlo));
            }

            $cmd_update = "UPDATE partikel_pso_0 SET fitness_pso_0=$fitness, pso0_cw=$total_cw_all WHERE id_partikel=$id_partikel and iterasi_ke=$iterasi_ke";
            $cmd_update_ex = mysqli_query($koneksi, $cmd_update);
        } elseif ($cp == 1) {
            $query_show = "SELECT lo1,lo2,lo3,lo4,lo5,lo6 FROM partikel_pso_" . $cp . " WHERE id_partikel=$id_partikel and iterasi_ke=$iterasi_ke and kode='xi'";
            $q_queryshow = mysqli_query($koneksi, $query_show);
            if (mysqli_num_rows($q_queryshow)) {
                while ($data = mysqli_fetch_assoc($q_queryshow)) {
                    $lo1 = $data['lo1'];
                    $lo2 = $data['lo2'];
                    $lo3 = $data['lo3'];
                    $lo4 = $data['lo4'];
                    $lo5 = $data['lo5'];
                    $lo6 = $data['lo6'];
                }
            }

            $query_insert = "INSERT INTO cari_cw_pso1(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6) VALUES('partikel',$id_partikel,$iterasi_ke,$lo1,$lo2,$lo3,$lo4,$lo5,$lo6)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            //cari dbb
            $dbb_lo1 = sqrt(pow((dbb_x($lo1, $koneksi) - dbb_x($lo2, $koneksi)), 2) + pow((dbb_y($lo1, $koneksi) - dbb_y($lo2, $koneksi)), 2));
            $dbb_lo2 = sqrt(pow((dbb_x($lo2, $koneksi) - dbb_x($lo3, $koneksi)), 2) + pow((dbb_y($lo2, $koneksi) - dbb_y($lo3, $koneksi)), 2));
            $dbb_lo3 = sqrt(pow((dbb_x($lo3, $koneksi) - dbb_x($lo4, $koneksi)), 2) + pow((dbb_y($lo3, $koneksi) - dbb_y($lo4, $koneksi)), 2));
            $dbb_lo4 = sqrt(pow((dbb_x($lo4, $koneksi) - dbb_x($lo5, $koneksi)), 2) + pow((dbb_y($lo4, $koneksi) - dbb_y($lo5, $koneksi)), 2));
            $dbb_lo5 = sqrt(pow((dbb_x($lo5, $koneksi) - dbb_x($lo6, $koneksi)), 2) + pow((dbb_y($lo5, $koneksi) - dbb_y($lo6, $koneksi)), 2));
            $dbb_lo6 = sqrt(pow((dbb_x($lo6, $koneksi) - dbb_x($lo1, $koneksi)), 2) + pow((dbb_y($lo6, $koneksi) - dbb_y($lo1, $koneksi)), 2));

            $query_insert = "INSERT INTO cari_cw_pso1(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6) VALUES('dbb',$id_partikel,$iterasi_ke,$dbb_lo1,$dbb_lo2,$dbb_lo3,$dbb_lo4,$dbb_lo5,$dbb_lo6)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            $dbo_lo1 = dbo($lo1, $lo2, $koneksi);
            $dbo_lo2 = dbo($lo2, $lo3, $koneksi);
            $dbo_lo3 = dbo($lo3, $lo4, $koneksi);
            $dbo_lo4 = dbo($lo4, $lo5, $koneksi);
            $dbo_lo5 = dbo($lo5, $lo6, $koneksi);
            $dbo_lo6 = dbo($lo6, $lo1, $koneksi);

            $query_insert = "INSERT INTO cari_cw_pso1(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6) VALUES('dbo',$id_partikel,$iterasi_ke,$dbo_lo1,$dbo_lo2,$dbo_lo3,$dbo_lo4,$dbo_lo5,$dbo_lo6)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            if (isset($dbb_lo1) || isset($dbo_lo1)) {
                $cw_lo1 = $k / (($t1 * $dbo_lo1) + ($t2 * $dbb_lo1));
                $total_cw_lo1 = $cw_lo1;
            }

            if (isset($dbb_lo2) || isset($dbo_lo2)) {
                $cw_lo2 = $k / (($t1 * $dbo_lo2) + ($t2 * $dbb_lo2));
                $total_cw_lo2 = $cw_lo2;
            }

            if (isset($dbb_lo3) || isset($dbo_lo3)) {
                $cw_lo3 = $k / (($t1 * $dbo_lo3) + ($t2 * $dbb_lo3));
                $total_cw_lo3 = $cw_lo3;
            }

            if (isset($dbb_lo4) || isset($dbo_lo4)) {
                $cw_lo4 = $k / (($t1 * $dbo_lo4) + ($t2 * $dbb_lo4));
                $total_cw_lo4 = $cw_lo4;
            }

            if (isset($dbb_lo5) || isset($dbo_lo5)) {
                $cw_lo5 = $k / (($t1 * $dbo_lo5) + ($t2 * $dbb_lo5));
                $total_cw_lo5 = $cw_lo5;
            }

            if (isset($dbb_lo6) || isset($dbo_lo6)) {
                $cw_lo6 = $k / (($t1 * $dbo_lo6) + ($t2 * $dbb_lo6));
                $total_cw_lo6 = $cw_lo6;
            }

            $total_cw_all = $total_cw_lo1 + $total_cw_lo2 + $total_cw_lo3 + $total_cw_lo4 + $total_cw_lo5 + $total_cw_lo6;

            $query_insert = "INSERT INTO cari_cw_pso1(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6) VALUES('cw',$id_partikel,$iterasi_ke,$cw_lo1,$cw_lo2,$cw_lo3,$cw_lo4,$cw_lo5,$cw_lo6)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            $query_unlo = "SELECT pso6_a, pso6_b, pso6_unlo FROM partikel_pso_1 WHERE id_partikel=$id_partikel and iterasi_ke=$iterasi_ke and kode='xi'";
            $q_query_unlo = mysqli_query($koneksi, $query_unlo);
            if (mysqli_num_rows($q_query_unlo)) {
                while ($data_unlo = mysqli_fetch_assoc($q_query_unlo)) {
                    $unlo = $data_unlo['pso6_unlo'];
                    $a = $data_unlo['pso6_a'];
                    $b = $data_unlo['pso6_b'];
                }
            }

            $cek_unlo = $b * $unlo;
            if ($cek_unlo == 0) {
                $cek_unlo = 0;
                $fitness = $total_cw_all * $a;
            } else {
                $fitness = ($total_cw_all * $a) + (1 / ($b * $unlo));
            }

            $cmd_update = "UPDATE partikel_pso_1 SET fitness_pso_6=$fitness, pso6_cw=$total_cw_all WHERE id_partikel=$id_partikel and iterasi_ke=$iterasi_ke";
            $cmd_update_ex = mysqli_query($koneksi, $cmd_update);
        } elseif ($cp == 2) {
            $query_show = "SELECT lo1,lo2,lo3,lo4,lo5,lo6,lo7 FROM partikel_pso_" . $cp . " WHERE id_partikel=$id_partikel and iterasi_ke=$iterasi_ke and kode='xi'";
            $q_queryshow = mysqli_query($koneksi, $query_show);
            if (mysqli_num_rows($q_queryshow)) {
                while ($data = mysqli_fetch_assoc($q_queryshow)) {
                    $lo1 = $data['lo1'];
                    $lo2 = $data['lo2'];
                    $lo3 = $data['lo3'];
                    $lo4 = $data['lo4'];
                    $lo5 = $data['lo5'];
                    $lo6 = $data['lo6'];
                    $lo7 = $data['lo7'];
                }
            }

            $query_insert = "INSERT INTO cari_cw_pso2(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7) VALUES('partikel',$id_partikel,$iterasi_ke,$lo1,$lo2,$lo3,$lo4,$lo5,$lo6,$lo7)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            //cari dbb
            $dbb_lo1 = sqrt(pow((dbb_x($lo1, $koneksi) - dbb_x($lo2, $koneksi)), 2) + pow((dbb_y($lo1, $koneksi) - dbb_y($lo2, $koneksi)), 2));
            $dbb_lo2 = sqrt(pow((dbb_x($lo2, $koneksi) - dbb_x($lo3, $koneksi)), 2) + pow((dbb_y($lo2, $koneksi) - dbb_y($lo3, $koneksi)), 2));
            $dbb_lo3 = sqrt(pow((dbb_x($lo3, $koneksi) - dbb_x($lo4, $koneksi)), 2) + pow((dbb_y($lo3, $koneksi) - dbb_y($lo4, $koneksi)), 2));
            $dbb_lo4 = sqrt(pow((dbb_x($lo4, $koneksi) - dbb_x($lo5, $koneksi)), 2) + pow((dbb_y($lo4, $koneksi) - dbb_y($lo5, $koneksi)), 2));
            $dbb_lo5 = sqrt(pow((dbb_x($lo5, $koneksi) - dbb_x($lo6, $koneksi)), 2) + pow((dbb_y($lo5, $koneksi) - dbb_y($lo6, $koneksi)), 2));
            $dbb_lo6 = sqrt(pow((dbb_x($lo6, $koneksi) - dbb_x($lo7, $koneksi)), 2) + pow((dbb_y($lo6, $koneksi) - dbb_y($lo7, $koneksi)), 2));
            $dbb_lo7 = sqrt(pow((dbb_x($lo7, $koneksi) - dbb_x($lo1, $koneksi)), 2) + pow((dbb_y($lo7, $koneksi) - dbb_y($lo1, $koneksi)), 2));

            $query_insert = "INSERT INTO cari_cw_pso2(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7) VALUES('dbb',$id_partikel,$iterasi_ke,$dbb_lo1,$dbb_lo2,$dbb_lo3,$dbb_lo4,$dbb_lo5, $dbb_lo6,$dbb_lo7)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            $dbo_lo1 = dbo($lo1, $lo2, $koneksi);
            $dbo_lo2 = dbo($lo2, $lo3, $koneksi);
            $dbo_lo3 = dbo($lo3, $lo4, $koneksi);
            $dbo_lo4 = dbo($lo4, $lo5, $koneksi);
            $dbo_lo5 = dbo($lo5, $lo6, $koneksi);
            $dbo_lo6 = dbo($lo6, $lo7, $koneksi);
            $dbo_lo7 = dbo($lo7, $lo1, $koneksi);

            $query_insert = "INSERT INTO cari_cw_pso2(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7) VALUES('dbo',$id_partikel,$iterasi_ke,$dbo_lo1,$dbo_lo2,$dbo_lo3,$dbo_lo4,$dbo_lo5, $dbo_lo6,$dbo_lo7)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            if (isset($dbb_lo1) || isset($dbo_lo1)) {
                $cw_lo1 = $k / (($t1 * $dbo_lo1) + ($t2 * $dbb_lo1));
                $total_cw_lo1 = $cw_lo1;
            }

            if (isset($dbb_lo2) || isset($dbo_lo2)) {
                $cw_lo2 = $k / (($t1 * $dbo_lo2) + ($t2 * $dbb_lo2));
                $total_cw_lo2 = $cw_lo2;
            }

            if (isset($dbb_lo3) || isset($dbo_lo3)) {
                $cw_lo3 = $k / (($t1 * $dbo_lo3) + ($t2 * $dbb_lo3));
                $total_cw_lo3 = $cw_lo3;
            }

            if (isset($dbb_lo4) || isset($dbo_lo4)) {
                $cw_lo4 = $k / (($t1 * $dbo_lo4) + ($t2 * $dbb_lo4));
                $total_cw_lo4 = $cw_lo4;
            }

            if (isset($dbb_lo5) || isset($dbo_lo5)) {
                $cw_lo5 = $k / (($t1 * $dbo_lo5) + ($t2 * $dbb_lo5));
                $total_cw_lo5 = $cw_lo5;
            }

            if (isset($dbb_lo6) || isset($dbo_lo6)) {
                $cw_lo6 = $k / (($t1 * $dbo_lo6) + ($t2 * $dbb_lo6));
                $total_cw_lo6 = $cw_lo6;
            }

            if (isset($dbb_lo7) || isset($dbo_lo7)) {
                $cw_lo7 = $k / (($t1 * $dbo_lo7) + ($t2 * $dbb_lo7));
                $total_cw_lo7 = $cw_lo7;
            }

            $total_cw_all = $total_cw_lo1 + $total_cw_lo2 + $total_cw_lo3 + $total_cw_lo4 + $total_cw_lo5 + $total_cw_lo6 + $total_cw_lo7;

            $query_insert = "INSERT INTO cari_cw_pso2(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7) VALUES('cw',$id_partikel,$iterasi_ke,$cw_lo1,$cw_lo2,$cw_lo3,$cw_lo4,$cw_lo5, $cw_lo6,$cw_lo7)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            $query_unlo = "SELECT pso7_a, pso7_b, pso7_unlo FROM partikel_pso_2 WHERE id_partikel=$id_partikel and iterasi_ke=$iterasi_ke and kode='xi'";
            $q_query_unlo = mysqli_query($koneksi, $query_unlo);
            if (mysqli_num_rows($q_query_unlo)) {
                while ($data_unlo = mysqli_fetch_assoc($q_query_unlo)) {
                    $unlo = $data_unlo['pso7_unlo'];
                    $a = $data_unlo['pso7_a'];
                    $b = $data_unlo['pso7_b'];
                }
            }

            $cek_unlo = $b * $unlo;
            if ($cek_unlo == 0) {
                $cek_unlo = 0;
                $fitness = $total_cw_all * $a;
            } else {
                $fitness = ($total_cw_all * $a) + (1 / ($b * $unlo));
            }

            $cmd_update = "UPDATE partikel_pso_2 SET fitness_pso_7=$fitness, pso7_cw=$total_cw_all WHERE id_partikel=$id_partikel and iterasi_ke=$iterasi_ke";
            $cmd_update_ex = mysqli_query($koneksi, $cmd_update);
        } elseif ($cp == 3) {
            $query_show = "SELECT lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8 FROM partikel_pso_" . $cp . " WHERE id_partikel=$id_partikel and iterasi_ke=$iterasi_ke and kode='xi'";
            $q_queryshow = mysqli_query($koneksi, $query_show);
            if (mysqli_num_rows($q_queryshow)) {
                while ($data = mysqli_fetch_assoc($q_queryshow)) {
                    $lo1 = $data['lo1'];
                    $lo2 = $data['lo2'];
                    $lo3 = $data['lo3'];
                    $lo4 = $data['lo4'];
                    $lo5 = $data['lo5'];
                    $lo6 = $data['lo6'];
                    $lo7 = $data['lo7'];
                    $lo8 = $data['lo8'];
                }
            }

            $query_insert = "INSERT INTO cari_cw_pso3(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES('partikel',$id_partikel,$iterasi_ke,$lo1,$lo2,$lo3,$lo4,$lo5,$lo6,$lo7,$lo8)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            //cari dbb
            $dbb_lo1 = sqrt(pow((dbb_x($lo1, $koneksi) - dbb_x($lo2, $koneksi)), 2) + pow((dbb_y($lo1, $koneksi) - dbb_y($lo2, $koneksi)), 2));
            $dbb_lo2 = sqrt(pow((dbb_x($lo2, $koneksi) - dbb_x($lo3, $koneksi)), 2) + pow((dbb_y($lo2, $koneksi) - dbb_y($lo3, $koneksi)), 2));
            $dbb_lo3 = sqrt(pow((dbb_x($lo3, $koneksi) - dbb_x($lo4, $koneksi)), 2) + pow((dbb_y($lo3, $koneksi) - dbb_y($lo4, $koneksi)), 2));
            $dbb_lo4 = sqrt(pow((dbb_x($lo4, $koneksi) - dbb_x($lo5, $koneksi)), 2) + pow((dbb_y($lo4, $koneksi) - dbb_y($lo5, $koneksi)), 2));
            $dbb_lo5 = sqrt(pow((dbb_x($lo5, $koneksi) - dbb_x($lo6, $koneksi)), 2) + pow((dbb_y($lo5, $koneksi) - dbb_y($lo6, $koneksi)), 2));
            $dbb_lo6 = sqrt(pow((dbb_x($lo6, $koneksi) - dbb_x($lo7, $koneksi)), 2) + pow((dbb_y($lo6, $koneksi) - dbb_y($lo7, $koneksi)), 2));
            $dbb_lo7 = sqrt(pow((dbb_x($lo7, $koneksi) - dbb_x($lo8, $koneksi)), 2) + pow((dbb_y($lo7, $koneksi) - dbb_y($lo8, $koneksi)), 2));
            $dbb_lo8 = sqrt(pow((dbb_x($lo8, $koneksi) - dbb_x($lo1, $koneksi)), 2) + pow((dbb_y($lo8, $koneksi) - dbb_y($lo1, $koneksi)), 2));

            $query_insert = "INSERT INTO cari_cw_pso3(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES('dbb',$id_partikel,$iterasi_ke,$dbb_lo1,$dbb_lo2,$dbb_lo3,$dbb_lo4,$dbb_lo5, $dbb_lo6,$dbb_lo7,$dbb_lo8)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            $dbo_lo1 = dbo($lo1, $lo2, $koneksi);
            $dbo_lo2 = dbo($lo2, $lo3, $koneksi);
            $dbo_lo3 = dbo($lo3, $lo4, $koneksi);
            $dbo_lo4 = dbo($lo4, $lo5, $koneksi);
            $dbo_lo5 = dbo($lo5, $lo6, $koneksi);
            $dbo_lo6 = dbo($lo6, $lo7, $koneksi);
            $dbo_lo7 = dbo($lo7, $lo8, $koneksi);
            $dbo_lo8 = dbo($lo8, $lo1, $koneksi);

            $query_insert = "INSERT INTO cari_cw_pso3(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES('dbo',$id_partikel,$iterasi_ke,$dbo_lo1,$dbo_lo2,$dbo_lo3,$dbo_lo4,$dbo_lo5, $dbo_lo6, $dbo_lo7,$dbo_lo8)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            if (isset($dbb_lo1) || isset($dbo_lo1)) {
                $cw_lo1 = $k / (($t1 * $dbo_lo1) + ($t2 * $dbb_lo1));
                $total_cw_lo1 = $cw_lo1;
            }

            if (isset($dbb_lo2) || isset($dbo_lo2)) {
                $cw_lo2 = $k / (($t1 * $dbo_lo2) + ($t2 * $dbb_lo2));
                $total_cw_lo2 = $cw_lo2;
            }

            if (isset($dbb_lo3) || isset($dbo_lo3)) {
                $cw_lo3 = $k / (($t1 * $dbo_lo3) + ($t2 * $dbb_lo3));
                $total_cw_lo3 = $cw_lo3;
            }

            if (isset($dbb_lo4) || isset($dbo_lo4)) {
                $cw_lo4 = $k / (($t1 * $dbo_lo4) + ($t2 * $dbb_lo4));
                $total_cw_lo4 = $cw_lo4;
            }

            if (isset($dbb_lo5) || isset($dbo_lo5)) {
                $cw_lo5 = $k / (($t1 * $dbo_lo5) + ($t2 * $dbb_lo5));
                $total_cw_lo5 = $cw_lo5;
            }

            if (isset($dbb_lo6) || isset($dbo_lo6)) {
                $cw_lo6 = $k / (($t1 * $dbo_lo6) + ($t2 * $dbb_lo6));
                $total_cw_lo6 = $cw_lo6;
            }

            if (isset($dbb_lo7) || isset($dbo_lo7)) {
                $cw_lo7 = $k / (($t1 * $dbo_lo7) + ($t2 * $dbb_lo7));
                $total_cw_lo7 = $cw_lo7;
            }

            if (isset($dbb_lo8) || isset($dbo_lo8)) {
                $cw_lo8 = $k / (($t1 * $dbo_lo8) + ($t2 * $dbb_lo8));
                $total_cw_lo8 = $cw_lo8;
            }

            $total_cw_all = $total_cw_lo1 + $total_cw_lo2 + $total_cw_lo3 + $total_cw_lo4 + $total_cw_lo5 + $total_cw_lo6 + $total_cw_lo7 + $total_cw_lo8;

            $query_insert = "INSERT INTO cari_cw_pso3(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES('cw',$id_partikel,$iterasi_ke,$cw_lo1,$cw_lo2,$cw_lo3,$cw_lo4,$cw_lo5, $cw_lo6, $cw_lo7,$cw_lo8)";
            $q_query_insert = mysqli_query($koneksi, $query_insert);

            $query_unlo = "SELECT pso8_a, pso8_b, pso8_unlo FROM partikel_pso_3 WHERE id_partikel=$id_partikel and iterasi_ke=$iterasi_ke and kode='xi'";
            $q_query_unlo = mysqli_query($koneksi, $query_unlo);
            if (mysqli_num_rows($q_query_unlo)) {
                while ($data_unlo = mysqli_fetch_assoc($q_query_unlo)) {
                    $unlo = $data_unlo['pso8_unlo'];
                    $a = $data_unlo['pso8_a'];
                    $b = $data_unlo['pso8_b'];
                }
            }

            $cek_unlo = $b * $unlo;
            if ($cek_unlo == 0) {
                $cek_unlo = 0;
                $fitness = $total_cw_all * $a;
            } else {
                $fitness = ($total_cw_all * $a) + (1 / ($b * $unlo));
            }

            $cmd_update = "UPDATE partikel_pso_3 SET fitness_pso_8=$fitness, pso8_cw=$total_cw_all WHERE id_partikel=$id_partikel and iterasi_ke=$iterasi_ke";
            $cmd_update_ex = mysqli_query($koneksi, $cmd_update);
        }
    }
}

function parsing_pbest($koneksi, $cp, $iterasi_ke)
{
    $id_partikel = 0;
    $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $lo8 = 0;
    $fitness = $cw = $a = $b = $unlo = 0;
    $v_lo1 = $v_lo2 = $v_lo3 = $v_lo4 = $v_lo5 = $v_lo6 = $v_lo7 = $v_lo8 = 0;

    if ($cp == 0) {
        $query_select = "SELECT * FROM partikel_pso_0 WHERE iterasi_ke=$iterasi_ke and kode='xi'";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $id_partikel = $data_q['id_partikel'];
                $iterasi_ke = $data_q['iterasi_ke'];
                $lo1 = $data_q['lo1'];
                $lo2 = $data_q['lo2'];
                $lo3 = $data_q['lo3'];
                $lo4 = $data_q['lo4'];
                $lo5 = $data_q['lo5'];
                $lo6 = $data_q['lo6'];
                $lo7 = $data_q['lo7'];
                $lo8 = $data_q['lo8'];
                $fitness = $data_q['fitness_pso_0'];
                $cw = $data_q['pso0_cw'];
                $a = $data_q['pso0_a'];
                $b = $data_q['pso0_b'];
                $unlo = $data_q['pso0_unlo'];

                $v_lo1 = 0;
                $v_lo2 = 0;
                $v_lo3 = 0;
                $v_lo4 = 0;
                $v_lo5 = 0;
                $v_lo6 = 0;
                $v_lo7 = 0;
                $v_lo8 = 0;

                $query_insert = "INSERT INTO partikel_pso_0(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8, fitness_pso_0,pso0_cw,pso0_a,pso0_b,pso0_unlo,v_pso0_lo1,v_pso0_lo2,v_pso0_lo3,v_pso0_lo4,v_pso0_lo5,v_pso0_lo6,v_pso0_lo7,v_pso0_lo8) VALUE ('pbest', $id_partikel, $iterasi_ke, $lo1, $lo2, $lo3, $lo4, $lo5, $lo6, $lo7, $lo8, $fitness, $cw, $a, $b, $unlo, $v_lo1,$v_lo2,$v_lo3,$v_lo4,$v_lo5,$v_lo6,  $v_lo7, $v_lo8)";
                $q_query_insert = mysqli_query($koneksi, $query_insert);
            }
        }
    } elseif ($cp == 1) {
        $query_select = "SELECT * FROM partikel_pso_1 WHERE iterasi_ke=$iterasi_ke and kode='xi'";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $id_partikel = $data_q['id_partikel'];
                $iterasi_ke = $data_q['iterasi_ke'];
                $lo1 = $data_q['lo1'];
                $lo2 = $data_q['lo2'];
                $lo3 = $data_q['lo3'];
                $lo4 = $data_q['lo4'];
                $lo5 = $data_q['lo5'];
                $lo6 = $data_q['lo6'];
                $fitness = $data_q['fitness_pso_6'];
                $cw = $data_q['pso6_cw'];
                $a = $data_q['pso6_a'];
                $b = $data_q['pso6_b'];
                $unlo = $data_q['pso6_unlo'];
                // $v_lo1 = $data_q['v_pso6_lo1'];
                // $v_lo2 = $data_q['v_pso6_lo2'];
                // $v_lo3 = $data_q['v_pso6_lo3'];
                // $v_lo4 = $data_q['v_pso6_lo4'];
                // $v_lo5 = $data_q['v_pso6_lo5'];
                // $v_lo6 = $data_q['v_pso6_lo6'];

                $v_lo1 = 0;
                $v_lo2 = 0;
                $v_lo3 = 0;
                $v_lo4 = 0;
                $v_lo5 = 0;
                $v_lo6 = 0;

                $query_insert = "INSERT INTO partikel_pso_1(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,fitness_pso_6,pso6_cw,pso6_a,pso6_b,pso6_unlo,v_pso6_lo1,v_pso6_lo2,v_pso6_lo3,v_pso6_lo4,v_pso6_lo5,v_pso6_lo6) VALUE ('pbest', $id_partikel, $iterasi_ke, $lo1, $lo2, $lo3, $lo4, $lo5, $lo6, $fitness, $cw, $a, $b, $unlo, $v_lo1,$v_lo2,$v_lo3,$v_lo4,$v_lo5,$v_lo6)";
                $q_query_insert = mysqli_query($koneksi, $query_insert);
            }
        }
    } elseif ($cp == 2) {
        $query_select = "SELECT * FROM partikel_pso_2 WHERE iterasi_ke=$iterasi_ke and kode='xi'";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $id_partikel = $data_q['id_partikel'];
                $iterasi_ke = $data_q['iterasi_ke'];
                $lo1 = $data_q['lo1'];
                $lo2 = $data_q['lo2'];
                $lo3 = $data_q['lo3'];
                $lo4 = $data_q['lo4'];
                $lo5 = $data_q['lo5'];
                $lo6 = $data_q['lo6'];
                $lo7 = $data_q['lo7'];
                $fitness = $data_q['fitness_pso_7'];
                $cw = $data_q['pso7_cw'];
                $a = $data_q['pso7_a'];
                $b = $data_q['pso7_b'];
                $unlo = $data_q['pso7_unlo'];

                $v_lo1 = 0;
                $v_lo2 = 0;
                $v_lo3 = 0;
                $v_lo4 = 0;
                $v_lo5 = 0;
                $v_lo6 = 0;
                $v_lo7 = 0;

                $query_insert = "INSERT INTO partikel_pso_2(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,fitness_pso_7,pso7_cw,pso7_a,pso7_b,pso7_unlo,v_pso7_lo1,v_pso7_lo2,v_pso7_lo3,v_pso7_lo4,v_pso7_lo5,v_pso7_lo6,v_pso7_lo7) VALUE ('pbest', $id_partikel, $iterasi_ke, $lo1, $lo2, $lo3, $lo4, $lo5, $lo6,$lo7, $fitness, $cw, $a, $b, $unlo, $v_lo1,$v_lo2,$v_lo3,$v_lo4,$v_lo5,$v_lo6, $v_lo7)";
                $q_query_insert = mysqli_query($koneksi, $query_insert);
            }
        }
    } elseif ($cp == 3) {
        $query_select = "SELECT * FROM partikel_pso_3 WHERE iterasi_ke=$iterasi_ke and kode='xi'";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $id_partikel = $data_q['id_partikel'];
                $iterasi_ke = $data_q['iterasi_ke'];
                $lo1 = $data_q['lo1'];
                $lo2 = $data_q['lo2'];
                $lo3 = $data_q['lo3'];
                $lo4 = $data_q['lo4'];
                $lo5 = $data_q['lo5'];
                $lo6 = $data_q['lo6'];
                $lo7 = $data_q['lo7'];
                $lo8 = $data_q['lo8'];
                $fitness = $data_q['fitness_pso_8'];
                $cw = $data_q['pso8_cw'];
                $a = $data_q['pso8_a'];
                $b = $data_q['pso8_b'];
                $unlo = $data_q['pso8_unlo'];

                $v_lo1 = 0;
                $v_lo2 = 0;
                $v_lo3 = 0;
                $v_lo4 = 0;
                $v_lo5 = 0;
                $v_lo6 = 0;
                $v_lo7 = 0;
                $v_lo8 = 0;

                $query_insert = "INSERT INTO partikel_pso_3(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8, fitness_pso_8,pso8_cw,pso8_a,pso8_b,pso8_unlo,v_pso8_lo1,v_pso8_lo2,v_pso8_lo3,v_pso8_lo4,v_pso8_lo5,v_pso8_lo6,v_pso8_lo7,v_pso8_lo8) VALUE ('pbest', $id_partikel, $iterasi_ke, $lo1, $lo2, $lo3, $lo4, $lo5, $lo6, $lo7, $lo8, $fitness, $cw, $a, $b, $unlo, $v_lo1,$v_lo2,$v_lo3,$v_lo4,$v_lo5,$v_lo6,  $v_lo7, $v_lo8)";
                $q_query_insert = mysqli_query($koneksi, $query_insert);
            }
        }
    }
}

function parsing_gbest($koneksi, $cp, $iterasi_ke)
{
    $kode = "";
    $id_partikel = 0;
    $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $lo8 = 0;
    $fitness = $cw = $a = $b = $unlo = 0;
    $v_lo1 = $v_lo2 = $v_lo3 = $v_lo4 = $v_lo5 = $v_lo6 = $v_lo7 = $v_lo8 = 0;

    if ($cp == 0) {
        $query_max = "SELECT * FROM partikel_pso_0 WHERE fitness_pso_0 = (SELECT MAX(fitness_pso_0) FROM partikel_pso_0 WHERE iterasi_ke=$iterasi_ke) and iterasi_ke = $iterasi_ke";
        $q_query_max = mysqli_query($koneksi, $query_max);
        if (mysqli_num_rows($q_query_max)) {
            while ($data_q = mysqli_fetch_assoc($q_query_max)) {
                $id_partikel = $data_q['id_partikel'];
                $kode = $data_q['kode'];
            }
        }

        $query_select = "SELECT * FROM partikel_pso_0 WHERE iterasi_ke=$iterasi_ke and kode='$kode' and id_partikel=$id_partikel";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $id_partikel = $data_q['id_partikel'];
                $iterasi_ke = $data_q['iterasi_ke'];
                $lo1 = $data_q['lo1'];
                $lo2 = $data_q['lo2'];
                $lo3 = $data_q['lo3'];
                $lo4 = $data_q['lo4'];
                $lo5 = $data_q['lo5'];
                $lo6 = $data_q['lo6'];
                $lo7 = $data_q['lo7'];
                $lo8 = $data_q['lo8'];
                $fitness = $data_q['fitness_pso_0'];
                $cw = $data_q['pso0_cw'];
                $a = $data_q['pso0_a'];
                $b = $data_q['pso0_b'];
                $unlo = $data_q['pso0_unlo'];
                $v_lo1 = $data_q['v_pso0_lo1'];
                $v_lo2 = $data_q['v_pso0_lo2'];
                $v_lo3 = $data_q['v_pso0_lo3'];
                $v_lo4 = $data_q['v_pso0_lo4'];
                $v_lo5 = $data_q['v_pso0_lo5'];
                $v_lo6 = $data_q['v_pso0_lo6'];
                $v_lo7 = $data_q['v_pso0_lo7'];
                $v_lo8 = $data_q['v_pso0_lo8'];

                $query_insert = "INSERT INTO partikel_pso_0(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,fitness_pso_0,pso0_cw,pso0_a,pso0_b,pso0_unlo,v_pso0_lo1,v_pso0_lo2,v_pso0_lo3,v_pso0_lo4,v_pso0_lo5,v_pso0_lo6,v_pso0_lo7,v_pso0_lo8) VALUE ('gbest', $id_partikel, $iterasi_ke, $lo1, $lo2, $lo3, $lo4, $lo5, $lo6,$lo7,$lo8, $fitness, $cw, $a, $b, $unlo, $v_lo1,$v_lo2,$v_lo3,$v_lo4,$v_lo5,$v_lo6, $v_lo7,$v_lo8)";
                $q_query_insert = mysqli_query($koneksi, $query_insert);
            }
        }
    } elseif ($cp == 1) {
        $query_max = "SELECT * FROM partikel_pso_1 WHERE fitness_pso_6 = (SELECT MAX(fitness_pso_6) FROM partikel_pso_1 WHERE iterasi_ke=$iterasi_ke) and iterasi_ke = $iterasi_ke";
        $q_query_max = mysqli_query($koneksi, $query_max);
        // echo $query_max;
        if (mysqli_num_rows($q_query_max)) {
            while ($data_q = mysqli_fetch_assoc($q_query_max)) {
                $id_partikel = $data_q['id_partikel'];
                $kode = $data_q['kode'];
            }
        }

        $query_select = "SELECT * FROM partikel_pso_1 WHERE iterasi_ke=$iterasi_ke and kode='$kode' and id_partikel=$id_partikel";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $id_partikel = $data_q['id_partikel'];
                $iterasi_ke = $data_q['iterasi_ke'];
                $lo1 = $data_q['lo1'];
                $lo2 = $data_q['lo2'];
                $lo3 = $data_q['lo3'];
                $lo4 = $data_q['lo4'];
                $lo5 = $data_q['lo5'];
                $lo6 = $data_q['lo6'];
                $fitness = $data_q['fitness_pso_6'];
                $cw = $data_q['pso6_cw'];
                $a = $data_q['pso6_a'];
                $b = $data_q['pso6_b'];
                $unlo = $data_q['pso6_unlo'];
                $v_lo1 = $data_q['v_pso6_lo1'];
                $v_lo2 = $data_q['v_pso6_lo2'];
                $v_lo3 = $data_q['v_pso6_lo3'];
                $v_lo4 = $data_q['v_pso6_lo4'];
                $v_lo5 = $data_q['v_pso6_lo5'];
                $v_lo6 = $data_q['v_pso6_lo6'];

                $query_insert = "INSERT INTO partikel_pso_1(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,fitness_pso_6,pso6_cw,pso6_a,pso6_b,pso6_unlo,v_pso6_lo1,v_pso6_lo2,v_pso6_lo3,v_pso6_lo4,v_pso6_lo5,v_pso6_lo6) VALUE ('gbest', $id_partikel, $iterasi_ke, $lo1, $lo2, $lo3, $lo4, $lo5, $lo6, $fitness, $cw, $a, $b, $unlo, $v_lo1,$v_lo2,$v_lo3,$v_lo4,$v_lo5,$v_lo6)";
                $q_query_insert = mysqli_query($koneksi, $query_insert);
            }
        }
    } elseif ($cp == 2) {
        $query_max = "SELECT * FROM partikel_pso_2 WHERE fitness_pso_7 = (SELECT MAX(fitness_pso_7) FROM partikel_pso_2 WHERE iterasi_ke=$iterasi_ke) and iterasi_ke = $iterasi_ke";

        $q_query_max = mysqli_query($koneksi, $query_max);
        if (mysqli_num_rows($q_query_max)) {
            while ($data_q = mysqli_fetch_assoc($q_query_max)) {
                $id_partikel = $data_q['id_partikel'];
                $kode = $data_q['kode'];
            }
        }

        $query_select = "SELECT * FROM partikel_pso_2 WHERE iterasi_ke=$iterasi_ke and kode='$kode' and id_partikel=$id_partikel";

        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $id_partikel = $data_q['id_partikel'];
                $iterasi_ke = $data_q['iterasi_ke'];
                $lo1 = $data_q['lo1'];
                $lo2 = $data_q['lo2'];
                $lo3 = $data_q['lo3'];
                $lo4 = $data_q['lo4'];
                $lo5 = $data_q['lo5'];
                $lo6 = $data_q['lo6'];
                $lo7 = $data_q['lo7'];
                $fitness = $data_q['fitness_pso_7'];
                $cw = $data_q['pso7_cw'];
                $a = $data_q['pso7_a'];
                $b = $data_q['pso7_b'];
                $unlo = $data_q['pso7_unlo'];
                $v_lo1 = $data_q['v_pso7_lo1'];
                $v_lo2 = $data_q['v_pso7_lo2'];
                $v_lo3 = $data_q['v_pso7_lo3'];
                $v_lo4 = $data_q['v_pso7_lo4'];
                $v_lo5 = $data_q['v_pso7_lo5'];
                $v_lo6 = $data_q['v_pso7_lo6'];
                $v_lo7 = $data_q['v_pso7_lo7'];

                $query_insert = "INSERT INTO partikel_pso_2(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,fitness_pso_7,pso7_cw,pso7_a,pso7_b,pso7_unlo,v_pso7_lo1,v_pso7_lo2,v_pso7_lo3,v_pso7_lo4,v_pso7_lo5,v_pso7_lo6,v_pso7_lo7) VALUE ('gbest', $id_partikel, $iterasi_ke, $lo1, $lo2, $lo3, $lo4, $lo5, $lo6,$lo7, $fitness, $cw, $a, $b, $unlo, $v_lo1,$v_lo2,$v_lo3,$v_lo4,$v_lo5,$v_lo6,$v_lo7)";

                $q_query_insert = mysqli_query($koneksi, $query_insert);
            }
        }
    } elseif ($cp == 3) {
        $query_max = "SELECT * FROM partikel_pso_3 WHERE fitness_pso_8 = (SELECT MAX(fitness_pso_8) FROM partikel_pso_3 WHERE iterasi_ke=$iterasi_ke) and iterasi_ke = $iterasi_ke";
        $q_query_max = mysqli_query($koneksi, $query_max);
        if (mysqli_num_rows($q_query_max)) {
            while ($data_q = mysqli_fetch_assoc($q_query_max)) {
                $id_partikel = $data_q['id_partikel'];
                $kode = $data_q['kode'];
            }
        }

        $query_select = "SELECT * FROM partikel_pso_3 WHERE iterasi_ke=$iterasi_ke and kode='$kode' and id_partikel=$id_partikel";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $id_partikel = $data_q['id_partikel'];
                $iterasi_ke = $data_q['iterasi_ke'];
                $lo1 = $data_q['lo1'];
                $lo2 = $data_q['lo2'];
                $lo3 = $data_q['lo3'];
                $lo4 = $data_q['lo4'];
                $lo5 = $data_q['lo5'];
                $lo6 = $data_q['lo6'];
                $lo7 = $data_q['lo7'];
                $lo8 = $data_q['lo8'];
                $fitness = $data_q['fitness_pso_8'];
                $cw = $data_q['pso8_cw'];
                $a = $data_q['pso8_a'];
                $b = $data_q['pso8_b'];
                $unlo = $data_q['pso8_unlo'];
                $v_lo1 = $data_q['v_pso8_lo1'];
                $v_lo2 = $data_q['v_pso8_lo2'];
                $v_lo3 = $data_q['v_pso8_lo3'];
                $v_lo4 = $data_q['v_pso8_lo4'];
                $v_lo5 = $data_q['v_pso8_lo5'];
                $v_lo6 = $data_q['v_pso8_lo6'];
                $v_lo7 = $data_q['v_pso8_lo7'];
                $v_lo8 = $data_q['v_pso8_lo8'];

                $query_insert = "INSERT INTO partikel_pso_3(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,fitness_pso_8,pso8_cw,pso8_a,pso8_b,pso8_unlo,v_pso8_lo1,v_pso8_lo2,v_pso8_lo3,v_pso8_lo4,v_pso8_lo5,v_pso8_lo6,v_pso8_lo7,v_pso8_lo8) VALUE ('gbest', $id_partikel, $iterasi_ke, $lo1, $lo2, $lo3, $lo4, $lo5, $lo6,$lo7,$lo8, $fitness, $cw, $a, $b, $unlo, $v_lo1,$v_lo2,$v_lo3,$v_lo4,$v_lo5,$v_lo6, $v_lo7,$v_lo8)";
                $q_query_insert = mysqli_query($koneksi, $query_insert);
            }
        }
    }
}

function transpos_1($koneksi, $cp, $id_partikel, $iterasi_ke)
{
    $xi_lo1 = $xi_lo2 = $xi_lo3 = $xi_lo4 = $xi_lo5 = $xi_lo6 = $xi_lo7 = $xi_lo8 = 0;
    $pbest_lo1 = $pbest_lo2 = $pbest_lo3 = $pbest_lo4 = $pbest_lo5 = $pbest_lo6 = $pbest_lo7 = $pbest_lo8 = 0;
    $gbest_lo1 = $gbest_lo2 = $gbest_lo3 = $gbest_lo4 = $gbest_lo5 = $gbest_lo6 = $gbest_lo7 = $gbest_lo8 = 0;
    $tukar_a = $tukar_b = 0;

    if ($cp == 0) {
        $langkah_ke = 0;
        $query_select = "SELECT * FROM partikel_pso_0 WHERE kode='xi' and id_partikel=$id_partikel and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $xi_lo1 = $data_q['lo1'];
                $xi_lo2 = $data_q['lo2'];
                $xi_lo3 = $data_q['lo3'];
                $xi_lo4 = $data_q['lo4'];
                $xi_lo5 = $data_q['lo5'];
                $xi_lo6 = $data_q['lo6'];
                $xi_lo7 = $data_q['lo7'];
                $xi_lo8 = $data_q['lo8'];
            }
        }

        $query_select = "SELECT * FROM partikel_pso_0 WHERE kode='pbest' and id_partikel=$id_partikel and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $pbest_lo1 = $data_q['lo1'];
                $pbest_lo2 = $data_q['lo2'];
                $pbest_lo3 = $data_q['lo3'];
                $pbest_lo4 = $data_q['lo4'];
                $pbest_lo5 = $data_q['lo5'];
                $pbest_lo6 = $data_q['lo6'];
                $pbest_lo7 = $data_q['lo7'];
                $pbest_lo8 = $data_q['lo8'];
            }
        }

        $query_select = "SELECT * FROM partikel_pso_0 WHERE kode='gbest' and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $gbest_lo1 = $data_q['lo1'];
                $gbest_lo2 = $data_q['lo2'];
                $gbest_lo3 = $data_q['lo3'];
                $gbest_lo4 = $data_q['lo4'];
                $gbest_lo5 = $data_q['lo5'];
                $gbest_lo6 = $data_q['lo6'];
                $gbest_lo7 = $data_q['lo7'];
                $gbest_lo8 = $data_q['lo8'];
            }
        }

        //cek jika data yg dibind merupakan gbest
        if ($pbest_lo1 == $gbest_lo1 && $pbest_lo2 == $gbest_lo2 && $pbest_lo3 == $gbest_lo3 && $pbest_lo4 == $gbest_lo4 && $pbest_lo5 == $gbest_lo5 && $pbest_lo6 == $gbest_lo6 && $pbest_lo7 == $gbest_lo7  && $pbest_lo8 == $gbest_lo8) {
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, 1, $id_partikel, 0, 0, $pbest_lo1, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
        }

        //proses transposisi setiap lo; dimulai dari LO1
        if ($gbest_lo1 == $pbest_lo1) {
            $gbest_lo1 = $pbest_lo1;
        } elseif ($gbest_lo1 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 2, $pbest_lo2, $pbest_lo1,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6,$pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo2;
            $pbest_lo1 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 3, $pbest_lo3, $pbest_lo2,$pbest_lo1, $pbest_lo4, $pbest_lo5, $pbest_lo6,$pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo3;
            $pbest_lo1 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 4, $pbest_lo4, $pbest_lo2,$pbest_lo3, $pbest_lo1, $pbest_lo5, $pbest_lo6,$pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo4;
            $pbest_lo1 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 5, $pbest_lo5, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo1, $pbest_lo6,$pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo5;
            $pbest_lo1 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 6, $pbest_lo6, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo1,$pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo6;
            $pbest_lo1 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 7, $pbest_lo7, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6,$pbest_lo1, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo7;
            $pbest_lo1 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 8, $pbest_lo8, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6,$pbest_lo7, $pbest_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo8;
            $pbest_lo1 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        }

        //cek LO2
        if ($gbest_lo2 == $pbest_lo2) {
            $gbest_lo2 = $pbest_lo2;
        } elseif ($gbest_lo2 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 3, $pbest_lo1, $pbest_lo3 , $pbest_lo2, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo3;
            $pbest_lo2 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 4, $pbest_lo1, $pbest_lo4 , $pbest_lo3, $pbest_lo2, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo4;
            $pbest_lo2 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 5, $pbest_lo1, $pbest_lo5 , $pbest_lo3, $pbest_lo4, $pbest_lo2, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo5;
            $pbest_lo2 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 6, $pbest_lo1, $pbest_lo6 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo2, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo6;
            $pbest_lo2 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 7, $pbest_lo1, $pbest_lo7 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo2, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo7;
            $pbest_lo2 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 8, $pbest_lo1, $pbest_lo8 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo8;
            $pbest_lo2 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 1, $pbest_lo2, $pbest_lo1 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo1;
            $pbest_lo2 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        }

        //cek LO3
        if ($gbest_lo3 == $pbest_lo3) {
            $gbest_lo3 = $pbest_lo3;
        } elseif ($gbest_lo3 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo4, $pbest_lo3, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo4;
            $pbest_lo3 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo5, $pbest_lo4, $pbest_lo3, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo5;
            $pbest_lo3 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo6, $pbest_lo4, $pbest_lo5, $pbest_lo3, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo6;
            $pbest_lo3 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 7, $pbest_lo1, $pbest_lo2 , $pbest_lo7, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo3, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo7;
            $pbest_lo3 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 8, $pbest_lo1, $pbest_lo2 , $pbest_lo8, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo8;
            $pbest_lo3 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 1, $pbest_lo3, $pbest_lo2 , $pbest_lo1, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo1;
            $pbest_lo3 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 2, $pbest_lo1, $pbest_lo3 , $pbest_lo2, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo2;
            $pbest_lo3 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        }

        //cek LO4
        if ($gbest_lo4 == $pbest_lo4) {
            $gbest_lo4 = $pbest_lo4;
        } elseif ($gbest_lo4 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo5, $pbest_lo4, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo5;
            $pbest_lo4 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo6, $pbest_lo5, $pbest_lo4, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo6;
            $pbest_lo4 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 7, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo7, $pbest_lo5, $pbest_lo6, $pbest_lo4, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo7;
            $pbest_lo4 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 8, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo8, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo8;
            $pbest_lo4 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 1, $pbest_lo4, $pbest_lo2 , $pbest_lo3, $pbest_lo1, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo1;
            $pbest_lo4 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 2, $pbest_lo1, $pbest_lo4 , $pbest_lo3, $pbest_lo2, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo2;
            $pbest_lo4 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo4, $pbest_lo3, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo3;
            $pbest_lo4 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        }

        if ($gbest_lo5 == $pbest_lo5) {
            $gbest_lo5 = $pbest_lo5;
        } elseif ($gbest_lo5 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo6, $pbest_lo5, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo6;
            $pbest_lo5 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 7, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo7, $pbest_lo6, $pbest_lo5, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo7;
            $pbest_lo5 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 8, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo8, $pbest_lo6, $pbest_lo7, $pbest_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo8;
            $pbest_lo5 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 1, $pbest_lo5, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo1, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo1;
            $pbest_lo5 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 2, $pbest_lo1, $pbest_lo5 , $pbest_lo3, $pbest_lo4, $pbest_lo2, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo2;
            $pbest_lo5 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo5, $pbest_lo4, $pbest_lo3, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo3;
            $pbest_lo5 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo5, $pbest_lo4, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo4;
            $pbest_lo5 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        }

        if ($gbest_lo6 == $pbest_lo6) {
            $gbest_lo6 = $pbest_lo6;
        } elseif ($gbest_lo6 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 7, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo7, $pbest_lo6, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo7;
            $pbest_lo6 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 8, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo8, $pbest_lo7, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo8;
            $pbest_lo6 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 1, $pbest_lo6, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo1, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo1;
            $pbest_lo6 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 2, $pbest_lo1, $pbest_lo6 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo2, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo2;
            $pbest_lo6 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo5, $pbest_lo4, $pbest_lo5, $pbest_lo3, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo3;
            $pbest_lo6 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo6, $pbest_lo5, $pbest_lo4, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo4;
            $pbest_lo6 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo6, $pbest_lo5, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo5;
            $pbest_lo6 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        }

        if ($gbest_lo7 == $pbest_lo7) {
            $gbest_lo7 = $pbest_lo7;
        } elseif ($gbest_lo7 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 8, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo8, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo8;
            $pbest_lo7 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 1, $pbest_lo7, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo1, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo1;
            $pbest_lo7 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 2, $pbest_lo1, $pbest_lo7 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo2, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo2;
            $pbest_lo7 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo7, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo3, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo3;
            $pbest_lo7 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo7, $pbest_lo5, $pbest_lo6, $pbest_lo4, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo4;
            $pbest_lo7 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo7, $pbest_lo6, $pbest_lo5, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo5;
            $pbest_lo7 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo7, $pbest_lo6, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo6;
            $pbest_lo7 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        }

        if ($gbest_lo8 == $pbest_lo8) {
            $gbest_lo8 = $pbest_lo8;
        } elseif ($gbest_lo8 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 1, $pbest_lo8, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo1;
            $pbest_lo8 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo8 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 2, $pbest_lo1, $pbest_lo8 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo2;
            $pbest_lo8 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo8 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo8, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo3;
            $pbest_lo8 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo8 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo8, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo4;
            $pbest_lo8 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo8 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo8, $pbest_lo6, $pbest_lo7, $pbest_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo5;
            $pbest_lo8 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo8 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo8, $pbest_lo7, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo6;
            $pbest_lo8 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo8 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 8, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo8, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo7;
            $pbest_lo8 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        }
    } elseif ($cp == 1) {
        $langkah_ke = 0;
        $query_select = "SELECT * FROM partikel_pso_1 WHERE kode='xi' and id_partikel=$id_partikel and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $xi_lo1 = $data_q['lo1'];
                $xi_lo2 = $data_q['lo2'];
                $xi_lo3 = $data_q['lo3'];
                $xi_lo4 = $data_q['lo4'];
                $xi_lo5 = $data_q['lo5'];
                $xi_lo6 = $data_q['lo6'];
            }
        }

        $query_select = "SELECT * FROM partikel_pso_1 WHERE kode='pbest' and id_partikel=$id_partikel and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $pbest_lo1 = $data_q['lo1'];
                $pbest_lo2 = $data_q['lo2'];
                $pbest_lo3 = $data_q['lo3'];
                $pbest_lo4 = $data_q['lo4'];
                $pbest_lo5 = $data_q['lo5'];
                $pbest_lo6 = $data_q['lo6'];
            }
        }

        $query_select = "SELECT * FROM partikel_pso_1 WHERE kode='gbest' and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $gbest_lo1 = $data_q['lo1'];
                $gbest_lo2 = $data_q['lo2'];
                $gbest_lo3 = $data_q['lo3'];
                $gbest_lo4 = $data_q['lo4'];
                $gbest_lo5 = $data_q['lo5'];
                $gbest_lo6 = $data_q['lo6'];
            }
        }

        //cek jika data yg dibind merupakan gbest
        if ($pbest_lo1 == $gbest_lo1 && $pbest_lo2 == $gbest_lo2 && $pbest_lo3 == $gbest_lo3 && $pbest_lo4 == $gbest_lo4 && $pbest_lo5 == $gbest_lo5 && $pbest_lo6 == $gbest_lo6) {
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, 1, $id_partikel, 0, 0, $pbest_lo1, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
        }

        //proses transposisi setiap lo; dimulai dari LO1
        if ($gbest_lo1 == $pbest_lo1) {
            $gbest_lo1 = $pbest_lo1;
        } elseif ($gbest_lo1 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 2, $pbest_lo2, $pbest_lo1,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo2;
            $pbest_lo1 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 3, $pbest_lo3, $pbest_lo2,$pbest_lo1, $pbest_lo4, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo3;
            $pbest_lo1 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 4, $pbest_lo4, $pbest_lo2,$pbest_lo3, $pbest_lo1, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo4;
            $pbest_lo1 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 5, $pbest_lo5, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo1, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo5;
            $pbest_lo1 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 6, $pbest_lo6, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo6;
            $pbest_lo1 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        }

        //cek LO2
        if ($gbest_lo2 == $pbest_lo2) {
            $gbest_lo2 = $pbest_lo2;
        } elseif ($gbest_lo2 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 3, $pbest_lo1, $pbest_lo3 , $pbest_lo2, $pbest_lo4, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo3;
            $pbest_lo2 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 4, $pbest_lo1, $pbest_lo4 , $pbest_lo3, $pbest_lo2, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo4;
            $pbest_lo2 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 5, $pbest_lo1, $pbest_lo5 , $pbest_lo3, $pbest_lo4, $pbest_lo2, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo5;
            $pbest_lo2 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 6, $pbest_lo1, $pbest_lo6 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo6;
            $pbest_lo2 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 1, $pbest_lo2, $pbest_lo1 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo1;
            $pbest_lo2 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        }

        //cek LO3
        if ($gbest_lo3 == $pbest_lo3) {
            $gbest_lo3 = $pbest_lo3;
        } elseif ($gbest_lo3 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo4, $pbest_lo3, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo4;
            $pbest_lo3 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo5, $pbest_lo4, $pbest_lo3, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo5;
            $pbest_lo3 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo6, $pbest_lo4, $pbest_lo5, $pbest_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo6;
            $pbest_lo3 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 1, $pbest_lo3, $pbest_lo2 , $pbest_lo1, $pbest_lo4, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo1;
            $pbest_lo3 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 2, $pbest_lo1, $pbest_lo3 , $pbest_lo2, $pbest_lo4, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo2;
            $pbest_lo3 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        }

        //cek LO4
        if ($gbest_lo4 == $pbest_lo4) {
            $gbest_lo4 = $pbest_lo4;
        } elseif ($gbest_lo4 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo5, $pbest_lo4, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo5;
            $pbest_lo4 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo6, $pbest_lo5, $pbest_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo6;
            $pbest_lo4 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 1, $pbest_lo4, $pbest_lo2 , $pbest_lo3, $pbest_lo1, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo1;
            $pbest_lo4 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 2, $pbest_lo1, $pbest_lo4 , $pbest_lo3, $pbest_lo2, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo2;
            $pbest_lo4 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo4, $pbest_lo3, $pbest_lo5, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo3;
            $pbest_lo4 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        }

        if ($gbest_lo5 == $pbest_lo5) {
            $gbest_lo5 = $pbest_lo5;
        } elseif ($gbest_lo5 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo6, $pbest_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo6;
            $pbest_lo5 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 1, $pbest_lo5, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo1, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo1;
            $pbest_lo5 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 2, $pbest_lo1, $pbest_lo5 , $pbest_lo3, $pbest_lo4, $pbest_lo2, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo2;
            $pbest_lo5 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo5, $pbest_lo4, $pbest_lo3, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo3;
            $pbest_lo5 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo5, $pbest_lo4, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo4;
            $pbest_lo5 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        }

        if ($gbest_lo6 == $pbest_lo6) {
            $gbest_lo6 = $pbest_lo6;
        } elseif ($gbest_lo6 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 1, $pbest_lo6, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo1;
            $pbest_lo6 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 2, $pbest_lo1, $pbest_lo6 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo2;
            $pbest_lo6 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo5, $pbest_lo4, $pbest_lo5, $pbest_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo3;
            $pbest_lo6 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo6, $pbest_lo5, $pbest_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo4;
            $pbest_lo6 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo6, $pbest_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo5;
            $pbest_lo6 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        }
    } elseif ($cp == 2) {
        $langkah_ke = 0;
        $query_select = "SELECT * FROM partikel_pso_2 WHERE kode='xi' and id_partikel=$id_partikel and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $xi_lo1 = $data_q['lo1'];
                $xi_lo2 = $data_q['lo2'];
                $xi_lo3 = $data_q['lo3'];
                $xi_lo4 = $data_q['lo4'];
                $xi_lo5 = $data_q['lo5'];
                $xi_lo6 = $data_q['lo6'];
                $xi_lo7 = $data_q['lo7'];
            }
        }

        $query_select = "SELECT * FROM partikel_pso_2 WHERE kode='pbest' and id_partikel=$id_partikel and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $pbest_lo1 = $data_q['lo1'];
                $pbest_lo2 = $data_q['lo2'];
                $pbest_lo3 = $data_q['lo3'];
                $pbest_lo4 = $data_q['lo4'];
                $pbest_lo5 = $data_q['lo5'];
                $pbest_lo6 = $data_q['lo6'];
                $pbest_lo7 = $data_q['lo7'];
            }
        }

        $query_select = "SELECT * FROM partikel_pso_2 WHERE kode='gbest' and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $gbest_lo1 = $data_q['lo1'];
                $gbest_lo2 = $data_q['lo2'];
                $gbest_lo3 = $data_q['lo3'];
                $gbest_lo4 = $data_q['lo4'];
                $gbest_lo5 = $data_q['lo5'];
                $gbest_lo6 = $data_q['lo6'];
                $gbest_lo7 = $data_q['lo7'];
            }
        }

        //cek jika data yg dibind merupakan gbest
        if ($pbest_lo1 == $gbest_lo1 && $pbest_lo2 == $gbest_lo2 && $pbest_lo3 == $gbest_lo3 && $pbest_lo4 == $gbest_lo4 && $pbest_lo5 == $gbest_lo5 && $pbest_lo6 == $gbest_lo6 && $pbest_lo7 == $gbest_lo7) {
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, 1, $id_partikel, 0, 0, $pbest_lo1, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
        }

        //proses transposisi setiap lo; dimulai dari LO1
        if ($gbest_lo1 == $pbest_lo1) {
            $gbest_lo1 = $pbest_lo1;
        } elseif ($gbest_lo1 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 2, $pbest_lo2, $pbest_lo1,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6,$pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo2;
            $pbest_lo1 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 3, $pbest_lo3, $pbest_lo2,$pbest_lo1, $pbest_lo4, $pbest_lo5, $pbest_lo6,$pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo3;
            $pbest_lo1 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 4, $pbest_lo4, $pbest_lo2,$pbest_lo3, $pbest_lo1, $pbest_lo5, $pbest_lo6,$pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo4;
            $pbest_lo1 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 5, $pbest_lo5, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo1, $pbest_lo6,$pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo5;
            $pbest_lo1 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 6, $pbest_lo6, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo1,$pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo6;
            $pbest_lo1 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 7, $pbest_lo7, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6,$pbest_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo7;
            $pbest_lo1 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        }

        //cek LO2
        if ($gbest_lo2 == $pbest_lo2) {
            $gbest_lo2 = $pbest_lo2;
        } elseif ($gbest_lo2 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 3, $pbest_lo1, $pbest_lo3 , $pbest_lo2, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo3;
            $pbest_lo2 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 4, $pbest_lo1, $pbest_lo4 , $pbest_lo3, $pbest_lo2, $pbest_lo5, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo4;
            $pbest_lo2 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 5, $pbest_lo1, $pbest_lo5 , $pbest_lo3, $pbest_lo4, $pbest_lo2, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo5;
            $pbest_lo2 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 6, $pbest_lo1, $pbest_lo6 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo2, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo6;
            $pbest_lo2 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 7, $pbest_lo1, $pbest_lo7 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo7;
            $pbest_lo2 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 1, $pbest_lo2, $pbest_lo1 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo1;
            $pbest_lo2 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        }

        //cek LO3
        if ($gbest_lo3 == $pbest_lo3) {
            $gbest_lo3 = $pbest_lo3;
        } elseif ($gbest_lo3 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo4, $pbest_lo3, $pbest_lo5, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo4;
            $pbest_lo3 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo5, $pbest_lo4, $pbest_lo3, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo5;
            $pbest_lo3 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo6, $pbest_lo4, $pbest_lo5, $pbest_lo3, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo6;
            $pbest_lo3 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 7, $pbest_lo1, $pbest_lo2 , $pbest_lo7, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo7;
            $pbest_lo3 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 1, $pbest_lo3, $pbest_lo2 , $pbest_lo1, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo1;
            $pbest_lo3 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 2, $pbest_lo1, $pbest_lo3 , $pbest_lo2, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo2;
            $pbest_lo3 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        }

        //cek LO4
        if ($gbest_lo4 == $pbest_lo4) {
            $gbest_lo4 = $pbest_lo4;
        } elseif ($gbest_lo4 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo5, $pbest_lo4, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo5;
            $pbest_lo4 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo6, $pbest_lo5, $pbest_lo4, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo6;
            $pbest_lo4 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 7, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo7, $pbest_lo5, $pbest_lo6, $pbest_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo7;
            $pbest_lo4 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        }  elseif ($gbest_lo4 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 1, $pbest_lo4, $pbest_lo2 , $pbest_lo3, $pbest_lo1, $pbest_lo5, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo1;
            $pbest_lo4 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 2, $pbest_lo1, $pbest_lo4 , $pbest_lo3, $pbest_lo2, $pbest_lo5, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo2;
            $pbest_lo4 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo4, $pbest_lo3, $pbest_lo5, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo3;
            $pbest_lo4 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        }

        if ($gbest_lo5 == $pbest_lo5) {
            $gbest_lo5 = $pbest_lo5;
        } elseif ($gbest_lo5 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo6, $pbest_lo5, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo6;
            $pbest_lo5 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 7, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo7, $pbest_lo6, $pbest_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo7;
            $pbest_lo5 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        }  elseif ($gbest_lo5 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 1, $pbest_lo5, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo1, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo1;
            $pbest_lo5 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 2, $pbest_lo1, $pbest_lo5 , $pbest_lo3, $pbest_lo4, $pbest_lo2, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo2;
            $pbest_lo5 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo5, $pbest_lo4, $pbest_lo3, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo3;
            $pbest_lo5 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo5, $pbest_lo4, $pbest_lo6, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo4;
            $pbest_lo5 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        }

        if ($gbest_lo6 == $pbest_lo6) {
            $gbest_lo6 = $pbest_lo6;
        } elseif ($gbest_lo6 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 7, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo7, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo7;
            $pbest_lo6 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 1, $pbest_lo6, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo1, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo1;
            $pbest_lo6 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 2, $pbest_lo1, $pbest_lo6 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo2, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo2;
            $pbest_lo6 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo5, $pbest_lo4, $pbest_lo5, $pbest_lo3, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo3;
            $pbest_lo6 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo6, $pbest_lo5, $pbest_lo4, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo4;
            $pbest_lo6 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo6, $pbest_lo5, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo5;
            $pbest_lo6 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        }

        if ($gbest_lo7 == $pbest_lo7) {
            $gbest_lo7 = $pbest_lo7;
        } elseif ($gbest_lo7 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 1, $pbest_lo7, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo1;
            $pbest_lo7 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 2, $pbest_lo1, $pbest_lo7 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo2;
            $pbest_lo7 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo7, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo3;
            $pbest_lo7 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo7, $pbest_lo5, $pbest_lo6, $pbest_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo4;
            $pbest_lo7 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo7, $pbest_lo6, $pbest_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo5;
            $pbest_lo7 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo7, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo6;
            $pbest_lo7 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } 
    } elseif ($cp == 3) {
        $langkah_ke = 0;
        $query_select = "SELECT * FROM partikel_pso_3 WHERE kode='xi' and id_partikel=$id_partikel and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $xi_lo1 = $data_q['lo1'];
                $xi_lo2 = $data_q['lo2'];
                $xi_lo3 = $data_q['lo3'];
                $xi_lo4 = $data_q['lo4'];
                $xi_lo5 = $data_q['lo5'];
                $xi_lo6 = $data_q['lo6'];
                $xi_lo7 = $data_q['lo7'];
                $xi_lo8 = $data_q['lo8'];
            }
        }

        $query_select = "SELECT * FROM partikel_pso_3 WHERE kode='pbest' and id_partikel=$id_partikel and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $pbest_lo1 = $data_q['lo1'];
                $pbest_lo2 = $data_q['lo2'];
                $pbest_lo3 = $data_q['lo3'];
                $pbest_lo4 = $data_q['lo4'];
                $pbest_lo5 = $data_q['lo5'];
                $pbest_lo6 = $data_q['lo6'];
                $pbest_lo7 = $data_q['lo7'];
                $pbest_lo8 = $data_q['lo8'];
            }
        }

        $query_select = "SELECT * FROM partikel_pso_3 WHERE kode='gbest' and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $gbest_lo1 = $data_q['lo1'];
                $gbest_lo2 = $data_q['lo2'];
                $gbest_lo3 = $data_q['lo3'];
                $gbest_lo4 = $data_q['lo4'];
                $gbest_lo5 = $data_q['lo5'];
                $gbest_lo6 = $data_q['lo6'];
                $gbest_lo7 = $data_q['lo7'];
                $gbest_lo8 = $data_q['lo8'];
            }
        }

        //cek jika data yg dibind merupakan gbest
        if ($pbest_lo1 == $gbest_lo1 && $pbest_lo2 == $gbest_lo2 && $pbest_lo3 == $gbest_lo3 && $pbest_lo4 == $gbest_lo4 && $pbest_lo5 == $gbest_lo5 && $pbest_lo6 == $gbest_lo6 && $pbest_lo7 == $gbest_lo7  && $pbest_lo8 == $gbest_lo8) {
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, 1, $id_partikel, 0, 0, $pbest_lo1, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
        }

        //proses transposisi setiap lo; dimulai dari LO1
        if ($gbest_lo1 == $pbest_lo1) {
            $gbest_lo1 = $pbest_lo1;
        } elseif ($gbest_lo1 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 2, $pbest_lo2, $pbest_lo1,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6,$pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo2;
            $pbest_lo1 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 3, $pbest_lo3, $pbest_lo2,$pbest_lo1, $pbest_lo4, $pbest_lo5, $pbest_lo6,$pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo3;
            $pbest_lo1 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 4, $pbest_lo4, $pbest_lo2,$pbest_lo3, $pbest_lo1, $pbest_lo5, $pbest_lo6,$pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo4;
            $pbest_lo1 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 5, $pbest_lo5, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo1, $pbest_lo6,$pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo5;
            $pbest_lo1 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 6, $pbest_lo6, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo1,$pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo6;
            $pbest_lo1 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 7, $pbest_lo7, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6,$pbest_lo1, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo7;
            $pbest_lo1 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo1 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 8, $pbest_lo8, $pbest_lo2,$pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6,$pbest_lo7, $pbest_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo1;
            $tukar_b = $pbest_lo8;
            $pbest_lo1 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        }

        //cek LO2
        if ($gbest_lo2 == $pbest_lo2) {
            $gbest_lo2 = $pbest_lo2;
        } elseif ($gbest_lo2 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 3, $pbest_lo1, $pbest_lo3 , $pbest_lo2, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo3;
            $pbest_lo2 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 4, $pbest_lo1, $pbest_lo4 , $pbest_lo3, $pbest_lo2, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo4;
            $pbest_lo2 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 5, $pbest_lo1, $pbest_lo5 , $pbest_lo3, $pbest_lo4, $pbest_lo2, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo5;
            $pbest_lo2 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 6, $pbest_lo1, $pbest_lo6 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo2, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo6;
            $pbest_lo2 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 7, $pbest_lo1, $pbest_lo7 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo2, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo7;
            $pbest_lo2 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 8, $pbest_lo1, $pbest_lo8 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo8;
            $pbest_lo2 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        } elseif ($gbest_lo2 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 1, $pbest_lo2, $pbest_lo1 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo2;
            $tukar_b = $pbest_lo1;
            $pbest_lo2 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        }

        //cek LO3
        if ($gbest_lo3 == $pbest_lo3) {
            $gbest_lo3 = $pbest_lo3;
        } elseif ($gbest_lo3 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo4, $pbest_lo3, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo4;
            $pbest_lo3 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo5, $pbest_lo4, $pbest_lo3, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo5;
            $pbest_lo3 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo6, $pbest_lo4, $pbest_lo5, $pbest_lo3, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo6;
            $pbest_lo3 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 7, $pbest_lo1, $pbest_lo2 , $pbest_lo7, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo3, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo7;
            $pbest_lo3 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 8, $pbest_lo1, $pbest_lo2 , $pbest_lo8, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo8;
            $pbest_lo3 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 1, $pbest_lo3, $pbest_lo2 , $pbest_lo1, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo1;
            $pbest_lo3 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo3 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 2, $pbest_lo1, $pbest_lo3 , $pbest_lo2, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo3;
            $tukar_b = $pbest_lo2;
            $pbest_lo3 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        }

        //cek LO4
        if ($gbest_lo4 == $pbest_lo4) {
            $gbest_lo4 = $pbest_lo4;
        } elseif ($gbest_lo4 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo5, $pbest_lo4, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo5;
            $pbest_lo4 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo6, $pbest_lo5, $pbest_lo4, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo6;
            $pbest_lo4 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 7, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo7, $pbest_lo5, $pbest_lo6, $pbest_lo4, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo7;
            $pbest_lo4 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 8, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo8, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo8;
            $pbest_lo4 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 1, $pbest_lo4, $pbest_lo2 , $pbest_lo3, $pbest_lo1, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo1;
            $pbest_lo4 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 2, $pbest_lo1, $pbest_lo4 , $pbest_lo3, $pbest_lo2, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo2;
            $pbest_lo4 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo4 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo4, $pbest_lo3, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo4;
            $tukar_b = $pbest_lo3;
            $pbest_lo4 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        }

        if ($gbest_lo5 == $pbest_lo5) {
            $gbest_lo5 = $pbest_lo5;
        } elseif ($gbest_lo5 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo6, $pbest_lo5, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo6;
            $pbest_lo5 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 7, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo7, $pbest_lo6, $pbest_lo5, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo7;
            $pbest_lo5 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 8, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo8, $pbest_lo6, $pbest_lo7, $pbest_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo8;
            $pbest_lo5 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 1, $pbest_lo5, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo1, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo1;
            $pbest_lo5 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 2, $pbest_lo1, $pbest_lo5 , $pbest_lo3, $pbest_lo4, $pbest_lo2, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo2;
            $pbest_lo5 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo5, $pbest_lo4, $pbest_lo3, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo3;
            $pbest_lo5 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo5 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo5, $pbest_lo4, $pbest_lo6, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo5;
            $tukar_b = $pbest_lo4;
            $pbest_lo5 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        }

        if ($gbest_lo6 == $pbest_lo6) {
            $gbest_lo6 = $pbest_lo6;
        } elseif ($gbest_lo6 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 7, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo7, $pbest_lo6, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo7;
            $pbest_lo6 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 8, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo8, $pbest_lo7, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo8;
            $pbest_lo6 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 1, $pbest_lo6, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo1, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo1;
            $pbest_lo6 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 2, $pbest_lo1, $pbest_lo6 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo2, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo2;
            $pbest_lo6 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo5, $pbest_lo4, $pbest_lo5, $pbest_lo3, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo3;
            $pbest_lo6 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo6, $pbest_lo5, $pbest_lo4, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo4;
            $pbest_lo6 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo6 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo6, $pbest_lo5, $pbest_lo7, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo6;
            $tukar_b = $pbest_lo5;
            $pbest_lo6 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        }

        if ($gbest_lo7 == $pbest_lo7) {
            $gbest_lo7 = $pbest_lo7;
        } elseif ($gbest_lo7 == $pbest_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 8, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo8, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo8;
            $pbest_lo7 = $tukar_b;
            $pbest_lo8 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 1, $pbest_lo7, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo1, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo1;
            $pbest_lo7 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 2, $pbest_lo1, $pbest_lo7 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo2, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo2;
            $pbest_lo7 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo7, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo3, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo3;
            $pbest_lo7 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo7, $pbest_lo5, $pbest_lo6, $pbest_lo4, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo4;
            $pbest_lo7 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo7, $pbest_lo6, $pbest_lo5, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo5;
            $pbest_lo7 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo7 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo7, $pbest_lo6, $pbest_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo7;
            $tukar_b = $pbest_lo6;
            $pbest_lo7 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        }

        if ($gbest_lo8 == $pbest_lo8) {
            $gbest_lo8 = $pbest_lo8;
        } elseif ($gbest_lo8 == $pbest_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 1, $pbest_lo8, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo1;
            $pbest_lo8 = $tukar_b;
            $pbest_lo1 = $tukar_a;
        } elseif ($gbest_lo8 == $pbest_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 2, $pbest_lo1, $pbest_lo8 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo2;
            $pbest_lo8 = $tukar_b;
            $pbest_lo2 = $tukar_a;
        } elseif ($gbest_lo8 == $pbest_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 3, $pbest_lo1, $pbest_lo2 , $pbest_lo8, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo3;
            $pbest_lo8 = $tukar_b;
            $pbest_lo3 = $tukar_a;
        } elseif ($gbest_lo8 == $pbest_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 4, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo8, $pbest_lo5, $pbest_lo6, $pbest_lo7, $pbest_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo4;
            $pbest_lo8 = $tukar_b;
            $pbest_lo4 = $tukar_a;
        } elseif ($gbest_lo8 == $pbest_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 5, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo8, $pbest_lo6, $pbest_lo7, $pbest_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo5;
            $pbest_lo8 = $tukar_b;
            $pbest_lo5 = $tukar_a;
        } elseif ($gbest_lo8 == $pbest_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 6, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo8, $pbest_lo7, $pbest_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo6;
            $pbest_lo8 = $tukar_b;
            $pbest_lo6 = $tukar_a;
        } elseif ($gbest_lo8 == $pbest_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_1(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 8, $pbest_lo1, $pbest_lo2 , $pbest_lo3, $pbest_lo4, $pbest_lo5, $pbest_lo6, $pbest_lo8, $pbest_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $pbest_lo8;
            $tukar_b = $pbest_lo7;
            $pbest_lo8 = $tukar_b;
            $pbest_lo7 = $tukar_a;
        } 
    }
}

function transpos_2($koneksi, $cp, $id_pbest, $iterasi_ke, $total_langkah)
{
    $gbest_lo1 = $gbest_lo2 = $gbest_lo3 = $gbest_lo4 = $gbest_lo5 = $gbest_lo6 = $gbest_lo7 = $gbest_lo8 = 0;
    $tukar_a = $tukar_b = 0;
    $pbest_awal_lo1 = $pbest_awal_lo2 = $pbest_awal_lo3 = $pbest_awal_lo4 = $pbest_awal_lo5 = $pbest_awal_lo6 = $pbest_awal_lo7 = $pbest_awal_lo8 = 0;
    $hasil_t1_lo1 = $hasil_t1_lo2 = $hasil_t1_lo3 = $hasil_t1_lo4 = $hasil_t1_lo5 = $hasil_t1_lo6 = $hasil_t1_lo7 = $hasil_t1_lo8 = 0;

    if ($cp == 0) { 
        //get data pbest awal
        $select_pbest = "SELECT * FROM partikel_pso_0 WHERE iterasi_ke=$iterasi_ke and id_partikel=$id_pbest and kode='pbest'";
        $q_select_pbest = mysqli_query($koneksi, $select_pbest);
        if (mysqli_num_rows($q_select_pbest)) {
            while ($data_q = mysqli_fetch_assoc($q_select_pbest)) {
                $pbest_awal_lo1 = $data_q['lo1'];
                $pbest_awal_lo2 = $data_q['lo2'];
                $pbest_awal_lo3 = $data_q['lo3'];
                $pbest_awal_lo4 = $data_q['lo4'];
                $pbest_awal_lo5 = $data_q['lo5'];
                $pbest_awal_lo6 = $data_q['lo6'];
                $pbest_awal_lo7 = $data_q['lo7'];
                $pbest_awal_lo8 = $data_q['lo8'];
            }
        }

        for ($langkah_ke = 1; $langkah_ke <= $total_langkah; $langkah_ke++) {
            $posisi_awal = $posisi_akhir = 0;
            $select_posisi = "SELECT * FROM transpos_ke_1 WHERE iterasi_ke=$iterasi_ke and id_pbest=$id_pbest and langkah_ke=$langkah_ke and kategori=$cp";
            $q_select_posisi = mysqli_query($koneksi, $select_posisi);
            if (mysqli_num_rows($q_select_posisi)) {
                while ($data_posisi = mysqli_fetch_assoc($q_select_posisi)) {
                    $posisi_awal = $data_posisi['posisi_awal'];
                    $posisi_akhir = $data_posisi['posisi_akhir'];

                    // echo "<br>posisi awal: $posisi_awal";
                    // echo "<br>posisi akhir: $posisi_akhir";
                }
            }

            //validasi memastikan data LO tidak 0
            if ($pbest_awal_lo1 != 0 || $pbest_awal_lo2 != 0 || $pbest_awal_lo3 != 0 || $pbest_awal_lo4 != 0 || $pbest_awal_lo5 != 0 || $pbest_awal_lo6 != 0 || $pbest_awal_lo7 != 0 || $pbest_awal_lo8 != 0) {

                if ($posisi_awal == 1 && $posisi_akhir == 1) { } elseif ($posisi_awal == 1 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                }

                if ($posisi_awal == 2 && $posisi_akhir == 2) { } elseif ($posisi_awal == 2 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                }

                if ($posisi_awal == 3 && $posisi_akhir == 3) { } elseif ($posisi_awal == 3 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                }

                if ($posisi_awal == 4 && $posisi_akhir == 4) { } elseif ($posisi_awal == 4 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                }

                if ($posisi_awal == 5 && $posisi_akhir == 5) { } elseif ($posisi_awal == 5 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                }

                if ($posisi_awal == 6 && $posisi_akhir == 6) { } elseif ($posisi_awal == 6 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                }

                if ($posisi_awal == 7 && $posisi_akhir == 7) { } elseif ($posisi_awal == 7 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                }

                if ($posisi_awal == 8 && $posisi_akhir == 8) { } elseif ($posisi_awal == 8 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                }
            }

            $insert = "INSERT INTO transpos_ke_2(iterasi_ke,id_pbest,langkah_ke,posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke,$id_pbest,$langkah_ke,$posisi_awal,$posisi_akhir,$pbest_awal_lo1,$pbest_awal_lo2,$pbest_awal_lo3,$pbest_awal_lo4,$pbest_awal_lo5,$pbest_awal_lo6,$pbest_awal_lo7,$pbest_awal_lo8,$cp)";
            mysqli_query($koneksi, $insert);
        }
    } elseif ($cp == 1) {
        //get data pbest awal
        $select_pbest = "SELECT * FROM partikel_pso_1 WHERE iterasi_ke=$iterasi_ke and id_partikel=$id_pbest and kode='pbest'";
        $q_select_pbest = mysqli_query($koneksi, $select_pbest);
        if (mysqli_num_rows($q_select_pbest)) {
            while ($data_q = mysqli_fetch_assoc($q_select_pbest)) {
                $pbest_awal_lo1 = $data_q['lo1'];
                $pbest_awal_lo2 = $data_q['lo2'];
                $pbest_awal_lo3 = $data_q['lo3'];
                $pbest_awal_lo4 = $data_q['lo4'];
                $pbest_awal_lo5 = $data_q['lo5'];
                $pbest_awal_lo6 = $data_q['lo6'];
            }
        }

        for ($langkah_ke = 1; $langkah_ke <= $total_langkah; $langkah_ke++) {
            $posisi_awal = $posisi_akhir = 0;
            $select_posisi = "SELECT * FROM transpos_ke_1 WHERE iterasi_ke=$iterasi_ke and id_pbest=$id_pbest and langkah_ke=$langkah_ke and kategori=$cp";
            $q_select_posisi = mysqli_query($koneksi, $select_posisi);
            if (mysqli_num_rows($q_select_posisi)) {
                while ($data_posisi = mysqli_fetch_assoc($q_select_posisi)) {
                    $posisi_awal = $data_posisi['posisi_awal'];
                    $posisi_akhir = $data_posisi['posisi_akhir'];

                    // echo "<br>posisi awal: $posisi_awal";
                    // echo "<br>posisi akhir: $posisi_akhir";
                }
            }

            //validasi memastikan data LO tidak 0
            if ($pbest_awal_lo1 != 0 || $pbest_awal_lo2 != 0 || $pbest_awal_lo3 != 0 || $pbest_awal_lo4 != 0 || $pbest_awal_lo5 != 0 || $pbest_awal_lo6 != 0) {

                if ($posisi_awal == 1 && $posisi_akhir == 1) { } elseif ($posisi_awal == 1 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                }

                if ($posisi_awal == 2 && $posisi_akhir == 2) { } elseif ($posisi_awal == 2 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                }

                if ($posisi_awal == 3 && $posisi_akhir == 3) { } elseif ($posisi_awal == 3 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                }

                if ($posisi_awal == 4 && $posisi_akhir == 4) { } elseif ($posisi_awal == 4 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                }

                if ($posisi_awal == 5 && $posisi_akhir == 5) { } elseif ($posisi_awal == 5 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                }

                if ($posisi_awal == 6 && $posisi_akhir == 6) { } elseif ($posisi_awal == 6 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                }
            }

            $insert = "INSERT INTO transpos_ke_2(iterasi_ke,id_pbest,langkah_ke,posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke,$id_pbest,$langkah_ke,$posisi_awal,$posisi_akhir,$pbest_awal_lo1,$pbest_awal_lo2,$pbest_awal_lo3,$pbest_awal_lo4,$pbest_awal_lo5,$pbest_awal_lo6,$cp)";
            mysqli_query($koneksi, $insert);
        }
    } elseif ($cp == 2) {
        //get data pbest awal
        $select_pbest = "SELECT * FROM partikel_pso_2 WHERE iterasi_ke=$iterasi_ke and id_partikel=$id_pbest and kode='pbest'";
        $q_select_pbest = mysqli_query($koneksi, $select_pbest);
        if (mysqli_num_rows($q_select_pbest)) {
            while ($data_q = mysqli_fetch_assoc($q_select_pbest)) {
                $pbest_awal_lo1 = $data_q['lo1'];
                $pbest_awal_lo2 = $data_q['lo2'];
                $pbest_awal_lo3 = $data_q['lo3'];
                $pbest_awal_lo4 = $data_q['lo4'];
                $pbest_awal_lo5 = $data_q['lo5'];
                $pbest_awal_lo6 = $data_q['lo6'];
                $pbest_awal_lo7 = $data_q['lo7'];
            }
        }

        for ($langkah_ke = 1; $langkah_ke <= $total_langkah; $langkah_ke++) {
            $posisi_awal = $posisi_akhir = 0;
            $select_posisi = "SELECT * FROM transpos_ke_1 WHERE iterasi_ke=$iterasi_ke and id_pbest=$id_pbest and langkah_ke=$langkah_ke and kategori=$cp";
            $q_select_posisi = mysqli_query($koneksi, $select_posisi);
            if (mysqli_num_rows($q_select_posisi)) {
                while ($data_posisi = mysqli_fetch_assoc($q_select_posisi)) {
                    $posisi_awal = $data_posisi['posisi_awal'];
                    $posisi_akhir = $data_posisi['posisi_akhir'];

                    // echo "<br>posisi awal: $posisi_awal";
                    // echo "<br>posisi akhir: $posisi_akhir";
                }
            }

            //validasi memastikan data LO tidak 0
            if ($pbest_awal_lo1 != 0 || $pbest_awal_lo2 != 0 || $pbest_awal_lo3 != 0 || $pbest_awal_lo4 != 0 || $pbest_awal_lo5 != 0 || $pbest_awal_lo6 != 0 || $pbest_awal_lo7 != 0) {

                if ($posisi_awal == 1 && $posisi_akhir == 1) { } elseif ($posisi_awal == 1 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                }

                if ($posisi_awal == 2 && $posisi_akhir == 2) { } elseif ($posisi_awal == 2 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                }

                if ($posisi_awal == 3 && $posisi_akhir == 3) { } elseif ($posisi_awal == 3 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                }

                if ($posisi_awal == 4 && $posisi_akhir == 4) { } elseif ($posisi_awal == 4 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                }

                if ($posisi_awal == 5 && $posisi_akhir == 5) { } elseif ($posisi_awal == 5 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                }

                if ($posisi_awal == 6 && $posisi_akhir == 6) { } elseif ($posisi_awal == 6 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                }

                if ($posisi_awal == 7 && $posisi_akhir == 7) { } elseif ($posisi_awal == 7 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                }
            }

            $insert = "INSERT INTO transpos_ke_2(iterasi_ke,id_pbest,langkah_ke,posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke,$id_pbest,$langkah_ke,$posisi_awal,$posisi_akhir,$pbest_awal_lo1,$pbest_awal_lo2,$pbest_awal_lo3,$pbest_awal_lo4,$pbest_awal_lo5,$pbest_awal_lo6,$pbest_awal_lo7,$cp)";
            mysqli_query($koneksi, $insert);
        }
    } elseif ($cp == 3) {
        //get data pbest awal
        $select_pbest = "SELECT * FROM partikel_pso_3 WHERE iterasi_ke=$iterasi_ke and id_partikel=$id_pbest and kode='pbest'";
        $q_select_pbest = mysqli_query($koneksi, $select_pbest);
        if (mysqli_num_rows($q_select_pbest)) {
            while ($data_q = mysqli_fetch_assoc($q_select_pbest)) {
                $pbest_awal_lo1 = $data_q['lo1'];
                $pbest_awal_lo2 = $data_q['lo2'];
                $pbest_awal_lo3 = $data_q['lo3'];
                $pbest_awal_lo4 = $data_q['lo4'];
                $pbest_awal_lo5 = $data_q['lo5'];
                $pbest_awal_lo6 = $data_q['lo6'];
                $pbest_awal_lo7 = $data_q['lo7'];
                $pbest_awal_lo8 = $data_q['lo8'];
            }
        }

        for ($langkah_ke = 1; $langkah_ke <= $total_langkah; $langkah_ke++) {
            $posisi_awal = $posisi_akhir = 0;
            $select_posisi = "SELECT * FROM transpos_ke_1 WHERE iterasi_ke=$iterasi_ke and id_pbest=$id_pbest and langkah_ke=$langkah_ke and kategori=$cp";
            $q_select_posisi = mysqli_query($koneksi, $select_posisi);
            if (mysqli_num_rows($q_select_posisi)) {
                while ($data_posisi = mysqli_fetch_assoc($q_select_posisi)) {
                    $posisi_awal = $data_posisi['posisi_awal'];
                    $posisi_akhir = $data_posisi['posisi_akhir'];

                    // echo "<br>posisi awal: $posisi_awal";
                    // echo "<br>posisi akhir: $posisi_akhir";
                }
            }

            //validasi memastikan data LO tidak 0
            if ($pbest_awal_lo1 != 0 || $pbest_awal_lo2 != 0 || $pbest_awal_lo3 != 0 || $pbest_awal_lo4 != 0 || $pbest_awal_lo5 != 0 || $pbest_awal_lo6 != 0 || $pbest_awal_lo7 != 0 || $pbest_awal_lo8 != 0) {

                if ($posisi_awal == 1 && $posisi_akhir == 1) { } elseif ($posisi_awal == 1 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo1;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo1 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                }

                if ($posisi_awal == 2 && $posisi_akhir == 2) { } elseif ($posisi_awal == 2 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo2;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo2 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                }

                if ($posisi_awal == 3 && $posisi_akhir == 3) { } elseif ($posisi_awal == 3 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo3;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo3 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                }

                if ($posisi_awal == 4 && $posisi_akhir == 4) { } elseif ($posisi_awal == 4 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo4;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo4 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                }

                if ($posisi_awal == 5 && $posisi_akhir == 5) { } elseif ($posisi_awal == 5 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo5;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo5 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                }

                if ($posisi_awal == 6 && $posisi_akhir == 6) { } elseif ($posisi_awal == 6 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo6;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo6 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                }

                if ($posisi_awal == 7 && $posisi_akhir == 7) { } elseif ($posisi_awal == 7 && $posisi_akhir == 8) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo8;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo8 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo7;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo7 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                }

                if ($posisi_awal == 8 && $posisi_akhir == 8) { } elseif ($posisi_awal == 8 && $posisi_akhir == 1) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo1;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo1 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 2) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo2;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo2 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 3) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo3;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo3 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 4) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo4;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo4 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 5) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo5;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo5 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 6) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo6;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo6 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 7) {
                    $tukar_a = $pbest_awal_lo8;
                    $tukar_b = $pbest_awal_lo7;
                    $pbest_awal_lo8 = $tukar_b;
                    $pbest_awal_lo7 = $tukar_a;
                }
            }

            $insert = "INSERT INTO transpos_ke_2(iterasi_ke,id_pbest,langkah_ke,posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke,$id_pbest,$langkah_ke,$posisi_awal,$posisi_akhir,$pbest_awal_lo1,$pbest_awal_lo2,$pbest_awal_lo3,$pbest_awal_lo4,$pbest_awal_lo5,$pbest_awal_lo6,$pbest_awal_lo7,$pbest_awal_lo8,$cp)";
            mysqli_query($koneksi, $insert);
        }
    }
}

function transpos_3($koneksi, $cp, $id_partikel, $iterasi_ke)
{
    $jumlah_langkah_acuan = $tukar_a = $tukar_b = 0;
    $xi_lo1 = $xi_lo2 = $xi_lo3 = $xi_lo4 = $xi_lo5 = $xi_lo6 = $xi_lo7 = $xi_lo8 = 0;
    $acuan_lo1 = $acuan_lo2 = $acuan_lo3 = $acuan_lo4 = $acuan_lo5 = $acuan_lo6 = $acuan_lo7 = $acuan_lo8 = 0;

    if ($cp == 0) {
        $langkah_ke = 0;
        $query_select = "SELECT * FROM partikel_pso_0 WHERE kode='xi' and id_partikel=$id_partikel and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $xi_lo1 = $data_q['lo1'];
                $xi_lo2 = $data_q['lo2'];
                $xi_lo3 = $data_q['lo3'];
                $xi_lo4 = $data_q['lo4'];
                $xi_lo5 = $data_q['lo5'];
                $xi_lo6 = $data_q['lo6'];
                $xi_lo7 = $data_q['lo7'];
                $xi_lo8 = $data_q['lo8'];
            }
        }

        //mencari langkah tertinggi dari transpos2
        $select = "SELECT * FROM transpos_ke_2 WHERE id_pbest=$id_partikel and iterasi_ke=$iterasi_ke and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $jumlah_langkah_acuan = $data_q['langkah_ke'];
            }
        }

        //mencari isi acuan
        $select = "SELECT * FROM transpos_ke_2 WHERE id_pbest=$id_partikel and iterasi_ke=$iterasi_ke and langkah_ke=$jumlah_langkah_acuan and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $acuan_lo1 = $data_q['lo1'];
                $acuan_lo2 = $data_q['lo2'];
                $acuan_lo3 = $data_q['lo3'];
                $acuan_lo4 = $data_q['lo4'];
                $acuan_lo5 = $data_q['lo5'];
                $acuan_lo6 = $data_q['lo6'];
                $acuan_lo7 = $data_q['lo7'];
                $acuan_lo8 = $data_q['lo8'];
            }
        }

        //cek jika data yg dibind merupakan gbest
        if ($xi_lo1 == $acuan_lo1 && $xi_lo2 == $acuan_lo2 && $xi_lo3 == $acuan_lo3 && $xi_lo4 == $acuan_lo4 && $xi_lo5 == $acuan_lo5 && $xi_lo6 == $acuan_lo6 && $xi_lo7 == $acuan_lo7  && $xi_lo8 == $acuan_lo8) {
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, 1, $id_partikel, 0, 0, $xi_lo1, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
        }

        //proses transposisi setiap lo; dimulai dari LO1
        if ($acuan_lo1 == $xi_lo1) {
            $acuan_lo1 = $xi_lo1;
        } elseif ($acuan_lo1 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 2, $xi_lo2, $xi_lo1,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6,$xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo2;
            $xi_lo1 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 3, $xi_lo3, $xi_lo2,$xi_lo1, $xi_lo4, $xi_lo5, $xi_lo6,$xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo3;
            $xi_lo1 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 4, $xi_lo4, $xi_lo2,$xi_lo3, $xi_lo1, $xi_lo5, $xi_lo6,$xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo4;
            $xi_lo1 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 5, $xi_lo5, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo1, $xi_lo6,$xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo5;
            $xi_lo1 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 6, $xi_lo6, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo1,$xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo6;
            $xi_lo1 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 7, $xi_lo7, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6,$xi_lo1, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo7;
            $xi_lo1 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 8, $xi_lo8, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6,$xi_lo7, $xi_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo8;
            $xi_lo1 = $tukar_b;
            $xi_lo8 = $tukar_a;
        }

        //cek LO2
        if ($acuan_lo2 == $xi_lo2) {
            $acuan_lo2 = $xi_lo2;
        } elseif ($acuan_lo2 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 3, $xi_lo1, $xi_lo3 , $xi_lo2, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo3;
            $xi_lo2 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 4, $xi_lo1, $xi_lo4 , $xi_lo3, $xi_lo2, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo4;
            $xi_lo2 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 5, $xi_lo1, $xi_lo5 , $xi_lo3, $xi_lo4, $xi_lo2, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo5;
            $xi_lo2 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 6, $xi_lo1, $xi_lo6 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo2, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo6;
            $xi_lo2 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 7, $xi_lo1, $xi_lo7 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo2, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo7;
            $xi_lo2 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 8, $xi_lo1, $xi_lo8 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo8;
            $xi_lo2 = $tukar_b;
            $xi_lo8 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 1, $xi_lo2, $xi_lo1 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo1;
            $xi_lo2 = $tukar_b;
            $xi_lo1 = $tukar_a;
        }

        //cek LO3
        if ($acuan_lo3 == $xi_lo3) {
            $acuan_lo3 = $xi_lo3;
        } elseif ($acuan_lo3 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 4, $xi_lo1, $xi_lo2 , $xi_lo4, $xi_lo3, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo4;
            $xi_lo3 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 5, $xi_lo1, $xi_lo2 , $xi_lo5, $xi_lo4, $xi_lo3, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo5;
            $xi_lo3 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 6, $xi_lo1, $xi_lo2 , $xi_lo6, $xi_lo4, $xi_lo5, $xi_lo3, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo6;
            $xi_lo3 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 7, $xi_lo1, $xi_lo2 , $xi_lo7, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo3, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo7;
            $xi_lo3 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 8, $xi_lo1, $xi_lo2 , $xi_lo8, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo8;
            $xi_lo3 = $tukar_b;
            $xi_lo8 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 1, $xi_lo3, $xi_lo2 , $xi_lo1, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo1;
            $xi_lo3 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 2, $xi_lo1, $xi_lo3 , $xi_lo2, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo2;
            $xi_lo3 = $tukar_b;
            $xi_lo2 = $tukar_a;
        }

        //cek LO4
        if ($acuan_lo4 == $xi_lo4) {
            $acuan_lo4 = $xi_lo4;
        } elseif ($acuan_lo4 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo5, $xi_lo4, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo5;
            $xi_lo4 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo6, $xi_lo5, $xi_lo4, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo6;
            $xi_lo4 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 7, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo7, $xi_lo5, $xi_lo6, $xi_lo4, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo7;
            $xi_lo4 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 8, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo8, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo8;
            $xi_lo4 = $tukar_b;
            $xi_lo8 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 1, $xi_lo4, $xi_lo2 , $xi_lo3, $xi_lo1, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo1;
            $xi_lo4 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 2, $xi_lo1, $xi_lo4 , $xi_lo3, $xi_lo2, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo2;
            $xi_lo4 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 3, $xi_lo1, $xi_lo2 , $xi_lo4, $xi_lo3, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo3;
            $xi_lo4 = $tukar_b;
            $xi_lo3 = $tukar_a;
        }

        if ($acuan_lo5 == $xi_lo5) {
            $acuan_lo5 = $xi_lo5;
        } elseif ($acuan_lo5 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo6, $xi_lo5, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo6;
            $xi_lo5 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 7, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo7, $xi_lo6, $xi_lo5, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo7;
            $xi_lo5 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 8, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo8, $xi_lo6, $xi_lo7, $xi_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo8;
            $xi_lo5 = $tukar_b;
            $xi_lo8 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 1, $xi_lo5, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo1, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo1;
            $xi_lo5 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 2, $xi_lo1, $xi_lo5 , $xi_lo3, $xi_lo4, $xi_lo2, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo2;
            $xi_lo5 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 3, $xi_lo1, $xi_lo2 , $xi_lo5, $xi_lo4, $xi_lo3, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo3;
            $xi_lo5 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo5, $xi_lo4, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo4;
            $xi_lo5 = $tukar_b;
            $xi_lo4 = $tukar_a;
        }

        if ($acuan_lo6 == $xi_lo6) {
            $acuan_lo6 = $xi_lo6;
        } elseif ($acuan_lo6 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 7, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo7, $xi_lo6, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo7;
            $xi_lo6 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 8, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo8, $xi_lo7, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo8;
            $xi_lo6 = $tukar_b;
            $xi_lo8 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 1, $xi_lo6, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo1, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo1;
            $xi_lo6 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 2, $xi_lo1, $xi_lo6 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo2, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo2;
            $xi_lo6 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 3, $xi_lo1, $xi_lo2 , $xi_lo5, $xi_lo4, $xi_lo5, $xi_lo3, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo3;
            $xi_lo6 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo6, $xi_lo5, $xi_lo4, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo4;
            $xi_lo6 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo6, $xi_lo5, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo5;
            $xi_lo6 = $tukar_b;
            $xi_lo5 = $tukar_a;
        }

        if ($acuan_lo7 == $xi_lo7) {
            $acuan_lo7 = $xi_lo7;
        } elseif ($acuan_lo7 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 8, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo8, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo8;
            $xi_lo7 = $tukar_b;
            $xi_lo8 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 1, $xi_lo7, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo1, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo1;
            $xi_lo7 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 2, $xi_lo1, $xi_lo7 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo2, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo2;
            $xi_lo7 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 3, $xi_lo1, $xi_lo2 , $xi_lo7, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo3, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo3;
            $xi_lo7 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo7, $xi_lo5, $xi_lo6, $xi_lo4, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo4;
            $xi_lo7 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo7, $xi_lo6, $xi_lo5, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo5;
            $xi_lo7 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo7, $xi_lo6, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo6;
            $xi_lo7 = $tukar_b;
            $xi_lo6 = $tukar_a;
        }

        if ($acuan_lo8 == $xi_lo8) {
            $acuan_lo8 = $xi_lo8;
        } elseif ($acuan_lo8 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 1, $xi_lo8, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo1;
            $xi_lo8 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo8 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 2, $xi_lo1, $xi_lo8 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo2;
            $xi_lo8 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo8 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 3, $xi_lo1, $xi_lo2 , $xi_lo8, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo3;
            $xi_lo8 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo8 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo8, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo4;
            $xi_lo8 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo8 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo8, $xi_lo6, $xi_lo7, $xi_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo5;
            $xi_lo8 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo8 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo8, $xi_lo7, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo6;
            $xi_lo8 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo8 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 8, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo8, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo7;
            $xi_lo8 = $tukar_b;
            $xi_lo7 = $tukar_a;
        }
    } elseif ($cp == 1) {
        $langkah_ke = 0;
        $select = "SELECT * FROM partikel_pso_1 WHERE kode='xi' and id_partikel=$id_partikel and iterasi_ke=$iterasi_ke";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $xi_lo1 = $data_q['lo1'];
                $xi_lo2 = $data_q['lo2'];
                $xi_lo3 = $data_q['lo3'];
                $xi_lo4 = $data_q['lo4'];
                $xi_lo5 = $data_q['lo5'];
                $xi_lo6 = $data_q['lo6'];
            }
        }

        //mencari langkah tertinggi dari transpos2
        $select = "SELECT * FROM transpos_ke_2 WHERE id_pbest=$id_partikel and iterasi_ke=$iterasi_ke and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $jumlah_langkah_acuan = $data_q['langkah_ke'];
            }
        }

        //mencari isi acuan
        $select = "SELECT * FROM transpos_ke_2 WHERE id_pbest=$id_partikel and iterasi_ke=$iterasi_ke and langkah_ke=$jumlah_langkah_acuan and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $acuan_lo1 = $data_q['lo1'];
                $acuan_lo2 = $data_q['lo2'];
                $acuan_lo3 = $data_q['lo3'];
                $acuan_lo4 = $data_q['lo4'];
                $acuan_lo5 = $data_q['lo5'];
                $acuan_lo6 = $data_q['lo6'];
            }
        }

        //mengecek jika data yang dibinding merupakan gbest
        if ($xi_lo1 == $acuan_lo1 && $xi_lo2 == $acuan_lo2 && $xi_lo3 == $acuan_lo3 && $xi_lo4 == $acuan_lo4 && $xi_lo5 == $acuan_lo5 && $xi_lo6 == $acuan_lo6) {
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke, langkah_ke, id_pbest, posisi_awal, posisi_akhir, lo1, lo2, lo3, lo4, lo5, lo6, kategori) VALUES ($iterasi_ke, 1, $id_partikel, 0, 0, $acuan_lo1, $acuan_lo2, $acuan_lo3, $acuan_lo4, $acuan_lo5, $acuan_lo6, $cp)";
        }

        if ($acuan_lo1 == $xi_lo1) {
            $acuan_lo1 = $xi_lo1;
        } elseif ($acuan_lo1 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 2, $xi_lo2, $xi_lo1,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo2;
            $xi_lo1 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 3, $xi_lo3, $xi_lo2,$xi_lo1, $xi_lo4, $xi_lo5, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo3;
            $xi_lo1 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 4, $xi_lo4, $xi_lo2,$xi_lo3, $xi_lo1, $xi_lo5, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo4;
            $xi_lo1 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 5, $xi_lo5, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo1, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo5;
            $xi_lo1 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 6, $xi_lo6, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo6;
            $xi_lo1 = $tukar_b;
            $xi_lo6 = $tukar_a;
        }

        //cek LO2
        if ($acuan_lo2 == $xi_lo2) {
            $acuan_lo2 = $xi_lo2;
        } elseif ($acuan_lo2 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 3, $xi_lo1, $xi_lo3 , $xi_lo2, $xi_lo4, $xi_lo5, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo3;
            $xi_lo2 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 4, $xi_lo1, $xi_lo4 , $xi_lo3, $xi_lo2, $xi_lo5, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo4;
            $xi_lo2 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 5, $xi_lo1, $xi_lo5 , $xi_lo3, $xi_lo4, $xi_lo2, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo5;
            $xi_lo2 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 6, $xi_lo1, $xi_lo6 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo6;
            $xi_lo2 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 1, $xi_lo2, $xi_lo1 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo1;
            $xi_lo2 = $tukar_b;
            $xi_lo1 = $tukar_a;
        }

        //cek LO3
        if ($acuan_lo3 == $xi_lo3) {
            $acuan_lo3 = $xi_lo3;
        } elseif ($acuan_lo3 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 4, $xi_lo1, $xi_lo2 , $xi_lo4, $xi_lo3, $xi_lo5, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo4;
            $xi_lo3 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 5, $xi_lo1, $xi_lo2 , $xi_lo5, $xi_lo4, $xi_lo3, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo5;
            $xi_lo3 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 6, $xi_lo1, $xi_lo2 , $xi_lo6, $xi_lo4, $xi_lo5, $xi_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo6;
            $xi_lo3 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 1, $xi_lo3, $xi_lo2 , $xi_lo1, $xi_lo4, $xi_lo5, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo1;
            $xi_lo3 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 2, $xi_lo1, $xi_lo3 , $xi_lo2, $xi_lo4, $xi_lo5, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo2;
            $xi_lo3 = $tukar_b;
            $xi_lo2 = $tukar_a;
        }

        //cek LO4
        if ($acuan_lo4 == $xi_lo4) {
            $acuan_lo4 = $xi_lo4;
        } elseif ($acuan_lo4 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo5, $xi_lo4, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo5;
            $xi_lo4 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo6, $xi_lo5, $xi_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo6;
            $xi_lo4 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 1, $xi_lo4, $xi_lo2 , $xi_lo3, $xi_lo1, $xi_lo5, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo1;
            $xi_lo4 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 2, $xi_lo1, $xi_lo4 , $xi_lo3, $xi_lo2, $xi_lo5, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo2;
            $xi_lo4 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 3, $xi_lo1, $xi_lo2 , $xi_lo4, $xi_lo3, $xi_lo5, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo3;
            $xi_lo4 = $tukar_b;
            $xi_lo3 = $tukar_a;
        }

        if ($acuan_lo5 == $xi_lo5) {
            $acuan_lo5 = $xi_lo5;
        } elseif ($acuan_lo5 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo6, $xi_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo6;
            $xi_lo5 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 1, $xi_lo5, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo1, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo1;
            $xi_lo5 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 2, $xi_lo1, $xi_lo5 , $xi_lo3, $xi_lo4, $xi_lo2, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo2;
            $xi_lo5 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 3, $xi_lo1, $xi_lo2 , $xi_lo5, $xi_lo4, $xi_lo3, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo3;
            $xi_lo5 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo5, $xi_lo4, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo4;
            $xi_lo5 = $tukar_b;
            $xi_lo4 = $tukar_a;
        }

        if ($acuan_lo6 == $xi_lo6) {
            $acuan_lo6 = $xi_lo6;
        } elseif ($acuan_lo6 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 1, $xi_lo6, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo1;
            $xi_lo6 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 2, $xi_lo1, $xi_lo6 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo2;
            $xi_lo6 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 3, $xi_lo1, $xi_lo2 , $xi_lo5, $xi_lo4, $xi_lo5, $xi_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo3;
            $xi_lo6 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo6, $xi_lo5, $xi_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo4;
            $xi_lo6 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo6, $xi_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo5;
            $xi_lo6 = $tukar_b;
            $xi_lo5 = $tukar_a;
        }
    } elseif ($cp == 2) {
        $langkah_ke = 0;
        $query_select = "SELECT * FROM partikel_pso_2 WHERE kode='xi' and id_partikel=$id_partikel and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $xi_lo1 = $data_q['lo1'];
                $xi_lo2 = $data_q['lo2'];
                $xi_lo3 = $data_q['lo3'];
                $xi_lo4 = $data_q['lo4'];
                $xi_lo5 = $data_q['lo5'];
                $xi_lo6 = $data_q['lo6'];
                $xi_lo7 = $data_q['lo7'];
            }
        }

        //mencari langkah tertinggi dari transpos2
        $select = "SELECT * FROM transpos_ke_2 WHERE id_pbest=$id_partikel and iterasi_ke=$iterasi_ke and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $jumlah_langkah_acuan = $data_q['langkah_ke'];
            }
        }

        //mencari isi acuan
        $select = "SELECT * FROM transpos_ke_2 WHERE id_pbest=$id_partikel and iterasi_ke=$iterasi_ke and langkah_ke=$jumlah_langkah_acuan and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $acuan_lo1 = $data_q['lo1'];
                $acuan_lo2 = $data_q['lo2'];
                $acuan_lo3 = $data_q['lo3'];
                $acuan_lo4 = $data_q['lo4'];
                $acuan_lo5 = $data_q['lo5'];
                $acuan_lo6 = $data_q['lo6'];
                $acuan_lo7 = $data_q['lo7'];
            }
        }

        //cek jika data yg dibind merupakan gbest
        if ($xi_lo1 == $acuan_lo1 && $xi_lo2 == $acuan_lo2 && $xi_lo3 == $acuan_lo3 && $xi_lo4 == $acuan_lo4 && $xi_lo5 == $acuan_lo5 && $xi_lo6 == $acuan_lo6 && $xi_lo7 == $acuan_lo7) {
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, 1, $id_partikel, 0, 0, $xi_lo1, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
        }

        //proses transposisi setiap lo; dimulai dari LO1
        if ($acuan_lo1 == $xi_lo1) {
            $acuan_lo1 = $xi_lo1;
        } elseif ($acuan_lo1 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 2, $xi_lo2, $xi_lo1,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6,$xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo2;
            $xi_lo1 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 3, $xi_lo3, $xi_lo2,$xi_lo1, $xi_lo4, $xi_lo5, $xi_lo6,$xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo3;
            $xi_lo1 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 4, $xi_lo4, $xi_lo2,$xi_lo3, $xi_lo1, $xi_lo5, $xi_lo6,$xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo4;
            $xi_lo1 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 5, $xi_lo5, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo1, $xi_lo6,$xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo5;
            $xi_lo1 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 6, $xi_lo6, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo1,$xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo6;
            $xi_lo1 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 7, $xi_lo7, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6,$xi_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo7;
            $xi_lo1 = $tukar_b;
            $xi_lo7 = $tukar_a;
        }

        //cek LO2
        if ($acuan_lo2 == $xi_lo2) {
            $acuan_lo2 = $xi_lo2;
        } elseif ($acuan_lo2 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 3, $xi_lo1, $xi_lo3 , $xi_lo2, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo3;
            $xi_lo2 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 4, $xi_lo1, $xi_lo4 , $xi_lo3, $xi_lo2, $xi_lo5, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo4;
            $xi_lo2 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 5, $xi_lo1, $xi_lo5 , $xi_lo3, $xi_lo4, $xi_lo2, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo5;
            $xi_lo2 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 6, $xi_lo1, $xi_lo6 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo2, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo6;
            $xi_lo2 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 7, $xi_lo1, $xi_lo7 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo7;
            $xi_lo2 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 1, $xi_lo2, $xi_lo1 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo1;
            $xi_lo2 = $tukar_b;
            $xi_lo1 = $tukar_a;
        }

        //cek LO3
        if ($acuan_lo3 == $xi_lo3) {
            $acuan_lo3 = $xi_lo3;
        } elseif ($acuan_lo3 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 4, $xi_lo1, $xi_lo2 , $xi_lo4, $xi_lo3, $xi_lo5, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo4;
            $xi_lo3 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 5, $xi_lo1, $xi_lo2 , $xi_lo5, $xi_lo4, $xi_lo3, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo5;
            $xi_lo3 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 6, $xi_lo1, $xi_lo2 , $xi_lo6, $xi_lo4, $xi_lo5, $xi_lo3, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo6;
            $xi_lo3 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 7, $xi_lo1, $xi_lo2 , $xi_lo7, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo7;
            $xi_lo3 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 1, $xi_lo3, $xi_lo2 , $xi_lo1, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo1;
            $xi_lo3 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 2, $xi_lo1, $xi_lo3 , $xi_lo2, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo2;
            $xi_lo3 = $tukar_b;
            $xi_lo2 = $tukar_a;
        }

        //cek LO4
        if ($acuan_lo4 == $xi_lo4) {
            $acuan_lo4 = $xi_lo4;
        } elseif ($acuan_lo4 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo5, $xi_lo4, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo5;
            $xi_lo4 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo6, $xi_lo5, $xi_lo4, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo6;
            $xi_lo4 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 7, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo7, $xi_lo5, $xi_lo6, $xi_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo7;
            $xi_lo4 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 1, $xi_lo4, $xi_lo2 , $xi_lo3, $xi_lo1, $xi_lo5, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo1;
            $xi_lo4 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 2, $xi_lo1, $xi_lo4 , $xi_lo3, $xi_lo2, $xi_lo5, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo2;
            $xi_lo4 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 3, $xi_lo1, $xi_lo2 , $xi_lo4, $xi_lo3, $xi_lo5, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo3;
            $xi_lo4 = $tukar_b;
            $xi_lo3 = $tukar_a;
        }

        if ($acuan_lo5 == $xi_lo5) {
            $acuan_lo5 = $xi_lo5;
        } elseif ($acuan_lo5 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo6, $xi_lo5, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo6;
            $xi_lo5 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 7, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo7, $xi_lo6, $xi_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo7;
            $xi_lo5 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 1, $xi_lo5, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo1, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo1;
            $xi_lo5 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 2, $xi_lo1, $xi_lo5 , $xi_lo3, $xi_lo4, $xi_lo2, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo2;
            $xi_lo5 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 3, $xi_lo1, $xi_lo2 , $xi_lo5, $xi_lo4, $xi_lo3, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo3;
            $xi_lo5 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo5, $xi_lo4, $xi_lo6, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo4;
            $xi_lo5 = $tukar_b;
            $xi_lo4 = $tukar_a;
        }

        if ($acuan_lo6 == $xi_lo6) {
            $acuan_lo6 = $xi_lo6;
        } elseif ($acuan_lo6 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 7, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo7, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo7;
            $xi_lo6 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 1, $xi_lo6, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo1, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo1;
            $xi_lo6 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 2, $xi_lo1, $xi_lo6 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo2, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo2;
            $xi_lo6 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 3, $xi_lo1, $xi_lo2 , $xi_lo5, $xi_lo4, $xi_lo5, $xi_lo3, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo3;
            $xi_lo6 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo6, $xi_lo5, $xi_lo4, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo4;
            $xi_lo6 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo6, $xi_lo5, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo5;
            $xi_lo6 = $tukar_b;
            $xi_lo5 = $tukar_a;
        }

        if ($acuan_lo7 == $xi_lo7) {
            $acuan_lo7 = $xi_lo7;
        } elseif ($acuan_lo7 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 1, $xi_lo7, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo1;
            $xi_lo7 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 2, $xi_lo1, $xi_lo7 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo2;
            $xi_lo7 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 3, $xi_lo1, $xi_lo2 , $xi_lo7, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo3;
            $xi_lo7 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo7, $xi_lo5, $xi_lo6, $xi_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo4;
            $xi_lo7 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo7, $xi_lo6, $xi_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo5;
            $xi_lo7 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo7, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo6;
            $xi_lo7 = $tukar_b;
            $xi_lo6 = $tukar_a;
        }
    } elseif ($cp == 3) {
        $langkah_ke = 0;
        $query_select = "SELECT * FROM partikel_pso_3 WHERE kode='xi' and id_partikel=$id_partikel and iterasi_ke = $iterasi_ke";
        $q_query_select = mysqli_query($koneksi, $query_select);
        if (mysqli_num_rows($q_query_select)) {
            while ($data_q = mysqli_fetch_assoc($q_query_select)) {
                $xi_lo1 = $data_q['lo1'];
                $xi_lo2 = $data_q['lo2'];
                $xi_lo3 = $data_q['lo3'];
                $xi_lo4 = $data_q['lo4'];
                $xi_lo5 = $data_q['lo5'];
                $xi_lo6 = $data_q['lo6'];
                $xi_lo7 = $data_q['lo7'];
                $xi_lo8 = $data_q['lo8'];
            }
        }

        //mencari langkah tertinggi dari transpos2
        $select = "SELECT * FROM transpos_ke_2 WHERE id_pbest=$id_partikel and iterasi_ke=$iterasi_ke and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $jumlah_langkah_acuan = $data_q['langkah_ke'];
            }
        }

        //mencari isi acuan
        $select = "SELECT * FROM transpos_ke_2 WHERE id_pbest=$id_partikel and iterasi_ke=$iterasi_ke and langkah_ke=$jumlah_langkah_acuan and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $acuan_lo1 = $data_q['lo1'];
                $acuan_lo2 = $data_q['lo2'];
                $acuan_lo3 = $data_q['lo3'];
                $acuan_lo4 = $data_q['lo4'];
                $acuan_lo5 = $data_q['lo5'];
                $acuan_lo6 = $data_q['lo6'];
                $acuan_lo7 = $data_q['lo7'];
                $acuan_lo8 = $data_q['lo8'];
            }
        }

        //cek jika data yg dibind merupakan gbest
        if ($xi_lo1 == $acuan_lo1 && $xi_lo2 == $acuan_lo2 && $xi_lo3 == $acuan_lo3 && $xi_lo4 == $acuan_lo4 && $xi_lo5 == $acuan_lo5 && $xi_lo6 == $acuan_lo6 && $xi_lo7 == $acuan_lo7  && $xi_lo8 == $acuan_lo8) {
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, 1, $id_partikel, 0, 0, $xi_lo1, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
        }

        //proses transposisi setiap lo; dimulai dari LO1
        if ($acuan_lo1 == $xi_lo1) {
            $acuan_lo1 = $xi_lo1;
        } elseif ($acuan_lo1 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 2, $xi_lo2, $xi_lo1,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6,$xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo2;
            $xi_lo1 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 3, $xi_lo3, $xi_lo2,$xi_lo1, $xi_lo4, $xi_lo5, $xi_lo6,$xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo3;
            $xi_lo1 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 4, $xi_lo4, $xi_lo2,$xi_lo3, $xi_lo1, $xi_lo5, $xi_lo6,$xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo4;
            $xi_lo1 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 5, $xi_lo5, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo1, $xi_lo6,$xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo5;
            $xi_lo1 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 6, $xi_lo6, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo1,$xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo6;
            $xi_lo1 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 7, $xi_lo7, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6,$xi_lo1, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo7;
            $xi_lo1 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo1 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 1, 8, $xi_lo8, $xi_lo2,$xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6,$xi_lo7, $xi_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo1;
            $tukar_b = $xi_lo8;
            $xi_lo1 = $tukar_b;
            $xi_lo8 = $tukar_a;
        }

        //cek LO2
        if ($acuan_lo2 == $xi_lo2) {
            $acuan_lo2 = $xi_lo2;
        } elseif ($acuan_lo2 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 3, $xi_lo1, $xi_lo3 , $xi_lo2, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo3;
            $xi_lo2 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 4, $xi_lo1, $xi_lo4 , $xi_lo3, $xi_lo2, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo4;
            $xi_lo2 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 5, $xi_lo1, $xi_lo5 , $xi_lo3, $xi_lo4, $xi_lo2, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo5;
            $xi_lo2 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 6, $xi_lo1, $xi_lo6 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo2, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo6;
            $xi_lo2 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 7, $xi_lo1, $xi_lo7 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo2, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo7;
            $xi_lo2 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 8, $xi_lo1, $xi_lo8 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo8;
            $xi_lo2 = $tukar_b;
            $xi_lo8 = $tukar_a;
        } elseif ($acuan_lo2 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 2, 1, $xi_lo2, $xi_lo1 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo2;
            $tukar_b = $xi_lo1;
            $xi_lo2 = $tukar_b;
            $xi_lo1 = $tukar_a;
        }

        //cek LO3
        if ($acuan_lo3 == $xi_lo3) {
            $acuan_lo3 = $xi_lo3;
        } elseif ($acuan_lo3 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 4, $xi_lo1, $xi_lo2 , $xi_lo4, $xi_lo3, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo4;
            $xi_lo3 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 5, $xi_lo1, $xi_lo2 , $xi_lo5, $xi_lo4, $xi_lo3, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo5;
            $xi_lo3 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 6, $xi_lo1, $xi_lo2 , $xi_lo6, $xi_lo4, $xi_lo5, $xi_lo3, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo6;
            $xi_lo3 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 7, $xi_lo1, $xi_lo2 , $xi_lo7, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo3, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo7;
            $xi_lo3 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 8, $xi_lo1, $xi_lo2 , $xi_lo8, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo8;
            $xi_lo3 = $tukar_b;
            $xi_lo8 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 1, $xi_lo3, $xi_lo2 , $xi_lo1, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo1;
            $xi_lo3 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo3 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 3, 2, $xi_lo1, $xi_lo3 , $xi_lo2, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo3;
            $tukar_b = $xi_lo2;
            $xi_lo3 = $tukar_b;
            $xi_lo2 = $tukar_a;
        }

        //cek LO4
        if ($acuan_lo4 == $xi_lo4) {
            $acuan_lo4 = $xi_lo4;
        } elseif ($acuan_lo4 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo5, $xi_lo4, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo5;
            $xi_lo4 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo6, $xi_lo5, $xi_lo4, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo6;
            $xi_lo4 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 7, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo7, $xi_lo5, $xi_lo6, $xi_lo4, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo7;
            $xi_lo4 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 8, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo8, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo8;
            $xi_lo4 = $tukar_b;
            $xi_lo8 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 1, $xi_lo4, $xi_lo2 , $xi_lo3, $xi_lo1, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo1;
            $xi_lo4 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 2, $xi_lo1, $xi_lo4 , $xi_lo3, $xi_lo2, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo2;
            $xi_lo4 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo4 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 4, 3, $xi_lo1, $xi_lo2 , $xi_lo4, $xi_lo3, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo4;
            $tukar_b = $xi_lo3;
            $xi_lo4 = $tukar_b;
            $xi_lo3 = $tukar_a;
        }

        if ($acuan_lo5 == $xi_lo5) {
            $acuan_lo5 = $xi_lo5;
        } elseif ($acuan_lo5 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo6, $xi_lo5, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo6;
            $xi_lo5 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 7, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo7, $xi_lo6, $xi_lo5, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo7;
            $xi_lo5 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 8, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo8, $xi_lo6, $xi_lo7, $xi_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo8;
            $xi_lo5 = $tukar_b;
            $xi_lo8 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 1, $xi_lo5, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo1, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo1;
            $xi_lo5 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 2, $xi_lo1, $xi_lo5 , $xi_lo3, $xi_lo4, $xi_lo2, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo2;
            $xi_lo5 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 3, $xi_lo1, $xi_lo2 , $xi_lo5, $xi_lo4, $xi_lo3, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo3;
            $xi_lo5 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo5 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 5, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo5, $xi_lo4, $xi_lo6, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo5;
            $tukar_b = $xi_lo4;
            $xi_lo5 = $tukar_b;
            $xi_lo4 = $tukar_a;
        }

        if ($acuan_lo6 == $xi_lo6) {
            $acuan_lo6 = $xi_lo6;
        } elseif ($acuan_lo6 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 7, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo7, $xi_lo6, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo7;
            $xi_lo6 = $tukar_b;
            $xi_lo7 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 8, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo8, $xi_lo7, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo8;
            $xi_lo6 = $tukar_b;
            $xi_lo8 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 1, $xi_lo6, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo1, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo1;
            $xi_lo6 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 2, $xi_lo1, $xi_lo6 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo2, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo2;
            $xi_lo6 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 3, $xi_lo1, $xi_lo2 , $xi_lo5, $xi_lo4, $xi_lo5, $xi_lo3, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo3;
            $xi_lo6 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo6, $xi_lo5, $xi_lo4, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo4;
            $xi_lo6 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo6 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 6, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo6, $xi_lo5, $xi_lo7, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo6;
            $tukar_b = $xi_lo5;
            $xi_lo6 = $tukar_b;
            $xi_lo5 = $tukar_a;
        }

        if ($acuan_lo7 == $xi_lo7) {
            $acuan_lo7 = $xi_lo7;
        } elseif ($acuan_lo7 == $xi_lo8) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 8, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo8, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo8;
            $xi_lo7 = $tukar_b;
            $xi_lo8 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 1, $xi_lo7, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo1, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo1;
            $xi_lo7 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 2, $xi_lo1, $xi_lo7 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo2, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo2;
            $xi_lo7 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 3, $xi_lo1, $xi_lo2 , $xi_lo7, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo3, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo3;
            $xi_lo7 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo7, $xi_lo5, $xi_lo6, $xi_lo4, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo4;
            $xi_lo7 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo7, $xi_lo6, $xi_lo5, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo5;
            $xi_lo7 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo7 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 7, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo7, $xi_lo6, $xi_lo8, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo7;
            $tukar_b = $xi_lo6;
            $xi_lo7 = $tukar_b;
            $xi_lo6 = $tukar_a;
        }

        if ($acuan_lo8 == $xi_lo8) {
            $acuan_lo8 = $xi_lo8;
        } elseif ($acuan_lo8 == $xi_lo1) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 1, $xi_lo8, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo1, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo1;
            $xi_lo8 = $tukar_b;
            $xi_lo1 = $tukar_a;
        } elseif ($acuan_lo8 == $xi_lo2) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 2, $xi_lo1, $xi_lo8 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo2, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo2;
            $xi_lo8 = $tukar_b;
            $xi_lo2 = $tukar_a;
        } elseif ($acuan_lo8 == $xi_lo3) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 3, $xi_lo1, $xi_lo2 , $xi_lo8, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo3, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo3;
            $xi_lo8 = $tukar_b;
            $xi_lo3 = $tukar_a;
        } elseif ($acuan_lo8 == $xi_lo4) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 4, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo8, $xi_lo5, $xi_lo6, $xi_lo7, $xi_lo4, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo4;
            $xi_lo8 = $tukar_b;
            $xi_lo4 = $tukar_a;
        } elseif ($acuan_lo8 == $xi_lo5) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 5, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo8, $xi_lo6, $xi_lo7, $xi_lo5, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo5;
            $xi_lo8 = $tukar_b;
            $xi_lo5 = $tukar_a;
        } elseif ($acuan_lo8 == $xi_lo6) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 6, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo8, $xi_lo7, $xi_lo6, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo6;
            $xi_lo8 = $tukar_b;
            $xi_lo6 = $tukar_a;
        } elseif ($acuan_lo8 == $xi_lo7) {
            $langkah_ke = $langkah_ke + 1;
            $insert = "INSERT INTO transpos_ke_3(iterasi_ke,langkah_ke,id_pbest, posisi_awal,posisi_akhir,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8,kategori) VALUES ($iterasi_ke, $langkah_ke, $id_partikel, 8, 8, $xi_lo1, $xi_lo2 , $xi_lo3, $xi_lo4, $xi_lo5, $xi_lo6, $xi_lo8, $xi_lo7, $cp)";
            $q_insert = mysqli_query($koneksi, $insert);
            $tukar_a = $xi_lo8;
            $tukar_b = $xi_lo7;
            $xi_lo8 = $tukar_b;
            $xi_lo7 = $tukar_a;
        }
     }
}

function update_posisi($koneksi, $cp, $id_pbest, $iterasi_ke, $total_langkah)
{
    $iterasi_selanjutnya = $tukar_a = $tukar_b = 0;
    $xi_lo1 = $xi_lo2 = $xi_lo3 = $xi_lo4 = $xi_lo5 = $xi_lo6 = $xi_lo7 = $xi_lo8 = 0;
    $pbest_awal_lo1 = $pbest_awal_lo2 = $pbest_awal_lo3 = $pbest_awal_lo4 = $pbest_awal_lo5 = $pbest_awal_lo6 = $pbest_awal_lo7 = $pbest_awal_lo8 = 0;
    $hasil_t1_lo1 = $hasil_t1_lo2 = $hasil_t1_lo3 = $hasil_t1_lo4 = $hasil_t1_lo5 = $hasil_t1_lo6 = $hasil_t1_lo7 = $hasil_t1_lo8 = 0;

    $iterasi_selanjutnya = $iterasi_ke + 1;

    if ($cp == 0) {
        $select = "SELECT * FROM partikel_pso_0 WHERE iterasi_ke=$iterasi_ke and id_partikel=$id_pbest and kode='xi'";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $xi_lo1 = $data_q['lo1'];
                $xi_lo2 = $data_q['lo2'];
                $xi_lo3 = $data_q['lo3'];
                $xi_lo4 = $data_q['lo4'];
                $xi_lo5 = $data_q['lo5'];
                $xi_lo6 = $data_q['lo6'];
                $xi_lo7 = $data_q['lo7'];
                $xi_lo8 = $data_q['lo8'];
            }
        }

        for ($langkah_ke = 1; $langkah_ke <= $total_langkah; $langkah_ke++) {
            $posisi_awal = $posisi_akhir = 0;
            $select_posisi = "SELECT * FROM transpos_ke_3 WHERE iterasi_ke=$iterasi_ke and id_pbest=$id_pbest and langkah_ke=$langkah_ke and kategori=$cp";
            $q_select_posisi = mysqli_query($koneksi, $select_posisi);
            if (mysqli_num_rows($q_select_posisi)) {
                while ($data_z = mysqli_fetch_assoc($q_select_posisi)) {
                    $posisi_awal = $data_z['posisi_awal'];
                    $posisi_akhir = $data_z['posisi_akhir'];
                }
            }

            if ($xi_lo1 != 0 || $xi_lo2 != 0 || $xi_lo3 != 0 || $xi_lo4 != 0 || $xi_lo5 != 0 || $xi_lo6 != 0 || $xi_lo7 != 0 || $xi_lo8 != 0) {

                if ($posisi_awal == 1 && $posisi_akhir == 1) { } elseif ($posisi_awal == 1 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo2;
                    $xi_lo1 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo3;
                    $xi_lo1 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo4;
                    $xi_lo1 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo5;
                    $xi_lo1 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo6;
                    $xi_lo1 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo7;
                    $xi_lo1 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo8;
                    $xi_lo1 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                }

                if ($posisi_awal == 2 && $posisi_akhir == 2) { } elseif ($posisi_awal == 2 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo3;
                    $xi_lo2 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo4;
                    $xi_lo2 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo5;
                    $xi_lo2 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo6;
                    $xi_lo2 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo7;
                    $xi_lo2 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo8;
                    $xi_lo2 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo1;
                    $xi_lo2 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                }

                if ($posisi_awal == 3 && $posisi_akhir == 3) { } elseif ($posisi_awal == 3 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo4;
                    $xi_lo3 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo5;
                    $xi_lo3 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo6;
                    $xi_lo3 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo7;
                    $xi_lo3 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo8;
                    $xi_lo3 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo1;
                    $xi_lo3 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo2;
                    $xi_lo3 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                }

                if ($posisi_awal == 4 && $posisi_akhir == 4) { } elseif ($posisi_awal == 4 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo5;
                    $xi_lo4 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo6;
                    $xi_lo4 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo7;
                    $xi_lo4 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo8;
                    $xi_lo4 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo1;
                    $xi_lo4 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo2;
                    $xi_lo4 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo3;
                    $xi_lo4 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                }

                if ($posisi_awal == 5 && $posisi_akhir == 5) { } elseif ($posisi_awal == 5 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo6;
                    $xi_lo5 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo7;
                    $xi_lo5 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo8;
                    $xi_lo5 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo1;
                    $xi_lo5 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo2;
                    $xi_lo5 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo3;
                    $xi_lo5 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo4;
                    $xi_lo5 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                }

                if ($posisi_awal == 6 && $posisi_akhir == 6) { } elseif ($posisi_awal == 6 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo7;
                    $xi_lo6 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo8;
                    $xi_lo6 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo1;
                    $xi_lo6 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo2;
                    $xi_lo6 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo3;
                    $xi_lo6 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo4;
                    $xi_lo6 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo5;
                    $xi_lo6 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                }

                if ($posisi_awal == 7 && $posisi_akhir == 7) { } elseif ($posisi_awal == 7 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo8;
                    $xi_lo7 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo1;
                    $xi_lo7 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo2;
                    $xi_lo7 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo3;
                    $xi_lo7 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo4;
                    $xi_lo7 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo5;
                    $xi_lo7 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo6;
                    $xi_lo7 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                }

                if ($posisi_awal == 8 && $posisi_akhir == 8) { } elseif ($posisi_awal == 8 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo1;
                    $xi_lo8 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo2;
                    $xi_lo8 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo3;
                    $xi_lo8 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo4;
                    $xi_lo8 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo5;
                    $xi_lo8 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo6;
                    $xi_lo8 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo7;
                    $xi_lo8 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                }
            }
        }
        $insert = "INSERT INTO partikel_pso_0(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES ('xi',$id_pbest,$iterasi_selanjutnya,$xi_lo1,$xi_lo2,$xi_lo3,$xi_lo4,$xi_lo5, $xi_lo6, $xi_lo7,$xi_lo8)";
        $q_insert = mysqli_query($koneksi, $insert);

        $insert = "INSERT INTO partikel_pso_0(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES ('v_update',$id_pbest,$iterasi_selanjutnya,$xi_lo1,$xi_lo2,$xi_lo3,$xi_lo4,$xi_lo5, $xi_lo6,$xi_lo7,$xi_lo8)";
        $q_insert = mysqli_query($koneksi, $insert);
    } elseif ($cp == 1) {
        $select = "SELECT * FROM partikel_pso_1 WHERE iterasi_ke=$iterasi_ke and id_partikel=$id_pbest and kode='xi'";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $xi_lo1 = $data_q['lo1'];
                $xi_lo2 = $data_q['lo2'];
                $xi_lo3 = $data_q['lo3'];
                $xi_lo4 = $data_q['lo4'];
                $xi_lo5 = $data_q['lo5'];
                $xi_lo6 = $data_q['lo6'];
            }
        }

        for ($langkah_ke = 1; $langkah_ke <= $total_langkah; $langkah_ke++) {
            $posisi_awal = $posisi_akhir = 0;
            $select_posisi = "SELECT * FROM transpos_ke_3 WHERE iterasi_ke=$iterasi_ke and id_pbest=$id_pbest and langkah_ke=$langkah_ke and kategori=$cp";
            $q_select_posisi = mysqli_query($koneksi, $select_posisi);
            if (mysqli_num_rows($q_select_posisi)) {
                while ($data_z = mysqli_fetch_assoc($q_select_posisi)) {
                    $posisi_awal = $data_z['posisi_awal'];
                    $posisi_akhir = $data_z['posisi_akhir'];
                }
            }

            if ($xi_lo1 != 0 || $xi_lo2 != 0 || $xi_lo3 != 0 || $xi_lo4 != 0 || $xi_lo5 != 0 || $xi_lo6 != 0) {

                if ($posisi_awal == 1 && $posisi_akhir == 1) { } elseif ($posisi_awal == 1 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo2;
                    $xi_lo1 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo3;
                    $xi_lo1 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo4;
                    $xi_lo1 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo5;
                    $xi_lo1 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo6;
                    $xi_lo1 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                }

                if ($posisi_awal == 2 && $posisi_akhir == 2) { } elseif ($posisi_awal == 2 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo3;
                    $xi_lo2 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo4;
                    $xi_lo2 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo5;
                    $xi_lo2 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo6;
                    $xi_lo2 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo1;
                    $xi_lo2 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                }

                if ($posisi_awal == 3 && $posisi_akhir == 3) { } elseif ($posisi_awal == 3 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo4;
                    $xi_lo3 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo5;
                    $xi_lo3 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo6;
                    $xi_lo3 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo1;
                    $xi_lo3 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo2;
                    $xi_lo3 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                }

                if ($posisi_awal == 4 && $posisi_akhir == 4) { } elseif ($posisi_awal == 4 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo5;
                    $xi_lo4 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo6;
                    $xi_lo4 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo1;
                    $xi_lo4 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo2;
                    $xi_lo4 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo3;
                    $xi_lo4 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                }

                if ($posisi_awal == 5 && $posisi_akhir == 5) { } elseif ($posisi_awal == 5 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo6;
                    $xi_lo5 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo1;
                    $xi_lo5 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo2;
                    $xi_lo5 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo3;
                    $xi_lo5 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo4;
                    $xi_lo5 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                }

                if ($posisi_awal == 6 && $posisi_akhir == 6) { } elseif ($posisi_awal == 6 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo1;
                    $xi_lo6 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo2;
                    $xi_lo6 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo3;
                    $xi_lo6 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo4;
                    $xi_lo6 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo5;
                    $xi_lo6 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                }
            }
        }
        $insert = "INSERT INTO partikel_pso_1(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6) VALUES ('xi',$id_pbest,$iterasi_selanjutnya,$xi_lo1,$xi_lo2,$xi_lo3,$xi_lo4,$xi_lo5,$xi_lo6)";
        $q_insert = mysqli_query($koneksi, $insert);

        $insert = "INSERT INTO partikel_pso_1(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6) VALUES ('v_update',$id_pbest,$iterasi_selanjutnya,$xi_lo1,$xi_lo2,$xi_lo3,$xi_lo4,$xi_lo5,$xi_lo6)";
        $q_insert = mysqli_query($koneksi, $insert);
    } elseif ($cp == 2) {
        $select = "SELECT * FROM partikel_pso_2 WHERE iterasi_ke=$iterasi_ke and id_partikel=$id_pbest and kode='xi'";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $xi_lo1 = $data_q['lo1'];
                $xi_lo2 = $data_q['lo2'];
                $xi_lo3 = $data_q['lo3'];
                $xi_lo4 = $data_q['lo4'];
                $xi_lo5 = $data_q['lo5'];
                $xi_lo6 = $data_q['lo6'];
                $xi_lo7 = $data_q['lo7'];
            }
        }

        for ($langkah_ke = 1; $langkah_ke <= $total_langkah; $langkah_ke++) {
            $posisi_awal = $posisi_akhir = 0;
            $select_posisi = "SELECT * FROM transpos_ke_3 WHERE iterasi_ke=$iterasi_ke and id_pbest=$id_pbest and langkah_ke=$langkah_ke and kategori=$cp";
            $q_select_posisi = mysqli_query($koneksi, $select_posisi);
            if (mysqli_num_rows($q_select_posisi)) {
                while ($data_z = mysqli_fetch_assoc($q_select_posisi)) {
                    $posisi_awal = $data_z['posisi_awal'];
                    $posisi_akhir = $data_z['posisi_akhir'];
                }
            }

            if ($xi_lo1 != 0 || $xi_lo2 != 0 || $xi_lo3 != 0 || $xi_lo4 != 0 || $xi_lo5 != 0 || $xi_lo6 != 0 || $xi_lo7 != 0) {

                if ($posisi_awal == 1 && $posisi_akhir == 1) { } elseif ($posisi_awal == 1 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo2;
                    $xi_lo1 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo3;
                    $xi_lo1 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo4;
                    $xi_lo1 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo5;
                    $xi_lo1 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo6;
                    $xi_lo1 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo7;
                    $xi_lo1 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                }

                if ($posisi_awal == 2 && $posisi_akhir == 2) { } elseif ($posisi_awal == 2 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo3;
                    $xi_lo2 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo4;
                    $xi_lo2 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo5;
                    $xi_lo2 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo6;
                    $xi_lo2 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo7;
                    $xi_lo2 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo1;
                    $xi_lo2 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                }

                if ($posisi_awal == 3 && $posisi_akhir == 3) { } elseif ($posisi_awal == 3 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo4;
                    $xi_lo3 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo5;
                    $xi_lo3 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo6;
                    $xi_lo3 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo7;
                    $xi_lo3 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo1;
                    $xi_lo3 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo2;
                    $xi_lo3 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                }

                if ($posisi_awal == 4 && $posisi_akhir == 4) { } elseif ($posisi_awal == 4 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo5;
                    $xi_lo4 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo6;
                    $xi_lo4 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo7;
                    $xi_lo4 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo1;
                    $xi_lo4 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo2;
                    $xi_lo4 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo3;
                    $xi_lo4 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                }

                if ($posisi_awal == 5 && $posisi_akhir == 5) { } elseif ($posisi_awal == 5 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo6;
                    $xi_lo5 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo7;
                    $xi_lo5 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo1;
                    $xi_lo5 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo2;
                    $xi_lo5 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo3;
                    $xi_lo5 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo4;
                    $xi_lo5 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                }

                if ($posisi_awal == 6 && $posisi_akhir == 6) { } elseif ($posisi_awal == 6 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo7;
                    $xi_lo6 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo1;
                    $xi_lo6 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo2;
                    $xi_lo6 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo3;
                    $xi_lo6 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo4;
                    $xi_lo6 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo5;
                    $xi_lo6 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                }

                if ($posisi_awal == 7 && $posisi_akhir == 7) { } elseif ($posisi_awal == 7 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo1;
                    $xi_lo7 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo2;
                    $xi_lo7 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo3;
                    $xi_lo7 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo4;
                    $xi_lo7 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo5;
                    $xi_lo7 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo6;
                    $xi_lo7 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                }
            }
        }
        $insert = "INSERT INTO partikel_pso_2(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7) VALUES ('xi',$id_pbest,$iterasi_selanjutnya,$xi_lo1,$xi_lo2,$xi_lo3,$xi_lo4,$xi_lo5, $xi_lo6,$xi_lo7)";
        $q_insert = mysqli_query($koneksi, $insert);

        $insert = "INSERT INTO partikel_pso_2(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7) VALUES ('v_update',$id_pbest,$iterasi_selanjutnya,$xi_lo1,$xi_lo2,$xi_lo3,$xi_lo4,$xi_lo5, $xi_lo6,$xi_lo7)";
        $q_insert = mysqli_query($koneksi, $insert);
    } elseif ($cp == 3) {
        $select = "SELECT * FROM partikel_pso_3 WHERE iterasi_ke=$iterasi_ke and id_partikel=$id_pbest and kode='xi'";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $xi_lo1 = $data_q['lo1'];
                $xi_lo2 = $data_q['lo2'];
                $xi_lo3 = $data_q['lo3'];
                $xi_lo4 = $data_q['lo4'];
                $xi_lo5 = $data_q['lo5'];
                $xi_lo6 = $data_q['lo6'];
                $xi_lo7 = $data_q['lo7'];
                $xi_lo8 = $data_q['lo8'];
            }
        }

        for ($langkah_ke = 1; $langkah_ke <= $total_langkah; $langkah_ke++) {
            $posisi_awal = $posisi_akhir = 0;
            $select_posisi = "SELECT * FROM transpos_ke_3 WHERE iterasi_ke=$iterasi_ke and id_pbest=$id_pbest and langkah_ke=$langkah_ke and kategori=$cp";
            $q_select_posisi = mysqli_query($koneksi, $select_posisi);
            if (mysqli_num_rows($q_select_posisi)) {
                while ($data_z = mysqli_fetch_assoc($q_select_posisi)) {
                    $posisi_awal = $data_z['posisi_awal'];
                    $posisi_akhir = $data_z['posisi_akhir'];
                }
            }

            if ($xi_lo1 != 0 || $xi_lo2 != 0 || $xi_lo3 != 0 || $xi_lo4 != 0 || $xi_lo5 != 0 || $xi_lo6 != 0 || $xi_lo7 != 0 || $xi_lo8 != 0) {

                if ($posisi_awal == 1 && $posisi_akhir == 1) { } elseif ($posisi_awal == 1 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo2;
                    $xi_lo1 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo3;
                    $xi_lo1 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo4;
                    $xi_lo1 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo5;
                    $xi_lo1 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo6;
                    $xi_lo1 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo7;
                    $xi_lo1 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 1 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo1;
                    $tukar_b = $xi_lo8;
                    $xi_lo1 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                }

                if ($posisi_awal == 2 && $posisi_akhir == 2) { } elseif ($posisi_awal == 2 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo3;
                    $xi_lo2 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo4;
                    $xi_lo2 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo5;
                    $xi_lo2 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo6;
                    $xi_lo2 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo7;
                    $xi_lo2 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo8;
                    $xi_lo2 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                } elseif ($posisi_awal == 2 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo2;
                    $tukar_b = $xi_lo1;
                    $xi_lo2 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                }

                if ($posisi_awal == 3 && $posisi_akhir == 3) { } elseif ($posisi_awal == 3 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo4;
                    $xi_lo3 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo5;
                    $xi_lo3 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo6;
                    $xi_lo3 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo7;
                    $xi_lo3 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo8;
                    $xi_lo3 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo1;
                    $xi_lo3 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 3 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo3;
                    $tukar_b = $xi_lo2;
                    $xi_lo3 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                }

                if ($posisi_awal == 4 && $posisi_akhir == 4) { } elseif ($posisi_awal == 4 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo5;
                    $xi_lo4 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo6;
                    $xi_lo4 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo7;
                    $xi_lo4 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo8;
                    $xi_lo4 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo1;
                    $xi_lo4 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo2;
                    $xi_lo4 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 4 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo4;
                    $tukar_b = $xi_lo3;
                    $xi_lo4 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                }

                if ($posisi_awal == 5 && $posisi_akhir == 5) { } elseif ($posisi_awal == 5 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo6;
                    $xi_lo5 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo7;
                    $xi_lo5 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo8;
                    $xi_lo5 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo1;
                    $xi_lo5 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo2;
                    $xi_lo5 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo3;
                    $xi_lo5 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 5 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo5;
                    $tukar_b = $xi_lo4;
                    $xi_lo5 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                }

                if ($posisi_awal == 6 && $posisi_akhir == 6) { } elseif ($posisi_awal == 6 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo7;
                    $xi_lo6 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo8;
                    $xi_lo6 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo1;
                    $xi_lo6 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo2;
                    $xi_lo6 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo3;
                    $xi_lo6 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo4;
                    $xi_lo6 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 6 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo6;
                    $tukar_b = $xi_lo5;
                    $xi_lo6 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                }

                if ($posisi_awal == 7 && $posisi_akhir == 7) { } elseif ($posisi_awal == 7 && $posisi_akhir == 8) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo8;
                    $xi_lo7 = $tukar_b;
                    $xi_lo8 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo1;
                    $xi_lo7 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo2;
                    $xi_lo7 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo3;
                    $xi_lo7 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo4;
                    $xi_lo7 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo5;
                    $xi_lo7 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 7 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo7;
                    $tukar_b = $xi_lo6;
                    $xi_lo7 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                }

                if ($posisi_awal == 8 && $posisi_akhir == 8) { } elseif ($posisi_awal == 8 && $posisi_akhir == 1) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo1;
                    $xi_lo8 = $tukar_b;
                    $xi_lo1 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 2) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo2;
                    $xi_lo8 = $tukar_b;
                    $xi_lo2 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 3) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo3;
                    $xi_lo8 = $tukar_b;
                    $xi_lo3 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 4) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo4;
                    $xi_lo8 = $tukar_b;
                    $xi_lo4 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 5) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo5;
                    $xi_lo8 = $tukar_b;
                    $xi_lo5 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 6) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo6;
                    $xi_lo8 = $tukar_b;
                    $xi_lo6 = $tukar_a;
                } elseif ($posisi_awal == 8 && $posisi_akhir == 7) {
                    $tukar_a = $xi_lo8;
                    $tukar_b = $xi_lo7;
                    $xi_lo8 = $tukar_b;
                    $xi_lo7 = $tukar_a;
                }
            }
        }
        $insert = "INSERT INTO partikel_pso_3(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES ('xi',$id_pbest,$iterasi_selanjutnya,$xi_lo1,$xi_lo2,$xi_lo3,$xi_lo4,$xi_lo5, $xi_lo6, $xi_lo7,$xi_lo8)";
        $q_insert = mysqli_query($koneksi, $insert);

        $insert = "INSERT INTO partikel_pso_3(kode,id_partikel,iterasi_ke,lo1,lo2,lo3,lo4,lo5,lo6,lo7,lo8) VALUES ('v_update',$id_pbest,$iterasi_selanjutnya,$xi_lo1,$xi_lo2,$xi_lo3,$xi_lo4,$xi_lo5, $xi_lo6,$xi_lo7,$xi_lo8)";
        $q_insert = mysqli_query($koneksi, $insert);
    }
}

function update_kecepatan($koneksi, $cp, $iterasi_ke, $total_data)
{
    $v_lo1 = $v_lo2 = $v_lo3 = $v_lo4 = $v_lo5 = $v_lo6 = $v_lo7 = $v_lo8 = 0;
    $pbest_lo1 = $pbest_lo2 = $pbest_lo3 = $pbest_lo4 = $pbest_lo5 = $pbest_lo6 = $pbest_lo7 = $pbest_lo8 = 0;
    $gbest_lo1 = $gbest_lo2 = $gbest_lo3 = $gbest_lo4 = $gbest_lo5 = $gbest_lo6 = $gbest_lo7 = $gbest_lo8 = 0;
    $v_update_lo1 = $v_update_lo2 = $v_update_lo3 = $v_update_lo4 = $v_update_lo5 = $v_update_lo6 = $v_update_lo7 = $v_update_lo8 = 0;
    $v_lo1 = $v_lo2 = $v_lo3 = $v_lo4 = $v_lo5 = $v_lo6 = $v_lo7 = $v_lo8 = 0;
    $xi_lo1 = $xi_lo2 = $xi_lo3 = $xi_lo4 = $xi_lo5 = $xi_lo6 = $xi_lo7 = $xi_lo8 = 0;
    $sig_lo1 = $sig_lo2 = $sig_lo3 = $sig_lo4 = $sig_lo5 = $sig_lo6 = $sig_lo7 = $sig_lo8 = 0;
    $rand_lo1 = $rand_lo2 = $rand_lo3 = $rand_lo4 = $rand_lo5 = $rand_lo6 = $rand_lo7 = $rand_lo8 = 0;

    $iterasi_sebelumnya = 0;
    $iterasi_sebelumnya = $iterasi_ke - 1;

    if ($cp == 0) { } elseif ($cp == 1) {
        for ($id_partikel = 1; $id_partikel <= $total_data; $id_partikel++) {
            //mencari kecepatan dari LO iterasi sebelumnya per partikel
            $select_v = "SELECT * FROM partikel_pso_1 WHERE kode='v_update' and iterasi_ke=$iterasi_sebelumnya and id_partikel=$id_partikel";
            $q_select_v = mysqli_query($koneksi, $select_v);
            if (mysqli_num_rows($q_select_v)) {
                while ($data_q = mysqli_fetch_assoc($q_select_v)) {
                    $v_lo1 = $data_q['v_pso6_lo1'];
                    $v_lo2 = $data_q['v_pso6_lo2'];
                    $v_lo3 = $data_q['v_pso6_lo3'];
                    $v_lo4 = $data_q['v_pso6_lo4'];
                    $v_lo5 = $data_q['v_pso6_lo5'];
                    $v_lo6 = $data_q['v_pso6_lo6'];
                }
            }

            //mencari pbest untuk iterasi sebelumnya
            $select_v = "SELECT * FROM partikel_pso_1 WHERE kode='pbest' and iterasi_ke=$iterasi_sebelumnya and id_partikel=$id_partikel";
            $q_select_v = mysqli_query($koneksi, $select_v);
            if (mysqli_num_rows($q_select_v)) {
                while ($data_q = mysqli_fetch_assoc($q_select_v)) {
                    $v_lo1 = $data_q['v_pso6_lo1'];
                    $v_lo2 = $data_q['v_pso6_lo2'];
                    $v_lo3 = $data_q['v_pso6_lo3'];
                    $v_lo4 = $data_q['v_pso6_lo4'];
                    $v_lo5 = $data_q['v_pso6_lo5'];
                    $v_lo6 = $data_q['v_pso6_lo6'];
                }
            }
        }
    } elseif ($cp == 2) { } elseif ($cp == 3) { }
}


function pembulatan($value, $digit)
{
    $bil_bulat = intval($value * pow(10, $digit) + 0.5) / pow(10, $digit);
    return $bil_bulat;
}

function cari_kecepatan_awal($data_ke, $iterasi_ke, $cp, $koneksi)
{
    $kecepatan = $total_langkah = 0;

    if ($cp == 0) {
        $select = "SELECT MAX(langkah_ke) as a from transpos_ke_1 WHERE id_pbest=$data_ke and iterasi_ke=$iterasi_ke and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $total_langkah = $data_q['a'];
            }
        }

        $kecepatan = $total_langkah * 0.5;
        $kecepatan = pembulatan($kecepatan, 0);
        return $kecepatan;
    } elseif ($cp == 1) {
        $select = "SELECT MAX(langkah_ke) as a from transpos_ke_1 WHERE id_pbest=$data_ke and iterasi_ke=$iterasi_ke and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $total_langkah = $data_q['a'];
            }
        }

        $kecepatan = $total_langkah * 0.5;
        $kecepatan = pembulatan($kecepatan, 0);
        return $kecepatan;
    } elseif ($cp == 2) {
        $select = "SELECT MAX(langkah_ke) as a from transpos_ke_1 WHERE id_pbest=$data_ke and iterasi_ke=$iterasi_ke and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $total_langkah = $data_q['a'];
            }
        }

        $kecepatan = $total_langkah * 0.5;
        $kecepatan = pembulatan($kecepatan, 0);
        return $kecepatan;
    } elseif ($cp == 3) {
        $select = "SELECT MAX(langkah_ke) as a from transpos_ke_1 WHERE id_pbest=$data_ke and iterasi_ke=$iterasi_ke and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $total_langkah = $data_q['a'];
            }
        }

        $kecepatan = $total_langkah * 0.5;
        $kecepatan = pembulatan($kecepatan, 0);
        return $kecepatan;
    }
}

function cari_kecepatan_baru($data_ke, $iterasi_ke, $cp, $koneksi)
{
    $kecepatan = $total_langkah = $iterasi_sebelumnya = $langkah_sebelumnya = 0;
    $iterasi_sebelumnya = $iterasi_ke - 1;

    if ($cp == 0) {
        $select = "SELECT MAX(langkah_ke) as a from transpos_ke_3 WHERE id_pbest=$data_ke and iterasi_ke=$iterasi_ke and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $total_langkah = $data_q['a'];
            }
        }

        if ($iterasi_ke == 0) {
            $kecepatan = $total_langkah;
        } else {
            $select = "SELECT MAX(langkah_ke) as a from transpos_ke_3 WHERE id_pbest=$data_ke and iterasi_ke=$iterasi_sebelumnya and kategori=$cp";
            $q_select = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($q_select)) {
                while ($data_q = mysqli_fetch_assoc($q_select)) {
                    $langkah_sebelumnya = $data_q['a'];
                }
            }
            $kecepatan = $total_langkah;
        }
        return $kecepatan;
    } elseif ($cp == 1) {
        $select = "SELECT MAX(langkah_ke) as a from transpos_ke_3 WHERE id_pbest=$data_ke and iterasi_ke=$iterasi_ke and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $total_langkah = $data_q['a'];
            }
        }

        if ($iterasi_ke == 0) {
            $kecepatan = $total_langkah;
        } else {
            $select = "SELECT MAX(langkah_ke) as a from transpos_ke_3 WHERE id_pbest=$data_ke and iterasi_ke=$iterasi_sebelumnya and kategori=$cp";
            $q_select = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($q_select)) {
                while ($data_q = mysqli_fetch_assoc($q_select)) {
                    $langkah_sebelumnya = $data_q['a'];
                }
            }
            $kecepatan = $total_langkah;
        }
        return $kecepatan;
    } elseif ($cp == 2) {
        $select = "SELECT MAX(langkah_ke) as a from transpos_ke_3 WHERE id_pbest=$data_ke and iterasi_ke=$iterasi_ke and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $total_langkah = $data_q['a'];
            }
        }

        if ($iterasi_ke == 0) {
            $kecepatan = $total_langkah;
        } else {
            $select = "SELECT MAX(langkah_ke) as a from transpos_ke_3 WHERE id_pbest=$data_ke and iterasi_ke=$iterasi_sebelumnya and kategori=$cp";
            $q_select = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($q_select)) {
                while ($data_q = mysqli_fetch_assoc($q_select)) {
                    $langkah_sebelumnya = $data_q['a'];
                }
            }
            $kecepatan = $total_langkah;
        }
        return $kecepatan;
    } elseif ($cp == 3) {
        $select = "SELECT MAX(langkah_ke) as a from transpos_ke_3 WHERE id_pbest=$data_ke and iterasi_ke=$iterasi_ke and kategori=$cp";
        $q_select = mysqli_query($koneksi, $select);
        if (mysqli_num_rows($q_select)) {
            while ($data_q = mysqli_fetch_assoc($q_select)) {
                $total_langkah = $data_q['a'];
            }
        }

        if ($iterasi_ke == 0) {
            $kecepatan = $total_langkah;
        } else {
            $select = "SELECT MAX(langkah_ke) as a from transpos_ke_3 WHERE id_pbest=$data_ke and iterasi_ke=$iterasi_sebelumnya and kategori=$cp";
            $q_select = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($q_select)) {
                while ($data_q = mysqli_fetch_assoc($q_select)) {
                    $langkah_sebelumnya = $data_q['a'];
                }
            }
            $kecepatan = $total_langkah;
        }
        return $kecepatan;
    }
}

function update_pbest($koneksi, $cp, $iterasi_ke, $total_data)
{
    $kode = $nilai_cw = $unlo = $unlo_baru = $a = $b = 0;
    $kode_baru = $nilai_cw_baru = $unlo_baru = $unlo_baru_baru = $a_baru = $b_baru = 0;
    $fitness = $fitness_baru = 0;
    $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $lo8 = 0;
    $lo1_baru = $lo2_baru = $lo3_baru = $lo4_baru = $lo5_baru = $lo6_baru = $lo7_baru = $lo8_baru = 0;
    $v_lo1 = $v_lo2 = $v_lo3 = $v_lo4 = $v_lo5 = $v_lo6 = $v_lo7 = $v_lo8 = 0;
    $v_lo1_baru = $v_lo2_baru = $v_lo3_baru = $v_lo4_baru = $v_lo5_baru = $v_lo6_baru = $v_lo7_baru = $v_lo8_baru = 0;

    $iterasi_sebelumnya = $iterasi_baru = 0;
    $iterasi_sebelumnya = $iterasi_ke - 1;


    if ($cp == 0) {
        //mencari data pbest dan fitness di iterasi sebelumnya
        for ($id_partikel = 1; $id_partikel <= $total_data; $id_partikel++) {
            $select = "SELECT * FROM partikel_pso_0 WHERE iterasi_ke=$iterasi_sebelumnya and kode='pbest' and id_partikel=$id_partikel";
            $q_select = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($q_select)) {
                while ($data_z = mysqli_fetch_assoc($q_select)) {
                    $iterasi_sebelumnya = $data_z['iterasi_ke'];
                    $lo1 = $data_z['lo1'];
                    $lo2 = $data_z['lo2'];
                    $lo3 = $data_z['lo3'];
                    $lo4 = $data_z['lo4'];
                    $lo5 = $data_z['lo5'];
                    $lo6 = $data_z['lo6'];
                    $lo7 = $data_z['lo7'];
                    $lo8 = $data_z['lo8'];
                    $fitness = $data_z['fitness_pso_0'];
                    $a = $data_z['pso0_a'];
                    $b = $data_z['pso0_b'];
                    $nilai_cw = $data_z['pso0_cw'];
                    $unlo = $data_z['pso0_unlo'];
                    $kode = $data_z['kode'];

                    $v_lo1 = $data_z['v_pso0_lo1'];
                    $v_lo2 = $data_z['v_pso0_lo2'];
                    $v_lo3 = $data_z['v_pso0_lo3'];
                    $v_lo4 = $data_z['v_pso0_lo4'];
                    $v_lo5 = $data_z['v_pso0_lo5'];
                    $v_lo6 = $data_z['v_pso0_lo6'];
                    $v_lo7 = $data_z['v_pso0_lo7'];
                    $v_lo8 = $data_z['v_pso0_lo8'];
                }
            }

            //mencari data pbest dan fitness di iterasi saat ini 
            $select = "SELECT * FROM partikel_pso_0 WHERE iterasi_ke=$iterasi_ke and kode='pbest' and id_partikel=$id_partikel";
            $q_select = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($q_select)) {
                while ($data_z = mysqli_fetch_assoc($q_select)) {
                    $iterasi_baru = $data_z['iterasi_ke'];
                    $lo1_baru = $data_z['lo1'];
                    $lo2_baru = $data_z['lo2'];
                    $lo3_baru = $data_z['lo3'];
                    $lo4_baru = $data_z['lo4'];
                    $lo5_baru = $data_z['lo5'];
                    $lo6_baru = $data_z['lo6'];
                    $lo7_baru = $data_z['lo7'];
                    $lo8_baru = $data_z['lo8'];
                    $fitness_baru = $data_z['fitness_pso_0'];
                    $a_baru = $data_z['pso0_a'];
                    $b_baru = $data_z['pso0_b'];
                    $nilai_cw_baru = $data_z['pso0_cw'];
                    $unlo_baru = $data_z['pso0_unlo'];
                    $kode_baru = $data_z['kode'];
                }
            }

            // echo "<br>hasil fitness : $fitness";
            // echo "<br>hasil fitness baru : $fitness_baru";

            if ($fitness > $fitness_baru) {
                $update = "UPDATE partikel_pso_0 SET kode='$kode', id_partikel=$id_partikel, iterasi_ke=$iterasi_ke, lo1=$lo1,lo2=$lo2,lo3=$lo3,lo4=$lo4,lo5=$lo5,lo6=$lo6,lo7=$lo7,lo8=$lo8,fitness_pso_0=$fitness,pso0_cw=$nilai_cw,pso0_a=$a,pso0_b=$b,pso0_unlo=$unlo,v_pso0_lo1=$v_lo1,v_pso0_lo2=$v_lo2,v_pso0_lo3=$v_lo3,v_pso0_lo4=$v_lo4,v_pso0_lo5=$v_lo5,v_pso0_lo6= $v_lo6,v_pso0_lo7=$v_lo7,v_pso0_lo8=$v_lo8 WHERE iterasi_ke=$iterasi_ke and kode='pbest' and id_partikel=$id_partikel";
                mysqli_query($koneksi, $update);
            }
        }
    } elseif ($cp == 1) {

        //mencari data pbest dan fitness di iterasi sebelumnya
        for ($id_partikel = 1; $id_partikel <= $total_data; $id_partikel++) {
            $select = "SELECT * FROM partikel_pso_1 WHERE iterasi_ke=$iterasi_sebelumnya and kode='pbest' and id_partikel=$id_partikel";
            $q_select = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($q_select)) {
                while ($data_z = mysqli_fetch_assoc($q_select)) {
                    $iterasi_sebelumnya = $data_z['iterasi_ke'];
                    $lo1 = $data_z['lo1'];
                    $lo2 = $data_z['lo2'];
                    $lo3 = $data_z['lo3'];
                    $lo4 = $data_z['lo4'];
                    $lo5 = $data_z['lo5'];
                    $lo6 = $data_z['lo6'];
                    $fitness = $data_z['fitness_pso_6'];
                    $a = $data_z['pso6_a'];
                    $b = $data_z['pso6_b'];
                    $nilai_cw = $data_z['pso6_cw'];
                    $unlo = $data_z['pso6_unlo'];
                    $kode = $data_z['kode'];

                    $v_lo1 = $data_z['v_pso6_lo1'];
                    $v_lo2 = $data_z['v_pso6_lo2'];
                    $v_lo3 = $data_z['v_pso6_lo3'];
                    $v_lo4 = $data_z['v_pso6_lo4'];
                    $v_lo5 = $data_z['v_pso6_lo5'];
                    $v_lo6 = $data_z['v_pso6_lo6'];
                }
            }

            //mencari data pbest dan fitness di iterasi saat ini 
            $select = "SELECT * FROM partikel_pso_1 WHERE iterasi_ke=$iterasi_ke and kode='pbest' and id_partikel=$id_partikel";
            $q_select = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($q_select)) {
                while ($data_z = mysqli_fetch_assoc($q_select)) {
                    $iterasi_baru = $data_z['iterasi_ke'];
                    $lo1_baru = $data_z['lo1'];
                    $lo2_baru = $data_z['lo2'];
                    $lo3_baru = $data_z['lo3'];
                    $lo4_baru = $data_z['lo4'];
                    $lo5_baru = $data_z['lo5'];
                    $lo6_baru = $data_z['lo6'];
                    $fitness_baru = $data_z['fitness_pso_6'];
                    $a_baru = $data_z['pso6_a'];
                    $b_baru = $data_z['pso6_b'];
                    $nilai_cw_baru = $data_z['pso6_cw'];
                    $unlo_baru = $data_z['pso6_unlo'];
                    $kode_baru = $data_z['kode'];
                }
            }

            // echo "<br>hasil fitness : $fitness";
            // echo "<br>hasil fitness baru : $fitness_baru";

            if ($fitness > $fitness_baru) {
                $update = "UPDATE partikel_pso_1 SET kode='$kode', id_partikel=$id_partikel, iterasi_ke=$iterasi_ke, lo1=$lo1,lo2=$lo2,lo3=$lo3,lo4=$lo4,lo5=$lo5,lo6=$lo6,fitness_pso_6=$fitness,pso6_cw=$nilai_cw,pso6_a=$a,pso6_b=$b,pso6_unlo=$unlo,v_pso6_lo1=$v_lo1,v_pso6_lo2=$v_lo2,v_pso6_lo3=$v_lo3,v_pso6_lo4=$v_lo4,v_pso6_lo5=$v_lo5,v_pso6_lo6=$v_lo6 WHERE iterasi_ke=$iterasi_ke and kode='pbest' and id_partikel=$id_partikel";
                mysqli_query($koneksi, $update);
            }
        }
    } elseif ($cp == 2) {
        //mencari data pbest dan fitness di iterasi sebelumnya
        for ($id_partikel = 1; $id_partikel <= $total_data; $id_partikel++) {
            $select = "SELECT * FROM partikel_pso_2 WHERE iterasi_ke=$iterasi_sebelumnya and kode='pbest' and id_partikel=$id_partikel";
            $q_select = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($q_select)) {
                while ($data_z = mysqli_fetch_assoc($q_select)) {
                    $iterasi_sebelumnya = $data_z['iterasi_ke'];
                    $lo1 = $data_z['lo1'];
                    $lo2 = $data_z['lo2'];
                    $lo3 = $data_z['lo3'];
                    $lo4 = $data_z['lo4'];
                    $lo5 = $data_z['lo5'];
                    $lo6 = $data_z['lo6'];
                    $lo7 = $data_z['lo7'];
                    $fitness = $data_z['fitness_pso_7'];
                    $a = $data_z['pso7_a'];
                    $b = $data_z['pso7_b'];
                    $nilai_cw = $data_z['pso7_cw'];
                    $unlo = $data_z['pso7_unlo'];
                    $kode = $data_z['kode'];

                    $v_lo1 = $data_z['v_pso7_lo1'];
                    $v_lo2 = $data_z['v_pso7_lo2'];
                    $v_lo3 = $data_z['v_pso7_lo3'];
                    $v_lo4 = $data_z['v_pso7_lo4'];
                    $v_lo5 = $data_z['v_pso7_lo5'];
                    $v_lo6 = $data_z['v_pso7_lo6'];
                    $v_lo7 = $data_z['v_pso7_lo7'];
                }
            }

            //mencari data pbest dan fitness di iterasi saat ini 
            $select = "SELECT * FROM partikel_pso_2 WHERE iterasi_ke=$iterasi_ke and kode='pbest' and id_partikel=$id_partikel";
            $q_select = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($q_select)) {
                while ($data_z = mysqli_fetch_assoc($q_select)) {
                    $iterasi_baru = $data_z['iterasi_ke'];
                    $lo1_baru = $data_z['lo1'];
                    $lo2_baru = $data_z['lo2'];
                    $lo3_baru = $data_z['lo3'];
                    $lo4_baru = $data_z['lo4'];
                    $lo5_baru = $data_z['lo5'];
                    $lo6_baru = $data_z['lo6'];
                    $lo7_baru = $data_z['lo7'];
                    $fitness_baru = $data_z['fitness_pso_7'];
                    $a_baru = $data_z['pso7_a'];
                    $b_baru = $data_z['pso7_b'];
                    $nilai_cw_baru = $data_z['pso7_cw'];
                    $unlo_baru = $data_z['pso7_unlo'];
                    $kode_baru = $data_z['kode'];
                }
            }

            // echo "<br>hasil fitness : $fitness";
            // echo "<br>hasil fitness baru : $fitness_baru";

            if ($fitness > $fitness_baru) {
                $update = "UPDATE partikel_pso_2 SET kode='$kode', id_partikel=$id_partikel, iterasi_ke=$iterasi_ke, lo1=$lo1,lo2=$lo2,lo3=$lo3,lo4=$lo4,lo5=$lo5,lo6=$lo6,lo7=$lo7,fitness_pso_7=$fitness,pso7_cw=$nilai_cw,pso7_a=$a,pso7_b=$b,pso7_unlo=$unlo,v_pso7_lo1=$v_lo1,v_pso7_lo2=$v_lo2,v_pso7_lo3=$v_lo3,v_pso7_lo4=$v_lo4,v_pso7_lo5=$v_lo5,v_pso7_lo6= $v_lo6,v_pso7_lo7=$v_lo7 WHERE iterasi_ke=$iterasi_ke and kode='pbest' and id_partikel=$id_partikel";
                mysqli_query($koneksi, $update);
            }
        }
    } elseif ($cp == 3) {
        //mencari data pbest dan fitness di iterasi sebelumnya
        for ($id_partikel = 1; $id_partikel <= $total_data; $id_partikel++) {
            $select = "SELECT * FROM partikel_pso_3 WHERE iterasi_ke=$iterasi_sebelumnya and kode='pbest' and id_partikel=$id_partikel";
            $q_select = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($q_select)) {
                while ($data_z = mysqli_fetch_assoc($q_select)) {
                    $iterasi_sebelumnya = $data_z['iterasi_ke'];
                    $lo1 = $data_z['lo1'];
                    $lo2 = $data_z['lo2'];
                    $lo3 = $data_z['lo3'];
                    $lo4 = $data_z['lo4'];
                    $lo5 = $data_z['lo5'];
                    $lo6 = $data_z['lo6'];
                    $lo7 = $data_z['lo7'];
                    $lo8 = $data_z['lo8'];
                    $fitness = $data_z['fitness_pso_8'];
                    $a = $data_z['pso8_a'];
                    $b = $data_z['pso8_b'];
                    $nilai_cw = $data_z['pso8_cw'];
                    $unlo = $data_z['pso8_unlo'];
                    $kode = $data_z['kode'];

                    $v_lo1 = $data_z['v_pso8_lo1'];
                    $v_lo2 = $data_z['v_pso8_lo2'];
                    $v_lo3 = $data_z['v_pso8_lo3'];
                    $v_lo4 = $data_z['v_pso8_lo4'];
                    $v_lo5 = $data_z['v_pso8_lo5'];
                    $v_lo6 = $data_z['v_pso8_lo6'];
                    $v_lo7 = $data_z['v_pso8_lo7'];
                    $v_lo8 = $data_z['v_pso8_lo8'];
                }
            }

            //mencari data pbest dan fitness di iterasi saat ini 
            $select = "SELECT * FROM partikel_pso_3 WHERE iterasi_ke=$iterasi_ke and kode='pbest' and id_partikel=$id_partikel";
            $q_select = mysqli_query($koneksi, $select);
            if (mysqli_num_rows($q_select)) {
                while ($data_z = mysqli_fetch_assoc($q_select)) {
                    $iterasi_baru = $data_z['iterasi_ke'];
                    $lo1_baru = $data_z['lo1'];
                    $lo2_baru = $data_z['lo2'];
                    $lo3_baru = $data_z['lo3'];
                    $lo4_baru = $data_z['lo4'];
                    $lo5_baru = $data_z['lo5'];
                    $lo6_baru = $data_z['lo6'];
                    $lo7_baru = $data_z['lo7'];
                    $lo8_baru = $data_z['lo8'];
                    $fitness_baru = $data_z['fitness_pso_8'];
                    $a_baru = $data_z['pso8_a'];
                    $b_baru = $data_z['pso8_b'];
                    $nilai_cw_baru = $data_z['pso8_cw'];
                    $unlo_baru = $data_z['pso8_unlo'];
                    $kode_baru = $data_z['kode'];
                }
            }

            // echo "<br>hasil fitness : $fitness";
            // echo "<br>hasil fitness baru : $fitness_baru";

            if ($fitness > $fitness_baru) {
                $update = "UPDATE partikel_pso_3 SET kode='$kode', id_partikel=$id_partikel, iterasi_ke=$iterasi_ke, lo1=$lo1,lo2=$lo2,lo3=$lo3,lo4=$lo4,lo5=$lo5,lo6=$lo6,lo7=$lo7,lo8=$lo8,fitness_pso_8=$fitness,pso8_cw=$nilai_cw,pso8_a=$a,pso8_b=$b,pso8_unlo=$unlo,v_pso8_lo1=$v_lo1,v_pso8_lo2=$v_lo2,v_pso8_lo3=$v_lo3,v_pso8_lo4=$v_lo4,v_pso8_lo5=$v_lo5,v_pso8_lo6= $v_lo6,v_pso8_lo7=$v_lo7,v_pso8_lo8=$v_lo8 WHERE iterasi_ke=$iterasi_ke and kode='pbest' and id_partikel=$id_partikel";
                mysqli_query($koneksi, $update);
            }
        }
    }
}

function update_konstanta_cw($koneksi, $cp, $a, $b, $iterasi_ke, $total_data)
{
    if ($cp == 0) {
        for ($id_partikel = 1; $id_partikel <= $total_data; $id_partikel++) {
            $update = "UPDATE partikel_pso_0 SET pso0_a=$a, pso0_b=$b, pso0_unlo=0 WHERE kode='xi' and id_partikel=$id_partikel and iterasi_ke=$iterasi_ke";
            mysqli_query($koneksi, $update);

            $cmd_update = "UPDATE partikel_pso_0 SET v_pso0_lo1=0,v_pso0_lo2=0,v_pso0_lo3=0,v_pso0_lo4=0,v_pso0_lo5=0,v_pso0_lo6=0,v_pso0_lo7=0,v_pso0_lo8=0 WHERE iterasi_ke=" . $iterasi_ke;
            $cmd_update_ex = mysqli_query($koneksi, $cmd_update);
        }
    } elseif ($cp == 1) {
        for ($id_partikel = 1; $id_partikel <= $total_data; $id_partikel++) {
            $update = "UPDATE partikel_pso_1 SET pso6_a=$a, pso6_b=$b, pso6_unlo=2 WHERE kode='xi' and id_partikel=$id_partikel and iterasi_ke=$iterasi_ke";
            mysqli_query($koneksi, $update);

            $cmd_update = "UPDATE partikel_pso_1 SET v_pso6_lo1=0,v_pso6_lo2=0,v_pso6_lo3=0,v_pso6_lo4=0,v_pso6_lo5=0,v_pso6_lo6=0 WHERE iterasi_ke=" . $iterasi_ke;
            $cmd_update_ex = mysqli_query($koneksi, $cmd_update);
        }
    } elseif ($cp == 2) {
        for ($id_partikel = 1; $id_partikel <= $total_data; $id_partikel++) {
            $update = "UPDATE partikel_pso_2 SET pso7_a=$a, pso7_b=$b, pso7_unlo=1 WHERE kode='xi' and id_partikel=$id_partikel and iterasi_ke=$iterasi_ke";
            mysqli_query($koneksi, $update);

            $cmd_update = "UPDATE partikel_pso_2 SET pso7_a=$a, pso7_b=$b, pso7_unlo=1, v_pso7_lo1=0,v_pso7_lo2=0,v_pso7_lo3=0,v_pso7_lo4=0,v_pso7_lo5=0,v_pso7_lo6=0,v_pso7_lo7=0 WHERE iterasi_ke=" . $iterasi_ke;
            $cmd_update_ex = mysqli_query($koneksi, $cmd_update);
        }
    } elseif ($cp == 3) {
        for ($id_partikel = 1; $id_partikel <= $total_data; $id_partikel++) {
            $update = "UPDATE partikel_pso_3 SET pso8_a=$a, pso8_b=$b, pso8_unlo=0 WHERE kode='xi' and id_partikel=$id_partikel and iterasi_ke=$iterasi_ke";
            mysqli_query($koneksi, $update);

            $cmd_update = "UPDATE partikel_pso_3 SET pso8_a=$a, pso8_b=$b, pso8_unlo=0, v_pso8_lo1=0,v_pso8_lo2=0,v_pso8_lo3=0,v_pso8_lo4=0,v_pso8_lo5=0,v_pso8_lo6=0,v_pso8_lo7=0,v_pso8_lo8=0 WHERE iterasi_ke=" . $iterasi_ke;
            $cmd_update_ex = mysqli_query($koneksi, $cmd_update);
        }
    }
}

function tabel_pbest_gbest($koneksi, $cp, $total_iterasi)
{
    if ($cp == 0) {
        $iterasi_ke = $id_partikel = $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $lo8 = $cw = $fitness = 0;

        echo "<br>";
        echo "<h4>Tabel Hasil GBEST dengan $total_iterasi iterasi</h4>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Iterasi Ke</th>";
        echo "<th>ID Partikel</th>";
        echo "<th>LO 1</th>";
        echo "<th>LO 2</th>";
        echo "<th>LO 3</th>";
        echo "<th>LO 4</th>";
        echo "<th>LO 5</th>";
        echo "<th>LO 6</th>";
        echo "<th>LO 7</th>";
        echo "<th>LO 8</th>";
        echo "<th>Nilai CW</th>";
        echo "<th>Nilai Fitness</th>";
        echo "</tr>";

        for ($i = 0; $i <= $total_iterasi; $i++) {
            $select_gbest = "SELECT * FROM partikel_pso_0 WHERE kode='gbest' and iterasi_ke=$i";
            $q_select_gbest = mysqli_query($koneksi, $select_gbest);
            if (mysqli_num_rows($q_select_gbest)) {
                while ($data = mysqli_fetch_assoc($q_select_gbest)) {
                    $iterasi_ke = $data['iterasi_ke'];
                    $id_partikel = $data['id_partikel'];
                    $lo1 = $data['lo1'];
                    $lo2 = $data['lo2'];
                    $lo3 = $data['lo3'];
                    $lo4 = $data['lo4'];
                    $lo5 = $data['lo5'];
                    $lo6 = $data['lo6'];
                    $lo7 = $data['lo7'];
                    $lo8 = $data['lo8'];
                    $cw = $data['pso0_cw'];
                    $fitness = $data['fitness_pso_0'];

                    echo "<tr>";
                    echo "<td>$iterasi_ke</td>";
                    echo "<td>$id_partikel</td>";
                    echo "<td>$lo1</td>";
                    echo "<td>$lo2</td>";
                    echo "<td>$lo3</td>";
                    echo "<td>$lo4</td>";
                    echo "<td>$lo5</td>";
                    echo "<td>$lo6</td>";
                    echo "<td>$lo7</td>";
                    echo "<td>$lo8</td>";
                    echo "<td>$cw</td>";
                    echo "<td>$fitness</td>";
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
    } elseif ($cp == 1) {
        $iterasi_ke = $id_partikel = $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $cw = $fitness = 0;

        echo "<br>";
        echo "<h4>Tabel Hasil GBEST dengan $total_iterasi iterasi</h4>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Iterasi Ke</th>";
        echo "<th>ID Partikel</th>";
        echo "<th>LO 1</th>";
        echo "<th>LO 2</th>";
        echo "<th>LO 3</th>";
        echo "<th>LO 4</th>";
        echo "<th>LO 5</th>";
        echo "<th>LO 6</th>";
        echo "<th>Nilai CW</th>";
        echo "<th>Nilai Fitness</th>";
        echo "</tr>";

        for ($i = 0; $i <= $total_iterasi; $i++) {
            $select_gbest = "SELECT * FROM partikel_pso_1 WHERE kode='gbest' and iterasi_ke=$i";
            $q_select_gbest = mysqli_query($koneksi, $select_gbest);
            if (mysqli_num_rows($q_select_gbest)) {
                while ($data = mysqli_fetch_assoc($q_select_gbest)) {
                    $iterasi_ke = $data['iterasi_ke'];
                    $id_partikel = $data['id_partikel'];
                    $lo1 = $data['lo1'];
                    $lo2 = $data['lo2'];
                    $lo3 = $data['lo3'];
                    $lo4 = $data['lo4'];
                    $lo5 = $data['lo5'];
                    $lo6 = $data['lo6'];
                    $cw = $data['pso6_cw'];
                    $fitness = $data['fitness_pso_6'];

                    echo "<tr>";
                    echo "<td>$iterasi_ke</td>";
                    echo "<td>$id_partikel</td>";
                    echo "<td>$lo1</td>";
                    echo "<td>$lo2</td>";
                    echo "<td>$lo3</td>";
                    echo "<td>$lo4</td>";
                    echo "<td>$lo5</td>";
                    echo "<td>$lo6</td>";
                    echo "<td>$cw</td>";
                    echo "<td>$fitness</td>";
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
    } elseif ($cp == 2) {
        $iterasi_ke = $id_partikel = $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $cw = $fitness = 0;

        echo "<br>";
        echo "<h4>Tabel Hasil GBEST dengan $total_iterasi iterasi</h4>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Iterasi Ke</th>";
        echo "<th>ID Partikel</th>";
        echo "<th>LO 1</th>";
        echo "<th>LO 2</th>";
        echo "<th>LO 3</th>";
        echo "<th>LO 4</th>";
        echo "<th>LO 5</th>";
        echo "<th>LO 6</th>";
        echo "<th>LO 7</th>";
        echo "<th>Nilai CW</th>";
        echo "<th>Nilai Fitness</th>";
        echo "</tr>";

        for ($i = 0; $i <= $total_iterasi; $i++) {
            $select_gbest = "SELECT * FROM partikel_pso_2 WHERE kode='gbest' and iterasi_ke=$i";
            $q_select_gbest = mysqli_query($koneksi, $select_gbest);
            if (mysqli_num_rows($q_select_gbest)) {
                while ($data = mysqli_fetch_assoc($q_select_gbest)) {
                    $iterasi_ke = $data['iterasi_ke'];
                    $id_partikel = $data['id_partikel'];
                    $lo1 = $data['lo1'];
                    $lo2 = $data['lo2'];
                    $lo3 = $data['lo3'];
                    $lo4 = $data['lo4'];
                    $lo5 = $data['lo5'];
                    $lo6 = $data['lo6'];
                    $lo7 = $data['lo7'];
                    $cw = $data['pso7_cw'];
                    $fitness = $data['fitness_pso_7'];

                    echo "<tr>";
                    echo "<td>$iterasi_ke</td>";
                    echo "<td>$id_partikel</td>";
                    echo "<td>$lo1</td>";
                    echo "<td>$lo2</td>";
                    echo "<td>$lo3</td>";
                    echo "<td>$lo4</td>";
                    echo "<td>$lo5</td>";
                    echo "<td>$lo6</td>";
                    echo "<td>$lo7</td>";
                    echo "<td>$cw</td>";
                    echo "<td>$fitness</td>";
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
    } elseif ($cp == 3) {
        $iterasi_ke = $id_partikel = $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $lo8 = $cw = $fitness = 0;

        echo "<br>";
        echo "<h4>Tabel Hasil GBEST dengan $total_iterasi iterasi</h4>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Iterasi Ke</th>";
        echo "<th>ID Partikel</th>";
        echo "<th>LO 1</th>";
        echo "<th>LO 2</th>";
        echo "<th>LO 3</th>";
        echo "<th>LO 4</th>";
        echo "<th>LO 5</th>";
        echo "<th>LO 6</th>";
        echo "<th>LO 7</th>";
        echo "<th>LO 8</th>";
        echo "<th>Nilai CW</th>";
        echo "<th>Nilai Fitness</th>";
        echo "</tr>";

        for ($i = 0; $i <= $total_iterasi; $i++) {
            $select_gbest = "SELECT * FROM partikel_pso_3 WHERE kode='gbest' and iterasi_ke=$i";
            $q_select_gbest = mysqli_query($koneksi, $select_gbest);
            if (mysqli_num_rows($q_select_gbest)) {
                while ($data = mysqli_fetch_assoc($q_select_gbest)) {
                    $iterasi_ke = $data['iterasi_ke'];
                    $id_partikel = $data['id_partikel'];
                    $lo1 = $data['lo1'];
                    $lo2 = $data['lo2'];
                    $lo3 = $data['lo3'];
                    $lo4 = $data['lo4'];
                    $lo5 = $data['lo5'];
                    $lo6 = $data['lo6'];
                    $lo7 = $data['lo7'];
                    $lo8 = $data['lo8'];
                    $cw = $data['pso8_cw'];
                    $fitness = $data['fitness_pso_8'];

                    echo "<tr>";
                    echo "<td>$iterasi_ke</td>";
                    echo "<td>$id_partikel</td>";
                    echo "<td>$lo1</td>";
                    echo "<td>$lo2</td>";
                    echo "<td>$lo3</td>";
                    echo "<td>$lo4</td>";
                    echo "<td>$lo5</td>";
                    echo "<td>$lo6</td>";
                    echo "<td>$lo7</td>";
                    echo "<td>$lo8</td>";
                    echo "<td>$cw</td>";
                    echo "<td>$fitness</td>";
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
    }
}

function tabel_pbest($koneksi, $cp, $total_iterasi)
{
    if ($cp == 0) {
        $iterasi_ke = $id_partikel = $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $lo8 = $cw = $fitness = 0;

        echo "<br>";
        echo "<h4>Tabel Hasil GBEST dengan $total_iterasi iterasi</h4>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Iterasi Ke</th>";
        echo "<th>ID Partikel</th>";
        echo "<th>LO 1</th>";
        echo "<th>LO 2</th>";
        echo "<th>LO 3</th>";
        echo "<th>LO 4</th>";
        echo "<th>LO 5</th>";
        echo "<th>LO 6</th>";
        echo "<th>LO 7</th>";
        echo "<th>LO 8</th>";
        echo "<th>Nilai CW</th>";
        echo "<th>Nilai Fitness</th>";
        echo "</tr>";

        for ($i = 0; $i <= $total_iterasi; $i++) {
            $select_gbest = "SELECT * FROM partikel_pso_0 WHERE kode='pbest' and iterasi_ke=$i";
            $q_select_gbest = mysqli_query($koneksi, $select_gbest);
            if (mysqli_num_rows($q_select_gbest)) {
                while ($data = mysqli_fetch_assoc($q_select_gbest)) {
                    $iterasi_ke = $data['iterasi_ke'];
                    $id_partikel = $data['id_partikel'];
                    $lo1 = $data['lo1'];
                    $lo2 = $data['lo2'];
                    $lo3 = $data['lo3'];
                    $lo4 = $data['lo4'];
                    $lo5 = $data['lo5'];
                    $lo6 = $data['lo6'];
                    $lo7 = $data['lo7'];
                    $lo8 = $data['lo8'];
                    $cw = $data['pso0_cw'];
                    $fitness = $data['fitness_pso_0'];

                    echo "<tr>";
                    echo "<td>$iterasi_ke</td>";
                    echo "<td>$id_partikel</td>";
                    echo "<td>$lo1</td>";
                    echo "<td>$lo2</td>";
                    echo "<td>$lo3</td>";
                    echo "<td>$lo4</td>";
                    echo "<td>$lo5</td>";
                    echo "<td>$lo6</td>";
                    echo "<td>$lo7</td>";
                    echo "<td>$lo8</td>";
                    echo "<td>$cw</td>";
                    echo "<td>$fitness</td>";
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
    } elseif ($cp == 1) {
        $iterasi_ke = $id_partikel = $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $cw = $fitness = 0;

        echo "<br>";
        echo "<h4>Tabel Hasil PBEST dengan $total_iterasi iterasi</h4>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Iterasi Ke</th>";
        echo "<th>ID Partikel</th>";
        echo "<th>LO 1</th>";
        echo "<th>LO 2</th>";
        echo "<th>LO 3</th>";
        echo "<th>LO 4</th>";
        echo "<th>LO 5</th>";
        echo "<th>LO 6</th>";
        echo "<th>Nilai CW</th>";
        echo "<th>Nilai Fitness</th>";
        echo "</tr>";

        for ($i = 0; $i <= $total_iterasi; $i++) {
            $select_gbest = "SELECT * FROM partikel_pso_1 WHERE kode='pbest' and iterasi_ke=$i";
            $q_select_gbest = mysqli_query($koneksi, $select_gbest);
            if (mysqli_num_rows($q_select_gbest)) {
                while ($data = mysqli_fetch_assoc($q_select_gbest)) {
                    $iterasi_ke = $data['iterasi_ke'];
                    $id_partikel = $data['id_partikel'];
                    $lo1 = $data['lo1'];
                    $lo2 = $data['lo2'];
                    $lo3 = $data['lo3'];
                    $lo4 = $data['lo4'];
                    $lo5 = $data['lo5'];
                    $lo6 = $data['lo6'];
                    $cw = $data['pso6_cw'];
                    $fitness = $data['fitness_pso_6'];

                    echo "<tr>";
                    echo "<td>$iterasi_ke</td>";
                    echo "<td>$id_partikel</td>";
                    echo "<td>$lo1</td>";
                    echo "<td>$lo2</td>";
                    echo "<td>$lo3</td>";
                    echo "<td>$lo4</td>";
                    echo "<td>$lo5</td>";
                    echo "<td>$lo6</td>";
                    echo "<td>$cw</td>";
                    echo "<td>$fitness</td>";
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
    } elseif ($cp == 2) {
        $iterasi_ke = $id_partikel = $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $cw = $fitness = 0;

        echo "<br>";
        echo "<h4>Tabel Hasil PBEST dengan $total_iterasi iterasi</h4>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Iterasi Ke</th>";
        echo "<th>ID Partikel</th>";
        echo "<th>LO 1</th>";
        echo "<th>LO 2</th>";
        echo "<th>LO 3</th>";
        echo "<th>LO 4</th>";
        echo "<th>LO 5</th>";
        echo "<th>LO 6</th>";
        echo "<th>LO 7</th>";
        echo "<th>Nilai CW</th>";
        echo "<th>Nilai Fitness</th>";
        echo "</tr>";

        for ($i = 0; $i <= $total_iterasi; $i++) {
            $select_gbest = "SELECT * FROM partikel_pso_2 WHERE kode='pbest' and iterasi_ke=$i";
            $q_select_gbest = mysqli_query($koneksi, $select_gbest);
            if (mysqli_num_rows($q_select_gbest)) {
                while ($data = mysqli_fetch_assoc($q_select_gbest)) {
                    $iterasi_ke = $data['iterasi_ke'];
                    $id_partikel = $data['id_partikel'];
                    $lo1 = $data['lo1'];
                    $lo2 = $data['lo2'];
                    $lo3 = $data['lo3'];
                    $lo4 = $data['lo4'];
                    $lo5 = $data['lo5'];
                    $lo6 = $data['lo6'];
                    $lo7 = $data['lo7'];
                    $cw = $data['pso7_cw'];
                    $fitness = $data['fitness_pso_7'];

                    echo "<tr>";
                    echo "<td>$iterasi_ke</td>";
                    echo "<td>$id_partikel</td>";
                    echo "<td>$lo1</td>";
                    echo "<td>$lo2</td>";
                    echo "<td>$lo3</td>";
                    echo "<td>$lo4</td>";
                    echo "<td>$lo5</td>";
                    echo "<td>$lo6</td>";
                    echo "<td>$lo7</td>";
                    echo "<td>$cw</td>";
                    echo "<td>$fitness</td>";
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
    } elseif ($cp == 3) {
        $iterasi_ke = $id_partikel = $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $lo8 = $cw = $fitness = 0;


        echo "<br>";
        echo "<h4>Tabel Hasil PBEST dengan $total_iterasi iterasi</h4>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Iterasi Ke</th>";
        echo "<th>ID Partikel</th>";
        echo "<th>LO 1</th>";
        echo "<th>LO 2</th>";
        echo "<th>LO 3</th>";
        echo "<th>LO 4</th>";
        echo "<th>LO 5</th>";
        echo "<th>LO 6</th>";
        echo "<th>LO 7</th>";
        echo "<th>LO 8</th>";
        echo "<th>Nilai CW</th>";
        echo "<th>Nilai Fitness</th>";
        echo "</tr>";

        for ($i = 0; $i <= $total_iterasi; $i++) {
            $select_gbest = "SELECT * FROM partikel_pso_3 WHERE kode='pbest' and iterasi_ke=$i";
            $q_select_gbest = mysqli_query($koneksi, $select_gbest);
            if (mysqli_num_rows($q_select_gbest)) {
                while ($data = mysqli_fetch_assoc($q_select_gbest)) {
                    $iterasi_ke = $data['iterasi_ke'];
                    $id_partikel = $data['id_partikel'];
                    $lo1 = $data['lo1'];
                    $lo2 = $data['lo2'];
                    $lo3 = $data['lo3'];
                    $lo4 = $data['lo4'];
                    $lo5 = $data['lo5'];
                    $lo6 = $data['lo6'];
                    $lo7 = $data['lo7'];
                    $lo8 = $data['lo8'];
                    $cw = $data['pso8_cw'];
                    $fitness = $data['fitness_pso_8'];

                    echo "<tr>";
                    echo "<td>$iterasi_ke</td>";
                    echo "<td>$id_partikel</td>";
                    echo "<td>$lo1</td>";
                    echo "<td>$lo2</td>";
                    echo "<td>$lo3</td>";
                    echo "<td>$lo4</td>";
                    echo "<td>$lo5</td>";
                    echo "<td>$lo6</td>";
                    echo "<td>$lo7</td>";
                    echo "<td>$lo8</td>";
                    echo "<td>$cw</td>";
                    echo "<td>$fitness</td>";
                    echo "</tr>";
                }
            }
        }
        echo "</table>";
    }
}

function get_iterasi_pbest($koneksi, $cp, $total_iterasi){
    $iterasi_pbest = array();
    $iterasi_ke = $id_partikel = $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $lo8 = $cw = $fitness = 0;


    if($cp == 0){

    }elseif($cp == 1){

    }elseif($cp == 2){

    }elseif($cp == 3){
        $select_pbest_label = "SELECT DISTINCT(iterasi_ke) FROM partikel_pso_3 WHERE kode='pbest'";
        $q_select_pbest_label = mysqli_query($koneksi, $select_pbest_label);
        if (mysqli_num_rows($q_select_pbest_label)) {
            while ($data = mysqli_fetch_assoc($q_select_pbest_label)) {
                $iterasi_pbest[] = $data['iterasi_ke'];            
            }
        }
        return $iterasi_pbest;
    }
    
}

function get_pbest_json($koneksi, $cp, $total_iterasi){
    $pbest = array();
    $iterasi_ke = $id_partikel = $lo1 = $lo2 = $lo3 = $lo4 = $lo5 = $lo6 = $lo7 = $lo8 = $cw = $fitness = 0;


    if($cp == 0){

    }elseif($cp == 1){

    }elseif($cp == 2){

    }elseif($cp == 3){
        $select_pbest_data = "SELECT id_partikel, iterasi_ke, fitness_pso_8 FROM partikel_pso_3 WHERE kode='pbest'";
        $q_select_pbest_data = mysqli_query($koneksi, $select_pbest_data);

        foreach ($q_select_pbest_data as $data) {
            $pbest[] = $data;
        }
        $pbest_json = json_encode($pbest);
        return $pbest_json;
    }
    
}

function grafik_pbest(){
    echo "
        <div class='main_grafik' style='width:600px;height:600px;'>
        <canvas id='grafik_pbest'></canvas>

        </div>


        <script src='chartjs/Chart.js'></script>

        <script type='text/javascript'>
            var ctx = document.getElementById('grafik_pbest').getContext('2d');
            var myChart = new Chart(ctx).Line(data);
            var myDataset = {
                
            };
            var data = {
                labels: ['Coba1','Coba2','Coba3'],
                datasets:[
                    {
                        label: 'Samsung',
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: 'rgba(59, 100, 222, 1)',
                        borderColor: 'rgba(59, 100, 222, 1)',
                        pointHoverBackgroundColor: 'rgba(59, 100, 222, 1)',
                        pointHoverBorderColor: 'rgba(59, 100, 222, 1)',
                        data: [100,200,60]
                    },
                    {
                        label: 'Apple',
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: 'rgba(203, 222, 225, 0.9)',
                        borderColor: 'rgba(203, 222, 225, 0.9)',
                        pointHoverBackgroundColor: 'rgba(203, 222, 225, 0.9)',
                        pointHoverBorderColor: 'rgba(203, 222, 225, 0.9)',
                        data: [60,150,180]
                    },
                    {
                        label: 'Sony',
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: 'rgba(201, 29, 29, 1)',
                        borderColor: 'rgba(201, 29, 29, 1)',
                        pointHoverBackgroundColor: 'rgba(201, 29, 29, 1)',
                        pointHoverBorderColor: 'rgba(201, 29, 29, 1)',
                        data: [50,90,120]
                    }
                ]
            };

            var grafik = new Chart(ctx, {
                type:'line',
                data: data,
                options: {
                    barValueSpacing: 20,
                    scales: {
                        yAxes: [{
                            ticks:{
                                min: 0,
                            }
                        }],
                        xAxes: [{
                            gridlines:{
                                color: 'rgba(0, 0, 0, 0)',
                            }
                        }],
                    }
                }
            });
        </script>

    ";
}



function proses_pso($koneksi, $iterasi_total, $cp, $a, $b, $t1, $t2, $k)
{
    //hitung total data dari db
    $query_jmldata = "SELECT MAX(id_partikel) FROM master_pso_" . $cp;
    $q_jmldata = mysqli_query($koneksi, $query_jmldata);
    $total_data = mysqli_fetch_row($q_jmldata);

    for ($iterasi_ke = 0; $iterasi_ke <= $iterasi_total; $iterasi_ke++) {
        if ($iterasi_ke == 0) {
            delete_data($koneksi, "other");
            delete_data($koneksi, 'transpos');
            binding_dataawal($iterasi_ke, $cp, $a, $b, $koneksi);
            cari_fitness($iterasi_ke, $total_data[0], $cp, $koneksi, $t1, $t2, $k);
            parsing_pbest($koneksi, $cp, $iterasi_ke);
            parsing_gbest($koneksi, $cp, $iterasi_ke);
        } else {
            //update_kecepatan($iterasi_ke, $total_data[0], $cp, $koneksi);
            update_konstanta_cw($koneksi, $cp, $a, $b, $iterasi_ke, $total_data[0]);
            cari_fitness($iterasi_ke, $total_data[0], $cp, $koneksi, $t1, $t2, $k);
            parsing_pbest($koneksi, $cp, $iterasi_ke);
            update_pbest($koneksi, $cp, $iterasi_ke, $total_data[0]);
            parsing_gbest($koneksi, $cp, $iterasi_ke);
        }

        for ($data_ke = 1; $data_ke <= $total_data[0]; $data_ke++) {
            transpos_1($koneksi, $cp, $data_ke, $iterasi_ke);
            transpos_2($koneksi, $cp, $data_ke, $iterasi_ke, cari_kecepatan_awal($data_ke, $iterasi_ke, $cp, $koneksi));
            transpos_3($koneksi, $cp, $data_ke, $iterasi_ke);
            update_posisi($koneksi, $cp, $data_ke, $iterasi_ke, cari_kecepatan_baru($data_ke, $iterasi_ke, $cp, $koneksi));
        }
    }

    $lo1_tertinggi = $lo2_tertinggi = $lo3_tertinggi = $lo4_tertinggi = $lo5_tertinggi = $lo6_tertinggi = $lo7_tertinggi = $lo8_tertinggi = 0;
    $gbest_tertinggi = 0;


    echo "<h3> Data Berhasil Diolah </h3>";
    //cek CO
    if ($cp == 0) {
        $select_tertinggi = "SELECT * FROM partikel_pso_$cp WHERE kode='gbest' and iterasi_ke=$iterasi_total";
        $q_select_tertinggi = mysqli_query($koneksi, $select_tertinggi);
        if (mysqli_num_rows($q_select_tertinggi)) {
            while ($data_z = mysqli_fetch_assoc($q_select_tertinggi)) {
                $gbest_tertinggi = $data_z['fitness_pso_0'];
                $lo1_tertinggi = $data_z['lo1'];
                $lo2_tertinggi = $data_z['lo2'];
                $lo3_tertinggi = $data_z['lo3'];
                $lo4_tertinggi = $data_z['lo4'];
                $lo5_tertinggi = $data_z['lo5'];
                $lo6_tertinggi = $data_z['lo6'];
                $lo7_tertinggi = $data_z['lo7'];
                $lo8_tertinggi = $data_z['lo8'];
            }
        }
        $GLOBALS['hasil_gbest_global'] = "GBest Tertinggi adalah $gbest_tertinggi dengan  LO1: <b>$lo1_tertinggi</b>, LO2: <b>$lo2_tertinggi</b>, LO3: <b>$lo3_tertinggi</b>, LO4: <b>$lo4_tertinggi</b>, LO5: <b>$lo5_tertinggi</b>, LO6: <b>$lo6_tertinggi</b>, LO7: <b>$lo7_tertinggi</b>, LO8: <b>$lo8_tertinggi</b> <b> ==> ($lo1_tertinggi, $lo2_tertinggi, $lo3_tertinggi, $lo4_tertinggi, $lo5_tertinggi, $lo6_tertinggi, $lo7_tertinggi, $lo8_tertinggi)</b>";
        tabel_pbest_gbest($koneksi, $cp, $iterasi_total);
     } elseif ($cp == 1) {
        $select_tertinggi = "SELECT * FROM partikel_pso_$cp WHERE kode='gbest' and iterasi_ke=$iterasi_total";
        $q_select_tertinggi = mysqli_query($koneksi, $select_tertinggi);
        if (mysqli_num_rows($q_select_tertinggi)) {
            while ($data_z = mysqli_fetch_assoc($q_select_tertinggi)) {
                $gbest_tertinggi = $data_z['fitness_pso_6'];
                $lo1_tertinggi = $data_z['lo1'];
                $lo2_tertinggi = $data_z['lo2'];
                $lo3_tertinggi = $data_z['lo3'];
                $lo4_tertinggi = $data_z['lo4'];
                $lo5_tertinggi = $data_z['lo5'];
                $lo6_tertinggi = $data_z['lo6'];
            }
        }
        $GLOBALS['hasil_gbest_global'] = "GBest Tertinggi adalah $gbest_tertinggi dengan LO1: <b>$lo1_tertinggi</b>, LO2: <b>$lo2_tertinggi</b>, LO3: <b>$lo3_tertinggi</b>, LO4: <b>$lo4_tertinggi</b>, LO5: <b>$lo5_tertinggi</b>, LO6: <b>$lo6_tertinggi</b> <b> ==> ($lo1_tertinggi, $lo2_tertinggi, $lo3_tertinggi, $lo4_tertinggi, $lo5_tertinggi, $lo6_tertinggi)</b>";
        // tabel_pbest($koneksi, $cp, $iterasi_total);
    } elseif ($cp == 2) {
        $select_tertinggi = "SELECT * FROM partikel_pso_$cp WHERE kode='gbest' and iterasi_ke=$iterasi_total";
        $q_select_tertinggi = mysqli_query($koneksi, $select_tertinggi);
        if (mysqli_num_rows($q_select_tertinggi)) {
            while ($data_z = mysqli_fetch_assoc($q_select_tertinggi)) {
                $gbest_tertinggi = $data_z['fitness_pso_7'];
                $lo1_tertinggi = $data_z['lo1'];
                $lo2_tertinggi = $data_z['lo2'];
                $lo3_tertinggi = $data_z['lo3'];
                $lo4_tertinggi = $data_z['lo4'];
                $lo5_tertinggi = $data_z['lo5'];
                $lo6_tertinggi = $data_z['lo6'];
                $lo7_tertinggi = $data_z['lo7'];
            }
        }
        $GLOBALS['hasil_gbest_global'] = "GBest Tertinggi adalah $gbest_tertinggi dengan LO1: <b>$lo1_tertinggi</b>, LO2: <b>$lo2_tertinggi</b>, LO3: <b>$lo3_tertinggi</b>, LO4: <b>$lo4_tertinggi</b>, LO5: <b>$lo5_tertinggi</b>, LO6: <b>$lo6_tertinggi</b>, LO7: <b>$lo7_tertinggi</b> <b> ==> ($lo1_tertinggi, $lo2_tertinggi, $lo3_tertinggi, $lo4_tertinggi, $lo5_tertinggi, $lo6_tertinggi, $lo7_tertinggi)</b>";
        // tabel_pbest($koneksi, $cp, $iterasi_total);

    } elseif ($cp == 3) {
        $iterasi_pbest = array();
        $select_tertinggi = "SELECT * FROM partikel_pso_$cp WHERE kode='gbest' and iterasi_ke=$iterasi_total";
        $q_select_tertinggi = mysqli_query($koneksi, $select_tertinggi);
        if (mysqli_num_rows($q_select_tertinggi)) {
            while ($data_z = mysqli_fetch_assoc($q_select_tertinggi)) {
                $gbest_tertinggi = $data_z['fitness_pso_8'];
                $lo1_tertinggi = $data_z['lo1'];
                $lo2_tertinggi = $data_z['lo2'];
                $lo3_tertinggi = $data_z['lo3'];
                $lo4_tertinggi = $data_z['lo4'];
                $lo5_tertinggi = $data_z['lo5'];
                $lo6_tertinggi = $data_z['lo6'];
                $lo7_tertinggi = $data_z['lo7'];
                $lo8_tertinggi = $data_z['lo8'];
            }
        }
        $GLOBALS['hasil_gbest_global'] = "GBest Tertinggi adalah $gbest_tertinggi dengan  LO1: <b>$lo1_tertinggi</b>, LO2: <b>$lo2_tertinggi</b>, LO3: <b>$lo3_tertinggi</b>, LO4: <b>$lo4_tertinggi</b>, LO5: <b>$lo5_tertinggi</b>, LO6: <b>$lo6_tertinggi</b>, LO7: <b>$lo7_tertinggi</b>, LO8: <b>$lo8_tertinggi</b> <b> ==> ($lo1_tertinggi, $lo2_tertinggi, $lo3_tertinggi, $lo4_tertinggi, $lo5_tertinggi, $lo6_tertinggi, $lo7_tertinggi, $lo8_tertinggi)</b>";
        // echo $GLOBALS['hasil_gbest_global'];
        // tabel_pbest_gbest($koneksi, $cp, $iterasi_total);
        // tabel_pbest($koneksi, $cp, $iterasi_total);
        // $iterasi_pbest = get_iterasi_pbest($koneksi, $cp, $iterasi_total);
        // $pbest_json = get_pbest_json($koneksi, $cp, $iterasi_total);
        // print_r($pbest_json);
        // grafik_pbest();
      }
}

function init($koneksi)
{
    $start_time = microtime(true);
    $jml_partikel = $_POST['jml_partikel'];
    $iterasi_total = $_POST['iterasi'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $k = $_POST['k'];
    $a = $_POST['nilai_a'];
    $b = $_POST['nilai_b'];
    $cp_passing = $_POST['cp'];
    $GLOBALS['cp'] = $cp_passing;
    $GLOBALS['iterasi_total'] = $iterasi_total;
    $co = generateCP($cp_passing);
    // generatePartikel(8, $jml_partikel, $koneksi);
    generatePartikel($co, $jml_partikel, $koneksi);
    $cp = cek_co($co);
    // proses_pso($koneksi, $iterasi_total, 3, $a, $b, $t1, $t2, $k);
    proses_pso($koneksi, $iterasi_total, $cp, $a, $b, $t1, $t2, $k);
    $end_time = microtime(true);
    $execution_time = ($end_time - $start_time);
    $round_execution_time = round($execution_time,3);
    $GLOBALS['execution_time'] = $round_execution_time;

}


//start of fungsi tambahan utk entri data ke tabel dbo scr otomatis
function generate_dbo($koneksi)
{
    $count = 0;
    $count_a = 1;
    for ($i = 1; $i < 65; $i++) {
        $count++;
        if ($count < 9) {
            // echo "var i = $i, var j = $count<br>";
            $q = "INSERT INTO dbo(id,nilai_x,nilai_y) VALUES ($i,$count,$count_a)";
            $q_ex = mysqli_query($koneksi, $q);

            if ($count == 8) {
                $count_a++;
                if ($count_a == 9) {
                    $count_a = 0;
                }
                $count = 0;
            }
        }
    }
}

function generate_jarakdbo($koneksi)
{
    $a = array(0, 0.5, 0.5, 2, 2, 3, 3, 3, 0.5, 0, 0.5, 1.5, 2, 2.5, 2.5, 2.5, 1, 0.5, 0, 1, 1, 2, 2, 2, 2, 1.5, 1, 0, 0.5, 1.5, 1.5, 1.5, 2, 2, 1, 0.5, 0, 1, 1, 1, 3, 2.5, 2, 1.5, 1, 0, 0.5, 1.5, 3, 2.5, 2, 1.5, 1, 0.5, 0, 2, 3, 2.5, 2, 1.5, 1, 1.5, 2, 0);

    $count = 0;
    foreach ($a as $jarak) {
        $count++;
        $q = "UPDATE dbo SET jarak = $jarak WHERE id = $count";
        echo "$q<br>";
        $q_ex = mysqli_query($koneksi, $q);
    }
}
// end of fungsi tambahan utk entri data ke tabel dbo scr otomatis

if (isset($_POST['btn-generate'])) {
    init($koneksi);
}
?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>PSO - Learning Path Sequence</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/unslider.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/weather-icons/climacons.min.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-callout.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
  <!-- link(rel='stylesheet', type='text/css', href=app_assets_path+'/css'+rtl+'/pages/users.css')-->
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.php">
              <img class="brand-logo" alt="stack admin logo" src="app-assets/images/logo/stack-logo-light.png">
              <h2 class="brand-text">PSO - LPS</h2>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left"></ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="avatar avatar-online">
                  <img src="app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>
                <span class="user-name">Testing</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a>
                <a class="dropdown-item" href="login-with-bg-image.html"><i class="ft-power"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" navigation-header">
          <span>General</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
          data-original-title="General"></i>
        </li>
        <li class=" nav-item"><a href="index.php"><i class="ft-home"></i><span class="menu-title" data-i18n="">Uji LPS</span></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Hasil PSO</h2>
              </div>
              <div class="card-content px-1" style="margin-bottom: 20px;">
                <div class="bs-callout-success callout-border-left mt-1 p-1">
                    <strong>Partikel yang Di-Generate Random (CP : <?=$GLOBALS['cp'];?>)</strong>
                    <p>
                      <?php
                        $cp_lokal = $GLOBALS['cp'];

                        if($cp_lokal == 0){
                          $select_master = "SELECT * FROM master_pso_$cp_lokal";
                          $q_select_master = mysqli_query($koneksi,$select_master);
                          if(mysqli_num_rows($q_select_master)){
                            while ($data_master = mysqli_fetch_assoc($q_select_master)) {
                                echo "Partikel ".$data_master['id_partikel']. " dengan urutan LO : ". $data_master['lo1'].",". $data_master['lo2'].",". $data_master['lo3'].",". $data_master['lo4'].",". $data_master['lo5'].",". $data_master['lo6'].",". $data_master['lo7'].",". $data_master['lo8'] ."<br>";
                            }
                          }
                        }elseif($cp_lokal == 1){
                          $select_master = "SELECT * FROM master_pso_$cp_lokal";
                          $q_select_master = mysqli_query($koneksi,$select_master);
                          if(mysqli_num_rows($q_select_master)){
                            while ($data_master = mysqli_fetch_assoc($q_select_master)) {
                                echo "Partikel ".$data_master['id_partikel']. " dengan urutan LO : ". $data_master['lo1'].",". $data_master['lo2'].",". $data_master['lo3'].",". $data_master['lo4'].",". $data_master['lo5'].",". $data_master['lo6']."<br>";
                            }
                          }
                        }elseif($cp_lokal == 2){
                          $select_master = "SELECT * FROM master_pso_$cp_lokal";
                          $q_select_master = mysqli_query($koneksi,$select_master);
                          if(mysqli_num_rows($q_select_master)){
                            while ($data_master = mysqli_fetch_assoc($q_select_master)) {
                                echo "Partikel ".$data_master['id_partikel']. " dengan urutan LO : ". $data_master['lo1'].",". $data_master['lo2'].",". $data_master['lo3'].",". $data_master['lo4'].",". $data_master['lo5'].",". $data_master['lo6'].",". $data_master['lo7']."<br>";
                            }
                          }
                        }elseif($cp_lokal == 3){
                          $select_master = "SELECT * FROM master_pso_$cp_lokal";
                          $q_select_master = mysqli_query($koneksi,$select_master);
                          if(mysqli_num_rows($q_select_master)){
                            while ($data_master = mysqli_fetch_assoc($q_select_master)) {
                                echo "Partikel ".$data_master['id_partikel']. " dengan urutan LO : ". $data_master['lo1'].",". $data_master['lo2'].",". $data_master['lo3'].",". $data_master['lo4'].",". $data_master['lo5'].",". $data_master['lo6'].",". $data_master['lo7'].",". $data_master['lo8'] ."<br>";
                            }
                          }
                        }
                        
                      ?>
                    </p>
                </div>

                <div class="bs-callout-info callout-border-left mt-1 p-1">
                    <strong>Hasil GBest Terbaik</strong>
                    <p><?=$GLOBALS['hasil_gbest_global']?></p>
                </div>

                <div class="bs-callout-info callout-border-left mt-1 p-1">
                    <strong>Hasil Execution Time</strong>
                    <p><?=$GLOBALS['execution_time']?> second</p>
                </div>

                
                <?php tabel_pbest($koneksi, $GLOBALS['cp'], $GLOBALS['iterasi_total']); ?>
                <br>
                <?php tabel_pbest_gbest($koneksi, $GLOBALS['cp'], $GLOBALS['iterasi_total']); ?>


                <?php
                 // if($GLOBALS['cp'] == 0){
                 //  include 'chart.php?cp=0'; 
                 // }elseif($GLOBALS['cp'] == 1){
                 //  include 'chart.php?cp=1'; 
                 // }elseif($GLOBALS['cp'] == 2){
                 //  include 'chart.php?cp=2'; 
                 // }elseif($GLOBALS['cp'] == 3){
                 //  include 'chart.php?cp=3'; 
                 // }
                 $cp_to_chart = $GLOBALS['cp'];
                 include 'chart.php';
                 
                ?>
              </div>
        
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2019 <a class="text-bold-800 grey darken-2" href=""
        target="_blank">-</a></span>
      <span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="app-assets/vendors/js/extensions/jquery.knob.min.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/extensions/knob.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js"
  type="text/javascript"></script>
  <script src="app-assets/data/jvector/visitor-data.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/jquery.sparkline.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/extensions/unslider-min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-climacon.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.min.css">
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="app-assets/js/scripts/pages/dashboard-analytics.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>