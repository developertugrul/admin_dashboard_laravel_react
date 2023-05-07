import {Link, useNavigate} from "react-router-dom";
import ReactCountryFlag from "react-country-flag"
import styles from '../../Styles/Pages/Auth/Login.module.scss';
import {useTranslation} from "react-i18next";
import i18n from "i18next";
import {useDispatch} from "react-redux";
import {Formik} from "formik";
import * as Yup from "yup";
import {AuthActions} from "../../Store/Slice/Auth/AuthSlice";
import {API_URL} from "@/Const/GlobalConst";
import Swal from "sweetalert2";
import axios from "axios";

export default function Login() {
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const {t} = useTranslation([
        'auth',
    ]);

    const handleSubmit = (values, {setSubmitting}) => {
        setSubmitting(true);
        const {username, password} = values;
        axios.post(API_URL + "/auth/login", {
            username: username,
            password: password
        }, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
            .then((response) => {
                dispatch(AuthActions.setCredentials({
                    user: response.data.user,
                    token: response.data.access_token,
                    userType: response.data.user_type,
                    expiresAt: response.data.expires_at
                }));
                navigate("/");
            }).catch((error) => {
            Swal.fire({
                icon: 'error',
                title: t("auth:login_error"),
                text: t("auth:login_error_text"),
                confirmButtonText: t("auth:ok"),
            });
        });
        setSubmitting(false);
    }
    return (
        <div className={styles.main}>
            <div className={styles.main__card}>
                <div className={styles.main__card__languages}>
                    <button type="button" className="main__card__languages__btn"
                            onClick={() => i18n.changeLanguage('tr')} value="de">
                        <ReactCountryFlag
                            style={{
                                fontSize: '2em',
                                lineHeight: '2em',
                            }}
                            aria-label="Türkiye"
                            countryCode="TR" svg/>
                    </button>
                    <button type="button" className="main__card__languages__btn"
                            onClick={() => i18n.changeLanguage('en')} value="en">
                        <ReactCountryFlag
                            style={{
                                fontSize: '2em',
                                lineHeight: '2em',
                            }}
                            aria-label="United Kingdom"
                            countryCode="GB" svg/>
                    </button>
                    <button type="button" className="main__card__languages__btn"
                            onClick={() => i18n.changeLanguage('de')} value="en">
                        <ReactCountryFlag
                            style={{
                                fontSize: '2em',
                                lineHeight: '2em',
                            }}
                            aria-label="Deutschland"
                            countryCode="DE" svg/>
                    </button>
                    <button type="button" className="main__card__languages__btn"
                            onClick={() => i18n.changeLanguage('es')} value="en">
                        <ReactCountryFlag
                            style={{
                                fontSize: '2em',
                                lineHeight: '2em',
                            }}
                            aria-label="Spain"
                            countryCode="ES" svg/>
                    </button>
                </div>
                <h1 className={styles.main__card__title}>{t("auth:login")}</h1>
                <Formik
                    initialValues={{
                        "username": "",
                        "password": "",
                    }}
                    onSubmit={handleSubmit}
                    enableReinitialize={true}
                    validationSchema={
                        Yup.object().shape({
                            username: Yup.string()
                                .required(t("auth:username_required")),
                            password: Yup.string()
                                .required(t("auth:password_required")),
                        })
                    }
                >{({
                       values,
                       handleChange,
                       handleSubmit,
                       handleBlur,
                       errors,
                       setFieldValue,
                       touched
                   }) => (
                    <form className={styles.main__card__form}>
                        {errors.username && touched.username && (
                            <div className={styles.main__card__form__error}>{errors.username}</div>
                        )}
                        <input className={styles.main__card__form__input} id="username" type="text" name="username"
                               placeholder={t("auth:username")} onChange={handleChange} onBlur={handleBlur}/>
                        {errors.password && touched.password && (
                            <div className={styles.main__card__form__error}>{errors.password}</div>
                        )}
                        <input className={styles.main__card__form__input} id="password" type="password" name="password"
                               placeholder={t("auth:password")} onChange={handleChange} onBlur={handleBlur}/>
                        <button className={styles.main__card__form__button} onClick={handleSubmit}
                                type="button">{t("auth:login")}</button>
                        <div className={styles.main__card__form__line}></div>
                        <p className={styles.main__card__form__p}>
                            {t("auth:dont_have_an_account")} <Link className={styles.main__card__form__p__link}
                                                                   to="/register">{t("auth:sign_up")}</Link>
                        </p>
                    </form>
                )}
                </Formik>
            </div>
        </div>
    );
}
