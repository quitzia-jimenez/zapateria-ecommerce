
document.addEventListener('DOMContentLoaded', function () {
    const entradas = document.querySelectorAll('.entradaTexto');

    entradas.forEach((entrada, index) => {
        setTimeout(() => {
            entrada.style.transition = 'all 0.5s ease';
            entrada.style.opacity = '1';
            entrada.style.transform = 'translateY(0)';
        }, 300 * index);
    });

    const formulario = document.querySelector('.formularioLogin');
    const usuario = document.getElementById('usuario');
    const contrasena = document.getElementById('contrasena');

    formulario.addEventListener('submit', function (e) {
        e.preventDefault();

        let esValido = true;

        if (usuario.value.trim() === '') {
            animarError(usuario);
            esValido = false;
        }

        if (contrasena.value.trim() === '') {
            animarError(contrasena);
            esValido = false;
        }

        if (esValido) {
            const boton = document.querySelector('.botonIniciar');
            boton.innerHTML = 'CARGANDO...';

            setTimeout(() => {
                alert('¡Bienvenido al Sistema de Inventario BOMU!');
                boton.innerHTML = 'INICIAR SESIÓN';
            }, 2000);
        }
    });

    function animarError(elemento) {
        elemento.style.boxShadow = '0 0 0 2px #ff3860';
        elemento.style.animation = 'sacudir 0.5s';

        setTimeout(() => {
            elemento.style.animation = '';
        }, 500);
    }

    document.head.insertAdjacentHTML('beforeend', `
<style>
  @keyframes sacudir {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-10px); }
    75% { transform: translateX(10px); }
  }
</style>
`);
});
