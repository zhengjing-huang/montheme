</div>
</div>
<footer>
    <div class="container footer-block">
        <p class="footer"> © 2022 - Tous droits réservés </p>
        <p style="background-color: green;">

            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container' => false,
                'menu_class' => 'footer-last'
            ]);
            ?>
        </p>

    </div>
</footer>
<?php wp_footer(); ?>
</div>
</body>

</html>