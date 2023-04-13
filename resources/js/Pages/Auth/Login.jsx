import {Link} from "react-router-dom";
import ReactCountryFlag from "react-country-flag"
import styles from '../../Styles/Pages/Auth/Login.module.scss';
import {useTranslation} from "react-i18next";
import i18n from "i18next";

export default function Login() {
    const {t} = useTranslation([
        'auth',
    ]);
    return (
        <div className={styles.main}>
            <div className={styles.main__card}>
                <div className={styles.main__card__languages}>
                    <button type="button" className="main__card__languages__btn" onClick={() => i18n.changeLanguage('tr')} value="de">
                        <ReactCountryFlag
                            style={{
                                fontSize: '2em',
                                lineHeight: '2em',
                            }}
                            aria-label="Türkiye"
                            countryCode="TR" svg/>
                    </button>
                    <button type="button" className="main__card__languages__btn" onClick={() => i18n.changeLanguage('en')} value="en">
                        <ReactCountryFlag
                            style={{
                                fontSize: '2em',
                                lineHeight: '2em',
                            }}
                            aria-label="United Kingdom"
                            countryCode="GB" svg/>
                    </button>
                    <button type="button" className="main__card__languages__btn" onClick={() => i18n.changeLanguage('de')} value="en">
                        <ReactCountryFlag
                            style={{
                                fontSize: '2em',
                                lineHeight: '2em',
                            }}
                            aria-label="Deutschland"
                            countryCode="DE" svg/>
                    </button>
                    <button type="button" className="main__card__languages__btn" onClick={() => i18n.changeLanguage('es')} value="en">
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
                <form className={styles.main__card__form}>
                    <input className={styles.main__card__form__input} id="username" type="text" name="username" placeholder={t("auth:username")} />
                    <input className={styles.main__card__form__input} id="password" type="password" name="password" placeholder={t("auth:password")} />
                    <button className={styles.main__card__form__button} type="submit">{t("auth:login")}</button>
                    <div className={styles.main__card__form__line}></div>
                    <p className={styles.main__card__form__p}>
                        {t("auth:dont_have_an_account")} <Link className={styles.main__card__form__p__link} to="/register">{t("auth:sign_up")}</Link>
                    </p>
                </form>
            </div>
        </div>
    );
}
