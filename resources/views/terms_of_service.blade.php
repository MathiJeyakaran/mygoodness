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
                        <p class="notifications mt-5 mb-5" style="font-size:48px">Terms of Service</p>
                        <!-- <p class="mt-3 mb-5" style="font-size:24px; font-weight:400">You gave $5 to Everytown for Gun Safety. Start a chain reaction by asking 3 friends to give too.</p>                         -->
                        </center>
                    </div>
                </div>
    <div class="middleboxesfull mt-5">
        <div class="row mt-5 col-text">
            <div class="col-12">
                <p>These terms of service are entered into by and between You and Mygoodness Inc. (“Company,” or “we,” or “us” or “our”). Please read these terms & conditions (collectively, “Terms of Service”) carefully, as they contain important information regarding Your access to and use of www.givemygoodness.org and our, including any content, functionality, and services offered on or through www.givemygoodness.org or any future mobile applications (collectively, the “Platform”), as well as Your legal rights and remedies.</p><br>
                <h1>Acceptance of the Terms of Service & Privacy</h1>
                <p>By using the Platform, You agree that You have read, understand, acknowledge, and agree to be bound by the following Terms of Service and our Privacy Policy, found at www.givemygoodness.org/privacy and on any aspect of our Platform, incorporated herein by reference. If You do not agree to these Terms of Service, You must not access or use the Platform. </p>
                <p>This Platform is offered and available to users who are 13 years of age or older. By using this Platform, You represent and warrant that You meet the foregoing eligibility requirements. If You do not meet this requirement, You must not access or use the Platform. </p>
                <p>There may be times when we offer a special feature or service, like a subscription-based service, or a special feature or service provided by one of our many partnering organizations that has its own terms and conditions that apply in addition to these Terms of Service. In those cases, the terms specific to the special feature, service, or application control to the extent there is a conflict with these Terms of Service.</p>
                <p>The terms “You,” “Your,” or “User” shall refer to any individual or entity who accepts these Terms of Service by using this Platform. If You are using the Platform on behalf of a legal entity, You represent that You are authorized to enter into an agreement on behalf of that legal entity. Nothing in these Terms of Service shall be deemed to confer any third-party rights or benefits.</p><br>
                <h1>Changes to the Terms of Service</h1>
                <p>We reserve the right, in our sole discretion, to revise and update these Terms of Service from time to time (“Updated Terms”). All changes are effective immediately when we post them, and they apply to all access to and use of the Platform thereafter. If the Updated Terms contain any material and substantive changes to Your use of the Platform, we will make reasonable efforts to provide You with notice of the Updated Terms by posting them on the Platform, and that Your use of the Platform following the posting of the Updated Terms (or engaging in such other conduct as we may reasonably specify) constitutes Your agreement to the Updated Terms. If You do not agree to the Updated Terms, You should discontinue Your use of the Platform. </p><br>
                <h1>Content on the Platform</h1>
                <p>You are responsible for Your use of the Platform and for any Content You provide, including compliance with applicable laws, rules, and regulations. You should only provide Content that You are comfortable sharing with others. Any use or reliance on any Content or materials posted via the Platform or obtained by You through the Platform is at Your own risk. We do not endorse, support, represent or guarantee the completeness, truthfulness, accuracy, or reliability of any Content or communications posted via the Platform or endorse any opinions or organizations expressed via the Platform. You understand that by using the Platform, You may be exposed to Content that might be offensive, harmful, inaccurate or otherwise inappropriate, or in some cases, postings that have been mislabeled or are otherwise deceptive. All Content is the sole responsibility of the person who originated such Content. We may not monitor or control the Content posted via the Platform and, we cannot take responsibility for such Content. We respect the intellectual property rights of others and expects users of the Services to do the same. We reserve the right to remove Content alleged to be infringing without prior notice, at our sole discretion, and without liability to You. We will respond to notices of alleged copyright infringement that comply with applicable law and are properly provided to us. If You believe that Your Content has been copied in a way that constitutes copyright infringement, please report this by contacting us at:</p>
                <h5>Mygoodness, Inc.<br>
                    Attn: Copyright Agent<br>
                    22025 Hawthorne Blvd. #1023<br>
                    Torrance, CA 90503</h5>
                <p>You retain Your rights to any Content You submit, post or display on or through the Platform. What's Yours is Yours -- You own Your Content (and Your photos and videos are part of the Content). By submitting, posting or displaying Content on or through the Platform, You grant us a worldwide, non-exclusive, royalty-free license (with the right to sublicense) to use, copy, reproduce, process, adapt, modify, publish, transmit, display and distribute such Content in any and all media or distribution methods (now known or later developed). This license authorizes us to make Your Content available to the rest of the world and to let others do the same. You agree that this license includes the right for us to provide, promote, and improve the Platform and to make Content submitted to or through the Platform available to other companies, organizations or individuals for the syndication, broadcast, distribution, promotion or publication of such Content on other media and services, subject to our terms and conditions for such Content use. Such additional uses by us, or other companies, organizations or individuals, may be made with no compensation paid to You with respect to the Content that You submit, post, transmit or otherwise make available through the Platform. We have an evolving set of rules for how ecosystem partners can interact with Your Content on the Platform. These rules exist to enable an open ecosystem with Your rights in mind. You understand that we may modify or adapt Your Content as it is distributed, syndicated, published, or broadcast by us and our partners and/or make changes to Your Content in order to adapt the Content to different media. You represent and warrant that You have all the rights, power and authority necessary to grant the rights granted herein to any Content that You submit.</p><br>
                <h1>Platform & License</h1>
                <p>The Platform allows an individual or group of individuals (“Donors”) to donate monetary donations (“Donations”) to an acceptable non-profit organization established as such under the applicable laws of incorporation (“Acceptable Charity”) of their choice. The information contained in our database is provided for educational and informational purposes only. It is not intended to provide legal, accounting, investment or tax advice and should not be relied on in that respect. We suggest that You hire a competent attorney at law, accountant and/or financial advisor to answer any financial or legal questions.</p>
                <p>We give You a personal, worldwide, royalty-free, non-assignable and non-exclusive license to use the software provided to You as part of the Platform. This license has the sole purpose of enabling You to use and enjoy the benefit of the Platform as provided by us, in the manner permitted by these Terms of Service. The Platform is protected by copyright, trademark, and other laws of both the United States and foreign countries. Nothing in the Terms of Services gives You a right to use the “Mygoodness” name or any of the Mygoodness Inc. trademarks, logos, domain names, and other distinctive brand features. All right, title, and interest in and to the Platform (excluding Content provided by Donors) are and will remain the exclusive property of Mygoodness Inc. and its licensors. Any feedback, comments, or suggestions You may provide regarding Mygoodness Inc., or the Platform is entirely voluntary and we will be free to use such feedback, comments or suggestions as we see fit and without any obligation to You.</p><br>
                <h1>Donations</h1>
                <p>All Donations will be considered as a simple, unrestricted gift to Mygoodness Inc and will not be tracked as a grant with restrictions or conditions. As is the service of Mygoodness Inc provides to users, Mygoodness commits to sending all designated Donations to the Acceptable Charities selected by the Donor to the best of our ability on a monthly basis. Mygoodness uses credible, third-party Charity lists to provide the Donor with lists of Acceptable Charities. If, for whatever reason, Mygoodness is not able to send Your Donation to the Acceptable Charity of your choice, Mygoodness will make every effort to notify You and allow You to redirect the Donation. If after several attempts to contact You, we are unable to reach You, Mygoodness reserves the right to use the Donation with discretion to the benefit of the user and the Platform.Once You make a Donation via the Platform we will not be able to return the money to You directly as the Donor.</p>
                <p>Once you decide to Donate to a Charity through Mygoodness, You must provide us with additional payment information via a third-party payment processor. </p><br>
                <h1>Registration & Accounts</h1>
                <p>All users will be able to access the Mygoodness Platform via a free account.For a free account you must provide your email, phone number, and verification in order to complete a profile. You may create an account with mygoodness and see content from other users without having to use the platform to donate. </p>
                <p>We do not have a premium membership at this time, but we reserve the right to create a premium membership option in the future. </p>
                <p>You will need to create an account to use some of our Platform services. You are responsible for safeguarding Your account. We cannot and will not be liable for any loss or damage arising from Your failure to comply with the above. You can control most communications from the Platform. We may need to provide You with certain communications, such as service announcements and administrative messages. These communications are considered part of the Platform and Your account, and You may not be able to opt-out from receiving them. If You added Your or phone number to Your account and You later change or deactivate that phone number, You must update Your account information to help prevent us from communicating with anyone who acquires Your old number.</p>
                <p>You agree that the information provided to register with the Platform is governed by the Privacy Policy and consent to actions Mygoodness takes with respect to Your information consistent with the Privacy Policy.</p><br>
                <h1>Payment Terms</h1>
                <p>We are not a payment processor, but instead use third-party payment processing partners to process donations (“Payment Processor”). You acknowledge and agree that the use of a Payment Processor is integral to the Platform and that we exchange information with Payment Processors in order to facilitate the provision of services.</p>
                <p>Although there are no fees associated with Donations, Donors will be given an opportunity to cover platform and Payment Processor fees on a voluntary basis by donating tips directly to the Company (“Contributions”). Contributions will be kept by the Company as revenue and will not be distributed to a Charity.</p>
                <p>The Company is recognized as a tax-exempt public charity as described in Sections 501(c)(3) of the Internal Revenue Code. Contributions made to the Company are considered an irrevocable gift and are not refundable. Please be aware that Company has exclusive legal control over the Donations You have made. We will make every effort to distribute Donations as specified by the Donor on a regular basis to the extent possible.</p><br>
                <h1>Charities</h1>
                <p>Donations must be made to Acceptable Charities.  For example, in the United States, the Charity must be a 501(c)(3), (c)(4) or other non-profit organization, raising funds for a charitable purpose. All Acceptable Charities must be in good standing with the Internal Revenue Service and pass a third-party watchdog organization screening, conducted by mygoodness or partnering with credible, third-party charity lists. We solely reserve the right to determine which non-profit organizations are Acceptable Charities and reserve the right to add or remove non-profit organizations at any time.</p>
                <p>When You donate to your charity of choice through the mygoodness platform, we will use a secure, reliable third-party payment processing service that will handle all payments made through credit card, direct deposit, or whatever medium You select. We will receive the donation and provide you with an immediate acknowledgment of payment as a 501(c)(3), which will be tracked as transactions on Your account page. Then at regular and consistent intervals, we will distribute donations to the charity of Your choice directly. We will not share Your personal details or any Personal Identifiable Information with the Charity unless You have otherwise told us to do so.</p>
                <p>As a Donor, You will receive confirmation of both the receipt of Your donation through our platform and the distribution of your Donation to your Charity of choice through a report and tax receipt at the end of the year. </p>
                <p>We do not guarantee that the information listed about the Acceptable Charity is accurate or up-to-date.</p><br>
                <h1>Conduct</h1>
                <p>You agree to use the Platform in accordance with all laws and not to misuse our Platform, for example, by interfering with the services or accessing them using a method other than the interface and the instructions that we provide. You may not do any of the following while accessing or using the Platform: (i) access, tamper with, or use non-public areas of the Platform, our computer systems, or the technical delivery systems of our providers; (ii) probe, scan, or test the vulnerability of any system or network or breach or circumvent any security or authentication measures; (iii) access or search or attempt to access or search the Platform by any means (automated or otherwise) other than through our currently available, published interfaces that are provided by us (and only pursuant to the applicable terms and conditions), unless You have been specifically allowed to do so in a separate agreement with us (NOTE: crawling the Platform is permissible if done in accordance with the provisions of the robots.txt file, however, scraping the Platform without our  prior consent is expressly prohibited); (iv) forge any TCP/IP packet header or any part of the header information in any email or posting, or in any way use the Platform to send altered, deceptive or false source-identifying information; or (v) interfere with, or disrupt, (or attempt to do so), the access of any user, host or network, including, without limitation, sending a virus, overloading, flooding, spamming, mail-bombing the Platform, or by scripting the creation of Content in such a manner as to interfere with or create an undue burden on the Platform. We also reserve the right to access, read, preserve, and disclose any information as we reasonably believe is necessary to (i) satisfy any applicable law, regulation, legal process or governmental request, (ii) enforce the Terms of Service, including investigation of potential violations hereof, (iii) detect, prevent, or otherwise address fraud, security or technical issues, (iv) respond to Donor support requests, or (v) protect our rights, property or safety of our Donors and the public. We do not disclose personally-identifying information to third parties except in accordance with our Privacy Policy. If You want to reproduce, modify, create derivative works, distribute, sell, transfer, publicly display, publicly perform, transmit, or otherwise use the Platform or Content on the Platform, You must use the interfaces and instructions we provide, except as permitted through the Terms of Service.</p>
                <p>We may stop (permanently or temporarily) providing the Platform or any features within the Platform to You or to Donors generally. We also retain the right to create limits on use and storage at our sole discretion at any time. We may also remove or refuse to distribute any Content on the Platform, suspend or terminate Donors, and reclaim usernames without liability to You. In consideration for us granting You access to and use of the Platform, You agree that we and its third-party providers and partners may place advertising on the Platform or in connection with the display of Content or information on the Platform whether submitted by You or others.</p><br>
                <h1>Intellectual Property</h1>
                <p>You shall not copy, reproduce, republish, upload, download, or otherwise obtain in any way the software source materials of the Company. Such software source materials are the sole property of the Company or its licensors, who retain all right, title and interest in such materials, including without limitation all copyright, trademark, patent, trade secret and all other intellectual property rights.</p><br>
                <h1>Third-Party Links & Site</h1>
                <p>We do not endorse, support, sanction, or verify the information or material that is provided on or linked to the reports on the Company’s Website. Unless otherwise specifically indicated, mygoodness does not have any affiliation with any of the organizations mentioned or described therein, and neither makes any representations or warranties with regard to such organizations. The Company is providing such information and links to You only as a convenience, and the inclusion of any information or link does not imply endorsement by the Company of such charity or any association with such charity's operations. Although every effort has been made to ensure that the information provided is correct, we cannot guarantee its accuracy. </p><br>
                <h1>Ending These Terms of Service</h1>
                <p>You may end your legal agreement with us at any time by deactivating Your account and discontinuing Your use of the Platform. We may suspend or terminate Your account or cease providing You with all or part of the Platform at any time for any or no reason, including, but not limited to, if we reasonably believe: (i) You have violated these Terms of Service, (ii) You create risk or possible legal exposure for us; (iii) Your account should be removed due to prolonged inactivity; or (iv) our provision of the Platform to You is no longer commercially viable. We will make reasonable efforts to notify You by email and/or phone number associated with Your account, platform notification, or the next time You attempt to access Your account, depending on the circumstances. In all such cases, the Terms of Service shall terminate, including, without limitation, Your license to use the Platform.</p><br>
                <h1>Disclaimers & Limitations of Liability</h1>
                <p>The Services are Available “AS-IS”.</p>                    
                <p>Your access to and use of the platform or any content are at your own risk. You understand and agree that the platform is provided to you on an "As is" and "As available" basis. We disclaim all warranties and conditions, whether express or implied, of merchantability, fitness for a particular purpose, or non-infringement. We make no warranty or representation and disclaim all responsibility and liability for: (I) the completeness, accuracy, availability, timeliness, security or reliability of the platform or any content; (ii) any harm to your computer system, loss of data, or other harm that results from your access to or use of the platform or any content; (iii) the deletion of, or the failure to store or to transmit, any content and other communications maintained by the platform; and (iv) whether the platform will meet your requirements or be available on an uninterrupted, secure, or error-free basis. No advice or information, whether oral or written, obtained from us or through the platform, will create any warranty or representation not expressly made herein</p>
                <p>To the maximum extent permitted by applicable law, we shall not be liable for any indirect, incidental, special, consequential or punitive damages, or any loss of profits or revenues,whether incurred directly or indirectly, or any loss of data, use, good-will, or other intangible losses, resulting from (I) your access to or use of or inability to access or use the platform; (ii) any conduct or content of any third party on the platform, including without limitation, any defamatory, offensive or illegal conduct of other users or third parties; (iii) any content obtained from the platform; or (iv) unauthorized access, use or alteration of your transmissions or content. In no event shall our aggregate liability exceed the greater of one hundred u.S. Dollars (u.S. $100.00). The limitations of this subsection shall apply to any theory of liability, whether based on warranty, contract, statute, tort (including negligence) or otherwise, and whether or not we have been informed of the possibility of any such damage, and even if a remedy set forth herein is found to have failed of its essential purpose.</p><br>
                <h1>Miscellaneous</h1>
                <p>All disputes related to these Terms of Service or the Platform will be brought solely in the federal or state courts located in Los Angeles County, California, United States, and You consent to personal jurisdiction and waive any objection as to inconvenient forum. If You are a federal, state, or local government entity in the United States using the Platform in Your official capacity and legally unable to accept the controlling law, jurisdiction or venue clauses above, then those clauses do not apply to You. For such U.S. federal government entities, these Terms of Service and any action related thereto will be governed by the laws of the United States of America (without reference to conflict of laws) and, in the absence of federal law and to the extent permitted under federal law, the laws of the State of California (excluding choice of law). In the event that any provision of these Terms of Service is held to be invalid or unenforceable, then that provision will be limited or eliminated to the minimum extent necessary, and the remaining provisions of these Terms of Service will remain in full force and effect. Our failure to enforce any right or provision of these Terms of Service will not be deemed a waiver of such right or provision.</p><br>
                <h1>Entire Agreement</h1>
                <p>The Terms of Service and our Privacy Policy constitute the entire agreement between You and MyGoodness Inc. regarding the Platform and supersede all prior and contemporaneous understandings, agreements, representations, and warranties, both written and oral, regarding the Platform.</p>
                <p>These Terms are an agreement between You and Mygoodness, Inc., 22025 Hawthorne Blvd., #1023, Torrance, CA 90503. If You have any questions about these Terms of Service, please contact us.</p>
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
