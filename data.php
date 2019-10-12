<?php
include 'koneksi.php';

for ($i = 0; $i <= $total_iterasi; $i++) {
    $select_pbest = "SELECT id_partikel, iterasi_ke, fitness_pso_8 FROM partikel_pso_3 WHERE kode='pbest'";
    $q_select_pbest = mysqli_query($koneksi, $select_pbest);
    if (mysqli_num_rows($q_select_pbest)) {
        while ($data = mysqli_fetch_assoc($q_select_pbest)) {
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

?>