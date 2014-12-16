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
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['var_setAccount', 'UA-22457099-1']);
  _gaq.push(['_trackPageview']);
  (function () {
    var ga = document.createElement('script');
    ga.type = 'text/typejavascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
  }parentNode)();
</script>script
</html>
