<style>
    /* 
        Enhanced frosted glass popup with modern design
        -----------------------------------------------
        Styles for the top popup message box.
        Includes animations, responsive design, and custom scrollbar.
    */
    #top-popup {
        position: fixed;
        top: -400px; /* hidden initially */
        left: 50%;
        transform: translateX(-50%);
        width: 90%;
        max-width: 380px;
        min-height: 380px;
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(20px) saturate(200%);
        -webkit-backdrop-filter: blur(20px) saturate(200%);
        border: 1px solid rgba(255, 126, 185, 0.4);
        border-radius: 20px;
        box-shadow:
            0 10px 40px 0 rgba(255, 126, 185, 0.3),
            inset 0 0 15px rgba(255, 255, 255, 0.1);
        color: #fff;
        padding: 1.5rem 2rem;
        font-weight: 600;
        font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
        font-size: 1rem;
        line-height: 1.6;
        transition: 
            top 0.7s cubic-bezier(0.34, 1.56, 0.64, 1),
            opacity 0.4s ease,
            transform 0.5s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
        z-index: 9999;
        opacity: 0;
        transform: translateX(-50%) scale(0.95);
    }

    /* Show popup with animation */
    #top-popup.show {
        top: 30px;
        opacity: 1;
        transform: translateX(-50%) scale(1);
        animation: 
            pulseGlow 4s ease-in-out infinite alternate,
            floatEffect 6s ease-in-out infinite;
    }

    /* Pulse glow animation for border and shadow */
    @keyframes pulseGlow {
        0% {
            box-shadow:
                0 0 20px 5px rgba(255, 126, 185, 0.4),
                0 0 40px 10px rgba(255, 126, 185, 0.2),
                inset 0 0 15px rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 126, 185, 0.5);
        }
        50% {
            box-shadow:
                0 0 25px 7px rgba(255, 126, 185, 0.6),
                0 0 50px 15px rgba(255, 126, 185, 0.3),
                inset 0 0 20px rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 126, 185, 0.7);
        }
        100% {
            box-shadow:
                0 0 30px 10px rgba(255, 126, 185, 0.8),
                0 0 60px 20px rgba(255, 126, 185, 0.4),
                inset 0 0 25px rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 126, 185, 0.9);
        }
    }

    /* Floating effect animation */
    @keyframes floatEffect {
        0%, 100% {
            transform: translateX(-50%) translateY(0) scale(1);
        }
        50% {
            transform: translateX(-50%) translateY(-8px) scale(1.01);
        }
    }

    /* Close button styling */
    #top-popup button.close-btn {
        position: absolute;
        top: 12px;
        right: 12px;
        background: rgba(255, 126, 185, 0.2);
        border: 1px solid rgba(255, 126, 185, 0.7);
        border-radius: 50%;
        width: 28px;
        height: 28px;
        color: #ff7eb9;
        font-size: 1.2rem;
        font-weight: 300;
        cursor: pointer;
        line-height: 1;
        transition: 
            all 0.3s ease,
            transform 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
    }

    /* Close button hover effect */
    #top-popup button.close-btn:hover {
        background-color: rgba(255, 126, 185, 0.8);
        color: white;
        transform: rotate(90deg) scale(1.1);
    }

    /* Header styling with gradient text */
    #top-popup strong {
        display: block;
        font-size: 1.4rem;
        margin-bottom: 1.2rem;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        background: linear-gradient(45deg, #ff7eb9, #ff758c);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        text-shadow: 0 2px 10px rgba(255, 126, 185, 0.3);
        padding-bottom: 0.5rem;
        border-bottom: 1px solid rgba(255, 126, 185, 0.3);
    }

    /* Popup content area styling */
    #top-popup .popup-content {
        flex-grow: 1;
        padding: 0.5rem 0;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: rgba(255, 126, 185, 0.5) transparent;
    }

    /* Custom scrollbar for Webkit browsers */
    #top-popup .popup-content::-webkit-scrollbar {
        width: 4px;
    }
    #top-popup .popup-content::-webkit-scrollbar-thumb {
        background-color: rgba(255, 126, 185, 0.5);
        border-radius: 2px;
    }

    /* Paragraph styling with bullet */
    #top-popup p {
        margin: 0.8rem 0;
        position: relative;
        padding-left: 1.2rem;
    }
    #top-popup p:before {
        content: "•";
        position: absolute;
        left: 0;
        color: #ff7eb9;
        font-size: 1.2rem;
        line-height: 1;
    }

    /* Decorative gradient lines at top and bottom */
    #top-popup:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #ff7eb9, #ff758c, #ff7eb9);
        opacity: 0.7;
    }
    #top-popup:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #ff7eb9, #ff758c, #ff7eb9);
        opacity: 0.7;
    }

    /* Responsive adjustments for mobile */
    @media (max-width: 480px) {
        #top-popup {
            width: 95%;
            padding: 1.2rem 1.5rem;
            max-width: none;
        }
        #top-popup.show {
            top: 15px;
        }
    }
</style>

<!-- 
    Popup HTML structure
    --------------------
    Contains close button, header, and content paragraphs.
-->
<div id="top-popup" role="alert" aria-live="assertive" aria-atomic="true">
    <button class="close-btn" aria-label="Close popup" title="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>IMPORTANT UPDATES</strong>
    <div class="popup-content">
        <p>Dear Valued Users,</p>
        <p>www.Boostrika.com is now a standalone platform with no browser extension required</p>
        <p>We now accept multiple payment methods: Mobile Money, PayPal, FlutterWave, Credit/Debit Cards, Bitcoin, USDT, and Payeer</p>
        <p>24/7 Service Availability (GMT Timezone)</p>
        <p>Operational 7 Days a Week</p>
        <p>Live Chat Support Response Time: 1-3 hours</p>
        <p>Thank you for choosing Boostrika - Your Worldwide Smart Panel Solution</p>
    </div>
</div>

<script>
    /*
        Enhanced JavaScript for popup
        ----------------------------
        - Shows popup after delay if not previously closed
        - Allows closing via button or clicking outside
        - Auto-hides after 15 seconds
        - Remembers close state using localStorage
    */
    document.addEventListener('DOMContentLoaded', () => {
        const popup = document.getElementById('top-popup');
        const closeBtn = document.querySelector('#top-popup .close-btn');
        
        // Show popup if not closed before
        if (!localStorage.getItem('popupClosed')) {
            setTimeout(() => {
                popup.classList.add('show');
            }, 1000); // Slight delay for better UX
        }
        
        // Close button functionality
        closeBtn.addEventListener('click', () => {
            popup.classList.remove('show');
            localStorage.setItem('popupClosed', 'true');
        });
        
        // Auto-hide after 15 seconds
        setTimeout(() => {
            if (popup.classList.contains('show')) {
                popup.classList.remove('show');
            }
        }, 15000);
        
        // Close when clicking outside the popup
        document.addEventListener('click', (e) => {
            if (!popup.contains(e.target) && popup.classList.contains('show')) {
                popup.classList.remove('show');
                localStorage.setItem('popupClosed', 'true');
            }
        });
    });
</script>