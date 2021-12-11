<?php 
/**
 * footer.php
 *
 */
?>
    </div><!-- #main  -->
</div><!-- .container -->

<div id="page-footer-container">
    <footer id="page-footer" class="container" role="contentinfo">
        <div id="page-footer-information">
            <img id="page-footer-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.png" />
            <span id="page-footer-adress">9 quai André Lassagne - 69001 Lyon</span>
            <span id="page-footer-phone">Tel : 04 28 29 94 35</span>
        </div>
        <nav id="page-footer-links">
            <a href="<?php echo home_url('/credits'); ?>">Crédits</a> -
            <a href="<?php echo home_url('/mentions-legales'); ?>">Mentions légales</a> -
            <a href="<?php echo home_url('/nos-partenaires'); ?>">Nos partenaires</a> -
            <a href="<?php echo home_url('/espace-presse'); ?>">Espace presse</a>
        </nav>
    </footer>
</div>

<?php wp_footer(); ?>

<!-- JS files -->
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

</body>

<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-22457099-1', 'auto');
    ga('send', 'pageview');
</script>

</html>

