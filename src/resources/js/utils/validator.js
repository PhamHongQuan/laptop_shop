export function clearErrors(form) {

    form.querySelectorAll(".error-message")
        .forEach(el => {
            el.innerHTML = "";
        });

    form.querySelectorAll("input")
        .forEach(el => {
            el.classList.remove(
                "border-red-500"
            );
        });

}

export function showErrors(form, errors) {

    clearErrors(form);

    Object.keys(errors).forEach(field => {

        const errorElement =
            form.querySelector(
                `[data-error="${field}"]`
            );

        if (errorElement) {
            errorElement.innerHTML = errors[field][0];
        }

        const input =
            form.querySelector(
                `[name="${field}"]`
            );

        if (input) {
            input.classList.add(
                "border-red-500"
            );
        }

    });

}
