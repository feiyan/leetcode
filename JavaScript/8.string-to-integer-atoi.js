/**
 * @url https://leetcode.com/problems/string-to-integer-atoi
 * @difficulty medium
 * @param {string} str
 * @return {number}
 */
var myAtoi = function(str) {
    str = str.replace(/(^\s*)|(\s*$)/g, "");
    var arr = str.split('');
    var reg = /^[\d|+|-]{1}$/;
    if( reg.test(arr[0])===false ){
        return 0;
    }
    var newArr = [];
    var length = arr.length;
    var reg = /^[\d]{1}$/;
    for( var i=1; i<length; i++ ){
        var cursor = arr[i];
        if( reg.test(arr[i])===false ){
            break;
        } else {
            newArr.push(arr[i]);
        }
    }
    if( (arr[0]=='+' || arr[0]=='-') && newArr.length==0 ){
        return 0;
    }
    if( arr[0]!='+' ){
        newArr.unshift(arr[0]);
    }
    var max = Math.pow(2,31)-1;
    var min = 0-Math.pow(2,31);
    var val = parseInt(newArr.join(''));
    val = val>=max ? max : val;
    val = val<=min ? min : val;
    return val;
};