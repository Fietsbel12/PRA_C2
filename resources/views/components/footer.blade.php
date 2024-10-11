<footer>
    <div class="footer-content">
        <div class="footer-section about">
            <h3>Over ons</h3>
            <p>
                Wij zijn een dynamisch bedrijf gericht op innovatie en klanttevredenheid.
            </p>
        </div>

        <div class="footer-section contact">
            <h3>Contact</h3>
            <p>Email: info@jouwbedrijf.com</p>
            <p>Telefoon: +31 123 456 789</p>
            <p>Adres: Hoofdstraat 123, 1234 AB, Amsterdam</p>
            <li><a href="/contact">Contact</a></li>
        </div>

        <div class="footer-section social">
            <h3>Volg ons</h3>
            <a href="#">Facebook</a> |
            <a href="#">Twitter</a> |
            <a href="#">Instagram</a>
        </div>
    </div>

    <div class="footer-bottom">
        © {{ __('misc.copyright') }} Jouw Bedrijf. Alle rechten voorbehouden.
    </div>
</footer>

<!-- analytics code -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30506707-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl/' : 'http://www'/) + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- Einde analytics code -->

<script language="Javascript" type="text/javascript">
 if (top.location!= self.location) {
  top.location = self.location.href
 }
</script>
