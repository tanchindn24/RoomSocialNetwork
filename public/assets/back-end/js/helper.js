const jshelper = {
    // Làm tròn tiền
    roundingMoney: function (value) {
        return Math.floor(value / 1000) * 1000;
    },

    // Tách lấy số từ chuổi
    getNumericFromString: function (value) {
        if (!jshelper.checkType.isNumber(value) && !jshelper.checkType.isString(value))
            return '';

        if (jshelper.checkType.isString(value))
            return value.replace(/\D/g, '');

        return value;
    },

    // Chuyển chuổi tới số theo kiểu dữ liệu kèm theo
    convertStringToNumber: function (value, type = 'int') {
        if (!value || jshelper.checkType.isUndefined(value) || jshelper.checkType.isNull(value))
            return 0;

        if (jshelper.checkType.isString(value)) {
            value = jshelper.getNumericFromString(value);

            if (type === 'int') {
                return parseInt(value);
            } else if (type === 'float' || type === 'double') {
                return parseFloat(value);
            } else {
                return 0;
            }
        }
        return value;
    },

    // Remove tiếng việt
    removeAccents: function (str) {
        var AccentsMap = [
            "aàảãáạăằẳẵắặâầẩẫấậ",
            "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
            "dđ", "DĐ",
            "eèẻẽéẹêềểễếệ",
            "EÈẺẼÉẸÊỀỂỄẾỆ",
            "iìỉĩíị",
            "IÌỈĨÍỊ",
            "oòỏõóọôồổỗốộơờởỡớợ",
            "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
            "uùủũúụưừửữứự",
            "UÙỦŨÚỤƯỪỬỮỨỰ",
            "yỳỷỹýỵ",
            "YỲỶỸÝỴ",
            "\n",
        ];

        for (var i = 0; i < AccentsMap.length; i++) {
            var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
            str = str.replace(re, AccentsMap[i][0]);
        }
        return str;
    },

    removeSpecials: function (str) {
        if (!jshelper.checkType.isString(str))
            return str;

        var lower = str.toLowerCase();
        var upper = str.toUpperCase();

        var res = "";
        for (var i = 0; i < lower.length; ++i) {
            if (lower[i] !== upper[i] || lower[i].trim() === '' || !isNaN(Number(str[i])))
                res += str[i];
        }
        return res.trim().replace(/\s+/g, ' ');
    },

    // Function xử lý cho cookie
    setCookie: function (cname, cvalue, exdays, path) {
        if (!path)
            path = '/';
        var d = new Date();
        if (!exdays)
            exdays = 1;
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + encodeURIComponent(cvalue) + ";" + expires + ";path=" + path;
    },

    getCookie: function (cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);

        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) === ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) === 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    },
};


// Kiểm tra loại dữ liệu
Object.defineProperty(jshelper, 'checkType', {
    value: {
        /**
         * Check is undefined ?
         * @param value
         * @returns {boolean}
         */
        isUndefined: function (value) {
            return typeof value === 'undefined' || value === undefined;
        },

        /**
         * Check is null ?
         * @param value
         * @returns {boolean}
         */
        isNull: function (value) {
            return value === null || value === 'null';
        },

        /**
         * Check is array ?
         * @param value
         * @returns {boolean}
         */
        isArray: function (value) {
            return Array.isArray(value);
        },


        /**
         * Check is object ?
         * @param value
         * @returns {boolean}
         */
        isObject: function (value) {
            return value && typeof value === 'object';
        },

        /**
         * Check is array or object has empty ?
         * @param value
         * @returns {boolean}
         */
        isEmpty: function (value) {
            //@TODO: Làm function này cho xong
            if (!jshelper.checkType.isArray(value) && !jshelper.checkType.isObject(value))
                return true;

            if (jshelper.checkType.isObject(value)) {
                return !Object.keys(value).length;
            }
            return !value.length;
        },


        isString: function (value) {
            return typeof value === 'string';
        },

        /**
         * Check is function ?
         * @param value
         * @returns {boolean}
         */
        isFunction: function (value) {
            return typeof value === 'function';
        },

        /**
         * Check is number ?
         * @param value
         * @returns {boolean}
         */
        isNumber: function (value) {
            if (typeof value === 'number')
                return true;
            else if (jshelper.checkType.isString(value) && value.match(/^-?\d+$/)) {
                return true;
            } else if (jshelper.checkType.isString(value) && value.match(/^\d+\.\d+$/)) {
                return true;
            }
            return false;
        },
    },
    writable: false
});

