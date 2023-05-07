import {useTranslation} from "react-i18next";
import H1 from "@/Components/UI/Heads/H1";
import {Col, Row, Table} from "reactstrap";

export default function UserDetailExpandableComponent({data}) {
    console.log(data);
    const {t} = useTranslation([
        "users",
        "common"
    ]);
    return (
        <div>
            <H1>{t("users:user_details")}</H1>
            <Row>
                <Col md={6}>
                    <Table>
                        <tbody>
                        <tr>
                            <th>{t("users:name")}</th>
                            <td>{data.name}</td>
                            <th>{t("users:surname")}</th>
                            <td>{data.surname}</td>
                        </tr>
                        <tr>
                            <th>{t("users:email")}</th>
                            <td>{data.email}</td>
                            <th>{t("users:phone")}</th>
                            <td>{data.phone}</td>
                        </tr>
                        <tr>
                            <th>{t("users:city")}</th>
                            <td>{data.city}</td>
                            <th>{t("users:state")}</th>
                            <td>{data.state}</td>
                        </tr>
                        <tr>
                            <th>{t("users:address")}</th>
                            <td colSpan={3}>{data.address_line1}</td>
                        </tr>
                        {data.address_line2 !== "" ?
                            <tr>
                                <td colSpan={4}>{data.address_line2}</td>
                            </tr> : ""
                        }
                        {data.address_line3 !== "" ?
                            <tr>
                                <td colSpan={4}>{data.address_line3}</td>
                            </tr> : ""
                        }
                        <tr>
                            <th>{t("users:zip_code")}</th>
                            <td>{data.postal_code}</td>
                            <th>{t("users:country")}</th>
                            <td>{data.country}</td>
                        </tr>
                        <tr>
                            <th>{t("users:invoice_prefix")}</th>
                            <td>{data.invoice_prefix}</td>
                            <th>{t("users:status")}</th>
                            <td>{data.status === 0 ?
                                <span className="btn btn-danger btn-sm">{t("common:inactive")}</span> :
                                <span className="btn btn-success btn-sm">{t("common:active")}</span>}</td>
                        </tr>
                        </tbody>
                    </Table>
                </Col>
                <Col md={6}>

                </Col>
            </Row>
        </div>
    );
}
