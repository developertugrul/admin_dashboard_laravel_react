import {Link, useNavigate} from "react-router-dom";
import styles from "../Styles/Layout/sidebar.module.scss";
import {useSelector} from "react-redux";
import {TfiFile, TfiFiles, TfiHome, TfiUser} from "react-icons/tfi";
import {useTranslation} from "react-i18next";

export default function Sidebar() {
    const isAuth = useSelector(state => state.auth.isAuthenticated);
    const userType = useSelector(state => state.auth.userType);
    const navigate = useNavigate();
    const {t} = useTranslation([
        'routes',
    ]);

    return (
        <div className={styles.sidebar}>
            <div className={styles.sidebar__menu}>
                <ul>
                    <li>
                        <Link to={"/dashboard"}><TfiHome /> {t("routes:dashboard")}</Link>
                    </li>
                    <li>
                        <Link to={"/pages"}><TfiFile /> {t("routes:pages")}</Link>
                    </li>
                    <li>
                        <Link to={"/blogs"}><TfiFiles /> {t("routes:blog")}</Link>
                    </li>
                    <li>
                        <Link to={"/users"}><TfiUser /> {t("routes:users")}</Link>
                    </li>
                </ul>
            </div>
        </div>
    );
}
