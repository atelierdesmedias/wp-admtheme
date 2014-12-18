<?php
  
?>

	</div><!-- #main  -->

	<footer role="contentinfo">
			<div class="widget-area">
			<?php if ( is_active_sidebar( 'footer-widget-area' ) ){
				dynamic_sidebar( 'footer-widget-area' );
			}?>
			</div>

			<div class="copyright" style=" background-color:white;">
			<table>
   <tr>
       <td><img src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.png"></img></td>
      <td id="footer-text"><p>9 quai André Lassagne - 69001 Lyon</p><p style="color:#848484">Tel : 09 72 33 20 92</p></td>
      <td id="footer-links">
	<a href="<?php echo home_url('/credits'); ?>">Crédits</a> - 
	<a href="<?php echo home_url('/mentions-legales'); ?>">Mentions légales</a> -
	<a href="<?php echo home_url('/nos-partenaires'); ?>">Nos partenaires</a> -
	<a href="<?php echo home_url('/espace-presse'); ?>">Espace presse</a>
      </td>
      </tr>
      </table>
  </div>
			</footer>
</div>

<?php wp_footer(); ?>
<!-- The mains scripts you'll need for your site  -->
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-22457099-1', 'auto');
  ga('send', 'pageview');

</script>
</html>
