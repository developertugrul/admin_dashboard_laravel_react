import React from 'react';
import {BrowserRouter as Router, Routes, Route, Navigate, useNavigate} from 'react-router-dom';

import Index from './Pages/Home/Index';
import Login from './Pages/Auth/Login';
import Register from './Pages/Auth/Register';
import {useSelector} from "react-redux";
import HomeDashboard from "./Pages/Dashboard/Home/HomeDashboard";
import Profile from "@/Pages/Dashboard/Profile/Index";
import Settings from "@/Pages/Dashboard/Settings/Index";
import Pages from "@/Pages/Dashboard/Pages/Index";
import Users from "@/Pages/Dashboard/Users/Index";
import Blogs from "@/Pages/Dashboard/Blogs/Index";
import CreateUsers from "@/Pages/Dashboard/Users/CreateUsers";
import UserDetails from "@/Pages/Dashboard/Users/UserDetails";
import UpdateUsers from "@/Pages/Dashboard/Users/UpdateUsers";
import Signature from "@/Pages/Dashboard/Settings/Signature";
import CreateABlogPage from "@/Pages/Dashboard/Blogs/CreateABlogPage";
import CreateAPage from "@/Pages/Dashboard/Pages/CreateAPage";
import UpdateAPage from "@/Pages/Dashboard/Pages/UpdateAPage";
import PageDetails from "@/Pages/Dashboard/Pages/PageDetails";

export default function MyRoutes() {
    const isAuth = useSelector(state => state.auth.isAuthenticated);
    const userType = useSelector(state => state.auth.userType);

    return (
        <Router>
            <Routes>
                {
                    !isAuth && <>
                        <Route path="login" element={<Login/>}/>
                        <Route path="register" element={<Register/>}/>
                        <Route path="*" element={<Navigate replace to="/login"/>}/>
                    </>
                }
                {
                    isAuth && <>
                        <Route path="/" element={<Index/>}/>
                        <Route path="dashboard" element={<HomeDashboard/>}/>
                        <Route path="profile" element={<Profile/>}/>
                        <Route path="settings" element={<Settings/>}>
                            <Route path="signature" element={<Signature/>}/>
                        </Route>
                        <Route path="pages" element={<Pages/>}>
                            <Route path="create" element={<CreateAPage/>}/>
                            <Route path="update/:id" element={<UpdateAPage/>}/>
                            <Route path="detail/:id" element={<PageDetails/>}/>
                        </Route>
                        <Route path="users" element={<Users/>}>
                            <Route path="create" element={<CreateUsers/>}/>
                            <Route path="update/:id" element={<UpdateUsers/>}/>
                            <Route path=":id" element={<UserDetails/>}/>
                        </Route>
                        <Route path="blogs" element={<Blogs/>}>
                            <Route path="create" element={<CreateABlogPage/>}/>
                            <Route path="update/:id" element={<UpdateAPage/>}/>
                            <Route path="detail/:id" element={<PageDetails/>}/>
                        </Route>
                        {userType < 2 && <>
                            <Route path="admin" element={<h1>Admin Dashboard</h1>}/>
                        </>}
                        {userType < 1 && <>
                            <Route path="manager" element={<h1>Manager Dashboard</h1>}/>
                        </>
                        }
                        <Route path="*" element={<Navigate replace to="/dashboard"/>}/>
                    </>
                }
            </Routes>
        </Router>
    );
}
