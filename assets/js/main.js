document.addEventListener("DOMContentLoaded", () => {


    window.showToast = (message, type = "info") => {

        const zone = document.getElementById("toastZone");
        if (!zone || typeof bootstrap === "undefined") return;

        const styles = {
            success: "bg-success text-white",
            danger: "bg-danger text-white",
            warning: "bg-warning text-dark",
            info: "bg-info text-dark"
        };

        const toast = document.createElement("div");
        toast.className = `toast align-items-center ${styles[type] || styles.info}`;
        toast.setAttribute("role", "alert");

        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;

        zone.appendChild(toast);

        const bsToast = new bootstrap.Toast(toast, { delay: 3000 });
        bsToast.show();

        toast.addEventListener("hidden.bs.toast", () => toast.remove());
    };

    document.querySelectorAll(".card, .auth-card").forEach((card, i) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(30px)";
        card.style.transition = "0.6s ease";

        setTimeout(() => {
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
        }, i * 120);
    });


    const form = document.querySelector("form");

    if (form && form.querySelector("input[name='password']")) {

        form.addEventListener("submit", (e) => {

            const email = form.querySelector("input[name='email']")?.value.trim();
            const password = form.querySelector("input[name='password']")?.value;

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (email && !emailRegex.test(email)) {
                showToast("Adresse email invalide", "danger");
                e.preventDefault();
                return;
            }

            if (password && password.length < 8) {
                showToast("Mot de passe trop court (8 caractères minimum)", "warning");
                e.preventDefault();
            }
        });
    }

});
