-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-11-2024 a las 23:39:44
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sdgd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_17_004154_tb_usuarios', 1),
(6, '2024_10_17_004235_tb_areas', 1),
(7, '2024_10_17_004304_tb_tramites', 1),
(8, '2024_10_17_004458_tb_concentracion', 1),
(9, '2024_10_17_004535_tb_historico', 1),
(10, '2024_10_17_004611_tb_roles', 1),
(11, '2024_11_04_225323_tb_usuario_area', 1),
(12, '2024_11_05_023851_create_usuario_area_rol_table', 1),
(13, '2024_11_05_023900_tb_usuario_area_rol', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_areas`
--

CREATE TABLE `tb_areas` (
  `id_area` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripccion` text NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_areas`
--

INSERT INTO `tb_areas` (`id_area`, `nombre`, `descripccion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Archivo General', 'Área responsable de la supervisión y control de todos los documentos y archivos del sistema.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(2, 'Trámite', 'Encargada de gestionar y almacenar documentos activos que están en proceso o pendientes de resolución.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(3, 'Concentración', 'Dedicada a documentos que han finalizado su ciclo activo, pero deben conservarse por razones legales o administrativas.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(4, 'Histórico', 'Área para almacenar documentos de valor histórico o permanente, que ya no tienen valor administrativo pero sí histórico o cultural.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(5, 'Administración', 'Encargada de la gestión de usuarios, roles y permisos de acceso.', 1, '2024-11-30 03:55:00', '2024-11-30 03:55:00'),
(6, 'Control de Calidad', 'Área que verifica la correcta digitalización y gestión de documentos.', 1, '2024-11-30 03:55:00', '2024-11-30 03:55:00'),
(7, 'Tecnología e Innovación', 'Responsable de la integración de nuevas tecnologías, como el monitoreo de temperatura y humedad.', 1, '2024-11-30 03:55:00', '2024-11-30 03:55:00'),
(8, 'Seguridad de Información', 'Área que se ocupa de la protección y confidencialidad de los documentos y el acceso seguro.', 1, '2024-11-30 03:55:00', '2024-11-30 03:55:00'),
(9, 'Consulta Pública', 'Sección para la consulta de documentos por parte de usuarios autorizados o el público en general, si procede.', 1, '2024-11-30 03:55:00', '2024-11-30 03:55:00'),
(10, 'Preservación y Conservación', 'Área enfocada en las actividades para preservar y conservar los documentos físicos y digitales.', 1, '2024-11-30 03:55:00', '2024-11-30 03:55:00'),
(11, 'Legal', 'Encargada de los documentos con implicaciones legales o jurídicas, como contratos, resoluciones y convenios.', 1, '2024-11-30 03:55:00', '2024-11-30 03:55:00'),
(12, 'Gestión de Proyectos', 'Para el seguimiento de proyectos documentales específicos y su avance.', 1, '2024-11-30 03:55:00', '2024-11-30 03:55:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_concentracion`
--

CREATE TABLE `tb_concentracion` (
  `id_concentracion` bigint(20) UNSIGNED NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre_expediente` varchar(255) NOT NULL,
  `fondo` varchar(255) NOT NULL,
  `seccion` varchar(255) NOT NULL,
  `subseccion` varchar(255) NOT NULL,
  `serie` varchar(255) NOT NULL,
  `subserie` varchar(255) NOT NULL,
  `ano_creacion` date NOT NULL,
  `ano_cierre` date NOT NULL,
  `motivo_cierre` varchar(255) NOT NULL,
  `legajos` int(11) NOT NULL,
  `medida` double(8,2) NOT NULL,
  `ubicacion_fisica` varchar(255) NOT NULL,
  `archivo_pdf` text NOT NULL,
  `digitalizado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_concentracion`
--

INSERT INTO `tb_concentracion` (`id_concentracion`, `clave`, `nombre_expediente`, `fondo`, `seccion`, `subseccion`, `serie`, `subserie`, `ano_creacion`, `ano_cierre`, `motivo_cierre`, `legajos`, `medida`, `ubicacion_fisica`, `archivo_pdf`, `digitalizado`, `created_at`, `updated_at`) VALUES
(1, 'C001', 'Expediente A-2024', 'Fondo Histórico', 'Sección 1', 'Subsección A', 'Serie 1', 'Subserie 1', '2024-01-10', '2024-12-10', 'Expediente finalizado', 100, 15.75, 'Estante 1, Sección 1', 'expediente_a.pdf', 1, '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(2, 'C002', 'Expediente B-2024', 'Fondo Administrativo', 'Sección 2', 'Subsección B', 'Serie 2', 'Subserie 2', '2024-02-15', '2024-10-20', 'Cierre temporal por revisión', 150, 25.50, 'Estante 2, Sección 2', 'expediente_b.pdf', 0, '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(3, 'C003', 'Expediente C-2023', 'Fondo Legal', 'Sección 1', 'Subsección C', 'Serie 3', 'Subserie 3', '2023-03-05', '2024-05-25', 'Expediente cerrado por resolución judicial', 75, 10.25, 'Estante 1, Sección 3', 'expediente_c.pdf', 1, '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(4, 'C004', 'Expediente D-2022', 'Fondo de Investigación', 'Sección 3', 'Subsección D', 'Serie 4', 'Subserie 4', '2022-07-20', '2023-12-10', 'Expediente completado, se archivó', 200, 40.10, 'Estante 3, Sección 2', 'expediente_d.pdf', 0, '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(5, 'C005', 'Expediente E-2023', 'Fondo Institucional', 'Sección 4', 'Subsección E', 'Serie 5', 'Subserie 5', '2023-06-11', '2024-01-05', 'Expediente completado por conclusión de actividad', 90, 18.30, 'Estante 4, Sección 1', 'expediente_e.pdf', 1, '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(6, 'C006', 'Expediente F-2024', 'Fondo Proyectos', 'Sección 5', 'Subsección F', 'Serie 6', 'Subserie 6', '2024-03-15', '2024-09-30', 'Expediente cerrado por cancelación de proyecto', 120, 20.75, 'Estante 5, Sección 1', 'expediente_f.pdf', 0, '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(7, 'C007', 'Expediente G-2024', 'Fondo Administrativo', 'Sección 2', 'Subsección G', 'Serie 7', 'Subserie 7', '2024-04-25', '2024-11-15', 'Expediente cerrado por auditoría interna', 60, 12.50, 'Estante 2, Sección 2', 'expediente_g.pdf', 1, '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(8, 'C008', 'Expediente H-2023', 'Fondo de Conservación', 'Sección 6', 'Subsección H', 'Serie 8', 'Subserie 8', '2023-11-10', '2024-01-20', 'Cierre por finalización de la conservación', 130, 30.25, 'Estante 6, Sección 1', 'expediente_h.pdf', 0, '2024-11-30 03:54:58', '2024-11-30 03:54:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_historico`
--

CREATE TABLE `tb_historico` (
  `id_historico` bigint(20) UNSIGNED NOT NULL,
  `id_usuario_asigando` int(11) NOT NULL,
  `id_tramite` int(11) NOT NULL,
  `tipo_documento` varchar(255) NOT NULL,
  `valor_historico` text NOT NULL,
  `acceso_publico` tinyint(1) NOT NULL,
  `restricciones_acceso` text NOT NULL,
  `documentos_adjuntos` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_historico`
--

INSERT INTO `tb_historico` (`id_historico`, `id_usuario_asigando`, `id_tramite`, `tipo_documento`, `valor_historico`, `acceso_publico`, `restricciones_acceso`, `documentos_adjuntos`, `created_at`, `updated_at`) VALUES
(1, 24, 4, 'Revisión inicial', 'Se inició el proceso de revisión de documentos.', 1, 'Solo personal autorizado.', '[\"documento1.pdf\", \"documento2.pdf\"]', '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(2, 26, 5, 'Documentación adicional requerida', 'Se solicitó más documentación para continuar con el trámite.', 0, 'Acceso solo para usuarios internos.', '[\"documento3.pdf\"]', '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(3, 30, 6, 'Archivado', 'El trámite fue archivado correctamente.', 1, 'Acceso libre.', '[]', '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(4, 29, 7, 'Revisión de documentos', 'En espera de revisión por el equipo correspondiente.', 1, 'Acceso solo a los administradores.', '[\"documento4.pdf\"]', '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(5, 34, 8, 'Calidad de digitalización', 'Verificación de calidad en el proceso de digitalización.', 0, 'Acceso solo a los supervisores de calidad.', '[\"documento5.pdf\"]', '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(6, 38, 9, 'Tecnología', 'Se está esperando la nueva tecnología para continuar.', 0, 'Solo personal de tecnología.', '[\"documento6.pdf\"]', '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(7, 32, 10, 'Seguridad completada', 'Proceso de seguridad completado y archivado.', 1, 'Acceso libre.', '[\"documento7.pdf\"]', '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(8, 33, 11, 'Consulta pendiente', 'Esperando la aprobación de consulta.', 1, 'Acceso público.', '[]', '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(9, 40, 12, 'Conservación en marcha', 'El proceso de conservación está en marcha.', 0, 'Solo para los encargados de conservación.', '[\"documento8.pdf\"]', '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(10, 36, 13, 'Firma pendiente', 'Esperando la firma de documentos legales.', 0, 'Acceso solo para los firmantes.', '[\"documento9.pdf\"]', '2024-11-30 03:54:58', '2024-11-30 03:54:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_rol` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripccion` text NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `nombre`, `descripccion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Jefe de Archivo General', 'Responsable de la supervisión global del sistema de gestión documental. Tiene acceso completo para crear, editar, eliminar y supervisar todos los documentos y expedientes en las áreas de trámite, concentración e histórico. También gestiona la asignación de roles y usuarios.', 1, '2024-11-30 03:54:58', '2024-11-30 03:54:58'),
(2, 'Empleado de Trámite', 'Encargado de gestionar los documentos activos en la fase de trámite. Puede registrar nuevos expedientes, actualizarlos y agregar observaciones o documentos adjuntos. Tiene acceso limitado solo a la vista de los documentos en trámite.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(3, 'Empleado de Concentración', 'Gestiona los expedientes que han terminado su ciclo activo y han pasado a la fase de concentración. Puede registrar el cierre de trámites, digitalizar expedientes y asignar ubicaciones físicas. No tiene acceso a la creación ni edición de documentos en trámite o histórico.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(4, 'Empleado de Histórico', 'Maneja documentos de valor histórico y se encarga de su clasificación, descripción y acceso. Puede registrar documentos históricos, agregar información sobre su valor histórico y establecer restricciones de acceso. No puede modificar expedientes en trámite o concentración.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(5, 'Administrador de Usuarios', 'Gestiona la creación, edición y eliminación de usuarios y asignación de roles. Tiene acceso a las funcionalidades relacionadas con la administración de cuentas y control de accesos.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(6, 'Supervisor de Calidad', 'Revisa y aprueba la calidad de los documentos digitalizados y su correcto almacenamiento en el sistema. Puede devolver expedientes para correcciones o dar el visto bueno para su paso a la siguiente fase.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(7, 'Consultor', 'Usuario con acceso de solo lectura a expedientes específicos, principalmente para auditorías o revisiones. Puede consultar documentos en las áreas de trámite, concentración e histórico, pero no puede realizar modificaciones.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(8, 'Empleado de Tecnología', 'Gestiona el módulo de monitoreo de temperatura y humedad y se encarga de la integración de datos provenientes de dispositivos IoT como Arduino. También colabora con el mantenimiento y actualización de las funcionalidades técnicas del sistema.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(9, 'Investigador/Historiador', 'Usuario especializado que puede acceder a documentos históricos con permisos especiales. Tiene la capacidad de consultar y solicitar acceso a documentos con restricciones.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(10, 'Usuario Externo Autorizado', 'Accede solo a documentos públicos o autorizados para consulta, ideal para ciudadanos o investigadores externos. Tiene un acceso limitado y controlado, sin permisos de edición.', 1, '2024-11-30 03:54:59', '2024-11-30 03:54:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tramite`
--

CREATE TABLE `tb_tramite` (
  `id_tramite` bigint(20) UNSIGNED NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_limite` date NOT NULL,
  `estado` varchar(255) NOT NULL,
  `observaciones` text NOT NULL,
  `documentos_adjuntos` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_tramite`
--

INSERT INTO `tb_tramite` (`id_tramite`, `id_area`, `id_usuario`, `fecha_inicio`, `fecha_limite`, `estado`, `observaciones`, `documentos_adjuntos`, `created_at`, `updated_at`) VALUES
(1, 1, 24, '2024-11-05', '2024-11-12', 'Pendiente', 'Proceso de revisión inicial', '[\"documento1.pdf\",\"documento2.pdf\"]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(2, 2, 26, '2024-11-06', '2024-11-15', 'En proceso', 'Requiere más documentación', '[\"documento3.pdf\"]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(3, 4, 30, '2024-11-07', '2024-11-20', 'Finalizado', 'Archivado correctamente', '[]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(4, 3, 29, '2024-11-08', '2024-11-12', 'Pendiente', 'En espera de revisión', '[\"documento4.pdf\"]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(5, 6, 34, '2024-11-09', '2024-11-18', 'En proceso', 'Verificando la calidad de digitalización', '[\"documento5.pdf\"]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(6, 7, 38, '2024-11-10', '2024-11-17', 'Pendiente', 'A la espera de nueva tecnología', '[\"documento6.pdf\"]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(7, 8, 32, '2024-11-11', '2024-11-25', 'Finalizado', 'Proceso de seguridad completado', '[\"documento7.pdf\"]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(8, 9, 33, '2024-11-12', '2024-11-22', 'Pendiente', 'Esperando la aprobación de consulta', '[]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(9, 10, 28, '2024-11-13', '2024-11-30', 'En proceso', 'Proceso de conservación en marcha', '[\"documento8.pdf\"]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(10, 11, 36, '2024-11-14', '2024-11-21', 'Pendiente', 'Esperando firma de documentos legales', '[\"documento9.pdf\"]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(11, 5, 34, '2024-11-15', '2024-11-30', 'En proceso', 'Gestión de permisos de usuario en progreso', '[\"documento10.pdf\"]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(12, 12, 40, '2024-11-16', '2024-11-25', 'Finalizado', 'Proyecto documental finalizado exitosamente', '[\"documento11.pdf\"]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(13, 2, 25, '2024-11-17', '2024-11-22', 'Pendiente', 'Requiere validación de documentos', '[\"documento12.pdf\"]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(14, 1, 27, '2024-11-18', '2024-11-28', 'Pendiente', 'Documentos archivados parcialmente', '[\"documento13.pdf\"]', '2024-11-30 03:54:59', '2024-11-30 03:54:59'),
(15, 4, 31, '2024-11-19', '2024-11-26', 'Finalizado', 'Proceso de archivo histórico completado', '[]', '2024-11-30 03:54:59', '2024-11-30 03:54:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidoP` varchar(255) NOT NULL,
  `apellidoM` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nombre`, `apellidoP`, `apellidoM`, `sexo`, `fecha_nacimiento`, `email`, `password`, `rol`, `foto`, `activo`, `verification_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Ilse', 'Ventura', 'Calixto', 'Femenino', '1975-03-25', 'admin@ayuntamiento.com.mx', '$2y$12$//LdBkOi/thpwjLvvkOFxuwtBNWlrMzxfSdEfDw3kyf9oYtmTPq3q', 'Jefe de archivo general', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:50', '2024-11-30 03:54:50'),
(2, 'José', 'Martínez', 'Pérez', 'Masculino', '1982-11-05', 'jose.martinez@ayuntamiento.com.mx', '$2y$12$fbkUqgaqjPNySW7W4.AyXO6do9/iI8mpzQGJ6QP5ojMdM6uHTr.Ri', 'Jefe de archivo general', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:50', '2024-11-30 03:54:50'),
(3, 'Ana', 'González', 'Ruiz', 'Femenino', '1992-06-10', 'ana.gonzalez@ayuntamiento.com.mx', '$2y$12$1Mp1y7F.DL8PyALJtMivI.dgvgUObrR.efa7AUIWcNi3116fRddN.', 'Empleado de Trámite', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:50', '2024-11-30 03:54:50'),
(4, 'Luis', 'Suárez', 'Vázquez', 'Masculino', '1995-01-17', 'luis.suarez@ayuntamiento.com.mx', '$2y$12$4kzqBql8uRTvZNzXlXMBd.VuhBGHCu3twAWPe/X9y143jM3qkU.5u', 'Empleado de Trámite', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:51', '2024-11-30 03:54:51'),
(5, 'Carlos', 'Pérez', 'Torres', 'Masculino', '1988-09-14', 'carlos.perez@ayuntamiento.com.mx', '$2y$12$wFzdZmYzn4bjJs7wt6PV8eul1ceueKOX/6B7RrXaidfg5Ne/Ojzcu', 'Empleado de Concentración', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:51', '2024-11-30 03:54:51'),
(6, 'Beatriz', 'Ramírez', 'Gutiérrez', 'Femenino', '1986-12-30', 'beatriz.ramirez@ayuntamiento.com.mx', '$2y$12$hfk4Y/qL6kJ3ye/VIpevOuZbO2z7F2rouaSKEP6KINzMpO/anSi1.', 'Empleado de Concentración', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:51', '2024-11-30 03:54:51'),
(7, 'María', 'Lopez', 'Martínez', 'Femenino', '1990-08-10', 'maria.lopez@ayuntamiento.com.mx', '$2y$12$0nbCK8/eCYC4uGnMjH/bCeSlKzRjjDXBDMfNmMAJ52EivS8P1dKPG', 'Empleado de Histórico', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:52', '2024-11-30 03:54:52'),
(8, 'Carlos', 'Hernández', 'Sánchez', 'Masculino', '1985-02-20', 'carlos.hernandez@ayuntamiento.com.mx', '$2y$12$YJz/NraE69J0QT/Ek21KBOQG/SeEIOCnIsK71TvcOyfww4e9RGWz6', 'Empleado de Histórico', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:52', '2024-11-30 03:54:52'),
(9, 'Elena', 'Sánchez', 'Cabrera', 'Femenino', '1983-07-22', 'elena.sanchez@ayuntamiento.com.mx', '$2y$12$6fwlvBXnVRCSqD3SfnO19Of2MNbdwe8zcmJvTdMr5.7vccWPGRC6O', 'Administrador de Usuarios', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:53', '2024-11-30 03:54:53'),
(10, 'Mario', 'Rodríguez', 'Alvarez', 'Masculino', '1978-04-12', 'mario.rodriguez@ayuntamiento.com.mx', '$2y$12$omc.ZlCd/J2cZx5cMfvtd.ainUQHymOjT/eXTEROWVPsoJeRC2aXK', 'Administrador de Usuarios', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:53', '2024-11-30 03:54:53'),
(11, 'Victoria', 'Vázquez', 'Pérez', 'Femenino', '1984-02-05', 'victoria.vazquez@ayuntamiento.com.mx', '$2y$12$ZcnxLd/NcMMF43aH2MP4Muf6LdNdfdYKGaJUFpvGO/ezs9BkIvWzW', 'Supervisor de Calidad', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:53', '2024-11-30 03:54:53'),
(12, 'Raúl', 'González', 'Cruz', 'Masculino', '1993-11-19', 'raul.gonzalez@ayuntamiento.com.mx', '$2y$12$bd/YWw27EW4UhthVV6UGduKHOFChPFuuU4Jyx161pXHVA8B1uK8sm', 'Supervisor de Calidad', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:54', '2024-11-30 03:54:54'),
(13, 'Pedro', 'Fernández', 'Gómez', 'Masculino', '1987-06-25', 'pedro.fernandez@consultor.com.mx', '$2y$12$icC8U9Qg8QIuR6mReRAV5OsKORa9aXrjcYTvv23cTNV56mVli6o8C', 'Consultor', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:54', '2024-11-30 03:54:54'),
(14, 'Sofía', 'Ramírez', 'López', 'Femenino', '1994-09-18', 'sofia.ramirez@consultor.com.mx', '$2y$12$/REwElEVTOXvPQMZqZI0xu5deZTP17sdTPHWbL1E3MJ5fFMLaXjxq', 'Consultor', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:54', '2024-11-30 03:54:54'),
(15, 'Fernando', 'Alvarado', 'Salazar', 'Masculino', '1991-01-08', 'fernando.alvarado@tecnologia.com.mx', '$2y$12$pZdUODNHE9VJBiEXLw60FOrhM2Szj9feHZ6AoguUfrA3Y6ThpkXwC', 'Empleado de Tecnología', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:55', '2024-11-30 03:54:55'),
(16, 'Lucía', 'Castillo', 'Martínez', 'Femenino', '1989-12-15', 'lucia.castillo@tecnologia.com.mx', '$2y$12$GLr3rJkDoC8Fj1ChO/e4VORQgodjJfv3JIwyrAN33pcLx.PMHWzTC', 'Empleado de Tecnología', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:55', '2024-11-30 03:54:55'),
(17, 'Raquel', 'Mendoza', 'Fuentes', 'Femenino', '1984-03-02', 'raquel.mendoza@investigador.com.mx', '$2y$12$4Y4NBUjH8yVceqXUwHadLOL8OMn4FTvxaWxJs3Ab.VHwFY6gdqlre', 'Investigador/Historiador', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:56', '2024-11-30 03:54:56'),
(18, 'Juan', 'Gutiérrez', 'Salazar', 'Masculino', '1990-05-25', 'juan.gutierrez@investigador.com.mx', '$2y$12$ru.yL.1noASxez/eGKsnHeO6kcP5FIouL6.6lPwCYiIxEd41d5KCW', 'Investigador/Historiador', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:56', '2024-11-30 03:54:56'),
(19, 'Luis', 'Torres', 'Paredes', 'Masculino', '2000-10-10', 'luis.torres@externo.com.mx', '$2y$12$EXkonPNjApxHp3fUvGtWju/Urvz7vgIDUNoYbiBxXxDBIo10bZ2E2', 'Usuario Externo Autorizado', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:56', '2024-11-30 03:54:56'),
(20, 'Clara', 'Hernández', 'González', 'Femenino', '1998-03-18', 'clara.hernandez@externo.com.mx', '$2y$12$cXUKw8rDHKDYKYlZCRMKcuBg36HjAgX4wAn5EGyOMUmLYExXXaz4.', 'Usuario Externo Autorizado', 'foto_default.jpg', 1, NULL, NULL, '2024-11-30 03:54:57', '2024-11-30 03:54:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario_area_rol`
--

CREATE TABLE `tb_usuario_area_rol` (
  `id_usuario_area_rol` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_area` bigint(20) UNSIGNED NOT NULL,
  `id_rol` bigint(20) UNSIGNED NOT NULL,
  `fecha_asignacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_area`
--

CREATE TABLE `usuario_area` (
  `id_usuario_area` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_area_rol`
--

CREATE TABLE `usuario_area_rol` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `tb_areas`
--
ALTER TABLE `tb_areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `tb_concentracion`
--
ALTER TABLE `tb_concentracion`
  ADD PRIMARY KEY (`id_concentracion`);

--
-- Indices de la tabla `tb_historico`
--
ALTER TABLE `tb_historico`
  ADD PRIMARY KEY (`id_historico`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_tramite`
--
ALTER TABLE `tb_tramite`
  ADD PRIMARY KEY (`id_tramite`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `tb_usuario_area_rol`
--
ALTER TABLE `tb_usuario_area_rol`
  ADD PRIMARY KEY (`id_usuario_area_rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuario_area`
--
ALTER TABLE `usuario_area`
  ADD PRIMARY KEY (`id_usuario_area`);

--
-- Indices de la tabla `usuario_area_rol`
--
ALTER TABLE `usuario_area_rol`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_areas`
--
ALTER TABLE `tb_areas`
  MODIFY `id_area` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tb_concentracion`
--
ALTER TABLE `tb_concentracion`
  MODIFY `id_concentracion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_historico`
--
ALTER TABLE `tb_historico`
  MODIFY `id_historico` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_rol` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tb_tramite`
--
ALTER TABLE `tb_tramite`
  MODIFY `id_tramite` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tb_usuario_area_rol`
--
ALTER TABLE `tb_usuario_area_rol`
  MODIFY `id_usuario_area_rol` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_area`
--
ALTER TABLE `usuario_area`
  MODIFY `id_usuario_area` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_area_rol`
--
ALTER TABLE `usuario_area_rol`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
