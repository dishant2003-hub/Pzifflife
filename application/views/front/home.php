

<div class="banner relative float-100" style="visibility: hidden;">
    <div class="f_slide" style="background-image:url(<?= ASSETS_PATH; ?>images/banner-1.jpg);">
        <div class="text text-center">
            <!-- <h4 class="m-0 t-blue fonarto text-uppercase">Care with Quality</h4> -->
            <!-- <h2 class="m-0 fonarto text-uppercase">Welcome to Pziff Life Care</h2> -->
            <span class="border inline-block"></span>
            <!-- <p>WHO-GMP | ISO 9001:2015 Certified Pharmaceutical Manufacturer</p> -->
        </div>
    </div>
    <div class="f_slide" style="background-image:url(<?= ASSETS_PATH; ?>images/banner-2.jpg);">
        <div class="text text-center">
            <!-- <h4 class="m-0 t-blue fonarto text-uppercase">Care with Quality</h4> -->
            <!-- <h2 class="m-0 fonarto text-uppercase">Welcome to Pziff Life Care</h2> -->
            <span class="border inline-block"></span>
            <!-- <p>WHO-GMP | ISO 9001:2015 Certified Pharmaceutical Manufacturer</p> -->
        </div>
    </div>
</div>

<div class="m-t-60 float-100">
    <div class="container">
        <ul class="services" style="visibility: hidden;">
            <?php
            if (!empty($product_type)) {
                foreach ($product_type as $row) {
            ?>
                    <li class="<?= isset($row['color']) ? $row['color'] : ''; ?>">
                        <a href="<?= base_url('category/' . $row['slug'])  ?>">
                            <img src="<?= ASSETS_PATH; ?>images/<?= $row['image']; ?>" alt="Tablet" />
                            <span><?= isset($row['name']) ? $row['name'] : ''; ?></span>
                        </a>
                    </li>
            <?php }
            } ?>
        </ul>
    </div>
</div>

