import StringUtil from "./StringUtil";
import communicationLogger from './CommunicationLogger';
import axios from 'axios';
import REQUEST_LIST from "../constant/request";
import swal from 'sweetalert';

const SERVER_ADDRESS = '/api.php/service';
const UPLOAD_ADDRESS = '/api.php/upload';
const DOWNLOAD_ADDRESS = '/api.php/download';

class Communicator {
    sendActionRequest(requestName, inputValueList, callback, failCallback) {
        swal({
            icon: "/assets/img/loading.gif",
            button: false,
            closeOnClickOutside: false,
            closeOnEsc: false,
        });
        inputValueList = this.checkTrim(inputValueList);
        let data = StringUtil.getFormatStringFromObject(REQUEST_LIST[requestName], inputValueList);

        if (requestName) {
            communicationLogger.addLog('Request', data);

            const instance = axios.create();
            instance.post(SERVER_ADDRESS, data,
            {
                headers: {
                    'timeout': '120000',
                },
            }).then(response => {
                communicationLogger.addLog('Response', response.data);
                if (response.data.result == 200) {
                    swal("success.", {
                        icon: "success",
                    }).then(() => {
                        if (callback != null) callback(response.data);
                    }).catch(ex => {
                        callback({result: 408, resultMessage: 'Time out'});
                    });

                } else {
                    swal(response.data.resultMessage, {
                        icon: "error",
                    }).then(() => {
                        if (failCallback != null) failCallback(response.data);
                    });
                }
            })
        }
    }

    sendRequest(requestName, inputValueList, callback) {
        inputValueList = this.checkTrim(inputValueList);
        let data = StringUtil.getFormatStringFromObject(REQUEST_LIST[requestName], inputValueList);

        if (requestName) {
            communicationLogger.addLog('Request', data);

            axios.post(
                SERVER_ADDRESS,
                data,
                {
                    headers: {
                        'content-type': 'application/json',
                    },
                }
            ).then(response => {
                axios.defaults.timeout = 5000;
                communicationLogger.addLog('Response', response.data);
                callback(response.data);
            }).catch(ex => {
                console.log('a' + ex);
                // if (ex != null) {
                //     if (axios.defaults.timeout > 10000) {
                //         callback({result: 408, resultMessage: 'Time out, please click refresh'});
                //     } else {
                //         axios.defaults.timeout += 5000;
                //         this.sendRequest(requestName, inputValueList, callback);
                //     }
                // }
            })
        }
    }

    sendDownloadRequest(actionName, data, callback) {
        communicationLogger.addLog('Request', data);
        axios.post(DOWNLOAD_ADDRESS + '/' + actionName, data).then(response => {

        })
    }

    checkTrim(inputValueList) {
        for (let inputValue of inputValueList) {
            for (let [key, value] of Object.entries(inputValue)) {
                if (Object.prototype.toString.call(value) === "[object String]") {
                    inputValue[key] = value.trim();
                }
            }
        }
        return inputValueList;
    }

    upload(service, file, data, callback) {
        data.netpasId = session.state.adminId;
        communicationLogger.addLog('Request', data);
        const formData = new FormData();
        formData.append(file.name, file, file.name);
        formData.append('service', service);
        formData.append('data', JSON.stringify(data));

        axios.post(UPLOAD_ADDRESS, formData).then(response => {
            communicationLogger.addLog('Response', response.data);
            callback(response.data);
        })
    }
}
let communicator = new Communicator();
export default communicator;