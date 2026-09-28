<?php

include("model_office.php");
session_start(); //memulai session

//create session employee list if not exist
if (!isset($_SESSION['employeeList'])) {
    $_SESSION['employeeList'] = array();
}

// Session Office-Employees
if (!isset($_SESSION['employeeList'])) {
    $_SESSION['employeeList'] = array();
}

// Session List Karyawan
if (!isset($_SESSION['karyawanList'])) {
    $_SESSION['karyawanList'] = array();
}

// Session Office
if (!isset($_SESSION['officeList'])) {
    $_SESSION['officeList'] = array();
}


//Employee

function createEmployee()
{
    $employee = new model_employee();
    $employee->employee = $_POST['inputEmployee'];
    $employee->office = $_POST['inputOffice'];
    $employee->nama = $_POST['inputNama'];
    $employee->jabatan = $_POST['inputJabatan'];
    $employee->usia = $_POST['inputUsia'];
    array_push($_SESSION['employeeList'], $employee);
}

function updateEmployee($employeeID)
{
    $employee = $_SESSION['employeeList'][$employeeID]; // ambil data dengan index tertentu
    $employee->employee = $_POST['inputEmployee'];
    $employee->office = $_POST['inputOffice'];
}

function getAllEmployees()
{
    return $_SESSION['employeeList'];
}

function deleteEmployee($employeeIndex)
{
    unset($_SESSION['employeeList'][$employeeIndex]); // array index = 0, 1, 2
}

function getEmployeeWithID($employeeID)
{
    return $_SESSION['employeeList'][$employeeID];
}

//jika button_register di klik
if (isset($_POST['button_register'])) {
    createEmployee();
    header("Location:view_employee.php "); // kembali ke halaman lain
}

//jika button_update di klik
if (isset($_POST['button_update'])) {
    updateEmployee($_POST['input_id']);
    header("Location:view_employee.php "); // kembali ke halaman lain
}


//Karyawan

function createKaryawan()
{
    $karyawan = new stdClass();

    $karyawan->nama = $_POST['inputNama'];
    $karyawan->jabatan = $_POST['inputJabatan'];
    $karyawan->usia = $_POST['inputUsia'];

    array_push($_SESSION['karyawanList'], $karyawan);
}

function getAllKaryawan()
{
    return $_SESSION['karyawanList'];
}

function deleteKaryawan($index)
{
    unset($_SESSION['karyawanList'][$index]);
}

//jika button_selesai di klik 
if (isset($_POST['button_selesai'])) {
    createKaryawan();
    header("Location:view_employee.php "); // kembali ke halaman lain
}

//jika tombol delete di page employee di klik
if (isset($_GET['deleteKaryawanID'])) {
    deleteKaryawan($_GET['deleteKaryawanID']);
    header("Location: view_employee.php");
    exit;
}

//jika button_delete di klik
if (isset($_GET['deleteID'])) {
    deleteEmployee($_GET['deleteID']);
    header("Location:view_employee.php "); // kembali ke halaman lain
}


//Office

function createOffice()
{
    $office = new model_office();

    $office->namaOffice = $_POST['inputNamaOffice'];
    $office->alamat = $_POST['inputAlamat'];
    $office->kota = $_POST['inputKota'];
    $office->telepon = $_POST['inputTelepon'];

    array_push($_SESSION['officeList'], $office);
}

function getAllOffices()
{
    return $_SESSION['officeList'];
}

function deleteOffice($officeIndex)
{
    unset($_SESSION['officeList'][$officeIndex]);
}

// Proses tambah Office
if (isset($_POST['button_office'])) {
    createOffice();

    header("Location: view_office.php");
    exit;
}

// Proses hapus Office
if (isset($_GET['deleteOfficeID'])) {
    deleteOffice($_GET['deleteOfficeID']);

    header("Location: view_office.php");
    exit;
}

// Office-Employees

// Session untuk menyimpan hubungan Employee dan Office
if (!isset($_SESSION['officeEmployeeList'])) {
    $_SESSION['officeEmployeeList'] = array();
}

// Menambahkan hubungan Employee dengan Office
function createOfficeEmployee()
{
    $relation = new stdClass();

    $relation->employeeID = $_POST['inputEmployee'];
    $relation->officeID = $_POST['inputOffice'];

    array_push($_SESSION['officeEmployeeList'], $relation);
}

// Mengambil semua hubungan
function getAllOfficeEmployees()
{
    return $_SESSION['officeEmployeeList'];
}

// Menghapus hubungan
function deleteOfficeEmployee($index)
{
    unset($_SESSION['officeEmployeeList'][$index]);
}

// Proses SAVE
if (isset($_POST['button_save'])) {
    createOfficeEmployee();

    header("Location: view_office-employee.php");
    exit;
}

// Proses DELETE hubungan
if (isset($_GET['deleteRelationID'])) {
    deleteOfficeEmployee($_GET['deleteRelationID']);

    header("Location: view_office-employee.php");
    exit;
}