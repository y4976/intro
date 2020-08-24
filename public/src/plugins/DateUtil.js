import moment from 'moment';

let DateUtil = {};

DateUtil.install = function(Vue, options){
    let dateUtil = {
        now() {
            return moment().format('YYYY-MM-DD HH:mm:ss');
        },
        makeYYYY(time) {
            return moment(time).format('YYYY');
        },
        // time으로 null 들어오면 현재값으로 리턴. 공백들어오면 공백리턴
        makeYYMMDD(time) {
            if (time != '') {
                return moment(time).format('YY-MM-DD');
            } else {
                return '';
            }
        },
        makeYYYYMM(time) {
            return moment(time).format('YYYY-MM');
        },
        makeYYYYMMDD(time) {
            return moment(time).format('YYYY-MM-DD');
        },
        makeYYYYMMDDHHMM(time) {
            return moment(time).format('YYYY-MM-DD HH:mm');
        },
        makeFullDate(time) {
            return moment(time).format('YYYY-MM-DD HH:mm:ss');
        },
        getStartOfMonth(time) {
            return moment(moment(moment(time)).startOf('month')).format('YYYY-MM-DD HH:mm:ss')
        },
        isExpired(time) {
            return moment(time).isBefore(moment());
        },
        isBefore(time, condition) {
            return moment(time).isBefore(moment(condition));
        },
        isAfter(time, condition) {
            return moment(time).isAfter(moment(condition));
        },
        add(time, interval, unit = 'day') {
            return moment(time).add(interval, unit);
        },
        subtract(time, interval, unit = 'day') {
            return moment(time).subtract(interval, unit);
        },
        diff(time1, time2) {
            return moment(time1).diff(moment(time2), 'months', true);
        },
        convertFromUnix(time) {
            return moment.unix(time).format('YYYY-MM-DD HH:mm:ss');
        },
    };

    Vue.prototype.$dateUtil = dateUtil;
};

export default DateUtil;