<div class="our-services float-100 ">
    <div class="container">
        <h3 class="t-blue fonarto text-center p-t-b-60 m-0 heding-3">Our <span class="t-blue">Services</span></h3>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <p class="text-justify">
                    One of our specializations is Contract Manufacturing and 3rd Party Manufacturing where we ensure we
                    manufacture the required pharmaceutical drugs and make it easily accessible to the market. Whether our
                    client would like us to modify or enhance an existing product, create a new drug or increase the present
                    manufacturing capacity of particular medicine, our team of professionals combined with our infrastructure is
                    always ready for it.
                </p>
                <a href="<?= base_url('contract-manufacturing') ?>" class="underline">Read more...</a>
                <div class="request-quote t-white relative">
                    <!--a href="#"><img src="<?= ASSETS_PATH; ?>images/request-btn.png" alt="" class="absolute top left" /></a-->
                    <h5 class="inline-block m-0">Get Business Quote In Less than <span class="f-w-700 inline-block-100">30
                            Minutes !</span></h5>
                    <a href="<?= base_url('contact-us') ?>" class="btn f-w-600"><i class="fa fa-envelope-open"></i>Request a Quote</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="list fonarto">
                    <li>
                        <div class="relative p-border text-center">
                            <img src="<?= ASSETS_PATH; ?>images/contract-manufacturing.jpg" alt="Contract Manufacturing" />
                            <a href="<?= base_url('contract-manufacturing') ?>" class="text-left">Contract<br />Manufacturing</a>
                        </div>
                    </li>
                    <li>
                        <div class="relative p-border text-center">
                            <img src="<?= ASSETS_PATH; ?>images/3rd-party-manufacturing.jpg" alt="3rd Party Manufacturing" />
                            <a href="<?= base_url('third-party-manufacturing') ?>" class="text-left">3rd Party<br />Manufacturing</a>
                        </div>
                    </li>
                    <li>
                        <div class="relative p-border text-center">
                            <img src="<?= ASSETS_PATH; ?>images/generic-product.jpg" alt="Generic Product" />
                            <a href="<?= base_url('generic-medicines') ?>" class="text-left">Generic<br />Product</a>
                        </div>
                    </li>
                    <li>
                        <div class="relative p-border text-center">
                            <img src="<?= ASSETS_PATH; ?>images/loan-license.jpg" alt="Loan License" />
                            <a href="<?= base_url('institutional-tenders') ?>" class="text-left">Institutional <br />Tenders</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="welcome m-t-60 p-t-b-60 float-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="get-business text-center">
                    <div class="text">
                        <div class="content"><span class="text-uppercase">Get Business</span> Quote In Less <small
                                class="f-w-700 text-uppercase">than 30 Minutes !</small></div>
                        <div class="get-btn">
                            <a href="<?= base_url('contact-us') ?>" class="btn m-t-20">Request A Quote</a>
                            <img src="<?= ASSETS_PATH; ?>images/btn-shadow.png" alt="Request A Quote" class="m-t-m-10" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <h1 class="t-blue fonarto m-t-0 heding-3 h1_head">Welcome to <span class="t-blue">Pziff Life Care</span></h1>
                <p class="m-0 text-justify text-left"><span class="large t-blue">Pziff Life Care, based in Surat (Gujarat),
                        India, is a well-established name in the field of Pharmaceutical & Healthcare Industry.</span> We are a
                    Global Pharmaceutical Manufacturing and Exporting company, renowned internationally for its quality
                    standards and efficacy of the products. <strong>Pziff Life Care</strong> is a leading Manufacturer and
                    Exporter of <strong>Pharmaceutical Finished Formulations</strong> such as Tablets, Capsules, Injections,
                    Pre-filled Syringes, Inhalers/Respules, Nasal Sprays, Creams, Ointments, Eye/Ear Drops, Syrups, Suspensions,
                    Suppositories/Pessaries, Sachets, Powders, Lozenges, Jelly & Lotions across the globe. <br /><br />We have
                    State-of-the-Art manufacturing facilities with <strong>WHO-GMP, ISO 9001:2015</strong> accreditations. All
                    the facilities are equipped with ultramodern technology. We have a robust product portfolio comprising of
                    Medicines spread over all the major therapeutic areas like Antibiotic, Antimalarial, Antiviral, Antifungal,
                    Anticancer, Antihypertensive, Anticonvulsant, Antidepressants, NSAID, Painkiller, Anticoagulant,
                    Antiprotozoal, Anesthetic, Antiallergic, Antidiabetic, Antacid, Antidiarrhoeal, Laxative, Antiasthmatic,
                    Erectile Dysfunction, Contraceptive, Vitamins, Hormones, Skin care and many more. Currently, the company is
                    into manufacturing and exporting of more than 1500 products worldwide.<a href="<?= base_url('about') ?>"
                        class="underline visible-lg">Read More...</a></p>
                <a href="<?= base_url('about') ?>" class="underline hidden-lg">Read More...</a>
            </div>

        </div>

        <div class="m-t-60 welcome-slider">

            <ul style="visibility: hidden;">
                <li>
                    <div class="new-tag">New</div>
                    <a style="cursor: pointer;">
                        <img src="<?= ASSETS_PATH; ?>images/1-amoxicillin-oral-suspension_1618988899.jpg"
                            alt="1-amoxicillin-oral-suspension_1618988899.jpg" />
                    </a>
                </li>
                <li>
                    <div class="new-tag">New</div>
                    <a style="cursor: pointer;">
                        <img src="<?= ASSETS_PATH; ?>images/2-ceftriaxone-1gm-injection_1618990631.jpg"
                            alt="2-ceftriaxone-1gm-injection_1618990631.jpg" />
                    </a>
                </li>
                <li>
                    <div class="new-tag">New</div>
                    <a style="cursor: pointer;">
                        <img src="<?= ASSETS_PATH; ?>images/3-amoxicillin-capsules_1618989025.jpg"
                            alt="3-amoxicillin-capsules_1618989025.jpg" />
                    </a>
                </li>
                <li>
                    <div class="new-tag">New</div>
                    <a style="cursor: pointer;">
                        <img src="<?= ASSETS_PATH; ?>images/4-albendazole-tablets-india_1618989085.jpg"
                            alt="4-albendazole-tablets-india_1618989085.jpg" />
                    </a>
                </li>
                <li>
                    <div class="new-tag">New</div>
                    <a style="cursor: pointer;">
                        <img
                            src="<?= ASSETS_PATH; ?>images/6-paracetamol-phenylephrine-hydrochloride-chlorpheniramine-maleate-suspension_1618989256.jpg"
                            alt="6-paracetamol-phenylephrine-hydrochloride-chlorpheniramine-maleate-suspension_1618989256.jpg" />
                    </a>
                </li>
                <li class="view_all_link">
                    <a href="<?= base_url('product-gallery') ?>">View All</a>
                    <img src="<?= ASSETS_PATH; ?>images/get-business-shadow.png" alt="get-bu-shadow" class="shadow_btn">
                </li>
            </ul>
        </div>
    </div>
</div>



