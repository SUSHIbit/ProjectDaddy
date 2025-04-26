// resources/js/app.js
import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;

// Initialize Alpine immediately to ensure it's available
Alpine.start();

// Define Alpine data and functions for scroll-based navigation
document.addEventListener("alpine:init", () => {
    Alpine.data("navigation", () => ({
        activeSection: "home",

        init() {
            this.checkSectionInView();
            window.addEventListener("scroll", () => this.checkSectionInView());

            // Also listen for custom events that might come from other scripts
            window.addEventListener("section-in-view", (e) => {
                this.activeSection = e.detail.id;
            });
        },

        checkSectionInView() {
            const sections = [
                "home",
                "about-me",
                "about-company",
                "company-detail",
                "portfolio",
                "contact",
            ];

            for (const sectionId of sections) {
                const element = document.getElementById(sectionId);
                if (!element) continue;

                const rect = element.getBoundingClientRect();
                // Consider a section in view when its top is near the top of the viewport
                if (rect.top <= 100 && rect.bottom >= 100) {
                    this.activeSection = sectionId;
                    break;
                }
            }
        },

        scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            if (element) {
                element.scrollIntoView({ behavior: "smooth" });
            }
        },
    }));
});

// Add smooth scrolling to all links with hash
document.addEventListener("DOMContentLoaded", function () {
    // Handle smooth scrolling for hash links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();

            const targetId = this.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: "smooth",
                });

                // Update URL without page jump
                history.pushState(null, null, `#${targetId}`);
            }
        });
    });

    // Handle PDF object fallbacks
    document
        .querySelectorAll('object[type="application/pdf"]')
        .forEach((pdf) => {
            pdf.addEventListener("error", function () {
                const fallbackDiv = document.createElement("div");
                fallbackDiv.className =
                    "h-full w-full flex items-center justify-center bg-gray-200";
                fallbackDiv.innerHTML = `
                <p class="text-gray-600">
                    PDF preview not available. 
                    <a href="${pdf.getAttribute(
                        "data"
                    )}" class="text-blue-600 underline" target="_blank">
                        Download PDF
                    </a> 
                    to view.
                </p>
            `;

                this.parentNode.replaceChild(fallbackDiv, this);
            });
        });
});

// Make sure Alpine.js is properly initialized for the admin panel
document.addEventListener("DOMContentLoaded", function () {
    // Check if Alpine.js was initialized
    if (typeof Alpine === "undefined" || !Alpine.version) {
        console.warn(
            "Alpine.js not initialized properly. Trying to initialize again..."
        );

        // Try to load Alpine.js from CDN if it failed
        const alpineScript = document.createElement("script");
        alpineScript.src =
            "https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js";
        alpineScript.defer = true;
        document.head.appendChild(alpineScript);

        // Initialize it after loading
        alpineScript.onload = function () {
            window.Alpine = Alpine;
            Alpine.start();
        };
    }
});
