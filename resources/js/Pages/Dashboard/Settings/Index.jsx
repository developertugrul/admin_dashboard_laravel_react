import MainLayout from "@/Layout/MainLayout";
import {Link, Outlet} from "react-router-dom";

export default function Settings() {
    return (
        <MainLayout>
            <div>
                <Link to={"/settings"}>Settings</Link>
                <Link to={"/settings/signature"}>Signature</Link>
            </div>
            <Outlet/>
        </MainLayout>
    );
}
