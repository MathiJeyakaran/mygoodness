<footer class="footer">
    <div class="footericons">
        <div class="container">
            <ul class="social">
                <li>
                    <a href="https://www.instagram.com/givemygoodness/" target="_blank" title="Instagram"><img src="/images/insta.png" alt="linkedin" width=30></a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/company/mygoodness/" target="_blank" title="LinkedIn"><img src="/images/link.png" alt="linkedin" width=30></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="blagbg">
        <div class="container">
            <ul class="links">
                <li>
                    <a class="" href="/my_account" title="My Account">My Account</a>
                </li>
                <li>
                    <a class="" href="/blog" title="Blog">Blog</a>
                </li>
                <li>
                    <a class="" href="/privacy"  title="Privacy">Privacy</a>
                </li>
                <li>
                    <a class="" href="/terms_of_service"  title="Terms of Service">Terms of Service</a>
                </li>
                <li>
                    <a class="" href="/about" title="About">About</a>
                </li>
            </ul>
            <span class="copyright">© mygoodness, Inc. 2022. Start giving!</span>
        </div>
    </div>
</footer>
<script>
    var url = window.location.pathname; 
    if(url=='/'){
        // console.log('empty');
    } else {
        urlRegExp = new RegExp(url.replace(/\/$/,'') + "$");
        $('.links li a').each(function(){
            // and test its normalized href against the url pathname regexp
            if(urlRegExp.test(this.href.replace(/\/$/,''))){
                $(this).addClass('linkactive');
            }
        });
        // console.log(url);
    }
        
</script>