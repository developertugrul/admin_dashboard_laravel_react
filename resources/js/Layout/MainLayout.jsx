import Sidebar from "@/Layout/Sidebar";
import Header from "@/Layout/Header";
import {Col, Row} from "reactstrap";

export default function MainLayout(props) {
    return (
        <div className="container-fluid">
            <Header/>
            <Row>
                <Col md={2}>
                    <Sidebar/>
                </Col>
                <Col md={10} className="pt-3">
                    {props.children}
                </Col>
            </Row>
        </div>
    );
}
