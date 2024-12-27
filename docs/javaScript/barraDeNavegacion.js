        // Lógica para desplegar y ocultar el menú
        document.getElementById('menu-toggle-Pequenios').addEventListener('click', function() {
            const menu = document.getElementById('navbar-menu-Pequenios');
            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'block'; // Muestra el menú
            } else {
                menu.style.display = 'none'; // Oculta el menú
            }
        });