// ========================================
// CHATBOT OPEN / CLOSE
// ========================================

function toggleChatbot() {

    const chatbot = document.getElementById("chatbot");
    const button = document.getElementById("chatbot-toggle");

    if (chatbot.style.display === "flex") {

        chatbot.style.display = "none";
        button.innerHTML = "💬";

    } else {

        chatbot.style.display = "flex";
        button.innerHTML = "✕";

    }
}


// ========================================
// LEAD DATA
// ========================================

let leadData = {
    service: "",
    requirement: "",
    name: "",
    phone: "",
    email: ""
};


// ========================================
// SERVICE SELECTION
// ========================================

function selectService(service) {

    leadData.service = service;

    addUserMessage(service);

    document.getElementById("service-buttons").style.display = "none";

    addBotMessage(
        "You selected <b>" +
        service +
        "</b>."
    );

    setTimeout(function () {

        switch (service) {

            case "Trademark Registration":
                trademarkFlow();
                break;

            case "Copyright Registration":
                copyrightFlow();
                break;

            case "GST Registration":
                gstFlow();
                break;

            case "FSSAI / Food License":
                fssaiFlow();
                break;

            case "ISO Certification":
                isoFlow();
                break;

            case "Brand Identity":
                brandIdentityFlow();
                break;

            case "Legal Consulting":
                legalConsultingFlow();
                break;

            default:
                showContactQuestion();
        }

    }, 500);
}


// ========================================
// TRADEMARK
// ========================================

function trademarkFlow() {

    addBotMessage(
        "What type of applicant are you?"
    );

    showOptions([
        "Individual",
        "Company",
        "Partnership"
    ]);
}


// ========================================
// COPYRIGHT
// ========================================

function copyrightFlow() {

    addBotMessage(
        "What type of work do you want to protect?"
    );

    showOptions([
        "Literary Work",
        "Music",
        "Software",
        "Art / Design",
        "Other"
    ]);
}


// ========================================
// GST
// ========================================

function gstFlow() {

    addBotMessage(
        "What type of business do you have?"
    );

    showOptions([
        "Proprietorship",
        "Partnership",
        "Company",
        "Other"
    ]);
}


// ========================================
// FSSAI
// ========================================

function fssaiFlow() {

    addBotMessage(
        "What type of food business do you operate?"
    );

    showOptions([
        "Restaurant",
        "Tiffin Service",
        "Food Manufacturer",
        "Food Seller",
        "Other"
    ]);
}


// ========================================
// ISO
// ========================================

function isoFlow() {

    addBotMessage(
        "Which ISO certification are you interested in?"
    );

    showOptions([
        "ISO 9001",
        "ISO 14001",
        "ISO 45001",
        "Other ISO"
    ]);
}


// ========================================
// BRAND IDENTITY
// ========================================

function brandIdentityFlow() {

    addBotMessage(
        "What branding service are you looking for?"
    );

    showOptions([
        "Logo Design",
        "Brand Name",
        "Complete Brand Identity",
        "Other"
    ]);
}


// ========================================
// LEGAL CONSULTING
// ========================================

function legalConsultingFlow() {

    addBotMessage(
        "What type of legal assistance do you need?"
    );

    showOptions([
        "Business Legal",
        "IPR Related",
        "Agreement / Contract",
        "Other"
    ]);
}


// ========================================
// SHOW OPTIONS
// ========================================

function showOptions(options) {

    const chatBox =
        document.getElementById("chat-box");

    const container =
        document.createElement("div");

    container.className =
        "service-buttons";


    options.forEach(function (option) {

        const button =
            document.createElement("button");

        button.innerHTML = option;


        button.onclick = function () {

            selectOption(
                option,
                container
            );

        };


        container.appendChild(button);

    });


    chatBox.appendChild(container);

    scrollToBottom();
}


// ========================================
// OPTION SELECTION
// ========================================

function selectOption(option, container) {

    addUserMessage(option);

    container.remove();

    leadData.requirement = option;

    addBotMessage(
        "Thank you. You selected <b>" +
        option +
        "</b>."
    );


    setTimeout(function () {

        showContactQuestion();

    }, 500);
}


