<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/core/model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/core/view.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/core/controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/mail.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/core/route.php';
Route::start();
