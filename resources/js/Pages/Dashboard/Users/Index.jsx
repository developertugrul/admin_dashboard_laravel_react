import MainLayout from "@/Layout/MainLayout";
import {Outlet, useNavigate} from "react-router-dom";
import H1 from "@/Components/UI/Heads/H1";
import {useTranslation} from "react-i18next";
import UserDataTable from "@/Components/UI/BasicDataTable/UserDataTable";
import {useDispatch, useSelector} from "react-redux";
import {useEffect, useState} from "react";
import {API_URL} from "@/Const/GlobalConst";
import Swal from "sweetalert2";
import axios from "axios";

export default function Users() {
    const {t} = useTranslation([
        "users",
    ]);
    const {token} = useSelector(state => state.auth);
    const [users, setUsers] = useState([]);
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const detailHandler = (id) => {
        navigate('/users/' + id, {replace: true});
    }
    const editHandler = (id) => {
        navigate('/users/update/' + id, {replace: true});
    }
    const deleteHandler = (id) => {

    }
    const fetchUsers = async () => {
        await axios.post(API_URL + '/users/list', {}, {
            headers: {
                "Authorization": "Bearer " + token,
                "Accept": "application/json"
            }
        }).then((response) => {
            setUsers(response.data.data);
        }).catch((error) => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: error.response.data.message
            })
        });
    }

    useEffect(() => {
        fetchUsers();
        console.log(users);
    }, []);


    return (
        <MainLayout>
            <Outlet/>
            <H1>{t("users:user_list")}</H1>
            <UserDataTable users={users} onDelete={deleteHandler}
                           getDetail={detailHandler} onEdit={editHandler}/>
        </MainLayout>
    );
}
