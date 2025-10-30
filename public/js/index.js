//Finaliza compra
document.addEventListener('DOMContentLoaded', function () {
    const finalizarBtn = document.querySelector('#finalizar-compra');
    if (finalizarBtn) {
        finalizarBtn.addEventListener('click', function (e) {
            e.preventDefault();
            const modal = new bootstrap.Modal(document.getElementById('modalCompraExitosa'));
            modal.show();
        });
    }


    const submitFormContact = document.querySelector('#form-contacto');
    if (submitFormContact) {
        submitFormContact.addEventListener('submit', function (e) {
            e.preventDefault();
            const modal = new bootstrap.Modal(document.getElementById('modalformContacto'));
            modal.show();
        });
    }
});


//Tabla a Cards Productos - Admin 
document.addEventListener("DOMContentLoaded", () => {
    const tabla = document.querySelector("#tablaProductos tbody");
    const cardsContainer = document.getElementById("cardsContainer");

    if (tabla && cardsContainer) {
        [...tabla.rows].forEach(row => {
            const celdas = row.cells;

            const card = document.createElement("div");
            card.className = "card-producto-admin mb-3 p-3 bg-cream borde-verde rounded";

            const header = document.createElement("div");
            header.className = "d-flex align-items-center mb-2";
            header.innerHTML = `
        ${celdas[1].innerHTML}
        <h5 class="mb-0 ms-2">${celdas[2].innerText}</h5>
      `;
            card.appendChild(header);

            const info = document.createElement("div");
            info.innerHTML = `
        <p class="mb-1"><strong>Categoría:</strong> ${celdas[3].innerText}</p>
        <p class="mb-1"><strong>Etiqueta:</strong> ${celdas[4].innerText}</p>
        <p class="mb-1"><strong>Precio:</strong> ${celdas[5].innerText}</p>
        <p class="mb-2"><strong>Stock:</strong> ${celdas[6].innerText}</p>
      `;
            card.appendChild(info);

            const acciones = document.createElement("div");
            acciones.innerHTML = celdas[7].innerHTML;
            card.appendChild(acciones);

            cardsContainer.appendChild(card);
        });
    }
});


//Tabla a Cards Categorias - Admin
document.addEventListener("DOMContentLoaded", () => {
    const tablaCategorias = document.querySelector("#tablaCategorias tbody");

    const cardsCategoriasContainer = document.getElementById("cardsCategoriasContainer");

    if (tablaCategorias && cardsCategoriasContainer) {
        [...tablaCategorias.rows].forEach(row => {
            const celdas = row.cells;

            const card = document.createElement("div");
            card.className = "card-producto-admin mb-3 p-3 bg-cream borde-verde rounded";

            // Header con nombre + ID
            const header = document.createElement("div");
            header.className = "d-flex justify-content-between align-items-center mb-2";
            header.innerHTML = `
        <h5 class="mb-0 text-umami">${celdas[1].innerText}</h5>
        <small class="text-secondary">ID: ${celdas[0].innerText}</small>
      `;
            card.appendChild(header);

            // Descripción
            const descripcion = document.createElement("p");
            descripcion.className = "mb-2";
            descripcion.innerHTML = `<strong>Descripción:</strong> ${celdas[2].innerText}`;
            card.appendChild(descripcion);

            // Acciones (se copian los botones de la tabla)
            const acciones = document.createElement("div");
            acciones.className = "d-flex gap-2";
            acciones.innerHTML = celdas[3].innerHTML;
            card.appendChild(acciones);

            // Agrego la card al contenedor
            cardsCategoriasContainer.appendChild(card);
        });
    }
});

// Igualar alturas de .hover-info en combos (respaldo)
function equalizeComboInfoHeights() {
    const infos = document.querySelectorAll('.container-combos-home .hover-info');
    if (!infos.length) return;
    // reset
    infos.forEach(i => i.style.minHeight = '0px');
    // recompute con las imágenes ya cargadas
    let maxH = 0;
    infos.forEach(i => {
        const h = i.getBoundingClientRect().height;
        if (h > maxH) maxH = h;
    });
    infos.forEach(i => i.style.minHeight = maxH + 'px');
}

// Ejecutar al load (asegura que las imágenes estén cargadas)
window.addEventListener('load', () => {
    equalizeComboInfoHeights();
});

// también al redimensionar (debounced)
let _combosResize;
window.addEventListener('resize', () => {
    clearTimeout(_combosResize);
    _combosResize = setTimeout(equalizeComboInfoHeights, 120);
});

// Observador: si algún nodo cambia dentro de la sección (p. ej. imágenes lazy-load),
// recalculamos. Esto ayuda en casos en que la carga ocurre después del 'load'.
const combosWrapper = document.querySelector('.container-combos-home');
if (combosWrapper && 'MutationObserver' in window) {
    const mo = new MutationObserver(() => {
        // pequeño delay para esperar render
        setTimeout(equalizeComboInfoHeights, 80);
    });
    mo.observe(combosWrapper, { childList: true, subtree: true, attributes: true });
}


// Tabla a Cards Usuarios - Admin
document.addEventListener("DOMContentLoaded", () => {
    const tablaUsuarios = document.querySelector("#tablaUsuarios tbody");
    const cardsContainer = document.getElementById("cardsUsuariosContainer");

    if (tablaUsuarios && cardsContainer) {
        [...tablaUsuarios.rows].forEach(row => {
            const celdas = row.cells;

            const card = document.createElement("div");
            card.className = "card-usuario-admin mb-3 p-3 bg-cream borde-verde rounded shadow-sm";

            // Header
            const header = document.createElement("div");
            header.className = "d-flex align-items-center mb-2";
            header.innerHTML = `
                <i class="bi bi-person-circle fs-4 me-2 text-umami"></i>
                <h5 class="mb-0 text-umami">${celdas[0].innerText}</h5>
            `;
            card.appendChild(header);

            // Info
            const info = document.createElement("div");
            info.innerHTML = `
                <p class="mb-1"><strong>Email:</strong> ${celdas[1].innerText}</p>
                <p class="mb-1"><strong>Teléfono:</strong> ${celdas[2].innerText}</p>
                <p class="mb-1"><strong>Ciudad:</strong> ${celdas[3].innerText}</p>
                <p class="mb-1"><strong>Dirección de envío:</strong> Av. Siempre Viva 123</p>
                <p class="mb-1"><strong>Rol:</strong> ${celdas[4].innerText}</p>
                <p class="mb-1"><strong>Desde:</strong> ${celdas[5].innerText}</p>
            `;
            card.appendChild(info);

            // Acciones
            const acciones = document.createElement("div");
            acciones.className = "d-flex gap-2 mt-3";
            acciones.innerHTML = celdas[6].innerHTML;
            card.appendChild(acciones);

            cardsContainer.appendChild(card);
        });
    }
});






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

