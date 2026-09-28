<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("controller_office.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Office_Employees</title>
</head>

<body>
    <div class="container p-4" style="max-width: 480px;">
        <div class="card text-center" style="min-height: 550px; border: 1px solid black;">
            <div class="card-header" style="background-color: #c9eafc; height:40px; border-bottom:1px solid black; display:flex; align-items:center; padding-left:10px;">
                <ul class="nav nav-pills card-header-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="view_employee.php" style="color:black; font-size:14px; font-weight:bold; padding:0 12px;">Employee</a>
                    </li>
                    <span style="font-size:16px; color:black;">|</span>
                    <li class="nav-item">
                        <a class="nav-link" href="view_office.php" style="color:black; font-size:14px; font-weight:bold; padding:0 12px;">Office</a>
                    </li>
                    <span style="font-size:16px; color:black;">|</span>
                    <li class="nav-item">
                        <a class="nav-link" href="view_office-employee.php" style="color:black; font-size:14px; font-weight:bold; padding:0 12px;">Office-Employees</a>
                    </li>
                </ul>
            </div>
            <div class="container p-3">
                <h1 style="text-align: center; font-size:20px;">List Karyawan</h1>
                <table class="table table-dark table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 0;
                        $allkaryawan = getAllKaryawan();
                        foreach ($allkaryawan as $index => $karyawan) {
                            $counter++;
                        ?>
                            <tr>
                                <th scope="row"><?= $counter ?></th>
                                <td><?= $karyawan->nama ?></td>
                                <td><?= $karyawan->jabatan ?></td>
                                <td><?= $karyawan->usia ?></td>
                                <td>
                                    <a href="controller_office.php?deleteKaryawanID=<?= $index ?>" style="display: inline-block; font-size: 14px; padding: 6px 12px; border-radius: 5px; line-height: 1.5;">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php

                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <h1 style="text-align: center; font-size: 20px;">Tambah Karyawan</h1>
            <form method="POST" action="controller_office.php" class="w-75 mx-auto">
                <div class="form-row">
                    <div class="form-group col-md-12 ">
                        <label for="inputNama">Nama</label>
                        <input type="text" class="form-control" name="inputNama" placeholder="Masukkan Nama">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputJabatan">Jabatan</label>
                        <input type="text" class="form-control" name="inputJabatan" placeholder="Masukkan Jabatan">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputUsia">Usia</label>
                        <input type="text" class="form-control" name="inputUsia" placeholder="Masukkan Usia">
                    </div>
                </div>

                <div style="text-align:center; margin-bottom: 25px;">
                    <button name="button_selesai" type="submit" class="btn btn-primary">Selesai</button>
                </div>
            </form>
        </div>
    </div>


</body>

</html>