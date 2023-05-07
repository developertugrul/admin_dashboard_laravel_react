import '../css/app.css'
import 'bootstrap/dist/css/bootstrap.min.css';

import React, {Component, Suspense} from "react";
import {createRoot} from 'react-dom/client';
import MyRoutes from './Routes';
import "./i18n";
import {Provider} from "react-redux";
import Store from "./Store/Store";

const Loading = () => (
    <div className="text-center">
        <div className="spinner-border text-primary" role="status">
            <span className="sr-only">Loading...</span>
        </div>
    </div>
);


class Main extends Component {
    render() {
        return (
            <Suspense fallback={Loading()}>
                <Provider store={Store}>
                    <MyRoutes/>
                </Provider>
            </Suspense>
        );
    }
}

const container = document.getElementById('app');
const root = createRoot(container); // createRoot(container!) if you use TypeScript
root.render(<Main tab="home"/>);
