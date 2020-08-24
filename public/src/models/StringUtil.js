class StringUtil {
    static getFormatStringFromString(origin, paramList) {
        return origin.replace(/{(\d+)}|{([a-zA-Z\s]+)}/g, function() {
            return paramList.shift();
        });
    }

    static getFormatStringFromObject(origin, objectList) {
        let combineObject = {};

        for (let item of objectList) {
            for (let i = 0; i < Object.keys(item).length; i++) {
                combineObject[Object.keys(item)[i]] = Object.values(item)[i];
            }
        }

        origin = StringUtil.matchObject(origin, combineObject);

        return origin;
    }

    static matchObject(origin, inputData) {
        let regex = /{([a-zA-Z\s]+)}/g, match;
        while(match = regex.exec(origin)) {
            if (inputData[match[1]] == undefined) {
                origin = origin.replace(match[0], '');
            };

            if (typeof inputData[match[1]] == 'object') {
                origin = origin.replace(match[0], JSON.stringify(inputData[match[1]]));

            } else {
                origin = origin.replace(match[0], inputData[match[1]]);
            }
            regex.lastIndex = 0;
        }
        return origin;
    }

    static leadingZeros(n, digits) {
        let zero = '';
        let s = n.toString();

        if (s.length < digits) {
            for (let i = 0; i < digits - s.length; i++)
                zero += '0';
        }
        return zero + s;
    }

    static getTimeStamp() {
        let d = new Date();

        return StringUtil.leadingZeros(d.getFullYear(), 4) + '-' +
            StringUtil.leadingZeros(d.getMonth() + 1, 2) + '-' +
            StringUtil.leadingZeros(d.getDate(), 2) + ' ' +

            StringUtil.leadingZeros(d.getHours(), 2) + ':' +
            StringUtil.leadingZeros(d.getMinutes(), 2) + ':' +
            StringUtil.leadingZeros(d.getSeconds(), 2);
    }

    static toCapitalizedWords(name) {
        let words = name.match(/[A-Za-z][a-z]*/g) || [];

        return words.map(StringUtil.capitalize).join(" ");
    }

    static capitalize(word) {
        return word.charAt(0).toUpperCase() + word.substring(1);
    }

    static paddy(num, padLen, padChar = '0') {
        let pad_char = typeof padChar !== 'undefined' ? padChar : '0';
        let pad = new Array(1 + padLen).join(pad_char);
        return (pad + num).slice(-pad.length);
    }
}

export default StringUtil;