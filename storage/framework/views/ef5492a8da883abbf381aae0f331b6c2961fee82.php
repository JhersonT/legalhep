<nav class="menu">
    <a href="<?php echo e(route('dashboard')); ?>" class="logo"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg>
    </a>
    <ul class="menu_items">
        <li><a href="<?php echo e(route("edit.perfil")); ?>">Mi Perfil</a></li>
        <li><a href="<?php echo e(route("change.password")); ?>">Cambiar Contraseña</a></li>
        <li class="cerrar-session">
            <form action="<?php echo e(route('logout')); ?>" method="POST" style="height: 2rem">
                <?php echo csrf_field(); ?>
                <button type="submit" style="background:rgba(0, 0, 0, 0.0);border:none;color:white;cursor: pointer; font-family: 'Sarala', sans-serif !important;font-size:17px">Cerrar
                    Sesión</button>
            </form>
        </li>
    </ul>
    <div id="hamburguer">
        <button>
            <span class="top-line"></span>
            <span class="middle-line"></span>
            <span class="bottom-line"></span>
        </button>
    </div>
</nav>
<?php /**PATH C:\Users\jhers\Desktop\fabriqa\repositorios\legalHelp\resources\views/miabogado/menu.blade.php ENDPATH**/ ?>