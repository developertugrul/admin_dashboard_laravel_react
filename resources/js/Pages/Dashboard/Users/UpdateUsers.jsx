import {Navigate, Outlet, useParams} from "react-router-dom";

export default function UpdateUsers(props){
    const {id} = useParams();
    if (id === undefined) return (<Navigate to={'/users'}/>);
    return (
        <div>
            <Outlet/>
            Update users {id}
        </div>
    );
}
