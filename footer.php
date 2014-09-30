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
      <td id="footer-text"><p>9 quai André Lassagne - 69001 Lyon test</p><p style="color:#848484">Tel : 09 72 33 20 92</p></td>
      <td id="footer-links"><a href="<?php echo home_url('/credits'); ?>">Crédits</a> - <a href="<?php echo home_url('/mentions-legales'); ?>">Mentions légales</a>	</td>
      </tr>
      </table>
  </div>
			</footer>
</div>

<?php wp_footer(); ?>
<!-- The mains scripts you'll need for your site  -->
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

</body>
</html>
