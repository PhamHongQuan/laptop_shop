import api from "./axios";
import { TOKEN_KEY, USER_KEY } from "../constants/auth";

export const clearAuthStorage = () => {
    sessionStorage.removeItem(TOKEN_KEY);
    sessionStorage.removeItem(USER_KEY);
};

// Register a new user
export const register = async (formData) => {
    const response = await api.post("/register", formData);

    const { token, user } = response.data.data;

    sessionStorage.setItem(TOKEN_KEY, token);
    sessionStorage.setItem(USER_KEY, JSON.stringify(user));

    return response.data;
};

export const getMe = async () => {
    const response = await api.get("/me");

    return response.data.data;
};

export const logout = async () => {
    try {
        const response = await api.post("/logout");
        clearAuthStorage();
        return response.data;
    }
    catch (error) {
        clearAuthStorage();
        throw error;
    }
};

// Login a user and store the token and user data in sessionStorage
export const login = async (formData) => {
    const response = await api.post("/login", formData);

    const { token, user } = response.data.data;

    sessionStorage.setItem(TOKEN_KEY, token);
    sessionStorage.setItem(USER_KEY, JSON.stringify(user));

    return response.data;
};
