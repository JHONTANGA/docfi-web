@include('layouts.header')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Perfil de Usuario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(135deg,rgb(255, 255, 255),rgb(32, 70, 73));
      margin: 0;
      padding: 40px 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .profile-card {
      background: #fff;
      padding: 30px 40px;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 480px;
      margin-top: 100px;
      transition: transform 0.3s ease;
    }

    .profile-card:hover {
      transform: translateY(-5px);
    }

    .profile-card h2 {
      text-align: center;
      color: #285EAF;
      margin-bottom: 25px;
      font-size: 24px;
    }

    .profile-info p {
      margin: 12px 0;
      font-size: 15px;
      color: #333;
    }

    .profile-info strong {
      color: #004455;
    }

    .editable {
      transition: all 0.2s ease;
      padding: 2px 4px;
      border-radius: 5px;
    }

    .editable[contenteditable="true"] {
      background-color: #f0f8ff;
      border: 1px dashed #0077b6;
    }

    .edit-btn {
      display: block;
      margin: 30px auto 15px;
      background-color: #285EAF;
      color: white;
      padding: 10px 30px;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .edit-btn:hover {
      background-color: #1b4b8a;
    }

    .info-section {
      margin-top: 20px;
      border-top: 1px solid #ddd;
      padding-top: 15px;
    }

    .section-title {
      font-weight: bold;
      color: #004455;
      margin-bottom: 10px;
      display: inline-block;
    }

    .info-section a {
      color: #285EAF;
      text-decoration: none;
      margin-right: 10px;
      font-size: 14px;
    }

    .info-section a:hover {
      text-decoration: underline;
    }

    @media (max-width: 500px) {
      .profile-card {
        padding: 25px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="profile-card">
    <h2>Perfil del Usuario</h2>

    <div class="profile-info">
      <p><strong>Nombres y apellidos:</strong> <span class="editable" contenteditable="false">Esteban Molina Castro</span></p>
      <p><strong>Documento de Identidad:</strong> <span class="editable" contenteditable="false">CC: 1092823345</span></p>
      <p><strong>Correo Electrónico:</strong> <span class="editable" contenteditable="false">esteb45@gmail.com</span></p>
      <p><strong>Teléfono de contacto:</strong> <span class="editable" contenteditable="false">345 8975688</span></p>
    </div>

    <button class="edit-btn" onclick="toggleEdit()">Editar Perfil</button>

    <div class="info-section">
      <span class="section-title">¿Necesitas ayuda?</span>
      <a href="{{ route('pqr') }}">PQR</a> |
      <a href="#">Soporte Técnico</a>
    </div>

    <div class="info-section">
      <span class="section-title">Cuenta</span>
      <a href="#">Cerrar sesión</a> |
      <a href="#">Eliminar cuenta</a>
    </div>
  </div>

  <script>
    function toggleEdit() {
      const fields = document.querySelectorAll('.editable');
      const button = document.querySelector('.edit-btn');
      const isEditing = fields[0].getAttribute('contenteditable') === 'true';

      fields.forEach(field => {
        field.setAttribute('contenteditable', !isEditing);
        if (!isEditing) field.focus();
      });

      button.textContent = isEditing ? 'Editar Perfil' : 'Guardar Cambios';
    }
  </script>
</body>
</html>



