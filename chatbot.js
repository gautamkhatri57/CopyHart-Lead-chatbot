/* =====================================================
   CHATBOT OPEN / CLOSE
===================================================== */

function toggleChatbot() {

    const chatbot = document.getElementById("chatbot");

    if (chatbot.style.display === "block") {

        chatbot.style.display = "none";

    } else {

        chatbot.style.display = "block";

    }

}


/* =====================================================
   SERVICE-SPECIFIC OPTIONS
===================================================== */

const serviceOptions = {

    "Trademark Registration": [
        "Individual",
        "Proprietor",
        "Partnership Firm",
        "LLP",
        "Private Limited Company",
        "Public Limited Company",
        "Other"
    ],

    "Copyright Registration": [
        "Individual",
        "Company",
        "Organization",
        "Author / Creator",
        "Other"
    ],

    "GST Registration": [
        "Proprietorship",
        "Partnership Firm",
        "LLP",
        "Private Limited Company",
        "Public Limited Company",
        "Other"
    ],

    "FSSAI / Food License": [
        "Proprietorship",
        "Partnership Firm",
        "LLP",
        "Private Limited Company",
        "Restaurant / Cafe",
        "Food Manufacturer",
        "Other"
    ],

    "ISO Certification": [
        "Private Limited Company",
        "Public Limited Company",
        "LLP",
        "Partnership Firm",
        "Proprietorship",
        "Organization",
        "Other"
    ],

    "Brand Identity": [
        "New Business",
        "Existing Business",
        "Startup",
        "Personal Brand",
        "Other"
    ],

    "Legal Consulting": [
        "Individual",
        "Proprietorship",
        "Partnership Firm",
        "LLP",
        "Private Limited Company",
        "Public Limited Company",
        "Other"
    ]

};


/* =====================================================
   SERVICE SELECTION
===================================================== */

function selectService(service) {

    const chatBox =
        document.getElementById("chat-box");

    const serviceButtons =
        document.getElementById("service-buttons");


    // Show selected service

    const userMessage =
        document.createElement("div");

    userMessage.className =
        "user-message";

    userMessage.innerText =
        service;

    chatBox.appendChild(userMessage);


    // Hide service buttons

    serviceButtons.style.display =
        "none";


    // Bot response

    setTimeout(function () {

        const botMessage =
            document.createElement("div");

        botMessage.className =
            "bot-message";

        botMessage.innerHTML =
            "Great choice! 👍<br><br>" +
            "You selected <strong>" +
            service +
            "</strong>.<br><br>" +
            "Please select the option that best describes you:";

        chatBox.appendChild(
            botMessage
        );


        // Show service-specific options

        showServiceOptions(service);


        // Scroll

        chatBox.scrollTop =
            chatBox.scrollHeight;

    }, 500);

}


/* =====================================================
   SHOW SERVICE OPTIONS
===================================================== */

function showServiceOptions(service) {

    const chatBox =
        document.getElementById("chat-box");


    const options =
        serviceOptions[service] || [
            "Individual",
            "Business",
            "Company",
            "Other"
        ];


    const optionsContainer =
        document.createElement("div");

    optionsContainer.className =
        "service-options";


    options.forEach(function (option) {

        const button =
            document.createElement("button");

        button.innerText =
            option;


        button.onclick = function () {

            selectServiceOption(
                service,
                option,
                optionsContainer
            );

        };


        optionsContainer.appendChild(
            button
        );

    });


    chatBox.appendChild(
        optionsContainer
    );


    chatBox.scrollTop =
        chatBox.scrollHeight;

}


/* =====================================================
   SERVICE OPTION SELECTION
===================================================== */

