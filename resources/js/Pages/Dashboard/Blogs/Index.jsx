import MainLayout from "@/Layout/MainLayout";
import {Outlet} from "react-router-dom";

export default function Blogs(){
    return (
        <MainLayout>
            <Outlet/>
            <h1>Blogs</h1>
        </MainLayout>
    );
}
