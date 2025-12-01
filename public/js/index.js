// // Igualar alturas de .hover-info en combos (respaldo)
// function equalizeComboInfoHeights() {
//     const infos = document.querySelectorAll('.container-combos-home .hover-info');
//     if (!infos.length) return;
//     // reset
//     infos.forEach(i => i.style.minHeight = '0px');
//     // recompute con las imágenes ya cargadas
//     let maxH = 0;
//     infos.forEach(i => {
//         const h = i.getBoundingClientRect().height;
//         if (h > maxH) maxH = h;
//     });
//     infos.forEach(i => i.style.minHeight = maxH + 'px');
// }

// // Ejecutar al load (asegura que las imágenes estén cargadas)
// window.addEventListener('load', () => {
//     equalizeComboInfoHeights();
// });

// // también al redimensionar (debounced)
// let _combosResize;
// window.addEventListener('resize', () => {
//     clearTimeout(_combosResize);
//     _combosResize = setTimeout(equalizeComboInfoHeights, 120);
// });

// // Observador: si algún nodo cambia dentro de la sección (p. ej. imágenes lazy-load),
// // recalculamos. Esto ayuda en casos en que la carga ocurre después del 'load'.
// const combosWrapper = document.querySelector('.container-combos-home');
// if (combosWrapper && 'MutationObserver' in window) {
//     const mo = new MutationObserver(() => {
//         // pequeño delay para esperar render
//         setTimeout(equalizeComboInfoHeights, 80);
//     });
//     mo.observe(combosWrapper, { childList: true, subtree: true, attributes: true });
// }


// Loader con animación de hongo rebotando
document.addEventListener("DOMContentLoaded", () => {
    const loader = document.getElementById("loader");
    const hongo = document.querySelector("#loader .hongo img");

    if (hongo) {
        // Animación de rebote con Web Animations API
        hongo.animate(
            [
                { transform: "translateY(0)" },
                { transform: "translateY(-30px)" },
                { transform: "translateY(0)" }
            ],
            {
                duration: 1200,
                iterations: Infinity,
                easing: "ease-in-out"
            }
        );

        // Mantener loader fijo por 3 segundos y luego ocultar
        setTimeout(() => {
            loader.style.display = "none";
        }, 1000);
    }
});


// * Función global para mostrar mensajes flotantes (usa Bootstrap classes) */
window.showFloatingMessage = window.showFloatingMessage || function (message, type = 'success') {
    try {
        const container = document.getElementById('floating-messages');
        if (!container || !message) return;

        const alert = document.createElement('div');
        alert.className = `alert alert-${type} alert-dismissible fade show`;
        alert.setAttribute('role', 'alert');
        alert.innerHTML = `
            <div>${message}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;

        // insertar al inicio (para que los más recientes queden arriba)
        container.insertBefore(alert, container.firstChild);

        // auto cierre a los 5 segundos
        setTimeout(() => {
            try {
                // usar clases de bootstrap para animar el cierre
                alert.classList.remove('show');
                alert.classList.add('fade');
                // remover después de la transición
                setTimeout(() => alert.remove(), 200);
            } catch (e) { alert.remove(); }
        }, 5000);
    } catch (e) {
        console.error('showFloatingMessage error:', e);
    }
};

// Mostrar mensajes de sesión (si existieron) — ejecuta cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function () {
    try {
        if (window.__flash) {
            if (window.__flash.message) {
                // showFloatingMessage debe estar definido globalmente (en app.blade o aquí)
                if (typeof showFloatingMessage === 'function') {
                    showFloatingMessage(window.__flash.message, 'success');
                } else {
                    // fallback sencillo si no existe la función
                    const fm = document.getElementById('floating-messages');
                    if (fm) {
                        const d = document.createElement('div');
                        d.className = 'alert alert-success';
                        d.innerText = window.__flash.message;
                        fm.appendChild(d);
                        setTimeout(() => d.remove(), 5000);
                    }
                }
            }
            if (window.__flash.error) {
                if (typeof showFloatingMessage === 'function') {
                    showFloatingMessage(window.__flash.error, 'danger');
                } else {
                    const fm = document.getElementById('floating-messages');
                    if (fm) {
                        const d = document.createElement('div');
                        d.className = 'alert alert-danger';
                        d.innerText = window.__flash.error;
                        fm.appendChild(d);
                        setTimeout(() => d.remove(), 5000);
                    }
                }
            }
            // limpiar para evitar duplicados en navegación JS
            window.__flash = null;
        }
    } catch (e) {
        // no romper la app por si hay error
        console.error('Flash render error:', e);
    }
});

// Actualizar contador del carrito (se ejecuta si el usuario está autenticado)
function updateCarritoCount() {
    try {
        if (!window.__routes || !window.__routes.carritoCount) return;
        fetch(window.__routes.carritoCount)
            .then(response => response.json())
            .then(data => {
                const badge = document.getElementById('carrito-count');
                if (badge && data.count > 0) {
                    badge.textContent = data.count;
                    badge.style.display = 'inline-block';
                } else if (badge) {
                    badge.style.display = 'none';
                }
            })
            .catch(error => console.error('Error al actualizar carrito:', error));
    } catch (e) {
        console.error('updateCarritoCount error:', e);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    try {
        if (window.__auth) {
            updateCarritoCount();
        }
    } catch (e) { /* no break */ }
});
