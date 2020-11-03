import Vue from 'vue';
import Router from 'vue-router';

// Error pages
import NotFoundPage from '@/components/pages/errors/NotFoundPage'

// Pages Components
import Home from '@/components/pages/Home';
import Statistics from '@/components/pages/Statistics';
import Enterprises from '@/components/pages/Enterprises';

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '*',
            component: NotFoundPage
        },
        {
            path: '/',
            name: 'index',
            component: Home
        },
        {
            name: 'Home',
            path: '/home',
            component: Home
        },
        {
            name: 'Enterprise',
            path: '/enterprise',
            component: Enterprises
        },
        {
            name: 'Statistics',
            path: '/statistics',
            component: Statistics
        },
        {
            path: '/error/404',
            name: 'NotFoundPage',
            component: NotFoundPage
        },
    ]
});