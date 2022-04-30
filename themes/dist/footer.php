<aside id="kontakt" class="container-small">
    <h2 class="section-title animate fade-in-up"><?php _e('Kontakt', 'wifi'); ?></h2>
    <dl class="contact-info animate fade-in-up">


      <?php $phone = get_field('phone', 'options');?>
      <?php if(!empty($phone)): ?> 
        <dt>
            <span class="icon-phone" aria-hidden="true"></span>
            <span class="screen-reader-text"><?php _e('Telefonnummer', 'wifi'); ?></span>
        </dt>
        <dd>
            <a href="tel:<?php echo preg_replace("/[^\+\d]+/", "", $phone); ?>"><?php echo $phone; ?></a>
        </dd>
      <?php endif; ?>  






        <?php $adress = get_field('adress', 'options') ?>
        <?php if(!empty($adress)): ?> 
        <dt>
            <span class="icon-location" aria-hidden="true"></span>
            <span class="screen-reader-text"><?php _e('Adresse', 'wifi'); ?></span>
        </dt>
        <dd>
        <?php echo $adress; ?>
        </dd>
        <?php endif; ?> 



        <?php $email = get_field('email', 'options') ?>
        <?php if(!empty($email)): ?>

        <dt>
            <span class="icon-email" aria-hidden="true"></span>
            <span class="screen-reader-text"><?php _e('E-Mail Adresse', 'wifi'); ?></span>
        </dt>
        <dd>
            <a href="mailto:<?php echo antispambot($email); ?>" ><?php echo antispambot($email); ?></a>
        </dd>
        <?php endif; ?> 
    </dl>
    <div class="form-wrapper animate fade-in-up">


    <!--form geloscht-->    
      <?php 
      $shortcode = get_field ('form', 'options');
      echo do_shortcode($shortcode);
      
      ?>


    </div>
</aside>
<footer id="page-footer" class="container">
    <div class="columns">
        <div class="col-3">
            <ul class="social-links">
                <li>
                    <a href="https://www.facebook.com/" target="_blank" rel="nofollow">
                        <span class="icon-facebook" aria-hidden="true"></span>
                        <span class="screen-reader-text">Folge uns auf Facebook</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/" target="_blank" rel="nofollow">
                        <span class="icon-instagram" aria-hidden="true"></span>
                        <span class="screen-reader-text">Folge uns auf Instagram</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/" target="_blank" rel="nofollow">
                        <span class="icon-linkedin" aria-hidden="true"></span>
                        <span class="screen-reader-text">Folge uns auf LinkedIn</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/" target="_blank" rel="nofollow">
                        <span class="icon-youtube" aria-hidden="true"></span>
                        <span class="screen-reader-text">Folge uns auf YouTube</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-3">
            <span class="copyright">&copy; WIFI Graz</span>
        </div>
        <div class="col-3">
            <nav id="footer-nav">
                <ul class="nav-menu">
                    <li>
                        <a href="datenschutz.html">Datanschutz</a>
                    </li>
                    <li>
                        <a href="impressum.html">Imressum</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</footer>
<div id="to-top">
    <a href="#page-header">Top</a>
</div>


<?php wp_footer(); ?>
<!--
<script src="assets/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/scripts.js"></script>-->
</body>
</html>