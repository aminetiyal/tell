import store from "./../../store";

export default function guestMiddleware({next, router}) {
    if (store.getters.isAuth)
        next({name: 'home'});
    else
        next();
}
