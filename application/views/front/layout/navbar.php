<?php
$facebook = isset($this->setting_data['fb_link']) ? $this->setting_data['fb_link'] : '';
$twitter = isset($this->setting_data['twitter_link']) ? $this->setting_data['twitter_link'] : '';
$linkedin = isset($this->setting_data['linkedin_link']) ? $this->setting_data['linkedin_link'] : '';
$instagram = isset($this->setting_data['instagram_link']) ? $this->setting_data['instagram_link'] : '';
$youtube = isset($this->setting_data['youtube_link']) ? $this->setting_data['youtube_link'] : '';
$google = isset($this->setting_data['google_link']) ? $this->setting_data['google_link'] : '';

$cur_tab = $this->uri->segment(1) == '' ? '' : $this->uri->segment(1);
$curr_tab = $this->uri->segment(2) == '' ? '' : $this->uri->segment(2);

// pr($cur_tab);die;
?>

<nav class="nav b-blue float-100">
    <div class="container relative">
        <div class="visible-sm visible-xs menu-head fonarto" onclick="closeNav();">
            <i class="fa fa-angle-left"></i>
            <a href="javascript:void(0);">Pziff Life Care</a>
        </div>
        <div class="relative">
            <div class="menu float-left">
                <ul class="m-0 p-0">
                    <li class="menu-item"><a href="<?= base_url('') ?>">HOME</a></li>
                    <li class="menu-item <?php echo ($cur_tab == 'about' || $cur_tab=='mission' || $cur_tab=='business' || $cur_tab=='management' || $cur_tab=='why-us' || $cur_tab=='quality-policy' || $cur_tab=='client-satisfaction') ? 'active-nav' : '' ?>">
                        <a href="#" class="">COMPANY PROFILE<span class="fa fa-caret-down hidden-lg hidden-md"></span></a>
                        <ul class="sub-menu">
                            <li><a href="<?= base_url('about') ?>">About us</a></li>
                            <li><a href="<?= base_url('mission') ?>">Mission Vision</a></li>
                            <li><a href="<?= base_url('business') ?>">Business Value</a></li>
                            <li><a href="<?= base_url('management') ?>">Management</a></li>
                            <li><a href="<?= base_url('why-us') ?>">Why us</a></li>
                            <li><a href="<?= base_url('quality-policy') ?>">Quality Policy</a></li>
                            <li><a href="<?= base_url('client-satisfaction') ?>">Client Satisfaction</a></li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo ($cur_tab == 'global-pressance') ? 'active-nav' : '' ?>"><a href="<?= base_url('global-pressance')?>">GLOBAL PRESENCE</a></li>
                    <li class="menu-item <?php echo ($cur_tab == 'manufacturing' || $cur_tab=='packaging' || $cur_tab=='research-development') ? 'active-nav' : '' ?>">
                        <a href="#">INFRASTRUCTURE<span class="fa fa-caret-down hidden-lg hidden-md"></span></a>
                        <ul class="sub-menu">
                            <li><a href="<?= base_url('manufacturing') ?>">Manufacturing</a></li>
                            <li><a href="<?= base_url('packaging') ?>">Packaging</a></li>
                            <li><a href="<?= base_url('research-development') ?>">R & D</a></li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo ($curr_tab == 'category') ? 'active-nav' : '' ?>"><a href="<?= base_url('category/finished-product') ?>">PRODUCTS</a></li>
                    <li class="menu-item <?php echo ($cur_tab == 'contract-manufacturing' || $cur_tab=='third-party-manufacturing' || $cur_tab=='institutional-tenders' || $cur_tab=='generic-medicines' || $cur_tab=='otc-products' || $cur_tab=='regulatory-service' || $cur_tab=='quality-control-and-quality-assurance') ? 'active-nav' : '' ?>">
                        <a href="#">SERVICES<span class="fa fa-caret-down hidden-lg hidden-md"></span></a>
                        <ul class="sub-menu">
                            <li><a href="<?= base_url('contract-manufacturing') ?>">Contract Manufacturing</a></li>
                            <li><a href="<?= base_url('third-party-manufacturing') ?>">3<sup>rd</sup> Party Manufacturing</a></li>
                            <li><a href="<?= base_url('institutional-tenders') ?>">Institutional Tenders</a></li>
                            <li><a href="<?= base_url('generic-medicines') ?>">Generic Medicines</a></li>
                            <li><a href="<?= base_url('otc-products') ?>">OTC Products</a></li>
                            <li><a href="<?= base_url('regulatory-service') ?>">Regulatory Service</a></li>
                            <li><a href="<?= base_url('quality-control-and-quality-assurance') ?>">QC / QA</a></li>
                        </ul>
                    </li>
                    <li class="menu-item <?php echo ($curr_tab == 'product-gallery') ? 'active-nav' : '' ?>"><a href="<?= base_url('product-gallery') ?>">GALLERY</a></li>
                    <li class="menu-item <?php echo ($curr_tab == 'blog') ? 'active-nav' : '' ?>"><a href="<?= base_url('blog') ?>">BLOG</a></li>
                    <li class="menu-item <?php echo ($cur_tab == 'contact-us') ? 'active-nav' : '' ?>"><a href="<?= base_url('contact-us') ?>">CONTACT US</a></li>
                </ul>
            </div>
            <div class="social b-green absolute top right visible-lg">
                <ul class="m-0 p-0">
                    <li><a href="<?= $facebook ?>" target="_blank" class="fa fa-facebook"></a></li>
                    <li><a href="<?= $twitter ?>" target="_blank" class="fa fa-twitter"></a></li>
                    <li><a href="<?= $linkedin ?>" target="_blank" class="fa fa-linkedin"></a></li>
                    <li><a href="<?= $google ?>" target="_blank" class="fa fa-google-plus"></a></li>
                    <li><a href="<?= $youtube ?>" target="_blank" class="fa fa-youtube-play"></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="c-mask" onclick="closeNav();"></div>
