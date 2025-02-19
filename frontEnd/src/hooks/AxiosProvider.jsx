import axios from 'axios';
import React, { createContext, useContext } from 'react';
const axiosInstant = axios.create({
    baseURL: 'http://127.0.0.1:8000/api/',
    headers: {
        'Content-Type': 'application/json'
    },
});

const AxiosContext = createContext();
export const useAxios = () => {
    return useContext(AxiosContext);
};

const AxiosProvider = ({ children }) => {

    return (
        <AxiosContext.Provider value={axiosInstant}>
            {children}
        </AxiosContext.Provider>
    );
};

export default AxiosProvider;