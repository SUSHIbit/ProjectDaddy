// resources/js/app.js
import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;

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

Alpine.start();

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
