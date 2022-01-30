<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<title>Delegacion de Eventos</title>
    <style>
        * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Roboto', sans-serif;
  background: #343E46;
}

a {
  text-decoration: none;
}

.contenedor {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.lista {
  width: 500px;
}

.lista a {
  padding: 20px;
  font-size: 18px;
  display: block;
  background: #535e66;
  color: #fff;
  margin-bottom: 20px;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  transition: .3s ease all;
}

.lista a:hover {
  background: #E86B19;
}

.lista a i {
  display: none;
}

.lista a.activo i {
  display: block;
}

.btn-agregar {
  background: #E86B19;
  border-radius: 5px;
  padding: 20px;
  cursor: pointer;
  font-size: 18px;
  color: #fff;
  border: none;
  margin-bottom: 20px;
  transition: .3s ease all;
}

.btn-agregar:hover {
  background: #da6315;
}

    </style>
</head>
<body>
	<div class="contenedor">
		<button class="btn-agregar" id="btn-agregar">Agregar Elemento</button>
		<div class="lista" id="lista">
			<a href="#">
				Elemento <i class="bi bi-check-square-fill"></i>
			</a>
			<a href="#">
				Elemento <i class="bi bi-check-square-fill"></i>
			</a>
			<a href="#">
				Elemento <i class="bi bi-check-square-fill"></i>
			</a>
		</div>
	</div>
</body>
    <script>
        const lista = document.getElementById('lista');
        const btnAgregar = document.getElementById('btn-agregar');

        lista.addEventListener('click', (e) =>{
            console.log('Hicises click contenedor');
            if(e.target && e.target.tagName === 'A'){
                e.target.classList.toggle('Activo');
                console.log('Hola');
            }
        });

        btnAgregar.addEventListener('click', () => {
            const elemento = `
                <a href="#">
                    Elemento <i class="bi bi-check-square-fill"></i>
                </a>
            `;

            lista.innerHTML += elemento;
        });
    </script>
</html>