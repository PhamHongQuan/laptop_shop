import { getMe, logout, clearAuthStorage } from "../api/auth.api";
import { TOKEN_KEY, USER_KEY } from "../constants/auth";

export default class NavbarAuthHandler {
    constructor() {
        this.desktopGuestActions = document.getElementById("desktop-guest-actions");
        this.desktopAuthActions = document.getElementById("desktop-auth-actions");
        this.mobileGuestActions = document.getElementById("mobile-guest-actions");
        this.mobileAuthActions = document.getElementById("mobile-auth-actions");
        this.desktopAccountInitial = document.getElementById("desktop-account-initial");
        this.desktopAccountName = document.getElementById("desktop-account-name");
        this.desktopAccountEmail = document.getElementById("desktop-account-email");
        this.mobileAccountInitial = document.getElementById("mobile-account-initial");
        this.mobileAccountName = document.getElementById("mobile-account-name");
        this.mobileAccountEmail = document.getElementById("mobile-account-email");
        this.desktopLogoutButton = document.getElementById("desktop-logout-button");
        this.mobileLogoutButton = document.getElementById("mobile-logout-button");

        if (!this.desktopGuestActions || !this.desktopAuthActions || !this.mobileGuestActions || !this.mobileAuthActions) {
            return;
        }

        this.bind();
        this.initialize();
    }

    bind() {
        this.desktopLogoutButton?.addEventListener(
            "click",
            this.handleLogout.bind(this)
        );

        this.mobileLogoutButton?.addEventListener(
            "click",
            this.handleLogout.bind(this)
        );
    }

    async initialize() {
        const token = sessionStorage.getItem(TOKEN_KEY);

        if (!token) {
            clearAuthStorage();
            this.renderGuestNavbar();
            return;
        }

        try {
            const user = await getMe();

            sessionStorage.setItem(
                USER_KEY,
                JSON.stringify(user)
            );

            this.renderAuthNavbar(user);
        }
        catch {
            clearAuthStorage();
            this.renderGuestNavbar();
        }
    }

    renderGuestNavbar() {
        this.desktopGuestActions.classList.remove("hidden");
        this.desktopGuestActions.classList.add("flex");
        this.desktopAuthActions.classList.add("hidden");
        this.mobileGuestActions.classList.remove("hidden");
        this.mobileGuestActions.classList.add("flex");
        this.mobileAuthActions.classList.add("hidden");
    }

    renderAuthNavbar(user) {
        const userName = user?.name?.trim() || "Account";
        const userEmail = user?.email?.trim() || "";
        const userInitial = userName.charAt(0).toUpperCase();

        this.desktopGuestActions.classList.add("hidden");
        this.desktopGuestActions.classList.remove("flex");
        this.desktopAuthActions.classList.remove("hidden");
        this.mobileGuestActions.classList.add("hidden");
        this.mobileGuestActions.classList.remove("flex");
        this.mobileAuthActions.classList.remove("hidden");

        if (this.desktopAccountInitial) {
            this.desktopAccountInitial.textContent = userInitial;
        }

        if (this.desktopAccountName) {
            this.desktopAccountName.textContent = userName;
        }

        if (this.desktopAccountEmail) {
            this.desktopAccountEmail.textContent = userEmail;
        }

        if (this.mobileAccountInitial) {
            this.mobileAccountInitial.textContent = userInitial;
        }

        if (this.mobileAccountName) {
            this.mobileAccountName.textContent = userName;
        }

        if (this.mobileAccountEmail) {
            this.mobileAccountEmail.textContent = userEmail;
        }
    }

    async handleLogout() {
        try {
            await logout();
        }
        catch {
            clearAuthStorage();
        }
        finally {
            this.renderGuestNavbar();
            window.location.href = "/";
        }
    }
}
