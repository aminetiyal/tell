import store from "./../../store";

export default function authMiddleware({next, router}) {
    if (!store.getters.isAuth)
        next({name: 'login'});
    else
        next();
}
