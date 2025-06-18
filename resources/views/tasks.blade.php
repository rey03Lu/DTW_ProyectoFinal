<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
</head>
<body>
    <h1>Gestión de Tareas</h1>

    <!-- Formulario para crear una nueva tarea -->
    <form id="create-task-form">
        <h2>Crear Tarea</h2>
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea id="description" name="description"></textarea>
        <br>
        <label for="status">Estado:</label>
        <select id="status" name="status">
            <option value="pending">Pendiente</option>
            <option value="in_progress">En Progreso</option>
            <option value="completed">Completada</option>
        </select>
        <br>
        <button type="submit">Crear</button>
    </form>

    <!-- Lista de tareas -->
    <h2>Lista de Tareas</h2>
    <ul id="task-list">
        <!-- Las tareas se cargarán aquí -->
    </ul>

    <script>
        // Función para cargar las tareas
        async function loadTasks() {
            const response = await fetch('/api/tasks');
            const tasks = await response.json();

            const taskList = document.getElementById('task-list');
            taskList.innerHTML = '';

            tasks.forEach(task => {
                const li = document.createElement('li');
                li.textContent = `${task.title} - ${task.status}`;
                taskList.appendChild(li);
            });
        }

        // Función para crear una nueva tarea
        document.getElementById('create-task-form').addEventListener('submit', async (event) => {
            event.preventDefault();

            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData.entries());

            await fetch('/api/tasks', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });

            event.target.reset();
            loadTasks();
        });

        // Cargar las tareas al cargar la página
        loadTasks();
    </script>
</body>
</html>
