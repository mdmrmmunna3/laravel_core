import { createBrowserRouter } from "react-router-dom";
import Main from "../Layout/Main";
import Home from "../pages/Home/Home";
import InsertDoctor from "../pages/InsertDoctor/InsertDoctor";


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
            }
        ]
    }
])