<div class="multi_language_box">
    <!-- GTranslate: https://gtranslate.io/ -->
    <a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style=" background-image: url(<?= ASSETS_PATH; ?>images/32.png);
        background-position:-0px -0px;">
        <img src="<?= ASSETS_PATH; ?>images/blank.png" height="32" width="32"
            alt="English" /></a><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish"
        class="gflag nturl" style="background-image: url(<?= ASSETS_PATH; ?>images/32.png); background-position:-600px -200px;">
        <img src="<?= ASSETS_PATH; ?>images/blank.png"
            height="32" width="32" alt="Spanish" /></a>
            <a href="#" onclick="doGTranslate('en|pt');return false;"
        title="Portuguese" class="gflag nturl" style="background-image: url(<?= ASSETS_PATH; ?>images/32.png); background-position:-300px -200px;"><img
            src="<?= ASSETS_PATH; ?>images/blank.png" height="32" width="32" alt="Portuguese" /></a><a href="#"
        onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl"
        style="background-image: url(<?= ASSETS_PATH; ?>images/32.png); background-position:-200px -100px;"><img src="<?= ASSETS_PATH; ?>images/blank.png" height="32" width="32"
            alt="French" /></a>



    <div id="google_translate_element2"></div>
    <script type="text/javascript">
        function googleTranslateElementInit2() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                autoDisplay: false
            }, 'google_translate_element2');
        }
    </script>
    <script type="text/javascript"
        src="./translate.google.com/translate_a/element7876.js?cb=googleTranslateElementInit2"></script>


    <script type="text/javascript">
        if ($(window).width() >= 992) {
            $(".multi_language_box").appendTo(".float-right");
        }
        /* <![CDATA[ */
        eval(function(p, a, c, k, e, r) {
            e = function(c) {
                return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
            };
            if (!''.replace(/^/, String)) {
                while (c--) r[e(c)] = k[c] || e(c);
                k = [function(e) {
                    return r[e]
                }];
                e = function() {
                    return '\\w+'
                };
                c = 1
            };
            while (c--)
                if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
            return p
        }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}))
        /* ]]> */
    </script>
</div>

<!-- <div class="fix-dv">
    <a href="javascript:void(0)" data-toggle="modal" class="request-callback">Request A Call Back</a>
</div> -->

<script src="<?= ASSETS_PATH; ?>js/jquery-ui.js"></script>
<script src="<?= ASSETS_PATH; ?>js/ouibounce.js"></script>
 