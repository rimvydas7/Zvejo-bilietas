import Home from "./components/Home";
import About from "./components/About";
import AllTickets from "./components/AllTickets";

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
            path: "/all",
            component: AllTickets,
        },
    ],
};
