<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("controller_office.php");

$allKaryawan = getAllKaryawan();
$allOffice = getAllOffices();
$allRelations = getAllOfficeEmployees();
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
            <div class="card-body">
                <h1 class="p-2 mb-2" style="font-size: 35px; color: #2c3b91; font-family: Arial, sans-serif">
                    Office Employees
                </h1>
                <table class="table table-bordered table-sm"
                    style="width: 100%; font-size: 14px; text-align: left;">

                    <thead>
                        <tr style="background-color: #9cdef9;">
                            <th>Employee</th>
                            <th>Office</th>
                            <th style="width: 5%;">Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($allRelations as $index => $relation) { ?>

                            <tr>
                                <td style="vertical-align: middle;">
                                    <?php
                                    if (isset($allKaryawan[$relation->employeeID])) {
                                        echo htmlspecialchars(
                                            $allKaryawan[$relation->employeeID]->nama
                                        );
                                    } else {
                                        echo "Employee tidak ditemukan";
                                    }
                                    ?>
                                </td>

                                <td style="vertical-align: middle;">
                                    <?php
                                    if (isset($allOffice[$relation->officeID])) {
                                        echo htmlspecialchars(
                                            $allOffice[$relation->officeID]->namaOffice
                                        );
                                    } else {
                                        echo "Office tidak ditemukan";
                                    }
                                    ?>
                                </td>
                                <td style="text-align: center;">
                                    <a href="controller_office.php?deleteRelationID=<?= $index ?>"
                                        style="font-size: 20px; font-weight: bold; color:black;">&times;</a>
                                </td>
                            </tr>

                        <?php
                        } 
                        ?>

                    </tbody>
                </table>

                <form method="POST" action="controller_office.php" style="margin-top: 45px;">
                    <div class="form-row align-items-center mb-3">

                        <div class="col-4 text-left">
                            <label for="inputEmployee" style="font-size: 14px;">Employee</label>
                        </div>

                        <div class="col-8">
                            <select name="inputEmployee" id="inputEmployee" class="form-control" required>
                                <?php foreach ($allKaryawan as $index => $karyawan) { ?>

                                    <option value="<?= $index ?>">
                                        <?= htmlspecialchars($karyawan->nama) ?>
                                    </option>

                                <?php } ?>

                            </select>

                        </div>
                    </div>

                    <div class="form-row align-items-center mb-3">

                        <div class="col-4 text-left">
                            <label for="inputOffice" style="font-size: 14px;">Office</label>
                        </div>

                        <div class="col-8">

                            <select name="inputOffice" id="inputOffice" class="form-control" required>

                                <?php foreach ($allOffice as $index => $office) { ?>

                                    <option value="<?= $index ?>">
                                        <?= htmlspecialchars($office->namaOffice) ?>
                                    </option>

                                <?php } ?>

                            </select>

                        </div>
                    </div>

                    <button name="button_save" type="submit" class="btn px-4 py-1" style="background-color:#9ddcfe; color:black; border: 1px solid black; ">
                        SAVE
                    </button>

                </form>
            </div>
        </div>
    </div>


</body>

</html>