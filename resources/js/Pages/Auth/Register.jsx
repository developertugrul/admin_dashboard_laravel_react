import {Link} from "react-router-dom";
import ReactCountryFlag from "react-country-flag"
import styles from '../../Styles/Pages/Auth/Login.module.scss';
import {useTranslation} from "react-i18next";
import i18n from "i18next";

export default function Register() {
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
                <h1 className={styles.main__card__title}>{t("auth:sign_up")}</h1>
                <form className={styles.main__card__form}>
                    <input className={styles.main__card__form__input} id="name_surname" type="text" name="name_surname" placeholder={t("auth:name_surname")} />
                    <input className={styles.main__card__form__input} id="username" type="text" name="username" placeholder={t("auth:username")} />
                    <input className={styles.main__card__form__input} id="email" type="email" name="email" placeholder={t("auth:email")} />
                    <input className={styles.main__card__form__input} id="password" type="password" name="password" placeholder={t("auth:password")} />
                    <input className={styles.main__card__form__input} id="password_confirmation" type="password" name="password_confirmation" placeholder={t("auth:password_confirm")} />
                    <button className={styles.main__card__form__button} type="submit">{t("auth:login")}</button>
                    <div className={styles.main__card__form__line}></div>
                    <p className={styles.main__card__form__p}>
                        {t("auth:already_have_an_account")} <Link className={styles.main__card__form__p__link} to="/login">{t("auth:login")}</Link>
                    </p>
                </form>
            </div>
        </div>
    );
}
