import {createSlice} from "@reduxjs/toolkit";

export const UserSlice = createSlice({
    name: "users",
    initialState: {
        list: [],
    },
    reducers: {
        setUsers: (state, action) => {
            const {list} = action.payload;
            state.list = list;
        },
        addUser: (state, action) => {
            state.users.list.push(action.payload);
        },
        updateUser: (state, action) => {
            const {id, name, email, password, role} = action.payload;
            const user = state.users.list.find(user => user.id === id);
            user.name = name;
            user.email = email;
            user.password = password;
            user.role = role;
        },
        deleteUser: (state, action) => {
            const {id} = action.payload;
            state.users.list = state.users.list.filter(user => user.id !== id);
        }
    }
});

export const {setUsers, addUser, updateUser, deleteUser} = UserSlice.actions;

export const UserActions = UserSlice.actions;
export default UserSlice.reducer;
