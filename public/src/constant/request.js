const REQUEST_LIST = {
    CheckSession : '{"service":"CheckSession"}',
    LoadCommonData : '{"service":"LoadCommonData","value":{}}',

    GetUser: '{"service":"GetUser"}',
    AddMessage: '{"service":"AddMessage","value":{"item":{item}}}',

    AddItem: '{"service":"Add{itemName}","value":{"item":{item}}}',
    SetItem: '{"service":"Set{itemName}","value":{"item":{item}}}',
    GetItemList: '{"service":"Get{itemName}"}',
    // GetItemList: '{"service":"Get{itemName}","value":{"startIndex":{startIndex},"perPage":{perPage},"orderField":"{orderField}","orderType":"{orderType}","tab":"{tab}","conditions":{conditions},"searchColumnList":{searchColumnList}}}',
    GetItem: '{"service":"Get{itemName}","value":{"id":"{id}","conditions":{conditions}}}',
    DeleteItem: '{"service":"Delete{itemName}","value":{"id":"{id}","tab":"{tab}"}}',
};

export default REQUEST_LIST;