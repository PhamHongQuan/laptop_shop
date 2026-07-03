import axios from "axios";
import { TOKEN_KEY, USER_KEY } from "../constants/auth";

const api = axios.create({
    baseURL: "/api",
    timeout: 10000,
    withCredentials: true,
    headers: {
        Accept: "application/json",
        "X-Requested-With": "XMLHttpRequest",
    },
});

/**
 * Request Interceptor
 */
api.interceptors.request.use((config) => {

    const token = sessionStorage.getItem(TOKEN_KEY);

    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }

    return config;
});

/**
 * Response Interceptor
 */
api.interceptors.response.use(

    (response) => response,

    (error) => {

        const status = error.response?.status;
        const requestUrl = error.config?.url ?? "";
        const hasToken = Boolean(sessionStorage.getItem(TOKEN_KEY));
        const isAuthRequest =
            requestUrl.includes("/login") ||
            requestUrl.includes("/register") ||
            requestUrl.includes("/me") ||
            requestUrl.includes("/logout");

        switch (status) {

            case 401:
                if (hasToken && !isAuthRequest) {
                    sessionStorage.removeItem(TOKEN_KEY);
                    sessionStorage.removeItem(USER_KEY);
                    window.location.href = "/login";
                }
                break;

            case 403:
                console.error("Forbidden");
                break;

            case 404:
                console.error("Not Found");
                break;

            case 419:
                alert("Phiên đăng nhập đã hết hạn.");
                window.location.reload();
                break;

            case 500:
                console.error("Internal Server Error");
                break;
        }

        return Promise.reject(error);
    }

);

export default api;
