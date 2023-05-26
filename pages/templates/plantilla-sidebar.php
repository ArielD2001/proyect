<div class="leftside-menu" style="max-height: 100vh;  position: fixed">
    <a href="home" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="../assets/images/logo.png" alt="" height="60" draggable="false">
        </span>
        <span class="logo-sm mt-1">
            <img src="../assets/images/logo_sm.png" alt="" height="35">
        </span>
    </a>

    <!-- LOGO -->
    <a href="home" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="../assets/images/logo-dark.png" alt="" height="60" draggable="false">
        </span>
        <span class="logo-sm mt-1">
            <img src="../assets/images/logo_sm.png" alt="" height="35">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">


            <li class="side-nav-title side-nav-item">Menu</li>
            <?php 
            if(!isset($_SESSION['admin'])){
                ?>
            <li class="side-nav-item">
                <a href="home" aria-expanded="false"  <?php if(isset($home)){echo 'style="background:#fd7e14 !important; "';} ?> class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Inicio </span>
                </a>

            </li>
            <li class="side-nav-item">
                <a href="listas.php " aria-expanded="false" class="side-nav-link" <?php if(isset($listactive)){echo 'style="background:#fd7e14 !important; color:white"' ;} ?> >
                    <i class="uil-key-skeleton"></i>
                    <span> Listas </span>
                </a>

            </li>
            

            
                <li class="side-nav-title side-nav-item">Modulos</li>

<li class="side-nav-item">
    <a href="1promoyprev" class="side-nav-link" <?php if(isset($pypactive)){echo 'style="background:#fd7e14 !important"';} ?> >
        <i class="uil-calender"></i>
        <span> Promoción y prevención</span>
    </a>
</li>

<li class="side-nav-item">
    <a href="2activbasicas" class="side-nav-link" <?php if(isset($actactive)){echo 'style="background:#fd7e14 !important"';} ?> >
        <i class="uil-comments-alt"></i>
        <span> Actividades Básicas </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="3cuimedico" aria-expanded="false" <?php if(isset($cuiactive)){echo 'style="background:#fd7e14 !important"';} ?> aria-controls="sidebarEcommerce" class="side-nav-link">
        <i class="uil-store"></i>
        <span> Cuidado medico </span>

    </a>

</li>

<li class="side-nav-item">
    <a href="4cuimaterno" aria-expanded="false" <?php if(isset($cuimactive)){echo 'style="background:#fd7e14 !important"';} ?> aria-controls="sidebarEmail" class="side-nav-link">
        <i class="uil-envelope"></i>
        <span> Cuidado materno infantil </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="5practicaadmin" <?php if(isset($pracactive)){echo 'style="background:#fd7e14 !important"';} ?> aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
        <i class="uil-briefcase"></i>
        <span> Practica administracion </span>

    </a>
</li>

<li class="side-nav-item">
    <a href="6adulmayor" <?php if(isset($adulactive)){echo 'style="background:#fd7e14 !important"';} ?> class="side-nav-link">
        <i class="uil-rss"></i>
        <span> Adulto mayor </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="7practicainte" <?php if(isset($praciactive)){echo 'style="background:#fd7e14 !important"';} ?> aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
        <i class="uil-clipboard-alt"></i>
        <span> Práctica integral </span>

    </a>

</li>

<li class="side-nav-item">
    <a href="8fundamentos4" <?php if(isset($ivactive)){echo 'style="background:#fd7e14 !important"';} ?> class="side-nav-link">
        <i class="uil-folder-plus"></i>
        <span> IV Fundamentos socio Educativo  </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="9fundamentos5" <?php if(isset($vactive)){echo 'style="background:#fd7e14 !important"';} ?> class="side-nav-link">
        <i class="uil-folder-plus"></i>
        <span>V Fundamentos socio Educativo  </span>
    </a>
</li>
                <?php
            }else{
                ?>
                    <li class="side-nav-item">
                <a href="ADMIN.php" aria-expanded="false"  <?php if(isset($admin)){echo 'style="background:#fd7e14 !important; "';} ?> class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Inicio </span>
                </a>

            </li>
            <li class="side-nav-item">
                <a href="ADMIN.php?u=1" aria-expanded="false" class="side-nav-link" <?php if(isset($usuarios)){echo 'style="background:#fd7e14 !important; color:white"' ;} ?> >
                    <i class="uil-key-skeleton"></i>
                    <span> Usuarios </span>
                </a>

            </li>

            <li class="side-nav-item">
                <a href="ADMIN.php?p=1" aria-expanded="false" class="side-nav-link" <?php if(isset($periodos)){echo 'style="background:#fd7e14 !important; color:white"' ;} ?> >
                    <i class="uil-key-skeleton"></i>
                    <span> Periodos </span>
                </a>

            </li>
            <li class="side-nav-title side-nav-item">Modulos</li>

<li class="side-nav-item">
    <a href="1promoyprev" class="side-nav-link" <?php if(isset($pypactive)){echo 'style="background:#fd7e14 !important"';} ?> >
        <i class="uil-calender"></i>
        <span> Promoción y prevención</span>
    </a>
</li>

<li class="side-nav-item">
    <a href="2activbasicas" class="side-nav-link" <?php if(isset($actactive)){echo 'style="background:#fd7e14 !important"';} ?> >
        <i class="uil-comments-alt"></i>
        <span> Actividades Básicas </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="3cuimedico" aria-expanded="false" <?php if(isset($cuiactive)){echo 'style="background:#fd7e14 !important"';} ?> aria-controls="sidebarEcommerce" class="side-nav-link">
        <i class="uil-store"></i>
        <span> Cuidado medico </span>

    </a>

</li>

<li class="side-nav-item">
    <a href="4cuimaterno" aria-expanded="false" <?php if(isset($cuimactive)){echo 'style="background:#fd7e14 !important"';} ?> aria-controls="sidebarEmail" class="side-nav-link">
        <i class="uil-envelope"></i>
        <span> Cuidado materno infantil </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="5practicaadmin" <?php if(isset($pracactive)){echo 'style="background:#fd7e14 !important"';} ?> aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
        <i class="uil-briefcase"></i>
        <span> Practica administracion </span>

    </a>
</li>

<li class="side-nav-item">
    <a href="6adulmayor" <?php if(isset($adulactive)){echo 'style="background:#fd7e14 !important"';} ?> class="side-nav-link">
        <i class="uil-rss"></i>
        <span> Adulto mayor </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="7practicainte" <?php if(isset($praciactive)){echo 'style="background:#fd7e14 !important"';} ?> aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
        <i class="uil-clipboard-alt"></i>
        <span> Práctica integral </span>

    </a>

</li>

<li class="side-nav-item">
    <a href="8fundamentos4" <?php if(isset($ivactive)){echo 'style="background:#fd7e14 !important"';} ?> class="side-nav-link">
        <i class="uil-folder-plus"></i>
        <span> IV Fundamentos socio Educativo  </span>
    </a>
</li>

<li class="side-nav-item">
    <a href="9fundamentos5" <?php if(isset($vactive)){echo 'style="background:#fd7e14 !important"';} ?> class="side-nav-link">
        <i class="uil-folder-plus"></i>
        <span>V Fundamentos socio Educativo  </span>
    </a>
</li>
                <?php
            }
            
            ?>



            </li>
        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>