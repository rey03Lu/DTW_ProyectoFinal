<p align="center">
  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Escudo_de_la_Universidad_de_El_Salvador.svg/1200px-Escudo_de_la_Universidad_de_El_Salvador.svg.png" alt="LogoUes" width="20%" height="40%">
</p>
<p align="center">
    <img src="https://drive.google.com/uc?export=view&id=1K45h2JPReuWVNaSC_PmiPYmEIyGLCqeF" alt="LogoIDS" width="50%" height="100%">
</p>

# Proyecto Final- Desarrollo y Técnicas de Aplicaciones Web DTW135 - GT01

## 📘 Tema: Aplicación Web de Tareas Pendientes con Laravel 12
Este proyecto es una aplicación web desarrollada con **Laravel 12**, centrada en la gestión de **tareas pendientes**. Permite a los usuarios crear, editar, ver y eliminar tareas, con control de permisos basado en roles, validaciones tanto en frontend como backend, consumo de API externa y almacenamiento local para mejorar la experiencia del usuario.

## 🔑 Credenciales para iniciar sesión:
**Usuario:** admin <br>
**Contraseña:** 1234

## 🛠️ Tecnologías Utilizadas

- **Laravel 12**
- **PHP 8.3+**
- **SQLite**
- **Bootstrap 5**
- **JavaScript (ES6+)**
- **Axios**
- **LocalStorage / SessionStorage**
- **API REST Pública (por definir)**

## ⚙️ Funcionalidades implementadas

### 🗂️ CRUD de Tareas Pendientes
- **Crear tarea:** ingresar título, descripción, fecha límite, estado.
- **Editar tarea:** modificar contenido, estado o prioridad.
- **Ver tareas:** visualización de lista, detalles y estado.
- **Eliminar tarea:** con confirmación de seguridad.
- **Control de permisos:** mediante directivas `@can` y políticas según roles.
- **Validaciones:**
  - Backend: Laravel Validator (reglas definidas en el controlador).
  - Frontend: JavaScript con feedback visual usando Bootstrap.

### 🔐 Roles y Permisos
- Acceso diferenciado según el rol del usuario (por ejemplo, Admin y Usuario).
- Restricción de acciones con políticas y directivas `@can`.

### 💾 Almacenamiento Local
- Uso de `LocalStorage` para guardar datos temporales del usuario.
- Uso de `SessionStorage` para mantener estado durante la sesión activa.

### ⚙️ Funcionalidades JavaScript
- Uso de eventos como `click`, `submit`, entre otros.
- Funciones personalizadas para validación, manejo del DOM, etc.

### 🌐 Consumo de API REST Externa
> 📌 **Pendiente de integración**
- La aplicación consumirá una API REST pública (ejemplo: clima, tipo de cambio, noticias).
- Se utilizará `Axios` para enviar solicitudes HTTP.
- Las respuestas en formato JSON se mostrarán visualmente en cards, tablas o listas.

## 🖼️ Presentación Visual

- Basado en **Bootstrap 5** para un diseño responsivo y moderno.
- Se incluyen estilos personalizados para:
  - Validaciones en formularios.
  - Alertas de éxito/error.
  - Estados visuales de tareas (pendiente, en proceso, completada, etc).

## 👥 Integrantes del Grupo

1. BA22025 | Fernando José Barraza Álvarez
2. JQ22003 | Axel Rodrigo Juarez Quevedo
3. MM18069 | Wendy Carolina Mejía Martínez
4. MR21082 | Reyna Guadalupe Miranda Rivas
5. PM18077 | Francisco Javier Peraza Martínez