// Hỗ trợ cho object
Object.defineProperty(jshelper, 'object', {
    value: {
        // Merge 2 object lại với nhau
        mergeObject: function (dataTarget, dataSource) {
            if (!jshelper.checkType.isObject(dataTarget) && jshelper.checkType.isObject(dataSource))
                return {...dataSource};
            else if (jshelper.checkType.isObject(dataTarget) && !jshelper.checkType.isObject(dataSource))
                return {...dataTarget};
            else
                return Object.assign({}, dataTarget, dataSource);
        },

        // Kiểm tra value có trong object hay không ?
        checkValueInObject: function (value, key, object) {
            if (object.hasOwnProperty(key) && value == object[key])
                return object;
            return false;
        },
    },
    writable: false
});

// Hỗ trợ cho array
Object.defineProperty(jshelper, 'array', {
    value: {
        /**
         * Tìm hoặc đếm các object trong mảng với key và value khớp với object
         * @param value
         * @param key
         * @param objectInArray
         * @param isCount
         * @returns {*[]|*}
         */
        getAllObjectInArray: function (value, key, objectInArray, isCount = true) {
            let count = 0;
            let objectHasValue = [];

            // Check return init
            if (!jshelper.checkType.isArray(objectInArray)) {
                if (isCount)
                    return count;
                return null;
            }

            // Logic check
            objectInArray.map(function (item, index) {
                if (jshelper.checkType.isObject(item)) {
                    if (jshelper.object.checkValueInObject(value, key, item)) {
                        objectHasValue.push(item);
                        count++;
                    }
                }
            });
            // return section
            if (isCount)
                return count;

            if (objectHasValue.length !== 0)
                return objectHasValue;
            return null;
        },


        /**
         * Tìm object trong array object, với value và key chỉ định
         * @param value
         * @param key
         * @param objectInArray
         * @param indexReturn
         * @returns {*[]|*}
         */
        findObjectInArray: function (value, key, objectInArray, indexReturn = false) {
            let default_res = (indexReturn ? -1 : false);
            if (!Array.isArray(objectInArray)) {
                return default_res;
            }
            let hasValue = default_res;
            for (const [index, item] of objectInArray.entries()) {
                if (typeof item === 'object') {
                    if (jshelper.object.checkValueInObject(value, key, item)) {
                        hasValue = (indexReturn ? index : item);
                        break;
                    }
                }
            }
            return hasValue;
        },

        /**
         * Thêm hoặc xóa phần tử trong array
         * @param array
         * @param value
         * @returns {*[]|*}
         */
        addOrRemoveItemInArray: function (array, value) {
            if (jshelper.checkType.isEmpty(array))
                return [value];

            let indexCheck = (array).indexOf(value);
            indexCheck !== -1 ? array.splice(indexCheck, 1) : array.push(value);
            return array;
        },

        /**
         * Thêm hoặc xóa phần tử object trong 1 array
         * @param array
         * @param object
         * @param key
         * @returns {*[]|*}
         */
        addOrRemoveObjectInArray: function (array, object, key) {
            if (jshelper.checkType.isEmpty(array))
                return [object];

            if (typeof object[key] === 'undefined')
                return array;

            let indexCheck = -1;
            array.map((item, key_array) => {
                if (typeof item[key] !== 'undefined' && item[key] === object[key])
                    indexCheck = key_array;
            });

            indexCheck !== -1 ? array.splice(indexCheck, 1) : array.push(object);
            return array;
        },

        /**
         * Thêm 1 object vào 1 array object nhưng không được trùng
         * @param array
         * @param object
         * @param key
         * @returns {*[]|*}
         */
        addObject_notDuplicate_inArray: function (array, object, key) {
            if (!array || array?.length === 0)
                return [object];

            if (typeof object[key] === 'undefined')
                return array;

            let indexCheck = -1;
            array.map((item, key_array) => {
                if (typeof item[key] !== 'undefined' && typeof object[key] !== 'undefined' && item[key] === object[key])
                    indexCheck = key_array;
            });

            indexCheck === -1 &&
            array.push(object);

            return array;
        },

        /**
         * Đẩy 1 mục được chọn lên đầy tiên của mảng
         * Mục được chọn với điều kiện khớp với key và value
         * @param value
         * @param key
         * @param arrayData
         * @returns {*[]|*}
         */
        setSelectedToFirst: function (value, key, arrayData) {
            if (jshelper.checkType.isUndefined(value) || jshelper.checkType.isUndefined(key) || jshelper.checkType.isUndefined(arrayData))
                return arrayData;

            const keyFind = jshelper.array.findObjectInArray(value, key, arrayData, true);

            if (keyFind !== -1) {
                arrayData.unshift(arrayData[keyFind]);
                arrayData.splice(keyFind + 1, 1);
                return arrayData;
            }
            return arrayData;
        },
        getMaxObjectArray: function(array, keyInObject){
            return Math.max.apply(Math, array.map(function(o) { return o[keyInObject];}));
        }
    },
    writable: false
});

