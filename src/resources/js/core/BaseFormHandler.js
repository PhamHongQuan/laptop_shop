import { clearErrors, showErrors } from "../utils/validator";
import { startLoading, stopLoading } from "../utils/loading";
import { successAlert, errorAlert } from "../utils/alert";

export default class BaseFormHandler {

    constructor(formSelector, submitCallback, successCallback = null) {

        this.form = document.querySelector(formSelector);

        if (!this.form) return;

        this.submitCallback = submitCallback;
        this.successCallback = successCallback;

        this.button = this.form.querySelector(
            "button[type='submit']"
        );

        this.bind();
    }

    bind() {
        this.form.addEventListener(
            "submit",
            this.handleSubmit.bind(this)
        );

    }

    async handleSubmit(e) {

        e.preventDefault();

        clearErrors(this.form);

        startLoading(this.button);

        try {

            const formData = new FormData(this.form);

            const response = await this.submitCallback(formData);

            await successAlert(response.message ?? "Success", "",);

            if (this.successCallback) {
                this.successCallback(response);
            }

        }
        catch (error) {
            if (error.response?.status === 422) {
                showErrors(
                    this.form,
                    error.response.data.errors
                );
            }
            else {
                await errorAlert(error.response?.data?.message ?? "Error", "",);
            }

        }
        finally {
            stopLoading(this.button);
        }

    }

}
