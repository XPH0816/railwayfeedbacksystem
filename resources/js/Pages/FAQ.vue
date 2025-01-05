<script setup>
import { Head } from '@inertiajs/vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
function toggleFAQ(event) {
    const parent = event.target.closest('.faq-item');
    const content = parent.querySelector('p');
    const button = parent.querySelector('button');
    parent.classList.toggle('active');
    if (parent.classList.contains('active')) {
        content.style.maxHeight = content.scrollHeight + 20 + 'px';
        button.innerText = '−';
    } else {
        content.style.maxHeight = '0';
        button.innerText = '+';
    }
}

function searchFAQ() {
    const input = document.getElementById('faqSearch').value.toLowerCase();
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('h3').innerText.toLowerCase();
        if (question.includes(input)) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}
</script>

<template>

    <Head title="FAQ" />
    <HomeLayout>
        <div class="faq-intro">
            <h1>Frequently Asked Questions</h1>
            <p>Find answers to the most commonly asked questions.</p>
        </div>
        <div class="faq-search">
            <input type="text" id="faqSearch" placeholder="Search for a question">
            <button @click.prevent="searchFAQ">Search</button>
        </div>
        <div class="faq-container" id="faqContainer">
            <div class="faq-category">ACCOUNT MANAGEMENT</div>
            <div class="faq-item">
                <h3 @click.prevent="toggleFAQ">
                    How do I create an account on the XYZ Railway Customer Feedback System?
                    <button type="button">+</button>
                </h3>
                <p>
                    To create an account, click on the "Sign Up" button on the homepage. Fill in your details, including
                    your name,
                    email, and a strong password. Once registered, you will receive a verification email to confirm your
                    account.
                </p>
            </div>
            <div class="faq-item">
                <h3 @click.prevent="toggleFAQ">
                    I forgot my password. How can I reset it?
                    <button type="button">+</button>
                </h3>
                <p>
                    You can reset your password by clicking the "Forgot Password" link on the login page. Follow the
                    instructions to
                    receive a password reset link in your registered email. For added security, we recommend creating a
                    strong,
                    unique password.
                </p>
            </div>
            <div class="faq-item">
                <h3 @click.prevent="toggleFAQ">
                    How does the system ensure the security of my personal information?
                    <button type="button">+</button>
                </h3>
                <p>
                    The system uses advanced security measures, including password hashing and Cross-Site Request
                    Forgery
                    (CSRF)
                    protection. Password hashing encrypts your password, making it difficult for attackers to access
                    your
                    account,
                    while CSRF protection prevents unauthorized actions.
                </p>
            </div>
            <div class="faq-item">
                <h3 @click.prevent="toggleFAQ">
                    Can I update my account details after registration?
                    <button type="button">+</button>
                </h3>
                <p>
                    Yes, you can update your account information, such as your email and password, by going to the
                    "Account
                    Settings" section after logging in.
                </p>
            </div>
            <div class="faq-category">FEEDBACK SUBMISSION</div>
            <div class="faq-item">
                <h3 @click.prevent="toggleFAQ">How do I submit feedback through the system?<button
                        type="button">+</button>
                </h3>
                <p>
                    Log in to your account, navigate to the "Submit Feedback" section, and fill out the feedback form.
                    You
                    can
                    include comments, ratings, and upload any relevant files to support your feedback.
                </p>
            </div>
            <div class="faq-item">
                <h3 @click.prevent="toggleFAQ">Can I update or delete my feedback after submission?<button
                        type="button">+</button></h3>
                <p>
                    Yes, you can edit or delete your feedback within 24 hours of submission. After this period, the
                    feedback
                    will be
                    locked for analysis. If you have additional comments, you can submit new feedback.
                </p>
            </div>
            <div class="faq-item">
                <h3 @click.prevent="toggleFAQ">What happens after I submit my feedback?<button type="button">+</button>
                </h3>
                <p>
                    Your feedback will be reviewed by our customer support team. You may receive a follow-up email if
                    additional
                    information is needed. The feedback is used to improve our services and resolve any issues.
                </p>
            </div>
            <div class="faq-item">
                <h3 @click.prevent="toggleFAQ">Is my feedback anonymous? <button type="button">+</button></h3>
                <p>
                    No, feedback is linked to your registered account to ensure authenticity. However, your personal
                    details
                    are
                    kept confidential and are only used for internal analysis.
                </p>
            </div>
            <div class="faq-category">TECHNICAL SUPPORT</div>
            <div class="faq-item">
                <h3 @click.prevent="toggleFAQ">What should I do if the system crashes?<button type="button">+</button>
                </h3>
                <p>Try refreshing your browser. If the issue persists, please contact our technical support team via
                    email
                    at
                    support@xyzrailway.com or call our helpline for assistance.</p>
            </div>
            <div class="faq-item">
                <h3 @click.prevent="toggleFAQ"> How do you protect against spam or fake feedback?<button
                        type="button">+</button>
                </h3>
                <p>
                    To prevent spam, we require users to register with a valid email address and verify their identity.
                </p>
            </div>
            <div class="faq-item">
                <h3 @click.prevent="toggleFAQ"> Can I view feedback submitted by other customers?<button
                        type="button">+</button>
                </h3>
                <p>
                    No, individual feedback submissions are private. However, XYZ Railway may share aggregated and
                    anonymized
                    feedback data to highlight common issues and improvements.
                </p>
            </div>
            <div class="faq-item">
                <h3 @click.prevent="toggleFAQ"> Who can I contact for support or technical issues?<button
                        type="button">+</button>
                </h3>
                <p>
                    If you encounter any issues, contact our support team via email at support@xyzrailway.com or call
                    our
                    helpline
                    for assistance.
                </p>
            </div>
        </div>
    </HomeLayout>
