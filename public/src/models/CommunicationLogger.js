import StringUtil from "./StringUtil";

class CommunicationLog {
    constructor(type, log) {
        this.type = type;
        this.timeStamp = StringUtil.getTimeStamp();

        if (typeof log == 'object') {
            this.log = JSON.stringify(log);
        } else {
            this.log = log;
        }
    }

    toString() {
        return StringUtil.getFormatStringFromObject('[{type} {timeStamp}] \n{log}\n\n', [this]);
    }
}

class CommunicationLogger {
    constructor() {
        this.logList = [];
    }

    addLog(type, log) {
        if (process.env.NODE_ENV == 'development') {
            this.logList.push(new CommunicationLog(type, log));
        }

        if (this.logList.length > 1000) {
            this.logList.shift();
        }
    }

    clearLog() {
        this.logList = [];
    }

    toString() {
        let log = '';
        for (let item of this.logList) {
            log += item.toString();
        }
        return log;
    }
}

let communicationLogger = new CommunicationLogger();
export default communicationLogger;