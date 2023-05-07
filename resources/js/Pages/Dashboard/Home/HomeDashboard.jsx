import MainLayout from "@/Layout/MainLayout";
import {Outlet} from "react-router-dom";

export default function HomeDashboard() {
    return (
        <MainLayout>
            <Outlet/>
            <div>Home dashboard</div>
        </MainLayout>
    );
}
