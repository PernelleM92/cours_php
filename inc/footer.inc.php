<footer class="footer mt-auto py-3 bg-primary">
    <div class="container">
    <span class="text-white">Cours php 7
    <?php
    setlocale(LC_ALL, 'fr_FR');
    echo strftime("%A %e %B %Y");
    echo('-');
    date_default_timezone_set("Europe/Paris");
    echo date ('H: i: s');
    ?>
    </span>
    </div>
</footer>