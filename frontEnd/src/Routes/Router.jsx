import { createBrowserRouter } from "react-router-dom";
import Main from "../Layout/Main";
import Home from "../pages/Home/Home";
import InsertDoctor from "../pages/Doctor/InsertDoctor";
import ViewDoctor from "../pages/Doctor/ViewDoctor";
import EditDoctor from "../pages/Doctor/EditDoctor";


export const router = createBrowserRouter([
    {
        path: "/",
        element: <Main></Main>,
        children: [
            {
                path: "/",
                element: <Home></Home>
            },
            {
                path: "insert",
                element: <InsertDoctor></InsertDoctor>
            },
            {
                path: "viewDoctor/:id",
                element: <ViewDoctor></ViewDoctor>
            },
            {
                path: "editDoctor/:id",
                element: <EditDoctor></EditDoctor>
            }
        ]
    }
])