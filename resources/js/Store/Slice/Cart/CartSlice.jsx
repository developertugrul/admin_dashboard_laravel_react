import {createSlice} from "@reduxjs/toolkit";

export const CartSlice = createSlice({
    name: "cart",
    initialState: [],
    reducers: {
        addToCart: (state, action) => {
            state.push(action.payload);
        },
        removeFromCart: (state, action) => {
            state = state.filter((item) => item.id !== action.payload.id);
        }
    }
});

export const {addToCart, removeFromCart} = CartSlice.actions;

export default CartSlice.reducer;
