<template>
    <nav class="sections-nav-container">
        <ul id="sections-nav" class="nav sections-nav sections-nav-animated">
            <li class="sections-nav-item" v-for="(menu, index) in menuList">
                <router-link
                        :to="menu.path"
                        class="nav-link sections-nav-link"
                        :class="isActive(menu.path)"
                >
                    <span class="sections-nav-counter">{{index + 1}}</span>
                    {{menu.title}}
                </router-link>
            </li>
            <li class="sections-nav-item">
                <div class="sections-nav-info">
                    <a :href="'mailto:'+user.email">{{user.email}}</a><br>
                    <a :href="'tel:'+user.phone">{{user.phone}}</a>
                </div>
            </li>
        </ul>
    </nav>
</template>

<script>
    import User from "@/mixins/User";

    export default {
        name: 'AppNav',
        mixins: [User],
        data() {
            return {
                menuList: [
                    {title: 'Home', path: '/'},
                    {title: 'About me', path: '/about-me'},
                    // {title: 'My Services', path: '/my-services'},
                    {title: 'Skills', path: '/skills'},
                    // {title: 'Facts', path: '/facts'},
                    {title: 'Experiences', path: '/experiences'},
                    // {title: 'References', path: '/references'},
                    {title: 'Projects', path: '/projects'},
                    // {title: 'Testimonials', path: '/testimonials'},
                    {title: 'Statistics', path: '/statistics'},
                    {title: 'Contact', path: '/contact'},
                ]
            }
        },
        methods: {
            isActive(path) {
                return (this.$route.path === path) ? 'active': '';
            },
        },
    }
</script>

<style scoped>

</style>