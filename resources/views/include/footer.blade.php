<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets') }}/img/logo.png" alt=""></a>
                    </div>
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.249945995029!2d102.12676693431561!3d1.4729950833147525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d15fecc9f5da95%3A0xa2e8dd331fa85e88!2sGarden%20School%20Indonesia!5e0!3m2!1sen!2sid!4v1718194250725!5m2!1sen!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>Quick links</h6>
                    <ul>
                        <li><a href="#" id="about">About</a></li>
                        <li><a href="#" id="blogs">Blogs</a></li>
                        <li><a href="#" id="contact">Contact</a></li>
                        <li><a href="#" id="faq">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__newslatter">
                    <h6>SOCIAL MEDIA</h6>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <div class="footer__copyright__text">
                    <p>Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | Made with <i class="fa fa-heart"
                            aria-hidden="true"></i> by <a href="#" target="_blank">IMAGI</a>
                    </p>
                </div>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>

<script>
    document.getElementById('about').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah tautan dari mengikuti URL
        alert('Halaman sedang dalam pengembangan');
    });
    document.getElementById('blogs').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah tautan dari mengikuti URL
        alert('Halaman sedang dalam pengembangan');
    });
    document.getElementById('contact').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah tautan dari mengikuti URL
        alert('Halaman sedang dalam pengembangan');
    });
    document.getElementById('faq').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah tautan dari mengikuti URL
        alert('Halaman sedang dalam pengembangan');
    });
</script>
<!-- Footer Section End -->
