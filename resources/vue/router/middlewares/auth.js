import store from "./../../store";

export default function authMiddleware({next, router}) {
    if (!store.getters.isAuth)
        next({name: 'posts.index'});
    else
        next();
}