</template>

<style scoped>
.faq-intro {
    text-align: center;
}

.faq-intro h1 {
    font-size: 2.5rem;
    color: #000000;
    margin: 0;
}

.faq-intro p {
    font-size: 1.3rem;
    color: #333;
    margin-top: 5px;
}

.faq-search {
    display: flex;
    gap: 1rem;
    text-align: center;
    margin: 10px auto 30px;
}

.faq-search input {
    padding: 10px 20px;
    font-size: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.faq-search button {
    padding: 10px 20px;
    background-color: #333;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 20px;
    cursor: pointer;
}

.faq-search button:hover {
    background-color: #555;
}

.faq-container {
    width: 70%;
    margin: 10px auto;
    padding: 0;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0);
}

.faq-category {
    font-size: 34px;
    color: rgb(28, 16, 108);
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 20px;
}

.faq-item {
    margin-bottom: 20px;
}

.faq-item h3 {
    margin: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    font-size: 22px;
    color: black;
    border-bottom: 2px solid rgb(9, 9, 9);
    padding-bottom: 7px;
    text-transform: uppercase;
}

.faq-item p {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.6s ease, padding 0.6s ease;
    margin-top: 10px;
    font-size: 20px;
    line-height: 1.5;
    color: #555;
    text-align: justify;
}

.faq-item.active p {
    padding: 10px 0;
}

.faq-item button {
    background: none;
    border: none;
    font-size: 40px;
    cursor: pointer;
    color: rgb(3, 2, 1);
}

.faq-item button:hover {
    color: rgb(28, 16, 108);
}

@media screen and (max-width: 768px) {
    .faq-container {
        width: 90%;
    }

    .faq-search {
        flex-direction: column;
        margin: 0 auto;
    }

    .faq-search input {
        font-size: 16px;
        padding: 8px 16px;
    }

    .faq-search button {
        font-size: 16px;
        padding: 8px 16px;
        width: 100%;
    }
}
</style>
