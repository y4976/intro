<template>
    <div>
        <div class="row">
            <div class="col-1 pt-5">
                <router-link v-if="!isFirstProject"
                             :to="'/projects/'+(Number(item.id) - 1)">
                    <span class="carousel-control-prev-icon"></span>
                </router-link>
                <span v-else class="carousel-control-prev-icon"></span>
            </div>

            <h2 class="section-title animation-translate-overline animation-item-1 col-10">{{item.title}}</h2>
            <div class="col-1 pt-5">
                <router-link v-if="!isLastProject"
                             :to="'/projects/'+(Number(item.id) + 1)">
                    <span class="carousel-control-next-icon"></span>
                </router-link>
                <span v-else class="carousel-control-next-icon"></span>
            </div>
        </div>
        <div class="animation-translate animation-item-2">
            <h4 class="card-subtitle">{{item.subtitle}}</h4>
            <span v-if="item.link"> 링크 : <a v-if="item.link" href="item.link">{{item.link}}</a></span>
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
            <h5 class="font-weight-bold m-0 mb-1 mt-1">① 수행환경</h5>
            <div class="pl-2">
                - 개발도구 : <span class="pr-1" v-for="(skill, index) in item.skillList"><b-badge variant="primary">{{skill.skill}}</b-badge></span><br>
                - 개발환경 : {{item.environment}}<br>
                - 수행인원 : {{item.attendantCount}}명<br>
            </div>
            <h5 class="font-weight-bold m-0 mb-1 mt-1">② 주요역할</h5>
            <div class="pl-2" v-html="item.role"></div>
            <h5 class="font-weight-bold m-0 mb-1 mt-1">③ 세부 내용</h5>
            <div class="pl-2" v-html="item.detail"></div>
            <h5 v-if="item.relation" class="font-weight-bold m-0 mb-1 mt-1">④ 프로젝트</h5>
            <div v-if="item.relation" class="pl-2" v-html="item.relation"></div>

            <h5 v-if="item.description" class="font-weight-bold m-0 mb-1 mt-5 pt-5">소개</h5>
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

</style>