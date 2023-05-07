import MainLayout from "@/Layout/MainLayout";
import {Outlet} from "react-router-dom";
import {Nav, NavLink} from "reactstrap";
import {useTranslation} from "react-i18next";

export default function Pages(){
    const {t} = useTranslation([
        'pages'
    ]);
    return (
        <MainLayout>
            <Nav>
                <NavLink to="/pages/create">Create a Page</NavLink>
                <NavLink to="/pages/update/1">Update the Page</NavLink>
                <NavLink to="/pages/detail/1">Detail of the Page</NavLink>
            </Nav>
            <Outlet/>
            <h1>Pages</h1>
        </MainLayout>
    );
}
