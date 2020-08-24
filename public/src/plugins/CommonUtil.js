let CommonUtil = {};

CommonUtil.install = function(Vue, options){
    let commonUtil = {
        toCommaString( number ) {
            if (!number) return 0;
            let number_string = number.toString();
            let number_parts = number_string.split('.');
            let regexp = /\B(?=(\d{3})+(?!\d))/g;
            if (number_parts.length > 1) {
                return number_parts[0].replace( regexp, ',' ) + '.' + number_parts[1];
            } else {
                return number_string.replace( regexp, ',' );
            }
        },

        ucFirst(text) {
            if (text) {
                return text.charAt(0).toUpperCase() + text.slice(1);
            } else {
                return '';
            }
        },
    };

    Vue.prototype.$commonUtil = commonUtil;
};

export default CommonUtil;