function selectServiceOption(
    service,
    option,
    optionsContainer
) {

    const chatBox =
        document.getElementById("chat-box");


    // Show selected option

    const userMessage =
        document.createElement("div");

    userMessage.className =
        "user-message";

    userMessage.innerText =
        option;

    chatBox.appendChild(
        userMessage
    );


    // Hide options

    optionsContainer.style.display =
        "none";


    // Bot response

    setTimeout(function () {

        const botMessage =
            document.createElement("div");

        botMessage.className =
            "bot-message";

        botMessage.innerHTML =
            "Perfect! 👍<br><br>" +
            "Now please provide your contact details " +
            "so our CopyHart team can assist you.";

        chatBox.appendChild(
            botMessage
        );


        // Show lead form

        showLeadForm(
            service,
            option
        );


        chatBox.scrollTop =
            chatBox.scrollHeight;

    }, 500);

}


/* =====================================================
   LEAD FORM
===================================================== */

function showLeadForm(
    service,
    requirement
) {

    const chatBox =
        document.getElementById("chat-box");


    const formContainer =
        document.createElement("div");

    formContainer.className =
        "lead-form";


    formContainer.innerHTML = `

        <input
            type="text"
            id="lead-name"
            placeholder="Your Name"
        >

        <input
            type="tel"
            id="lead-phone"
            placeholder="Mobile Number"
        >

        <input
            type="email"
            id="lead-email"
            placeholder="Email Address"
        >

        <button
            onclick="submitLead(
                '${service}',
                '${requirement}'
            )">

            Submit Details

        </button>

    `;


    chatBox.appendChild(
        formContainer
    );


    chatBox.scrollTop =
        chatBox.scrollHeight;

}


/* =====================================================
   SUBMIT LEAD
===================================================== */

function submitLead(
    service,
    requirement
) {

    const name =
        document
            .getElementById("lead-name")
            .value
            .trim();


    const phone =
        document
            .getElementById("lead-phone")
            .value
            .trim();


    const email =
        document
            .getElementById("lead-email")
            .value
            .trim();


    /* ---------------------------------------------
       VALIDATION
    --------------------------------------------- */

    if (
        name === "" ||
        phone === "" ||
        email === ""
    ) {

        alert(
            "Please fill all details."
        );

        return;

    }


    /* ---------------------------------------------
       CREATE FORM DATA
    --------------------------------------------- */

    const formData =
        new FormData();


    formData.append(
        "name",
        name
    );


    formData.append(
        "phone",
        phone
    );


    formData.append(
        "email",
        email
    );


    formData.append(
        "service",
        service
    );


    // IMPORTANT:
    // save_lead.php expects "requirement"

    formData.append(
        "requirement",
        requirement
    );


    /* ---------------------------------------------
       SEND TO PHP
    --------------------------------------------- */

    fetch(
        "save_lead.php",
        {
            method: "POST",
            body: formData
        }
    )

    .then(
        response =>
            response.text()
    )

    .then(
        data => {

            console.log(
                "Server Response:",
                data
            );


            const chatBox =
                document.getElementById(
                    "chat-box"
                );


            /* -------------------------------------
               SUCCESS MESSAGE
            ------------------------------------- */

            const successMessage =
                document.createElement("div");

            successMessage.className =
                "bot-message";


            successMessage.innerHTML =

                "Thank you, " +
                name +
                "! 🎉<br><br>" +

                "Your details have been submitted successfully." +
                "<br><br>" +

                "<strong>Service:</strong> " +
                service +
                "<br>" +

                "<strong>Requirement:</strong> " +
                requirement +
                "<br><br>" +

                "Our CopyHart team will contact you soon.";


            chatBox.appendChild(
                successMessage
            );


            /* -------------------------------------
               REMOVE FORM
            ------------------------------------- */

            const form =
                document.querySelector(
                    ".lead-form"
                );


            if (form) {

                form.remove();

            }


            /* -------------------------------------
               SCROLL
            ------------------------------------- */

            chatBox.scrollTop =
                chatBox.scrollHeight;

        }
    )

    .catch(
        error => {

            console.error(
                error
            );

            alert(
                "Unable to submit your details. Please try again."
            );

        }
    );

}