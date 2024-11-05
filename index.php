<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas para Estudiantes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h1>Gestión de Tareas para Estudiantes</h1>
    <form id="taskForm" action="guardar_tarea.php" method="POST">
        <input type="text" name="titulo" placeholder="Título" required>
        <textarea name="descripcion" placeholder="Descripción"></textarea>
        <input type="date" name="fecha_limite" required>
        <input type="text" name="materia" placeholder="Materia">
        <select name="prioridad">
            <option value="alta">Alta</option>
            <option value="media">Media</option>
            <option value="baja">Baja</option>
        </select>
        <button type="submit">Agregar Tarea</button>
    </form>

    <h2>Tareas:</h2>
    <ul id="taskList"></ul>

    <?php
    // Definición de variables de conexión
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gestion_tareas";

    // Conectar a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener las tareas
    $sql = "SELECT * FROM tareas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Salida de cada fila
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["titulo"] . " - " . $row["descripcion"] . " - " . $row["fecha_limite"] . " - " . $row["materia"] . " - " . $row["prioridad"] . "</li>";
        }
    } else {
        echo "No hay tareas.";
    }

    $conn->close();
    ?>

    <script src="script.js"></script>
</body>
</html>
