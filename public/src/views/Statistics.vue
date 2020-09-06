<template>
    <div>
        <h2 class="section-title animation-translate-overline animation-item-1">Statistics</h2>
        <div class="row animation-translate animation-item-2">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="counter mb-6 mb-lg-0">
                    <span class="counter-label">오늘 방문자</span>
                    <span data-counter-from="0" :data-counter-to="item.todayVisitCount" data-counter-finished="">{{item.todayVisitCount}}</span>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="counter mb-6 mb-lg-0">
                    <span class="counter-label">총 방문자</span>
                    <span data-counter-from="0" :data-counter-to="item.totalVisitCount" data-counter-finished="">{{item.totalVisitCount}}</span>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="counter mb-6 mb-lg-0">
                    <span class="counter-label">남긴 메세지</span>
                    <span data-counter-from="0" :data-counter-to="item.messageLeftCount" data-counter-finished="">{{item.messageLeftCount}}</span>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="counter mb-6 mb-lg-0">
                    <span class="counter-label">총 프로젝트 갯수</span>
                    <span data-counter-from="0" :data-counter-to="item.totalProjectCount" data-counter-finished="">{{item.totalProjectCount}}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Item from "@/mixins/Item";

    export default {
        name: "Statistics",
        mixins: [Item],
        data() {
            return {
                itemName: 'Statistics'
            }
        }
    }
</script>

<style scoped>

</style>