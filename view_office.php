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

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <title>Office</title>
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
            <div class="container p-2" style="max-width: 100%; overflow: hidden;">

                <h1 style="text-align: center; font-size: 20px;">List Office</h1>
                <div style="width: 100%; overflow-x: auto;">
                    <table class="table table-dark table-hover table-sm"
                        style="width: 100%; table-layout: fixed; font-size: 12px;">

                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 7%;">No</th>
                                <th style="width: 20%;">Nama</th>
                                <th style="width: 22%;">Alamat</th>
                                <th style="width: 19%;">Kota</th>
                                <th style="width: 14%;">Telepon</th>
                                <th style="width: 18%;">Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $counter = 0;
                            $alloffice = getAllOffices();

                            foreach ($alloffice as $index => $office) {
                                $counter++;
                            ?>

                                <tr>
                                    <th scope="row"><?= $counter ?></th>
                                    <td style="overflow-wrap: anywhere;">
                                        <?= htmlspecialchars($office->namaOffice) ?>
                                    </td>
                                    <td style="overflow-wrap: anywhere;">
                                        <?= htmlspecialchars($office->alamat) ?>
                                    </td>
                                    <td style="overflow-wrap: anywhere;">
                                        <?= htmlspecialchars($office->kota) ?>
                                    </td>
                                    <td style="overflow-wrap: anywhere;">
                                        <?= htmlspecialchars($office->telepon) ?>
                                    </td>
                                    <td>
                                        <a href="controller_office.php?deleteOfficeID=<?= $index ?>" style="display: inline-block; font-size: 14px; padding: 6px 12px; border-radius: 5px; line-height: 1.5;">
                                            Delete
                                        </a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>

                    </table>

                </div>
            </div>

            <h1 style="text-align: center; font-size: 20px;">
                Tambah Office
            </h1>

            <form method="POST"
                action="controller_office.php"
                class="w-75 mx-auto">

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputNamaOffice">Nama Office</label>
                        <input type="text" class="form-control" name="inputNamaOffice" placeholder="Masukkan Nama Office" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputAlamat">Alamat</label>
                        <input type="text" class="form-control" name="inputAlamat" placeholder="Masukkan Alamat" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputKota">Kota</label>
                        <input type="text" class="form-control" name="inputKota" placeholder="Masukkan Kota" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputTelepon">Telepon</label>
                        <input type="text" class="form-control" name="inputTelepon" placeholder="Masukkan Telepon" required>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 15px; margin-bottom: 25px;">
                    <button name="button_office" type="submit" class="btn btn-primary">Selesai</button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>