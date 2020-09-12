<template>
    <div>
        <div class="row">
            <div class="col-1 project-button">
                <router-link v-if="!isFirstProject"
                             :to="'/projects/'+(Number(item.id) - 1)">
                    <img
                         class="small-icon img-responsive"
                         src="/assets/img/left.png"
                    />
                </router-link>
                <img
                        v-else
                        class="small-icon img-responsive"
                        src="/assets/img/left.png"
                />
            </div>

            <h2 class="section-title animation-translate-overline animation-item-1 col-8 m-0">{{item.title}}</h2>
            <div class="col-1 project-button">
                <router-link v-if="!isLastProject"
                             :to="'/projects/'+(Number(item.id) + 1)">
                    <img
                            class="small-icon img-responsive"
                            src="/assets/img/right.png"
                    />
                </router-link>
                <img
                        v-else
                        class="small-icon img-responsive"
                        src="/assets/img/right.png"
                />
            </div>
        </div>
        <div class="animation-translate animation-item-2">
            <div class="pt-5">{{item.subtitle}}</div>
            <span v-if="item.link"> 링크 : <a v-if="item.link" href="item.link">{{item.link}}</a></span>
            <br>
            <b-carousel
                    v-if="item.imageCount > 0"
                    fade
                    indicators
                    img-width="512"
                    img-height="240"
            >
                <b-carousel-slide
                        v-for="index in item.imageCount"
                        v-bind:key="index"
                        :img-src="'assets/img/projects/' + item.id + '/' + index"
                ></b-carousel-slide>
            </b-carousel>
            <span class="project-subtitle m-0 mb-1 mt-1">① 수행환경</span>
            <div class="pl-2">
                - 개발도구 : <span class="pr-1" v-for="(skill, index) in item.skillList"><b-badge variant="primary">{{skill.skill}}</b-badge></span><br>
                - 개발환경 : {{item.environment}}<br>
                - 수행인원 : {{item.attendantCount}}명<br>
            </div>
            <span class="project-subtitle m-0 mb-1 mt-1">② 주요역할</span>
            <div class="pl-2" v-html="item.role"></div>
            <span class="project-subtitle m-0 mb-1 mt-1">③ 세부 내용</span>
            <div class="pl-2" v-html="item.detail"></div>
            <span v-if="item.relation" class="project-subtitle m-0 mb-1 mt-1">④ 프로젝트</span>
            <div v-if="item.relation" class="pl-2" v-html="item.relation"></div>

            <br><br>
            <span v-if="item.description" class="project-subtitle m-0 mb-1 mt-5 pt-5">소개</span>
            <div v-if="item.description" v-html="item.description"></div>
        </div>
    </div>
</template>

<script>
    import Item from "@/mixins/Item";

    export default {
        name: "Project",
        mixins: [Item],
        computed: {
            isFirstProject() {
                return this.item.id === 1;
            },

            isLastProject() {
                return this.item.id === this.item.totalProjectCount;
            }
        }
    }
</script>

<style scoped>
    .project-subtitle {
        font-weight: 700 !important;
        font-size: 18px;
    }

    .project-button {
        margin-top: auto !important;
        margin-bottom: auto !important;
    }

    img {
        width: 20px;
    }

</style>