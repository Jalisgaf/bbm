<!DOCTYPE html>
<html>
<head>
    <title>Daftar Harga BBM</title>
    <style>
        td {
            text-align: right;
        }

        .tengah {
            text-align: center;
        }

        /* .barisganjil {
            background-color: white;
        }

        .barisgenap {

            background-color: silver;
        } */

        tr:nth-child(odd) {
            background-color: white;
        }

        tr:nth-child(even) {
            background-color: silver;
        }
    </style>
</head>
<body>
    <h1>Daftar Harga BBM</h1>
    <form method="POST">
        <table border="2px">
            <tr>
                <th>Liter Awal</th>
                <th>Liter Akhir</th>
                <th></th>
            </tr>
            <tr>
                <td><input type="text" name="awal" maxlength="3" size="4" value ="<?php echo (isset($_POST["tblsubmit"]) == TRUE ? $_POST["awal"] : "");?>" placeholder="0"></td> <!-- jika sudah melakukan submit (ada yang sudah disubmit) maka harus ditampilkan angka AWAL nya, jika tidak maka kosongkan-->
                <td><input type="text" name="akhir" maxlength="3" size="4" value="<?php echo (isset($_POST["tblsubmit"]) == TRUE ? $_POST["akhir"] : "");?>" placeholder="0"></td> <!-- jika sudah melakukan submit (ada yang sudah disubmit) maka harus ditampilkan angka AKHIR nya, jika tidak maka kosongkan-->
                <td><input type="submit" name="tblsubmit" value="View"></td>
            </tr>
        </table>
    </form>
    <hr>
    <?php
        if (isset($_POST['tblsubmit'])) { // perintah unntuk mengecek data ada atau tidaknya (dalam kasus ini sudah terkirim atau belum)
            ?>
            <table border="1px" width="100%">
                <tr>
                    <th>Liter</th>
                    <th>Premium</th>
                    <th>Pertalite</th>
                    <th>Pertamax</th>
                    <th>Solar</th>
                </tr>
                <?php
                    define("HARGA_PREMIUM", 6550);
                    define("HARGA_PERTALITE", 7600);
                    define("HARGA_PERTAMAX", 8900);
                    define("HARGA_SOLAR", 5150);
                    $awal = $_POST['awal'];
                    $akhir = $_POST['akhir'];
                    for ($liter = $awal; $liter <= $akhir; $liter++) {
                        ?>
                
                        <!-- <tr bgcolor="<?php // CARA DENGAN PENGKONDISIAN ....1
                                    // CARA PERTAMA
                                    // if($liter % 2 == 1) { // jika ganjil
                                    //     echo "white";    
                                    // } else // jika genap
                                    //     echo "silver";
                                    // CARA KEDUA : sama seperti IF (lebih sederhana)
                                    // echo ($liter % 2 == 1 ? "white":"silver");
                        ?>"> 
                        <tr class="<?php // echo ($liter % 2 == 1 ? "barisganjil" : "barisgenap")?>"> CARA DENGAN CLASS ....2
                        CARA DENGAN CSS ....3 -->
                        <tr>
                            <td class="tengah"><?php echo $liter; ?></td>
                            <td align="right">Rp <?php echo number_format($liter * HARGA_PREMIUM, 0, ",", "."); ?></td> <!-- number_format untuk memformatkan nomor agar diberikan "." pada ribuan-->
                            <td>Rp <?php echo number_format($liter * HARGA_PERTALITE); ?></td>
                            <td><?php echo "Rp " . number_format($liter * HARGA_PERTAMAX, 0, ",", "."); ?></td>
                            <td><?php echo "Rp " . number_format($liter * HARGA_SOLAR, 0, ",", "."); ?></td>
                        </tr>
                        <?php
                    }        
                    ?>
            </table>
            <?php
    } else 
        echo "Isilah Liter Awal dan Akhir terlebih dahulu";
    ?>
</body>
</html>