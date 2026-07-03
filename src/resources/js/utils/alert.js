import Swal from "sweetalert2";


export function successAlert(title, text = "") {
    return Swal.fire({
        icon: "success",
        title,
        text,
        confirmButtonText: "OK",
        allowOutsideClick: false,
    });
}


export function errorAlert(title, text = "") {
    return Swal.fire({
        icon: "error",
        title,
        text,
        confirmButtonText: "OK",
    });
}

export const warningAlert = (
    title = "Warning",
    text = ""
) => {
    return Swal.fire({
        icon: "warning",
        title,
        text,
        confirmButtonText: "Agree",
    });
};

export const infoAlert = (
    title = "Info",
    text = ""
) => {
    return Swal.fire({
        icon: "info",
        title,
        text,
        confirmButtonText: "OK",
    });
};

export const confirmAlert = (
    title = "Are you sure?",
    text = ""
) => {
    return Swal.fire({
        icon: "question",
        title,
        text,
        showCancelButton: true,
        confirmButtonText: "Agree",
        cancelButtonText: "Cancel",
        reverseButtons: true,
    });
};
