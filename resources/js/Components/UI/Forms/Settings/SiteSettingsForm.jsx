import React from "react";
import {Formik} from "formik";
import * as Yup from "yup";
import {useTranslation} from "react-i18next";

export default function SiteSettingsForm({data, token, onSubmit}) {
    const {t} = useTranslation([
        "settings",
        "common"
    ]);

    const validationSchema = Yup.object().shape({
        site_name: Yup.string()
    });

    const initialValues = {
        site_name: data.site_name,
    }

    return (
        <Formik
            initialValues={initialValues}
            validationSchema={validationSchema}
            onSubmit={onSubmit}
        >
            {({
                  values,
                  errors,
                  touched,
                  handleChange,
                  handleBlur,
                  handleSubmit,
                  isSubmitting,
                  /* and other goodies */
              } = {}) => (
                <form onSubmit={handleSubmit}>
                    <div className="form-group">
                        <label htmlFor="site_name">{t("settings:site_name")}</label>
                        <input
                            type="text"
                            className="form-control"
                            id="site_name"
                            name="site_name"
                            onChange={handleChange}
                            onBlur={handleBlur}
                            value={values.site_name}
                        />
                        {errors.site_name && touched.site_name && errors.site_name}
                    </div>
                    <button type="submit" className="btn btn-primary">{t("common:save")}</button>
                </form>
            )}
        </Formik>
    );
}
