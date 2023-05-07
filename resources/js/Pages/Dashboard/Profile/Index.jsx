import MainLayout from "@/Layout/MainLayout";
import {Outlet} from "react-router-dom";

export default function Profile(){
    return (
        <MainLayout>
            <Outlet/>
            <div>
                Profile Page
            </div>
        </MainLayout>
    );
}
