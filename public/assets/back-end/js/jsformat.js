var format = {
    phone: function (value) {
        let onlyNums = value.replace(/[^\d]/g, '');
        if(onlyNums.length<=4){
            return onlyNums;
        }else if(onlyNums.length<=7){
            return onlyNums.slice(0, 4)+ '-' +onlyNums.slice(4, onlyNums.length+1);
        }else{
            return (
                onlyNums.slice(0, 4) +
                '-' +
                onlyNums.slice(4, 7) +
                '-' +
                onlyNums.slice(7, 50)
            );
        }
    },
    capitalizeFirstStr: function (str) {
        const arr = str.split(" ");
        for (var i = 0; i < arr.length; i++) {
            arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);
        }
        return arr.join(" ");
    },
    currencyInput: function (value) {
        return Number(value).toLocaleString('vi-VN');
    },
    currency: function (number) {
        return Number(number).toLocaleString('vi-VN', {
            style: 'currency',
            currency: 'vnd'
        });
    },
    dateVn: function (date) {
        return new Date(date).toLocaleDateString('vi', {
            year: "numeric",
            month: "2-digit",
            day: "2-digit"
        });
    }
};
