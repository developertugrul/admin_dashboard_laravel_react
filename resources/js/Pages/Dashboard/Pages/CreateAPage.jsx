import {Outlet} from "react-router-dom";
import MainLayout from "@/Layout/MainLayout";

const CreateAPage = () => {
    return (

        <MainLayout>
            <Outlet/>
            <div>
                <h1>Create a Page</h1>
            </div>
        </MainLayout>
    )
}

export default CreateAPage
