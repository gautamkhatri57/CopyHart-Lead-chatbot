<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>CopyHart Assistant</title>

    <link rel="stylesheet" href="chatbot.css">

</head>

<body>


<!-- Chatbot Floating Button -->

<button id="chatbot-toggle"
        onclick="toggleChatbot()">

    💬

</button>


<!-- Chatbot Window -->

<div id="chatbot" class="chatbot">


    <!-- Header -->

    <div class="chat-header">

        <h3>CopyHart Assistant</h3>

        <p>How can we help you?</p>

    </div>


    <!-- Chat Area -->

    <div id="chat-box" class="chat-box">

        <div class="bot-message">

            Hello! 👋 Welcome to CopyHart.

            <br><br>

            Please select a service you are interested in:

        </div>


        <!-- Services -->

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


<script src="chatbot.js"></script>

</body>

</html>