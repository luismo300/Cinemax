document.addEventListener("DOMContentLoaded", function() {
    const wrap = document.querySelector('.album-wrap');
    const albums = document.querySelectorAll('.album');
    const prev = document.querySelector('.prev');
    const next = document.querySelector('.next');
    let index = 0;

    function updateCarousel() {
        wrap.style.transform = `translateX(-${index * 20}%)`;
    }

    next.addEventListener('click', function() {
        if (index < albums.length - 4) {
            index++;
            updateCarousel();
        }
    });

    prev.addEventListener('click', function() {
        if (index > 0) {
            index--;
            updateCarousel();
        }
    });
});



/*
function logout() {
    // Ocultar cuentaAbierta y mostrar cuentaCerrada
    
    localStorage.setItem('loggedIn', 'false');
    document.getElementById('cuentaAbierta').style.display = 'none';
    document.getElementById('cuentaCerrada').style.display = 'block';
    saveMenuState({ isLoggedIn: false });
}


    document.addEventListener('DOMContentLoaded', function() {
        var menuState = loadMenuState();
        if (menuState.isLoggedIn) {
            document.getElementById('cuentaCerrada').style.display = 'none';
            document.getElementById('cuentaAbierta').style.display = 'block';
        } else {
            document.getElementById('cuentaCerrada').style.display = 'block';
            document.getElementById('cuentaAbierta').style.display = 'none';
        }
    });
    */
    /*
    function handleSubmit(event) {
        event.preventDefault();
    
        
    
        // Simular autenticación exitosa
        localStorage.setItem('loggedIn', 'true');
        document.getElementById('cuentaCerrada').style.display = 'none';
        document.getElementById('cuentaAbierta').style.display = 'block';
        saveMenuState({ isLoggedIn: true });
        closeForm();
        return false;
    }
 */
    
    function showLoginForm() {
      var registerForm = document.getElementById('registerForm');
      var loginForm = document.getElementById('loginForm');
      loginForm.style.display = 'block';
      registerForm.style.display = 'none'; // Ocultar formulario de registro si está visible
      overlay.style.display = 'block';
      saveMenuState({ isLoggedIn: true });
      loginForm.reset();
      registerForm.reset();

    }
