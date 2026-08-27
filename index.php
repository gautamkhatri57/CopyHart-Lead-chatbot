<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>CopyHart - Business & Legal Services</title>

    <link rel="stylesheet" href="chatbot.css">

</head>


<body>


<!-- =====================================================
     COPYHART HOME PAGE
===================================================== -->

<header class="main-header">

    <div class="logo">
        CopyHart
    </div>


    <nav class="navbar">

        <a href="#">Home</a>

        <a href="#services">Services</a>

        <a href="#about">About Us</a>

        <a href="#contact">Contact</a>

    </nav>


    <button class="header-button"
            onclick="toggleChatbot()">

        Talk to Us

    </button>

</header>



<!-- =====================================================
     HERO SECTION
===================================================== -->

<section class="hero-section">

    <div class="hero-content">

        <span class="hero-tag">
            BUSINESS & LEGAL SERVICES
        </span>


        <h1>
            Protect Your Brand.
            <br>
            Grow Your Business.
        </h1>


        <p>
            Professional business, intellectual property
            and legal services to help your business grow
            with confidence.
        </p>


        <div class="hero-buttons">

            <button class="primary-button"
                    onclick="toggleChatbot()">

                Get Started

            </button>


            <a href="#services"
               class="secondary-button">

                Explore Services

            </a>

        </div>

    </div>


    <div class="hero-card">

        <div class="hero-card-icon">
            ⚖️
        </div>

        <h3>
            Your Business,
            <br>
            Our Support
        </h3>

        <p>
            From registration to protection,
            we've got you covered.
        </p>

    </div>

</section>



<!-- =====================================================
     SERVICES SECTION
===================================================== -->

<section id="services"
         class="services-section">


    <div class="section-heading">

        <span>
            WHAT WE OFFER
        </span>

        <h2>
            Our Professional Services
        </h2>

        <p>
            Everything you need to start,
            protect and grow your business.
        </p>

    </div>



    <div class="service-grid">


        <div class="service-card">

            <div class="service-icon">
                ™
            </div>

            <h3>
                Trademark Registration
            </h3>

            <p>
                Protect your brand name,
                logo and identity.
            </p>

        </div>



        <div class="service-card">

            <div class="service-icon">
                ©
            </div>

            <h3>
                Copyright Registration
            </h3>

            <p>
                Protect your creative work
                and intellectual property.
            </p>

        </div>



        <div class="service-card">

            <div class="service-icon">
                GST
            </div>

            <h3>
                GST Registration
            </h3>

            <p>
                Get your business registered
                and GST compliant.
            </p>

        </div>



        <div class="service-card">

            <div class="service-icon">
                🍴
            </div>

            <h3>
                FSSAI / Food License
            </h3>

            <p>
                Complete food licensing
                support for your business.
            </p>

        </div>



        <div class="service-card">

            <div class="service-icon">
                ISO
            </div>

            <h3>
                ISO Certification
            </h3>

            <p>
                Build trust and credibility
                with ISO certification.
            </p>

        </div>



        <div class="service-card">

            <div class="service-icon">
                ✦
            </div>

            <h3>
                Brand Identity
            </h3>

            <p>
                Create a professional identity
                for your business.
            </p>

        </div>


    </div>

</section>



<!-- =====================================================
     ABOUT SECTION
===================================================== -->

<section id="about"
         class="about-section">


    <div class="about-content">

        <span>
            ABOUT COPYHART
        </span>

        <h2>
            Helping Businesses
            Move Forward
        </h2>

        <p>
            CopyHart provides professional business,
            intellectual property and legal services
            designed to make business processes simple,
            reliable and accessible.
        </p>


        <p>
            Whether you are starting a new business
            or protecting an existing brand, our team
            is here to support you.
        </p>

    </div>


    <div class="about-box">

        <div>
            <strong>7+</strong>
            <span>Services</span>
        </div>

        <div>
            <strong>24/7</strong>
            <span>Online Support</span>
        </div>

        <div>
            <strong>100%</strong>
            <span>Customer Focus</span>
        </div>

    </div>

</section>



<!-- =====================================================
     CONTACT SECTION
===================================================== -->

<section id="contact"
         class="contact-section">


    <div class="contact-content">

        <span>
            NEED HELP?
        </span>

        <h2>
            Let's Talk About Your Business
        </h2>

        <p>
            Have questions about our services?
            Our AI assistant can help you find
            the right service.
        </p>


        <button class="primary-button"
                onclick="toggleChatbot()">

            Chat with CopyHart Assistant

        </button>

    </div>

</section>



<!-- =====================================================
     FOOTER
===================================================== -->

<footer class="footer">

    <div class="footer-logo">
        CopyHart
    </div>

    <p>
        © 2026 CopyHart Services. All rights reserved.
    </p>

</footer>



<!-- =====================================================
     CHATBOT FLOATING BUTTON
===================================================== -->

<button id="chatbot-toggle"
        onclick="toggleChatbot()">

    💬

</button>



<!-- =====================================================
     CHATBOT WINDOW
===================================================== -->

<div id="chatbot"
     class="chatbot">


    <!-- CHAT HEADER -->

    <div class="chat-header">

        <div>

            <h3>
                CopyHart Assistant
            </h3>

            <p>
                How can we help you?
            </p>

        </div>


        <button class="chat-close"
                onclick="toggleChatbot()">

            ×

        </button>

    </div>



    <!-- CHAT BODY -->

    <div id="chat-box"
         class="chat-box">


        <!-- INITIAL BOT MESSAGE -->

        <div class="bot-message">

            Hello! 👋 Welcome to CopyHart.

            <br><br>

            Please select a service you are interested in:

        </div>



        <!-- SERVICE BUTTONS -->

        <div id="service-buttons"
             class="service-buttons">


            <button onclick="selectService('Trademark Registration')">

                Trademark Registration

            </button>


            <button onclick="selectService('Copyright Registration')">

                Copyright Registration

            </button>


            <button onclick="selectService('GST Registration')">

                GST Registration

            </button>


            <button onclick="selectService('FSSAI / Food License')">

                FSSAI / Food License

            </button>


            <button onclick="selectService('ISO Certification')">

                ISO Certification

            </button>


            <button onclick="selectService('Brand Identity')">

                Brand Identity

            </button>


            <button onclick="selectService('Legal Consulting')">

                Legal Consulting

            </button>


        </div>


    </div>


</div>



<!-- JAVASCRIPT -->

<script src="chatbot.js"></script>


</body>

</html>