<div class="category-range m-t-60  float-100">
    <div class="container">
        <h3 class="t-blue fonarto text-center p-t-b-60 m-0 heding-3">Complete Range of <span class="t-blue">Dosage
                Forms</span></h3>
        <div class="category_range_box">
        <?php if(!empty($type)){
                foreach($type as $type_name => $producttype){ 
            ?>
            <ul class="list links_ul f-open">
                <p class="fonarto t-green"><?= $type_name ?></p>
                    
                <?php if(!empty($producttype)){
                foreach($producttype as $key => $protype){
                    if($key % 4 == 0){
                        echo '<li class="first_li">';
                    }
                    if($key % 4 == 0){
                        echo '<ul class="links_ul_inner">';
                    }
                ?>
                        <li><a href="<?= base_url('category/' . $protype['slug'])  ?>"><?= $protype['name'] ?></a></li>
                <?php
                  
                if($key % 4 == 3 || $key == count($producttype) - 1){
                    echo '</ul>';
                }
                if($key % 4 == 3 || $key == count($producttype) - 1){
                    echo '</li>';
                }
                    } 
                } 
                ?>
            </ul>
            <?php 
                } }
            ?>
        </div>
    </div>
</div>

<div class="relative why-us t-white b-blue inline-block-100 float-100">
    <div class="images hidden-xs"><!-- <img src="<?= ASSETS_PATH; ?>images/why-us.jpg" alt="" class="img-100" /> --></div>
    <div class="absolute left inline-block-100 top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="text">
                        <h3 class="fonarto m-0 heding-3">Why <span class="t-blue">US?</span></h3>
                        <ul>
                            <li>Government Recognised Export House</li>
                            <li>20 Years of Experience</li>
                            <li>Research based products</li>
                            <li>Modern Infrastructure</li>
                            <li>Competitive Pricing
                            <li>Short Delivery Lead Time</li>
                            <li>Efficient Communication</li>
                            <li>Offering Customization</li>
                        </ul>
                    </div>
                    <div class="content">
                        <ul>
                            <li>
                                <div class="info">
                                    <div><img src="<?= ASSETS_PATH; ?>images/eight.png"
                                            alt="eight The number of national and international certification" /></div>
                                    <span>
                                        <h3 class="text-uppercase m-0 f-w-600">eight</h3>
                                        The number of national and
                                        international certification
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <div><img src="<?= ASSETS_PATH; ?>images/24-hrs.png"
                                            alt="24hrs turnaround for all RFQs with a dedicated team for internation trade" /></div>
                                    <span>
                                        24hrs turnaround for all
                                        RFQs with a dedicated team
                                        for internation trade
                                    </span>
                                </div>
                            </li>
                            <!--li>
                <div class="info">
                  <img src="<?= ASSETS_PATH; ?>images/client-satification.png" alt="Client Satisfaction guaranteed" />
                  <span>
                    Client
                    Satisfaction 
                    guaranteed
                  </span>
                </div>
              </li-->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <ul class="list fonarto">
                        <li>
                            <div class="relative text-center">
                                <img src="<?= ASSETS_PATH; ?>images/countries-icon.png" alt="86+ Countries" />
                                <span>86 +<br />Countries</span>
                            </div>
                        </li>
                        <li>
                            <div class="relative text-center">
                                <img src="<?= ASSETS_PATH; ?>images/international-clients.png" alt="1250+ International Clients" />
                                <span>1250+<br />International Clients</span>
                            </div>
                        </li>
                        <li>
                            <div class="relative text-center">
                                <img src="<?= ASSETS_PATH; ?>images/injection.png" alt="600+ Sterile Products" />
                                <span>600 +<br />Sterile Products</span>
                            </div>
                        </li>
                        <li>
                            <div class="relative text-center">
                                <img src="<?= ASSETS_PATH; ?>images/tablet.png" alt="900+ Non-Sterile Products" />
                                <span>900 +<br />Non-Sterile Products </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="global-presence p-t-b-60 float-100">
    <div class="container">
        <h3 class="t-blue fonarto text-center m-0 heding-3">GLOBAL <span class="t-blue">PRESENCE</span></h3>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m-t-60">
                <p class="text-justify">To accomplish Wellona Pharma’s achievements in Pharmaceutical Exports, Ministry of
                    Commerce & Industry has honoured us with badge of <strong>ONE STAR EXPORT HOUSE</strong>. We have earned
                    accolades and recognition from customers in international market due to our indefatigable and determined
                    commitment towards quality and customer satisfaction. Bringing all these factors together, Pziff Life Care
                    has created a regular overseas presence in over 86 countries.</p>
                <img src="<?= ASSETS_PATH; ?>images/map.jpg" alt="GLOBAL PRESENCE" />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m-t-60">
                <p>Our Branded and Generic medicines enjoy steady demand in following countries:</p>
                <ul class="panel">
                    <li class="active">
                        <div class="panel-h">Asia</div>
                        <div class="content text-justify">
                            <div class="spacing">Afghanistan, Israel, Jordan, Pakistan, Russia, Saudi Arabia, Singapore, Syria,
                                Philippines, Turkey, Turkmenistan, Uzbekistan, Yemen, Vietnam, Indonesia, Malaysia, Iran, Tajikistan,
                                etc.</div>
                        </div>
                    </li>
                    <li>
                        <div class="panel-h">Africa</div>
                        <div class="content text-justify">
                            <div class="spacing">Africa: South Africa, Uganda, Nigeria, Ghana, Kenya, Mauritius, Botswana, Egypt,
                                Ethiopia, Libya, Sudan,Congo, Gambia, Ivory Coast , etc.</div>
                        </div>
                    </li>
                    <li>
                        <div class="panel-h">North & South America</div>
                        <div class="content text-justify">
                            <div class="spacing">USA, Canada, Panama, Trinidad and Tobago, Costa Rica, Puerto Rico, Dominican
                                Republic, Argentina, Guatemala, Guyana, Peru, Bolivia, Venezuela , Brazil, Bahamas, Ecuador, etc.
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="panel-h">Europe</div>
                        <div class="content text-justify">
                            <div class="spacing">Austria , Azerbaijan, Belarus, Belgium, Cyprus, Czech Republic, Denmark, France,
                                Georgia, Germany, Hungary, Ireland, Iceland, Netherlands, Norway, Poland, Spain, Sweden, Switzerland,
                                Ukraine, United Kingdom (UK) , Latvia, etc.</div>
                        </div>
                    </li>
                    <li>
                        <div class="panel-h">OCEANIA</div>
                        <div class="content text-justify">
                            <div class="spacing">Australia, New Zealand, Fiji, etc.</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="b-gray p-t-b-60 we-are-dedicated float-100">
    <div class="container">
        <h3 class="fonarto t-blue text-center m-0 heding-3">WE ARE DEDICATED TO OUR CUSTOMERS AND PRODUCTS</h3>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 m-t-60 text-center">
                <img src="<?= ASSETS_PATH; ?>images/we-are-dedicated.jpg" alt="Dedicated" />
                <p class="text-justify m-t-20 m-b-0">Our organization has been committed to providing a wide range of quality
                    and affordable Healthcare solutions to a large number of healthcare Institutions and medical facilities. We
                    intend to be the ideal partner for our clients and our aim is to deliver a diverge array of Quality
                    healthcare cunnliec and Pharma Product.</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  m-t-60">
                <ul class="panel">
                    <li class="active">
                        <div class="panel-h">Mission</div>
                        <div class="content text-justify">
                            <div class="spacing"><img src="<?= ASSETS_PATH; ?>images/mission-img.jpg" alt="Mission" class="m-r-15 float-left" /><span
                                    class="text">Pzifflifecare's mission is to uphold our social responsibility by improving the Quality of
                                    human life by providing Quality Products of International Standards and ensuring premier Health Care
                                    for the society. They endeavor to utilize their full potential by delivering balanced and improved
                                    Product Portfolio with Best Quality at Optimum Price. Wellona envisages of being a forerunner in the
                                    most emerging and ever growing Pharmaceutical Market.</span> <a href="<?= base_url('mission-vision') ?>"
                                    class="underline t-blue">Read More...</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="panel-h">Vision</div>
                        <div class="content text-justify">
                            <div class="spacing"><img src="<?= ASSETS_PATH; ?>images/visson-img.jpg" alt="Vision" class="m-r-15 float-left" /><span
                                    class="text">As an innovative, dynamic and reliable Pharmaceutical company, our vision is to stand
                                    out as exemplary performer in national as well as international market. Wellona wants to excel in
                                    manufacturing Highest Quality Products with ethics and obliged to do right and fair business
                                    practices.</span> <a href="<?= base_url('mission-vision') ?>" class="underline t-blue">Read More...</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="panel-h">Management’s Message</div>
                        <div class="content text-justify">
                            <div class="spacing"><img src="<?= ASSETS_PATH; ?>images/mangment-img.jpg" alt="Management"
                                    class="m-r-15 float-left" /><span class="text">One of our core values - ‘We are a team. Everyone
                                    matters.’ - has been the mantra that has taken Pziff Life Care to such heights. Hence, we have
                                    cultivated a work culture that permits our employees to learn, innovate and experiment with new
                                    ideas.</span> <a href="<?= base_url('management-message') ?>" class="underline t-blue">Read More...</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="panel-h">Quality policy</div>
                        <div class="content text-justify">
                            <div class="spacing"><img src="<?= ASSETS_PATH; ?>images/q-policy-small.jpg" alt="Quality policy"
                                    class="m-r-15 float-left" /><span class="text">Our quality policy stands committed to maintaining
                                    the good manufacturing practices, conform to the International standards and ensure a timely supply
                                    of goods with cost effectiveness. We believe in achieving the highest level of customer satisfaction
                                    and market leadership in domestic, as well as overseas markets, by implementing the Quality
                                    Management Systems (QMS) on a continual basis.</span> <a href="<?= base_url('quality-policy') ?>"
                                    class="underline t-blue">Read More...</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>