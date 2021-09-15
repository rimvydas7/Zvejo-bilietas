import Home from "./components/Home";
import About from "./components/About";
import Pay from "./components/Pay";

export default {
    mode: "history",

    routes: [
        {
            path: "/",
            component: Home,
        },
        {
            path: "/about/:link",
            component: About,
        },
        {
            path: "/pay/:link",
            component: Pay,
        },
    ],
};
