import styles from "../Styles/Layout/header.module.scss";
import {Link} from "react-router-dom";
import {useTranslation} from "react-i18next";
import {LOGO_URL} from "@/Const/GlobalConst";
import {Container} from "reactstrap";
export default function Header({children}) {
    const {t} = useTranslation([
        "routes"
    ]);
    return (
        <Container fluid={true} className={styles.header}>
            <div className={styles.header__logo}>
                <img src={LOGO_URL} alt="Logo" className="me-2"/>
            </div>
            <div className={styles.header__menu}>
                <ul className={styles.header__menu__ul}>
                    <li className={styles.header__menu__ul__li}>
                        <Link to="/" className={styles.header__menu__ul__li__a}>{t("routes:homepage")}</Link>
                    </li>
                    <li className={styles.header__menu__ul__li}>
                        <Link to="/profile" className={styles.header__menu__ul__li__a}>{t("routes:profile")}</Link>
                    </li>
                    <li className={styles.header__menu__ul__li}>
                        <Link to="/settings" className={styles.header__menu__ul__li__a}>{t("routes:settings")}</Link>
                    </li>
                </ul>
            </div>
        </Container>
    );
}
