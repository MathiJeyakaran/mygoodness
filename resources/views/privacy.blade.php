<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="{{URL::asset('images/favicon.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet" />
    <title>{{ config('app.name', 'mygoodness') }}</title>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800;900&family=Barlow:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Slab:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet"
    />

    <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="account/css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</head>
<body class="mt-5" style="background:#F5F5F5">
    <header>
        <div class="container">
            <div class="col-sm-4 logohead">
                <a href="/" class="logo">
                    <img src="images/logo.png" class="img-fluid" />
                </a>
            </div>
        </div>
    </header>
    <section class="middlebox">
        <div class="container">
            <div style="height:30px">
                <div id="alert" class="">
                    @if(Session::has('success'))
                    <div class="prohead" role="alert">
                        <u>{{Session::get('success')}}</u>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="prohead">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach 
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <div class="myaccount">
                <div class="whitebg mb-5">
                    <div class="belowitems">
                        <center>
                        <p class="notifications mt-5 mb-5" style="font-size:48px">Privacy Policy</p>
                        <!-- <p class="mt-3 mb-5" style="font-size:24px; font-weight:400">You gave $5 to Everytown for Gun Safety. Start a chain reaction by asking 3 friends to give too.</p>                         -->
                        </center>
                    </div>
                </div>
    <div class="middleboxesfull mt-5">
        <div class="row mt-5 col-text">
            <div class="col-12">
                <p>Mygoodness Inc.’s (“Company,” or “we,” or “us” or “our”) Platform allows an individual or group of individuals (“Donors”) to donate monetary donations (“Donations”) to an acceptable non-profit organization established as such under the applicable laws of incorporation (“Acceptable Charity”) of their choice.</p>
                <p>This Privacy Policy describes how and when we collect, use, and share Your information across our websites, SMS, APIs, email notifications, applications, buttons, embeds, ads, and our other covered services that link to this Policy (collectively, the “Platform”), and from our partners and other third parties. When using any of our Platform You consent to the collection, transfer, storage, disclosure, and use of Your information as described in this Privacy Policy. This includes any information You choose to provide that is deemed sensitive under applicable law. When this policy mentions “we” or “us,” it refers to the controller of Your information under this policy. If You live in the United States, Your information is controlled by us, Inc. Despite this, You alone control and are responsible for the posting of Your Post and other content You submit through the Platform, as provided in the Terms of Service. Irrespective of which country You live in, You authorize us to transfer, store, and use Your information in the United States and any other country where we operate. In some of these countries, the privacy and data protection laws and rules regarding when government authorities may access data may vary from those in the country where You live. </p><br>
                <h1>Information Collection and Use</h1>
                <p>We collect and use Your information below to provide, understand, and improve our Platform.</p>
                <p>Basic Account Information: If You choose to create a Mygoodness account, You must provide us with some personal information, such as Your name, email address, or phone number.</p>
                <p>Contact Information: You may use Your contact information, such as Your email address or phone number, to customize Your account or enable certain account features. If You provide us with Your phone number, You agree to receive text messages to that number from us. We may use Your contact information to send You information about our Platform, to market to You, to help prevent spam, fraud, or abuse, and to help others find Your account, including through third-party services and client applications. You may control the notifications or unsubscribe from a notification You receive from us by contacting us directly at <a href="mailto:privacy@givemygoodness.org">privacy@givemygoodness.org</a>.</p>
                <p>Additional Information: You may choose to provide us with additional information to help improve and personalize Your experience across our Platform. For example, You may choose to upload friends’ numbers or provide Your address book so that we can help You share your giving thread or help others find your giving thread. We may later personalize content, such as making suggestions or showing user accounts and posts for You and other users, based added contacts. You can delete Your imported contacts at any time by emailing us, and we may keep Your message, email address, and contact information to respond to Your request. If You connect Your account on our Platform to Your account on another service, the other service may send us information that You authorize for use in the Platform. This information may help us improve the Platform, and is deleted from our Platform within a few weeks of Your disconnecting from our Platform Your account on the other service.</p>
                <p>Posts, Friends, Lists, Profile, and Other Public Information: Most of the information You provide us through the Platform is information You are asking us to make public. In the future, we may provide you a space to provide us with profile information such as a short biography, Your location, date of birth, or a picture. Additionally, Your public information includes the messages or donations You post or share; the metadata provided with post, such as when You posted and the client application You used to post; information about Your account, such as creation time, language, country, and time zone; and the lists You create, people You friend, and posts You Like or Repost on the Platform. We broadly and instantly disseminate Your public information to a wide range of users, customers, and services, including search engines, developers, and publishers that integrate Platform content into their services, and organizations such as universities, public health agencies, and market research firms that analyze the information for trends and insights. When You share information or content like photos, videos, and links via the Platform, You should think carefully about what You are making public. We may use this information to make inferences, like what topics You may be interested in. The platform will have a default public view.The Company will make an effort to ensure it is clear on the platform what information is public versus private. For certain profile information fields we provide You with visibility settings to select who can see this information in Your profile.  If You provide us with profile information and You don’t see a visibility setting, that information is public.</p>
                <p><b>Links:</b> We may keep track of how You interact with links across our Platform, including our email notifications, third-party services, and client applications, by redirecting clicks or through other means. We do this to help improve our Platform, to provide more relevant advertising, and to be able to share aggregate click statistics such as how many times a particular link was clicked on.</p>
                <p><b>Cookies:</b> Like many websites, we use cookies and similar technologies to collect additional website usage data and to improve our Platform, but we do not require cookies for many parts of our Platform such as searching and looking at public user profiles. A cookie is a small data file that is transferred to Your computer or mobile device. We may use both session cookies and persistent cookies to better understand how You interact with our Platform, to monitor aggregate usage by our users and web traffic routing on our Platform, and to customize and improve our Platform. Although most web browsers automatically accept cookies, some browsers’ settings can be modified to decline cookies or alert You when a website is attempting to place a cookie on Your computer. However, some Platform may not function properly if You disable cookies.</p>
                <p><b>Using Our Platform:</b> We receive information when You view content on or otherwise interact with our Platform, even if You have not created an account (“Log Data”). For example, when You visit our websites, sign into our Platform, interact with our email notifications, use Your account to authenticate to a third-party website, application, or service, or visit a third-party website, application, or service that includes our Content, we may receive information about You. This Log Data may include Your IP address, browser type, operating system, the referring web page, pages visited, location, Your mobile carrier, device information (including device and application IDs), search terms, or cookie information. We also receive Log Data when You click on, view or interact with links on our Platform, including links to third-party applications. We use Log Data to make inferences, like what topics You may be interested in, and to customize the content we show You, including ads. We keep Log Data as needed for the purposes described in this Privacy Policy. We will either delete Log Data or remove any common account identifiers, such as Your username, full IP address, email address, or phone number, after a maximum of 18 months, if not sooner.</p>
                <p><b>Web Data:</b> We may personalize the Platform for You based on Your visits to third-party websites that integrate Platform content such as embedded timelines or post buttons. When You view our content on these websites, we may receive Log Data that includes the web page You visited. We never associate this web browsing history with Your name, email address, phone number, or Mygoodness handle, and we delete, obfuscate, or aggregate it after no longer than 30 days. We may use interests or other information that we derive from this data to improve our Platform and personalize content for You, such as suggestions for people to friend, advertising, and other content You may be interested in.</p>
                <p><b>Advertising:</b> While it isn’t at this time, in the future our Platform may be supported by advertising. We may use the information described in this Privacy Policy to help make our advertising more relevant to You, to measure its effectiveness, and to help recognize Your devices to serve You ads on and off of the Platform. We adheres to the Digital Advertising Alliance Self-Regulatory Principles for Online Behavioral Advertising (also referred to as “interest-based advertising”). If You prefer, You can opt out of interest-based advertising by unchecking Personalize Ads in Your Personalization and Data settings, available through the DAA’s consumer choice tool at https://optout.aboutads.info. We will not use information from the browser (and for logged in users, the account) on which You opt out for interest-based advertising, and that browser or account will not be eligible to receive interest-based ads from the Platform. Third-Parties and Affiliates: We may receive information about You from third parties, such as other Platform users, partners (including ad partners), or our corporate affiliates. For example, other users may share or disclose information about You, such as when they mention You, share a photo of You, or tag You in a photo. Your privacy settings control who can tag You in a photo. Our ad partners and affiliates may share information with us such as a browser cookie ID, mobile device ID, or cryptographic hash of an email address, as well as demographic or interest data and content viewed or actions taken on a website or app. Our ad partners, particularly our advertisers, may enable us to collect similar information directly from their website or app by integrating our advertising technology.</p>
                <p><b>Personalizing Across Your Devices:</b> When You log into Your account with a browser or device, we will associate that browser or device with Your account for purposes such as authentication and personalization. Depending on Your settings, we may also personalize Your experience on, and based on information from, other browsers or devices besides the ones You use to log into the Platform. For example, if You visit websites with sports content on Your laptop, we may show You sports-related ads on the Platform. </p><br>
                <h1>Information Sharing and Disclosure</h1>
                <p>We do not disclose Your private personal information except in the limited circumstances described here.</p>
                <p>Donor Consent or Direction: We may share or disclose Your information at Your direction, such as when You authorize a third-party web client or application to access Your account or when You direct us to share Your feedback with a business.</p>
                <p><b>Service Providers:</b> We engage service providers to perform functions and provide services to us in the United States, Ireland, and other countries. For example, we use a variety of third-party services to help provide our Platform, such as hosting our various blogs and wikis, and to help us understand and improve the use of our Platform, such as Google Analytics. We may share Your private personal information with such service providers subject to obligations consistent with this Privacy Policy and any other appropriate confidentiality and security measures, and on the condition that the third parties use Your private personal data only on our behalf and pursuant to our instructions. We share Your payment information, including Your credit or debit card number, card expiration date, CVV code, and billing address with payment services providers to process payments; prevent, detect and investigate fraud or other prohibited activities; facilitate dispute resolution such as chargebacks or refunds; and for other purposes associated with the acceptance of credit or debit cards.</p>
                <p><b>Law and Harm:</b> Notwithstanding anything to the contrary in this Privacy Policy, we may preserve or disclose Your information if we believe that it is reasonably necessary to comply with a law, regulation, legal process, or governmental request; to protect the safety of any person; to address fraud, security or technical issues; or to protect our or our users’ rights or property. However, nothing in this Privacy Policy is intended to limit any legal defenses or objections that You may have to a third party’s, including a government’s, request to disclose Your information.</p>
                <p><b>Business Transfers and Affiliates:</b> In the event that we are involved in a bankruptcy, merger, acquisition, reorganization or sale of assets, Your information may be sold or transferred as part of that transaction. This Privacy Policy will apply to Your information as transferred to the new entity. We may also disclose information about You to our corporate affiliates in order to help provide, understand, and improve our Platform and our affiliates’ services, including the delivery of ads.</p>
                <p><b>Public Information:</b> We may share or disclose Your public information, such as Your public user profile information, public post, or the people You friend. </p>
                <p><b>Non-Personal, Aggregated, or Device-Level Information:</b> We may share or disclose non-personal, aggregated, or device-level information such as the total number of times people engaged with a post, the number of users who clicked on a particular link or voted on a poll in a post (even if only one did), the characteristics of a device or its user when it is available to receive an ad, the topics that people are posting about in a particular location, or aggregated or device-level reports to advertisers about users who saw or clicked on their ads. This information does not include Your name, email address, phone number, or Mygoodness handle. We may, however, share non-personal, aggregated, or device-level information through partnerships with entities that may use data in their possession (including data You may have given them) to link Your name, email address, or other personal information to the information we provide them. These partnerships require that they get Your consent before doing so.</p><br>
                <h1>Accessing and Modifying Your Personal Information</h1>
                <p>If You are a registered user of our Platform, we provide You with tools and account settings to access, correct, delete, or modify the personal information You provided to us and associated with Your account. Keep in mind that search engines and other third parties may still retain copies of Your public information, like Your user profile information and public posts, even after You have deleted the information from the Platform.</p><br>
                <h1>Changes to this Policy</h1>
                <p>We may revise this Privacy Policy from time to time. The most current version of the policy will govern our use of Your information and will always be at www.givemygoodness.org/privacy. If we make a change to this policy that, in our sole discretion, is material, we will notify You. By continuing to access or use the Platform after those changes become effective, You agree to be bound by the revised Privacy Policy.</p><br>
                <p>Thoughts or questions about this Privacy Policy? Please, let us know by contacting us by writing to us at the appropriate address below</p>
                <h5>Mygoodness, Inc.<br>
                    Attn: Privacy<br>
                    22025 Hawthorne Blvd. #1023<br>
                    Torrance, CA 90503</h5>
            </div>
        </div>        
    </div>
    <div class="desktopview col-sm-12">
        <div class="paddingBlog" style="width: 90% !important">
            <img src="images/default.png" class="" style="max-height:400px; max-width: 90%;">
        </div>
    </div>
    <div class="mobileview">
        <div class="">
            <img src="images/default.png" class="paddingBlog">
        </div>
    </div>
</div>
</div>
</section>
@include('footer')
<script>
</script>
</body>
</html>
