import BaseFormHandler from "../core/BaseFormHandler";
import { login } from "../api/auth.api";

new BaseFormHandler("#loginForm", login, () => {
    window.location = "/";
});
