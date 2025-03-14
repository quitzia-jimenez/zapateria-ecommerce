document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.menu-perfil-cliente-item');
    const profileSections = document.querySelectorAll('.contenido-perfil-cliente');
    menuItems.forEach(item => {
        if (!item.classList.contains('log-out')) {
            item.addEventListener('click', function () {
                menuItems.forEach(mi => mi.classList.remove('active'));
                this.classList.add('active');
                profileSections.forEach(section => {
                    section.classList.add('hidden');
                });
                const sectionId = `${this.getAttribute('data-section')}-section`;
                document.getElementById(sectionId).classList.remove('hidden');
            });
        }
    });
    const logoutBtn = document.querySelector('.log-out');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function () {
            if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
                window.location.href = './index.html';
            }
        });
    }
    const viewOrderBtns = document.querySelectorAll('.view-order, .order-action');
    viewOrderBtns.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            alert('Funcionalidad de visualización de pedido en desarrollo.');
        });
    });
    const wishlistActions = document.querySelectorAll('.wishlist-action-btn');
    wishlistActions.forEach(action => {
        action.addEventListener('click', function (e) {
            e.preventDefault();
            const isRemove = this.classList.contains('remove-from-wishlist');
            const isAddToCart = this.classList.contains('add-to-cart');

            if (isRemove) {
                const wishlistItem = this.closest('.wishlist-item');
                if (confirm('¿Estás seguro de que deseas eliminar este producto de tu lista de deseos?')) {
                    // Obtener todos los elementos de la lista de deseos
                    const wishlistContainer = wishlistItem.parentElement;
                    const allItems = Array.from(wishlistContainer.querySelectorAll('.wishlist-item'));
                    const currentIndex = allItems.indexOf(wishlistItem);
                    
                    // Animación de desvanecimiento para el elemento eliminado
                    wishlistItem.style.transition = 'opacity 0.3s ease';
                    wishlistItem.style.opacity = '0';
                    
                    // Guardar el ancho y la posición del elemento para la animación
                    const itemWidth = wishlistItem.offsetWidth;
                    const itemMargin = parseInt(window.getComputedStyle(wishlistItem).marginRight) || 0;
                    const totalWidth = itemWidth + itemMargin;
                    
                    setTimeout(() => {
                        // Aplicar animación de deslizamiento a los elementos siguientes
                        for (let i = currentIndex + 1; i < allItems.length; i++) {
                            const nextItem = allItems[i];
                            // Asegurarse de que tiene posición relativa para la animación
                            nextItem.style.position = 'relative';
                            nextItem.style.transition = 'transform 0.5s ease';
                            nextItem.style.transform = `translateX(-${totalWidth}px)`;
                        }
                        
                        // Eliminar el elemento después de la animación
                        setTimeout(() => {
                            wishlistItem.remove();
                            
                            // Restaurar las posiciones originales después del reflow del DOM
                            requestAnimationFrame(() => {
                                allItems.forEach(item => {
                                    if (item !== wishlistItem) {
                                        item.style.transition = 'transform 0s';
                                        item.style.transform = 'translateX(0)';
                                    }
                                });
                            });
                        }, 500);
                    }, 300);
                }
            } else if (isAddToCart) {
                alert('Producto añadido al carrito correctamente.');
            }
        });
    });
    const addressEditBtns = document.querySelectorAll('.address-edit');
    const addressDeleteBtns = document.querySelectorAll('.address-delete');
    const addAddressBtn = document.querySelector('.add-address-btn button');

    addressEditBtns.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            alert('Funcionalidad de edición de dirección en desarrollo.');
        });
    });

    addressDeleteBtns.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            if (confirm('¿Estás seguro de que deseas eliminar esta dirección?')) {
                alert('Dirección eliminada correctamente.');
            }
        });
    });

    if (addAddressBtn) {
        addAddressBtn.addEventListener('click', function () {
            alert('Funcionalidad de agregar dirección en desarrollo.');
        });
    }
    const accountForm = document.querySelector('#account-section form');
    if (accountForm) {
        accountForm.addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Información de cuenta actualizada correctamente.');
        });
    }
    const notificationToggles = document.querySelectorAll('.custom-control-input');
    const notificationSaveBtn = document.querySelector('.notification-actions button');

    if (notificationSaveBtn) {
        notificationSaveBtn.addEventListener('click', function () {
            alert('Preferencias de notificación guardadas correctamente.');
        });
    }
    if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
        const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        tooltips.forEach(tooltip => {
            new bootstrap.Tooltip(tooltip);
        });
    }
});

// Funcionalidad del Modal
document.addEventListener('DOMContentLoaded', function() {
    const modalGenerico = document.getElementById('modalGenerico');
    const botonCerrarModal = document.getElementById('botonCerrarModal');
    const botonCancelarModal = document.getElementById('botonCancelarModal');
    const botonAceptarModal = document.getElementById('botonAceptarModal');
    
    function mostrarModal() {
        modalGenerico.classList.add('mostrar');
        document.body.style.overflow = 'hidden';
    }
    
    function ocultarModal() {
        modalGenerico.classList.remove('mostrar');
        document.body.style.overflow = '';
    }

    botonCerrarModal.addEventListener('click', ocultarModal);
    botonCancelarModal.addEventListener('click', ocultarModal);
    
    botonAceptarModal.addEventListener('click', function() {
        alert('Acción aceptada');
        ocultarModal();
    });

    modalGenerico.addEventListener('click', function(e) {
        if (e.target === modalGenerico) {
            ocultarModal();
        }
    });
    
    const botonesAbrirModal = document.querySelectorAll('.abrir-modal');
    botonesAbrirModal.forEach(boton => {
        boton.addEventListener('click', mostrarModal);
    });
    
    window.crearModal = function(titulo, mensaje, callbackAceptar = null) {
        document.querySelector('.modal-titulo').textContent = titulo;
        document.querySelector('.modal-cuerpo').innerHTML = `<p>${mensaje}</p>`;
        
        if (callbackAceptar) {
            botonAceptarModal.onclick = function() {
                callbackAceptar();
                ocultarModal();
            };
        } else {
            botonAceptarModal.onclick = function() {
                ocultarModal();
            };
        }
        mostrarModal();
    };
});