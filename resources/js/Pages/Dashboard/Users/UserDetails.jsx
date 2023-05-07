import {Outlet, useParams} from "react-router-dom";

export default function UserDetails(props){
    const {id} = useParams();
    return (
        <div>
            <Outlet/>
            User details {id}
        </div>
    );
}
