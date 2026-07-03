import BaseFormHandler from "../core/BaseFormHandler";
import { register } from "../api/auth.api";

new BaseFormHandler("#registerForm", register, () => {
    window.location = "/";
});
