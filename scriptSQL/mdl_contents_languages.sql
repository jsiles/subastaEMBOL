-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2016 at 02:35 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: "subasta"
--

--
-- Dumping data for table "mdl_contents_languages"
--

SET IDENTITY_INSERT "mdl_contents_languages" ON ;
INSERT INTO "mdl_contents_languages" ("col_uid", "col_con_uid", "col_language", "col_title", "col_description", "col_content", "col_url", "col_metatitle", "col_metadescription", "col_metakeyword", "col_media", "col_image", "col_status") VALUES
(1, 1, 'es', 'Inicio', NULL, '', 'inicio', 'Inicio', 'Inicio', 'Inicio', NULL, NULL, 'ACTIVE'),
(2, 2, 'es', 'Categorias', NULL, '', 'categorias', 'Categorias', 'Categorias', 'Categorias', NULL, NULL, 'ACTIVE'),
(3, 3, 'es', 'Registro', NULL, '\r\n<br />', 'registro', 'Registro', 'Registro', 'Registro', NULL, NULL, 'ACTIVE'),
(4, 4, 'es', 'Divisas', NULL, '', 'divisas', 'Compra Venta Divisas', 'Compra Venta Divisas', 'Compra Venta Divisas', NULL, NULL, 'ACTIVE');

SET IDENTITY_INSERT "mdl_contents_languages" OFF;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
