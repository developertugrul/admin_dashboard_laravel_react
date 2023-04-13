import React from 'react';
import {BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom';

import Index from './Pages/Home/Index';
import Login from './Pages/Auth/Login';
import Register from './Pages/Auth/Register';
import {useSelector} from "react-redux";
import HomeDashboard from "./Pages/Dashboard/Home/HomeDashboard";

export default function MyRoutes() {
    const isAuth = useSelector(state => state.auth.isAuthenticated);
    const userType = useSelector(state => state.auth.userType);
    return (
        <Router>
            <Routes>
                <Route path="/" element={<Index />}/>
                <Route path="login" element={<Login />}/>
                <Route path="register" element={<Register />}/>
                {isAuth && <>
                    <Route path="dashboard" element={<HomeDashboard />}/>
                    {userType < 2 && <>
                        <Route path="admin" element={<h1>Admin Dashboard</h1>}/>
                    </>}
                    {userType < 1 && <>
                        <Route path="manager" element={<h1>Manager Dashboard</h1>}/>
                    </>}
                </>}
                <Route path="*" element={<Navigate replace to="/" />}/>
            </Routes>
        </Router>
    );
}
