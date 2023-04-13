import {configureStore} from "@reduxjs/toolkit";
import {combineReducers} from "redux";
import thunk from "redux-thunk";
import storage from "redux-persist/lib/storage";
import {persistReducer, persistStore} from "redux-persist";
import CartSlice from "./Slice/Cart/CartSlice";
import AuthSlice from "./Slice/Auth/AuthSlice";
import ToggleSidebarSlice from "./Slice/Design/Layout/ToggleSidebarSlice";
import {loadState, saveState} from "./LocalStorage/LocalStorage";
import {throttle} from "lodash";

const reducers = combineReducers({
    cart: CartSlice,
    auth: AuthSlice,
    toggleSidebar: ToggleSidebarSlice,
});

const persistConfig = {
    key: "root",
    storage,
    whitelist: ["cart", "auth", "toggleSidebar"],
}

const persistedReducer = persistReducer(persistConfig, reducers);

const Store = configureStore({
    reducer: persistedReducer,
    middleware: [thunk],
    devTools: true,
    preloadedState: loadState(),
});

Store.subscribe(
    throttle( () => saveState(Store.getState()), 1000)
);

export default Store;
