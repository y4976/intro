import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '@/views/Home';
import AboutMeList from "@/views/AboutMeList";
import SkillList from "@/views/SkillList";
import FactList from "@/views/FactList";
import ExperienceList from "@/views/ExperienceList";
import References from "@/views/References";
import ProjectList from "@/views/ProjectList";
import Contact from "@/views/Contact";
import Project from "@/views/Project";
import Statistics from "@/views/Statistics";

const routes = [
    { path: '', component: Home },
    { path: '/about-me', component: AboutMeList },
    { path: '/skills', component: SkillList },
    { path: '/facts', component: FactList },
    { path: '/experiences', component: ExperienceList },
    { path: '/references', component: References },
    { path: '/projects', component: ProjectList },
    { path: '/projects/:id', component: Project },
    { path: '/statistics', component: Statistics },
    { path: '/contact', component: Contact },
];

export default new VueRouter({
    routes
});