// ========================================
// CONTACT QUESTION
// ========================================

function showContactQuestion() {

    addBotMessage(
        "Please provide your contact details so our team can contact you."
    );

    showContactForm();
}


// ========================================
// CONTACT FORM
// ========================================

function showContactForm() {

    const chatBox =
        document.getElementById("chat-box");


    const form =
        document.createElement("div");

    form.className =
        "contact-form";


    form.innerHTML = `

        <input
            type="text"
            id="user-name"
            placeholder="Your Name"
        >

        <br><br>

        <input
            type="tel"
            id="user-phone"
            placeholder="Mobile Number"
        >

        <br><br>

        <input
            type="email"
            id="user-email"
            placeholder="Email Address"
        >

        <br><br>

        <button onclick="submitLead()">
            Submit
        </button>

    `;


    chatBox.appendChild(form);

    scrollToBottom();
}


// ========================================
// SUBMIT LEAD
// ========================================

function submitLead() {

    const name =
        document.getElementById("user-name")
        .value
        .trim();


    const phone =
        document.getElementById("user-phone")
        .value
        .trim();


    const email =
        document.getElementById("user-email")
        .value
        .trim();


    // ====================================
    // VALIDATION
    // ====================================

    if (name === "") {

        alert("Please enter your name.");

        return;
    }


    if (phone === "") {

        alert("Please enter your mobile number.");

        return;
    }


    if (email === "") {

        alert("Please enter your email address.");

        return;
    }


    // ====================================
    // SAVE DATA
    // ====================================

    leadData.name = name;
    leadData.phone = phone;
    leadData.email = email;


    // ====================================
    // REMOVE FORM
    // ====================================

    const form =
        document.querySelector(".contact-form");


    if (form) {

        form.remove();

    }


    // ====================================
    // SHOW USER DETAILS
    // ====================================

    addUserMessage(
        "Name: " +
        name +
        "<br>" +
        "Mobile: " +
        phone +
        "<br>" +
        "Email: " +
        email
    );


    // ====================================
    // SEND TO PHP
    // ====================================

    const formData = new FormData();

    formData.append(
        "service",
        leadData.service
    );

    formData.append(
        "requirement",
        leadData.requirement
    );

    formData.append(
        "name",
        leadData.name
    );

    formData.append(
        "phone",
        leadData.phone
    );

    formData.append(
        "email",
        leadData.email
    );


    // ====================================
    // SEND REQUEST
    // ====================================

    fetch("save_lead.php", {

        method: "POST",

        body: formData

    })

    .then(function (response) {

        return response.text();

    })

    .then(function (data) {

        console.log(
            "Server Response:",
            data
        );


        // =================================
        // SUCCESS
        // =================================

        addBotMessage(
            "Thank you, <b>" +
            name +
            "</b>!<br><br>" +

            "Your request has been received successfully." +
            "<br><br>" +

            "Our CopyHart team will contact you shortly."
        );


        scrollToBottom();

    })

    .catch(function (error) {

        console.error(
            "Error:",
            error
        );


        addBotMessage(
            "Your details could not be submitted right now. Please try again."
        );

    });
}


// ========================================
// ADD USER MESSAGE
// ========================================

function addUserMessage(message) {

    const chatBox =
        document.getElementById("chat-box");


    const userMessage =
        document.createElement("div");


    userMessage.className =
        "user-message";


    userMessage.innerHTML =
        message;


    chatBox.appendChild(
        userMessage
    );


    scrollToBottom();
}


// ========================================
// ADD BOT MESSAGE
// ========================================

function addBotMessage(message) {

    const chatBox =
        document.getElementById("chat-box");


    const botMessage =
        document.createElement("div");


    botMessage.className =
        "bot-message";


    botMessage.innerHTML =
        message;


    chatBox.appendChild(
        botMessage
    );


    scrollToBottom();
}


// ========================================
// AUTO SCROLL
// ========================================

function scrollToBottom() {

    const chatBox =
        document.getElementById("chat-box");


    chatBox.scrollTop =
        chatBox.scrollHeight;
}