// Hỗ trợ url
Object.defineProperty(jshelper, 'url', {
    value: {
        urlPattern(urlPath, params = null) {
            if (jshelper.checkType.isObject(params)) {
                let regex = new RegExp(':(' + Object.keys(params).join('|') + ')', 'g');
                return `${urlPath.replace(regex, (m, $1) => params[$1] || m)}`;
            }
            return `${urlPath}`;
        },

        getURL (urlPath, params = null) {
            if (jshelper.checkType.isObject(params)) {
                let regex = new RegExp(':(' + Object.keys(params).join('|') + ')', 'g');
                return `${urlPath.replace(regex, (m, $1) => params[$1] || m)}`;
            }
            return `${urlPath}`;
        },

        queryUrl(url, obj){
            var str = [];
            for (var p in obj) {
                if (obj.hasOwnProperty(p)) {
                    str.push(encodeURIComponent(p) + '=' + encodeURIComponent(obj[p]));
                }
            }

            return url.includes('?') ? `${url}&${str.join('&')}` : `${url}?${str.join('&')}`;
        },

        slug: function (str, prefix="-") {

            //replace all special characters | symbols with a space
            str = str.replace(/[,.-]/g, '')
                .toLowerCase();

            str = jshelper.removeAccents(str);

            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm, '');

            // replace space with dash/hyphen
            str = str.replace(/\s+/g, prefix);
            return str;
        }
    },
    writable: false
});

// Hỗ trợ validate
Object.defineProperty(jshelper, 'validate', {
    value: {
        require: (val) => {
            return !!(typeof val === 'undefined' || val === '' || null);
        },
        email: (val) => {
            return !/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i.test(val);
        },
        image: (values) => {
            if (!values || typeof values === 'undefined' || values.length === 0) {
                return 'Hãy chọn một hình ảnh bất kỳ';
            } else {
                return undefined;
            }
        },
    },
    writable: false
});

// Hỗ trợ file
Object.defineProperty(jshelper, 'file', {
    value: {
        // Get extension for file
        getFileExtension: function ($filename) {
            return $filename.substring($filename.lastIndexOf('.') + 1);
        },

        // Get name of file
        getFileName: function ($filename) {
            return $filename.substring($filename.lastIndexOf('/') + 1);
        }
    },
    writable: false
});
