import DataTable from 'react-data-table-component';
import {useNavigate} from "react-router-dom";
import {useState} from "react";
import {useTranslation} from "react-i18next";
import UserDetailExpandableComponent
    from "@/Components/UI/BasicDataTable/ExpandedComponents/UserDetailExpandableComponent";
import SubHeaderComponent from "@/Components/UI/BasicDataTable/SubHeaderComponent ";
import {FiEdit3, FiInfo, FiTrash2} from "react-icons/all";

export default function UserDataTable(props) {
    const users = props.users;
    const navigate = useNavigate();

    const [filter, setFilter] = useState({
        filteredData: [],
        text: '',
        isFilter: false
    });

    const {t} = useTranslation([
        "users",
        "common"
    ]);

    const filterData = (e) => {
        const filterText = e.target.value;
        if (filterText !== '') {
            const filteredItems = users.filter(
                (item) => (
                    item.name && item.name.toLowerCase().includes(filterText.toLowerCase()) ||
                    item.surname && item.surname.toLowerCase().includes(filterText.toLowerCase())
                )
            );

            setFilter({
                filteredData: filteredItems,
                text: filterText,
                isFilter: true
            });
        } else {
            setFilter({
                filteredData: [],
                text: '',
                isFilter: false
            });
        }
    }



    return (
        <div className="table-responsive mt-3">
            <DataTable
                columns={
                    [
                        {
                            name: t("users:name"),
                            selector: row => row.name,
                            center: true,
                        },
                        {
                            name: t("users:surname"),
                            selector: row => row.surname,
                            sortable: true
                        },
                        {
                            name: t("users:city") + "/" + t("users:state"),
                            selector: row => (row.city !== "null" || row.city !== null) ? row.city + "/" + row.state : "",
                            sortable: true
                        },
                        {
                            name: t("users:phone"),
                            selector: row => row.phone,
                            sortable: true
                        },
                        {
                            name: t("users:email"),
                            selector: row => row.email,
                            sortable: true
                        },
                        {
                            name: t("users:is_active"),
                            selector: row => row.status ? <button className="btn btn-success btn-sm">{t("common:active")}</button> : <button className="btn btn-danger btn-sm">{t("common:inactive")}</button>,
                            sortable: true
                        },
                        {
                            name: t("common:edit"),
                            button: true,
                            cell: (row) => {
                                return (
                                    <button
                                        className="btn btn-warning"
                                        onClick={() => props.onEdit(row.id)}
                                    >
                                        <FiEdit3 />
                                    </button>
                                );
                            },
                            sortable: true
                        },
                        {
                            name: t("common:detail"),
                            button: true,
                            cell: (row) => {
                                return (
                                    <button
                                        className="btn btn-info"
                                        onClick={() => props.getDetail(row.id)}
                                    >
                                        <FiInfo/>
                                    </button>
                                );
                            },
                            sortable: true
                        },
                        {
                            name: t("common:delete"),
                            button: true,
                            cell: (row) => {
                                return (
                                    <button
                                        className="btn btn-danger"
                                        onClick={() => props.onDelete(row.id)}
                                    >
                                        <FiTrash2/>
                                    </button>
                                );
                            },
                            sortable: true
                        }
                    ]
                }
                subHeader={true}
                responsive={true}
                hover={true}
                fixedHeader
                pagination
                expandableRows
                expandableRowsComponent={UserDetailExpandableComponent}
                data={(filter.isFilter) ? filter.filteredData : users}
                subHeaderComponent={<SubHeaderComponent
                    filter={filterData}
                    action={{
                        uri: () => navigate("/users/create", {replace: true}),
                        title: t("common:create"),
                        class: "btn btn-success btn-sm me-2"
                    }}
                />}
            />
        </div>
    );
};
